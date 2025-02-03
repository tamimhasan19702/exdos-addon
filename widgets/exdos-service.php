<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_service
 *
 * Elementor widget for exdos_service.
 *
 * @since 1.0.0
 */
class Exdos_Service extends Widget_Base
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
		return 'Exdos Service';
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
		return __('Exdos Service', 'exdos-addons');
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
		return 'eicon-kit-details exdos-addon';
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

	protected function exdos_button_button()
	{
		$this->start_controls_section(
			'button_section',
			[
				'label' => __('Button', 'exdos-addons'),
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __('Icon', 'exdos-addons'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				
			]
		);

		$this->add_control(
			'header_text',
			[
				'label' => __('Header Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Header Text', 'exdos-addons'),
			]
		);

		$this->add_control(
			'subtitle_text',
			[
				'label' => __('Subtitle Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Subtitle Text', 'exdos-addons'),
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __('List', 'exdos-addons'),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_item',
						'label' => __('List Item', 'exdos-addons'),
						'type' => Controls_Manager::TEXT,
						'default' => __('List Item', 'exdos-addons'),
					],
				],
				'title_field' => '{{{ list_item }}}',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __('Button Text', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Button Text', 'exdos-addons'),
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
				],
				'label_block' => true,
			]
		);

		
		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_button_button();
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
		$this->add_render_attribute('button_arg', 'class', 'tp-btn');
		$this->add_link_attributes('button_arg', $settings['button_link']);
	
		// Check if the icon is set and render it
		$icon_html = '';
		if (!empty($settings['icon']['value'])) {
			$icon_html = '<i class="' . esc_attr($settings['icon']['value']) . '"></i>';
		}
	
		?>

<div class="tpservices br-24 mb-30 wow tpFadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
    <?php  if(!empty($settings['icon'])):?>
    <div class="tpservices__icon mb-25">
        <span><?php echo $icon_html; ?></span>
    </div>
    <?php endif;?>
    <div class="tpservices__text">
        <?php if(!empty($settings['header_text'])):?>
        <h3 class="tpservices__title mb-15">
            <a href="<?php echo esc_url($settings['button_link']['url']); ?>">
                <?php echo exdos_addon_kses($settings['header_text']); ?>
            </a>
        </h3>
        <?php endif;?>
        <?php if(!empty($settings['subtitle_text'])):?>
        <p>
            <?php echo exdos_addon_kses($settings['subtitle_text']); ?>
        </p>
        <?php endif;?>
        <?php if(!empty($settings['list'])):?>
        <div class="tpservices__list">
            <ul>
                <?php foreach ($settings['list'] as $list) : ?>
                <li><?php echo exdos_addon_kses($list['list_item']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif;?>
    </div>
    <?php if(!empty($settings['button_text'])):?>
    <div class="tpservices__btn mt-30">
        <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="tp-sv-btn br-5">
            <?php echo exdos_addon_kses($settings['button_text']); ?> <i class="far fa-arrow-right"></i>
        </a>
    </div>
    <?php endif;?>
</div>

<?php
	}
}