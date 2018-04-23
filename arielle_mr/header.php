<?php 
global $ariella_options;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
   <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/app.css">
    <title>Hello, world!</title>
    
    <?php 
    $css = "<style> .button__container span {  background: ";
    if ( is_front_page() && is_home() ) {
    // Default homepage
         $css .= "#000";
    } elseif ( is_front_page()){
    //Static homepage
       $css .= "#fff";
    } elseif ( is_home()){

    //Blog page
        $css .= "#000";
    } else {

    //everything else
        $css .= "#000";
    }
    $css .= "}";
    echo $css;
    ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="content" class="site-content">
        <div class="aos-all">
            
            
      <div id="app">
        <header>
            <div class="header__menu">
                <div class="container-fluid">
                    <div class="header__menu_icon">
                        <div class="button__container">
                            <div class="button__container__icon" id="toggle">
                                <span class="top"></span>
                                <span class="middle"></span>
                                <span class="bottom"></span>
                            </div>
                            <ul class="header__menu__list">
                                <li> 
                                        <?php // get_search_form( $echo = true );?>
                                 </li>
                                <li>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="brand">
                                        <img src="<?php echo $ariella_options['header_logo'];?>" alt="" class="img-fluid">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <!-- header__menu -->
            
        </header>   
          <main>