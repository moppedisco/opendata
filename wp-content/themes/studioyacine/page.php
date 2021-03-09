<?php get_header(); ?>

<?php get_template_part_with_params('templates/page', 'intro', ['id' => 'intro']); ?>

<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

	<div class="SimplePage">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

					<div class="SimplePage--body">

						<?php the_content(); ?>

					</div>

				</article>

			<?php endwhile; ?>

		<?php else : ?>

			<article id="post-not-found" class="hentry cf">
				<header class="article-header">
					<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
				</header>
			</article>

		<?php endif; ?>

	</div>

</main>

<?php get_footer(); ?>