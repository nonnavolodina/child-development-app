<ul class="categories">
    <?php
        $categories = get_the_terms( $post->ID, 'category', array('hide_empty' => true) );
        foreach($categories as $category) {
            echo '<li class="categories__category">' . $category->name . '</li>';
        }
    ?>
</ul>