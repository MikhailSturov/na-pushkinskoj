<?php get_header('categories'); ?>

<main class="page-main page-main--inner">
    <div class="page-main__wrapper">
      <ul class="all-news__list">

      <?php 
        if (have_posts()) {
          while (have_posts()) {
            the_post();
      ?>

      <li class="all-news__item">
          <a href="<?php the_permalink(); ?>" class="all-news__link">
            <?php the_post_thumbnail('thumbnail'); ?>
            <div class="all-news__container">
            <div class="all-news__title-container">
              <h3 class="all-news__sub-title"><?php the_title(); ?></h3>
              <time class="all-news__date" datetime=""><?php the_time('j F Y') ?></time>
            </div>
            <div class="all-news__paragraph-container">
              <?php the_excerpt(); ?>
            </div>
          </div>
            </a>
        </li>

      <?php
          }
        } 
      ?>

      </ul>
      <?php the_posts_pagination ( array(
        'end_size' => 0,
        'mid_size' => 1,
        'prev_text' => __('«'),
        'next_text' => __('»'),
) ); ?>
    </div>
  </main>

  <?php get_footer(); ?>