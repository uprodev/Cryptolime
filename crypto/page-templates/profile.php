<?php
/*
Template Name: Profile
*/

$user_id = get_current_user_id();
$user = get_userdata($user_id);
$avatar = get_field('avatar', $user) ? get_field('avatar', $user)['url'] :  get_template_directory_uri(). '/assets/img/avatar.jpg';
get_header(); ?>


<div class="container">

    <?php get_template_part('parts/breadcrumbs') ?>

    <div class="profile">
        <div class="page-layout-2col">
            <div class="page-headline">
                <h2>Профиль</h2>
            </div>

            <div class="column-right">
                <div class="profile-image dropzone0">

                    <figure class="avatar_wrap">

                        <img class="old_avatar"  src="<?= $avatar ?>" alt="">
                    </figure>




                    <div class="profile-image-options">
                        <a  class="drop profile-image-edit">
                            <input type="file" style="display:none">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-edit.svg" alt=""></a>


                        <a
                            <?php if (!get_field('avatar', $user)) { ?>
                            style="display: none;"
                            <?php } ?>

                            data-id="<?= get_field('avatar', $user)['ID'] ?>" class="profile-image-delete"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-delete.svg" alt=""></a>

                    </div>
                </div>
            </div>

            <div class="column-left">
                <div class="profile-form">
                    <form action="#" id="profileForm">
                        <div class="profile-form-block profile-form-block--general">
                            <div class="profile-form-field">
                                <label for="lang">
                                    Язык <span class="icon icon-lang"><img src="<?= get_template_directory_uri() ?>/assets/img/icons/ico-world.svg" alt=""></span>
                                </label>
                                <div class="wrap">
                                    <div class="jstyling-select"><div class="jstyling-select-l"><div class="item-default selected"><span>По умолчанию</span></div><div class="item-Русский"><span>Русский</span></div><div class="item-English"><span>English</span></div></div><div class="jstyling-select-s"><div class="jstyling-select-t">По умолчанию</div></div><select class="select" id="lang" style="display: none;">
                                            <option value="default">По умолчанию</option>
                                            <option value="Русский">Русский</option>
                                            <option value="English">English</option>
                                        </select></div>
                                </div>
                            </div>
<!--                            <div class="profile-form-field">-->
<!--                                <label for="theme">-->
<!--                                    Сменить тему <span class="icon icon-theme"><img src="--><?//= get_template_directory_uri() ?><!--/assets/img/icons/ico-theme-dark.svg" alt=""><img src="--><?//= get_template_directory_uri() ?><!--/assets/img/icons/ico-theme-light.svg" alt=""></span>-->
<!--                                </label>-->
<!--                                <div class="wrap">-->
<!--                                    <div class="jstyling-select"><div class="jstyling-select-l"><div class="item-Темная"><span>Темная</span></div><div class="item-Светлая selected"><span>Светлая</span></div></div><div class="jstyling-select-s"><div class="jstyling-select-t">Светлая</div></div><select class="select" id="theme" style="display: none;">-->
<!--                                            <option value="Темная">Темная</option>-->
<!--                                            <option value="Светлая">Светлая</option>-->
<!--                                        </select></div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>

                        <div class="profile-form-block profile-form-block--personal">
                            <h3>Персональные настройки</h3>
                            <div class="profile-form-field">
                                <label for="name">Имя</label>
                                <div class="wrap">
                                    <input required type="text" name="first_name" value="<?= $user->user_firstname ?>" class="text" id="name" placeholder="Михаил">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="name1">Фамилия</label>
                                <div class="wrap">
                                    <input required type="text" name="last_name" value="<?= $user->user_lastname ?>" class="text" id="name1" placeholder="Теткин  ">
                                </div>
                            </div>
