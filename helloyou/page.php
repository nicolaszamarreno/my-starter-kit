<?php
/*
Page default
*/
?>

<?php get_header(); ?>

<div class="content container">
  <div class="row breadcrumb"><?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('');} ?></div>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div <?php post_class(); ?>>
       <?php the_content(); ?>
      </div>
    <?php endwhile; ?>

    <?php else : ?>
    <div class="nothing"> 
    Il n'y a pas de Post à afficher !
    </div>
    <?php endif; ?>
    
</div>

<?php get_footer(); ?>