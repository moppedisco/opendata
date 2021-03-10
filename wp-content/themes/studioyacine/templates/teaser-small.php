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

        <?php if (isset($args['date'])) : ?>
            <time class='PostDate' datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('d. F Y'); ?></time>
        <?php endif; ?>

        <h3 class='Teaser--title'><?php the_title(); ?></h3>

        <?php the_excerpt(); ?>

    </div>

</a>