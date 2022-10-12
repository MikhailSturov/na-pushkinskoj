<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package skyland
 */
?>

<?php get_header('search'); ?>
<main class="page-main page-main--inner">
	<div class="page-main__wrapper page-main__wrapper--search page-main__wrapper--inner">
    	<div class="page__wrapper page__wrapper--inner page__wrapper--search">		
			
			<h3 class="search-title">Результаты по запросу: "<?php echo $_GET['s'];?>"</h3>
 				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				 <article class="search-result">
				 	<a class="search-result__link" href="<?php the_permalink();?>"><?php the_title(); ?></a>
				 </article>	
 				<?php endwhile; else: ?>
 			<p>Поиск не дал результатов.</p>
 				<?php endif;?>

				 <?php the_posts_pagination ( array(
        'end_size' => 0,
        'mid_size' => 1,
        'prev_text' => __('«'),
        'next_text' => __('»'),
) ); ?>
		</div>
    </div>
</main><!-- #main -->

<?php get_footer(); ?>
    