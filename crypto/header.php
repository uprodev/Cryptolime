<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="utf-8" />
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="page-wrapper">
    <!-- start header-->
    <header id="header" class="header">
      <div class="mobile-menu">
        <div class="inner"></div>
        <div class="container">
          <div class="header-options">
            <div class="theme-switch">
              <a href="#" class="active">
                <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.46786 9.08508C7.53747 9.07332 6.63544 8.72483 5.89656 8.09166C5.15769 7.4585 4.62161 6.57466 4.36844 5.5722C4.11527 4.56973 4.15859 3.50246 4.49193 2.52984C4.82527 1.55722 5.43073 0.731459 6.21786 0.175943C5.82013 0.0601832 5.41095 0.00106853 5 0C3.67392 0 2.40215 0.589809 1.46447 1.63967C0.526784 2.68954 0 4.11347 0 5.5982C0 7.08294 0.526784 8.50686 1.46447 9.55673C2.40215 10.6066 3.67392 11.1964 5 11.1964C5.75123 11.1956 6.49239 11.0029 7.16701 10.6329C7.84163 10.2628 8.4319 9.72523 8.89286 9.06109C8.75165 9.07715 8.6098 9.08516 8.46786 9.08508Z" fill="#B9B9BA" />
                </svg>
              </a>
              <a href="#">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="5" cy="5" r="5" fill="#B9B9BA" />
                </svg>
              </a>
            </div>

            <div class="lang-switch">
              <?php custom_language_switcher() ?>
            </div>
          </div>

          <?php if( have_rows('menu_header', 'option') ): ?>

            <nav class="main-navigation">
              <ul>

                <?php while( have_rows('menu_header', 'option') ): the_row(); ?>

                  <?php if ($field = get_sub_field('link')): ?>
                    <li<?php if(get_row_index() == 1) echo ' class="active"' ?>>
                      <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>>

                        <?php if ($icon = get_sub_field('icon')): ?>
                          <span class="nav-icon">
                            <?= wp_get_attachment_image($icon['ID'], 'full') ?>
                          </span>
                        <?php endif ?>
                        
                        <span class="nav-text"><?= $field['title'] ?></span>
                      </a>
                    </li>
                  <?php endif ?>   

                <?php endwhile; ?>

              </ul>
            </nav>

          <?php endif; ?>

          <?php get_search_form() ?>

        </div>
      </div>
      <div class="container">
        <div class="header-left">

          <?php if ($field = get_field('logo_header', 'option')): ?>
            <div class="logo">
              <a href="<?php echo get_home_url(); ?>">
                <?= wp_get_attachment_image($field['ID'], 'full') ?>
              </a>
            </div>
          <?php endif ?>
          
          <div class="header-options">
            <div class="theme-switch">
              <a href="#" class="active">
                <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.46786 9.08508C7.53747 9.07332 6.63544 8.72483 5.89656 8.09166C5.15769 7.4585 4.62161 6.57466 4.36844 5.5722C4.11527 4.56973 4.15859 3.50246 4.49193 2.52984C4.82527 1.55722 5.43073 0.731459 6.21786 0.175943C5.82013 0.0601832 5.41095 0.00106853 5 0C3.67392 0 2.40215 0.589809 1.46447 1.63967C0.526784 2.68954 0 4.11347 0 5.5982C0 7.08294 0.526784 8.50686 1.46447 9.55673C2.40215 10.6066 3.67392 11.1964 5 11.1964C5.75123 11.1956 6.49239 11.0029 7.16701 10.6329C7.84163 10.2628 8.4319 9.72523 8.89286 9.06109C8.75165 9.07715 8.6098 9.08516 8.46786 9.08508Z" fill="#B9B9BA" />
                </svg>
              </a>
              <a href="#">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="5" cy="5" r="5" fill="#B9B9BA" />
                </svg>
              </a>
            </div>

            <div class="lang-switch">
              <?php custom_language_switcher() ?>
            </div>
          </div>
        </div>

        <div class="header-center">
          <?php get_search_form() ?>
        </div>

        <div class="header-right">
          <div class="header-mobile">
            <a href="#" class="link-search"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/ico-search.svg" alt="" /></a>
            <a href="#" class="link-messages"><img src="<?php bloginfo('template_directory'); ?>/assets/img/icons/icon-bell.svg" alt="" /><span>3</span></a>
            <a href="#" class="link-account"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ava03.png" alt="" /></a>
            <button type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
          </div>
          <div class="header-buttons">


              <?php if (!is_user_logged_in()) { ?>

                <?php if ($field = get_field('link_header_1', 'option')): ?>
                  <a href="#popupLogin" class="btn btn-lime btn-popup"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                <?php endif ?>

                <?php if ($field = get_field('link_header_2', 'option')): ?>
                  <a href="#popupRegister" class="btn btn-popup btn-white-outline"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                <?php endif ?>

            <?php } else { ?>
                  <a href="<?= get_permalink(444) ?>" class="btn btn-lime  ">Личный кабинет</a>
                  <a href="<?= wp_logout_url() ?>" class="btn btn-white-outline  ">Выйти</a>
            <?php } ?>

          </div>
        </div>
      </div>

      <div class="container">

        <?php if( have_rows('menu_header', 'option') ): ?>

          <nav class="main-navigation">
            <ul>

              <?php while( have_rows('menu_header', 'option') ): the_row(); ?>

                <?php if ($field = get_sub_field('link')): ?>
                  <li<?php if(get_row_index() == 1) echo ' class="active"' ?>>
                    <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>>

                      <?php if ($icon = get_sub_field('icon')): ?>
                        <span class="nav-icon">
                          <?= wp_get_attachment_image($icon['ID'], 'full') ?>
                        </span>
                      <?php endif ?>
                      
                      <span class="nav-text"><?= $field['title'] ?></span>
                    </a>
                  </li>
                <?php endif ?>   

              <?php endwhile; ?>

            </ul>
          </nav>

        <?php endif; ?>

      </div>
    </header>
    <!-- end header-->

    <!-- start content-->
    <div class="page-content">
      
      <?php get_template_part('parts/header', 'widget') ?>