<?php

class Vinkmag_Author extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'pu_media_upload',
            'description' => 'Vinkmag Author'
        );
        parent::__construct( 'pu_media_upload', 'Vinkmag Author', $widget_ops );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }
    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));
        wp_enqueue_style('thickbox');
    }
    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        
      extract( $args );

		// Our variables from the widget settings
		$image 				= $instance['image'];
		$description 		= $instance['about'];
      $user 				= $instance['user'];
    
      print $before_widget;
      ?>

      <div class="widgets author-box-widget ts-grid-box">
         <div class="ts-post-thumb">
            <a href="<?php echo get_author_posts_url( $user, the_author_meta('nick_name',$user) ); ?>">
               <img class="img-fluid" src="<?php echo esc_url($image); ?>" alt="">
            </a>
         </div>
      <div class="post-content">
         <h3 class="post-title md">
            <a href="<?php echo get_author_posts_url( $user, the_author_meta('nick_name',$user) ); ?>"><?php the_author_meta('display_name',$user)?></a>
         </h3>
         <p>
           <?php echo esc_html($description); ?>
         </p>
         <?php   $social_links = vinkmag_option('general_social_links',[]); ?>
         <?php if(!empty($social_links)): ?>
         <div class="authors-social">
              <?php
                 foreach($social_links as $sl):
                 $class = 'ts-' . str_replace('xsicon xsicon-', '', $sl['icon_class']);
              ?>
               <a href="<?php echo esc_url($sl['url']); ?>" class="<?php echo esc_attr($class); ?>">
                  <i class="<?php echo esc_attr($sl['icon_class']); ?>"></i>
               </a>
             <?php endforeach; ?>

         </div>
       <?php endif; ?>
      </div>
   </div>
    <?php  
      print $after_widget;

    }
    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {
        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }
    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
         $users = get_users();
       
 
        $title = __('Vingmag About Us ');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
  

        $defaults = array(
			'user' 			=> '',
			'image' 		 	=> '',
			'about' 		   => '',

		);
		  $instance = wp_parse_args( (array) $instance, $defaults );
        extract($instance);
    
    ?>
         
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
          
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <br/>  
            <br/>      
            <input class="upload_image_button button" type="button" value="Upload Image" />
        </p>
        <p>
           <textarea id="<?php print $this->get_field_id( 'about' ); ?>" name="<?php print $this->get_field_name( 'about' ); ?>" style="width:95%;" rows="6"><?php echo esc_textarea( $instance['about'] ); ?></textarea>
        </p>
        <p>
          <label for="<?php echo $this->get_field_name( 'user' ); ?>"><?php _e( 'Author:' ); ?></label>
          <br/>
          <br/>
            <select name="<?php echo $this->get_field_name( 'user' ); ?>" id="<?php echo $this->get_field_id( 'user' ); ?>" class="widefat">
            <?php foreach ($users as $userlist ):  ?>
              <option <?php selected( $instance['user'], $userlist->ID ); ?> value="<?php echo esc_attr($userlist->ID); ?>"> <?php echo esc_html($userlist->display_name); ?> </option>
           <?php endforeach; ?>
             
            </select>
        </p>
        <p> 
       
    <?php
    }
}
?>