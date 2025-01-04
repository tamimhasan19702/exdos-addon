<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor Exdos_hero
 *
 * Elementor widget for Exdos_hero.
 *
 * @since 1.0.0
 */
class Exdos_hero extends Widget_Base
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
		return 'exdos-addon-hero';
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
		return __('Exdos Hero', 'exdos-addons');
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
		return 'eicon-banner';
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
	 * 
	 */

	protected function _register_controls()
	{
		$this->register_tab_controls();
		// $this->register_style_tab_controls();
	}


	protected function hero_title()
	{
		$this->start_controls_section(
			'Hero_section_content',
			[
				'label' => __('Hero Content', 'exdos-addons'),
			]
		);

		$this->add_control(
			'Main_title',
			[
				'label' => __('Main Title', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('best digital <br> <span>creative agency</span>', 'exdos-addons'),

			]
		);

		$this->add_control(
			'Main_Title_2',
			[
				'label' => __('Main Title 2', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('<i>brilliant ideas <br> for your brand</i> from canada', 'exdos-addons'),
			]
		);

		$this->add_control(
			'side_text',
			[
				'label' => __('Side Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('2k+ company trust us', 'exdos-addons'),

			]
		);

		$this->end_controls_section();
	}

	protected function hero_button()
	{
		$this->start_controls_section(
			'button_section',
			[
				'label' => __('Button', 'exdos-addons'),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __('Button Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Discover More', 'exdos-addons'),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__('Button Link', 'exdos-addons'),
				'type' => Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
					'placeholder' => 'https://your-link.com',
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function hero_social()
	{
		$this->start_controls_section(
			'social_section',
			[
				'label' => __('Hero Social', 'exdos-addons'),
			]
		);

		$this->add_control(
			'social_header',
			[
				'label' => __('Social Header', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Follow Us - ', 'exdos-addons'),

			]
		);



		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'social_name',
			[
				'label' => __('Social Name', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'social_link',
			[
				'label' => __('Link', 'exdos-addons'),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				]
				// 'custom_attributes' => '',
			]
		);



		$this->add_control(
			'social_list',
			[
				'label' => __('Social List', 'exdos-addons'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_name' => esc_html('FB', 'exdos-addons'),
						'social_link' => '',
					],
					[
						'social_name' => esc_html('TW', 'exdos-addons'),
						'social_link' => '',
					],
					[
						'social_name' => esc_html('IG', 'exdos-addons'),
						'social_link' => '',
					],

					[
						'social_name' => esc_html('LI', 'exdos-addons'),
						'social_link' => '',
					],

				],
				'title_field' => '{{{ social_name }}}',
			]
		);


		$this->end_controls_section();
	}

	protected function hero_bg_image()
	{
		error_log('hero_bg_image method called'); // Log to PHP error log

		$this->start_controls_section(
			'hero_bg_image_section',
			[
				'label' => __('Hero Background Image', 'exdos-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'hero_bg_image',
			[
				'label' => __('Hero Background Image', 'exdos-addons'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();
	}



	// register tab controls
	protected function register_tab_controls()
	{
		$this->hero_title();
		$this->hero_button();
		$this->hero_social();
		$this->hero_bg_image();


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
		$this->add_render_attribute('button_arg', 'class', 'tp-btn-sec tp-btn-sec-lg');
		$this->add_link_attributes('button_arg', $settings['button_link']);

		?>


		<section class="tp-hero-area tp-hero-space tp-black-bg pt-265 pb-170 p-relative "
			style="background-image: <?php echo (!empty($settings['hero_bg_image']['url'])) ? 'url(' . esc_url($settings['hero_bg_image']['url']) . ')' : ''; ?>;">
			<div class="tp-hero-shape">
				<img class="tp-hero-shape-1 p-absolute"
					src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/shape/hero-1-ball-shape.png" alt="">
				<img class="tp-hero-shape-2 p-absolute d-none d-xl-block"
					src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/shape/hero-1-large-shape.png" alt="">
				<img class="tp-hero-shape-3 p-absolute"
					src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/shape/hero-sm-circle.png" alt="">
				<img class="tp-hero-shape-4 p-absolute d-none d-md-block"
					src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/shape/hero-1-shape-2.png" alt="">
				<img class="tp-hero-shape-5 p-absolute d-none d-md-block"
					src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/img/shape/hero-1-circle-3.png" alt="">
			</div>
			<div class="hero-info d-none d-xxl-flex">
				<div class="hero-social">
					<?php if (!empty($settings['social_header'])): ?>
						<span><?php echo exdos_addon_kses($settings['social_header']) ?></span>
					<?php endif; ?>

					<?php
					if (!empty($settings['social_list'])): // Ensure you're checking the correct key
						$social_links = []; // Initialize an array to hold the links
			
						foreach ($settings['social_list'] as $item): // Loop through each item
							// Get the social link and name
							$social_link = !empty($item['social_link']['url']) ? esc_url($item['social_link']['url']) : '#'; // Default to '#' if no link
							$social_name = !empty($item['social_name']) ? esc_html($item['social_name']) : ''; // Default to empty if no name
			
							// Initialize the anchor tag with the href attribute
							$anchor_tag = '<a href="' . $social_link . '"';

							// Check if the link should open in a new tab
							if (!empty($item['social_link']['is_external'])) {
								$anchor_tag .= ' target="_blank"'; // Add target="_blank" for external links
							}

							// Check if the link should have nofollow attribute
							if (!empty($item['social_link']['nofollow'])) {
								$anchor_tag .= ' rel="nofollow"'; // Add rel="nofollow" for nofollow links
							}

							// Close the anchor tag
							$anchor_tag .= '>' . $social_name . '</a>';

							// Add the anchor tag to the array
							$social_links[] = $anchor_tag;

						endforeach;

						// Output the links joined by a separator, without a trailing slash
						echo implode(' / ', $social_links);
					endif;
					?>


				</div>
				<?php if (!empty($settings['side_text'])): ?>
					<div class="hero-info-text">
						<span><?php echo exdos_addon_kses($settings['side_text']) ?></span>
					</div>
				<?php endif; ?>
			</div>
			<div class="container">
				<div class="tp-hero p-relative z-index-11">
					<div class="mb-30">
						<?php if (!empty($settings['Main_title'])): ?>
							<h1 class="tp-hero-title wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
								<?php echo exdos_addon_kses($settings['Main_title']) ?>
							</h1>
						<?php endif; ?>
						<?php if (!empty($settings['Main_Title_2'])): ?>
							<h1 class="tp-hero-title wow img-custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.4s">
								<?php echo exdos_addon_kses($settings['Main_Title_2']) ?>
							</h1>
						<?php endif; ?>
					</div>
					<?php if (!empty($settings['button_text'])): ?>
						<div class="tp-hero-btn wow img-custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.9s">
							<a <?php $this->print_render_attribute_string('button_arg'); ?>>
								<span class="tp-btn-wrap">
									<span class="tp-btn-y-1"><?php echo exdos_addon_kses($settings['button_text']) ?></span>
									<span class="tp-btn-y-2"><?php echo exdos_addon_kses($settings['button_text']) ?></span>
								</span>
								<i></i>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php

	}


}