<?php
/*
Page default
*/
?>

<?php get_header(); ?>

<div class="content container">

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div <?php post_class(); ?>>
       <?php the_content(); ?>
      </div>
    <?php endwhile; ?>

    <?php else : ?>
      <!-- There are not posts here :'( -->
    <?php endif; ?>
    
</div>

<?php get_footer(); ?>