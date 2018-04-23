<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {?>
      <section class="blog__post">
        <div class="container-fluid">
          <h2 class="heading__related">RELATED</h2>
          <div class="row">
<?php
//echo 'Related Posts';
$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'posts_per_page'=>5,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post();

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>

  <div class="col-md-4 mr_min_heigh_830 p-0" style="float: left;">
     <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="container-fluid">
           
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
<?php
endwhile;
}
wp_reset_query();

echo '</div>
        </div>
      </section>';
}