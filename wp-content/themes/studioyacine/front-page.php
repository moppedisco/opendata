<?php get_header(); ?>

<?php get_template_part('templates/intro', 'home'); ?>

<main id="" class="main" role="main" itemscope itemprop="mainContentOfPage">

	<?php if (get_field('projects_title')) : ?>
		<div class='SectionHeader'>
			<strong><?php the_field('projects_title'); ?></strong>
			<a href="<?php echo get_post_type_archive_link('project'); ?>">All Projects</a>
		</div>
	<?php endif; ?>
	<?php get_template_part_with_params('templates/module', 'teasers', ['id' => 'projects']); ?>

	<?php // get_template_part_with_params('templates/module', 'teasers', ['id' => 'news']); 
	?>

</main>

<?php get_footer(); ?>