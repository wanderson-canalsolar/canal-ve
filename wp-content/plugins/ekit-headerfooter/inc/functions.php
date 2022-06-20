<?php

function ekit_hf_header_enabled() {
	$header_id = Ekit_header_footer::get_settings( 'type_header', '' );
	$status    = false;

	if ( '' !== $header_id ) {
		$status = true;
	}

	return apply_filters( 'ekit_hf_header_enabled', $status );
}


function ekit_hf_footer_enabled() {
	$footer_id = Ekit_header_footer::get_settings( 'type_footer', '' );
	$status    = false;

	if ( '' !== $footer_id ) {
		$status = true;
	}

	return apply_filters( 'ekit_hf_footer_enabled', $status );
}

function get_ekit_hf_header_id() {
	$header_id = Ekit_header_footer::get_settings( 'type_header', '' );

	if ( '' === $header_id ) {
		$header_id = false;
	}

	return apply_filters( 'get_ekit_hf_header_id', $header_id );
}

function get_ekit_hf_footer_id() {
	$footer_id = Ekit_header_footer::get_settings( 'type_footer', '' );

	if ( '' === $footer_id ) {
		$footer_id = false;
	}

	return apply_filters( 'get_ekit_hf_footer_id', $footer_id );
}

function ekit_hf_render_header() {

	if ( false == apply_filters( 'enable_ekit_hf_render_header', true ) ) {
		return;
	}

	?>
		<header id="ekit-header">
			<?php Ekit_header_footer::get_header_content(); ?>
		</header>

	<?php

}


function ekit_hf_render_footer() {

	if ( false == apply_filters( 'enable_ekit_hf_render_footer', true ) ) {
		return;
	}

	?>
		<footer id="ekit-footer">
			<?php Ekit_header_footer::get_footer_content(); ?>
		</footer>
	<?php

}
 

add_filter( 'parse_query', 'prefix_parse_filter' );
function  prefix_parse_filter($query) {
   global $pagenow;
   $current_page = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';

   if ( is_admin() && 
     'elementor-hf' == $current_page &&
     'edit.php' == $pagenow && 
      isset( $_GET['xs_type'] ) && 
      $_GET['xs_type'] != '') {

    $type = $_GET['xs_type'];
    $query->query_vars['meta_key'] = 'ehf_template_type';
    $query->query_vars['meta_value'] = $type;
    $query->query_vars['meta_compare'] = '=';
  }
}