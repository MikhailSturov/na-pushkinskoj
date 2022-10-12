<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package skyland
 */

get_header('post');
?>

	<main id="primary" class="page-main page-main--inner page-main--news">
	<div class="page-main__wrapper page-main__wrapper--news">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
