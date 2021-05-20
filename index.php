<?php get_header(); ?>

<div class="main">
    <div class="container">
        <div class="content">
    	    <?php get_template_part( 'loop', 'index' );	?>
        </div>
        <?php get_sidebar(); ?>
    </div> 
</div>

<?php get_footer(); ?>