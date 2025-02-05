<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_icon-box
 *
 * Elementor widget for exdos_icon-box.
 *
 * @since 1.0.0
 */
class Exdos_Icon_Box extends Widget_Base
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
		return 'Exdos Icon_Box';
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
		return __('Exdos Icon Box', 'exdos-addons');
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
		return 'eicon-icon-box exdos-addon';
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

	protected function exdos_icon_box()
	{
		$this->start_controls_section(
			'iconBox_section',
			[
				'label' => __('Icon Box', 'exdos-addons'),
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
				'recommended' => [
					'fa-solid' => [
						'star',
						'check',
						'thumbs-up',
					],
				],
			]
		);

		$this->add_control(
            'subtext',
            [
                'label' => __('Subtext', 'exdos-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Default Subtext', 'exdos-addons'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'info_text',
            [
                'label' => __('Info Text', 'exdos-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Default Info Text', 'exdos-addons'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'info_link',
            [
                'label' => __('Info Link', 'exdos-addons'),
                'type' => Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'info_list',
            [
                'label' => __('Info List', 'exdos-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'info_text' => __('Info 1', 'exdos-addons'),
                    ],
                    [
                        'info_text' => __('Info 2', 'exdos-addons'),
                    ],
                ],
                'title_field' => '{{{ info_text }}}',
            ]
        );


        

        $this->add_control(
            'wow_duration',
            [
                'label' => __('Wow Duration', 'exdos-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s'],
                'range' => [
                    's' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-contact-info' => 'animation-duration: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'wow_delay',
            [
                'label' => __('Wow Delay', 'exdos-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['s'],
                'range' => [
                    's' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 0.2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-contact-info' => 'animation-delay: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_icon_box();
		$this->register_style_tab_controls();
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


		$this->add_responsive_control(
			'content_alignment',
			[
				'label' => __('Alignment', 'exdos-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'exdos-addons'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'exdos-addons'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'exdos-addons'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .tp-contact-info.mb-30.wow.tpFadeInUp' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'max_width',
			[
				'label' => __('Max Width', 'exdos-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tp-contact-info.mb-30.wow.tpFadeInUp' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'max_height',
			[
				'label' => __('Max Height', 'exdos-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tp-contact-info.mb-30.wow.tpFadeInUp' => 'max-height: {{SIZE}}{{UNIT}};',
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


<div class="<?php echo esc_attr($settings['content_alignment']); ?> tp-contact-info mb-30 wow tpFadeInUp"
    data-wow-duration="<?php echo esc_attr($settings['wow_duration']['size']); ?>"
    data-wow-delay="<?php echo esc_attr($settings['wow_delay']['size']); ?>">
    <?php if (!empty($settings['icon'])): ?>
    <div class="tp-contact-info-icon mb-10">
        <span><i class="<?php echo esc_attr($settings['icon']['value']); ?>"></i></span>
    </div>
    <?php endif;?>

    <div class="tp-contact-info-text">
        <?php if(!empty($settings['subtext'])):?>
        <span class="mb-10 d-block"><?php echo \exdos_addon_kses($settings['subtext']); ?></span>
        <?php endif;?>

        <?php foreach ($settings['info_list'] as $item) :?>
        <p>
            <a href="<?php echo esc_url($item['link']['url']); ?>">
                <?php echo \exdos_addon_kses($item['info_text']);?>
            </a>
        </p>

        <?php endforeach;?>

    </div>
</div>

<?php
	}
}