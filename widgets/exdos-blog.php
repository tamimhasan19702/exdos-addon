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

	protected function exdos_blog() {
		$this->start_controls_section(
			'section_exdos_blog',
			[
				'label' => __('Exdos Blog', 'exdos-addons'),
			]
		);

		// Add control for number of posts
		$this->add_control(
			'number_of_posts',
			[
				'label' => esc_html__('Number of Posts', 'exdos-addons'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 3,
			]
		);
	
		$this->add_control(
			'include_categories',
			[
				'label' => esc_html__('Include Categories', 'exdos-addons'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->get_blog_categories(), // Fetch categories dynamically
				'default' => [],
			]
		);
	
		// Add SELECT2 control for excluding categories
		$this->add_control(
			'exclude_categories',
			[
				'label' => esc_html__('Exclude Categories', 'exdos-addons'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->get_blog_categories(), // Fetch categories dynamically
				'default' => [],
			]
		);
	
		
		$this->add_control(
			'include_posts',
			[
				'label' => esc_html__('Include Posts', 'exdos-addons'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->get_blog_posts(), // Fetch posts dynamically
				'default' => [],
			]
		);
	
		// Add SELECT2 control for excluding posts
		$this->add_control(
			'exclude_posts',
			[
				'label' => esc_html__('Exclude Posts', 'exdos-addons'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->get_blog_posts(), // Fetch posts dynamically
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
	
	// Function to get blog categories
	private function get_blog_categories() {
		$categories = get_categories();
		$options = [];
		foreach ($categories as $category) {
			$options[$category->term_id] = $category->name;
		}
		return $options;
	}


	private function get_blog_posts() {
		$posts = get_posts(['numberposts' => -1]); // Get all posts
		$options = [];
		foreach ($posts as $post) {
			$options[$post->ID] = $post->post_title;
		}
		return $options;
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

    // Prepare the query arguments
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => !empty($settings['number_of_posts']) ? $settings['number_of_posts'] : 3,
		'orderby' => $settings['orderby'], 
        'order' => $settings['order'], 
    );

    // Check if categories are included
    if (!empty($settings['include_categories'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $settings['include_categories'],
            'operator' => 'IN',
        );
    }

    // Check if categories are excluded
    if (!empty($settings['exclude_categories'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $settings['exclude_categories'],
            'operator' => 'NOT IN',
        );
    }

	// Check if posts are included
    if (!empty($settings['include_posts'])) {
        $args['post__in'] = $settings['include_posts'];
    }

    // Check if posts are excluded
    if (!empty($settings['exclude_posts'])) {
        $args['post__not_in'] = $settings['exclude_posts'];
    }

    // Ensure tax_query is set correctly
    if (isset($args['tax_query']) && count($args['tax_query']) > 1) {
        $args['tax_query']['relation'] = 'AND';
    }

    $recent_posts = new \WP_Query($args);
    ?>

<div class="row">
    <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
    <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="tpblog mb-40">
            <div class="tpblog__thumb br-20 mb-35 wow img-custom-anim-top" data-wow-duration="1.5s"
                data-wow-delay="0.1s">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', array(
                                'alt' => get_the_title(),
                                'class' => 'img-fluid',
                            )); ?>
                </a>
            </div>
            <div class="tpblog__content pl-30">
                <div class="tpblog__meta mb-15">
                    <span><a
                            href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('j')); ?>"><i
                                class="fal fa-calendar-alt"></i> <?php echo get_the_date(); ?></a></span>
                    <cite></cite>
                    <span><a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>"><i
                                class="fal fa-certificate"></i> <?php echo get_the_category()[0]->name; ?></a></span>
                </div>
                <h3 class="tpblog__title mb-25">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="tpblog__btn">
                    <a class="tp-text-btn" href="<?php the_permalink(); ?>">Read More <i
                            class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>

<?php
}
}