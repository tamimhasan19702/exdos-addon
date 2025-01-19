<?php
namespace ElementorExdosAddon\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly

/**
 * Elementor exdos_team
 *
 * Elementor widget for exdos_team.
 *
 * @since 1.0.0
 */
class Exdos_Team extends Widget_Base
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
		return 'Exdos Team';
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
		return __('Exdos Team', 'exdos-addons');
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
		return 'eicon-person';
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

	protected function exdos_team()
	{
		$this->start_controls_section(
			'section_team',
			[
				'label' => __('Exdos Team', 'exdos-addons'),
			]
		);
	
		$this->add_control(
			'team_heading',
			[
				'label' => __('Team Heading', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Dedicated team member behind your story', 'exdos-addons'),
				'placeholder' => __('Team', 'exdos-addons'),
			]
		);
	
	
	
		// Create a repeater for team members
		$repeater = new \Elementor\Repeater();
	
		$repeater->add_control(
			'team_image',
			[
				'label' => __('Team Image', 'exdos-addons'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
	
		$repeater->add_control(
			'team_name',
			[
				'label' => __('Name', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('John Doe', 'exdos-addons'),
				'label_block' => true,
			]
		);
	
		$repeater->add_control(
			'team_designation',
			[
				'label' => __('Designation', 'exdos-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Developer', 'exdos-addons'),
				'label_block' => true,
			]
		);
	

		$repeater->add_control(
			'team_page_link',
			[
				'label' => __('Link to Team Member Page', 'exdos-addons'),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('https://example.com/team-member-page', 'exdos-addons'),
			]
		);

		$repeater->add_control(
			'facebook_icon',
			[
				'label' => __('Facebook Icon', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
			]
		);
		$repeater->add_control(
			'facebook_link',
			[
				'label' => __('Facebook Link', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://example.com', 'exdos-addons'),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'instagram_icon',
			[
				'label' => __('Instagram Icon', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-instagram',
					'library' => 'fa-brands',
				],
			]
		);
		$repeater->add_control(
			'instagram_link',
			[
				'label' => __('Instagram Link', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://example.com', 'exdos-addons'),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'twitter_icon',
			[
				'label' => __('Twitter Icon', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-brands',
				],
			]
		);
		$repeater->add_control(
			'twitter_link',
			[
				'label' => __('Twitter Link', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://example.com', 'exdos-addons'),
				'dynamic' => [
					'active' => true,
				],
			]
		);
	
		// Add the team members repeater
		$this->add_control(
			'team_members',
			[
				'label' => __('Team Members', 'exdos-addons'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ team_name }}}',
			]
		);
	
		$this->end_controls_section();
	}

	// register tab controls
	protected function register_tab_controls()
	{
		$this->exdos_team();
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

<div class="tp-team-area ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <?php if (!empty($settings['team_heading'])): ?>
                <div class="tp-section-title-wrapper mb-50">
                    <h2 class="tp-section-title mb-20">
                        <?php echo exdos_addon_kses($settings['team_heading']) ?>
                    </h2>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div
                    class="tp-team-nav text-end d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="tp-swiper-team-button-prev tp-swiper-team-button tp-rot-180">
                        <i class="flaticon-right-arrow"></i>
                    </div>
                    <span></span>
                    <div class="tp-swiper-team-button-next tp-swiper-team-button">
                        <i class="flaticon-right-arrow"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="swiper tp-team-active">
            <div class="swiper-wrapper">

                <?php foreach ($settings['team_members'] as $member) :?>

                <div class="swiper-slide">
                    <div class="tpteam">
                        <?php if (!empty($member['team_image'])):?>
                        <div class="tpteam__thumb br-15">
                            <a href="<?php echo $member['team_page_link']['url']; ?>"><img
                                    src="<?php echo $member['team_image']['url']; ?>"
                                    alt="<?php echo $member['team_name']; ?>"
                                    style="border-radius: 15px !important;" /></a>
                        </div>
                        <?php endif; ?>
                        <div class="tpteam__info mt-30 ml-80">
                            <?php if (!empty($member['team_name'])):?>
                            <h3 class="tpteam__title">
                                <a
                                    href="<?php echo $member['team_page_link']['url']; ?>"><?php echo $member['team_name']; ?></a>
                            </h3>
                            <?php endif; ?>
                            <?php if (!empty($member['team_designation'])):?>
                            <span class="ml-45"><i></i><?php echo $member['team_designation']; ?></span>
                            <?php endif; ?>
                            <div class="tpteam__social mt-20">

                                <?php if (!empty($member['facebook_icon'])):?>
                                <a href="<?php echo $member['facebook_link']['url']; ?>"><i
                                        class="<?php echo $member['facebook_icon']['value']; ?>"></i></a>
                                <?php endif; ?>

                                <?php if (!empty($member['instagram_icon'])):?>
                                <a href="<?php echo $member['instagram_link']['url']; ?>"><i
                                        class="<?php echo $member['instagram_icon']['value']; ?>"></i></a>
                                <?php endif; ?>

                                <?php if (!empty($member['twitter_icon'])):?>
                                <a href="<?php echo $member['twitter_link']['url']; ?>"><i
                                        class="<?php echo $member['twitter_icon']['value']; ?>"></i></a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>


<?php
	}
}