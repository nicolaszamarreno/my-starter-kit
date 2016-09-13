<?php
/*
Page category
*/
?>

<?php get_header();?>


<!-- CORE JQUERY SCRIPTS -->
<script src="/wp-content/themes/vikser/js/isotope.pkgd.min.js"></script>

<div class="content container">
    <div class="row breadcrumb"><?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('');} ?></div>
    <div class="row">
     



      <div class="col-md-12 titre_filter">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <h2 class="section-title">Actualités</h2>
          </div>

           <?php $categories = get_categories( $args );
            $args = array(
              'orderby' => 'id',
              'order' => 'ASC',
              'parent' => '4'
              );
            $categories = get_categories($args);
          ?>

          <div class="col-md-8 col-xs-12 right">
            <div id="filters" class="button-group">
              <button class="button is-checked" data-filter=":not(.button)">Toutes l'actualités</button>
              <?php foreach($categories as $category) { ?>          
                <button class="button <?php echo $category->slug; ?>" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->cat_name; ?></button>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>


<div class="col-md-12">
        <div class="row">
          <div class="isotope">
            <?php foreach($categories as $category) { ?>
              <?php query_posts( array ( 'category_name' => $category->slug, 'posts_per_page' => 3) ); ?>
                <?php while (have_posts()) : the_post(); ?>                  
                  <div class="col-md-4 col-sm-6 element-item <?php echo $category->slug; ?>" data-category="<?php echo $category->slug; ?>">
                      <div class="background_article">
                        <?php if ( has_post_thumbnail() ) {
                          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
                        } ?>
                        <a class="see-more fa" href="<?php the_permalink(); ?>"><div class="image-a-la-une" style="background-image: url('<?php echo $image_url[0]; ?>')"></div></a>
                        <div class="separation"></div>
                        <div class="contenu">
                          <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                          </a>
                        </div>
                        <p class="voir-plus"><a class="fa" href="<?php the_permalink(); ?>"><span>En savoir plus</span></a></p>
                      </div>
                  </div>
                <?php endwhile; ?>
               
            <?php } ?>
            <?php wp_reset_query(); ?>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="isotope-button">
            <?php 
              foreach($categories as $category) { 
                $cpt=$category->category_count; //si le nombre d'article est supérieur à 3 on affiche le bouton pour en voir plus, sinon inutile
                if($cpt > 3){
            ?>
              <div id="button-<?php echo $category->slug; ?>" class="col-md-12 element-item button <?php echo $category->slug; ?> center" data-category="<?php echo $category->slug; ?>">
                <hr />
                <button id="append-<?php echo $category->slug; ?>" class="button-more">VOIR PLUS <i id="icon-more-<?php echo $category->slug; ?>" class="fa fa-plus"></i></button>
              </div>
            <?php 
                }
              }
            ?>
          </div>
       </div>
      </div>

   
    </div>
</div>

<script type="text/javascript">
  jQuery( function() {
    // init Isotope
    var $container = jQuery('.isotope').isotope({
      itemSelector: '.element-item',
      layoutMode: 'fitRows'
    });

    var $container_button = jQuery('.isotope-button');

    //////////////////////////////////////////////////////////////// FILTER

    // filter functions
    var filterFns = {
      // show if number is greater than 50
      numberGreaterThan50: function() {
        var number = jQuery(this).find('.number').text();
        return parseInt( number, 10 ) > 50;
      },
      // show if name ends with -ium
      ium: function() {
        var name = jQuery(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };

    // bind filter on load
    var filterValue = ':not(.button)';
    $container.isotope({ filter: filterValue });
    $container_button.isotope({ filter: filterValue });

    // bind filter button click
    jQuery('#filters').on( 'click', 'button', function() {
      var filterValue = jQuery( this ).attr('data-filter');
      // use filterFn if matches value
      filterValue = filterFns[ filterValue ] || filterValue;
      $container.isotope({ filter: filterValue });
      $container_button.isotope({ filter: filterValue });
    });
    // change is-checked class on buttons
    jQuery('.button-group').each( function( i, buttonGroup ) {
      var $buttonGroup = jQuery( buttonGroup );
      $buttonGroup.on( 'click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        jQuery( this ).addClass('is-checked');
      });
    });
    

    ///////////////////////////////////////////////////////////////// APPEND
    <?php foreach($categories as $category) { ?>
      jQuery('#append-<?php echo $category->slug; ?>').on( 'click', function() {
        <?php $cpt=$category->category_count; ?>;
        var nombre_article = <?php echo $cpt; ?>;
        jQuery('#icon-more-<?php echo $category->slug; ?>').attr('class', 'fa fa-spinner fa-pulse');
        var category_name = <?php echo json_encode($category->slug); ?>;
        var offset = jQuery('.col-md-4.element-item.<?php echo $category->slug; ?>').length;
        jQuery.post(
          ajaxurl,
          {
            'action': 'load_more',
            'category_name' : category_name,
            'offset' : offset 
          },         
          function( response ){

            if(response) {
              var $elems = jQuery(response);
              var $container = jQuery('.isotope');
              $container.append( $elems ).isotope( 'appended', $elems );
              jQuery('#icon-more-<?php echo $category->slug; ?>').attr('class', 'fa fa-plus');
            } else {              
              jQuery('#append-<?php echo $category->slug; ?>').attr('disabled', true);
              jQuery('#icon-more-<?php echo $category->slug; ?>').attr('class', 'fa fa-times');
            }

            console.log(nombre_article);
            console.log(jQuery('.col-md-4.element-item.<?php echo $category->slug; ?>').length);
            console.log('coucou');

            if(nombre_article == jQuery('.col-md-4.element-item.<?php echo $category->slug; ?>').length){
              jQuery('#button-<?php echo $category->slug; ?>').remove();
              jQuery('.isotope-button').css('height','0px');
            }
          }
        );
      });
    <?php } ?>
  });
</script>

<?php get_footer(); ?> 