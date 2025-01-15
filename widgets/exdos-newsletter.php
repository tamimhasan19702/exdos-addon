<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_newsletter
 *
 * Elementor widget for exdos_newsletter.
 *
 * @since 1.0.0
 */
class Exdos_Newsletter extends Widget_Base
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
		return 'Exdos Newsletter';
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
		return __('Exdos Newsletter', 'exdos-addons');
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
		return 'eicon-ehp-forms';
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

	protected function exdos_newsletter()
	{
		$this->start_controls_section(
			'Newsletter Section',
			[
				'label' => __('Newsletter ', 'exdos-addons'),
			]
		);

$this->add_control(
    'newsletter_text',
    [
        'label' => __('Newsletter Text', 'exdos-addons'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Newletter', 'exdos-addons'),
        'label_block' => true,
        
    ]
);

$this->add_control(
    'newsletter_shortcode',
    [
        'label' => __('Newsletter Shortcode', 'exdos-addons'),
        'type' => Controls_Manager::TEXT,
        'default' => '',
        'description' => __('Add your newsletter shortcode here', 'exdos-addons'),
        'label_block' => true,
    ]
);

$this->add_control(
    'newsletter_back_text',
    [
        'label' => __('Newsletter Back Text', 'exdos-addons'),
        'type' => Controls_Manager::TEXT,
        'default' => __('Newletter', 'exdos-addons'),
        'label_block' => true,
        
    ]
);

		

		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_newsletter();
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

		// render all images
		?>

<section class="tp-newsletter-area tp-newsletter-margin p-relative z-index-11 wow tpFadeInUp" data-wow-duration="1.5s"
    data-wow-delay="0.2s">
    <div class="container">
        <div class="tp-newsletter-bg tp-blue-bg">
            <div class="row">
                <?php if (!empty($settings['newsletter_text'])): ?>
                <div class="col-xl-4">
                    <div class="tp-section-title-wrapper">
                        <h2 class="tp-section-title tp-section-title-white m-0">
                            <?php echo $settings['newsletter_text']; ?>
                        </h2>
                    </div>
                </div>
                <?php endif;?>
                <div class="col-xl-<?php echo (!empty($settings['newsletter_text'])) ? '8' : '12'; ?>">
                    <div class="tp-newsletter-box p-relative">
                        <?php if (!empty($settings['newsletter_back_text'])):?>
                        <h2 class="tp-newsletter-back d-none d-md-block">
                            <?php echo $settings['newsletter_back_text'];?>
                        </h2>
                        <?php endif;?>
                        <?php if (!empty($settings['newsletter_shortcode'])):?>
                        <form action="#">
                            <?php echo do_shortcode($settings['newsletter_shortcode']);?>
                        </form>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 

	}
}