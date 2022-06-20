<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * recent post widget
 */
class Vinkmag_Recent_Post extends WP_Widget {

	function __construct() {

		$widget_ops = array( 'classname' => 'vinkmag_latest_news_widget', 'description' => esc_html__('A widget that display latest posts from all categories', 'vinkmag-essntial') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'vinkmag_latest_news_widget' );
		parent::__construct( 'vinkmag_latest_news_widget', esc_html__('Vinkmag Latest Posts', 'vinkmag-essntial'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings.
		$title 			= apply_filters('widget_title', (!isset($instance['title']) ? '' : $instance['title']) );
		$categories 	= (!isset($instance['categories'])? '': $instance['categories']);
		$post_count 	= (!isset($instance['post_count'])? '': $instance['post_count']);

        $layout     = 'layout1';

        if ( ! empty($instance['orderby']) ) {
            $orderby     = $instance['orderby'];
        } else {
            $orderby     = 'latestpost';
        }

        if ( $orderby == 'popularposts' ) {
			$query = array(
				'posts_per_page' => $post_count,
				'order' => 'DESC',
				'nopaging' => 0,
				'post_status' => 'publish',
				'meta_key' => 'vinkmag_post_views_count',
				'orderby' => 'meta_value_num',
				'ignore_sticky_posts' => 1,
				'cat' => $categories
			);
        } else {
			$query = array(
				'posts_per_page' => $post_count,
				'order' => 'DESC',
				'nopaging' => 0,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'cat' => $categories
			);
        }

		$args = new WP_Query($query);
		if ($args->have_posts()) :

			print $before_widget;

		if ( $title )
			print $before_title . $title . $after_title;
		?>
		<div class="recent-posts-widget">
			<ul class="list-unstyled clearfix">
				<?php  while ($args->have_posts()) : $args->the_post(); ?>
					<li class="media">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<div class="posts-thumb d-flex mr-3">
								<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php esc_attr( the_title() ); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							</div>
							<div class="post-info media-body">
								<h4 class="entry-title mt-0 mb-1"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php esc_attr( the_title() ); ?>"><?php the_title(); ?></a></h4>
								<p class="post-meta"><time class="post-date" datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></p>
							</div>
						<?php } else{?>
							<div class="post-info media-body">
								<h4 class="entry-title mt-0 mb-1"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php esc_attr( the_title() ); ?>"><?php the_title(); ?></a></h4>
								<p class="post-meta"><time class="post-date" datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo get_the_date(); ?></time></p>
							</div>
						<?php } ?>
						<div class="clearfix"></div>
					</li>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>
	<?php endif; ?>
	<?php
	print $after_widget;
}

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] 			= strip_tags( $new_instance['title'] );
	$instance['categories'] 	= $new_instance['categories'];
	$instance['orderby'] 		= strip_tags( $new_instance['orderby'] );
	$instance['post_count'] 	= strip_tags( $new_instance['post_count'] );

	return $instance;
}


function form( $instance ) {

	$defaults = array(
		'title' => esc_html__('Blog Posts', 'vinkmag-essntial'),
		'post_count' => 4,
		'orderby' => 'latestpost',
		'categories' => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title -->
		<p>
			<label for="<?php print $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'vinkmag-essntial'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'title' ); ?>" name="<?php print $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"  />
		</p>

		<!-- Ordered By -->
        <p>
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php esc_html_e('Order By', 'vinkmag-essntial'); ?></label>
            <?php
            $options = array(
                'latestpost' 	=> 'latest Posts',
                'popularposts' 	=> 'Popular Posts',
            );
            if(isset($instance['orderby'])) $orderby = $instance['orderby'];
            ?>
            <select class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
                <?php
                $op = '<option value="%s"%s>%s</option>';

                foreach ($options as $key=>$value ) {

                    if ($orderby === $key) {
                        printf($op, $key, ' selected="selected"', $value);
                    } else {
                        printf($op, $key, '', $value);
                    }
                }
                ?>
            </select>
        </p>

		<!-- Post Category -->
		<p>
			<label for="<?php print $this->get_field_id('categories'); ?>"><?php esc_html_e('Filter by Categories', 'vinkmag-essntial'); ?></label>
			<select id="<?php print $this->get_field_id('categories'); ?>" name="<?php print $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php print $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php print $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Count of Latest Posts -->
		<p>
			<label for="<?php print $this->get_field_id( 'post_count' ); ?>"><?php esc_html_e('Count of Latest Post', 'vinkmag-essntial'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'post_count' ); ?>" name="<?php print $this->get_field_name( 'post_count' ); ?>" value="<?php echo esc_attr( $instance['post_count'] ); ?>" size="3" />
		</p>


		<?php
	}

}
