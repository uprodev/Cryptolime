</div>

<!-- end content-->

<!-- start page footer-->
<footer class="page-footer">
  <div class="footer-bg"></div>
  <div class="inner">
    <div class="container">
      <div class="wrapper">
        <div class="footer-subscription">

          <?php if ($field = get_field('form_footer', 'option')): ?>
            <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="subscription-form"]') ?>
          <?php endif ?>
          
        </div>
        <div class="footer-info">

          <?php if ($field = get_field('logo_footer', 'option')): ?>
            <div class="footer-logo">
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            </div>
          <?php endif ?>

          <div class="footer-info-row">

            <?php if( have_rows('texts_footer', 'option') ): ?>
              <?php while( have_rows('texts_footer', 'option') ): the_row(); ?>

                <?php if ($field = get_sub_field('text')): ?>
                  <div class="footer-info-col">
                    <p><?= $field ?></p>
                  </div>
                <?php endif ?> 

              <?php endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
        <div class="footer-contact d-none d-lg-block">

          <?php if ($field = get_field('contact_title_footer', 'option')): ?>
            <div class="h3"><?= $field ?></div>
          <?php endif ?>
          
          <?php if ($field = get_field('email_footer', 'option')): ?>
            <a href="mailto:<?= $field ?>"><?= $field ?></a>
          <?php endif ?>
          
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div class="footer-contact d-lg-none">

          <?php if ($field = get_field('contact_title_footer', 'option')): ?>
            <div class="h3"><?= $field ?></div>
          <?php endif ?>
          
          <?php if ($field = get_field('email_footer', 'option')): ?>
            <a href="mailto:<?= $field ?>"><?= $field ?></a>
          <?php endif ?>
          
        </div>

        <?php if( have_rows('socials_footer', 'option') ): ?>

          <div class="socials">

            <?php while( have_rows('socials_footer', 'option') ): the_row(); ?>

              <a href="<?php the_sub_field('link') ?>" target="_blank">

                <?php if ($field = get_sub_field('icon')): ?>
                  <span class="inner">
                    <?= wp_get_attachment_image($field['ID'], 'full') ?>
                  </span>
                <?php endif ?>

              </a>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>
      <div class="footer-bottom">

        <?php if ($field = get_field('copyright_footer', 'option')): ?>
          <div class="copyright"><?= $field ?></div>
        <?php endif ?>
        
        <?php if ($field = get_field('link_footer_1', 'option')): ?>
          <div class="privacy">
            <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          </div>
        <?php endif ?>

        <?php if ($field = get_field('link_footer_2', 'option')): ?>
          <div class="conditions">
            <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          </div>
        <?php endif ?>

      </div>
    </div>
  </div>
</footer>
<!-- end page footer-->
</div>

<!-- start popup login-->
<div id="popupLogin" class="popup">
    <div class="inner">
        <h3>ВОЙТИ В АККАУНТ</h3>
        <form class="form loginform" action="#" novalidate>
            <div class="field">
                <input type="text" name="login" placeholder="Логин *" required />
            </div>
            <div class="field">
                <input type="password" name="password"  placeholder="Пароль" required />
                <button type="button" class="pass-switch">
                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 6.5C0 6.5 2.625 2 7 2C11.375 2 14 6.5 14 6.5C14 6.5 11.375 11 7 11C2.625 11 0 6.5 0 6.5ZM7 9.36364C7.81223 9.36364 8.59118 9.06193 9.16551 8.5249C9.73984 7.98786 10.0625 7.25948 10.0625 6.5C10.0625 5.74052 9.73984 5.01214 9.16551 4.4751C8.59118 3.93807 7.81223 3.63636 7 3.63636C6.18777 3.63636 5.40882 3.93807 4.83449 4.4751C4.26016 5.01214 3.9375 5.74052 3.9375 6.5C3.9375 7.25948 4.26016 7.98786 4.83449 8.5249C5.40882 9.06193 6.18777 9.36364 7 9.36364Z" fill="#6D6969" />
                        <line x1="1.70711" y1="1" x2="12.3137" y2="11.6066" stroke="#6D6969" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
            <p><a href="#" class="resetpass">Сбросить пароль</a></p>
            <div class="submit">
                <button type="submit" class="btn btn-lime">Войти</button>
            </div>

            <input type="hidden" name="action" value="ajax_login">
            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>

            <div class="result-login"></div>
        </form>


        <form style="display: none" class="form lostpasswordform" name="lostpasswordform" id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
            <div class="field">
                <input name="email" class="reset__fields_email field__input" type="email" placeholder="Введите email" required>
            </div>

            <p><a href="#" class="resetpasshide">Логин</a></p>

            <div class="submit">
                <button type="submit"  name="wp-submit"  class="btn btn-lime">Сбросить пароль</button>
            </div>


            <input type="hidden" name="action" value="ajax_reset">
            <?php wp_nonce_field( 'ajax-reset-nonce', 'security' ); ?>
            <div class="result-reset"></div>
        </form>


    </div>
