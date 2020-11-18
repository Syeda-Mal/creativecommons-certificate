<?php

use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\Input_Text;


class Course_Metabox extends Metabox {

	public function __construct( $id = '', $title = '', $post_type = '', array $args = array() ) {
		parent::__construct( $id, $title, $post_type, $args );
	}
	public function get_fields(): array {
		return [
			Node_Factory::make(
				Input_Text::class,
				[
					'name'       => 'duration',
					'label'      => 'Course duration',
					'attributes' => [
						'class' => 'regular-text',
					],
				]
			),
			Node_Factory::make(
				Input_Text::class,
				[
					'name'       => 'language',
					'label'      => 'Course Language',
					'attributes' => [
						'class' => 'regular-text',
					],
				]
			),
		];
	}
	public function sanitize_data( array $data ): array {
		$sanitized = [];
		foreach ( $data as $key => $val ) {
			switch ( $key ) {
				case 'duration':
				case 'language':
					$sanitized[ $key ] = sanitize_text_field( $val );
					break;
			}
		}
		return $sanitized;
	}
}

new Course_Metabox( 'course', 'Course Related Data', 'cc_course', [ 'context' => 'normal' ] );
