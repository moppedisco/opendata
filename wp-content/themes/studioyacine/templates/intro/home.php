<?php
// ===================================================
// Intro
// ===================================================
// ===================================================
// ===================================================
?>
<?php
$intro = get_field('intro_text');
?>

<?php if ($intro) : ?>

    <section class="HomeIntro">

        <?php echo $intro; ?>

    </section>

<?php endif; ?>