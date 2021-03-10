<?php
// ===================================================
// Article Teasers
// ===================================================
// ===================================================
// ===================================================
?>


<?php
$id = get_template_param('id');
$posts = get_template_param('posts');
$gridsize = (get_template_param('gridsize') ? get_template_param('gridsize') : '2');
$args = array(
    'post_type' => $id,
    'order'     => 'ASC',
    'post_status' => 'publish',
    'posts_per_page' => $posts
);
$news = new WP_Query($args);
?>

<ul class="TeaserGrid <?php echo 'TeaserGrid--' . $id ?> <?php echo 'size--' . $gridsize ?> ">

    <?php if ($news->have_posts()) : while ($news->have_posts()) : $news->the_post(); ?>

            <?php setup_postdata($post); ?>

            <li class='TeaserGrid--item'>
                <?php $args = array('date' => true); ?>
                <?php get_template_part('templates/teaser', 'small', $args); ?>

            </li>

            <?php wp_reset_postdata(); ?>

        <?php endwhile;
    else : ?>
</ul>

<?php endif; ?>