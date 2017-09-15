<?php

/**
 * Idea: 
 * - Add a bulk posts list component to the app, choosing which taxo + filters available to customize the get_terms query/result
 * - When building synchronization web service: 
 *   do as if posts lists from the bulk terms were real posts list components > add one post list component per term to webservice answer
 * - When getting more posts in the app for a "phantom" post list component coming from a bulk component:
 *   create the corresponding posts list component on the fly and return corresponding data
 */

class WpakComponentTypeBulkPostsLists extends WpakComponentType {

	protected function compute_data( $component, $options, $args = array() ) {
		global $wpdb;

		do_action( 'wpak_before_component_bulk_posts_lists', $component, $options );
		
		$terms = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ) );
        
		$this->set_specific( 'terms', $terms );
	}
	
	protected function get_items_data( $component, $options, $items_ids, $args = array() ) {
		$items = array();
		return $items;
	}

	public function get_options_to_display( $component ) {
		$options = array();
		return $options;
	}

	public function echo_form_fields( $component ) {
	}

	public function echo_form_javascript() {
	}

	public function get_ajax_action_html_answer( $action, $params ) {
	}

	public function get_options_from_posted_form( $data ) {
	}

}

WpakComponentsTypes::register_component_type( 'bulk-posts-lists', array( 'label' => __( 'Bulk Posts lists', WpAppKit::i18n_domain ) ) );
