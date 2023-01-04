<?php

use App\MailChimpHandler;

$actions = [
    'prifile_upd',
    'upd_avatar',
    'delete_avatar',
    'ajax_registration',
    'ajax_login',
    'ajax_reset'
];
foreach($actions as $action) {
    add_action("wp_ajax_{$action}", $action);
    add_action("wp_ajax_nopriv_{$action}", $action);
}

add_action('wp_ajax_submit_dropzonejs',   'dropzonejs_upload' );
add_action('wp_ajax_nopriv_submit_dropzonejs',   'dropzonejs_upload' );

function prifile_upd()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-prifile_upd-nonce', 'security' );

    $user_id = $_POST['user_id'] ?: 0;

    if (!$user = get_user_by( 'id', $user_id )) {
        echo json_encode(array(
            'update'=>false,
            'status' => '<p class="error">Unknow user</p>',
        ));
        wp_die();
    }



    if(isset($_POST['meta'])) {
        foreach ($_POST['meta'] as $key => $value) {
            update_field($key, $value, $user);
        }
    }

    $args = [
        'ID' => $user_id,
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'description' => $_POST['description'],
    ];

    if(isset($_POST['user_pass'])) {
        $args['user_pass'] = $_POST['user_pass'];
    }

    if(isset($_POST['user_email'])) {
        $args['user_email'] = $_POST['user_email'];
    }


    wp_update_user($args);

 

    $data = array(
        'update' => true,
        'status' => '<p class="success">'.__('Данные обновлены','sage').'</p>',
    );

    if(empty($data))
        $data = array(
            'update' => false,
            'status' => '<p class="error">'.__('Unknow error','sage').'</p>',
        );

    echo json_encode($data);

    wp_die();


}

function upd_avatar() {

    if ( $_POST['img_id'] ) {

        update_field('avatar',(int)$_POST['img_id'],'user_'.get_current_user_id(  ));

        // $return = update_user_meta( get_current_user_id(  ), 'wp_user_avatar', (int)$_POST['img_id'] );
        // update_user_meta( get_current_user_id(  ), 'user_avatar', (int)$_POST['img_id'] );
    }

    wp_die();
}

function delete_avatar() {

    if ( $_POST['img_id'] ) {

        update_field('avatar','','user_'.get_current_user_id(  ));

        wp_delete_attachment($_POST['img_id']);

        // $return = update_user_meta( get_current_user_id(  ), 'wp_user_avatar', (int)$_POST['img_id'] );
        // update_user_meta( get_current_user_id(  ), 'user_avatar', (int)$_POST['img_id'] );
    }

    wp_die();
}

function dropzonejs_upload() {
    if ( !empty($_FILES) ) {
        $files = $_FILES;
        foreach($files as $file) {
            $newfile = array (
                'name' => $file['name'],
                'type' => $file['type'],
                'tmp_name' => $file['tmp_name'],
                'error' => $file['error'],
                'size' => $file['size']
            );

            $_FILES = array('upload'=>$newfile);
            foreach($_FILES as $file => $array) {
                $newupload =  insert_attachment($file);
            }
        }
    }
    die();
}

function insert_attachment($file_handler) {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, 0 );

    echo intval($attach_id);
}

