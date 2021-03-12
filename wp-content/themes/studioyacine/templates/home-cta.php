<?php
// ===================================================
// SOCIAL LINKS
// ===================================================
// ===================================================
// ===================================================
?>
<?php if (have_rows('Links')) : ?>
    <ul class='HomeCTA'>
        <?php while (have_rows('Links')) : the_row(); ?>
            <?php
            $link = get_sub_field('link');
            $icon = get_sub_field('icon');
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <li>
                <a target="<?php echo esc_attr($link_target); ?>" title='<?php echo $link['title']; ?>' href="<?php echo $link['url']; ?>">
                    <?php echo $link['title']; ?>
                    <?php
                    if (!empty($icon))
                        echo ea_icon(array('icon' => $icon, 'group' => 'utility'));
                    ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>