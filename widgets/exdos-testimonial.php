<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_testimonial
 *
 * Elementor widget for exdos_testimonial.
 *
 * @since 1.0.0
 */
class Exdos_Testimonial extends Widget_Base
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
		return 'Exdos Testimonial';
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
		return __('Exdos Testimonial', 'exdos-addons');
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
		return 'eicon-blockquote';
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
	 *P
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

	protected function exdos_testimonial()
	{
		$this->start_controls_section(
			'testimonial_section',
			[
				'label' => __('Exdos Testimonial', 'exdos-addons'),
			]
		);

	$repeater = new \Elementor\Repeater();

	$repeater->add_control(
		'testimonial_text',
		[
			'label' => __('Testimonial Text', 'exdos-addons'),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => __('Per ipsum ultrices sollicitudin iaculis platea facilisi semper aliquam up
senectus cursus vivamus volutpat penatibusl Content', 'exdos-addons'),
			'label_block' => true,
		]
	);

	$repeater->add_control(
		'testimonial_name',
		[
			'label' => __('Name', 'exdos-addons'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Cynthia A. Keely', 'exdos-addons'),
			'label_block' => true,
		]
	);

	$repeater->add_control(
		'testimonial_subtext',
		[
			'label' => __('Subtext', 'exdos-addons'),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('CEO of lollipop', 'exdos-addons'),
			'label_block' => true,
		]
	);

	$this->add_control(
		'testimonial_list',
		[
			'label' => __('Testimonials', 'exdos-addons'),
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'title_field' => '{{{ testimonial_name }}}',
		]
	);


		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_testimonial();
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
		

		?>



<div class="tp-testimonial-wrapper text-center p-relative">
    <div class="tp-testimonial-shape">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/quote-testimonial.png"
            alt="<?php echo get_template_directory_uri(); ?>" />
    </div>
    <div class="tp-testimonial-shape-thumb-1 p-absolute d-none d-xl-block">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/thumb-2.jpg" alt="" />
    </div>
    <div class="tp-testimonial-shape-thumb-2 p-absolute d-none d-xl-block">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/thumb-1.jpg" alt="" />
    </div>

    <div class="swiper tp-testimonial-active">
        <div class="swiper-wrapper">
            <?php foreach ($settings['testimonial_list'] as $key => $testimonial) : ?>
            <div class="swiper-slide">
                <div class="tp-testimonial-item">
                    <?php if (!empty($testimonial['testimonial_text'])) : ?>
                    <h3 class="tp-testimonial-desc"><?php echo exdos_addon_kses($testimonial['testimonial_text']); ?>
                    </h3>
                    <?php endif; ?>

                    <div class="tp-testimonial-author mt-60">
                        <?php if (!empty($testimonial['testimonial_name'])) : ?>
                        <h4 class="tp-testimonial-name">
                            <?php echo exdos_addon_kses($testimonial['testimonial_name']); ?></h4>
                        <?php endif; ?>

                        <?php if (!empty($testimonial['testimonial_subtext'])) : ?>
                        <span class="tp-testimonial-desig">
                            <span></span> <?php echo exdos_addon_kses($testimonial['testimonial_subtext']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="tp-test-slider-arrow">
        <div class="tp-swiper-test-button-prev tp-swiper-test-button tp-rot-180">
            <i class="flaticon-right-arrow"></i>
        </div>
        <div class="tp-swiper-test-button-next tp-swiper-test-button">
            <i class="flaticon-right-arrow"></i>
        </div>
    </div>
</div>

<?php
	}
}