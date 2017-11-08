<?php
/**
 * Add function to widgets_init that will load our widget.
 */
add_action( 'widgets_init', 'themerex_widget_registration_load' );

/**
 * Register our widget.
 */
function themerex_widget_registration_load() {
	register_widget( 'themerex_widget_registration' );
}

/**
 * flickr Widget class.
 */
class themerex_widget_registration extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_registration', 'description' => __('Show login form', 'themerex') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'themerex_widget_registration' );

		/* Create the widget. */
		parent::__construct( 'themerex_widget_registration', __('ThemeREX - Show login form', 'themerex'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', isset($instance['title']) ? $instance['title'] : '' );


		/* Before widget (defined by themes). */			
		echo ($before_widget);

		/* Display the widget title if one was input (before and after defined by themes). */
		if ($title) echo ($before_title) . ($title) . ($after_title);
		
		
		?>

        <div class="widget_inner">
            <?php
                if ( !is_user_logged_in() ) {
                    // Load core messages
                    themerex_enqueue_messages();
                    // Load Popup engine
                 themerex_enqueue_popup();
                    ?>
                    <li class="menu_user_register"><a href="#popup_registration" class="popup_link popup_register_link"><?php _e('Register', 'themerex'); ?></a>
                        <?php
                            require_once( themerex_get_file_dir('templates/parts/register.php') );
                        ?>
                    </li>
                    <li class="menu_user_login"><a href="#popup_login" class="popup_link popup_login_link"><?php _e('Login', 'themerex'); ?></a>
                        <?php
                            require_once( themerex_get_file_dir('templates/parts/login.php') );
                        ?>
                    </li>
                <?php
                } else {
                    $current_user = wp_get_current_user();
                    ?>
                    <li class="menu_user_controls">
                        <a href="#"><?php
                            $user_avatar = '';
                            if ($current_user->user_email) $user_avatar = get_avatar($current_user->user_email, 16*min(2, max(1, themerex_get_theme_option("retina_ready"))));
                            if ($user_avatar) {
                                ?><span class="user_avatar"><?php echo ($user_avatar); ?></span><?php
                            }?><span class="user_name"><?php echo ($current_user->display_name); ?></span></a>
                        <ul>
                            <li><a href="<?php echo get_edit_user_link(); ?>" class="icon icon-cog-1"><?php _e('Settings', 'themerex'); ?></a></li>
                        </ul>
                    </li>
                    <li class="menu_user_logout"><a href="<?php echo wp_logout_url(home_url()); ?>" class="icon icon-logout"><?php _e('Logout', 'themerex'); ?></a></li>
                <?php
                }
            ?>
        </div>


		<?php
		/* After widget (defined by themes). */
		echo ($after_widget);
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'description' => __('Show login form', 'themerex') );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$title = isset($instance['title']) ? $instance['title'] : '';
		$text = isset($instance['text']) ? $instance['text'] : '';
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title:', 'themerex'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>"><?php _e('Description:', 'themerex'); ?></label>
			<textarea id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text' )); ?>" style="width:100%;"><?php echo htmlspecialchars($instance['text']); ?></textarea>
		</p>


	<?php
	}
}

if (is_admin()) {
	require_once( themerex_get_file_dir('core/core.options/core.options-custom.php') );
}
?>