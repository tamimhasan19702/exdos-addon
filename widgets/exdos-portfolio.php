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
			'portfolio_section',
			[
				'label' => __('Exdos Portfolio', 'exdos-addons'),
			]
		);

		$this->add_control(
			'include_categories',
			[
				'label' => esc_html__('Include Categories', 'exdos-addons'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->get_portfolio_categories(), // Fetch categories dynamically
				'default' => [],
			]
		);

		
		
	
		$this->add_control(
			'order',
			[
				'label' => esc_html__('Order', 'exdos-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => __('Ascending', 'exdos-addons'),
					'DESC' => __('Descending', 'exdos-addons'),
					'RAND' => __('Random', 'exdos-addons'),
				],
			]
		);
	
		// Add control for order by
		$this->add_control(
			'orderby',
			[
				'label' => esc_html__('Order By', 'exdos-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => __('Date', 'exdos-addons'),
					'title' => __('Title', 'exdos-addons'),
					'modified' => __('Modified Date', 'exdos-addons'),
					'rand' => __('Random', 'exdos-addons'),
				],
			]
		);
	
	
	
		$this->end_controls_section();
	}

	private function get_portfolio_categories() {
		$categories = get_terms([
			'taxonomy' => 'exdos-portfolio-category',
			'hide_empty' => false,
			'orderby' => 'name',
			'order' => 'ASC',
			'posts_per_page' => -1,
		]);
		$options = [];
		foreach ($categories as $category) {
			$options[$category->term_id] = $category->name;
		}
		return $options;
	}

	
	// Function to get posts


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

    $args = array(
        'post_type' => 'exdos-portfolio',
        'post_status' => 'publish',
        'posts_per_page' => 6, // Limit the number of posts
        'orderby' => $settings['orderby'],
        'order' => $settings['order'],
    );

    // Check if categories are included
    if (!empty($settings['include_categories'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'exdos-portfolio-category',
            'field'    => 'term_id',
            'terms'    => $settings['include_categories'],
            'operator' => 'IN',
        );
    }

    $query = new \WP_Query($args);
    ?>

<div class="tp-portfolio-filter text-center mb-50">
    <button class="active" data-filter="*">Show All</button>
    <?php foreach($settings['include_categories'] as $category): ?>
    <button data-filter="<?php echo esc_attr('.' . get_term($category)->slug); ?>">
        <?php echo esc_html(get_term($category)->name); ?>
    </button>
    <?php endforeach; ?>
</div>

<div class="row grid">
    <?php if($query->have_posts()): while($query->have_posts()): $query->the_post();
            $categories = get_the_terms(get_the_ID(), 'exdos-portfolio-category');
            ?>
    <div
        class="col-xl-4 col-lg-4 col-md-6 grid-item <?php echo esc_attr(implode(' ', wp_list_pluck($categories, 'slug'))); ?>">
        <div class="tp-portfolio-item mb-40">
            <div class="tp-portfolio-thumb br-15 position-relative mb-20">
                <?php if (has_post_thumbnail()): ?>
                <img style="border-radius: 20px !important;" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>">
                <?php endif; ?>
                <div class="tp-portfolio-arrow">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="tp-portfolio-text text-center">
                <h3 class="tp-portfolio-title tp-fs-30"><a
                        href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
                <p class="m-0 pl-60">
                    <span class="mr-5"></span>
                    <?php
                        $category_names = array_map(function ($category) {
                            return $category->name;
                        }, $categories);
                        echo esc_html(implode(', ', $category_names));
                    ?>
                </p>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>
</div>

<?php
    wp_reset_postdata(); // Reset post data after custom query
}
}