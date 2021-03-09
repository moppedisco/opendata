<?php get_header(); ?>

<?php get_template_part('templates/intro', 'home'); ?>

<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage">


	<?php get_template_part_with_params('templates/module', 'teasers', ['id' => 'projects']); ?>

	<?php // get_template_part_with_params('templates/module', 'teasers', ['id' => 'news']); 
	?>

</main>

<?php get_footer(); ?>