function ajax_registration()
{

    // First check the nonce, if it fails the function will break
    //  check_ajax_referer( 'ajax-registration-nonce', 'security' );

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array(
            'update'=>false,
            'status' => '<p class="error">Email address '.$_POST['email'].' is incorrect</p>',
        ));
        wp_die();
    }

    if($_POST['email']&&$_POST['password'] && $_POST['password2']) {

        if ($_POST['password'] !== $_POST['password2'])   {
            $data = array(
                'update'=>false,
                'status' => '<p class="error">'.__('Пароли не совпадают','sage').'</p>',
            );
            echo json_encode($data);

            wp_die();
        }


        if (strlen($_POST['password']) < 8) {
            $data = array(
                'update'=>false,
                'status' => '<p class="error">' .__('Пароль должен содержать не менее 8 символов','sage').'</p>',
            );
            echo json_encode($data);

            wp_die();
        }

        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role']?:'subscriber';

        $i=1;

        while (username_exists( $login )) {
            ++$i;
            $login = $login.$i;
        }

        $user = get_user_by('email', $email);


        if(empty($user)){

            $user_data = [
                'user_login' => $login,
                'user_pass'  => $password,
                'user_email' => $email,
                'role'  => $role,
                'show_admin_bar_front' => false,


            ];

            $user_id = wp_insert_user($user_data);

            update_field('phone', $_POST['phone'], 'user_' . $user_id);




            if($user_id) {




                $data = array(
                    'update'=>true,
                    'status' => '<p class="success">'.__('Регистрация успешная','sage').'</p>',
                    'redirect' => get_permalink(444),
                    'user_id' => $user_id,

                );


                if($user = get_user_by( 'id', $user_id )) {
                    wp_set_current_user( $user->ID );
                    wp_set_auth_cookie( $user->ID, true );
                    do_action( 'wp_login', $user->user_login, $user );
                }

                $user_name = get_userdata($user_id)->first_name ?: $login;


            }

        } else {
            $data = array(
                'update'=>false,
                'status' => '<p class="error">'.__('<br>Un compte existe déjà pour cette adresse email. Identifiez-vous ou utilisez un mot de passe oublié','sage').'</p>',
            );
        }
    } else {
        $data = array(
            'update'=>false,
            'status' => '<p class="error">'.__('Email and password fields are required','sage').'</p>',
        );
    }

    if(empty($data))
        $data = array(
            'update'=>false,
            'status' => '<p class="error">'.__('Unknow error','sage').'</p>',
        );

    echo json_encode($data);

    wp_die();
}


function ajax_login()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $email = $_POST['login'];
    $password = $_POST['password'];

    $auth = wp_authenticate( $email, $password );

    if ( is_wp_error( $auth ) ) {
        $data = array(
            'update' => false,
            'status' => '<p class="error">'.__('Неверные логин или пароль','sage').'</p>' ,
        );
    }
    else {



        wp_set_current_user( $auth->ID );
        wp_set_auth_cookie( $auth->ID, true );
        do_action( 'wp_login', $auth->user_login, $auth );
        $data = array(
            'update' => true,
            'status' => '<p class="success">'.__('Please wait...','sage').'</p>',
            'redirect' => '/',
        );
    }

    if(empty($data))
        $data = array(
            'update'=>false,
            'status' => '<p class="error">'.__('Unknow error','sage').'</p>',
        );

    echo json_encode($data);

    wp_die();
}


function validate_email() {
    if (($_GET['email'])) {
        if (!email_exists($_GET['email']))
            echo "true";
        else
            echo "false";

    }

    die();
}

function ajax_reset()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-reset-nonce', 'security' );

    if($_POST['email']) {

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array(
                'update'=>false,
                'status' => '<p class="error">Email address '.$_POST['email'].' is incorrect</p>',
            ));
            wp_die();
        }

        if( $user = get_user_by( 'email', $_POST['email']) ) {

            $pass = wp_generate_password();

            wp_mail($_POST['email'], 'Reset password', 'Новый пароль ' . $pass );

            $data = array(
                'update'=>true,
                'status' => '<p>Новый пароль отправлен на email.</p>',
                'data' => $user
            );


            wp_send_json($data);

        } else {
            $data = array(
                'update'=>false,

                'status' => '<p class="error">'.sprintf(__('User with email %s does not exist','sage'),$_POST['email']).'</p>',
            );
        }

    }




    if(empty($data))
        $data = array(
            'update'=>false,
            'status' => '<p class="error">'.__('Unknow email','sage').'</p>',
        );

    echo json_encode($data);

    wp_die();

}





