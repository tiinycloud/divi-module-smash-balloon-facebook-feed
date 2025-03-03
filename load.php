<?php

/*
Plugin Name: Divi Module Smash Balloon Facebook Feed
Plugin URI:  https://tiinycloud.com
Description: Smash Balloon Facebook Feed Divi Module. (Requires a "Smash Balloon Facebook Feed" Plugin installed & enabled).
Version:     1.1.0
Author:      TiinyCloud
Author URI:  https://tiinycloud.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: tcff-facebook-module
Domain Path: /languages
*/


    define('TCFF_TEXT_DOMAIN', 'tcff-shortcode-facebook');  

    if ( !function_exists( 'tcff_initialize_shortcode_facebook_extension' ) ) {
        /**
         * Creates the extension's main class instance.
         *
         * @since 1.0.0
         */
        function tcff_initialize_shortcode_facebook_extension()
        {
            require_once plugin_dir_path( __FILE__ ) . 'includes/ShortcodeView.php';
        }
        
        add_action( 'divi_extensions_init', 'tcff_initialize_shortcode_facebook_extension' );
    }
	
	add_action( 'wp_enqueue_scripts', 'tcff_enqueue_divi_scripts_handler' );
	
	function tcff_enqueue_divi_scripts_handler() {
		?>
        <script type="text/javascript">
		  function tcff_resizeIframe(iframe) {
			  var ifh = iframe.contentWindow.document.body.scrollHeight + "px";
			  iframe.height = ifh;
			  window.requestAnimationFrame(() => tcff_resizeIframe(iframe));
		  }
		</script>  
        <?php
	}
	
    if ( !function_exists( 'tcff_shortcode_facebook' ) ) {
        add_action( 'wp_ajax_tcff_shortcode_facebook', 'tcff_shortcode_facebook' );
		add_action( 'wp_ajax_nopriv_tcff_shortcode_facebook', 'tcff_shortcode_facebook' );
        function tcff_shortcode_facebook()  {
			$output = array();
			ob_start();
			unset($_POST['action']);
			$src = add_query_arg( array_filter($_POST),  plugins_url( 'front.php', __FILE__ ));
			echo '<iframe  onload="tcff_resizeIframe(this)" style="width:100%;" src="'.esc_url( str_replace("#", "!!", $src) ). '"></iframe>';
			//echo get_home_url();
			$output['html'] = ob_get_contents();
			ob_get_clean();
			header("Content-Type: application/json");
            echo  json_encode( $output ) ;
            exit();
        }
    }

	function tcff_setting_handler(){
		$tcff_option = array();
		$tcff_option['type'] = array(
										0 => 'events',
										1 => 'links',
										2 => 'photos',
										3 => 'videos',
										4 => 'status',
										5 => 'albums',
										6 => 'reviews',
									);

		$tcff_option['include'] = array(
										0 => 'author',
										1 => 'text',
										2 => 'desc',
										3 => 'sharedlinks',
										4 => 'date',
										5 => 'media',
										6 => 'eventtitle',
										7 => 'eventdetails',
										8 => 'social',
										9 => 'link',
										10 => 'likebox',
									);
		$tcff_option['exclude'] = array(
										0 => 'author',
										1 => 'text',
										2 => 'desc',
										3 => 'sharedlinks',
										4 => 'date',
										5 => 'media',
										6 => 'eventtitle',
										7 => 'eventdetails',
										8 => 'social',
										9 => 'link',
										10 => 'likebox',
									);
		return $tcff_option;																					
	}