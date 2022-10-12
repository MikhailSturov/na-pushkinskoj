
<?php
/*
Template Name: Контакты
*/
?>
<?php get_header('page'); ?>

    <main class="page-main page-main--contacts page-main__wrapper">
      <div class="contacts">
        <div class="contacts__wrapper">
          <h2 class="contacts__title"><span class="contacts__sub-title"><?php the_field('organisation_type', 'options'); ?></span> <?php the_field('organisation_title', 'options'); ?></h2>
          <div class="contacts__information">
            <p class="contacts__adress">Наш центр находится по адресу <span></br><?php the_field('post_index', 'options'); ?>, <?php the_field('adress', 'options'); ?></span></p>
            <p class="contacts__phone">
              <span>тел.:</span>
              <a href="tel:74732772185"> <?php the_field('phone', 'options'); ?></a>
            </p>
            <p class="contacts__email">
              <span>e-mail:</span>
              <a href="mailto:<?php the_field('e-mail', 'options'); ?>"> <?php the_field('e-mail', 'options'); ?></a>
            </p>
            <p class="contacts__opening"><span>Часы работы:</span> <?php the_field('work_time', 'options'); ?></p>
          </div>
          <div class="contacts__map">
            <h2 class="visually-hidden">Карта. <?php the_field('adress', 'options'); ?></h2>
              <iframe class="contacts__map-frame" src="<?php the_field('map_link', 'options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </main>

    <?php get_footer(); ?>


    