	<footer class="Footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

		<div class="Footer--top">

			<div class="Footer--text">
				<strong>Contact</strong>
				<?php $text = get_field('footer_text', 'option'); ?>
				<?php echo $text; ?>
			</div>

			<nav role="navigation">
				<strong>Links</strong>
				<?php wp_nav_menu(array(
					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
					'container_class' => 'Footer--links',         // class of container (should you choose to use it)
					'menu' => __('Footer Links', 'bonestheme'),   // nav name
					'menu_class' => 'nav footer-nav',            // adding custom nav class
					'theme_location' => 'footer-links',             // where it's located in the theme
					'before' => '',                                 // before the menu
					'after' => '',                                  // after the menu
					'link_before' => '',                            // before each link
					'link_after' => '',                             // after each link
					'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
				)); ?>
			</nav>
			<div>
				<strong>Social</strong>
				<?php get_template_part('templates/global', 'sociallinks'); ?>
			</div>

		</div>

		<div class="Footer--bottom">

			<?php the_field('legal_text', 'option'); ?>
		</div>

	</footer>

	</div>

	<?php // all js scripts are loaded in library/bones.php 
	?>
	<?php wp_footer(); ?>
	<?php get_template_part('templates/svgsprite'); ?>

	</body>

	</html> <!-- end of site. what a ride! -->