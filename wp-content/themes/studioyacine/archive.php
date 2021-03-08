<?php get_header(); ?>

<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage">

	<div class="article-header">

		<?php get_template_part_with_params('templates/module', 'intro', ['id' => 'projects_intro']); ?>

	</div>

	<?php if (have_posts()) : ?>

		<div class="TeaserGrid">

			<?php while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

					<?php get_template_part('templates/teaser', 'small');
					?>

				</article>

			<?php endwhile; ?>

		</div>

		<?php bones_page_navi(); ?>

	<?php else : ?>

		<article id="post-not-found" class="hentry ">
			<header class="article-header">
				<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
			</section>
			<footer class="article-footer">
				<p><?php _e('This is the error message in the archive.php template.', 'bonestheme'); ?></p>
			</footer>
		</article>

	<?php endif; ?>

</main>

<?php get_footer(); ?>