<?php
// ===================================================
// Intro
// ===================================================
// ===================================================
// ===================================================
?>
<?php
$prefix = get_template_param('prefix');
$title = get_field($prefix . '_title', 'option');
$intro = get_field($prefix . '_intro', 'option');
?>
<section class="Intro">

    <?php if ($intro) : ?>

        <strong><?php echo $intro; ?></strong>

    <?php else : ?>

        <?php if ($title) : ?>

            <h1><?php echo $title; ?></h1>

        <?php else : ?>

            <h1><?php post_type_archive_title(); ?></h1>

        <?php endif; ?>

    <?php endif; ?>

</section>