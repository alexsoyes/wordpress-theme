<ul>
    <?php
    $categories = get_categories();
    foreach ($categories as $category):
        ?>
        <li>
            <a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name; ?></a>
        </li>
    <?php endforeach; ?>
    <li>
        <a href="https://alexsoyes.com/formation-developpeur/">Formations pour les développeurs</a> (gratuites +
        payantes)
    </li>
</ul>

