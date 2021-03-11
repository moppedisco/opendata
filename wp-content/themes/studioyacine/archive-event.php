<?php get_header(); ?>

<?php $args = array('prefix' => 'event'); ?>
<?php get_template_part('templates/intro/archive', null, $args); ?>

<main id="main" class="main" role="main" itemscope itemprop="mainContentOfPage">

	<?php if (have_posts()) : ?>

		<div class="TeaserGrid size--3">

			<?php while (have_posts()) : the_post(); ?>

				<div class="TeaserGrid--item">

					<?php $args = array('text' => false, 'date' => true); ?>
					<?php get_template_part('templates/teasers/teaser', 'grid', $args); ?>

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