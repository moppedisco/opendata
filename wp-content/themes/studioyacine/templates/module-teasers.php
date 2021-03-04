<?php
// ===================================================
// Article Teasers
// ===================================================
// ===================================================
// ===================================================
?>
<?php
$featured_posts = get_field(get_template_param('id'));
?>

<?php if ($featured_posts) : ?>

    <ul class="TeaserGrid">

        <?php foreach ($featured_posts as $post) : ?>

            <li class='TeaserGrid--item'>
                <?php get_template_part('templates/teaser', 'small');
                ?>
            </li>

        <?php endforeach; ?>

        <?php wp_reset_postdata(); ?>

    </ul>

<?php endif; ?>