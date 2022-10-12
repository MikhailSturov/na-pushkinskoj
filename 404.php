<?php
/**
 * The template for displaying 404 pages (not found)
 */
?>

<?php get_header('404'); ?>

<main class="page-main page-main--inner page-main--404">
    <div class="page-main__wrapper page-main__wrapper--page page-main__wrapper--inner">
			<article class="error-container">
				<img class="error-img" src="<?php echo get_template_directory_uri() . '/assets/images/logo-404.svg'; ?>" alt="Ошибка 404">
				<h2 class="error-title">Такой страницы не существует!</h2>
				<p class="error-paragraph">Попробуйте воспользоваться поиском.</p>
			</article>
    </div>
</main>	

<?php get_footer(); ?>
