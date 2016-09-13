<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
?> 

<?php get_header(); ?>

<div class="content container">
	<div class="row breadcrumb"><?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('');} ?></div>

      <div class="nothing"> 
        Oups ! Il n'y a pas de page à afficher ! Essayer de revenir sur la page d'<a href="/">accueil</a>. Nous ferons mieux la prochaine fois.
      </div>

</div>

<?php get_footer(); ?> 