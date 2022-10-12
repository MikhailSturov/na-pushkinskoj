<?php
/*
Template Name: Сведения об образовательной организации
*/
?>
<?php get_header('about'); ?>

<main class="page-main page-main--page">
    <div class="page-main__wrapper page-main__wrapper--page">
      <div class="side-nav side-nav--nojs">
        <button class="side-nav__toggle" type="button"><span class="visually-hidden">Открыть меню</span></button>
      <div class="side-nav__wrapper">
        <h3 class="side-nav__item--current">Навигация</h3>
        <?php wp_nav_menu(array(
          'theme_location' => 'side',
          'container' => null,
          'menu_class' => 'side-nav__list',
          'menu_id' => ' '
        ));?>
      </div>
    </div>
      <div class="page__wrapper page__wrapper--inner">
          <?php the_content();?>
      </div>
    </div>
  </main>

<?php get_footer(); ?>