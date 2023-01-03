<?php 

// show_admin_bar( false );

include 'inc/api.php';
include 'inc/actions.php';

function load_style_script(){
	wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');



    
	wp_enqueue_script('jquery');
	wp_enqueue_script('nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.js', array(), false, true);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), false, true);
	wp_enqueue_script('jstyling', get_template_directory_uri() . '/assets/js/jquery.jstyling.js', array(), false, true);
	wp_enqueue_script('barrating', get_template_directory_uri() . '/assets/js/jquery.barrating.js', array(), false, true);
    wp_enqueue_script('bPopup', get_template_directory_uri() . '/assets/js/bPopup.js', array(), false, true);




    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
	wp_enqueue_script('twitter', 'https://platform.twitter.com/widgets.js', array(), false, true);

    if(basename(get_page_template()) == "profile.php"){


        wp_enqueue_style('dropzone',   'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css');


        wp_enqueue_script('dropzone',  'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js', array(), false, 1);

    }

    wp_enqueue_script('jqueryvalidation',  'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js', array(), false, 1);
    wp_enqueue_script('jqueryvalidation_ru',  'https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_ru.js', array(), false, 1);

    wp_enqueue_script('actions', get_template_directory_uri() . '/assets/js/actions.js', array(), false, true);



    wp_localize_script( 'actions', 'global', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}



add_action('wp_enqueue_scripts', 'load_style_script');



add_action('after_setup_theme', function(){
	register_nav_menus( array(
		
	) );
});



add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function custom_language_switcher(){
	$languages = icl_get_languages('skip_missing=0&orderby=id&order=desc');
	if(!empty($languages)){

		foreach($languages as $index => $language){
			if($language['active'] === '1') echo '<a href="' . $language['url'] . '" class="lang-switch-trigger">' . mb_strtoupper($language['code']) . '</a>';
		}

		echo '<ul>';

		foreach($languages as $index => $language){

			if($language['active'] !== '1') echo '<li><a href="' . $language['url'] . '">' . mb_strtoupper($language['code']) . '</a></li>';

		}

		echo '</ul>';

	}
}



add_filter( 'script_loader_tag', 'add_async_attribute', 10, 2 );
function add_async_attribute( $tag, $handle ) {
    if ( 'twitter' !== $handle ) {
        return $tag;
    }
 
    return str_replace( ' src', ' async src', $tag );
}



add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{   
    if(in_array('home', $type))
    {
        $title = __('Home', 'Crypto');
    }
    return $title;
}



add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'crypto_banner',
            'title'             => __('Баннер'),
            'description'       => __('Добавление баннера'),
            'render_template'   => 'parts/blocks/banner.php',
            'category'          => 'common',
            'post_types'        => array('exchange'),
        ));

        acf_register_block_type(array(
            'name'              => 'crypto_banner_mob',
            'title'             => __('Баннер (мобильная версия)'),
            'description'       => __('Добавление баннера'),
            'render_template'   => 'parts/blocks/banner_mob.php',
            'category'          => 'common',
            'post_types'        => array('exchange'),
        ));

        acf_register_block_type(array(
            'name'              => 'crypto_quote',
            'title'             => __('Цитата (crypto)'),
            'description'       => __('Добавление цитаты'),
            'render_template'   => 'parts/blocks/quote.php',
            'category'          => 'common',
            'post_types'        => array('exchange'),
        ));
    }
}