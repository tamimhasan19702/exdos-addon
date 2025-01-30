<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_blog
 *
 * Elementor widget for exdos_blog.
 *
 * @since 1.0.0
 */
class Exdos_Blog extends Widget_Base
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
		return 'Exdos Blog';
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
		return __('Exdos Blog', 'exdos-addons');
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
		return 'eicon-blog';
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

	protected function exdos_blog(){

$this->start_controls_section(
			'section_exdos_blog',
			[
				'label' => __('Exdos Blog', 'exdos-addons'),
			]
		);

		$this->add_control(
			'layout_type',
			[
				'label' => __('Layout Type', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					1 => __('Layout 1', 'exdos-addons'),
					2 => __('Layout 2', 'exdos-addons'),
				],
				'default' => 1,
			]
		);
		


		

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'brand_image',
			[
				'label' => __('Brand Image', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'brand_images',
			[
				'label' => __('Brand Images', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ brand_image.url }}}',
			]
		);

	

		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_blog();
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
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="tpblog mb-40">
            <div class="tpblog__thumb br-20 mb-35 wow img-custom-anim-top" data-wow-duration="1.5s"
                data-wow-delay="0.1s">
                <a href="blog-details.html"><img src="assets/img/blog/blog-post-01.jpg" alt="" /></a>
            </div>
            <div class="tpblog__content pl-30">
                <div class="tpblog__meta mb-15">
                    <span><a href="#"><i class="fal fa-calendar-alt"></i> 20 Sep. 2023</a></span>
                    <cite></cite>
                    <span><a href="#"><i class="fal fa-certificate"></i> Creative</a></span>
                </div>
                <h3 class="tpblog__title mb-25">
                    <a href="blog-details.html">Potent be interdum ipsum pellentes code primis laoreet
                        diam per established</a>
                </h3>
                <div class="tpblog__btn">
                    <a class="tp-text-btn" href="blog-details.html">Read More <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="tpblog mb-40">
            <div class="tpblog__thumb br-20 mb-35 wow img-custom-anim-top" data-wow-duration="1.5s"
                data-wow-delay="0.2s">
                <a href="blog-details.html"><img src="assets/img/blog/blog-post-02.jpg" alt="" /></a>
            </div>
            <div class="tpblog__content pl-30">
                <div class="tpblog__meta mb-15">
                    <span><a href="#"><i class="fal fa-calendar-alt"></i> 20 Sep. 2023</a></span>
                    <cite></cite>
                    <span><a href="#"><i class="fal fa-certificate"></i> Creative</a></span>
                </div>
                <h3 class="tpblog__title mb-25">
                    <a href="blog-details.html">Leos placerat sagittis vitae quisque scelerisque sociosqu
                        bulputate natoque</a>
                </h3>
                <div class="tpblog__btn">
                    <a class="tp-text-btn" href="blog-details.html">Read More <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="tpblog mb-40">
            <div class="tpblog__thumb br-20 mb-35 wow img-custom-anim-top" data-wow-duration="1.5s"
                data-wow-delay="0.4s">
                <a href="blog-details.html"><img src="assets/img/blog/blog-post-03.jpg" alt="" /></a>
            </div>
            <div class="tpblog__content pl-30">
                <div class="tpblog__meta mb-15">
                    <span><a href="#"><i class="fal fa-calendar-alt"></i> 20 Sep. 2023</a></span>
                    <cite></cite>
                    <span><a href="#"><i class="fal fa-certificate"></i> Creative</a></span>
                </div>
                <h3 class="tpblog__title mb-25">
                    <a href="blog-details.html">Metus fames dictum curae tempus over parturient tempor
                        cubilia venenatis.</a>
                </h3>
                <div class="tpblog__btn">
                    <a class="tp-text-btn" href="blog-details.html">Read More <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	}
}