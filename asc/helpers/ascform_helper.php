<?php

/**
 * A.S.C.
 * 
 * @package    CodeIgniter 4.0.0.beta-2
 * @author     A.S.C.
 */

/*	Funciones de: /system/helpers/form_helper.php
	Version: CI4 - 4.0.0.beta-2

	function form_open(string $action = '', $attributes = [], array $hidden = []): string
	function form_open_multipart(string $action = '', $attributes = [], array $hidden = []): string
	function form_hidden($name, $value = '', bool $recursing = false): string
	function form_input($data = '', string $value = '', $extra = '', string $type = 'text'): string
	function form_password($data = '', string $value = '', $extra = ''): string
	function form_upload($data = '', string $value = '', $extra = ''): string
	function form_textarea($data = '', string $value = '', $extra = ''): string
	function form_multiselect(string $name = '', array $options = [], array $selected = [], $extra = ''): string
	function form_dropdown($data = '', $options = [], $selected = [], $extra = ''): string
	function form_checkbox($data = '', string $value = '', bool $checked = false, $extra = ''): string
	function form_radio($data = '', string $value = '', bool $checked = false, $extra = ''): string
	function form_submit($data = '', string $value = '', $extra = ''): string
	function form_reset($data = '', string $value = '', $extra = ''): string
	function form_button($data = '', string $content = '', $extra = ''): string
	function form_label(string $label_text = '', string $id = '', array $attributes = []): string
	function form_datalist($name, $value, $options)
	function form_fieldset(string $legend_text = '', array $attributes = []): string
	function form_fieldset_close(string $extra = ''): string
	function form_close(string $extra = ''): string
	function set_value(string $field, string $default = '', bool $html_escape = true): string
	function set_select(string $field, string $value = '', bool $default = false): string
	function set_checkbox(string $field, string $value = '', bool $default = false): string
	function set_radio(string $field, string $value = '', bool $default = false): string
	function parse_form_attributes($attributes, $default): string
*/


/*	Ejemplo de ARRAY que debemos recibir en el parametro de la funcion
	
	En el elemento "form" debemos enviar todos los datos
	de la funcion FORM_OPEN (action, attribs, hidden) y FORM_CLOSE (extra)
	
	En el elemento "fields" debemos enviar un ARRAY con la lista de campos
	ordenados en el mismo orden que deben aparecer en el formulario
	
	El elemento "field" de cada registro 
	nos indica la funcion de "form_helper" que vamos a ejecutar,

	En campos del tipo "fieldset", no hay que usar "fieldset_close" ya que se cierra automaticamente
	
	El formulario se cierra automaticamente tras finalizar la lista de "fields"
			
	$formData = [
//		function form_open(string $action = '', $attributes = [], array $hidden = []): string
//		function form_open_multipart(string $action = '', $attributes = [], array $hidden = []): string
//		function form_hidden($name, $value = '', bool $recursing = false): string
//		function form_close(string $extra = ''): string
		'form'   => [ 'action' => '', 'attribs' => [], 'hidden' => [], 'extra' => '', 'multipart' => false ],
		'fields' => [
			[ 'field' => 'label', 		'label_text' => '', 'id' => '', 'attribs' => '', 'type' => 'label' ],
			[ 'field' => 'input', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'text' ],
			[ 'field' => 'password', 	'data' => '', 'value' => '', 'extra' => '', 'type' => 'password' ],
			[ 'field' => 'checkbox', 	'data' => '', 'value' => '', 'extra' => '', 'type' => 'checkbox', 	'checked' = false ],
			[ 'field' => 'radio', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'radio', 		'checked' = false ],
			[ 'field' => 'datalist', 	'name' => '', 'value' => '', 'options' => [], 'type' => 'datalist' ],
			[ 'field' => 'textarea', 	'data' => '', 'value' => '', 'extra' => '', 'type' => 'textarea' ],
			[ 'field' => 'multiselect', 'name' => '', 'options' => [], 'selected' => [], 'extra' => '', 'type' => 'multiselect' ],
			[ 'field' => 'dropdown', 	'data' => '', 'options' => [], 'selected' => [], 'extra' => '', 'type' => 'dropdown' ],
			[ 'field' => 'fieldset', 	'legend_text' => '', 'attribs' => '', 'extra' => '', 'type' => 'fieldset' ],
			[ 'field' => 'upload', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'upload' ],
			[ 'field' => 'submit', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'submit' ],
			[ 'field' => 'reset', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'reset' ],
			[ 'field' => 'button', 		'data' => '', 'content' => '', 'extra' => '', 'type' => 'button' ],
		],
	];
*/

