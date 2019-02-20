<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('WPMM_Enqueue_Scripts') ) {
    class WPMM_Enqueue_Scripts extends WPMM_Libary{

        /**
         * Enqueue all the necessary JS and CSS
         *
         * since @1.0.0
         */
        function __construct() {
         add_action('wp_enqueue_scripts',array($this,'wpmm_megamenu_frontend_scripts') , 99);
         add_action('wp_footer',array($this,'prefix_add_footer_scripts'));
         add_action('wp_head',array($this,'prefix_add_header_styles'));
         add_action( 'admin_enqueue_scripts', array( $this, 'wp_admin_enqueue_scripts'), 11 );

        } 

        
       /*
        * Enqueue Back-end Scripts
       */
        function wp_admin_enqueue_scripts($hooks){
          if ( 'nav-menus.php' == $hooks ) {
            do_action("wp_megamenu_nav_menus_scripts", $hooks );
          }
        }

        /*
        * Load script to footer
        */
        public function prefix_add_footer_scripts(){
          $options = get_option( 'apmega_settings' );  
          $enable_custom_js = (isset($options['enable_custom_js']) && $options['enable_custom_js'] == 1)?'1':'0';
          $custom_js = (isset($options['custom_js']))?$options['custom_js']:'';    
          if($enable_custom_js == 1){
            if($custom_js != ''){ ?>
            <script type="text/javascript">
            <?php echo $custom_js; ?>
            </script>
            <?php  
            }
          }
        }


   /*
   * Load CSS on Header
   */
   public function prefix_add_header_styles(){
      $arr_results = array();
      $options = get_option( 'apmega_settings' );      
      $mlabel_animation_type = (isset($options['mlabel_animation_type']))?$options['mlabel_animation_type']:'none';
      $animation_delay = (isset($options['animation_delay']))?$options['animation_delay'].'s':'2s';
      $animation_duration = (isset($options['animation_duration']))?$options['animation_duration'].'s':'3s';
      $animation_iteration_count = (isset($options['animation_iteration_count']))?$options['animation_iteration_count']:'1';
      $enable_custom_css = (isset($options['enable_custom_css']) && $options['enable_custom_css'] == 1)?'1':'0';
      $custom_css = (isset($options['custom_css']))?$options['custom_css']:'';
      $icon_width = (isset($options['icon_width']) && $options['icon_width'] != '')?$options['icon_width']:'';
      $enable_mobile = (isset($options['enable_mobile']) && $options['enable_mobile'] == 1)?'1':'0';
      $pre_responsive_bp = (isset($options['pre_responsive_bp']) && $options['pre_responsive_bp'] != '')?$options['pre_responsive_bp']:'';
        echo "<style type='text/css'>";   
        if( $enable_mobile == 1){
          if(isset($pre_responsive_bp) && $pre_responsive_bp != ''  && $pre_responsive_bp != '910'){
           $custom_responsive_bp = $pre_responsive_bp;
           include_once(APMM_PRO_PATH.'/inc/frontend/custom-responsive.php');
         }
        } 
       if($mlabel_animation_type != 'none'){  ?>
       span.wpmm-mega-menu-label.wpmm_depth_first{
       animation-duration:  <?php echo esc_attr($animation_duration);?>;
       animation-delay:     <?php echo esc_attr($animation_delay);?>;
       animation-iteration-count: <?php echo $animation_iteration_count;?>;
       -webkit-animation-duration:  <?php echo esc_attr($animation_duration);?>;
       -webkit-animation-delay:     <?php echo esc_attr($animation_delay);?>;
       -webkit-animation-iteration-count: <?php echo $animation_iteration_count;?>;
     }
       span.wpmm-mega-menu-label.wpmm_depth_last{
       animation-duration:  <?php echo esc_attr($animation_duration);?>;
       animation-delay:     <?php echo esc_attr($animation_delay);?>;
       animation-iteration-count: <?php echo $animation_iteration_count;?>;
       -webkit-animation-duration:  <?php echo esc_attr($animation_duration);?>;
       -webkit-animation-delay:     <?php echo esc_attr($animation_delay);?>;
       -webkit-animation-iteration-count: <?php echo $animation_iteration_count;?>;
      }
      <?php  }
      if($icon_width != ''){?>
      .wp-megamenu-main-wrapper .wpmm-mega-menu-icon{
      font-size: <?php echo esc_attr($icon_width);?>;
      }
      <?php  }
      if($enable_custom_css == 1 && $custom_css != ''){
        echo $custom_css;
      }

        /* CSS Style for Custom Styling Menu Items Per Menu Location */
        $menus = get_registered_nav_menus();
        $settings = get_option( 'wpmegabox_settings' ); 
        foreach ($menus as $key => $value) {
         $locations = get_nav_menu_locations();
              if ( isset ( $settings[ $key ]['enabled'] ) && $settings[ $key ]['enabled'] == 1 ) {
               $orientation = $settings[ $key ]['orientation'];
               if(isset($locations[ $key ] )){
                 $menu = wp_get_nav_menu_object( $locations[ $key ] );
                 $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) ); // get all menu items of specific menu location

                 if(isset($menuitems) && !empty($menuitems)):
                   foreach ($menuitems as $key => $value) {
                     $menuID = $value->ID;
                     $menu_item_parent = $value->menu_item_parent;
                     $get_details = get_post_meta($menuID, '_wpmegamenu' );
                     $top_menu_label = (isset($get_details[0]['general_settings']['top_menu_label']))?$get_details[0]['general_settings']['top_menu_label']:'';
                     $label_animation = (isset($get_details[0]['general_settings']['label_animation'])?$get_details[0]['general_settings']['label_animation']:'none');
                     if($top_menu_label != ''){ 
                      $duration = (isset($get_details[0]['general_settings']['animaton_duration'])?$get_details[0]['general_settings']['animaton_duration']:$animation_duration);
                      $delay = (isset($get_details[0]['general_settings']['animaton_delay'])?$get_details[0]['general_settings']['animaton_delay']:$animation_delay);
                      $iteration_count = (isset($get_details[0]['general_settings']['animation_iteration_count']) && $get_details[0]['general_settings']['animation_iteration_count'] != '')?esc_attr($get_details[0]['general_settings']['animation_iteration_count']):$animation_iteration_count;
                      if($label_animation != 'none'){ ?>
                      #wp_nav_menu-item-<?php echo $menuID;?> span.wpmm-mega-menu-label.wpmm_depth_first{
                      animation-iteration-count: <?php echo $iteration_count;?>;
                      -webkit-animation-iteration-count: <?php echo $iteration_count;?>;
                      animation-duration:  <?php echo esc_attr($duration);?>;
                      animation-delay:     <?php echo esc_attr($delay);?>;
                      -webkit-animation-duration:  <?php echo esc_attr($duration);?>;
                      -webkit-animation-delay:     <?php echo esc_attr($delay);?>;

                    }
                    <?php } }
                    $enable_bg_image = (isset($get_details[0]['upload_image_settings']['enable_bg_image']) && $get_details[0]['upload_image_settings']['enable_bg_image'] == true)?1:0;
                    $bg_image_type = (isset($get_details[0]['upload_image_settings']['bg_image_type'])?$get_details[0]['upload_image_settings']['bg_image_type']:'');
                    $bg_image_url1 = (isset($get_details[0]['upload_image_settings']['bg_image_url1'])?esc_url($get_details[0]['upload_image_settings']['bg_image_url1']):'');
                    $bg_image_url2 = (isset($get_details[0]['upload_image_settings']['bg_image_url2'])?esc_url($get_details[0]['upload_image_settings']['bg_image_url2']):'');
                    $cross_fading_type = (isset($get_details[0]['upload_image_settings']['cross_fading_type'])?$get_details[0]['upload_image_settings']['cross_fading_type']:'');
                    $image_position = (isset($get_details[0]['upload_image_settings']['image_position'])?$get_details[0]['upload_image_settings']['image_position']:'');
                    $image_repeat = (isset($get_details[0]['upload_image_settings']['image_repeat'])?$get_details[0]['upload_image_settings']['image_repeat']:'');
                    $duration_time = (isset($get_details[0]['upload_image_settings']['duration_time'])?$get_details[0]['upload_image_settings']['duration_time']:'10');
                    $animation_type = (isset($get_details[0]['upload_image_settings']['animation_type'])?$get_details[0]['upload_image_settings']['animation_type']:'FadeInOut');
                    $single_animation_type = (isset($get_details[0]['upload_image_settings']['single_animation_type'])?$get_details[0]['upload_image_settings']['single_animation_type']:'zoom');
                    
                    if($bg_image_type == "double_image"){
                      $animate_type = $animation_type;
                    }else{
                      $animate_type = $single_animation_type;
                    }

                    if( $menu_item_parent == 0 && $enable_bg_image == 1){ ?>
                    .first-image,.second-image{
                    background-repeat: <?php echo $image_repeat;?>;
                    background-size:cover;
                    background-position:  <?php echo $image_position;?>;
                  }
                  <?php 
                  if($cross_fading_type != "changeonhover"){ 
                    if($animate_type == "FadeInOut"){?>
                    #wpmm_cbg_<?php echo $menuID;?> img.top {
                    animation-name: <?php echo $animate_type;?>;
                    animation-timing-function: ease-in-out;
                    animation-iteration-count: infinite;
                    animation-duration: <?php echo $duration_time;?>s;
                    animation-direction: alternate;
                  }
                  <?php }else if($animate_type == "zoom"){ ?>                  
                  #wpmm_cbg_<?php echo $menuID;?>.zoom{
                  animation: <?php echo $duration_time;?>s ease-in-out 1s normal none infinite running image;
                  -webkit-animation: <?php echo $duration_time;?>s ease-in-out 1s normal none infinite running image;
                  opacity:0.5;
                }

                <?php } }else{ ?>
                #wpmm_cbg_<?php echo $menuID;?> img {
                -webkit-transition: opacity 1s ease-in-out;
                -moz-transition: opacity 1s ease-in-out;
                -o-transition: opacity 1s ease-in-out;
                transition: opacity 1s ease-in-out;
              }
              <?php  }
            }
          }
          endif;
        }
      }
    }
    echo "</style>";  
    foreach ($menus as $key => $value) {
     $locations = get_nav_menu_locations();
              /*
               * Check if wp mega menu is enabled or not for specific menu location
              */
              if ( isset ( $settings[ $key ]['enabled'] ) && $settings[ $key ]['enabled'] == 1 ) {
               $orientation = $settings[ $key ]['orientation'];
               if(!empty( $locations[ $key ])){
                $menu = wp_get_nav_menu_object( $locations[ $key ] );
                 $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) ); // get all menu items of specific menu location
                 if(isset($menuitems) && !empty($menuitems)):
                   foreach ($menuitems as $key => $value) {
                   # code...
                     $menuID = $value->ID;
                     $arr = array(
                      'menuid' => $menuID,
                      'orientation' => $orientation
                      );
                     array_push($arr_results, $arr);
                   }
                   endif;

                 }
                 
               }
             }
            if(isset($arr_results) && !empty($arr_results)){
               echo "<style type='text/css'>";  
               foreach ($arr_results as $key => $value) {
                 $get_custom_styling_details = get_post_meta($value['menuid'], '_wpmegamenu' );
                 $check = (isset($get_custom_styling_details[0]['custom_styling']['enable_custom_styling']) && $get_custom_styling_details[0]['custom_styling']['enable_custom_styling'] == true)?true:false;
                 include(APMM_PRO_PATH.'/inc/frontend/header_styling.php');
               }
               echo "</style>";  
             }
    }



      function wpmm_megamenu_frontend_scripts(){
       $options = get_option( 'apmega_settings' ); // Variables for JS scripts
       $enable_mobile = (isset($options['enable_mobile']) && $options['enable_mobile'] == 1)?'1':'0';
       $enable_rtl = (isset($options['enable_rtl']) && $options['enable_rtl'] == 1)?'1':'0';

       wp_enqueue_style( 'wpmm-frontend', APMM_PRO_CSS_DIR . '/style.css',APMM_PRO_VERSION );
       if( $enable_mobile == 1){
        wp_enqueue_style( 'wpmm-responsive-stylesheet', APMM_PRO_CSS_DIR . '/responsive.css',APMM_PRO_VERSION );
        if(isset($options['pre_responsive_bp']) && $options['pre_responsive_bp'] != '' && $options['pre_responsive_bp'] != '910'){
        }else{
          $pre_responsive_bp = "910";
          wp_enqueue_style( 'wpmm-default-responsive-stylesheet', APMM_PRO_CSS_DIR . '/default-responsive.css',APMM_PRO_VERSION );
        }
      } 

      if( is_rtl() && $enable_rtl == 1){
       wp_enqueue_style( 'wpmm-style-rtl', APMM_PRO_CSS_DIR . '/style-rtl.css',APMM_PRO_VERSION );
      }
     wp_enqueue_style( 'wpmm-animate-css', APMM_PRO_CSS_DIR . '/animate.css', false, APMM_PRO_VERSION );
     wp_enqueue_style( 'wpmm-colorbox', APMM_PRO_CSS_DIR . '/colorbox.css', false, APMM_PRO_VERSION );
     wp_enqueue_style( 'wpmm-frontwalker-stylesheet', APMM_PRO_CSS_DIR . '/frontend_walker.css', true, APMM_PRO_VERSION );
     wp_enqueue_style('wpmm-google-fonts-style', "//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700");

     wp_enqueue_style('wpmm-bxslider-style',APMM_PRO_CSS_DIR.'/jquery.bxslider.css',false,APMM_PRO_VERSION);
     wp_enqueue_script('wpmm-jquery-bxslider-min',APMM_PRO_JS_DIR.'/jquery.bxslider.min.js',array('jquery'),APMM_PRO_VERSION);

     wp_enqueue_script( 'wp_megamenu_actual_scripts', APMM_PRO_JS_DIR . '/jquery.actual.js',array('jquery') , APMM_PRO_VERSION );
     wp_enqueue_script( 'wp_megamenu_colorbox', APMM_PRO_JS_DIR . '/jquery.colorbox.js',array('jquery') , APMM_PRO_VERSION );
     wp_enqueue_script( 'wp_megamenu-frontend_scripts', APMM_PRO_JS_DIR . '/frontend.js',array('jquery') , APMM_PRO_VERSION );
     wp_enqueue_script( 'wp_megamenu_validate_scripts', APMM_PRO_JS_DIR . '/jquery.validate.js',array('jquery') , APMM_PRO_VERSION );
     
     wp_register_script('wpmm_ajax-auth-script', APMM_PRO_JS_DIR . '/ajax-auth-script.js', array('jquery') , APMM_PRO_VERSION); 
     wp_enqueue_script('wpmm_ajax-auth-script');

    if(WPMM_Libary::is_woocommerce_activated()){
          $wooenabled = "true";
        }else{
         $wooenabled = "false";
       }
       $mlabel_animation_type = (isset($options['mlabel_animation_type']))?$options['mlabel_animation_type']:'none';
       $animation_delay = (isset($options['animation_delay']))?$options['animation_delay']:'2';
       $animation_duration = (isset($options['animation_duration']))?$options['animation_duration']:'3';
       $animation_iteration_count = (isset($options['animation_iteration_count']))?$options['animation_iteration_count']:'1';
       wp_localize_script('wp_megamenu-frontend_scripts', 'wp_megamenu_params', array(
        'wpmm_mobile_toggle_option'      => esc_attr($options['mobile_toggle_option']),
        'wpmm_enable_rtl'                => $enable_rtl,
              'wpmm_event_behavior'            => esc_attr($options['advanced_click']), //click_submenu or follow_link
              'wpmm_ajaxurl'                   => admin_url('admin-ajax.php'),
              'wpmm_ajax_nonce'                => wp_create_nonce('wpm-ajax-nonce'),
              'check_woocommerce_enabled'      => $wooenabled,
              'wpmm_mlabel_animation_type'     => esc_attr($mlabel_animation_type),
              'wpmm_animation_delay'           => esc_attr($animation_delay),
              'wpmm_animation_duration'        => esc_attr($animation_duration),
              'wpmm_animation_iteration_count'      => esc_attr($animation_iteration_count),
              'enable_mobile'                     => $enable_mobile,
              'wpmm_sticky_opacity'            => (isset($options['sticky_opacity'])?esc_attr($options['sticky_opacity']):''), 
              'wpmm_sticky_offset'             => (isset($options['sticky_offset'])?esc_attr($options['sticky_offset']):''),
              'wpmm_sticky_zindex'             => (isset($options['sticky_zindex'])?esc_attr($options['sticky_zindex']):'')
              ));
          wp_localize_script( 'wpmm_ajax-auth-script', 'wp_megamenu_ajax_auth_object', array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'redirecturl' => home_url(),
            'loadingmessage' => __('Sending user info, please wait...')
            ));

          wp_enqueue_style('wpmegamenu-linecon-css', APMM_PRO_CSS_DIR.'/wpmm-icons/linecon.css', array(), APMM_PRO_VERSION);
          wp_enqueue_style( 'dashicons' );
          wp_enqueue_style( 'wpmegamenu-genericons', APMM_PRO_CSS_DIR . '/wpmm-icons/genericons.css', APMM_PRO_VERSION );
          wp_enqueue_style( 'wpmegamenu-icomoon', APMM_PRO_CSS_DIR . '/wpmm-icons/icomoon.css', APMM_PRO_VERSION );
          wp_enqueue_script( 'wpmegamenu-linearicons', 'https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js' );
          wp_enqueue_style( 'wpmegamenu-icon-picker-fontawesome', APMM_PRO_CSS_DIR . '/wpmm-icons/fontawesome.css', APMM_PRO_VERSION );
          wp_enqueue_style( 'wpmegamenu-icon-picker-fa-solid', APMM_PRO_CSS_DIR . '/wpmm-icons/fa-solid.css', APMM_PRO_VERSION );
          wp_enqueue_style( 'wpmegamenu-icon-picker-fa-regular', APMM_PRO_CSS_DIR . '/wpmm-icons/fa-regular.css', APMM_PRO_VERSION );
          wp_enqueue_style( 'wpmegamenu-icon-picker-fa-brands', APMM_PRO_CSS_DIR . '/wpmm-icons/fa-brands.css', APMM_PRO_VERSION );
          wp_enqueue_style( 'wpmegamenu-font-awesome-style', APMM_PRO_CSS_DIR . '/wpmm-icons/font-awesome.min.css', array(), APMM_PRO_VERSION );
          wp_enqueue_style( 'wpmegamenu-linearicons', 'https://cdn.linearicons.com/free/1.0.0/icon-font.min.css');
          wp_enqueue_style( 'wpmegamenu-themify', APMM_PRO_CSS_DIR . '/wpmm-icons/themify-icons.css', APMM_PRO_VERSION );
        }
    }
    new WPMM_Enqueue_Scripts();
}