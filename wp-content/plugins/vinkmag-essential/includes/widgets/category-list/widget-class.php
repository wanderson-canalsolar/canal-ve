<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

/**************************************************************
                START CLASSS WpCategoriesWidget 
**************************************************************/
class Vinkmag_Category_List extends WP_Widget {


	function __construct() {
        $widget_opt = array(
            'classname'		 => 'vinkmag-category-list',
            'description'	 => esc_html__('Vinkmag category list','vinkmag-essntial')
        );

        parent::__construct( 'vinkmag-category-list', esc_html__( 'Vinkmag category list', 'vinkmag-essntial' ), $widget_opt );
    }

	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$va_category_HTML ='<div class="widgets_category">';
		if ( ! empty( $instance['vinkmag_title'] ) && !$instance['vinkmag_hide_title']) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['vinkmag_title'] ) . $args['after_title'];
		}
		
		if($instance['vinkmag_taxonomy_type']){
			$va_category_HTML .='<ul class="category-list">';
				$args_val = array( 'hide_empty=0' );				
				$excludeCat= $instance['vinkmag_selected_categories'] ? $instance['vinkmag_selected_categories'] : '';
				$vinkmag_action_on_cat= $instance['vinkmag_action_on_cat'] ? $instance['vinkmag_action_on_cat'] : '';
				if($excludeCat && $vinkmag_action_on_cat!='')
				$args_val[$vinkmag_action_on_cat] = $excludeCat;
				
				$terms = get_terms( $instance['vinkmag_taxonomy_type'], $args_val );
				
				if ( $terms ) {	

					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term );
						
						if ( is_wp_error( $term_link ) ) {
						continue;
						}
						
					$carrentActiveClass='';	
					
					if($term->taxonomy=='category' && is_category())
					{
					  $thisCat = get_category(get_query_var('cat'),false);
					  if($thisCat->term_id == $term->term_id)
						$carrentActiveClass='class="active-cat"';
				    }
					 
					if(is_tax())
					{
					    $currentTermType = get_query_var( 'taxonomy' );
					    $termId= get_queried_object()->term_id;
						 if(is_tax($currentTermType) && $termId==$term->term_id)
						  $carrentActiveClass='class="active-cat"';
					}
						
						$va_category_HTML .='<li '.$carrentActiveClass.'><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
						if (empty( $instance['vinkmag_hide_count'] )) {
						$va_category_HTML .='<span style="'.esc_attr(vinkmag_cat_style($term->term_id)).'" class="post-count">'.$term->count.'</span>';
						}
						$va_category_HTML .='</li>';
					}
				}
			$va_category_HTML .='</ul>';
			
			}	
		$va_category_HTML .='</div>';

		echo wp_kses_post($va_category_HTML);
		echo $args['after_widget'];
	}


	public function form( $instance ) {
		$vinkmag_title 					= ! empty( $instance['vinkmag_title'] ) ? $instance['vinkmag_title'] : esc_html__( 'WP Categories', 'vinkmag-essntial' );
		$vinkmag_hide_title 			= ! empty( $instance['vinkmag_hide_title'] ) ? $instance['vinkmag_hide_title'] : esc_html__( '', 'vinkmag-essntial' );
		$vinkmag_taxonomy_type 			= ! empty( $instance['vinkmag_taxonomy_type'] ) ? $instance['vinkmag_taxonomy_type'] : esc_html__( 'category', 'vinkmag-essntial' );
		$vinkmag_selected_categories 	= (! empty( $instance['vinkmag_selected_categories'] ) && ! empty( $instance['vinkmag_action_on_cat'] ) ) ? $instance['vinkmag_selected_categories'] : esc_html__( '', 'vinkmag-essntial' );
		$vinkmag_action_on_cat 			= ! empty( $instance['vinkmag_action_on_cat'] ) ? $instance['vinkmag_action_on_cat'] : esc_html__( '', 'vinkmag-essntial' );
		$vinkmag_hide_count 			= ! empty( $instance['vinkmag_hide_count'] ) ? $instance['vinkmag_hide_count'] : esc_html__( '', 'vinkmag-essntial' );
		$vinkmag_selected_categories	= array($vinkmag_selected_categories);
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'vinkmag_title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vinkmag_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vinkmag_title' ) ); ?>" type="text" value="<?php echo esc_attr( $vinkmag_title ); ?>">
		</p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vinkmag_hide_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vinkmag_hide_title' ) ); ?>" type="checkbox" value="1" <?php checked( $vinkmag_hide_title, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'vinkmag_hide_title' ) ); ?>"><?php _e( esc_attr( 'Hide Title' ) ); ?> </label> 
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'vinkmag_taxonomy_type' ) ); ?>"><?php _e( esc_attr( 'Taxonomy Type:' ) ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vinkmag_taxonomy_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vinkmag_taxonomy_type' ) ); ?>">
					<?php 
					$args = array(
					  'public'   => true,
					  '_builtin' => false
					  
					); 
					$output = 'names'; // or objects
					$operator = 'and'; // 'and' or 'or'
					$taxonomies = get_taxonomies( $args, $output, $operator ); 
					array_push($taxonomies,'category');
					if ( $taxonomies ) {
					foreach ( $taxonomies as $taxonomy ) {

						echo '<option value="'.$taxonomy.'" '.selected($taxonomy,$vinkmag_taxonomy_type).'>'.$taxonomy.'</option>';
					}
					}

				?>    
		</select>
		</p>
		<p>
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vinkmag_action_on_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vinkmag_action_on_cat' ) ); ?>">
           <option value="" <?php selected($vinkmag_action_on_cat,'' )?> >Show All Category:</option>       
           <option value="include" <?php selected($vinkmag_action_on_cat,'include' )?> >Include Selected Category:</option>       
           <option value="exclude" <?php selected($vinkmag_action_on_cat,'exclude' )?> >Exclude Selected Category:</option>
		</select> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vinkmag_selected_categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vinkmag_selected_categories' ) ); ?>[]" multiple>
					<?php 			
					if($vinkmag_taxonomy_type){
					$args = array( 'hide_empty=0' );
					$terms = get_terms( $vinkmag_taxonomy_type, $args );
			        echo '<option value="" '.selected(true, in_array('',$vinkmag_selected_categories), false).'>None</option>';
					if ( $terms ) {
					foreach ( $terms as $term ) {
						echo '<option value="'.$term->term_id.'" '.selected(true, in_array($term->term_id,$vinkmag_selected_categories), false).'>'.$term->name.'</option>';
					}
				    	
					}
				}

				?>    
		</select>
		</p>
		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vinkmag_hide_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vinkmag_hide_count' ) ); ?>" type="checkbox" value="1" <?php checked( $vinkmag_hide_count, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'vinkmag_hide_count' ) ); ?>"><?php _e( esc_attr( 'Hide Count' ) ); ?> </label> 
		</p>
		<p><a href="mailto:raghunath.0087@gmail.com">Contact to Author</a></p>
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['vinkmag_title'] 					= ( ! empty( $new_instance['vinkmag_title'] ) ) ? strip_tags( $new_instance['vinkmag_title'] ) : '';
		$instance['vinkmag_hide_title'] 			= ( ! empty( $new_instance['vinkmag_hide_title'] ) ) ? strip_tags( $new_instance['vinkmag_hide_title'] ) : '';
		$instance['vinkmag_taxonomy_type'] 			= ( ! empty( $new_instance['vinkmag_taxonomy_type'] ) ) ? strip_tags( $new_instance['vinkmag_taxonomy_type'] ) : '';
		$instance['vinkmag_selected_categories'] 	= ( ! empty( $new_instance['vinkmag_selected_categories'] ) ) ? $new_instance['vinkmag_selected_categories'] : '';
		$instance['vinkmag_action_on_cat'] 			= ( ! empty( $new_instance['vinkmag_action_on_cat'] ) ) ? $new_instance['vinkmag_action_on_cat'] : '';
		$instance['vinkmag_hide_count'] 			= ( ! empty( $new_instance['vinkmag_hide_count'] ) ) ? strip_tags( $new_instance['vinkmag_hide_count'] ) : '';
		return $instance;
	}
}