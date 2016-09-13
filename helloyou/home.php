<?php
/*
Template Name: Page Blog
*/
?>

<?php get_header(); ?>

<div class="content container">
	<div class="row breadcrumb"><?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('');} ?></div>

	<div class="row">
	
		<div class="col-md-8">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<h1 class="post-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>

			<p class="post-info">
				Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
			</p>

			<div class="post-content">
				<?php the_excerpt(); ?>
				<a class="bt" href="<?php echo get_permalink(); ?>"> Lire la suite</a>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		</div>

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>

	</div>
	
</div>

<?php get_footer(); ?> 