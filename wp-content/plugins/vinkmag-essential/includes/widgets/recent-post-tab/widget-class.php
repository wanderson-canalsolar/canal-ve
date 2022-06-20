<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * recent post widget
 */
class Vinkmag_Recent_Post_Tab extends WP_Widget {

	function __construct() {

		$widget_ops = array( 'classname' => 'vinkmag_latest_post_tab_widget', 'description' => esc_html__('A widget that display latest posts from all categories', 'vinkmag-essntial') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'vinkmag_latest_post_tab_widget' );
		parent::__construct( 'vinkmag_latest_post_tab_widget', esc_html__('Vinkmag Latest Posts Tab', 'vinkmag-essntial'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings.
		$title 			= apply_filters('widget_title', (!isset($instance['title']) ? '' : $instance['title']) );
		$categories 	= (!isset($instance['categories'])? '': $instance['categories']);
		$post_count 	= (!isset($instance['post_count'])? '': $instance['post_count']);
		$post_sortby 	= (!isset($instance['post_sortby'])? '': $instance['post_sortby']);
		$tab_left_title 	= (!isset($instance['tab_left_title'])? '': $instance['tab_left_title']);
		$tab_right_title 	= (!isset($instance['tab_right_title'])? '': $instance['tab_right_title']);
		$post_title_crop 	= (!isset($instance['post_title_crop'])? '': $instance['post_title_crop']);


		$arg_recent = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'posts_per_page' => $post_count,
        ];
        $arg_fav = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'posts_per_page' => $post_count,
        ];

        switch($post_sortby){
         	case 'popularposts':
				$arg_fav['meta_key'] = 'vinkmag_post_views_count';
				$arg_fav['orderby'] = 'meta_value_num';
			break;
			case 'mostdiscussed':
				$arg_fav['orderby'] = 'comment_count';
			break;
			default:
             	$arg_fav['orderby'] = 'date';
        	break;
     	}

		 $query_recent = new \WP_Query( $arg_recent );
		 echo $before_widget;
		 ?>
		 
	  
		 <div class="post-list-item widgets grid-no-shadow">
			 <ul class="nav nav-tabs" role="tablist">
				 <li role="presentation">
					 <a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
						 <i class="xsicon xsicon-clock"></i>
						 <?php echo esc_html($tab_left_title); ?>
					 </a>
				 </li>
				 <li role="presentation">
					 <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
						 <i class="xsicon xsicon-heart"></i>
						 <?php echo esc_html($tab_right_title); ?>
					 </a>
				 </li>
			 </ul>
			 <div class="tab-content">
				 <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
				 <?php if ( $query_recent->have_posts() ) : ?>
					 <?php $i = 0; while ($query_recent->have_posts()) : $query_recent->the_post(); $i++; ?>
						 <div class="post-content media">    
							 <img 
								 class="d-flex sidebar-img" 
								 src="<?php echo esc_url(vinkmag_post_thumbnail(get_the_ID())); ?>" 
								 alt="<?php echo esc_attr(vinkmag_alt(get_the_ID())); ?>">
							 <div class="media-body">
								 <span class="post-tag">
								 <?php $cat = get_the_category(); ?>
								 <a 
									 href="<?php echo get_category_link($cat[0]->term_id); ?>"
									 style="<?php echo esc_attr(vinkmag_cat_style($cat[0]->term_id, 'color_only')); ?>"
									 >
									 <?php echo get_cat_name($cat[0]->term_id); ?>
								 </a>
								 </span>
								 <h4 class="post-title">
								 <a href="<?php the_permalink(); ?>"><?php esc_html_e(vinkmag_limited_title(get_the_title(), $post_title_crop)); ?></a>
								 </h4>
							 </div>
						 </div>
					 <?php endwhile; 
					 wp_reset_query(); ?>
				 <?php endif; ?>
				 </div>
				 <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
					 <?php
					 $query_fav = new \WP_Query( $arg_fav );
					 if ( $query_fav->have_posts() ) : ?>
						 <?php $i = 0; while ($query_fav->have_posts()) : $query_fav->the_post(); $i++; ?>
							 <div class="post-content media">    
								 <img 
									 class="d-flex sidebar-img" 
									 src="<?php echo esc_url(vinkmag_post_thumbnail(get_the_ID())); ?>" 
									 alt="<?php echo esc_attr(vinkmag_alt(get_the_ID())); ?>">
								 <div class="media-body">
									 <span class="post-tag">
									 <?php $cat = get_the_category(); ?>
									 <a 
										 href="<?php echo get_category_link($cat[0]->term_id); ?>"
										 style="<?php echo esc_attr(vinkmag_cat_style($cat[0]->term_id, 'color_only')); ?>"
										 >
										 <?php echo get_cat_name($cat[0]->term_id); ?>
									 </a>
									 </span>
									 <h4 class="post-title">
										 <a href="<?php the_permalink(); ?>"><?php esc_html_e(vinkmag_limited_title(get_the_title(), $post_title_crop)); ?></a>
									 </h4>
								 </div>
							 </div>
						 <?php endwhile; 
						 wp_reset_query(); ?>
					 <?php endif; ?>
				 </div>
			 </div>
		 </div>
	<?php
echo $after_widget;
}

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] 			= strip_tags( $new_instance['title'] );
	$instance['categories'] 	= $new_instance['categories'];
	$instance['post_count'] 	= strip_tags( $new_instance['post_count'] );
	$instance['post_sortby'] 	= strip_tags( $new_instance['post_sortby'] );
	$instance['tab_right_title'] 	= strip_tags( $new_instance['tab_right_title'] );
	$instance['tab_left_title'] 	= strip_tags( $new_instance['tab_left_title'] );
	$instance['post_title_crop'] 	= strip_tags( $new_instance['post_title_crop'] );

	return $instance;
}


