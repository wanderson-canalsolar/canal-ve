<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Ekit_Widget_Post_Grid extends Widget_Base {


  public $base;

    public function get_name() {
        return 'ekit-post-grid';
    }

    public function get_title() {

        return esc_html__( 'Post Grid', 'ekit-megamenu' );

    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'elementskit' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_tab',
            [
                'label' => esc_html__('Widget settings', 'ekit-megamenu'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_cat',
            [
                'label' =>esc_html__('Select Categories', 'agmycoo'),
                'type'      => MegamenuCustom_Controls_Manager::MEGAMENUAJAXSELECT2,
                'options'   =>'category',
                'label_block' => true,
                'multiple'  => true,
            ]
        );
        $this->add_control(
            'post_count',
            [
              'label'         => esc_html__( 'Post count', 'agmycoo' ),
              'type'          => Controls_Manager::NUMBER,
              'default'       => esc_html__( '3', 'agmycoo' )
            ]
          );

          $this->add_control(
            'count_col',
            [
                'label'     => esc_html__( 'Select Column', 'agmycoo' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'ekit___column-3',
                'options'   => [
                      'ekit___column-2'     => esc_html__( '2 Column', 'agmycoo' ),
                      'ekit___column-3'     => esc_html__( '3 Column', 'agmycoo' ),
                      'ekit___column-4'     => esc_html__( '4 Column', 'agmycoo' ),
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        extract($settings);

        $query = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'cat'    => $post_cat,
            'posts_per_page' => $post_count,
        ); ?>

        <div class="ekit--tab__post__details">
            <?php $xs_query = new \WP_Query( $query ); ?>
            <?php  if($xs_query->have_posts()): ?>
                <?php while ($xs_query->have_posts()) : ?>
                    <?php $xs_query->the_post(); ?>
                    <?php if(has_post_thumbnail()): ?>
                        <div class="tab__post__single--item <?php echo esc_attr($count_col); ?>">
                            <a href="<?php echo get_the_permalink(); ?>" class="tab__post--header">
                                <?php the_post_thumbnail(); ?>
                                <?php if(get_post_format()  == 'video') : ?>
                                    <div class="tab__post--icon">
                                        <span class="xsicon xsicon-play-circle"></span>
                                    </div>
                                <?php endif; ?>
                            </a>
                            <h3 class="tab__post--title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                    <?php endif; ?>
                <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    <?php }
    protected function content_template() { }
}

?>