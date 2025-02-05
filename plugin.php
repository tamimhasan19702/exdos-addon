<?php

namespace ElementorExdosAddon;

use ElementorExdosAddon\PageSettings\Page_Settings;
use ElementorExdosAddon\Widgets\Exdos_Hero;
use ElementorExdosAddon\Widgets\Exdos_Header;
use ElementorExdosAddon\Widgets\Exdos_Button;
use ElementorExdosAddon\Widgets\Exdos_Image;
use ElementorExdosAddon\Widgets\Exdos_Video_Player;
use ElementorExdosAddon\Widgets\Exdos_Shape;
use ElementorExdosAddon\Widgets\Exdos_Service;
use ElementorExdosAddon\Widgets\Exdos_Newsletter;
use ElementorExdosAddon\Widgets\Exdos_Project_Tab;
use ElementorExdosAddon\Widgets\Exdos_Testimonial;
use ElementorExdosAddon\Widgets\Exdos_Brand;
use ElementorExdosAddon\Widgets\Exdos_Team;
use ElementorExdosAddon\Widgets\Exdos_Timeline;
use ElementorExdosAddon\Widgets\Exdos_Counter;
use ElementorExdosAddon\Widgets\Exdos_Contact;
use ElementorExdosAddon\Widgets\Exdos_Blog;
use ElementorExdosAddon\Widgets\Exdos_Portfolio;
use ElementorExdosAddon\Widgets\Exdos_Icon_Box;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin
{

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts()
	{
		wp_register_script('elementor-hello-world', plugins_url('/assets/js/hello-world.js', __FILE__), ['jquery'], false, true);
		
	}

	/**
	 * Editor scripts
	 *
	 * Enqueue plugin javascripts integrations for Elementor editor.
	 *
	 * @since 1.2.1
	 * @access public
	 */
	public function editor_scripts()
	{
		add_filter('script_loader_tag', [$this, 'editor_scripts_as_a_module'], 10, 2);

		wp_enqueue_script(
			'elementor-hello-world-editor',
			plugins_url('/assets/js/editor/editor.js', __FILE__),
			[
				'elementor-editor',
			],
			'1.2.1',
			true
		);
	}


	public function editor_styles()
	{
		
			wp_enqueue_style('exdos-addons-css', plugins_url('/assets/css/exdos-addons.css', __FILE__),null, '1.0.0');
			wp_enqueue_style('flaticon-exdos', plugins_url('/assets/css/flaticon-exdos.css', __FILE__));
		
	}

	/**
	 * Force load editor script as a module
	 *
	 * @since 1.2.1
	 *
	 * @param string $tag
	 * @param string $handle
	 *
	 * @return string
	 */
	public function editor_scripts_as_a_module($tag, $handle)
	{
		if ('elementor-hello-world-editor' === $handle) {
			$tag = str_replace('<script', '<script type="module"', $tag);
		}

		return $tag;
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets($widgets_manager)
	{
		// Its is now safe to include Widgets files
		require_once(__DIR__ . '/widgets/exdos-hero.php');
		require_once(__DIR__ . '/widgets/exdos-header.php');
		require_once(__DIR__ . '/widgets/exdos-button.php');
		require_once(__DIR__ . '/widgets/exdos-image.php');
		require_once(__DIR__ . '/widgets/exdos-video-player.php');
		require_once(__DIR__ . '/widgets/exdos-shape.php');
		require_once(__DIR__ . '/widgets/exdos-service.php');
		require_once(__DIR__ . '/widgets/exdos-newsletter.php');
		require_once(__DIR__ . '/widgets/exdos-project-tab.php');
		require_once(__DIR__ . '/widgets/exdos-testimonial.php');
		require_once(__DIR__ . '/widgets/exdos-brand.php');
		require_once(__DIR__ . '/widgets/exdos-team.php');
		require_once(__DIR__ . '/widgets/exdos-timeline.php');
		require_once(__DIR__ . '/widgets/exdos-counter.php');
		require_once(__DIR__ . '/widgets/exdos-contact.php');
		require_once(__DIR__ . '/widgets/exdos-blog.php');
		require_once(__DIR__ . '/widgets/exdos-portfolio.php');
		require_once(__DIR__ . '/widgets/exdos-icon-box.php');



		// Register Widgets
		$widgets_manager->register(new Exdos_Hero());
		$widgets_manager->register(new Exdos_Header());
		$widgets_manager->register(new Exdos_Button());
		$widgets_manager->register(new Exdos_Image());
		$widgets_manager->register(new Exdos_Video_Player());
		$widgets_manager->register(new Exdos_Shape());
		$widgets_manager->register(new Exdos_Service());
		$widgets_manager->register(new Exdos_Newsletter());
		$widgets_manager->register(new Exdos_Project_Tab());
		$widgets_manager->register(new Exdos_Testimonial());
		$widgets_manager->register(new Exdos_Brand());
		$widgets_manager->register(new Exdos_Team());
		$widgets_manager->register(new Exdos_Timeline());
		$widgets_manager->register(new Exdos_Counter());
		$widgets_manager->register(new Exdos_Contact());
		$widgets_manager->register(new Exdos_Blog());
		$widgets_manager->register(new Exdos_Portfolio());
		$widgets_manager->register(new Exdos_Icon_Box());

	}

	/**
	 * Add page settings controls
	 *
	 * Register new settings for a document page settings.
	 *
	 * @since 1.2.1
	 * @access private
	 */
	private function add_page_settings_controls()
	{
		require_once(__DIR__ . '/page-settings/manager.php');
		new Page_Settings();
	}

	/**
	 * Register a custom Elementor category
	 *
	 * @since 1.2.1
	 * @access public
	 */
	public function register_category()
	{
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'exdos-addons',
			[
				'title' => 'Exdos Addons Category',
				'icon' => 'font',
			],
			11 // Set priority to show this category first
		);
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct()
	{

		// Register widget scripts
		add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);

		// Register widgets
		add_action('elementor/widgets/register', [$this, 'register_widgets']);

		// Register category
		add_action('elementor/elements/categories_registered', [$this, 'register_category']);

		// Register editor scripts
		add_action('elementor/editor/after_enqueue_scripts', [$this, 'editor_scripts']);

		add_action('elementor/editor/after_enqueue_styles', [$this, 'editor_styles']);

		$this->add_page_settings_controls();
	}
}

// Instantiate Plugin Class
Plugin::instance();