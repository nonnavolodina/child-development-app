<ul class="subjects-ages">
    <div class="subjects-ages__subjects">
        <?php
            $subjects = get_the_terms( $post->ID, 'subject', array('hide_empty' => true) );
            foreach($subjects as $subject) {
                echo '<button class="subjects__subject subjects__subject--' . $subject->slug . '">' . $subject->name . '</button>';
            }
        ?>
    </div>
    <div class="subjects-ages__ages">
        <?php
            $ages = get_the_terms( $post->ID, 'age', array('hide_empty' => true) );
            foreach($ages as $age) {
                echo '<button class="ages__age">' . $age->name . '</button>';
            }
        ?>
    </div>
</ul>