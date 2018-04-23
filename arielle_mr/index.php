<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Arielle
 */
global $ariella_options; 
get_header();
$a = get_post_meta( get_the_ID(), 'arielle_custom_header', true );
$b = get_post_meta( get_the_ID(), 'arielle_custom_header_para', true );
 
?>
      <div class="breadcrumbs">
        <div class="container-fluid">
            <?php the_breadcrumb();?>
         </div>
      </div>
       <!-- breadcrumbs -->

       <div class="category__intro">
        <div class="container-fluid">
          <div class="category__intro__meta">
            <h1><?php echo $a;?></h1>
            <p><?php echo $b;?></p>
          </div>

        </div>
       </div>
       <!-- category__intro -->

      <section class="blog__post">
          
        <?php
        if ( have_posts() ) :  
                        /* Start the Loop */
                while ( have_posts() ) :
                        the_post();
single_post_title();
                         get_template_part( 'template-parts/content', get_post_type() );?>

                <?php endwhile;

                the_posts_navigation();

        else :

                get_template_part( 'template-parts/content', 'none' );

        endif;
		?>
          
          
          
          
      </section>
      <!-- blog__post -->
 

		
 
<?php
get_footer();
