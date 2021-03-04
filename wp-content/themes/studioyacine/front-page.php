<?php get_header(); ?>

<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage">

	<?php get_template_part('templates/home/intro'); ?>

	<div class="inner-wrapper">

		<?php get_template_part_with_params('templates/module', 'teasers', ['id' => 'projects']); ?>

		<?php get_template_part_with_params('templates/module', 'teasers', ['id' => 'projects']); ?>

	</div>

</main>

<?php get_footer(); ?>