function form( $instance ) {

	$defaults = array(
		'title' => esc_html__('Blog Posts', 'vinkmag-essntial'),
		'post_count' => 4,
		'post_sortby' => 'mostdiscussed',
		'tab_right_title' => 'RECENT',
		'tab_left_title' => 'FAVORITES',
		'post_title_crop' => '50',
		'categories' => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title -->
		<p>
			<label for="<?php print $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'vinkmag-essntial'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'title' ); ?>" name="<?php print $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"  />
		</p>

		<!-- Tab Left Title -->
		<p>
			<label for="<?php print $this->get_field_id( 'tab_left_title' ); ?>"><?php esc_html_e('Tab Left Title:', 'vinkmag-essntial'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'tab_left_title' ); ?>" name="<?php print $this->get_field_name( 'tab_left_title' ); ?>" value="<?php echo esc_attr( $instance['tab_left_title'] ); ?>"  />
		</p>

		<!-- Tab Left Title -->
		<p>
			<label for="<?php print $this->get_field_id( 'tab_right_title' ); ?>"><?php esc_html_e('Tab Right Title:', 'vinkmag-essntial'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'tab_right_title' ); ?>" name="<?php print $this->get_field_name( 'tab_right_title' ); ?>" value="<?php echo esc_attr( $instance['tab_right_title'] ); ?>"  />
		</p>

		<!-- Post Title Crop-->
		<p>
			<label for="<?php print $this->get_field_id( 'post_title_crop' ); ?>"><?php esc_html_e('Post Title Crop:', 'vinkmag-essntial'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'post_title_crop' ); ?>" name="<?php print $this->get_field_name( 'post_title_crop' ); ?>" value="<?php echo esc_attr( $instance['post_title_crop'] ); ?>"  />
		</p>

		<!-- Ordered By -->
        <p>
            <label for="<?php echo $this->get_field_id( 'post_sortby' ); ?>"><?php esc_html_e('Sort By', 'vinkmag-essntial'); ?></label>
            <?php
            $options = array(
                'latestpost' 	=> 'Latest Posts',
                'viewcount' 	=> 'View count',
                'mostdiscussed' 	=> 'Most discussed',
            );
            if(isset($instance['post_sortby'])) $orderby = $instance['post_sortby'];
            ?>
            <select class="widefat" id="<?php echo $this->get_field_id( 'post_sortby' ); ?>" name="<?php echo $this->get_field_name( 'post_sortby' ); ?>">
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
