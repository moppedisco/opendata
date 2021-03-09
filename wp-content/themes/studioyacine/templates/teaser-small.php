<?php
// ===================================================
// Small Teaser
// ===================================================
// ===================================================
// ===================================================
?>

<a class='Teaser' title="<?php the_title_attribute(); ?>" href='<?php the_permalink() ?>'>

    <div class="Teaser--image">

        <?php the_post_thumbnail('teaser-small'); ?>

    </div>

    <div class='Teaser--text'>

        <h3 class='Teaser--title'><?php the_title(); ?></h3>

        <?php the_excerpt(); ?>

    </div>

</a>