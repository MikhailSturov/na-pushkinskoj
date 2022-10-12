<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyland
 */

?>

	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="news__sub-title news__sub-title--news">', '</h1>' );
	else :
		the_title( '<h2 class="news__sub-title news__sub-title--news"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;

	if ( 'post' === get_post_type() ) :
		?>
	<?php endif; ?>
	<time class="news__date news__date--news" datetime=""><?php the_time('j F Y') ?></time>
	<?php skyland_post_thumbnail(); ?>

	<div class="news__container news__container--news">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'skyland' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skyland' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<a class="button button__all-news news__button" href="<?php echo get_category_link(1); ?>">Все новости</a>


