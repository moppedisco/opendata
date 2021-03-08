<?php
/*
 Template Name: Template - News
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage">

	<header class="article-header">

		<?php get_template_part_with_params('templates/module', 'intro', ['id' => 'projects_intro']); ?>

	</header>

	<?php
	$args = array(
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'post_type' => 'news'
	);
	$news = new WP_Query($args);
	?>

	<?php if ($news->have_posts()) : ?>

		<div class="TeaserGrid">

			<?php while ($news->have_posts()) : $news->the_post(); ?>

				<div class='TeaserGrid--item'>

					<?php get_template_part('templates/teaser', 'small');
					?>

				</div>

			<?php endwhile; ?>

		</div>

	<?php else : ?>

		<article id="post-not-found" class="hentry ">
			<header class="article-header">
				<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
			</section>
			<footer class="article-footer">
				<p><?php _e('This is the error message in the page-service.php template.', 'bonestheme'); ?></p>
			</footer>
		</article>

	<?php endif; ?>

	</article>

</main>

<?php get_footer(); ?>