/*	Ejemplo para ver como cada llamada a una funcion del form_helper se convierte en un ARRAY 
	y cada "parametro" de la funcion pasa a ser una "clave" del array

			function form_label(string $label_text = '', string $id = '', array $attributes = []): string
			[ 'field' => 'label', 		'label_text' => '', 'id' => '', 'attribs' => '', 'type' => 'label' ],

			function form_input($data = '', string $value = '', $extra = '', string $type = 'text'): string
			[ 'field' => 'input', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'text' ],

			function form_password($data = '', string $value = '', $extra = ''): string
			[ 'field' => 'password', 	'data' => '', 'value' => '', 'extra' => '', 'type' => 'password' ],

			function form_checkbox($data = '', string $value = '', bool $checked = false, $extra = ''): string
			[ 'field' => 'checkbox', 	'data' => '', 'value' => '', 'extra' => '', 'type' => 'checkbox', 	'checked' = false ],

			function form_radio($data = '', string $value = '', bool $checked = false, $extra = ''): string
			[ 'field' => 'radio', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'radio', 		'checked' = false ],

			function form_datalist($name, $value, $options)
			[ 'field' => 'datalist', 	'name' => '', 'value' => '', 'options' => [], 'type' => 'datalist' ],

			function form_textarea($data = '', string $value = '', $extra = ''): string
			[ 'field' => 'textarea', 	'data' => '', 'value' => '', 'extra' => '', 'type' => 'textarea' ],

			function form_multiselect(string $name = '', array $options = [], array $selected = [], $extra = ''): string
			[ 'field' => 'multiselect', 'name' => '', 'options' => [], 'selected' => [], 'extra' => '', 'type' => 'multiselect' ],

			function form_dropdown($data = '', $options = [], $selected = [], $extra = ''): string
			[ 'field' => 'dropdown', 	'data' => '', 'options' => [], 'selected' => [], 'extra' => '', 'type' => 'dropdown' ],

			function form_fieldset(string $legend_text = '', array $attributes = []): string
			function form_fieldset_close(string $extra = ''): string
			[ 'field' => 'fieldset', 		'legend_text' => '', 'attribs' => '', 'extra' => '', 'type' => 'fieldset' ],

			function form_upload($data = '', string $value = '', $extra = ''): string
			[ 'field' => 'upload', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'upload' ],

			function form_submit($data = '', string $value = '', $extra = ''): string
			[ 'field' => 'submit', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'submit' ],

			function form_reset($data = '', string $value = '', $extra = ''): string
			[ 'field' => 'reset', 		'data' => '', 'value' => '', 'extra' => '', 'type' => 'reset' ],

			function form_button($data = '', string $content = '', $extra = ''): string
			[ 'field' => 'button', 		'data' => '', 'content' => '', 'extra' => '', 'type' => 'button' ],
*/

