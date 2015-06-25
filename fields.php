<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap!
 */
require_once 'fields/init.php';

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb2_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['test_metabox'] = array(
		'id'            => 'test_metabox',
		'title'         => __( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'html5-blank', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			array(
				'name'       => __( 'Test Text', 'cmb2' ),
				'desc'       => __( 'field description (optional)', 'cmb2' ),
				'id'         => $prefix . 'test_text',
				'type'       => 'text',
				'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
				// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
				// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
				// 'on_front'        => false, // Optionally designate a field to wp-admin only
				// 'repeatable'      => true,
			),
			array(
				'name' => __( 'Test Text Small', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textsmall',
				'type' => 'text_small',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Test Text Medium', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textmedium',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Website URL', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'url',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Test Text Email', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Test Time', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_time',
				'type' => 'text_time',
			),
			array(
				'name' => __( 'Time zone', 'cmb2' ),
				'desc' => __( 'Time zone', 'cmb2' ),
				'id'   => $prefix . 'timezone',
				'type' => 'select_timezone',
			),
			array(
				'name' => __( 'Test Date Picker', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textdate',
				'type' => 'text_date',
			),
			array(
				'name' => __( 'Test Date Picker (UNIX timestamp)', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textdate_timestamp',
				'type' => 'text_date_timestamp',
				// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
			),
			array(
				'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_datetime_timestamp',
				'type' => 'text_datetime_timestamp',
			),
			// This text_datetime_timestamp_timezone field type
			// is only compatible with PHP versions 5.3 or above.
			// Feel free to uncomment and use if your server meets the requirement
			// array(
			// 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'cmb2' ),
			// 	'desc' => __( 'field description (optional)', 'cmb2' ),
			// 	'id'   => $prefix . 'test_datetime_timestamp_timezone',
			// 	'type' => 'text_datetime_timestamp_timezone',
			// ),
			array(
				'name' => __( 'Test Money', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textmoney',
				'type' => 'text_money',
				// 'before'     => '£', // override '$' symbol if needed
				// 'repeatable' => true,
			),
			array(
				'name'    => __( 'Test Color Picker', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_colorpicker',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
			array(
				'name' => __( 'Test Text Area', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textarea',
				'type' => 'textarea',
			),
			array(
				'name' => __( 'Test Text Area Small', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textareasmall',
				'type' => 'textarea_small',
			),
			array(
				'name' => __( 'Test Text Area for Code', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_textarea_code',
				'type' => 'textarea_code',
			),
			array(
				'name' => __( 'Test Title Weeeee', 'cmb2' ),
				'desc' => __( 'This is a title description', 'cmb2' ),
				'id'   => $prefix . 'test_title',
				'type' => 'title',
			),
			array(
				'name'    => __( 'Test Select', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_select',
				'type'    => 'select',
				'options' => array(
					'standard' => __( 'Option One', 'cmb2' ),
					'custom'   => __( 'Option Two', 'cmb2' ),
					'none'     => __( 'Option Three', 'cmb2' ),
				),
			),
			array(
				'name'    => __( 'Test Radio inline', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_radio_inline',
				'type'    => 'radio_inline',
				'options' => array(
					'standard' => __( 'Option One', 'cmb2' ),
					'custom'   => __( 'Option Two', 'cmb2' ),
					'none'     => __( 'Option Three', 'cmb2' ),
				),
			),
			array(
				'name'    => __( 'Test Radio', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_radio',
				'type'    => 'radio',
				'options' => array(
					'option1' => __( 'Option One', 'cmb2' ),
					'option2' => __( 'Option Two', 'cmb2' ),
					'option3' => __( 'Option Three', 'cmb2' ),
				),
			),
			array(
				'name'     => __( 'Test Taxonomy Radio', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'text_taxonomy_radio',
				'type'     => 'taxonomy_radio',
				'taxonomy' => 'category', // Taxonomy Slug
				// 'inline'  => true, // Toggles display to inline
			),
			array(
				'name'     => __( 'Test Taxonomy Select', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'text_taxonomy_select',
				'type'     => 'taxonomy_select',
				'taxonomy' => 'category', // Taxonomy Slug
			),
			array(
				'name'     => __( 'Test Taxonomy Multi Checkbox', 'cmb2' ),
				'desc'     => __( 'field description (optional)', 'cmb2' ),
				'id'       => $prefix . 'test_multitaxonomy',
				'type'     => 'taxonomy_multicheck',
				'taxonomy' => 'post_tag', // Taxonomy Slug
				// 'inline'  => true, // Toggles display to inline
			),
			array(
				'name' => __( 'Test Checkbox', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . 'test_checkbox',
				'type' => 'checkbox',
			),
			array(
				'name'    => __( 'Test Multi Checkbox', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_multicheckbox',
				'type'    => 'multicheck',
				'options' => array(
					'check1' => __( 'Check One', 'cmb2' ),
					'check2' => __( 'Check Two', 'cmb2' ),
					'check3' => __( 'Check Three', 'cmb2' ),
				),
				// 'inline'  => true, // Toggles display to inline
			),
			array(
				'name'    => __( 'Test wysiwyg', 'cmb2' ),
				'desc'    => __( 'field description (optional)', 'cmb2' ),
				'id'      => $prefix . 'test_wysiwyg',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			array(
				'name' => __( 'Test Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'test_image',
				'type' => 'file',
			),
			array(
				'name'         => __( 'Multiple Files', 'cmb2' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'cmb2' ),
				'id'           => $prefix . 'test_file_list',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => __( 'oEmbed', 'cmb2' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb2' ),
				'id'   => $prefix . 'test_embed',
				'type' => 'oembed',
			),
		),
	);

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$meta_boxes['about_page_metabox'] = array(
		'id'           => 'about_page_metabox',
		'title'        => __( 'About Page Metabox', 'cmb2' ),
		'object_types' => array( 'page', ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields'       => array(
			array(
				'name' => __( 'Test Text', 'cmb2' ),
				'desc' => __( 'field description (optional)', 'cmb2' ),
				'id'   => $prefix . '_about_test_text',
				'type' => 'text',
			),
		)
	);

	/**
	 * Repeatable Field Groups
	 */
	$meta_boxes['field_group'] = array(
		'id'           => 'field_group',
		'title'        => __( 'Repeating Field Group', 'cmb2' ),
		'object_types' => array( 'page', ),
		'fields'       => array(
			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => __( 'Generates reusable form entries', 'cmb2' ),
				'options'     => array(
					'group_title'   => __( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Entry', 'cmb2' ),
					'remove_button' => __( 'Remove Entry', 'cmb2' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Entry Title',
						'id'   => 'title',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					array(
						'name' => 'Description',
						'description' => 'Write a short description for this entry',
						'id'   => 'description',
						'type' => 'textarea_small',
					),
					array(
						'name' => 'Entry Image',
						'id'   => 'image',
						'type' => 'file',
					),
					array(
						'name' => 'Image Caption',
						'id'   => 'image_caption',
						'type' => 'text',
					),
				),
			),
		),
	);
        
	/**
	 * Campos repetidos para Posgrados
	 */
	$meta_boxes['posgrados_campos'] = array(
		'id'           => 'posgrados_campos',
		'title'        => __( 'Descuentos de esta Universidad', 'cmb2' ),
		'object_types' => array( 'posgrados', ),
		'fields'       => array(
             array(
                'name' => __( 'Página Web de la escuela', 'cmb2' ),
                'desc' => __( 'Coloque la pagina web de la escuela', 'cmb2' ),
                'id'   => $prefix . 'enlaceWeb',
                'type' => 'text',
            ),
			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => __( 'Coloque los descuentos de esta universidad', 'cmb2' ),
				'options'     => array(
					'group_title'   => __( 'Descuento {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Agregar otro descuento', 'cmb2' ),
					'remove_button' => __( 'Borrar descuento', 'cmb2' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Oferta Academíca',
						'id'   => 'oferta_a',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					array(
						'name' => 'Costo',
						'description' => 'Costo: ejemplo: 91,500',
						'id'   => 'costo',
						'type' => 'text',
					),
					array(
						'name' => 'Descuento',
						'description' => 'Descuento',
						'id'   => 'descuento',
						'type' => 'text',
					),
					array(
						'name' => 'Requisitos',
						'description' => 'Enlace a los requisitos y plan de estudios',
						'id'   => 'requisitos',
						'type' => 'text',
					),
				),
			),
		),
	);

	/**
	 * Campos repetidos para Efemerides
	 */
	$meta_boxes['field_group'] = array(
		'id'           => 'field_group',
		'title'        => __( 'Campos para Efemerides', 'cmb2' ),
		'object_types' => array( 'efemerides', ),
		'fields'       => array(
            array(
                'name' => __( 'Tema', 'cmb2' ),
                'desc' => __( 'Tema del formato ', 'cmb2' ),
                'id'   => $prefix . 'diamundial',
                'type' => 'text',
                // 'repeatable' => true,
            ),
			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => __( 'Coloque las efemerides', 'cmb2' ),
				'options'     => array(
					'group_title'   => __( 'Efemeride {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Agregar otra', 'cmb2' ),
					'remove_button' => __( 'Borrar', 'cmb2' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Año',
						'id'   => 'efemeride_anio',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					array(
						'name' => 'Descripción efemeride',
						'description' => 'Texto de la efemeride',
						'id'   => 'desc_efemeride',
						'type' => 'textarea',
					),
				),
			),
		),
	);
               
        
	/**
	 * Campos repetidos para Revista
	 */
	$meta_boxes['revista_campos'] = array(
		'id'           => 'revista_campos',
		'title'        => __( 'Campos para Efemerides', 'cmb2' ),
		'object_types' => array( 'revista', ),
		'fields'       => array(

			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => __( 'Coloque las imagenes', 'cmb2' ),
				'options'     => array(
					'group_title'   => __( 'Imagen {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Agregar otra', 'cmb2' ),
					'remove_button' => __( 'Borrar', 'cmb2' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Imagen',
						'id'   => 'imagen_revista',
						'type' => 'file',
						'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
				),
			),
		),
	);
    
    /**
     * Campos repetidos para Revista
     */
    $meta_boxes['formatos'] = array(
        'id'           => 'revista_campos',
        'title'        => __( 'Campos para Formatos', 'cmb2' ),
        'object_types' => array( 'formatos', ),
        'fields'       => array(
                array(
                    'name' => __( 'Dependencia', 'cmb2' ),
                    'desc' => __( 'Nombre de la dependencia ', 'cmb2' ),
                    'id'   => $prefix . 'dependencia',
                    'type' => 'text_medium',
                    // 'repeatable' => true,
                ),
                array(
                    'name' => __( 'Tema', 'cmb2' ),
                    'desc' => __( 'Tema del formato ', 'cmb2' ),
                    'id'   => $prefix . 'tema',
                    'type' => 'text_medium',
                    // 'repeatable' => true,
                ),
                array(
                    'name' => __( 'Imagen Pequeña', 'cmb2' ),
                    'desc' => __( 'Imagen Pequeña.', 'cmb2' ),
                    'id'   => $prefix . 'imagen_formato',
                    'type' => 'file',
                ),
                array(
                    'name' => __( 'Archivo', 'cmb2' ),
                    'desc' => __( 'Archivo para Descargar.', 'cmb2' ),
                    'id'   => $prefix . 'archivo',
                    'type' => 'file',
                ),
        ),
    );
    /**
     * Metabox to be displayed on a single page ID
     */
    $meta_boxes['revista'] = array(
        'id'           => 'revista',
        'title'        => __( 'Cartelera Diana', 'cmb2' ),
        'object_types' => array( 'page', ), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
        'show_on'      => array( 'key' => 'id', 'value' => array( 7189, ), ), // Specific post IDs to display this metabox
        'fields'       => array(
            array(
                'id'          => $prefix . 'repeat_group',
                'type'        => 'group',
                'description' => __( 'Coloque las imagenes', 'cmb2' ),
                'options'     => array(
                    'group_title'   => __( 'Imagen {#}', 'cmb2' ), // {#} gets replaced by row number
                    'add_button'    => __( 'Agregar otra', 'cmb2' ),
                    'remove_button' => __( 'Borrar', 'cmb2' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Imagen',
                        'id'   => 'imagen_revista',
                        'type' => 'file',
                        'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                ),
                
            ),
        ),
    );

	/**
	 * Campos repetidos para Agenda
	 */
	$meta_boxes['agenda_campos'] = array(
		'id'           => 'agenda_campos',
		'title'        => __( 'Campos para Agenda', 'cmb2' ),
		'object_types' => array( 'agenda', ),
		'fields'       => array(
			array(
				'id'          => $prefix . 'agenda_campos',
				'type'        => 'group',
				'description' => __( 'Coloque los eventos', 'cmb2' ),
				'options'     => array(
					'group_title'   => __( 'Evento {#}', 'cmb2' ), // {#} gets replaced by row number
					'add_button'    => __( 'Agregar otro', 'cmb2' ),
					'remove_button' => __( 'Borrar', 'cmb2' ),
					'sortable'      => true, // beta
				),
				'fields'      => array(
                                        array(
                                                'name' => __( 'Seleccione la fecha del Evento', 'cmb2' ),
                                                'desc' => __( 'Seleccione fecha en que se realiza el evento', 'cmb2' ),
                                                'id'   => $prefix . 'date_evento',
                                                'type' => 'text_date',
                                        ),
                                        array(
                                                'name' => __( 'Seleccione la hora del Evento', 'cmb2' ),
                                                'desc' => __( 'Seleccione la hora en que se realiza el evento ', 'cmb2' ),
                                                'id'   => $prefix . 'hora_Evento',
                                                'type' => 'text_time',
                                        ),

                                        array(
                                                'name' => __( 'Escriba una descripción del evento', 'cmb2' ),
                                                'desc' => __( 'Descripción del evento.', 'cmb2' ),
                                                'id'   => $prefix . 'desc_evento',
                                                'type' => 'textarea',
                                        ),
                                        array(
                                                'name' => __( 'Lugar del evento', 'cmb2' ),
                                                'desc' => __( 'Escriba el lugar del evento', 'cmb2' ),
                                                'id'   => $prefix . 'lugar_evento',
                                                'type' => 'text_medium',
                                                // 'repeatable' => true,
                                        ),
				),
			),
		),
	);
        
        
    /**
     * Campos para formacion basica
     */
    $meta_boxes['fbasica'] = array(
        'id'           => 'fbasica',
        'title'        => __( 'Campos para Formación básica', 'cmb2' ),
        'object_types' => array( 'fbasica', ),
        'fields'       => array(

                array(
                    'name' => __( 'Informes', 'cmb2' ),
                    'id'   => $prefix . 'informes',
                    'type' => 'text_medium',
                ),

        ),
    );
        
	return $meta_boxes;
}