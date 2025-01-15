<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_project_tab
 *
 * Elementor widget for exdos_project_tab.
 *
 * @since 1.0.0
 */
class Exdos_Project_Tab extends Widget_Base
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
		return 'Exdos Project Tab';
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
		return __('Exdos Project Tab', 'exdos-addons');
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
		return 'eicon-posts-group';
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
			'exdos_project_tab_section',
			[
				'label' => __('Exdos Project Tab', 'exdos-addons'),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'project_text',
			[
				'label' => __(' Project Text', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('List Item', 'exdos-addons'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'project_image',
			[
				'label' => __('Project Image', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'project_list',
			[
				'label' => __('Project List', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_text' => __('Project Item', 'exdos-addons'),
					],
				],
				'title_field' => '{{{ list_text }}}',
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
				'label' => esc_html__(' Button Link', 'exdos-addons'),
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

		?>



<div class="row gx-0">

    <div class="col-lg-6">
        <div class="tp-project-tab-wraper">
            <nav>
                <div class="tp-project-tab" id="nav-tab" role="tablist">

                    <?php foreach($settings['project_list'] as $key => $project):
						$active = $key == 0 ? 'active' : '';
						?>
                    <button class="nav-links <?php echo esc_attr($active) ; ?>"
                        id="nav-home-tab-<?php echo esc_attr($key) ; ?>" data-bs-toggle="tab"
                        data-bs-target="#nav-home-<?php echo esc_attr($key) ; ?>" type="button" role="tab"
                        aria-controls="nav-home-<?php echo esc_attr($key) ; ?>" aria-selected="true">
                        <?php echo esc_html($project['project_text']);?>
                    </button>
                    <?php endforeach;?>

                </div>
            </nav>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="tp-project-tab-content pl-30 text-end mt-50">
            <div class="tab-content" id="nav-tabContent">

                <?php foreach($settings['project_list'] as $key => $project):
						$active = $key == 0 ? ' show active' : '';
						?>

                <div class="tab-pane fade  <?php echo esc_attr($active) ; ?>"
                    id="nav-home-<?php echo esc_attr($key) ; ?>" role="tabpanel"
                    aria-labelledby="nav-home-tab-<?php echo esc_attr($key) ; ?>" tabindex="0">
                    <div class="tp-project-tab-thumb">
                        <a class="popup-image" href="assets/img/project/project-tab-1.jpg"><img
                                src="assets/img/project/project-tab-1.jpg" alt="" /></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<div class="tp-project-tab-btn text-center mt-80 z-index-11 p-relative">
    <a class="tp-btn-circle" href="portfolio.html">All project</a>
</div>


<?php
	}
}