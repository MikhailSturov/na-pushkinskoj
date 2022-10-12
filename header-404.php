<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <meta property="og:title" content="На Пушкинской">
  <meta property="og:site_name" content="Центр развития творчества детей и юношества">
  <meta property="og:url" content="http://na-pushkinskoj.vrn.ru/index.html">
  <meta property="og:image" content="img/og-img.png">

  <link type="image/x-icon" rel="shortcut icon" href="img/favicon.ico">
  <title>МБУДО ЦРТДиЮ На Пушкинской</title>
</head>

<body>

<?php wp_head(); ?>

  <header class="page-header">
    <div class="page-header__wrapper">
      <div class="page-header__container">
        <article class="page-header__blind blind" itemprop="copy">
          <?php echo do_shortcode( '[bvi text=""]' ); ?>
        </article>

      <?php get_sidebar(); ?>

        <div class="page-header__header-contacts header-contacts">
          <p class="header-contacts__paragraph header-contacts__paragraph--email">
            <span>e-mail:</span>
            <a class="header-contacts__link" href="mailto:<?php the_field('e-mail', 'options'); ?>"><?php the_field('e-mail', 'options'); ?></a>
          </p>
          <p class="header-contacts__paragraph header-contacts__paragraph--phone">
            <span>тел.:</span>
            <a class="header-contacts__link" href="tel:74732772185"> <?php the_field('phone', 'options'); ?></a>
          </p>
        </div>
      </div>

      <div class="page-header__logo">
        <img class="page-header__logo-image" src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg'; ?>" width="970"
          alt="Центр развития творчества детей и юношества На Пушкинской">
        <img class="page-header__background-image" src="<?php echo get_template_directory_uri() . '/assets/images/background.svg'; ?>" width="1300"
          alt="Центр развития творчества детей и юношества На Пушкинской">
      </div>

      <nav class="main-nav main-nav--nojs">
        <button class="main-nav__toggle" type="button"><span class="visually-hidden">Открыть меню</span></button>
        <div class="main-nav__wrapper">
        <?php wp_nav_menu(array(
          'theme_location' => 'top-inner',
          'container' => null,
          'menu_class' => 'main-nav__list site-list--inner',
          'menu_id' => ' '
        ));?>
        </div>
      </nav>
    </div>
  </header>