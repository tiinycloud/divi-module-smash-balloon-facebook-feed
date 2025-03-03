<?php

class TCFF_Facebook_Module extends ET_Builder_Module
{
    public  $slug = 'tcff_shortcode_facebook' ;
    public  $vb_support = 'on' ;
    protected  $module_credits = array(
        'module_uri' => 'https://tiinycloud.com/plugins/divi-module-smash-balloon-facebook-feed',
        'author'     => 'tiinycloud.com',
        'author_uri' => 'https://tiinycloud.com/',
    ) ;
    public function init()
    {
        $this->name = esc_html__( 'Smash Balloon Facebook Feed', TCFF_TEXT_DOMAIN );
        $this->main_css_element = '%%order_class%%';
        $this->icon = 'k';
		
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'tcff_settings' => et_builder_i18n( 'Settings' ),
					'tcff_general_styling'     => et_builder_i18n( 'General Styling' ),
					'tcff_feed_columns'     => et_builder_i18n( 'Feed Columns' ),
					'tcff_post_types'     => et_builder_i18n( 'Post Types (Post Type)' ),
					'tcff_post_types_events'     => et_builder_i18n( 'Post Types (Events)' ),
					'tcff_post_types_albums'     => et_builder_i18n( 'Post Types (Albums)' ),
					'tcff_post_types_photos'     => et_builder_i18n( 'Post Types (Photos)' ),
					'tcff_post_types_videos'     => et_builder_i18n( 'Post Types (Videos)' ),
					'tcff_post_types_lightbox'     => et_builder_i18n( 'Post Types (Lightbox)' ),
					'tcff_post_types_filter_by_string'     => et_builder_i18n( 'Post Types (Filter by string)' ),
					'tcff_post_layout_general'     => et_builder_i18n( 'Post Layout (General)' ),
					'tcff_post_layout_post_style'     => et_builder_i18n( 'Post Layout (Post Style)' ),
					'tcff_typography_text_character_limits'     => et_builder_i18n( 'Typography (Text Character Limits)' ),
					'tcff_typography_feed_header'     => et_builder_i18n( 'Typography (Feed Header)' ),
					'tcff_typography_post_author'     => et_builder_i18n( 'Typography (Post Author)' ),
					'tcff_typography_post_text'     => et_builder_i18n( 'Typography (Post Text)' ),
					'tcff_typography_photo_video_link_description'     => et_builder_i18n( 'Typography (Photo/Video/Link Description)' ),
					'tcff_typography_shared_links'     => et_builder_i18n( 'Typography (Shared Links)' ),
					'tcff_typography_date'     => et_builder_i18n( 'Typography (Date)' ),
					'tcff_typography_event_title'     => et_builder_i18n( 'Typography (Event Title)' ),
					'tcff_typography_event_date'     => et_builder_i18n( 'Typography (Event Date)' ),
					'tcff_typography_event_details'     => et_builder_i18n( 'Typography (Event Details)' ),
					'tcff_typography_post_actions_links'     => et_builder_i18n( 'Typography (Post Actions Links)' ),
					'tcff_misc_social_like_shares_comments'     => et_builder_i18n( 'Misc (Social - like, shares and Comments)' ),
					'tcff_misc_like_box_page_plugin'     => et_builder_i18n( 'Misc (Like Box/Page Plugin)' ),
					'tcff_misc_general'     => et_builder_i18n( 'Misc (General)' ),
					'tcff_custom_text_translate_event_text'     => et_builder_i18n( 'Custom Text/Translate (Event Text)' ),
					'tcff_custom_text_translate_call_to_action_buttons' => et_builder_i18n( 'Custom Text/Translate (Call-to-action Buttons)' ),
					'tcff_custom_text_translate_load_more_button'     => et_builder_i18n( 'Custom Text/Translate ("Load More" Button)' ),
					'tcff_custom_text_translate_likes_shares_comments_text'=> et_builder_i18n( 'Custom Text/Translate (likes, shares and Comments Text)' ),
					'tcff_custom_text_translate_date'     => et_builder_i18n( 'Custom Text/Translate (Date)' ),
					'tcff_extensions_date_range'     => et_builder_i18n( 'Extensions (Date Range)' ),
					'tcff_extensions_featured_post'     => et_builder_i18n( 'Extensions (Featured Post)' ),
					'tcff_extensions_album'     => et_builder_i18n( 'Extensions (Album)' ),
					'tcff_extensions_carousel'     => et_builder_i18n( 'Extensions (Carousel)' ),
					'tcff_extensions_reviews'     => et_builder_i18n( 'Extensions (Reviews)' ),
					'tcff_admin_diagnostics'     => et_builder_i18n( 'Admin Diagnostics' ),
				),
			),
		);
		$this->advanced_fields = array(
			'fonts'          => array(
                'title' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .c-configurator h2, {$this->main_css_element} .c-configurator h2 span",
                        'important' => 'all',
                    ),
                    'label'        => esc_html__( 'Title', TCFF_TEXT_DOMAIN ),
                ),
				'price' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .c-configurator .js-model-price, {$this->main_css_element} .c-configurator .js-model-price span",
                        'important' => 'all',
                    ),
                    'label'        => esc_html__( 'Price', TCFF_TEXT_DOMAIN ),
                ),
				'model_heading' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .c-configurator .js-select .c-configurator__model-title",
                        'important' => 'all',
                    ),
                    'label'        => esc_html__( 'Model Heading', TCFF_TEXT_DOMAIN ),
                ),
				'dropdown_model' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .c-configurator .js-select select",
                        'important' => 'all',
                    ),
                    'label'        => esc_html__( 'Model Dropdown', TCFF_TEXT_DOMAIN ),
                ),
				'color_heading' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .c-configurator .js-check .c-configurator__colour-title span",
                        'important' => 'all',
                    ),
                    'label'        => esc_html__( 'Color Heading', TCFF_TEXT_DOMAIN ),
                ),
				'color_name' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .c-configurator .js-check .js-colour-name .c-configurator__colour-name",
                        'important' => 'all',
                    ),
                    'label'        => esc_html__( 'Color Name', TCFF_TEXT_DOMAIN ),
                ),
				'powertrain_heading' => array(
                    'css'          => array(
                        'main'      => "{$this->main_css_element} .c-configurator .js-select .c-configurator__powertrain-title span",
                        'important' => 'all',
                    ),
                    'label'        => esc_html__( 'Powertrain Heading', TCFF_TEXT_DOMAIN ),
                ),
            ),
			'button' => array(
				'button' => array(
					'label' => esc_html__( 'Buttons', TCFF_TEXT_DOMAIN ),
					'css'            => array(
						'main'         => "{$this->main_css_element} .c-configurator__btn",
						'limited_main' => "{$this->main_css_element} .c-configurator__btn",
						'alignment'    => "{$this->main_css_element} .c-configurator__buttons",
					),					
					'box_shadow'     => array(
						'css' => array(
							'main' => '%%order_class%% .c-configurator__btn',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'main'      => "%%order_class%% .c-configurator__btn",
							'important' => 'all',
						),
					),
					'use_alignment'  => true,
				),
			),
			'link_options'   => false,	
			'background' => false,		
		);
    }
    
    public function get_fields() {
        $post_fields = array(
			/*------------------------ tcff_settings ---------------------------*/
			'tcff_feed'                     => array(
				'label'            => esc_html__( 'Feed ID', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => $this->get_feed(),
				'description'      => esc_html__( 'Display list all available "Feeds".', TCFF_TEXT_DOMAIN ),
				'toggle_slug'      => 'tcff_settings',
				'default'          => '',
			),
			'tcff_id'                     => array(
				'label'            => esc_html__( 'Page ID', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Your Page ID. (example: smashballoon) The Page ID of the Facebook Page you want to display.', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_ownaccesstoken'                     => array(
				'label'            => esc_html__( 'Use your own Access Token', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'description'      => esc_html__( 'If you are using your own Access Token in a shortcode but not in the settings page then this must be set to be true in the shortcode. You also need to use the accesstoken setting below with it to set your Access Token.', TCFF_TEXT_DOMAIN ),
				'toggle_slug'      => 'tcff_settings',
				'default'          => '',
			),
			'tcff_accesstoken'                     => array(
				'label'            => esc_html__( 'Access Token', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Your Access Token.
Only needs to be used in the event that you need to use a specific Access Token in a specific feed. If you’re not using your own token on the settings page then you need to set ownaccesstoken=true in the shortcode as well.', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_account'                     => array(
				'label'            => esc_html__( 'Account', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Account ID
The ID of the account you want to display posts from. Must be connected in the plugin first using the ‘Connect a Facebook account’ button.', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_pagetype'                     => array(
				'label'            => esc_html__( 'Page Type', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to display posts from a Facebook Page or Group. To display a feed from a group please see this page.', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  '' =>  et_builder_i18n( 'Select' ),
											  'page' => 'Page',
											  'group' => 'Group',
										  ),
				'toggle_slug'      => 'tcff_settings',
				'default'          => '',
			),
			'tcff_num'                     => array(
				'label'            => esc_html__( 'Number of posts', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number.
The number of posts you wish to display.', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_limit'                     => array(
				'label'            => esc_html__( 'Post limit', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number.
Define the number of posts retrieved from the Facebook API', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_offset'                     => array(
				'label'            => esc_html__( 'Post offset', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number less than the number of posts you’re displaying.
The number of posts to offset the feed by. For example, offset=2 would start the feed at the third post.', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_showpostsby'                     => array(
				'label'            => esc_html__( 'Show posts by others', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Select whether to show posts by only the page owner, anyone who posts on your page, or only others who post on your page.', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  '' =>  et_builder_i18n( 'Select' ),
											  'me' => 'Me',
											  'others' => 'Others',
											  'onlyothers' => 'Only Others',
										  ),
				'toggle_slug'      => 'tcff_settings',
				'default'          => '',
			),
			'tcff_cachetime'                     => array(
				'label'            => esc_html__( 'Caching time', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number.
Define the amount of time to cache posts for before checking Facebook for new ones (the unit of time can be set using the ‘cacheunit’ option described below', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_cacheunit'                     => array(
				'label'            => esc_html__( 'Caching unit of time', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Select the unit of time for cachine (the amount time can be set using the ‘cachetime’ option described above', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  '' =>  et_builder_i18n( 'Select' ),
											  'minutes' => 'Minutes',
											  'hours' => 'Hours',
											  'days' => 'Days',
										  ),
				'toggle_slug'      => 'tcff_settings',
				'default'          => '',
			),
			'tcff_locale'                     => array(
				'label'            => esc_html__( 'Locale', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Define the language that the Like box should be localized to
Examples:
en_US
es_ES
fr_FR
de_DE
etc…', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_timezone'                     => array(
				'label'            => esc_html__( 'Timezone', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Set the timezone to be used for dates and times. Should match the timezone you use on Facebook.
Examples:
America/Los_Angeles
America/Chicago
Europe/London
etc…See here for a full list of all available timezones', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_settings',
			),
			'tcff_ajax'                     => array(
				'label'            => esc_html__( 'Ajax', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether or not the Custom Facebook Feed content is being loaded in via Ajax by your WordPress theme', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'toggle_slug'      => 'tcff_settings',
				'default'          => '',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_general_styling ---------------------------*/		
			'tcff_width'                     => array(
				'label'            => esc_html__( 'Feed width', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number + unit.
The width of the feed container (including the unit)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_general_styling',
			),
			'tcff_height'                     => array(
				'label'            => esc_html__( 'Feed height', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number + unit.
The height of the feed container (including the unit)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_general_styling',
			),
			'tcff_padding'                     => array(
				'label'            => esc_html__( 'Feed padding', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number + unit.
The padding applied to the feed container (including the unit)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_general_styling',
			),
			'tcff_bgcolor'                     => array(
				'label'            => esc_html__( 'Background color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The background color of the feed (Color Hex code not including the \'#\')', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_general_styling',
			),
			'tcff_class'                     => array(
				'label'            => esc_html__( 'CSS class', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any text string (may include dashes or underscores, but no spaces).
The CSS class to be added to the feed’s container.', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_general_styling',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_feed_columns ---------------------------*/	
			'tcff_cols'                => array(
				'label'            => esc_html__( 'Number of columns', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Numbers (1-6)
The number of columns for the feed for desktop. Note: This setting does not apply to feeds which already use a grid layout, such as photo, album, and video feeds. To control the number of columns in those feeds use the photocols, albumcols, and videocols settings.
(Does not apply to “grid” feed layouts)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_feed_columns',
				'option_category'  => 'configuration',
			),
			'tcff_mobilecols'                => array(
				'label'            => esc_html__( 'Number of columns for mobile', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Number (1-2)
The number of columns for the feed on mobile displays.
(Does not apply to “grid” feed layouts)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_feed_columns',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_types ---------------------------*/	
			'tcff_type'                     => array(
				'label'            => esc_html__( 'Post type', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The types of posts you want to display (Pro version only).
Review Extension is required for "Reviews" Post Type to work.', TCFF_TEXT_DOMAIN ),
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_post_types',
				'type'             => 'multiple_checkboxes',
				'options'          => array(
					'events' => esc_html__( 'Events', TCFF_TEXT_DOMAIN ),
					'links' => esc_html__( 'Links', TCFF_TEXT_DOMAIN ),
					'photos' => esc_html__( 'Photos', TCFF_TEXT_DOMAIN ),
					'videos' => esc_html__( 'Videos', TCFF_TEXT_DOMAIN ),
					'status' => esc_html__( 'Status or statuses', TCFF_TEXT_DOMAIN ),
					'albums' => esc_html__( 'Albums', TCFF_TEXT_DOMAIN ),
					'reviews' => esc_html__( 'Reviews', TCFF_TEXT_DOMAIN ),
				),
				'return_slugs' => true,
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_types_events ---------------------------*/			
			'tcff_eventsource'                     => array(
				'label'            => esc_html__( 'Event source', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to display your events from your Facebook Events page or from the timeline (only applies when only displaying the events post type) (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'eventspage' => 'Events page',
					'timeline' => 'Timeline',
				),
				'toggle_slug'      => 'tcff_post_types_events',
				'default'          => '',
			),			
			'tcff_pastevents'                     => array(
				'label'            => esc_html__( 'Past Events', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to display past events from your Facebook page (only applies when only displaying the events post type) (Pro version only). Please note, that after adding the shortcode option you may need to clear the plugin cache by clicking “Save Changes” on the plugin’s main settings page so that the plugin checks Facebook for the past events.', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_post_types_events',
				'default'          => '',
			),
			'tcff_eventoffset'                => array(
				'label'            => esc_html__( 'Event time offset', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number.
The number of hours to continuing showing events for after the start time of the event has passed (only applies when only displaying the events post type) (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_settings',
				'option_category'  => 'tcff_post_types_events',
			),			
			'tcff_eventimage'                     => array(
				'label'            => esc_html__( 'Event image size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to display full sized event images or square cropped versions. This only applies when showing events only from your Events page (not from your timeline). To adjust the size of the image use the layout option in the Post Layout section below.  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'full' => 'Full',
					'cropped' => 'Cropped',
				),
				'toggle_slug'      => 'tcff_post_types_events',
				'default'          => '',
			),
			'tcff_noeventstext'                => array(
				'label'            => esc_html__( '‘No upcoming Events’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any text string.
The text to display when there are no upcoming events to display  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_settings',
				'option_category'  => 'tcff_post_types_events',
			),
			'tcff_interestedtext'                => array(
				'label'            => esc_html__( '‘Interested’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any text string.
The text to display to show how many people are interested in an event  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_settings',
				'option_category'  => 'tcff_post_types_events',
			),
			'tcff_goingtext'                => array(
				'label'            => esc_html__( '‘Going’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any text string.
The text to display to show how many people are going to an event  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_settings',
				'option_category'  => 'tcff_post_types_events',
			),
			'tcff_buyticketstext'                => array(
				'label'            => esc_html__( '‘Buy Tickets’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any text string.
The text to display for the “Buy Tickets” link  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_settings',
				'option_category'  => 'tcff_post_types_events',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_types_albums ---------------------------*/	
			'tcff_albumsource'                     => array(
				'label'            => esc_html__( 'Album source', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'photospage' => 'Photospage',
					'timeline' => 'Timeline',
				),
				'description'      => esc_html__( 'The order to display the Hashtag feed posts.', TCFF_TEXT_DOMAIN ),
				'toggle_slug'      => 'tcff_post_types_albums',
				'default'          => '',
			),	
			'tcff_showalbumtitle'                     => array(
				'label'            => esc_html__( 'Show album title', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to display the album title when displaying only the Albums post type  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_post_types_albums',
				'default'          => '',
			),	
			'tcff_showalbumnum'                     => array(
				'label'            => esc_html__( 'Show album number', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to display the album number when displaying only the Albums post type  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_post_types_albums',
				'default'          => '',
			),
			'tcff_albumcols'                => array(
				'label'            => esc_html__( 'Number of columns in album grid', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Number (1-8).
The number of columns to display albums in when displaying only the Albums post type  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_settings',
				'option_category'  => 'tcff_post_types_albums',
			),	
			'tcff_showalbumnum'                     => array(
				'label'            => esc_html__( 'Show album number', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to display the album number when displaying only the Albums post type  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_post_types_albums',
				'default'          => '',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_types_photos ---------------------------*/	
			'tcff_photosource'                => array(
				'label'            => esc_html__( 'Photos source', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display your photos from your Facebook Photos page or from the timeline (only applies when only displaying the photos post type) (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'photospage' => 'Photos page',
					'timeline' => 'Timeline',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_photos',
				'option_category'  => 'configuration',
			),	
			'tcff_photocols'                => array(
				'label'            => esc_html__( 'Number of columns in photos grid', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Number (1-8).
The number of columns to display photos in when displaying only the Photos post type  (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_photos',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_types_videos ---------------------------*/			
			'tcff_videosource'                => array(
				'label'            => esc_html__( 'Video source', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display your videos from your Facebook Videos page/album or from the timeline (only applies when only displaying the videos post type) (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'videospage' => 'Videos page',
					'timeline' => 'Timeline',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),	
			'tcff_showvideoname'                => array(
				'label'            => esc_html__( 'Show video name', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display the video name when displaying only the Videos post type  (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),		
			'tcff_showvideodesc'                => array(
				'label'            => esc_html__( 'Show video description', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display the video description when displaying only the Videos post type  (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),
			'tcff_videocols'                => array(
				'label'            => esc_html__( 'Number of columns in video grid', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Number (1-8).
The number of columns to display videos in when displaying only the Videos post type  (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),
			'tcff_playlist'                => array(
				'label'            => esc_html__( 'Display video playlist', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Playlist ID (numeric).
The ID of the playlist you want to display. This can be found in the video URL after the “vl.”, eg: /videos/vl.1234567890/  (Pro version v3.7+ only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),
			'tcff_loadmore'                => array(
				'label'            => esc_html__( 'Show Load More button', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to show the Load More button at the bottom of the feed (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),
			'tcff_buttoncolor'                => array(
				'label'            => esc_html__( 'Button background color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The background color of the Load More button (Color Hex Code not including the '#') (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),
			'tcff_buttonhovercolor'                => array(
				'label'            => esc_html__( 'Button hover color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The background color of the Load More button when hovered upon (Color Hex Code not including the '#') (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),
			'tcff_buttontextcolor'                => array(
				'label'            => esc_html__( 'Button hover color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text color of the Load More button (Color Hex Code not including the '#') (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_post_types_videos',
				'option_category'  => 'configuration',
			),		
			'tcff_buttontext'                => array(
				'label'            => esc_html__( '‘Load More’ button text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text you wish to use in place of the ‘Load More’ text (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_lightbox',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_types_lightbox ---------------------------*/
			'tcff_disablelightbox'                => array(
				'label'            => esc_html__( 'Disable Lightbox', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Disable the popup photo/video lightbox (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_post_types_lightbox',
				'option_category'  => 'configuration',
			),
			'tcff_lightboxcomments'                => array(
				'label'            => esc_html__( 'Display comments in the lightbox', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to the display post comments in the popup lightbox (works for timeline posts only) (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_post_types_lightbox',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_types_filter_by_string ---------------------------*/		
			'tcff_filter'                => array(
				'label'            => esc_html__( 'Filter', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Any text string(s) or hashtag(s).
Only show posts containing the defined string. Separate multiple strings with commas. Multiple strings will be treated as OR. (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_filter_by_string',
				'option_category'  => 'configuration',
			),	
			'tcff_exfilter'                => array(
				'label'            => esc_html__( 'Exclude Filter', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Any text string(s) or hashtag(s).
Do not show posts containing the defined string. Separate multiple strings with commas. Multiple strings will be treated as OR. (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_types_filter_by_string',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_layout_general ---------------------------*/		
			'tcff_layout'                => array(
				'label'            => esc_html__( 'Post layout', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The post layout you want to use (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'thumb' => 'Thumb',
					'half' => 'Half',
					'full' => 'Full',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_general',
				'option_category'  => 'configuration',
			),		
			'tcff_mediaposition'                => array(
				'label'            => esc_html__( 'Photo/Video Position', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display the photo or video above or below the post text. Only applies to the Full-width layout. (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'above' => 'Above',
					'below' => 'Below',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_general',
				'option_category'  => 'configuration',
			),		
			'tcff_enablenarrow'                => array(
				'label'            => esc_html__( 'Always use the Full-width layout when feed is narrow?', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "When displaying posts in either a narrow column or on a mobile device the plugin will automatically default to using the ‘Full-width’ layout as it’s better suited to narrow sizes. (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_general',
				'option_category'  => 'configuration',
			),		
			'tcff_oneimage'                => array(
				'label'            => esc_html__( 'Only show one image per post', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "If a Facebook post contains more than photo then enabling this setting means that only the first photo in the post is displayed.(Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_general',
				'option_category'  => 'configuration',
			),		
			'tcff_include'                => array(
				'label'            => esc_html__( 'Include in post', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The parts of the post you want to include (when applicable) (The ‘media’ and ‘social’ options are only available in the pro version)", TCFF_TEXT_DOMAIN ),
				'type'             => 'multiple_checkboxes',
				'options'          => array(
					'author' => 'Author',
					'text' => 'Text',
					'desc' => 'Desc',
					'sharedlinks' => 'Sharedlinks',
					'date' => 'Date',
					'media' => 'Media',
					'eventtitle' => 'Eventtitle',
					'eventdetails' => 'Eventdetails',
					'social' => 'Social',
					'link' => 'Link',
					'likebox' => 'Likebox',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_general',
				'option_category'  => 'configuration',
			),		
			'tcff_exclude'                => array(
				'label'            => esc_html__( 'Exclude from post', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The parts of the post you want to exclude (when applicable) (The ‘media’ and ‘social’ options are only available in the pro version)", TCFF_TEXT_DOMAIN ),
				'type'             => 'multiple_checkboxes',
				'options'          => array(
					'author' => 'Author',
					'text' => 'Text',
					'desc' => 'Desc',
					'sharedlinks' => 'Sharedlinks',
					'date' => 'Date',
					'media' => 'Media',
					'eventtitle' => 'Eventtitle',
					'eventdetails' => 'Eventdetails',
					'social' => 'Social',
					'link' => 'Link',
					'likebox' => 'Likebox',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_general',
				'option_category'  => 'configuration',
			),		
			'tcff_showauthor'                => array(
				'label'            => esc_html__( 'Show/Hide post author', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Show or hide the name and avatar of the post author", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_general',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_post_layout_post_style ---------------------------*/			
			'tcff_poststyle'                => array(
				'label'            => esc_html__( 'Post Style', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Choose from either a regular post style or a “boxed” style with a background color and/or box-shadow applied", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'regular' => 'Regular',
					'boxed' => 'Boxed',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_post_style',
				'option_category'  => 'configuration',
			),		
			'tcff_boxshadow'                => array(
				'label'            => esc_html__( 'Box Shadow', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Apply a subtle box shadow to the “boxed” post style", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_post_style',
				'option_category'  => 'configuration',
			),
			'tcff_postbgcolor'                => array(
				'label'            => esc_html__( 'Post background color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The background color of each individual Facebook post (Color Hex Code not including the \'#\')', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_post_layout_post_style',
				'option_category'  => 'configuration',
			),
			'tcff_postcorners'                => array(
				'label'            => esc_html__( 'Post corner radius', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The radius of the rounded corners on a post (any number not including the 'px')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_post_style',
				'option_category'  => 'configuration',
			),
			'tcff_sepcolor'                => array(
				'label'            => esc_html__( 'Post separating line color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The color of the line separating the posts (Color Hex Code not including the \'#\')', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_post_layout_post_style',
				'option_category'  => 'configuration',
			),
			'tcff_sepsize'                => array(
				'label'            => esc_html__( 'Post separating line size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The thickness in pixels of the line separating the posts (any number)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_post_layout_post_style',
				'option_category'  => 'configuration',
			),	
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_text_character_limits ---------------------------*/	
			'tcff_textlength'                => array(
				'label'            => esc_html__( 'Maximum post text length', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The maximum character length of the post text (any number)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_text_character_limits',
				'option_category'  => 'configuration',
			),
			'tcff_desclength'                => array(
				'label'            => esc_html__( 'Description maximum length', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The maximum character length of the description (any number", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_text_character_limits',
				'option_category'  => 'configuration',
			),
			'tcff_seemoretext'                => array(
				'label'            => esc_html__( '‘See More’ link text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text you wish to use in place of the ‘See More’ link text", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_text_character_limits',
				'option_category'  => 'configuration',
			),
			'tcff_seelesstext'                => array(
				'label'            => esc_html__( '‘See Less’ link text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text you wish to use in place of the ‘See Less’ link text", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_text_character_limits',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_feed_header ---------------------------*/				
			'tcff_showheader'                => array(
				'label'            => esc_html__( 'Show the feed header', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display a customizable header at the top of the feed", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),		
			'tcff_headeroutside'                => array(
				'label'            => esc_html__( 'Display header outside/inside', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display the feed header inside or outside of the feed’s container", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),		
			'tcff_headertext'                => array(
				'label'            => esc_html__( 'Header text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text to display in the header", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),
			'tcff_headerbg'                => array(
				'label'            => esc_html__( 'Header background color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The background color of the feed header (Color Hex Code not including the \'#\').', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),		
			'tcff_headerpadding'                => array(
				'label'            => esc_html__( 'Header padding', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The padding applied to the feed header (any number including the unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),		
			'tcff_headertextsize'                => array(
				'label'            => esc_html__( 'Header text size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the header text in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),		
			'tcff_headertextweight'                => array(
				'label'            => esc_html__( 'Header text weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text weight of the header text", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'inherit' => 'Inherit',
					'normal' => 'Normal',
					'bold' => 'Bold',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),
			'tcff_headertextcolor'                => array(
				'label'            => esc_html__( 'Header text color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The color of the page header (Color Hex Code not including the \'#\')', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),		
			'tcff_headericon'                => array(
				'label'            => esc_html__( 'Header icon', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The icon to use in the page header", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),
			'tcff_headericoncolor'                => array(
				'label'            => esc_html__( 'Header icon color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The color of the icon in the feed header (Color Hex Code not including the \'#\')', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),		
			'tcff_headericonsize'                => array(
				'label'            => esc_html__( 'Icon size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The size of the header icon in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_feed_header',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_post_author ---------------------------*/	
			'tcff_cols'                => array(
				'label'            => esc_html__( 'Author text size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the author text in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_author',
				'option_category'  => 'configuration',
			),
			'tcff_authorcolor'                => array(
				'label'            => esc_html__( 'Author text color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The color of the author text (Color Hex Code not including the \'#\')', TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_post_author',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_post_text ---------------------------*/		
			'tcff_textformat'                => array(
				'label'            => esc_html__( 'Post text format', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Any HTML tag that the post text should be wrapped in (p, span, h1, h2, etc...)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),
			'tcff_textsize'                => array(
				'label'            => esc_html__( 'Post text font size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the post text in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),
			'tcff_textweight'                => array(
				'label'            => esc_html__( 'Post text weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The weight of the post text", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'inherit' => 'Inherit',
					'normal' => 'Normal',
					'bold' => 'Bold',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),
			'tcff_textcolor'                => array(
				'label'            => esc_html__( 'Post text color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the post text (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),
			'tcff_textlinkcolor'                => array(
				'label'            => esc_html__( 'Link color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the links in the post text (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),	
			'tcff_textlink'                => array(
				'label'            => esc_html__( 'Link post text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to link the post text to the post on Facebook', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),	
			'tcff_posttags'                => array(
				'label'            => esc_html__( 'Post tags', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to link @tags in your posts', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),	
			'tcff_linkhashtags'                => array(
				'label'            => esc_html__( 'Link hash tags', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to link hashtags in your posts', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_photo_video_link_description ---------------------------*/	
			'tcff_descsize'                => array(
				'label'            => esc_html__( 'Description font size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The font size of the descriptions in pixels (any number not including a unit)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_photo_video_link_description',
				'option_category'  => 'configuration',
			),
			'tcff_descweight'                => array(
				'label'            => esc_html__( 'Description text weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The weight of the description", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'inherit' => 'Inherit',
					'normal' => 'Normal',
					'bold' => 'Bold',
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_photo_video_link_description',
				'option_category'  => 'configuration',
			),
			'tcff_desccolor'                => array(
				'label'            => esc_html__( 'Description color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the description (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_photo_video_link_description',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_shared_links ---------------------------*/			
			'tcff_linktitleformat'               => array(
				'label'            => esc_html__( 'Link title format', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Any HTML tag that shared link titles should be wrapped in (p, span, h1, h2, etc...)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),		
			'tcff_linktitlesize'               => array(
				'label'            => esc_html__( 'Link title font size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the link title in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),
			'tcff_linktitlecolor'                => array(
				'label'            => esc_html__( 'Link title color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the link title text (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),
			'tcff_linkurlcolor'                => array(
				'label'            => esc_html__( 'Link URL color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the link URL (source) text (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),		
			'tcff_linkurlsize'               => array(
				'label'            => esc_html__( 'Link URL font size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the link title in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),
			'tcff_linkdesccolor'                => array(
				'label'            => esc_html__( 'Link description color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the link description text (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),		
			'tcff_linkdescsize'               => array(
				'label'            => esc_html__( 'Link description font size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the link description in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),
			'tcff_linkbgcolor'                => array(
				'label'            => esc_html__( 'Link box background color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The background color of the link box (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),
			'tcff_linkbordercolor'                => array(
				'label'            => esc_html__( 'Link box border color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The border color of the link box (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_shared_links',
				'option_category'  => 'configuration',
			),	
			'tcff_disablelinkbox'                => array(
				'label'            => esc_html__( 'Remove the link box', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to hide the box around shared links', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_typography_post_text',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_date ---------------------------*/		
			'tcff_datepos'                => array(
				'label'            => esc_html__( 'Date position', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to position the post date directly beneath the post author, above the post text or below the post text at the bottom of the post', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' => et_builder_i18n( 'Select' ),
					'author' => 'Author',
					'above' => 'Above',
					'below' => 'Below',
				),
				'toggle_slug'      => 'tcff_typography_date',
				'option_category'  => 'configuration',
			),
			'tcff_datesize'                => array(
				'label'            => esc_html__( 'Date size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the date in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_date',
				'option_category'  => 'configuration',
			),		
			'tcff_dateweight'                => array(
				'label'            => esc_html__( 'Date weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text weight of the date', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' => et_builder_i18n( 'Select' ),
					'inherit' => 'Inherit',
					'normal' => 'Normal',
					'bold' => 'Bold',
				),
				'toggle_slug'      => 'tcff_typography_date',
				'option_category'  => 'configuration',
			),
			'tcff_datecolor'                => array(
				'label'            => esc_html__( 'Date color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the date (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_date',
				'option_category'  => 'configuration',
			),		
			'tcff_dateformat'                => array(
				'label'            => esc_html__( 'Date format', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The format that the date should be displayed in
1 = Posted 2 days ago
2 = July 25th, 5:30 pm
3 = July 25th
4 = Thu July 25th
5 = Thursday July 25th
6 = Thu Jul 25th, 2017
7 = Thursday July 25th, 2017
8 = Thursday July 25th, 2017 – 5:30 pm
9 = Thursday Jul 25th, ’17
10 = 07.25.13
11 = 07/25/13
12 = 25.07.13
13 = 25/07/13
14 = 25-07-2017, 17:30
15 = 25th July 2017, 17:30
16 = 25 Jul 2017, 17:30
17 = Monday 25th July 2017, 17:30
18 = 07.25.16 – 17:30
19 = 25.07.16 – 17:30', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' => et_builder_i18n( 'Select' ),
					'1' => 'Posted 2 days ago',
					'2' => 'July 25th, 5:30 pm',
					'3' => 'July 25th',
					'4' => 'Thu July 25th',
					'5' => 'Thursday July 25th',
					'6' => 'Thu Jul 25th, 2017',
					'7' => 'Thursday July 25th, 2017',
					'8' => 'Thursday July 25th, 2017 – 5:30 pm',
					'9' => 'Thursday Jul 25th, ’17',
					'10' => '07.25.13',
					'11' => '07/25/13',
					'12' => '25.07.13',
					'13' => '25/07/13',
					'14' => '25-07-2017, 17:30',
					'15' => '25th July 2017, 17:30',
					'16' => '25 Jul 2017, 17:30',
					'17' => 'Monday 25th July 2017, 17:30',
					'18' => '07.25.16 – 17:30',
					'19' => '25.07.16 – 17:30',
				),
				'toggle_slug'      => 'tcff_typography_date',
				'option_category'  => 'configuration',
			),
			'tcff_datecustom'                => array(
				'label'            => esc_html__( 'Date custom format', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "(Any PHP date format)
Use a custom date format instead of the built-in options (reference)
(Example: ''D M jS, Y')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_date',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_event_title ---------------------------*/
			'tcff_eventtitleformat'                => array(
				'label'            => esc_html__( 'Event title format', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Any HTML tag that event titles should be wrapped in (p, span, h1, h2, etc...)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_event_title',
				'option_category'  => 'configuration',
			),
			'tcff_eventtitlesize'                => array(
				'label'            => esc_html__( 'Event title size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of event titles in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_event_title',
				'option_category'  => 'configuration',
			),		
			'tcff_eventtitleweight'                => array(
				'label'            => esc_html__( 'Event title weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text weight of event titles', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' => et_builder_i18n( 'Select' ),
					'inherit' => 'Inherit',
					'normal' => 'Normal',
					'bold' => 'Bold',
				),
				'toggle_slug'      => 'tcff_typography_event_title',
				'option_category'  => 'configuration',
			),
			'tcff_eventtitlecolor'                => array(
				'label'            => esc_html__( 'Event title color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of event titles (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_event_title',
				'option_category'  => 'configuration',
			),	
			'tcff_eventtitlelink'                => array(
				'label'            => esc_html__( 'Link event title', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to link the event title to the event on Facebook', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' => et_builder_i18n( 'Select' ),
					'true' => et_builder_i18n( 'True' ),
					'false' => et_builder_i18n( 'False' ),
				),
				'toggle_slug'      => 'tcff_typography_event_title',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_event_date ---------------------------*/	
			'tcff_eventdatesize'                => array(
				'label'            => esc_html__( 'Event date size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of event date in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_event_date',
				'option_category'  => 'configuration',
			),		
			'tcff_eventdateweight'                => array(
				'label'            => esc_html__( 'Event date weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text weight of event dates', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'inherit' => 'Inherit',
					'normal' => 'Normal',
					'bold' => 'Bold',
				),
				'toggle_slug'      => 'tcff_typography_event_date',
				'option_category'  => 'configuration',
			),
			'tcff_eventdatecolor'                => array(
				'label'            => esc_html__( 'Event date color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of event dates (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_event_date',
				'option_category'  => 'configuration',
			),		
			'tcff_eventdatepos'                => array(
				'label'            => esc_html__( 'Event date position', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text weight of event dates', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'below' => et_builder_i18n( 'Below' ),
					'above' => et_builder_i18n( 'Above' ),
				),
				'toggle_slug'      => 'tcff_typography_event_date',
				'option_category'  => 'configuration',
			),		
			'tcff_eventdateformat'                => array(
				'label'            => esc_html__( 'Event date format', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The format that the event date should be displayed in
1 = July 25, 2017, 5:30pm
2 = July 25th, 5:30pm
3 = 5:30pm – July 25th
4 = 5:30pm, July 25th
5 = Thursday July 25th – 5:30pm
6 = Thu Jul 25th, 2017, 5:30PM
7 = Thursday July 25th, 2017, 5:30PM
8 = Thursday July 25th, 2017 – 5:30pm
9 = Thursday Jul 25th, ’17
10 = 07.25.17 – 5:30PM
11 = 07/25/17, 5:30pm
12 = 25.07.17 – 5:30PM
13 = 25/07/17, 5:30pm
14 = Jul 25, 5:30pm
15 = Jul 25, 17:30
16 = 25-07-2016, 17:30
17 = 25th July 2016, 17:30
18 = 25 Jul 2016, 17:30
19 = Monday 25th July 2016, 17:30
20 = 07.25.16 – 17:30
21 = 25.07.16 – 17:30', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' => et_builder_i18n( 'Select' ),
					'1' => et_builder_i18n( 'July 25, 2017, 5:30pm' ),
					'2' => et_builder_i18n( 'July 25th, 5:30pm' ),
					'3' => et_builder_i18n( '5:30pm – July 25th' ),
					'4' => et_builder_i18n( '5:30pm, July 25th' ),
					'5' => et_builder_i18n( 'Thursday July 25th – 5:30pm' ),
					'6' => et_builder_i18n( 'Thu Jul 25th, 2017, 5:30PM' ),
					'7' => et_builder_i18n( 'Thursday July 25th, 2017, 5:30PM' ),
					'8' => et_builder_i18n( 'Thursday July 25th, 2017 – 5:30pm' ),
					'9' => et_builder_i18n( 'Thursday Jul 25th, ’17' ),
					'10' => et_builder_i18n( '07.25.17 – 5:30PM' ),
					'11' => et_builder_i18n( '07/25/17, 5:30pm' ),
					'12' => et_builder_i18n( '25.07.17 – 5:30PM' ),
					'13' => et_builder_i18n( '25/07/17, 5:30pm' ),
					'14' => et_builder_i18n( 'Jul 25, 5:30pm' ),
					'15' => et_builder_i18n( 'Jul 25, 17:30' ),
					'16' => et_builder_i18n( '25-07-2016, 17:30' ),
					'17' => et_builder_i18n( '25th July 2016, 17:30' ),
					'18' => et_builder_i18n( '25 Jul 2016, 17:30' ),
					'19' => et_builder_i18n( 'Monday 25th July 2016, 17:30' ),
					'20' => et_builder_i18n( '07.25.16 – 17:30' ),
					'21' => et_builder_i18n( '25.07.16 – 17:30' ),
				),
				'toggle_slug'      => 'tcff_typography_event_date',
				'option_category'  => 'configuration',
			),		
			'tcff_eventdatecustom'                => array(
				'label'            => esc_html__( 'Event date custom format', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "(Any PHP date format)
Use a custom date format instead of the built-in options (reference)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_event_date',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_event_details ---------------------------*/			
			'tcff_eventdetailssize'                => array(
				'label'            => esc_html__( 'Event details size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The font size of the event details in pixels (any number not including a unit)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_event_details',
				'option_category'  => 'configuration',
			),		
			'tcff_eventdetailsweight'                => array(
				'label'            => esc_html__( 'Event details weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text weight of the event details', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'inherit' => et_builder_i18n( 'Inherit' ),
					'normal' => et_builder_i18n( 'Normal' ),
					'bold' => et_builder_i18n( 'Bold' ),
				),
				'toggle_slug'      => 'tcff_typography_event_details',
				'option_category'  => 'configuration',
			),
			'tcff_eventdetailscolor'                => array(
				'label'            => esc_html__( 'Event details color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the event details (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_event_details',
				'option_category'  => 'configuration',
			),
			'tcff_eventlinkcolor'                => array(
				'label'            => esc_html__( 'Event details link color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The color of the links in the event details (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_event_details',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_typography_post_actions_links ---------------------------*/		
			'tcff_linksize'                => array(
				'label'            => esc_html__( 'Link size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The font size of the post link in pixels (any number not including a unit)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_actions_links',
				'option_category'  => 'configuration',
			),		
			'tcff_linkweight'                => array(
				'label'            => esc_html__( 'Link weight', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text weight of the post link', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					'' =>  et_builder_i18n( 'Select' ),
					'inherit' => et_builder_i18n( 'Inherit' ),
					'normal' => et_builder_i18n( 'Normal' ),
					'bold' => et_builder_i18n( 'Bold' ),
				),
				'toggle_slug'      => 'tcff_typography_post_actions_links',
				'option_category'  => 'configuration',
			),
			'tcff_linkcolor'                => array(
				'label'            => esc_html__( 'Link color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text color of the post link (Color Hex Code not including the '#')", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_typography_post_actions_links',
				'option_category'  => 'configuration',
			),
			'tcff_showfacebooklink'                => array(
				'label'            => esc_html__( 'Show Facebook link', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to show the ‘View on Facebook’ link', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					''  =>  et_builder_i18n( 'Select' ),
					'true'  =>  et_builder_i18n( 'True' ),
					'false' =>  et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_actions_links',
				'option_category'  => 'configuration',
			),
			'tcff_facebooklinktext'                => array(
				'label'            => esc_html__( 'Facebook link text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text you wish to use in place of the ‘View on Facebook’ link text', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_actions_links',
				'option_category'  => 'configuration',
			),
			'tcff_showsharelink'                => array(
				'label'            => esc_html__( 'Show Share link', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Whether to show the ‘Share’ link', TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
					''  =>  et_builder_i18n( 'Select' ),
					'true'  =>  et_builder_i18n( 'True' ),
					'false' =>  et_builder_i18n( 'False' ),
				),
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_actions_links',
				'option_category'  => 'configuration',
			),	
			'tcff_sharelinktext'                => array(
				'label'            => esc_html__( 'Share link text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'The text you wish to use in place of the ‘Share’ link text', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_typography_post_actions_links',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_misc_social_like_shares_comments ---------------------------*/	
			'tcff_iconstyle'                => array(
				'label'            => esc_html__( 'Icon style', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to use light or dark icons (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'light' => et_builder_i18n( 'Light' ),
											  'dark' => et_builder_i18n( 'Dark' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_social_like_shares_comments',
				'option_category'  => 'configuration',
			),
			'tcff_socialtextcolor'                => array(
				'label'            => esc_html__( 'Social text color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text color of the likes, shares and comments numbers, and the comments text (Color Hex Code not including the '#') (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_misc_social_like_shares_comments',
				'option_category'  => 'configuration',
			),
			'tcff_socialbgcolor'                => array(
				'label'            => esc_html__( 'Social background color', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The background color of the likes, shares and comments box, and the slide down comments box (Color Hex Code not including the '#') (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'color',
				'toggle_slug'      => 'tcff_misc_social_like_shares_comments',
				'option_category'  => 'configuration',
			),	
			'tcff_expandcomments'                => array(
				'label'            => esc_html__( 'Expand comments initially', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to expand the comments below the posts initially (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_social_like_shares_comments',
				'option_category'  => 'configuration',
			),
			'tcff_commentsnum'                => array(
				'label'            => esc_html__( 'Number of initial comments', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number (max 25)
The number of comments to show initially when the comments box is expanded (Pro version only)', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_social_like_shares_comments',
				'option_category'  => 'configuration',
			),	
			'tcff_hidecommentimages'                => array(
				'label'            => esc_html__( 'Hide the comment images', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to the hide the profile pictures of the commenters on each post (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_social_like_shares_comments',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/	
			/*------------------------ tcff_misc_like_box_page_plugin ---------------------------*/	
			'tcff_likeboxpos'                => array(
				'label'            => esc_html__( 'Like box position', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display the Facebook Like box at the top or bottom of the feed", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'top' => et_builder_i18n( 'Top' ),
											  'bottom' => et_builder_i18n( 'Bottom' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_like_box_page_plugin',
				'option_category'  => 'configuration',
			),	
			'tcff_likeboxoutside'                => array(
				'label'            => esc_html__( 'Like box outside/inside', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to display the Facebook Like box inside or outside of the feed’s container", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_like_box_page_plugin',
				'option_category'  => 'configuration',
			),	
			'tcff_likeboxwidth'                => array(
				'label'            => esc_html__( 'Custom Like Box width', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( 'Any number between 180 and 500.
The width of the Like Box. Default is 340. Min is 180. Max is 500.', TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_like_box_page_plugin',
				'option_category'  => 'configuration',
			),	
			'tcff_likeboxfaces'                => array(
				'label'            => esc_html__( 'Show Like box Faces', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to show the avatars of people who like your page", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_like_box_page_plugin',
				'option_category'  => 'configuration',
			),
			'tcff_likeboxcover'                => array(
				'label'            => esc_html__( 'Include your Cover photo', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to use your Facebook page Cover photo as the background of the Like Box", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_like_box_page_plugin',
				'option_category'  => 'configuration',
			),
			'tcff_likeboxsmallheader'                => array(
				'label'            => esc_html__( 'Use a small header', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to use a slim/small version of the Like Box header", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_like_box_page_plugin',
				'option_category'  => 'configuration',
			),
			'tcff_likeboxhidebtn'                => array(
				'label'            => esc_html__( 'Hide the call to action button', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to hide the call-to-action button in the Like Box (if available)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_like_box_page_plugin',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_misc_general ---------------------------*/	
			'tcff_linkimagesize'                => array(
				'label'            => esc_html__( 'Shared Link image size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The size of the image used when sharing a link in a timeline post. (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'smallsquare' => et_builder_i18n( 'Small square' ),
											  'largesquare' => et_builder_i18n( 'Large square' ),
											  'full' => et_builder_i18n( 'Full' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_general',
				'option_category'  => 'configuration',
			),
			'tcff_videoaction'                => array(
				'label'            => esc_html__( 'Video action', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "When clicking on a non-embedded video define whether to play the video directly in your feed, or link to the video on Facebook to play the video there (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'playvideo' => et_builder_i18n( 'Play video' ),
											  'facebook' => et_builder_i18n( 'Facebook' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_general',
				'option_category'  => 'configuration',
			),
			'tcff_postimagesize'                => array(
				'label'            => esc_html__( 'Post image size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Facebook only provides two image sizes for posts; 130px or 720px. By default, the plugin uses the 720px image size but this can be changed using this setting. Applies to timeline feeds only. (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'small' => et_builder_i18n( 'Small' ),
											  'large' => et_builder_i18n( 'Large' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_general',
				'option_category'  => 'configuration',
			),
			'tcff_credit'                => array(
				'label'            => esc_html__( 'Show credit link', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Choose whether to add a ‘Custom Facebook Feed’ link to the bottom of your feed", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_general',
				'option_category'  => 'configuration',
			),
			'tcff_nofollow'                => array(
				'label'            => esc_html__( 'Nofollow links', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether to add ‘rel=”nofollow”‘ to all links. Default is set to true. (Pro version only)", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' => et_builder_i18n( 'True' ),
											  'false' => et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_misc_general',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_custom_text_translate_event_text ---------------------------*/	
			'tcff_maptext'                => array(
				'label'            => esc_html__( '‘Map’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text added after the address of an event (example: 'Share')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_custom_text_translate_event_text',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_custom_text_translate_call_to_action_buttons ---------------------------*/	
			'tcff_learnmoretext'                => array(
				'label'            => esc_html__( '‘Learn More’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text used for the Learn More call-to-action button (example: 'Learn More')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_custom_text_translate_call_to_action_buttons',
				'option_category'  => 'configuration',
			),
			'tcff_shopnowtext'                => array(
				'label'            => esc_html__( '‘Shop Now’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text used for the Shop Now call-to-action button (example: 'Shop now')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_custom_text_translate_call_to_action_buttons',
				'option_category'  => 'configuration',
			),
			'tcff_messagepage'                => array(
				'label'            => esc_html__( '‘Message Page’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text used for the Message Page call-to-action button (example: 'Message Page')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_custom_text_translate_call_to_action_buttons',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_custom_text_translate_load_more_button ---------------------------*/
			'tcff_nomoretext'                => array(
				'label'            => esc_html__( '‘No more posts’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text displayed when there are no more posts available to load (example: 'That's all folks')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_custom_text_translate_call_to_action_buttons',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_custom_text_translate_likes_shares_comments_text ---------------------------*/		
			'tcff_previouscommentstext'                => array(
				'label'            => esc_html__( '‘View previous comments’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text used in the comments section (when applicable) (example: 'View Previous Comments')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),		
			'tcff_commentonfacebooktext'                => array(
				'label'            => esc_html__( '‘Comment on Facebook’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text used at the bottom of the comments section (example: 'Comment on Facebook')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),			
			'tcff_photostext'                => array(
				'label'            => esc_html__( '‘Photos’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text added to the end of an album name. (example: 'Photos')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_likethistext'                => array(
				'label'            => esc_html__( '‘like this’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. __ and __ like this", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_likesthistext'                => array(
				'label'            => esc_html__( '‘likes this’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. __ likes this", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_reactedtothistext'                => array(
				'label'            => esc_html__( '‘reacted to this’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. __ reacted to this", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_andtext'                => array(
				'label'            => esc_html__( '‘and’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. __ and __ like this", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_othertext'                => array(
				'label'            => esc_html__( '‘other’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. __, __ and 1 other like this", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_otherstext'                => array(
				'label'            => esc_html__( '‘others’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. __, __ and 10 others like this", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_replytext'                => array(
				'label'            => esc_html__( '‘reply’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. 1 reply", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),				
			'tcff_repliestext'                => array(
				'label'            => esc_html__( '‘replies’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg. 5 replies", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_likes_shares_comments_text',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_custom_text_translate_date ---------------------------*/					
			'tcff_secondtext'                => array(
				'label'            => esc_html__( '‘second’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 second ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_secondstext'                => array(
				'label'            => esc_html__( '‘seconds’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 30 seconds ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_minutetext'                => array(
				'label'            => esc_html__( '‘minute’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 minute ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_minutestext'                => array(
				'label'            => esc_html__( '‘minutes’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 5 minutes ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_hourtext'                => array(
				'label'            => esc_html__( '‘hour’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 hour ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_hourstext'                => array(
				'label'            => esc_html__( '‘hours’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 2 hours ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_daytext'                => array(
				'label'            => esc_html__( '‘day’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 day ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_daystext'                => array(
				'label'            => esc_html__( '‘days’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 2 days ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_weektext'                => array(
				'label'            => esc_html__( '‘week’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 week ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_weekstext'                => array(
				'label'            => esc_html__( '‘weeks’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 2 weeks ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_monthtext'                => array(
				'label'            => esc_html__( '‘month’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 month ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_monthstext'                => array(
				'label'            => esc_html__( '‘months’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 9 months ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_yeartext'                => array(
				'label'            => esc_html__( '‘year’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 year ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_yearstext'                => array(
				'label'            => esc_html__( '‘years’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 2 years ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),				
			'tcff_agotext'                => array(
				'label'            => esc_html__( '‘ago’ text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Eg: 1 day ago", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'tcff_custom_text_translate_date',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_extensions_date_range ---------------------------*/			
			'tcff_from'                => array(
				'label'            => esc_html__( 'From', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The date to display posts from
The number of minutes ago
The number of hours ago
The number of days ago
The number of weeks ago
The number of months ago

Examples:
mm/dd/yy
-x minutes
-x hours
-x days
-x weeks
-x months", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_date_range',
				'option_category'  => 'configuration',
			),			
			'tcff_until'                => array(
				'label'            => esc_html__( 'Until', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The date to display posts until
Display posts up until now
The number of minutes ago
The number of hours ago
The number of days ago
The number of weeks ago
The number of months ago

Examples:
mm/dd/yy
now
-x minutes
-x hours
-x days
-x weeks
-x months", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_date_range',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_extensions_featured_post ---------------------------*/			
			'tcff_featuredpost'                => array(
				'label'            => esc_html__( 'Featured Post ID', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The Post ID of the post you want to display", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_featured_post',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_extensions_album ---------------------------*/				
			'tcff_album'                => array(
				'label'            => esc_html__( 'Album ID', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The Album ID of the Facebook album you want to display (example: '440612488444')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_album',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_extensions_carousel ---------------------------*/	
			'tcff_carousel'                     => array(
				'label'            => esc_html__( 'Carousel Feed', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Whether or not to apply the carousel to this feed", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true'  =>  et_builder_i18n( 'True' ),
											  'false' =>  et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),				
			'tcff_carouselcols'                => array(
				'label'            => esc_html__( 'Number of columns', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The number of columns inside the carousel slide show (number 1-6)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),				
			'tcff_carouselmobilecols'                => array(
				'label'            => esc_html__( 'Number of columns for mobile', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The number of columns on mobile displays (number 1-6)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),	
			'tcff_carouselheight'                => array(
				'label'            => esc_html__( 'Height of Carousel', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "How the height of the feed is set. Note: the “autoexpand” option only works when displaying 1 column in the carousel", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'tallest' =>  et_builder_i18n( 'Tallest' ),
											  'clickexpand'  =>  et_builder_i18n( 'Click expand' ),
											  'autoexpand' =>  et_builder_i18n( 'Auto expand' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),	
			'tcff_carouselarrows'                => array(
				'label'            => esc_html__( 'Arrow Navigation', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "How arrows are displayed for navigating through the carousel", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'none' =>  et_builder_i18n( 'None' ),
											  'below'  =>  et_builder_i18n( 'Below' ),
											  'onhover' =>  et_builder_i18n( 'Onhover' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),	
			'tcff_carouselpag'                => array(
				'label'            => esc_html__( 'Pagination', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Icons to indicate the relative position of the current slide", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' =>  et_builder_i18n( 'True' ),
											  'false'  =>  et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),	
			'tcff_carouselautoplay'                => array(
				'label'            => esc_html__( 'Autoplay', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Cycle through posts automatically when the feed loads", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true' =>  et_builder_i18n( 'True' ),
											  'false'  =>  et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),				
			'tcff_carouseltime'                => array(
				'label'            => esc_html__( 'Autoplay Time Interval', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Number of milliseconds before a new post is shown (any number)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_carousel',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			/*------------------------ tcff_extensions_reviews ---------------------------*/				
			'tcff_reviewsrated'                => array(
				'label'            => esc_html__( 'Show reviews rated', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Show reviews with these ratings (number 1-5)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_reviews',
				'option_category'  => 'configuration',
			),				
			'tcff_starsize'                => array(
				'label'            => esc_html__( 'Star icon size', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The size of the star icons (any number)", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_reviews',
				'option_category'  => 'configuration',
			),				
			'tcff_reviewslinktext'                => array(
				'label'            => esc_html__( '“View all Reviews” text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The text to use for the link (example: 'See all')", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_reviews',
				'option_category'  => 'configuration',
			),				
			'tcff_reviewshidenotext'                => array(
				'label'            => esc_html__( 'Hide reviews with no text', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Choose whether to hide reviews with no text in them", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'true'  =>  et_builder_i18n( 'True' ),
											  'false' =>  et_builder_i18n( 'False' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_reviews',
				'option_category'  => 'configuration',
			),
			'tcff_reviewsmethod'                => array(
				'label'            => esc_html__( 'API retrieval method', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "Most users should leave this set as “Auto” and only change it if directed by a member of the support team.", TCFF_TEXT_DOMAIN ),
				'type'             => 'select',
				'options'          => array(
											  ''  =>  et_builder_i18n( 'Select' ),
											  'auto'  =>  et_builder_i18n( 'Auto' ),
											  'batch'  =>  et_builder_i18n( 'Batch' ),
											  'all' =>  et_builder_i18n( 'All' ),
										  ),
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_reviews',
				'option_category'  => 'configuration',
			),				
			'tcff_pagetoken'                => array(
				'label'            => esc_html__( 'Page Access Token', TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "The Access Token for the Facebook page you want to display reviews from. Note: this shortcode option only needs to be used if displaying multiple review feeds from different Facebook pages, otherwise you can set it on the main plugin Settings page.", TCFF_TEXT_DOMAIN ),
				'type'             => 'text',
				'default'          => '',
				'toggle_slug'      => 'tcff_extensions_reviews',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
			
			/*------------------------ tcff_admin_diagnostics ---------------------------*/	
			'tcff_diagnostics'            => array(
				'label'            => esc_html__( "Display Shortcode Instead of Module", TCFF_TEXT_DOMAIN ),
				'description'      => esc_html__( "If enabled, this module will be DISABLED from 
rendering and only the shortcode will be displayed.", TCFF_TEXT_DOMAIN ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => esc_html( 'Yes', TCFF_TEXT_DOMAIN ),
					'off' => esc_html( 'No', TCFF_TEXT_DOMAIN ),
				),
				'default'          => 'off',
				'toggle_slug'      => 'tcff_admin_diagnostics',
				'option_category'  => 'configuration',
			),
			/*------------- End ----------------*/
		);
		/*------------- End ----------------*/
        $post_fields_paid = array();
        $post_fields = array_merge( $post_fields, $post_fields_paid );
        return $post_fields;
    }
    
    public function get_feed() {
		$output  = array();
		$output[' '] = 'Legacy Feed (no Feed ID)';
		//if (class_exists('\CustomFacebookFeed\Builder\SBI_Db')){
			$exported_feeds = \CustomFacebookFeed\Builder\CFF_Db::feeds_query();
			foreach ( $exported_feeds as $feed_id => $feed ) {
				$settings = json_decode($feed['settings'], true);
				$id = $feed['id'];
				$value= '#'.$id.' ('.ucwords($settings['feedtype']).') '.$feed['feed_name'];
				$output[$id.'_extra'] = $value;
			}
		//}
		return $output;
	}
    
    public function render( $attrs, $content = null, $render_slug ) {
		$tcff_option = tcff_setting_handler();
		$fields = '';
		$diagnostics = $this->props['tcff_diagnostics'];
		unset($this->props['tcff_diagnostics']);
		foreach($this->props as $key=>$value){
			if (strpos($key, 'tcff_') !== false && $value != 'undefined') {
				$val = str_replace("_extra", "", $value); 
				if(strpos($val, "|") !== false){
					$options = explode("|", $val);
					$fval = '';
					$tkey = str_replace("tcff_", "", $key);
					foreach($options as $okey=>$ovalue){
							if($ovalue == 'on') $fval .= empty($fval) ? $tcff_option[$tkey][$okey] : ','.$tcff_option[$tkey][$okey];
					}
					$fields .= empty($fval) || $fval == ' ' ? '' : ' '.$tkey.'="'.$fval.'"';
				} else{
					$fields .= empty($val) || $val == ' ' ? '' : ' '.str_replace("tcff_", "", $key).'="'.$val.'"';
				}
			}
		}
		$helper = '<h4>"Admin Diagnostics" setting for this module is ENABLED</h4>
To properly render this divi module:
<div style="padding-left:40px;margin-bottom: 20px;">
  - Open the Divi Builder<br>
  - Edit the "Module Setting" for this Divi module<br>
  - Disable the "Admin Diagnostics" settings<br>
</div>
<h4>Module Shortcode</h4>';
		$output = ($diagnostics == 'off') ? do_shortcode('[custom-facebook-feed'.$fields.']') : $helper.'[custom-facebook-feed'.$fields.']';
		return $output;
	}

}
new TCFF_Facebook_Module();