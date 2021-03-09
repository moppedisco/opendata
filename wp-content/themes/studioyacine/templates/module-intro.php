<?php
// ===================================================
// Intro
// ===================================================
// ===================================================
// ===================================================
?>
<?php
$intro = get_field(get_template_param('id'), 'option');
?>
<section class="Intro">
    <?php if ($intro) : ?>

        <strong><?php echo $intro; ?></strong>

    <?php else : ?>
        <h1><?php the_title(); ?></h1>
    <?php endif; ?>
</section>