<!--                            <div class="profile-form-field">-->
<!--                                <label for="name2">Отчество</label>-->
<!--                                <div class="wrap">-->
<!--                                    <input type="text" class="text" id="name2" value="--><?//= $user->user_lastname ?><!--" placeholder="Сергеевич ">-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="profile-form-field">
                                <label for="nickname">Ник</label>
                                <div class="wrap">
                                    <input readonly type="text" id="nickname" name="user_login" placeholder="<?= $user->user_login ?>">
                                </div>
                            </div>
                            <div class="profile-form-field profile-form-field--textarea">
                                <label for="description">Описание</label>
                                <div class="wrap">
                                    <textarea name="description" id="description"><?= $user->description ?></textarea>
                                    <p class="profile-form-note">
                                    <p class="profile-form-note">Напишите немного о себе. Эта информация может отображаться на сайте</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="profile-form-block profile-form-block--contact">
                            <h3>Контакты</h3>
                            <div class="profile-form-field">
                                <label for="email">Email</label>
                                <div class="wrap">
                                    <input required  type="email" id="email" name="user_email" value="<?= $user->user_email ?>" placeholder="mikhailtietkin@mail.ru">
                                    <p class="profile-form-note">При изменении вам будет выслано письмо на ваш новый адрес для подтверждения. Новый адрес не будет активирован до его подтверждения</p>
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="twitter">Ваше имя на Twitter</label>
                                <div class="wrap">
                                    <input type="text" id="twitter" name="meta[twitter]" value="<?php the_field('twitter', $user) ?>" placeholder="mikhailtietkin1_">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="vk">Ваше имя на профиль в VK</label>
                                <div class="wrap">
                                    <input type="text" name="meta[vk]" value="<?php the_field('vk', $user) ?>" id="vk" placeholder="mikhailtietkin1_">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="instagram">Ссылка на профиль в Instagram</label>
                                <div class="wrap">
                                    <input type="text" name="meta[instagram]" value="<?php the_field('instagram', $user) ?>" id="instagram" placeholder="mikhailtietkin1_">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="linkedin">Ссылка на профиль в LinkedIn </label>
                                <div class="wrap success">
                                    <input type="text" name="meta[linkedin]" value="<?php the_field('linkedin', $user) ?>" id="linkedin" placeholder="mikhailtietkin1_">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="youtube">Ссылка на профиль в YouTube </label>
                                <div class="wrap">
                                    <input type="text" name="meta[youtube]" value="<?php the_field('youtube', $user) ?>" id="youtube" placeholder="mikhailtietkin1_">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="facebook">Ссылка на профиль в Facebook </label>
                                <div class="wrap">
                                    <input type="text" name="meta[facebook]" value="<?php the_field('facebook', $user) ?>"  id="facebook" placeholder="mikhailtietkin1_">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="telegram">Ссылка на канал или чат в Telegram</label>
                                <div class="wrap">
                                    <input type="text" name="meta[telegram]" value="<?php the_field('telegram', $user) ?>" id="telegram" placeholder="mikhailtietkin1_">
                                </div>
                            </div>
                        </div>

                        <div class="profile-form-block">
                            <h3>Управление учетной записью</h3>
                            <div class="profile-form-field">
                                <label for="pass">Новый пароль</label>
                                <div class="wrap">
                                    <input type="text" name="pass" id="pass" placeholder="Установить новый пароль">
                                </div>
                            </div>
                            <div class="profile-form-field">
                                <label for="pass2">Повторите пароль</label>
                                <div class="wrap">
                                    <input data-rule-equalTo="#pass" name="pass2" type="text" id="pass2" placeholder="Установить новый пароль">
                                </div>
                            </div>
                        </div>

                        <div class="profile-form-submit">
                            <button type="submit" class="btn btn-lime">Обновить профиль</button>
                        </div>

                        <input type="hidden" name="action" value="prifile_upd">
                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <?php wp_nonce_field( 'ajax-prifile_upd-nonce', 'security' ); ?>

                    </form>
                    <div class="result"></div>
                </div>
            </div>
        </div>
    </div>

</div>






<?php get_footer(); ?>



