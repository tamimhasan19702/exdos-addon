<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor Exdos_header
 *
 * Elementor widget for Exdos_header.
 *
 * @since 1.0.0
 */
class Exdos_header extends Widget_Base
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
		return 'exdos-header';
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
		return __('Exdos_header', 'exdos-addons');
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
		return 'eicon-heading';
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
		$this->start_controls_section(
			'exdos_header_section',
			[
				'label' => __('Exdos Header', 'exdos-addons'),
			]
		);

		$this->add_control(
			'exdos_header_title',
			[
				'label' => __('Exdos Header Title', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Let us building the bridge between <br />
                    brand and customer', 'exdos-addons'),

			]
		);

		$this->add_control(
			'exdos_sub_text',
			[
				'label' => __('Exdos Sub Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => __('Let us building the bridge between <br />
                    brand and customer', 'exdos-addons'),

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


		?>


		<div class="tp-section-title-wrapper ">
			<?php if (!empty($settings['exdos_header_title'])): ?>
				<h2 class="tp-section-title mb-20">
					<?php echo exdos_addon_kses($settings['exdos_header_title']) ?>
				</h2>
			<?php endif; ?>
			<?php if (!empty($settings['exdos_sub_text'])): ?>
				<p>
					<?php echo exdos_addon_kses($settings['exdos_sub_text']) ?>
				</p>
			<?php endif; ?>
		</div>




		<?php


	}


}