</div>
<!-- end popup login-->

<!-- start popup register-->
<div id="popupRegister" class="popup">
    <div class="inner">
        <h3>ЗАРЕГИСТРИРОВАТЬСЯ</h3>
        <form class="form registerform" action="#" novalidate>
            <div class="field">
                <input type="text" name="login" placeholder="Логин *" required />
            </div>
            <div class="field">
                <input  minlength="8" id="pass" name="password" type="password" placeholder="Пароль" required />
                <button type="button" class="pass-switch">
                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 6.5C0 6.5 2.625 2 7 2C11.375 2 14 6.5 14 6.5C14 6.5 11.375 11 7 11C2.625 11 0 6.5 0 6.5ZM7 9.36364C7.81223 9.36364 8.59118 9.06193 9.16551 8.5249C9.73984 7.98786 10.0625 7.25948 10.0625 6.5C10.0625 5.74052 9.73984 5.01214 9.16551 4.4751C8.59118 3.93807 7.81223 3.63636 7 3.63636C6.18777 3.63636 5.40882 3.93807 4.83449 4.4751C4.26016 5.01214 3.9375 5.74052 3.9375 6.5C3.9375 7.25948 4.26016 7.98786 4.83449 8.5249C5.40882 9.06193 6.18777 9.36364 7 9.36364Z" fill="#6D6969" />
                        <line x1="1.70711" y1="1" x2="12.3137" y2="11.6066" stroke="#6D6969" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
            <div class="field">
                <input data-rule-equalTo="#pass" name="password2" type="password" placeholder="Повторите пароль" required />
                <button type="button" class="pass-switch">
                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 6.5C0 6.5 2.625 2 7 2C11.375 2 14 6.5 14 6.5C14 6.5 11.375 11 7 11C2.625 11 0 6.5 0 6.5ZM7 9.36364C7.81223 9.36364 8.59118 9.06193 9.16551 8.5249C9.73984 7.98786 10.0625 7.25948 10.0625 6.5C10.0625 5.74052 9.73984 5.01214 9.16551 4.4751C8.59118 3.93807 7.81223 3.63636 7 3.63636C6.18777 3.63636 5.40882 3.93807 4.83449 4.4751C4.26016 5.01214 3.9375 5.74052 3.9375 6.5C3.9375 7.25948 4.26016 7.98786 4.83449 8.5249C5.40882 9.06193 6.18777 9.36364 7 9.36364Z" fill="#6D6969" />
                        <line x1="1.70711" y1="1" x2="12.3137" y2="11.6066" stroke="#6D6969" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
            <div class="field">
                <input type="email" name="email" placeholder="Почта" required />
            </div>
            <div class="field">
                <input type="tel" name="phone" placeholder="Номер телефона" required />
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-lime">Зарегистрироваться</button>
            </div>

            <input type="hidden" name="action" value="ajax_registration">
            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
        </form>
        <div class="result-register"></div>
    </div>
</div>
<!-- end popup register-->



<?php wp_footer(); ?>
</body>
</html>