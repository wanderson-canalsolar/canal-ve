<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * twitter feed widget
 */
class Vinkmag_Twitter_Feed extends WP_Widget {

    function __construct() {
        $widget_opt = array(
            'classname'		 => 'vinkmag-twitter-feed',
            'description'	 => esc_html__('Vinkmag twitter feed','vinkmag-essntial')
        );

        parent::__construct( 'xs-twitter-feed', esc_html__( 'Vinkmag twitter feed', 'vinkmag-essntial' ), $widget_opt );
    }

    function widget( $args, $instance ) {

        echo vinkmag_return( $args[ 'before_widget' ] );
        if ( !empty( $instance[ 'title' ] ) ) {

            echo vinkmag_return( $args[ 'before_title' ] ) . apply_filters( 'widget_title', $instance[ 'title' ] ) . vinkmag_return( $args[ 'after_title' ] );
        }

        $username			 = '';
        $loading_text = esc_html__('Loading!','vinkmag-essntial');
        if ( isset( $instance[ 'username' ] ) ) {
            $username = $instance[ 'username' ];
        }
        if ( isset( $instance[ 'loading_text' ] ) ) {
            $loading_text = $instance[ 'loading_text' ];
        }

        wp_register_script('twitter_username', HOSTINZA_SCRIPTS . '/twitter-username.js', array());

        wp_enqueue_script('twitter_username');
        $translation_array = array(
        'username' => $username,
        'loading_text' => $loading_text,
        );

        wp_localize_script( 'twitter_username', 'twitter_data', $translation_array);

        ?>
        <div class="xs-tweet"></div>
        <?php esc_url( $username ); ?>

        <?php
        echo vinkmag_return( $args[ 'after_widget' ] );
    }

    function update( $old_instance, $new_instance ) {
        $new_instance[ 'title' ]			 = strip_tags( $old_instance[ 'title' ] );
        $new_instance[ 'username' ]			 = $old_instance[ 'username' ];
        $new_instance[ 'loading_text' ]			 = $old_instance[ 'loading_text' ];
        return $new_instance;
    }

    function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = esc_html__( 'Twitter feed', 'vinkmag-essntial' );
        }

        $username			 = 'xpeedstudio';
        $loading_text = esc_html__('Loading!','vinkmag-essntial');


        if ( isset( $instance[ 'username' ] ) ) {
            $username = $instance[ 'username' ];
        }
        if ( isset( $instance[ 'loading_text' ] ) ) {
            $loading_text = $instance[ 'loading_text' ];
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'vinkmag-essntial' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username:', 'vinkmag-essntial' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $username ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'loading_text' ) ); ?>"><?php esc_html_e( 'Loading text:', 'vinkmag-essntial' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'loading_text' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'loading_text' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $loading_text ); ?>" />
        </p>


        <?php
    }

}
