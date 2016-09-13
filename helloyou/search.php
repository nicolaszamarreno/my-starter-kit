<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<div class="content container">
  <div class="row breadcrumb"><?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('');} ?></div>

  <div class="row">
    <div class="col-md-8">
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

    <div class="col-md-4">
    <?php get_sidebar(); ?>
    </div>
  </div>

</div>


<?php get_footer(); ?> 