if (! function_exists('ascForm'))
{
	/**
	 * ascForm Declaration
	 *
	 * Crea el formulario completo desde <FORM> hasta </FORM>
	 *
	 * @return string
	 */
	function ascForm( $formData = [] ): string
	{
		$action     = $formData['form']['action'];		// string
		$attributes = $formData['form']['attribs'];		// array
		$hidden     = $formData['form']['hidden'];		// array
		$extra 		= $formData['form']['extra'];		// string
		$multipart 	= $formData['form']['multipart'];	// bool

		//
		// FORM open
		//
		if ( $multipart == true ) {
			$form = form_open_multipart(string $action = '', $attributes = [], array $hidden = []): string
//			function form_open_multipart(string $action = '', $attributes = [], array $hidden = []): string
//			function form_hidden($name, $value = '', bool $recursing = false): string
		} else {
			$form = form_open($action, $attributes, $hidden);
//			function form_open(string $action = '', $attributes = [], array $hidden = []): string
//			function form_hidden($name, $value = '', bool $recursing = false): string
		}

		
		// Este ARRAY permite generar un INPUT por cada linea del ARRAY['fields']
		foreach ( $formData['fields'] as $input ) {
			
			// Aqui inicializamos todas las variables que se usan en los parametros de las llamadas a las funciones
			// Por tanto, si una CLAVE no esta definida en el array, se enviara como "vacia", 
			// pero no habra error en la llamada a la funcion.
			$field       = $input['field'];
			$type        = '';
			$data        = '';
			$value       = '';
			$checked     = false;
			$selected    = [];
			$extra       = '';
			$name        = '';
			$options     = [];
			$label_text  = '';
			$id          = '';
			$attribs     = [];
			$legend_text = '';
			$content     = '';
			if (array_key_exists('type', $input)) {
				$type = $input['type'];
			}
			if (array_key_exists('data', $input)) {
				$data = $input['data'];
			}
			if (array_key_exists('value', $input)) {
				$value       = $input['value'];
			}
			if (array_key_exists('checked', $input)) {
				$checked     = $input['checked'];
			}
			if (array_key_exists('selected', $input)) {
				$selected    = $input['selected'];
			}
			if (array_key_exists('extra', $input)) {
				$extra       = $input['extra'];
			}
			if (array_key_exists('name', $input)) {
				$name        = $input['name'];
			}
			if (array_key_exists('options', $input)) {
				$options     = $input['options'];
			}
			if (array_key_exists('label_text', $input)) {
				$label_text  = $input['label_text'];
			}
			if (array_key_exists('id', $input)) {
				$id          = $input['id'];
			}
			if (array_key_exists('attribs', $input)) {
				$attribs     = $input['attribs'];
			}
			if (array_key_exists('legend_text', $input)) {
				$legend_text = $input['legend_text'];
			}
			if (array_key_exists('content', $input)) {
				$content     = $input['content'];
			}

			//
			// LABEL
			//
			if ( $input['field'] == 'label' ) {
				$form .= form_label($label_text, $id, $attribs);
//				function form_label(string $label_text = '', string $id = '', array $attributes = []): string
			}

			//
			// INPUT
			//
			if ( $input['field'] == 'input' ) {
				$form .= form_input($data, $value, $extra, $type);
//				function form_input($data = '', string $value = '', $extra = '', string $type = 'text'): string
			}

			//
			// PASSWORD
			//
			if ( $input['field'] == 'password' ) {
				$form .= form_password($data, $value, $extra);
//				function form_password($data = '', string $value = '', $extra = ''): string
			}

			//
			// CHECKBOX
			//
			if ( $input['field'] == 'checkbox' ) {
				$form .= form_checkbox($data, $value, $checked, $extra);
//				function form_checkbox($data = '', string $value = '', bool $checked = false, $extra = ''): string
			}
			
			//
			// RADIO
			//
			if ( $input['field'] == 'radio' ) {
				$form .= form_radio($data, $value, $checked, $extra);
//				function form_radio($data = '', string $value = '', bool $checked = false, $extra = ''): string
			}
			
			//
			// DATALIST
			//
			if ( $input['field'] == 'datalist' ) {
				$form .= form_datalist($name, $value, $options)
//				function form_datalist($name, $value, $options)
			}

			//
			// TEXTAREA
			//
			if ( $input['field'] == 'textarea' ) {
				$form .= form_textarea($data, $value, $extra);
//				function form_textarea($data = '', string $value = '', $extra = ''): string
			}

			//
			// DROPDOWN
			//
			if ( $input['field'] == 'dropdown' ) {
				$form .= form_dropdown($data, $options, $selected, $extra);
//				function form_dropdown($data = '', $options = [], $selected = [], $extra = ''): string
			}

			//
			// MULTISELECT
			//
			if ( $input['field'] == 'multiselect' ) {
				$form .= form_multiselect($name, $options, $selected, $extra);
//				function form_multiselect(string $name = '', array $options = [], array $selected = [], $extra = ''): string
			}

			//
			// FIELDSET
			//
			if ( $input['field'] == 'fieldset' ) {
				$form .= form_fieldset(string $legend_text = '', array $attributes = []): string
//				function form_fieldset(string $legend_text = '', array $attributes = []): string

				$form .= form_fieldset_close(string $extra = ''): string
//				function form_fieldset_close(string $extra = ''): string
			}

			//
			// UPLOAD
			//
			if ( $input['field'] == 'upload' ) {
				$form .= form_upload($data, $value, $extra);
//				function form_upload($data = '', string $value = '', $extra = ''): string
			}

			//
			// SUBMIT button
			//
			if ( $input['field'] == 'submit' ) {
				$form .= form_submit($data, $value, $extra);
//				function form_submit($data = '', string $value = '', $extra = ''): string
			}

			//
			// RESET button
			//
			if ( $input['field'] == 'reset' ) {
				$form .= form_reset($data, $value, $extra);
//				function form_reset($data = '', string $value = '', $extra = ''): string
			}

			//
			// BUTTON
			//
			if ( $input['field'] == 'button' ) {
				$form .= form_button($data, $content, $extra);
//				function form_button($data = '', string $content = '', $extra = ''): string
			}
			
			// Como añadir nuevas funciones:
			// Si el "form_helper" se actualiza con nuevas funciones, bastara con incluir aqui
			// un grupo de lineas como estas que se definen aqui, por ejemplo para "BUTTON"

			//
			// OTRO
			//
//			if ( $input['field'] == 'otro' ) {
				/*
				function set_value(string $field, string $default = '', bool $html_escape = true): string
				function set_select(string $field, string $value = '', bool $default = false): string
				function set_checkbox(string $field, string $value = '', bool $default = false): string
				function set_radio(string $field, string $value = '', bool $default = false): string
//				function parse_form_attributes($attributes, $default): string
				*/
//			}

		}
		
		//
		// FORM close
		//
		$form .= form_close($extra);
//		function form_close(string $extra = ''): string
		
		// GETTER
		return $form;
	}
}
