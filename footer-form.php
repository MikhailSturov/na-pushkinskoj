<footer class="page-footer">
    <img class="page-footer__triangle-blue" src="<?php echo get_template_directory_uri() . '/assets/images/triangle-blue.svg'; ?>" width="100%" height="150px">
    <div class="page-footer__container">

      <section class="page-footer__main">
        <div class="page-footer__contacts">
          <h3 class="page-footer__contacts-title">Контакты</h3>
          <p class="page-footer__contacts-adress">
            <span>Адрес:</span> <?php the_field('adress', 'options'); ?></p>
          <p class="page-footer__contacts-email">
            <span>e-mail:</span>
            <a href="mailto:<?php the_field('e-mail', 'options'); ?>"> <?php the_field('e-mail', 'options'); ?></a>
          </p>
          <p class="page-footer__contacts-phone">
            <span>тел.:</span>
            <a href="tel:74732772185"> <?php the_field('phone', 'options'); ?></a>
          </p>
        </div>
        <div class="page-footer__social social">
          <h3 class="social__title">Центр в соцсетях</h3>
          <ul class="social__list">
          <?php 
            $social_arr = get_field('social', 'options'); 
              foreach($social_arr as $social_id):
               $social_image_arr = get_field('social_picture', $social_id);
               $social_image_url = $social_image_arr['url'];
          ?>
          <li class="social__item">
            <a class="social__link" href="<?php the_field('social_link', $social_id); ?>">
              <img class="social__img" src="<?php echo $social_image_url; ?>">
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        </div>
      </section>

      <section class="page-footer__links">
	      <?php wp_nav_menu(array(
          'theme_location' => 'footer-1',
          'container' => null,
          'menu_class' => 'page-footer__links-list',
          'menu_id' => ' '
        ));?>

        <?php wp_nav_menu(array(
          'theme_location' => 'footer-2',
          'container' => null,
          'menu_class' => 'page-footer__links-list',
          'menu_id' => ' '
        ));?>

        <?php wp_nav_menu(array(
          'theme_location' => 'footer-3',
          'container' => null,
          'menu_class' => 'page-footer__links-list',
          'menu_id' => ' '
        ));?>

        <?php wp_nav_menu(array(
          'theme_location' => 'footer-4',
          'container' => null,
          'menu_class' => 'page-footer__links-list',
          'menu_id' => ' '
        ));?>
      </section>

    </div>
  </footer>

  <section class="popup popup-successful popup-successful--inactive">
    <div class="popup-successful__wrapper">
      <p class="popup-successful__paragraph"><span>Ваша заявка успешно отправлена</span></br> В ближайшее время мы
        свяжемся с вами</p>
      <button class="button button-close" type="button">Закрыть</button>
    </div>
  </section>

  <?php wp_footer(); ?>
</body>

</html>