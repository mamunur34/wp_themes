<?php 
/* 
 * Template Name: Home Page Template 
 * 
 */
get_header();

//print_r($ariella_options);

   ?>

 

    <section class="hero" id="hero">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 p-0">
                    
                    <article class="hero__featured post" style="background: url(<?php echo $ariella_options['top_img_src_1'];?>) no-repeat center center;background-size: cover;">
                        <a href="<?php echo $ariella_options['top_link_1'];?>" class="post__content">
                            <div class="heading">
                                <h2><?php echo $ariella_options['top_title_1'];?></h2>
                                <span class="heading__dash green"></span>
                            </div>
                            <div class="content">
                                <p><?php echo $ariella_options['top_para_1'];?>
                                </p>
                            </div>
                        </a>
                    </article>
                    
                </div>
                <div class="col-sm-12 col-md-6 p-0">
                    <article class="hero__featured2 post__thumb2 post" style="background: url(<?php echo $ariella_options['top_img_src_2'];?>) no-repeat center center;background-size: cover;">
                        <a href="<?php echo $ariella_options['top_link_2'];?>" class="post__content">
                            <div class="heading">
                                <h2><?php echo $ariella_options['top_title_2'];?></h2>
                                <span class="heading__dash orange"></span>
                            </div>
                            <div class="content">
                                <p><?php echo $ariella_options['top_para_2'];?>
                                </p>
                            </div>
                        </a>
                    </article>
                    <article class="hero__featured2 post__thumb3 post" style="background: url(<?php echo $ariella_options['top_img_src_3'];?>) no-repeat center center;background-size: cover;">
                        <a href="<?php echo $ariella_options['top_link_3'];?>" class="post__content">
                            <div class="heading">
                                <h2><?php echo $ariella_options['top_title_3'];?></h2>
                                <span class="heading__dash orange"></span>
                            </div>
                            <div class="content">
                                <p><?php echo $ariella_options['top_para_3'];?>
                                </p>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </section>
     <!-- hero -->
    <section class="media">
        <div class="container">
            <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000"><?php echo $ariella_options['media_section_headline'];?></h2>
            <img src="<?php echo $ariella_options['logo_img_src'];?>" alt="media image" class="img-fluid">
        </div>
    </section> <!-- media -->
 
    <section class="blog__post">
        <div class="container-fluid">
            <div class="row">
                <?php
                $cat = $ariella_options['post_category_name'];
                $count = $ariella_options['post_count'];
                if ($count == nul){$count = -1; };
                $args = array(
                    'numberposts' => $count,
                     //'cat' => 0,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    //'include' => '',
                   // 'exclude' => '',
                    //'meta_key' => '',
                    //'meta_value' =>'',
                     'post_type' => 'post',
                    //'post_status' => 'draft, publish, future, pending, private',
                    //'suppress_filters' => true,
                    'category_name'=> $cat
                 );
	$recent_posts = wp_get_recent_posts($args);
	foreach( $recent_posts as $recent ):?>
 
                <div class="col-md-4 p-0">
                     
                <?php 
                $featured_img_url = get_the_post_thumbnail_url($recent["ID"],'full');
                if ($featured_img_url):?>
                <div class="blog__post__thumb">
                   <img src="<?php echo $featured_img_url;?>" alt="featured image" class="featured_image img-fluid">
                </div>
                <?php endif;?>
                        <div class="blog__post__block">
                            <a href="<?php echo  get_permalink($recent["ID"])?>">  <h3 class="blog__post__title" data-aos="fade-up" data-aos-duration="600"> <?php echo $recent["post_title"]?></h3> </a>
                            <span class="heading__dash green" data-aos="fade-up" data-aos-duration="600"></span>
                            <p data-aos="fade-up" data-aos-duration="800">
                                <?php echo $recent["post_content"]?>
                            </p>
                            <a href="<?php echo  get_permalink($recent["ID"])?>" class="read__more" data-aos="fade-up" data-aos-duration="1000">See More</a>
                        </div>
                    </a>
                </div>
                <?php 
                    endforeach;
                    wp_reset_query();
                    ?>
                
 
                
                
            </div>
        </div>
    </section> <!-- blog__post -->
    
    
   

<?php
get_footer();