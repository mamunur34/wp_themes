<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "ariella_options";

    // This line is only for altering the demo. Can be easily removed.
    //$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Arielle Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Arielle Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START HomePage Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Homepage Fields', 'redux-framework-demo' ),
        'id'               => 'home_top',
        'desc'             => __( 'Homepage top section!', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );
    
Redux::setSection( $opt_name, array(
        'title'            => __( 'Top Section part One', 'redux-framework-demo' ),
        'id'               => 'home_top_section_one',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Set the hompage top section', 'redux-framework-demo' ),
        'fields'           => array(
            array(
                'id'       => 'top_title_1',
                'type'     => 'text',
                'title'    => __( 'Title of section One', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the Section one title', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ),            
            array(
                'id'       => 'top_para_1',
                'type'     => 'text',
                'title'    => __( 'Para of section One', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the Section one text', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ),            
            array(
                'id'       => 'top_img_src_1',
                'type'     => 'text',
                'title'    => __( 'Type Image Url  One', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the Section one Image url', 'redux-framework-demo' ),
            ),            
                      
            array(
                'id'       => 'top_link_1',
                'type'     => 'text',
                'title'    => __( 'Type link address', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the link  address', 'redux-framework-demo' ),
            ),            
        )
    ) );    
Redux::setSection( $opt_name, array(
        'title'            => __( 'Top Section Part Two', 'redux-framework-demo' ),
        'id'               => 'home_top_section_two',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Set the hompage top section', 'redux-framework-demo' ),
        'fields'           => array(
            array(
                'id'       => 'top_title_2',
                'type'     => 'text',
                'title'    => __( 'Title of section Two', 'redux-framework-demo' ),
                'desc'     => __( 'Type the Section one title', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ),            
            array(
                'id'       => 'top_para_2',
                'type'     => 'text',
                'title'    => __( 'Para of section Two', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the Section Two text', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ),            
            array(
                'id'       => 'top_img_src_2',
                'type'     => 'text',
                'title'    => __( 'Type Image Url  Two', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the Section Two Image url', 'redux-framework-demo' ),
            ), 
                    
            array(
                'id'       => 'top_link_2',
                'type'     => 'text',
                'title'    => __( 'Type link address', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the link  address', 'redux-framework-demo' ),
            ),   
        )
    ) );    
Redux::setSection( $opt_name, array(
        'title'            => __( 'Top Section Part Three', 'redux-framework-demo' ),
        'id'               => 'home_top_section_three',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Set the hompage top section', 'redux-framework-demo' ),
        'fields'           => array(
            array(
                'id'       => 'top_title_3',
                'type'     => 'text',
                'title'    => __( 'Title of section Three', 'redux-framework-demo' ),
                'desc'     => __( 'Type the Section one title', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ),            
            array(
                'id'       => 'top_para_3',
                'type'     => 'text',
                'title'    => __( 'Para of section Three', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the Section Three text', 'redux-framework-demo' ),
                'default'  => 'Default Text',
            ),            
            array(
                'id'       => 'top_img_src_3',
                'type'     => 'text',
                'title'    => __( 'Type Image Url  Three', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the Section Three Image url', 'redux-framework-demo' ),
            ),   
                    
            array(
                'id'       => 'top_link_3',
                'type'     => 'text',
                'title'    => __( 'Type link address', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the link  address', 'redux-framework-demo' ),
            ),   
        )
    ) );    


Redux::setSection( $opt_name, array(
        'title'            => __( 'Media Section', 'redux-framework-demo' ),
        'id'               => 'home_media_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Set the hompage media section', 'redux-framework-demo' ),
        'fields'           => array(
            array(
                'id'       => 'media_section_headline',
                'type'     => 'text',
                'title'    => __( 'Headline of media section', 'redux-framework-demo' ),
                'desc'     => __( 'Type the Section one title', 'redux-framework-demo' ),
                'default'  => 'In The Media: ',
            ),            
            array(
                'id'       => 'logo_img_src',
                'type'     => 'text',
                'title'    => __( 'Media section logo img src', 'redux-framework-demo' ),
                
                'desc'     => __( 'Type the logo img src', 'redux-framework-demo' ),
 
            ),         
        )
    ) );    
Redux::setSection( $opt_name, array(
        'title'            => __( 'Post Section', 'redux-framework-demo' ),
        'id'               => 'home_post_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Set the hompage post section', 'redux-framework-demo' ),
        'fields'           => array(
            array(
                'id'       => 'post_count',
                'type'     => 'text',
                'title'    => __( 'How many post you want to show', 'redux-framework-demo' ),
                'desc'     => __( 'Type How many post you want to show in number' ),
 
            ),
            
            array(
                'id'       => 'post_category_name',
                'type'     => 'text',
                'title'    => __( 'type the post category slug', 'redux-framework-demo' ),
                'desc'     => __( 'Type exact post category slug, leave blank if you want to show all category',
                                    'redux-framework-demo' ),
 
            ),
            
        )
    ) );   

//
//    Redux::setSection( $opt_name, array(
//        'title'            => __( 'Branding', 'redux-framework-demo' ),
//        'id'               => 'Branding',
//        'desc'             => __( 'Set up branding:  Logo ', 'redux-framework-demo' ),
//        'customizer_width' => '400px',
//        'icon'             => 'el el-edit',
//    ) );
    
            Redux::setSection( $opt_name, array(
                    'title'            => __( 'Branding Section', 'redux-framework-demo' ),
                    'id'               => 'branding_section',
                    'subsection'       => false,
                    'customizer_width' => '450px',
                    'desc'             => __( 'Set the branding', 'redux-framework-demo' ),
                    'fields'           => array(
                        array(
                            'id'       => 'header_logo',
                            'type'     => 'text',
                            'title'    => __( 'Set header logo', 'redux-framework-demo' ),

                            'desc'     => __( 'Type the header logo url', 'redux-framework-demo' ),

                        ),
                        array(
                            'id'       => 'footer_logo',
                            'type'     => 'text',
                            'title'    => __( 'Set footer logo', 'redux-framework-demo' ),

                            'desc'     => __( 'Type the footer logo url', 'redux-framework-demo' ),

                        ),
                        array(
                            'id'       => 'copyright_txt',
                            'type'     => 'text',
                            'title'    => __( 'Copyright text', 'redux-framework-demo' ),

                            'desc'     => __( 'Type  copyright text', 'redux-framework-demo' ),

                        ),
                        )
                ));


            Redux::setSection( $opt_name, array(
                    'title'            => __( 'Social Section', 'redux-framework-demo' ),
                    'id'               => 'social_section',
                    'subsection'       => false,
                    'customizer_width' => '450px',
                    'desc'             => __( 'Set the social links and icons ', 'redux-framework-demo' ),
                    'fields'           => array(
                        array(
                            'id'       => 'fb_icon',
                            'type'     => 'text',
                            'title'    => __( 'Set font awesome icon class', 'redux-framework-demo' ),
                            'desc'     => __( 'Type like: facebook', 'redux-framework-demo' ),
                             

                        ),
                        array(
                            'id'       => 'facebook_link',
                            'type'     => 'text',
                            'title'    => __( 'Set facebook link', 'redux-framework-demo' ),
                            'desc'     => __( 'Type facebook link', 'redux-framework-demo' ),
                        ), 
                        /////////////////
                        array(
                            'id'       => 'twitter_icon',
                            'type'     => 'text',
                            'title'    => __( 'Set font awesome icon class', 'redux-framework-demo' ),
                            'desc'     => __( 'Type like: twitter', 'redux-framework-demo' ),
                             

                        ),
                        array(
                            'id'       => 'twitter_link',
                            'type'     => 'text',
                            'title'    => __( 'Set twitter link', 'redux-framework-demo' ),
                            'desc'     => __( 'Type twitter link', 'redux-framework-demo' ),
                        ), 
                        /////////////////
                        array(
                            'id'       => 'instagram_icon',
                            'type'     => 'text',
                            'title'    => __( 'Set font awesome icon class', 'redux-framework-demo' ),
                            'desc'     => __( 'Type like: instagram', 'redux-framework-demo' ),
                             

                        ),
                        array(
                            'id'       => 'instagram_link',
                            'type'     => 'text',
                            'title'    => __( 'Set instagram link', 'redux-framework-demo' ),
                            'desc'     => __( 'Type instagram link', 'redux-framework-demo' ),
                        ), 
                        /////////////////
                        array(
                            'id'       => 'youtube_icon',
                            'type'     => 'text',
                            'title'    => __( 'Set font awesome icon class', 'redux-framework-demo' ),
                            'desc'     => __( 'Type like: youtube', 'redux-framework-demo' ),
                             

                        ),
                        array(
                            'id'       => 'youtube_link',
                            'type'     => 'text',
                            'title'    => __( 'Set youtube link', 'redux-framework-demo' ),
                            'desc'     => __( 'Type youtube link', 'redux-framework-demo' ),
                        ), 
                        /////////////////
                        array(
                            'id'       => 'linkedin_icon',
                            'type'     => 'text',
                            'title'    => __( 'Set font awesome icon class', 'redux-framework-demo' ),
                            'desc'     => __( 'Type like: linkedin', 'redux-framework-demo' ),
                             

                        ),
                        array(
                            'id'       => 'linkedin_link',
                            'type'     => 'text',
                            'title'    => __( 'Set linkedin link', 'redux-framework-demo' ),
                            'desc'     => __( 'Type linkedin link', 'redux-framework-demo' ),
                        ), 
                        /////////////////

                        )
                ));
            Redux::setSection( $opt_name, array(
                    'title'            => __( 'Footer  Section', 'redux-framework-demo' ),
                    'id'               => 'footer_section',
                    'subsection'       => false,
                    'customizer_width' => '450px',
                    'desc'             => __( 'Set the social links and icons ', 'redux-framework-demo' ),
                    'fields'           => array(
                        array(
                            'id'       => 'footer_bg_img1',
                            'type'     => 'text',
                            'title'    => __( 'Set footer background image url', 'redux-framework-demo' ),

                            'desc'     => __( 'Typefooter background image url', 'redux-framework-demo' ),

                        ),


                        )
                ));
            Redux::setSection( $opt_name, array(
                    'title'            => __( 'Menu Title', 'redux-framework-demo' ),
                    'id'               => 'overly_section',
                    'subsection'       => false,
                    'customizer_width' => '450px',
                    'desc'             => __( 'Set menu header', 'redux-framework-demo' ),
                    'fields'           => array(
                        array(
                            'id'       => 'menu_header_txt_1',
                            'type'     => 'text',
                            'title'    => __( 'Set menu header', 'redux-framework-demo' ),
                            'desc'     => __( 'Type  menu header', 'redux-framework-demo' ),

                        ),
                        array(
                            'id'       => 'menu_header_txt_2',
                            'type'     => 'text',
                            'title'    => __( 'Set menu header', 'redux-framework-demo' ),
                            'desc'     => __( 'Type menu header', 'redux-framework-demo' ),

                        ),
                        array(
                            'id'       => 'menu_header_txt_3',
                            'type'     => 'text',
                            'title'    => __( 'Set menu header', 'redux-framework-demo' ),
                            'desc'     => __( 'Type menu header', 'redux-framework-demo' ),

                        ),


                        )
                ));
    //**//
    //
    //*/ 
    

      
 
 
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

