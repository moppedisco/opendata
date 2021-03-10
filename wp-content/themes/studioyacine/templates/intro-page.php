<?php
// ===================================================
// Intro
// ===================================================
// ===================================================
// ===================================================
?>
<?php
$id = get_template_param('id');
if ($id) {
    $intro = get_field($id);
}
?>
<section class="Intro">

    <?php if ($intro) : ?>

        <strong><?php echo $intro; ?></strong>

    <?php else : ?>

        <h1><?php the_title(); ?></h1>

    <?php endif; ?>

</section>