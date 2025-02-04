<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_contact
 *
 * Elementor widget for exdos_contact.
 *
 * @since 1.0.0
 */
class Exdos_Contact extends Widget_Base
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
		return 'Exdos Contact';
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
		return __('Exdos Contact', 'exdos-addons');
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
		return 'eicon-envelope exdos-addon';
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

	protected function exdos_contact()
	{
		$this->start_controls_section(
			'contact_section',
			[
				'label' => __('Contact', 'exdos-addons'),
			]
		);


		$this->add_control(
			'contact_heading',
			[
				'label' => __('Contact Heading', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Contact Us', 'exdos-addons'),
				'placeholder' => __('Contact Us', 'exdos-addons'),
			]
		);
		

		$this->add_control(
			'contact_form_title',		[
				'label' => __('Contact form title', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Get in touch with us', 'exdos-addons'),
				'placeholder' => __('Get in touch with us', 'exdos-addons'),
			]
		);


		$this->add_control(
			'contact_form_shortcode',
			[
				'label' => __('Contact Form Shortcode', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => __('Add your contact form shortcode here', 'exdos-addons'),
				'label_block' => true,
			]
		);

		

		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_contact();
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


<div class="row">
    <?php if (!empty($settings['contact_heading'])): ?>
    <div class="col-xl-5">
        <div class="tp-section-title-wrapper mb-50 wow img-custom-anim-left" data-wow-duration="1.5s"
            data-wow-delay="0.1s">
            <h2 class="tp-section-title mb-20 fs-100"><?php echo $settings['contact_heading']; ?></h2>
        </div>
    </div>
    <?php endif; ?>
    <div class="col-xl-<?php echo !empty($settings['contact_heading']) ? '7' : '12'; ?>">
        <?php if (!empty($settings['contact_heading'])): ?>
        <div class="contact-form-wrapper">
            <h3 class="tpform-title mb-25"><?php echo $settings['contact_form_title']; ?></h3>
        </div>
        <?php endif; ?>
        <?php if (!empty($settings['contact_form_shortcode'])): ?>
        <div class="contact-form-box">

            <!-- <div class="row">
                    <div class="col-md-12 mb-30">
                        <input type="text" placeholder="Full Name*" />
                    </div>
                    <div class="col-md-6 mb-30">
                        <input type="email" placeholder="Email Here*" />
                    </div>
                    <div class="col-md-6 mb-30">
                        <input type="email" placeholder="subject *" />
                    </div>
                    <div class="col-md-12 mb-45">
                        <textarea name="nessage" cols="30" rows="10" placeholder="write note*"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="tp-btn">
                            <span class="tp-btn-wrap">
                                <span class="tp-btn-y-1">Send message</span>
                                <span class="tp-btn-y-2">Send message</span>
                            </span>
                            <i></i>
                        </button>
                    </div>
                </div> -->

            <?php echo do_shortcode($settings['contact_form_shortcode']); ?>

        </div>
        <?php endif; ?>
    </div>
</div>


<?php 
}

	
}