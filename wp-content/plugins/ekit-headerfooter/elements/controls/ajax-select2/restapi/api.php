<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Ekit_Ajax_Select_Api{

    protected $request = [];

    //calling the method dynamically
	public function init(WP_REST_Request $request){
        $this->request = $request;
        if(isset($request['route']) && method_exists($this, $request['route'])){
            $this->request = $request;
            return $this->{$request['route']}();
        }
    }
    
    public function post_list(){
        $query_args = [
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'posts_per_page'    => 15,
        ];

        if(isset($this->request['ids'])){
            $ids = explode(',', $this->request['ids']);
            $query_args['post__in'] = $ids;
        }
        if(isset($this->request['s'])){
            $query_args['s'] = $this->request['s'];
        }

        $query = new WP_Query($query_args);
        $options = [];
        if($query->have_posts()):
            while ($query->have_posts()) {
                $query->the_post();
                $options[] = [ 'id' => get_the_ID(), 'text' => get_the_title() ];
            }
        endif;

        return ['results' => $options];
        wp_reset_postdata();
    }
    
    public function category(){
        $taxonomy	 = 'category';
        $query_args = [
            'taxonomy'      => ['category'], // taxonomy name
            'orderby'       => 'name', 
            'order'         => 'DESC',
            'hide_empty'    => true,
            'number'        => 6
        ];

        if(isset($this->request['ids'])){
            $ids = explode(',', $this->request['ids']);
            $query_args['include'] = $ids;
        }
        if(isset($this->request['s'])){
            $query_args['name__like'] = $this->request['s'];
        }

        $terms = get_terms( $query_args );

        $options = [];
        $count = count($terms);
        if($count > 0):
            foreach ($terms as $term) {
                $options[] = [ 'id' => $term->term_id, 'text' => $term->name ];
            }
        endif;      
        return ['results' => $options];
    }
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'ajaxselect2/v1', '/(?P<route>\w+)/', array(
        'methods' => 'GET',
        'callback' => ['Ekit_Ajax_Select_Api', 'init'],
        'permission_callback' => '__return_true',
    ));
});
