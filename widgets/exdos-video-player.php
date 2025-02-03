<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_video_player
 *
 * Elementor widget for exdos_video_player.
 *
 * @since 1.0.0
 */
class Exdos_Video_Player extends Widget_Base
{
	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'Exdos Video Player';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return __('Exdos Video Player', 'exdos-addons');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-video-camera exdos-addon';
	}

	public function get_style_depends(): array {
		return [ 'exdos-addons-css' ];
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['exdos-addons'];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends()
	{
		return ['exdos-addons'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls()
	{
		$this->register_tab_controls();
		// $this->register_style_tab_controls();
	}

	protected function exdos_video_player()
	{
		$this->start_controls_section(
			'video_section',
			[
				'label' => __('Video Player', 'exdos-addons'),
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' => esc_html__('Video Link', 'exdos-addons'),
				'type' => Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
					'placeholder' => 'https://your-video-link.com',
				],
				'label_block' => true,
			]
		);



		$this->add_control(
			'text',
			[
				'label' => __('Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Intro Video', 'exdos-addons'),
			]
		);

		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_video_player();
	}

	// register style tab controls
	protected function register_style_tab_controls()
	{
		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'exdos-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __('Text Transform', 'exdos-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __('None', 'exdos-addons'),
					'uppercase' => __('UPPERCASE', 'exdos-addons'),
					'lowercase' => __('lowercase', 'exdos-addons'),
					'capitalize' => __('Capitalize', 'exdos-addons'),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute('button_arg', 'class', 'popup-video');
		$this->add_link_attributes('button_arg', $settings['video_link']);

		?>



<?php if (!empty($settings['video_link']['url'])): ?>
<div class="tp-about-video-info d-flex align-items-center mb-27">
    <div class="tp-about-video-icon mr-15">
        <a <?php echo $this->get_render_attribute_string('button_arg'); ?>><img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shape/play.svg') ?>" alt="" /></a>
    </div>
    <?php if (!empty($settings['text'])): ?>
    <h4 class="m-0"><?php echo exdos_addon_kses($settings['text']) ?></h4>
    <?php endif; ?>
</div>

<?php endif; ?>


<?php
	}
}