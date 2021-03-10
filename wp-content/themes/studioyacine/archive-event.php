<?php get_header(); ?>

<?php get_template_part_with_params('templates/intro', 'archive', ['prefix' => 'events']); ?>

<main id="main" class="main" role="main" itemscope itemprop="mainContentOfPage">

	<?php if (have_posts()) : ?>

		<div class="TeaserGrid">

			<?php while (have_posts()) : the_post(); ?>

				<div class="TeaserGrid--item">

					<?php get_template_part('templates/teaser', 'small'); ?>

				</div>

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