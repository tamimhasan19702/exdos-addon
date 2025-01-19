<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_brand
 *
 * Elementor widget for exdos_brand.
 *
 * @since 1.0.0
 */
class Exdos_Brand extends Widget_Base
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
		return 'Exdos Brand';
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
		return __('Exdos Brand', 'exdos-addons');
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
		return 'eicon-meetup';
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

	protected function exdos_brand(){

$this->start_controls_section(
			'section_exdos_brand',
			[
				'label' => __('Exdos Brand', 'exdos-addons'),
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
		$this->exdos_brand();
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

<?php if ($settings['layout_type'] == 1) :?>

<div class="tp-brand-area tp-yellow-bg pt-40 pb-40 mb-20">
    <div class="tp-brand-wrapper">
        <div class="swiper tp-brand-top-active">
            <div class="swiper-wrapper tp-slide-transtion">

                <?php foreach ($settings['brand_images'] as $image) :?>

                <div class="swiper-slide tp-brand-slide-element">
                    <div class="tp-brand-img">
                        <img src="<?php echo $image['brand_image']['url']; ?>"
                            alt="<?php echo $image['brand_image']['alt']; ?>" />
                    </div>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<?php elseif($settings['layout_type'] == 2) :?>

<div class="tp-brand-area tp-blue-bg pt-40 pb-40">
    <div class="tp-brand-wrapper">
        <div dir="rtl" class="swiper tp-brand-bottom-active">
            <div class="swiper-wrapper tp-slide-transtion">

                <?php foreach ($settings['brand_images'] as $image) :?>
                <div class="swiper-slide tp-brand-slide-element">
                    <div class="tp-brand-img">
                        <img src="<?php echo $image['brand_image']['url']; ?>"
                            alt="<?php echo $image['brand_image']['alt']; ?>" />
                    </div>
                </div>

                <?php endforeach;?>

            </div>
        </div>
    </div>
</div>


<?php endif;?>



<?php
	}
}