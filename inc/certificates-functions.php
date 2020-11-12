<?php
class Certificates_Website {
	public static function set_certificates_logo() {
		return 'products/certificates.svg#certificates';
	}
	public static function set_certificates_logo_image_size() {
		return '215 40';
	}
	// Add a class to the page body to override styles from the base theme
	public static function add_body_class( $classes ) {
    return array_merge( $classes, array( 'wp-theme-certificates' ) );
	}
	public static function modify_breadcrumb_seperator( ) {
		return '<i class="icon chevron-right is-6"></i>';
	}
};

// add the filter
add_filter( 'cc_theme_base_set_default_size_logo', array( 'Certificates_Website', 'set_certificates_logo_image_size' ) );
add_filter( 'cc_theme_base_set_default_logo', array( 'Certificates_Website', 'set_certificates_logo' ) );
add_filter( 'body_class', array( 'Certificates_Website', 'add_body_class') );
add_filter( 'wpseo_breadcrumb_separator', array( 'Certificates_Website', 'modify_breadcrumb_seperator') );

/**
 * Populate the 'Featured FAQs' dropdown on the homepage edit page with the actual FAQs.
 */
function acf_load_featured_faq_choices($field) {
	$field['choices'] = array();

	// @todo: FAQ page id is hardcoded here, find a way to make this dynamic
	$faq_groups = get_field('faq_group', 32);

	foreach ($faq_groups as $faqGroup) {
		foreach ($faqGroup['questions'] as $question) {
			$field['choices'][$question['question']] = $question['question'];
		}
	}

  return $field;
};

add_filter('acf/load_field/name=featured_faqs', 'acf_load_featured_faq_choices');


function get_faqs_by_titles($titles = array(), $faqs = array()) {
	// @todo: FAQ page id is hardcoded here, find a way to make this dynamic
	$faq_groups = get_field('faq_group', 32);
	$filtered_faqs = [];

	foreach ($faq_groups as $faq_group) {
		foreach ($faq_group['questions'] as $question) {
			if(in_array($question['question'], $titles)) {
				array_push($filtered_faqs, $question);
			}
		}
	}

	return $filtered_faqs;
}
