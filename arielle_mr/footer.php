<?php 
global $ariella_options; 
?>
    <footer id="colophon" class="site-footer">
        <img src="<?php echo $ariella_options['footer_bg_img1'];?>" alt="footer image bg">
        <div class="container-fluid">
            <div class="row">
                <?php 
                //footer widget area 
                
                if(is_active_sidebar('footer-widget-1')){
                    dynamic_sidebar('footer-widget-1');
                }
                
                if(is_active_sidebar('footer-widget-2')){
                    dynamic_sidebar('footer-widget-2');
                }
                
                if(is_active_sidebar('footer-widget-3')){
                    dynamic_sidebar('footer-widget-3');
                }
                if(is_active_sidebar('footer-widget-4')){
                    dynamic_sidebar('footer-widget-4');
                }
                ?>
                
                
            </div>
        </div>
    </footer>
</main>
<div class="overlay" id="overlay">

    <div class="overlay-menu">
        <div class="container menu-item">
            <div class="row">
                <div class="col-md-4">
                    <h3><?php echo $ariella_options['menu_header_txt_1'];?> </h3>
                    <span class="heading__dash green"></span>
                    <?php wp_nav_menu( array('theme_location' => 'overly_menu_1' ) );?>
                </div>
                <div class="col-md-4">
                    <h3><?php echo $ariella_options['menu_header_txt_2'];?></h3>
                    <span class="heading__dash green"></span>
                    <?php wp_nav_menu( array('theme_location' => 'overly_menu_2' ) );?>
                </div>
                <div class="col-md-4">
                    <h3><?php echo $ariella_options['menu_header_txt_3'];?></h3>
                    <span class="heading__dash green"></span>
                    <?php wp_nav_menu( array('theme_location' => 'overly_menu_3' ) );?>
                </div>
 
            </div>
        </div>
        <div class="container search-item" id="search-item">
            <?php get_search_form( $echo = true );?>
        </div>
        <div class="container copy__area">
            <div class="row">
                <div class="col-md-6">
                    <div class="copy__area__text">
                        <p><?php echo $ariella_options['copyright_txt'];?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <ul class="list-inline overlay__social">
                        <?php if ($ariella_options['facebook_link'] != null ):?>
                        <li class="list-inline-item">
                            <a class="social-icon" target="_blank" href="<?php echo $ariella_options['facebook_link'];?>">
                                <i class="fa fa-<?php echo $ariella_options['fb_icon'];?>"></i>
                            </a>
                        </li>
                        <?php endif;?>
                         <?php if ($ariella_options['twitter_link'] != null ):?>
                        <li class="list-inline-item">
                            <a class="social-icon" target="_blank" href="<?php echo $ariella_options['twitter_link'];?>">
                                <i class="fa fa-<?php echo $ariella_options['twitter_icon'];?>"></i>
                            </a>
                        </li>
                        <?php endif;?>
                         <?php if ($ariella_options['instagram_link'] != null ):?>
                        <li class="list-inline-item">
                            <a class="social-icon" target="_blank" href="<?php echo $ariella_options['instagram_link'];?>">
                                <i class="fa fa-<?php echo $ariella_options['instagram_icon'];?>"></i>
                            </a>
                        </li>
                        <?php endif;?>
                         <?php if ($ariella_options['youtube_link'] != null ):?>
                        <li class="list-inline-item">
                            <a class="social-icon" target="_blank" href="<?php echo $ariella_options['youtube_link'];?>">
                                <i class="fa fa-<?php echo $ariella_options['youtube_icon'];?>"></i>
                            </a>
                        </li>
                        <?php endif;?>
                         <?php if ($ariella_options['linkedin_link'] != null ):?>
                        <li class="list-inline-item">
                            <a class="social-icon" target="_blank" href="<?php echo $ariella_options['linkedin_link'];?>">
                                <i class="fa fa-<?php echo $ariella_options['linkedin_icon'];?>"></i>
                            </a>
                        </li>
                        <?php endif;?>
                     </ul>
                </div>
            </div>
        </div>
    </div>
</div>
        	 </div> 

 



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/app.js"></script>
    <script>
        AOS.init({
            easing: 'ease-in-out-sine'
        });
    </script>
</div> 
</div>

<?php wp_footer(); ?>

</body>
</html>