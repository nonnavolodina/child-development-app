<ul class="skills">
    <?php
        $skills = get_the_terms( $post->ID, 'skills', array('hide_empty' => true) );
        foreach($skills as $skill) {
            echo '<li class="skills__skill">' . $skill->name . '</li>';
        }
    ?>
</ul>