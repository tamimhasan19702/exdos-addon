<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_portfolio
 *
 * Elementor widget for exdos_portfolio.
 *
 * @since 1.0.0
 */
class Exdos_Portfolio extends Widget_Base
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
		return 'Exdos Portfolio';
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
		return __('Exdos Portfolio', 'exdos-addons');
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
		return 'eicon-posts-justified exdos-addon';
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

	protected function exdos_portfolio()
	{
		$this->start_controls_section(
			'button_section',
			[
				'label' => __('Button', 'exdos-addons'),
			]
		);


		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_portfolio();
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


<div class="tp-portfolio-filter text-center mb-50">
    <button class="active" data-filter="*">Show All</button>
    <button data-filter=".cat1">graphic</button>
    <button data-filter=".cat2">branding</button>
    <button data-filter=".cat3">website</button>
    <button data-filter=".cat4">motion graphic</button>
</div>
<div class="row grid">
    <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat2 cat3">
        <div class="tp-portfolio-item mb-40">
            <div class="tp-portfolio-thumb br-15 position-relative mb-20">
                <img src="assets/img/portfolio/portfolio-page-01.jpg" alt="">
                <div class="tp-portfolio-arrow">
                    <a href="portfolio-details.html"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="tp-portfolio-text text-center">
                <h3 class="tp-portfolio-title tp-fs-30"><a href="portfolio-details.html">Branding design</a></h3>
                <p class="m-0 pl-60"><span class="mr-5"></span> Creative design</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat1 cat3">
        <div class="tp-portfolio-item mb-40">
            <div class="tp-portfolio-thumb br-15 position-relative mb-20">
                <img src="assets/img/portfolio/portfolio-page-02.jpg" alt="">
                <div class="tp-portfolio-arrow">
                    <a href="portfolio-details.html"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="tp-portfolio-text text-center">
                <h3 class="tp-portfolio-title tp-fs-30"><a href="portfolio-details.html">Motion graphic</a></h3>
                <p class="m-0 pl-60"><span class="mr-5"></span> Creative design</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat2 cat4">
        <div class="tp-portfolio-item mb-40">
            <div class="tp-portfolio-thumb br-15 position-relative mb-20">
                <img src="assets/img/portfolio/portfolio-page-03.jpg" alt="">
                <div class="tp-portfolio-arrow">
                    <a href="portfolio-details.html"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="tp-portfolio-text text-center">
                <h3 class="tp-portfolio-title tp-fs-30"><a href="portfolio-details.html">Music compose</a></h3>
                <p class="m-0 pl-60"><span class="mr-5"></span> Creative design</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat1 cat4">
        <div class="tp-portfolio-item mb-40">
            <div class="tp-portfolio-thumb br-15 position-relative mb-20">
                <img src="assets/img/portfolio/portfolio-page-04.jpg" alt="">
                <div class="tp-portfolio-arrow">
                    <a href="portfolio-details.html"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="tp-portfolio-text text-center">
                <h3 class="tp-portfolio-title tp-fs-30"><a href="portfolio-details.html">Product design</a></h3>
                <p class="m-0 pl-60"><span class="mr-5"></span> Creative design</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat2 cat3">
        <div class="tp-portfolio-item mb-40">
            <div class="tp-portfolio-thumb br-15 position-relative mb-20">
                <img src="assets/img/portfolio/portfolio-page-05.jpg" alt="">
                <div class="tp-portfolio-arrow">
                    <a href="portfolio-details.html"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="tp-portfolio-text text-center">
                <h3 class="tp-portfolio-title tp-fs-30"><a href="portfolio-details.html">Visual Identity</a></h3>
                <p class="m-0 pl-60"><span class="mr-5"></span> Creative design</p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat1 cat4">
        <div class="tp-portfolio-item mb-40">
            <div class="tp-portfolio-thumb br-15 position-relative mb-20">
                <img src="assets/img/portfolio/portfolio-page-06.jpg" alt="">
                <div class="tp-portfolio-arrow">
                    <a href="portfolio-details.html"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="tp-portfolio-text text-center">
                <h3 class="tp-portfolio-title tp-fs-30"><a href="portfolio-details.html">Logo design</a></h3>
                <p class="m-0 pl-60"><span class="mr-5"></span> Creative design</p>
            </div>
        </div>
    </div>
</div>

<?php
	}
}