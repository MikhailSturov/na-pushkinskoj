<?php
/*
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyland
 */
?>
<?php get_header('about'); ?>

<main class="page-main page-main--inner">
    <div class="page-main__wrapper page-main__wrapper--page page-main__wrapper--inner">
      <div class="page__wrapper page__wrapper--inner page__wrapper--page">
          <?php the_content();?>
      </div>
    </div>
  </main>

<?php get_footer(); ?>