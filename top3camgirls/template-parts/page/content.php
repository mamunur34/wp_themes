<?php
$iframe_url = $banner_img_url =  $header_height = $header_text = $cta_link = 
$cta_link = $header_html = $radio_check = $bgcolor = $copy = $tracking_code = "";
 $custom_additional_css = "";

//echo get_the_ID();
 // print_r(get_post_meta( get_the_ID()));
$iframe_url = get_post_meta( get_the_ID(), 'custom_iframe_url', true );
$header_height = get_post_meta( get_the_ID(), 'custom_header_height', true );
$header_text = get_post_meta( get_the_ID(), 'custom_header_text', true );
$cta_link = get_post_meta( get_the_ID(), 'custom_call_to_action_link', true );
$cta_btn_txt = get_post_meta( get_the_ID(), 'custom_call_to_action_button_text', true );
$header_html = get_post_meta( get_the_ID(), 'custom_header_html', true );
$radio_check = get_post_meta( get_the_ID(), 'custom_radio_inline_html_cta', true );
$bgcolor = get_post_meta( get_the_ID(), 'custom_header_bgcolor', true );
$copy = get_post_meta( get_the_ID(), 'custom_footer_copyright', true );
$tracking_code = get_post_meta( get_the_ID(), 'custom_footer_tracking_code', true );
$custom_header_h1_color = get_post_meta( get_the_ID(), 'custom_header_h1_color', true );
  $custom_footer_bgcolor = get_post_meta( get_the_ID(), 'custom_footer_bgcolor', true );
  $header_h1_hover_color = get_post_meta( get_the_ID(), 'custom_header_h1_hover_color', true );
  $custom_additional_css = get_post_meta( get_the_ID(), 'custom_additional_css', true );
?>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php if ($radio_check == 'cta' ):?> 
 <a class="cta" href="<?php echo $cta_link;?>" class="">
    <section class="call-to-action">
        <div class="  mr_containar m-text-center">
            <h1 class="m-text-center"><?php echo $cta_btn_txt;?></h1>
        </div>
    </section>
  </a>
<?php endif;?>
<?php if ($radio_check == 'html' ):?> 
<section class="call-to-action html_block">
    <?php echo $header_html;?>
</section>
    
<?php endif;?>
<?php 
    $mr_iframe_html='<iframe id="myframe" style="position:fixed; top:';
    $mr_iframe_html.= 0 + $header_height;
    $mr_iframe_html.='px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;" src="';
    $mr_iframe_html.=$iframe_url;
    $mr_iframe_html.='" >Your Browser has not Support to Run the content</iframe>';
    
    
          echo $mr_iframe_html;
?>
 <?php /* <iframe style="position:fixed; top:300px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;" src="<?php echo $iframe_url;?>" ></iframe>*/?>
 
 
<style>
    
    h1, h2, h3, h4, h5 {padding-top: 0px; margin-top: 0px;text-align: center;}
    #mr_wrap{background:<?php echo $bgcolor;?>;}
 
section, .mr_containar, .h1 {
    height: <?php echo $header_height;?>px; vertical-align: middle;    
    padding: 0px;
    margin: 0px; }

h1{
    text-decoration: none;
    margin: 0px;
    text-align:center;
    line-height: <?php echo $header_height;?>px;
    text-transform:uppercase; 
    color:<?php echo $custom_header_h1_color;?>; 
    font-family:Arial;
    font-size:30px;
     -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
    }

    a:hover h1{
            color: <?php echo $header_h1_hover_color;?>;
             -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            text-decoration: none;
    }
    a:hover {text-decoration: none;}
 

@media (max-width: 1024px) {
        <?php $padd = '';
         if(strlen($cta_btn_txt) < 50){ $padd = "padding-top: 25px;";}
        if(strlen($cta_btn_txt) < 25){ $padd = "padding-top: 30px;";}
        ?>
    .m-text-center {text-align:center;}
     h1{font-size:25px; line-height: 2em;<?php echo $padd ;?>}
}

    footer{
     display: block;
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 1;
    height: 50px;
    width: 100%;
 
    }
    
    
    @media only screen and (max-width: 600px) {
        
        <?php $padd = '';
          if(strlen($cta_btn_txt) < 50){ $padd = "padding-top: 15px;";}
        if(strlen($cta_btn_txt) < 25){ $padd = "padding-top: 35px;";}
        ?>
    .m-text-center {text-align:center;}
      h1{font-size:20px;line-height: 1.5em; <?php echo $padd ;?>}
}
   <?php echo $custom_additional_css;?> 
</style>

<footer id="colophon" class="site-footer" role="contentinfo" style="background:<?php echo $custom_footer_bgcolor;?>">
        <div class="wrap">
            <p class="footer_text"> <?php echo $copy; ?>  </p>
            <?php echo $tracking_code; ?>
        </div><!-- .wrap -->
</footer><!-- #colophon -->

