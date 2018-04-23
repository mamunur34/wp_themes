<?php
$banner = false;
$y = get_post_meta( get_the_ID(), 'arielle_banner_img_url', true );
if ( isset( $y ) || !empty( $y ) ) {
	if ( strlen( $y ) > 5 ) {
            $banner = true;
		echo '<style>.single__blog__thumb1{background-image: url(' . $y . ' )}</style>';
	}
}

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

 $class = "";
 if (is_singular()):
         $class .= "col-md-12";?>

      <div class="single__blog">
        <?php if ($banner):?>
                <div class="single__blog__thumb1"></div>
        <?php endif;?>
        <div class="container single__blog__container">
          <h2 class="single__blog__quote">
             <?php echo get_the_title();?>
          </h2>
	<?php the_content();  ?>
       
	</div>

        
      </div>
<?php
 
   else:
      $class .= " col-md-4";
      $class .= " mr_min_heigh_830";?>

      
<div class="<?php  echo $class;?> p-0" style="float: left;">
     <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="container-fluid">
        <a href="<?php echo get_permalink();?>" class="blog__post__content">
          
                <?php if ($featured_img_url):?>
                <div class="blog__post__thumb">
                   <img src="<?php echo $featured_img_url;?>" alt="featured image" class="featured_image img-fluid">
                </div>
                <?php endif;?>
          <div class="blog__post__block">
            <h3 class="blog__post__title" data-aos="fade-up" data-aos-duration="600">
              <?php echo get_the_title();?>
            </h3>
            <span class="heading__dash green" data-aos="fade-up" data-aos-duration="600"></span>
            <p data-aos="fade-up" data-aos-duration="800">
             <?php 
                    
                   the_excerpt();
                    ?>
            </p>
            <a href="<?php echo get_permalink();?>" class="read__more" data-aos="fade-up" data-aos-duration="1000">See More</a>
          </div>
        </a>
      </div>


</div>
  
 
 <?php endif;//is_singular
 ?>

