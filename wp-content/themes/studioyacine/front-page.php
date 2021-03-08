<?php get_header(); ?>

<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage">

	<?php // get_template_part('templates/home/intro'); 
	?>
	<?php get_template_part_with_params('templates/module', 'intro', ['id' => 'intro_text', "variant" => "home"]); ?>

	<div class="inner-wrapper">

		<?php get_template_part_with_params('templates/module', 'teasers', ['id' => 'projects']); ?>

		<?php // get_template_part_with_params('templates/module', 'teasers', ['id' => 'news']); 
		?>

	</div>

</main>

<?php get_footer(); ?>