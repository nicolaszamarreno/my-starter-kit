<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<div class="content container">
    <div class="col-md-12">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <div id="<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="post-excerpt">
      <?php the_content(); ?>
      </div>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
      <p class="nothing"> 
      Il n'y a pas de Post à afficher !
      </p>
    <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?> 