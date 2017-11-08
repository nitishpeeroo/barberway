<?php
/**
 * Barbershop skin file for theme.
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Theme init
if (!function_exists('themerex_skin_theme_setup_default')) {
	add_action( 'themerex_action_init_theme', 'themerex_skin_theme_setup_default', 1 );
	function themerex_skin_theme_setup_default() {

		// Add skin fonts in the used fonts list
		add_filter('themerex_filter_used_fonts',			'themerex_filter_used_fonts_default');
		// Add skin fonts (from Google fonts) in the main fonts list (if not present).
		add_filter('themerex_filter_list_fonts',			'themerex_filter_list_fonts_default');

		// Add skin stylesheets
		add_action('themerex_action_add_styles',			'themerex_action_add_styles_default');
		// Add skin inline styles
		add_filter('themerex_filter_add_styles_inline',		'themerex_filter_add_styles_inline_default');
		// Add skin responsive styles
		add_action('themerex_action_add_responsive',		'themerex_action_add_responsive_default');
		// Add skin responsive inline styles
		add_filter('themerex_filter_add_responsive_inline',	'themerex_filter_add_responsive_inline_default');

		// Add skin scripts
		add_action('themerex_action_add_scripts',			'themerex_action_add_scripts_default');
		// Add skin scripts inline
		add_action('themerex_action_add_scripts_inline',	'themerex_action_add_scripts_inline_default');

		// Return links color (if not set in the theme options)
		add_filter('themerex_filter_get_link_color',		'themerex_filter_get_link_color_default', 10, 1);
		// Return links dark color
		add_filter('themerex_filter_get_link_dark',			'themerex_filter_get_link_dark_default',  10, 1);
		// Return links light color
		add_filter('themerex_filter_get_link_light',		'themerex_filter_get_link_light_default', 10, 1);

		// Return main menu items color (if not set in the theme options)
		add_filter('themerex_filter_get_menu_color',		'themerex_filter_get_menu_color_default', 10, 1);
		// Return main menu items dark color
		add_filter('themerex_filter_get_menu_dark',			'themerex_filter_get_menu_dark_default',  10, 1);
		// Return main menu light color
		add_filter('themerex_filter_get_menu_light',		'themerex_filter_get_menu_light_default', 10, 1);

		// Return user menu items color (if not set in the theme options)
		add_filter('themerex_filter_get_user_color',		'themerex_filter_get_user_color_default', 10, 1);
		// Return user menu items dark color
		add_filter('themerex_filter_get_user_dark',			'themerex_filter_get_user_dark_default',  10, 1);
		// Return user menu light color
		add_filter('themerex_filter_get_user_light',		'themerex_filter_get_user_light_default', 10, 1);

		// Add color schemes
		themerex_add_color_scheme('original', array(
			'title'		 =>	__('Original', 'themerex'),
			'menu_color' => '#1dbb90',		// rgb(29,187,144)
			'menu_dark'  => '#018763',		// rgb(1,135,99)
			'menu_light' => '#ffffff',
			'link_color' => '#1eaace',		// rgb(30,170,206)
			'link_dark'  => '#007c9c',		// rgb(0,124,156)
			'link_light' => '#ffffff',
			'user_color' => '#bf9456',		// rgb(255,178,14)
			'user_dark'  => '#cc8b00',		// rgb(204,139,0)
			'user_light' => '#ffffff'
			)
		);
		themerex_add_color_scheme('contrast', array(
			'title'		 =>	__('Contrast', 'themerex'),
			'menu_color' => '#26c3d6',		// rgb(38,195,214)
			'menu_dark'  => '#24b6c8',		// rgb(36,182,200)
			'menu_light' => '#ffffff',
			'link_color' => '#f55c6d',		// rgb(245,92,109)
			'link_dark'  => '#e24c5d',		// rgb(226,76,93)
			'link_light' => '#ffffff',
			'user_color' => '#2d3e50',		// rgb(45,62,80)
			'user_dark'  => '#233140',		// rgb(35,49,64)
			'user_light' => '#ffffff'
			)
		);
		themerex_add_color_scheme('modern', array(
			'title'		 =>	__('Modern', 'themerex'),
			'menu_color' => '#f9c82d',		// rgb(249,200,45)
			'menu_dark'  => '#e6ba29',		// rgb(230,186,41)
			'menu_light' => '#ffffff',
			'link_color' => '#a7d163',		// rgb(167,209,99)
			'link_dark'  => '#98bf5a',		// rgb(152,191,90)
			'link_light' => '#ffffff',
			'user_color' => '#fe7d60',		// rgb(254,125,96)
			'user_dark'  => '#eb7459',		// rgb(235,116,89)
			'user_light' => '#ffffff'
			)
		);
		themerex_add_color_scheme('pastel', array(
			'title'		 =>	__('Pastel', 'themerex'),
			'menu_color' => '#0dcdc0',		// rgb(13,205,192)
			'menu_dark'  => '#0bbaae',		// rgb(11,186,174)
			'menu_light' => '#ffffff',
			'link_color' => '#a7d163',		// rgb(167,209,99)
			'link_dark'  => '#98bf5a',		// rgb(152,191,90)
			'link_light' => '#ffffff',
			'user_color' => '#0ead99',		// rgb(14,173,153)
			'user_dark'  => '#0c9c88',		// rgb(12,156,136)
			'user_light' => '#ffffff'
			)
		);
	}
}





//------------------------------------------------------------------------------
// Skin's fonts
//------------------------------------------------------------------------------

// Add skin fonts in the used fonts list
if (!function_exists('themerex_filter_used_fonts_default')) {
	//add_filter('themerex_filter_used_fonts', 'themerex_filter_used_fonts_default');
	function themerex_filter_used_fonts_default($theme_fonts) {
        $theme_fonts['Montserrat'] = 1;
        $theme_fonts['PT Sans Caption'] = 1;
		return $theme_fonts;
	}
}

// Add skin fonts (from Google fonts) in the main fonts list (if not present).
// To use custom font-face you not need add it into list in this function
// How to install custom @font-face fonts into the theme?
// All @font-face fonts are located in "theme_name/css/font-face/" folder in the separate subfolders for the each font. Subfolder name is a font-family name!
// Place full set of the font files (for each font style and weight) and css-file named stylesheet.css in the each subfolder.
// Create your @font-face kit by using Fontsquirrel @font-face Generator (http://www.fontsquirrel.com/fontface/generator)
// and then extract the font kit (with folder in the kit) into the "theme_name/css/font-face" folder to install
if (!function_exists('themerex_filter_list_fonts_default')) {
	//add_filter('themerex_filter_list_fonts', 'themerex_filter_list_fonts_default');
	function themerex_filter_list_fonts_default($list) {
		// Example:
		// if (!isset($list['Advent Pro'])) {
		//		$list['Advent Pro'] = array(
		//			'family' => 'sans-serif',																						// (required) font family
		//			'link'   => 'Advent+Pro:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic',	// (optional) if you use Google font repository
		//			'css'    => themerex_get_file_url('/css/font-face/Advent-Pro/stylesheet.css')									// (optional) if you use custom font-face
		//			);
		// }
        if (!isset($list['Montserrat']))	$list['Montserrat'] = array('family'=>'sans-serif', 'link'=>'Signika:400,300,600,700&subset=latin');
        if (!isset($list['PT Sans Caption']))	$list['PT+Serif+Caption'] = array('family'=>'sans-serif', 'link'=>'PT+Sans+Caption:400,700&subset=latin');
		return $list;
	}
}


//------------------------------------------------------------------------------
// Skin's stylesheets
//------------------------------------------------------------------------------
// Add skin stylesheets
if (!function_exists('themerex_action_add_styles_default')) {
	//add_action('themerex_action_add_styles', 'themerex_action_add_styles_default');
	function themerex_action_add_styles_default() {
		// Add stylesheet files
		themerex_enqueue_style( 'themerex-skin-style', themerex_get_file_url('skins/default/skin.css'), array(), null );
	}
}

// Add skin inline styles
if (!function_exists('themerex_filter_add_styles_inline_default')) {
	//add_filter('themerex_filter_add_styles_inline', 'themerex_filter_add_styles_inline_default');
	function themerex_filter_add_styles_inline_default($custom_style) {
	
		// Color scheme
		$scheme = themerex_get_custom_option('color_scheme');
		if (empty($scheme)) $scheme = 'original';

		global $THEMEREX_GLOBALS;

		// Links color
		$clr = themerex_get_custom_option('user_color');
		if (empty($clr) && $scheme!= 'original')	$clr = apply_filters('themerex_filter_get_link_color', '');
		if (!empty($clr)) {
			$THEMEREX_GLOBALS ['user_color'] = $clr;
			$rgb = themerex_hex2rgb($clr);
			$custom_style .= '
				 .woocommerce ul.products li.product .add_to_cart_button::before, .woocommerce-page ul.products li.product .add_to_cart_button::before, .sc_team_item .sc_team_item_info .sc_team_item_position, .sc_socials a, .post_item_excerpt .post_content .post_descr a:hover span:before, .isotope_wrap .isotope_item .post_item.post_item_masonry .post_title a, .isotope_wrap .isotope_item .post_item.post_item_classic .post_title a, .isotope_wrap .isotope_item .post_item .post_content .post_info .post_info_item a:hover, .widget_area .widget_calendar td a:after, .widget_area .widget_calendar .month_cur a:hover,footer .email_icon:before, footer .phone_icon:before, footer .address_icon:before, footer .working_time_icon:before, .copyright_wrap a:hover, .booking_day_container.booking_day_black .booking_day_slots, .booking_back_today a, .post_item.post_item_classic .post_descr .sc_button.sc_button_style_filled:hover, .post_item.post_item_masonry .post_descr .sc_button.sc_button_style_filled:hover, .sc_contact_form .sc_contact_form_button:hover button:before, a, a:hover, .bg_tint_light a, .bg_tint_light a:hover, .user_color, a.user_color:hover, .bg_tint_light .menu_main_responsive_button, .search_wrap.search_style_regular .search_form_wrap .search_submit, .search_wrap.search_style_regular .search_icon, .top_panel_style_light .content .search_wrap.search_style_regular .search_form_wrap .search_submit, .top_panel_style_light .content .search_wrap.search_style_regular .search_icon, .search_results .post_more, .search_results .search_results_close, .search_results .post_more:hover, .page_top_wrap .breadcrumbs a.breadcrumbs_item:hover, .search_results .search_results_close:hover, .post_title .post_icon, .post_item_related .post_title a, .post_item_related .post_title a:hover, .isotope_wrap .isotope_item .post_item .post_content.effect16 .post_title a:hover, .pagination_single > .pager_numbers, .pagination_single a:hover, .pagination_slider .pager_cur:hover, .pagination_slider .pager_cur:focus, .pagination_pages > .active, .pagination_pages > a:hover, .pagination_wrap .pager_next, .pagination_wrap .pager_prev, .pagination_wrap .pager_last, .pagination_wrap .pager_first, .pagination_viewmore > a:hover, .reviews_block .reviews_item:nth-child(3n+1) .reviews_stars_hover, .reviews_block .reviews_item:nth-child(3n+2) .reviews_stars_hover, .reviews_block .reviews_item:nth-child(3n+3) .reviews_stars_hover, .post_item:nth-child .post_rating .reviews_stars_bg, .post_item:nth-child .post_rating .reviews_stars_hover, .post_item:nth-child .post_rating .reviews_value, .post_author .post_author_title a, .post_author .post_author_title a:hover, .post_item_404 .page_title, .post_item_404 .page_subtitle, .top_panel_style_light .post_item_404 .page_title, .top_panel_style_light .post_item_404 .page_subtitle, .top_panel_style_light .post_item_404 a, .layout_single-courses .post_info .post_info_date, .layout_single-courses .post_info .post_info_posted:before, .widget_area ul li:hover:before, .widget_area ul li a:hover, .widget_area a:hover, .widget_area button:hover:before, .widget_area .widget_text a, .widget_area .post_info a, .widget_area .widget_text a:hover, .widget_area .post_info a:hover, .scroll_to_top:hover, .widget_registration li a:hover, .woocommerce .woocommerce-message:before, .woocommerce-page .woocommerce-message:before, .woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce ul.products li.product .price,.woocommerce-page ul.products li.product .price, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover, .woocommerce .quantity input[type="button"]:hover, .woocommerce #content input[type="button"]:hover, .woocommerce-page .quantity input[type="button"]:hover, .woocommerce-page #content .quantity input[type="button"]:hover, .woocommerce ul.cart_list li > .amount, .woocommerce ul.product_list_widget li > .amount, .woocommerce-page ul.cart_list li > .amount, .woocommerce-page ul.product_list_widget li > .amount, .woocommerce ul.cart_list li span .amount, .woocommerce ul.product_list_widget li span .amount, .woocommerce-page ul.cart_list li span .amount, .woocommerce-page ul.product_list_widget li span .amount, .woocommerce ul.cart_list li ins .amount, .woocommerce ul.product_list_widget li ins .amount, .woocommerce-page ul.cart_list li ins .amount, .woocommerce-page ul.product_list_widget li ins .amount, .woocommerce.widget_shopping_cart .total .amount, .woocommerce .widget_shopping_cart .total .amount, .woocommerce-page.widget_shopping_cart .total .amount, .woocommerce-page .widget_shopping_cart .total .amount, .woocommerce a:hover h3, .woocommerce-page a:hover h3,
.woocommerce .cart-collaterals .order-total strong, .woocommerce-page .cart-collaterals .order-total strong, .woocommerce .checkout #order_review .order-total .amount, .woocommerce-page .checkout #order_review .order-total .amount, .woocommerce .star-rating, .woocommerce-page .star-rating, .woocommerce .star-rating:before, .woocommerce-page .star-rating:before, .widget_area .widgetWrap ul > li .star-rating span, .woocommerce #review_form #respond .stars a, .woocommerce-page #review_form #respond .stars a, .woocommerce ul.products li.product h3 a:hover, .woocommerce-page ul.products li.product h3 a:hover, .woocommerce ul.products li.product h3 a:hover, .woocommerce-page ul.products li.product h3 a:hover, .woocommerce ul.products li.product .add_to_cart_button:before, .woocommerce-page ul.products li.product .add_to_cart_button:before, .woocommerce ul.products li.product .add_to_cart_button:hover, .woocommerce-page ul.products li.product .add_to_cart_button:hover, .woocommerce ul.products li.product .price span, .woocommerce-page ul.products li.product .price span, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, #tribe-events .tribe-events-button:hover, .tribe-events-button:hover, .tribe-events-list .tribe-events-event-cost span, .sc_accordion.sc_accordion_style_1 .sc_accordion_item .sc_accordion_title:hover, .sc_accordion.sc_accordion_style_2 .sc_accordion_item .sc_accordion_title.ui-state-active, .sc_accordion.sc_accordion_style_2 .sc_accordion_item .sc_accordion_title.ui-state-active .sc_accordion_icon, .sc_audio .sc_audio_author_name, .sc_audio .sc_audio_title, .sc_button.sc_button_style_border, input[type="submit"]:hover, input[type="button"]:hover, button:hover, .sc_button.sc_button_style_filled:hover, .sc_countdown.sc_countdown_style_1 .sc_countdown_digits, .sc_countdown.sc_countdown_style_1 .sc_countdown_separator, .sc_countdown.sc_countdown_style_1 .sc_countdown_label, .sc_quote.sc_quote_style_2 p a, .sc_icon_bg_link, .sc_icon_bg_menu, .sc_icon_bg_user, .sc_icon.sc_icon_bg_link:hover, a:hover .sc_icon.sc_icon_bg_link, .sc_icon_shape_round.sc_icon_bg_link:hover,
.sc_icon_shape_square.sc_icon_bg_link:hover, a:hover .sc_icon_shape_round.sc_icon_bg_link, a:hover .sc_icon_shape_square.sc_icon_bg_link, .sc_icon_shape_round.sc_icon_bg_menu:hover, .sc_icon_shape_square.sc_icon_bg_menu:hover, a:hover .sc_icon_shape_round.sc_icon_bg_menu, a:hover .sc_icon_shape_square.sc_icon_bg_menu, .sc_icon_shape_round.sc_icon_bg_user:hover, .sc_icon_shape_square.sc_icon_bg_user:hover, a:hover .sc_icon_shape_round.sc_icon_bg_user, a:hover .sc_icon_shape_square.sc_icon_bg_user, .sc_scroll_controls_wrap a:hover, .sc_slider_controls_wrap a:hover, .sc_team_item .sc_team_item_info .sc_team_item_title a:hover, .sc_testimonials .sc_slider_controls_wrap a:hover, .sc_title_icon, .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title.ui-state-active, .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title:hover, .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title.ui-state-active, .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title.ui-state-active .sc_toggles_icon, .barber .esg-navigationbutton:hover:before, .barber .esg-navigationbutton:hover, .home.page .text_price
				{
					color: '.esc_attr($clr).';
				}
				.search_wrap .search_form_wrap .search_submit:hover, .days_container_all .booking_day_slots, #booking_slot_form > div > a:hover, .sc_button:hover, .top_panel_style_light .content .search_wrap.search_style_regular .search_form_wrap .search_submit:hover, .top_panel_style_light .content .search_wrap.search_style_regular .search_icon:hover, .scroll_down, .minimal-light .esg-navigationbutton:hover, .minimal-light .esg-navigationbutton.selected
                {
				   color: '.esc_attr($clr).' !important;
				}
                .search_wrap .search_form_wrap .search_submit, .navToggle .icon,.navToggle .icon:before, .navToggle .icon:after, .navToggle + span, .sc_accordion.sc_accordion_style_2 .sc_accordion_item.sc_active .sc_accordion_title .sc_accordion_icon:before, .post_item.post_item_classic .post_descr .sc_button.sc_button_style_filled, .post_item.post_item_masonry .post_descr .sc_button.sc_button_style_filled, input[type="submit"], input[type="button"], button, .content .booking_clear_custom, #booking_submit_button, .pagination_viewmore > a, .sc_button, .tribe-events-nav-next a, .sc_scroll_bar .swiper-scrollbar-drag:before, .sc_slider_swiper .sc_slider_pagination_wrap span, .user_color_bgc,.menu_main_wrap .menu_main_nav > li:hover,
.menu_main_wrap .menu_main_nav > li.sfHover,
.menu_main_wrap .menu_main_nav > li#blob,
.menu_main_wrap .menu_main_nav > li.current-menu-item,
.menu_main_wrap .menu_main_nav > li.current-menu-parent,
.menu_main_wrap .menu_main_nav > li.current-menu-ancestor,
.menu_main_wrap .menu_main_nav > li ul, .menu_user_wrap .menu_user_nav > li.menu_user_register,
.menu_user_wrap .menu_user_nav > li.menu_user_login,
.menu_user_wrap .menu_user_nav > li.menu_user_logout, .menu_main_wrap .menu_main_nav_area .menu_main_responsive, .top_panel_style_light .page_top_wrap, .top_panel_style_dark.article_style_boxed .page_top_wrap .breadcrumbs a.breadcrumbs_item:hover, .pagination_single > .pager_numbers,
.pagination_single a,
.pagination_slider .pager_cur,
.pagination_pages > a,
.pagination_pages > span, .pagination_viewmore > a, .viewmore_loader,
.mfp-preloader span,
.sc_video_frame.sc_video_active:before, .post_featured .post_nav_item:before, .post_featured .post_nav_item .post_nav_info, .reviews_block .reviews_summary .reviews_item, .reviews_block .reviews_max_level_100:nth-child(3n+1) .reviews_stars_hover,
.reviews_block .reviews_item:nth-child(3n+1) .reviews_slider, .reviews_block .reviews_max_level_100:nth-child(3n+2) .reviews_stars_hover,
.reviews_block .reviews_item:nth-child(3n+2) .reviews_slider, .reviews_block .reviews_max_level_100:nth-child(3n+3) .reviews_stars_hover,
.reviews_block .reviews_item:nth-child(3n+3) .reviews_slider, .widget_area .widget_calendar td a:hover, .widget_area .widget_product_tag_cloud a:hover,
.widget_area .widget_tag_cloud a:hover, .scroll_to_top, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce span.new, .woocommerce-page span.new,
.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce ul.products li.product:nth-child(5n+2) span.new, .woocommerce-page ul.products li.product:nth-child(5n+2) span.new,
.woocommerce ul.products li.product:nth-child(5n+2) span.onsale, .woocommerce-page ul.products li.product:nth-child(5n+2) span.onsale,
.woocommerce ul.products li.product:nth-child(5n+4) span.new, .woocommerce-page ul.products li.product:nth-child(5n+4) span.new,
.woocommerce ul.products li.product:nth-child(5n+4) span.onsale, .woocommerce-page ul.products li.product:nth-child(5n+4) span.onsale, .woocommerce ul.products li.product:nth-child(5n+3) span.new, .woocommerce-page ul.products li.product:nth-child(5n+3) span.new,
.woocommerce ul.products li.product:nth-child(5n+3) span.onsale, .woocommerce-page ul.products li.product:nth-child(5n+3) span.onsale,
.woocommerce ul.products li.product:nth-child(5n+5) span.new, .woocommerce-page ul.products li.product:nth-child(5n+5) span.new,
.woocommerce ul.products li.product:nth-child(5n+5) span.onsale, .woocommerce-page ul.products li.product:nth-child(5n+5) span.onsale, .woocommerce ul.products li.product .add_to_cart_button, .woocommerce-page ul.products li.product .add_to_cart_button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce table.cart thead th, .woocommerce #content table.cart thead th, .woocommerce-page table.cart thead th, .woocommerce-page #content table.cart thead th, .tribe-events-calendar thead th, #tribe-events .tribe-events-button, .tribe-events-button, input[type="submit"],
input[type="button"],
button, .woocommerce ul.products li.product .add_to_cart_button, .woocommerce-page ul.products li.product .add_to_cart_button, .sc_button.sc_button_style_filled, .tribe-events-nav-next a, .sc_button.sc_button_style_filled.sc_button_bg_menu, .sc_button.sc_button_style_filled.sc_button_bg_user, .sc_blogger.layout_date .sc_blogger_item .sc_blogger_date, .sc_dropcaps.sc_dropcaps_style_1 .sc_dropcaps_item, .sc_highlight_style_1, .sc_icon_shape_round.sc_icon_bg_link,
.sc_icon_shape_square.sc_icon_bg_link, .sc_icon_shape_round.sc_icon_bg_menu,
.sc_icon_shape_square.sc_icon_bg_menu, .sc_icon_shape_round.sc_icon_bg_user,
.sc_icon_shape_square.sc_icon_bg_user, .sc_popup:before, .sc_price_block.sc_price_block_style_1, .sc_price_block.sc_price_block_style_2, .sc_price_block.sc_price_block_style_3, .sc_scroll_controls_wrap a, .sc_skills_bar .sc_skills_item .sc_skills_count,
.sc_skills_counter .sc_skills_item.sc_skills_style_3 .sc_skills_count,
.sc_skills_counter .sc_skills_item.sc_skills_style_4 .sc_skills_count,
.sc_skills_counter .sc_skills_item.sc_skills_style_4 .sc_skills_info, .sc_slider_controls_wrap a, .sc_testimonials .sc_slider_controls_wrap a, .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title:hover .sc_toggles_icon_opened, .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title .sc_toggles_icon, .eg-jackson-element-3:after, blockquote.sc_quote.sc_quote_style_1
				{
					background-color: '.esc_attr($clr).';
				}
				.post_content.ih-item.circle.effect1.colored .info, .post_content.ih-item.circle.effect2.colored .info, .post_content.ih-item.circle.effect5.colored .info .info-back, .post_content.ih-item.circle.effect19.colored .info, .post_content.ih-item.square.effect4.colored .mask1, .post_content.ih-item.square.effect4.colored .mask2, .post_content.ih-item.square.effect6.colored .info, .post_content.ih-item.square.effect7.colored .info, .post_content.ih-item.square.effect12.colored .info, .post_content.ih-item.square.effect13.colored .info, .post_content.ih-item.square.effect_dir.colored .info, .post_content.ih-item.square.effect_shift.colored .info
				 {
					background-color: rgba('.(int)$rgb['r'].','.(int)$rgb['g'].','.(int)$rgb['b'].', 0.8);
				}
                .booking_day_container.booking_day_white:hover a, .custom_options #co_toggle, .booking_month_container_all .booking_month_nav_container .booking_mont_nav_button_container a, .booking_ok_button,
#booking_submit_button, .minimal-light .esg-navigationbutton
				{
					background-color: '.esc_attr($clr).' !important;
				}
				.sc_accordion .sc_accordion_item.sc_active .sc_accordion_title .sc_accordion_icon:before, .user_color_bg, .post_content.ih-item.circle.effect1.colored .info,
.post_content.ih-item.circle.effect2.colored .info, .post_content.ih-item.circle.effect3.colored .info, .post_content.ih-item.circle.effect4.colored .info, .post_content.ih-item.circle.effect5.colored .info .info-back, .post_content.ih-item.circle.effect6.colored .info, .post_content.ih-item.circle.effect7.colored .info, .post_content.ih-item.circle.effect8.colored .info, .post_content.ih-item.circle.effect9.colored .info, .post_content.ih-item.circle.effect10.colored .info, .post_content.ih-item.circle.effect11.colored .info, .post_content.ih-item.circle.effect12.colored .info, .post_content.ih-item.circle.effect13.colored .info, .post_content.ih-item.circle.effect14.colored .info, .post_content.ih-item.circle.effect15.colored .info, .post_content.ih-item.circle.effect16.colored .info, .post_content.ih-item.circle.effect18.colored .info .info-back, .post_content.ih-item.circle.effect19.colored .info, .post_content.ih-item.circle.effect20.colored .info .info-back, .post_content.ih-item.square.effect1.colored .info, .post_content.ih-item.square.effect2.colored .info, .post_content.ih-item.square.effect3.colored .info, .post_content.ih-item.square.effect4.colored .mask1, .post_content.ih-item.square.effect4.colored .mask2, .post_content.ih-item.square.effect5.colored .info, .post_content.ih-item.square.effect6.colored .info, .post_content.ih-item.square.effect7.colored .info, .post_content.ih-item.square.effect8.colored .info, .post_content.ih-item.square.effect9.colored .info .info-back, .post_content.ih-item.square.effect10.colored .info, .post_content.ih-item.square.effect11.colored .info, .post_content.ih-item.square.effect12.colored .info, .post_content.ih-item.square.effect13.colored .info, .post_content.ih-item.square.effect14.colored .info, .post_content.ih-item.square.effect15.colored .info, .post_content.ih-item.circle.effect20.colored .info .info-back, .post_content.ih-item.square.effect_book.colored .info, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, #bbpress-forums div.bbp-topic-content a, #buddypress button, #buddypress a.button, #buddypress input[type="submit"], #buddypress input[type="button"], #buddypress input[type="reset"], #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, a.bp-title-button, #buddypress div.item-list-tabs ul li.selected a, #bbpress-forums div.bbp-topic-content a:hover,
#buddypress button:hover, #buddypress a.button:hover, #buddypress input[type="submit"]:hover, #buddypress input[type="button"]:hover, #buddypress input[type="reset"]:hover, #buddypress ul.button-nav li a:hover, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover, a.bp-title-button:hover, #buddypress div.item-list-tabs ul li.selected a:hover, .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title.ui-state-active .sc_toggles_icon_opened, .esg-entry-cover .esg-cc.eec .eg-adams-element-3:after
				{
					background: '.esc_attr($clr).';
				}
				.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current, .mejs-controls .mejs-time-rail .mejs-time-current, .barber .esg-navigationbutton {
				    background: '.esc_attr($clr).'!important;
				}
                .hover_image:hover, .openMenuFix .menuTranform, .sc_image a:hover, .sc_slider_swiper .sc_slider_pagination_wrap .swiper-active-switch, .sc_slider_swiper .sc_slider_pagination_wrap span:hover, .user_color_border, pre.code, #toc .toc_item.current, #toc .toc_item:hover, .search_wrap.search_style_regular.search_opened, .top_panel_style_light .content .search_wrap.search_style_regular.search_opened, .pagination > a, .post_format_aside.post_item_single .post_content p, .post_format_aside .post_descr, .isotope_wrap .isotope_item:nth-child(3n+2) .post_featured,
.isotope_wrap .isotope_item_courses_1:nth-child(3n+2) .post_featured, .pagination_single > .pager_numbers,
.pagination_single a,
.pagination_slider .pager_cur,
.pagination_pages > a,
.pagination_pages > span, .comments_list_wrap > ul > li > ul.children,
.comments_list_wrap > ul > li > ul > li, .comments_list_wrap > ul > li > ul.children > li > ul.children,
.comments_list_wrap > ul > li > ul > li > ul > li, .comments_list_wrap > ul > li > ul.children > li > ul.children > li > ul.children > li > ul.children,
.comments_list_wrap > ul > li > ul > li > ul > li > ul > li > ul > li, .comments_list_wrap > ul > li > ul.children > li > ul.children > li > ul.children > li > ul.children > li > ul.children,
.comments_list_wrap > ul > li > ul > li > ul > li > ul > li > ul > li > ul > li, .comments_list_wrap .comment_info > span.comment_author,
.comments_list_wrap .comment_info > .comment_date > .comment_date_value, .widget_area .widget_calendar .today .day_wrap, .widget_area .widget_product_tag_cloud a,
.widget_area .widget_tag_cloud a, .woocommerce ul.products li.product:nth-child(5n+3) .post_featured, .woocommerce-page ul.products li.product:nth-child(5n+3) .post_featured,
.woocommerce ul.products li.product:nth-child(5n+5) .post_featured, .woocommerce-page ul.products li.product:nth-child(5n+5) .post_featured, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span.current, .sc_button.sc_button_style_border, .sc_button.sc_button_style_border.sc_button_bg_menu, .sc_button.sc_button_style_border.sc_button_bg_user, .sc_blogger.layout_date .sc_blogger_item .sc_blogger_date, .sc_quote.sc_quote_style_2, .sc_icon_shape_round.sc_icon_bg_link,
.sc_icon_shape_square.sc_icon_bg_link, .sc_icon_shape_round.sc_icon_bg_menu,
.sc_icon_shape_square.sc_icon_bg_menu, .sc_icon_shape_round.sc_icon_bg_user,
.sc_icon_shape_square.sc_icon_bg_user, .sc_skills_bar .sc_skills_item .sc_skills_count, .sc_team [class*="column-"]:nth-child(3n+2) .sc_team_item .sc_team_item_info, .sc_team [class*="column-"]:nth-child(3n+3) .sc_team_item .sc_team_item_info, .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title.ui-state-active, .sc_toggles.sc_toggles_style_1 .sc_toggles_item .sc_toggles_title:hover, .sc_toggles.sc_toggles_style_2 .sc_toggles_item .sc_toggles_title .sc_toggles_icon, .esg-entry-cover:hover
				{
					border-color: '.esc_attr($clr).';
				}
                .sc_button.sc_button_style_border:hover
				{
					border-color: '.esc_attr($clr).' !important;
				}
				.sc_contact_form_info .sc_contact_form_item .input__field + .input_border_field, .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li.ui-state-active a, .sc_tabs.sc_tabs_style_1 .sc_tabs_titles li.ui-state-active a, .post_content.ih-item.circle.effect1 .spinner, .comments_list_wrap .comment-respond, .comments_list_wrap > ul, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active {
				   border-bottom-color: '.esc_attr($clr).';
				}
				.post_content.ih-item.circle.effect1 .spinner {
				    border-right-color: '.esc_attr($clr).';
				}
				.post_item_related .post_content_wrap, .comments_list_wrap ul.children,
.comments_list_wrap ul > li + li, .woocommerce .woocommerce-message, .woocommerce-page .woocommerce-message,
.woocommerce a.button.alt:active, .woocommerce button.button.alt:active, .woocommerce input.button.alt:active, .woocommerce #respond input#submit.alt:active, .woocommerce #content input.button.alt:active, .woocommerce-page a.button.alt:active, .woocommerce-page button.button.alt:active, .woocommerce-page input.button.alt:active, .woocommerce-page #respond input#submit.alt:active, .woocommerce-page #content input.button.alt:active,
.woocommerce a.button:active, .woocommerce button.button:active, .woocommerce input.button:active, .woocommerce #respond input#submit:active, .woocommerce #content input.button:active, .woocommerce-page a.button:active, .woocommerce-page button.button:active, .woocommerce-page input.button:active, .woocommerce-page #respond input#submit:active, .woocommerce-page #content input.button:active
                {
				    border-top-color: '.esc_attr($clr).';
				}
				.sc_button.dark_button.sc_button_style_filled:hover, .post_item_classic .post_counters_item.post_counters_comments:hover,
.post_item_masonry .post_counters_item.post_counters_comments:hover
                {
				    box-shadows-color: '.esc_attr($clr).';
				}
			';
		}

		return $custom_style;	
	}
}

// Add skin responsive styles
if (!function_exists('themerex_action_add_responsive_default')) {
	//add_action('themerex_action_add_responsive', 'themerex_action_add_responsive_default');
	function themerex_action_add_responsive_default() {
		if (file_exists(themerex_get_file_dir('skins/default/skin-responsive.css'))) 
			themerex_enqueue_style( 'theme-skin-responsive-style', themerex_get_file_url('skins/default/skin-responsive.css'), array(), null );
	}
}

// Add skin responsive inline styles
if (!function_exists('themerex_filter_add_responsive_inline_default')) {
	//add_filter('themerex_filter_add_responsive_inline', 'themerex_filter_add_responsive_inline_default');
	function themerex_filter_add_responsive_inline_default($custom_style) {
		return $custom_style;	
	}
}


//------------------------------------------------------------------------------
// Skin's scripts
//------------------------------------------------------------------------------

// Add skin scripts
if (!function_exists('themerex_action_add_scripts_default')) {
	//add_action('themerex_action_add_scripts', 'themerex_action_add_scripts_default');
	function themerex_action_add_scripts_default() {
		if (file_exists(themerex_get_file_dir('skins/default/skin.js')))
			themerex_enqueue_script( 'theme-skin-script', themerex_get_file_url('skins/default/skin.js'), array(), null );
		if (themerex_get_theme_option('show_theme_customizer') == 'yes' && file_exists(themerex_get_file_dir('skins/default/skin.customizer.js')))
			themerex_enqueue_script( 'theme-skin-customizer-script', themerex_get_file_url('skins/default/skin.customizer.js'), array(), null );
	}
}

// Add skin scripts inline
if (!function_exists('themerex_action_add_scripts_inline_default')) {
	//add_action('themerex_action_add_scripts_inline', 'themerex_action_add_scripts_inline_default');
	function themerex_action_add_scripts_inline_default() {
		echo '<script type="text/javascript">'
			. 'jQuery(document).ready(function() {'
			. "if (THEMEREX_GLOBALS['theme_font']=='') THEMEREX_GLOBALS['theme_font'] = 'Roboto';"
			. "THEMEREX_GLOBALS['link_color'] = '" . apply_filters('themerex_filter_get_link_color', themerex_get_custom_option('link_color')) . "';"
			. "THEMEREX_GLOBALS['menu_color'] = '" . apply_filters('themerex_filter_get_menu_color', themerex_get_custom_option('menu_color')) . "';"
			. "THEMEREX_GLOBALS['user_color'] = '" . apply_filters('themerex_filter_get_user_color', themerex_get_custom_option('user_color')) . "';"
			. "});"
			. "</script>";
	}
}


//------------------------------------------------------------------------------
// Get skin's colors
//------------------------------------------------------------------------------


// Return main theme bg color
if (!function_exists('themerex_filter_get_theme_bgcolor_default')) {
	//add_filter('themerex_filter_get_theme_bgcolor', 'themerex_filter_get_theme_bgcolor_default', 10, 1);
	function themerex_filter_get_theme_bgcolor_default($clr) {
		return '#ffffff';
	}
}



// Return link color (if not set in the theme options)
if (!function_exists('themerex_filter_get_link_color_default')) {
	//add_filter('themerex_filter_get_link_color', 'themerex_filter_get_link_color_default', 10, 1);
	function themerex_filter_get_link_color_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('link_color') : $clr;
	}
}

// Return links dark color (if not set in the theme options)
if (!function_exists('themerex_filter_get_link_dark_default')) {
	//add_filter('themerex_filter_get_link_dark', 'themerex_filter_get_link_dark_default', 10, 1);
	function themerex_filter_get_link_dark_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('link_dark') : $clr;
	}
}

// Return links light color (if not set in the theme options)
if (!function_exists('themerex_filter_get_link_light_default')) {
	//add_filter('themerex_filter_get_link_light', 'themerex_filter_get_link_light_default', 10, 1);
	function themerex_filter_get_link_light_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('link_light') : $clr;
	}
}



// Return main menu color (if not set in the theme options)
if (!function_exists('themerex_filter_get_menu_color_default')) {
	//add_filter('themerex_filter_get_menu_color', 'themerex_filter_get_menu_color_default', 10, 1);
	function themerex_filter_get_menu_color_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('menu_color') : $clr;
	}
}

// Return main menu dark color (if not set in the theme options)
if (!function_exists('themerex_filter_get_menu_dark_default')) {
	//add_filter('themerex_filter_get_menu_dark', 'themerex_filter_get_menu_dark_default', 10, 1);
	function themerex_filter_get_menu_dark_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('menu_dark') : $clr;
	}
}

// Return main menu light color (if not set in the theme options)
if (!function_exists('themerex_filter_get_menu_light_default')) {
	//add_filter('themerex_filter_get_menu_light', 'themerex_filter_get_menu_light_default', 10, 1);
	function themerex_filter_get_menu_light_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('menu_light') : $clr;
	}
}



// Return user menu color (if not set in the theme options)
if (!function_exists('themerex_filter_get_user_color_default')) {
	//add_filter('themerex_filter_get_user_color', 'themerex_filter_get_user_color_default', 10, 1);
	function themerex_filter_get_user_color_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('user_color') : $clr;
	}
}

// Return user menu dark color (if not set in the theme options)
if (!function_exists('themerex_filter_get_user_dark_default')) {
	//add_filter('themerex_filter_get_user_dark', 'themerex_filter_get_user_dark_default', 10, 1);
	function themerex_filter_get_user_dark_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('user_dark') : $clr;
	}
}

// Return user menu light color (if not set in the theme options)
if (!function_exists('themerex_filter_get_user_light_default')) {
	//add_filter('themerex_filter_get_user_light', 'themerex_filter_get_user_light_default', 10, 1);
	function themerex_filter_get_user_light_default($clr) {
		return empty($clr) ? themerex_get_scheme_color('user_light') : $clr;
	}
}
?>