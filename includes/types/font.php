<?php
/**
 * Base font icon handler
 *
 * @package Icon_Picker
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 */

require_once dirname( __FILE__ ) . '/base.php';

/**
 * Generic handler for icon fonts
 *
 */
abstract class Icon_Picker_Type_Font extends Icon_Picker_Type {

	/**
	 * JS Controller
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $controller = 'Font';

	/**
	 * Template ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $template_id = 'font';


	/**
	 * Get icon groups
	 *
	 * @since  0.1.0
	 * @return array
	 */
	abstract public function get_groups();


	/**
	 * Get icon names
	 *
	 * @since  0.1.0
	 * @return array
	 */
	abstract public function get_items();


	/**
	 * Register assets
	 *
	 * @since  0.1.0
	 * @action icon_picker_loaded
	 * @return void
	 */
	public function register_assets() {}


	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		add_action( 'icon_picker_loaded', array( $this, 'register_assets' ) );
		parent::__construct();
	}


	public function get_templates() {
		$templates = array(
			'item' => sprintf(
				'<div class="attachment-preview js--select-attachment">
					<div class="thumbnail">
						<span class="_icon"><i class="{{ data.id }}"></i></span>
						<div class="filename"><div>{{ data.name }}</div></div>
					</div>
				</div>
				<a class="check" href="#" title="%s"><div class="media-modal-icon"></div></a>',
				esc_attr__( 'Deselect', 'icon-picker' )
			),
		);

		/**
		 * Filter media templates
		 *
		 * @since 0.1.0
		 * @param array $templates Media templates.
		 */
		$templates = apply_filters( 'icon_picker_font_media_templates', $templates );

		return $templates;
	}
}
