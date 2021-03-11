<?php
// ===================================================
// Small Teaser
// ===================================================
// ===================================================
// ===================================================
?>
<a class='TeaserNews' title="<?php the_title_attribute(); ?>" href='<?php the_permalink() ?>'>

    <?php// if (has_post_thumbnail()) : ?>

    <div class="TeaserNews--image">

        <?php the_post_thumbnail('small'); ?>

    </div>

    <?php // endif; 
    ?>


    <h3 class='TeaserNews--title'><?php the_title(); ?></h3>

    <time class='TeaserNews--date' datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('d.m.y'); ?></time>


</a>