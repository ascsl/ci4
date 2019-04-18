<?php

/**
 * A.S.C.
 * 
 * @package    CodeIgniter 4.0.0.beta-2
 * @author     A.S.C.
 * 
 * Este helper NO requiere la carga del "form_helper" para su ejecucion
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
			[ 'field' => 'fieldset', 	'tag' => 'open', 'disabled' => false ],
				[ 'field' => 'label', 
				  'label_text' => '', 
				  'id' => '', 'attribs' => '', 'type' => 'label' ],
				[ 'field' => 'input', 		'label_text' => '', 'id' => '', 'value' => '', 'type' => 'text' ],
				[ 'field' => 'email', 		'label_text' => '', 'id' => '', 'value' => '', 'small_id' => '', 'small_text' => '', 'type' => 'email' ],
				[ 'field' => 'password', 	'label_text' => '', 'id' => '', 'value' => '', 'type' => 'password', 'placeholder' => '' ],
			[ 'field' => 'fieldset', 	'tag' => 'close' ],
			[ 'field' => 'checkbox', 	'label_text' => '', 'id' => '', 'data' => '', 'value' => '', 'type' => 'checkbox', 	'checked' = false ],
			[ 'field' => 'radio', 		'value' => '', 'type' => 'radio', 'options' => [], 'checked' = false, 'inline' = false, 'disabled' = false ],
			[ 'field' => 'datalist', 	'name' => '', 'value' => '', 'options' => [], 'type' => 'datalist' ],
			[ 'field' => 'textarea', 	'value' => '', 'rows' => '3', 'type' => 'textarea' ],
			[ 'field' => 'combobox',	'name' => '', 'options' => [], 'selected' => [], 'type' => 'multiselect' ],
			[ 'field' => 'multiselect', 'name' => '', 'options' => [], 'selected' => [], 'type' => 'multiselect' ],
			[ 'field' => 'dropdown', 	'options' => [], 'selected' => [], 'type' => 'dropdown' ],
//			[ 'field' => 'fieldset', 	'legend' => '', 'attribs' => '', 'type' => 'fieldset' ],
			[ 'field' => 'upload', 		'value' => '',   'type' => 'upload' ],
			[ 'field' => 'submit', 		'value' => '',   'type' => 'submit' ],
			[ 'field' => 'reset', 		'value' => '',   'type' => 'reset' ],
			[ 'field' => 'button', 		'content' => '', 'type' => 'button' ],

			[ 'field' => 'fieldset', 	'tag' => 'open', 'disabled' => false, 'legend' => 'titulo' ],
			[ 'field' => 'fieldset', 	'tag' => 'close' ],
			[ 'field' => 'layout', 		'tag' => 'open',  'class' => '' ],
			[ 'field' => 'layout', 		'tag' => 'close' ],
		],
	];
*/

if (! function_exists('bsLabel'))
{
	function bsLabel( $labelText='', $labelFor='' ): string
	{
		$bsLabel  = '<label';
		if ( strlen($labelFor)>0 ) {
			$bsLabel .= ' for="'.$labelFor.'"';
		}
		$bsLabel .= '>';
		$bsLabel .= $labelText;
		$bsLabel .= '</label>';
		
		return $bsLabel;
	}
}

if (! function_exists('bsForm'))
{
	/**
	 * ascForm Declaration
	 *
	 * Crea el formulario completo desde <FORM> hasta </FORM>
	 *
	 * @return string
	 */
	function bsForm( $formData = [] ): string
	{
		$method     = $formData['form']['method'];		// string
		$action     = $formData['form']['action'];		// string
		$attributes = $formData['form']['attribs'];		// array
		$hidden     = $formData['form']['hidden'];		// array
		$extra 		= $formData['form']['extra'];		// string
		$multipart 	= $formData['form']['multipart'];	// bool

		//
		// FORM open
		//
		$bsHtml  = '<form';
		$bsHtml .= ' method="'.$method.'" action="'.$action.'"';
		/*
		if ( $multipart == true ) {
			$bsHtml = form_open_multipart(string $action = '', $attributes = [], array $hidden = []): string
		} else {
			$bsHtml = form_open($action, $attributes, $hidden);
		}
		*/
		$bsHtml .= '>';

		
		// Este ARRAY permite generar un INPUT por cada linea del ARRAY['fields']
		foreach ( $formData['fields'] as $input ) {
			
			// Aqui inicializamos todas las variables que se usan en los parametros de las llamadas a las funciones
			// Por tanto, si una CLAVE no esta definida en el array, se enviara como "vacia", 
			// pero no habra error en la llamada a la funcion.
			/*
			$field       = $input['field'];
			$type        = '';
			$data        = '';
			$value       = '';
			$checked     = false;
			$selected    = [];
			$extra       = '';
			$name        = '';
			$options     = [];			// $options = [ 'valor1', 'valor2', 'valor3', 'valorN' ]
			$label_text  = '';
			$id          = '';
			$attribs     = [];
			$legend_text = '';
			$content     = '';
			$small_text  = '';
			$placeholder = '';
			$disabled    = false;		// disabled = true ----> 'disabled'
			$inline      = false;		// inline = true ----> 'check-inline'
			
			if (array_key_exists('type', $input)) {
				$type = $input['type'];
			}
			if (array_key_exists('data', $input)) {
				$data = $input['data'];
			}
			if (array_key_exists('value', $input)) {
				$value = $input['value'];
			}
			if (array_key_exists('checked', $input)) {
				$checked = $input['checked'];
			}
			if (array_key_exists('selected', $input)) {
				$selected = $input['selected'];
			}
			if (array_key_exists('extra', $input)) {
				$extra = $input['extra'];
			}
			if (array_key_exists('name', $input)) {
				$name = $input['name'];
			}
			if (array_key_exists('options', $input)) {
				$options = $input['options'];
			}
			if (array_key_exists('label_text', $input)) {
				$label_text = $input['label_text'];
			}
			if (array_key_exists('id', $input)) {
				$id = $input['id'];
			}
			if (array_key_exists('attribs', $input)) {
				$attribs = $input['attribs'];
			}
			if (array_key_exists('legend_text', $input)) {
				$legend_text = $input['legend_text'];
			}
			if (array_key_exists('content', $input)) {
				$content = $input['content'];
			}
			if (array_key_exists('small_text', $input)) {
				$id = $input['small_text'];
			}
			if (array_key_exists('placeholder', $input)) {
				$content = $input['placeholder'];
			}
			*/

			// Codigo anterior expresado con Operadores Ternarios:
			$tag         = (array_key_exists('tag',         $input)) ? $input['tag'] : '';
			$class       = (array_key_exists('class',       $input)) ? $input['class'] : '';
			$type		 = (array_key_exists('type',        $input)) ? $input['type'] : '';
//			$data        = (array_key_exists('data',        $input)) ? $input['data'] : '';
			$value       = (array_key_exists('value',       $input)) ? $input['value'] : '';
			$checked     = (array_key_exists('checked',     $input)) ? $input['checked'] : false;
			$selected    = [];
//			$extra       = (array_key_exists('extra',       $input)) ? $input['extra'] : '';
			$name        = (array_key_exists('name',        $input)) ? $input['name'] : '';
			$options     = [];			// $options = [ 'valor1', 'valor2', 'valor3', 'valorN' ]
			$id          = (array_key_exists('id',          $input)) ? $input['id'] : '';
			$label_for   = $id;
			$label_text  = (array_key_exists('label_text',  $input)) ? $input['label_text'] : '';
			$attribs     = [];			// $attribs = [ 'atr1' => 'valor1', 'atr2' => 'valor2', 'atrN' => 'valorN' ]
			$legend      = (array_key_exists('legend',      $input)) ? $input['legend'] : '';
//			$legend_text = (array_key_exists('legend_text', $input)) ? $input['legend_text'] : '';
//			$content     = (array_key_exists('content',     $input)) ? $input['content'] : '';
			$small_id    = (array_key_exists('small_id',    $input)) ? $input['small_id'] : '';
			$small_text  = (array_key_exists('small_text',  $input)) ? $input['small_text'] : '';
			$placeholder = (array_key_exists('placeholder', $input)) ? $input['placeholder'] : '';
			$required    = (array_key_exists('required',    $input)) ? $input['required'] : false;
			$disabled    = (array_key_exists('disabled',    $input)) ? $input['disabled'] : false;
			$inline      = (array_key_exists('inline',      $input)) ? $input['inline'] : false;
			$readonly    = (array_key_exists('readonly',    $input)) ? $input['readonly'] : false;
			$rows        = (array_key_exists('rows',        $input)) ? $input['rows'] : '';
			// disabled = true ----> 'disabled'
			
			//
			// FIELDSET open , close
			//
			if ( $input['field'] == 'fieldset' ) {
				$bsHtml .= ($tag == 'open')  ? '<fieldset'  : '';
					$bsHtml .= ($disabled)  ? ' disabled>'  : '>';
					if ( $tag == 'open' && strlen($legend)>0 ) {
						$bsHtml .= '<legend>'.$legend.'</legend>';
					}
				$bsHtml .= ($tag == 'close') ? '</fieldset>' : '';
			}

			//
			// LAYOUT open , close
			//
			// class="form-row"
			//
			if ( $input['field'] == 'layout' ) {
				$bsHtml .= ($tag == 'open')  ? '<div class="'.$class.'">'  : '>';
				$bsHtml .= ($tag == 'close') ? '</div>' : '';
			}

			//
			// LABEL
			//
			if ( $input['field'] == 'label' ) {
				$bsHtml .= '<label>'.$label_text.'</label>';
			}

			//
			// INPUT
			//
			if ( $input['field'] == 'input' ) {
			}

			//
			// EMAIL
			//
			if ( $input['field'] == 'email' ) {
				$bsHtml .= '<div class="form-group">';
				//$bsHtml .= '<label for="'.$label_for.'">'.$label_text.'</label>';
				$bsHtml .= bsLabel( $label_text, $label_for );
				$bsHtml .= '<input type="email" class="form-control"';
					$bsHtml .= ' id="'.$id.'" aria-describedby="'.$small_id.'"';
					$bsHtml .= ( strlen($placeholder)>0 ) ? ' placeholder="'.$placeholder.'"' : '';
					$bsHtml .= ($disabled) ? ' disabled' : '';
					$bsHtml .= ($readonly) ? ' readonly' : '';
					$bsHtml .= '>';
				if ( strlen($small_text)>0 ) {
					$bsHtml .= '<small class="form-text text-muted"';
					$bsHtml .= ' id="'.$small_id.'">'.$small_text.'';
					$bsHtml .= '</small>';
				}
				$bsHtml .= '</div>';
			}

			//
			// PASSWORD
			//
			if ( $input['field'] == 'password' ) {
				$bsHtml .= '<div class="form-group">';
				//$bsHtml .= '<label for="'.$label_for.'">'.$label_text.'</label>';
				$bsHtml .= bsLabel( $label_text, $label_for );
				$bsHtml .= '<input type="password" class="form-control"';
					$bsHtml .= ' id="'.$id.'" placeholder="'.$placeholder.'"';
					$bsHtml .= ($disabled) ? ' disabled' : '';
					$bsHtml .= '>';
				if ( strlen($small_text)>0 ) {
					$bsHtml .= '<small class="form-text text-muted"';
					$bsHtml .= ' id="'.$small_id.'">'.$small_text.'';
					$bsHtml .= '</small>';
				}
				$bsHtml .= '</div>';
			}

			//
			// CHECKBOX
			//
			if ( $input['field'] == 'checkbox' ) {
				$bsHtml .= '<div class="form-check">';
				$bsHtml .= '<input type="checkbox" class="form-check-input"';
					$bsHtml .= ' value="'.$value.'" id="'.$id.'"';
					$bsHtml .= ($disabled) ? ' disabled' : '';
					$bsHtml .= '>';
				//if ( $disabled == true ) {
				//	$bsHtml .= ' disabled';
				//}
				//$bsHtml .= '>';
				$bsHtml .= '<label class="form-check-label"';
					$bsHtml .= ' for="'.$label_for.'">'.$label_text.'';
					$bsHtml .= '</label>';
				$bsHtml .= '</div>';
			}
			
			//
			// RADIO
			//
			// $options = [ [ 'id' => '', 'value' => '', 'label' => '', 'checked' => false, 'disabled' => false ], [], [] ]
			//
			if ( $input['field'] == 'radio' ) {
				foreach ( $options as $option ) {
					$bsHtml .= '<div class="form-check';
						$bsHtml .= ($inline) ? ' form-check-inline' : '';
						$bsHtml .= ($disabled) ? ' disabled' : '';
						$bsHtml .= '">';
					$bsHtml .= '<input class="form-check-input" type="radio"';
						$bsHtml .= ' name="'.$name.'" id="'.$option['id'].'" value="'.$option['value'].'"';
						$bsHtml .= ($option['checked']) ? ' checked' : '';
						$bsHtml .= ($option['disabled']) ? ' disabled' : '';
						$bsHtml .= '>';
					$bsHtml .= '<label class="form-check-label"';
						$bsHtml .= ' for="'.$option['id'].'">'.$option['label'].'';
						$bsHtml .= '</label>';
					$bsHtml .= '</div>';
				}
			}
			
			//
			// TEXTAREA
			//
			if ( $input['field'] == 'textarea' ) {
				$bsHtml .= '<div class="form-group">';
				//$bsHtml .= '<label for="'.$label_for.'">'.$label_text.'</label>';
				$bsHtml .= bsLabel( $label_text, $label_for );
				$bsHtml .= '<textarea class="form-control" id="'.$id.'" rows="'.$rows.'">';
					$bsHtml .= '</textarea>';
				if ( strlen($small_text)>0 ) {
					$bsHtml .= '<small class="form-text text-muted" id="'.$small_id.'">'.$small_text.'';
					$bsHtml .= '</small>';
				}
				$bsHtml .= '</div>';
			}

			//
			// DROPDOWN
			//
			if ( $input['field'] == 'dropdown' ) {
			}

			//
			// DATALIST
			//
			if ( $input['field'] == 'datalist' ) {
			}

			//
			// COMBOBOX
			//
			// $options = [ 'valor1', 'valor2', 'valor3', 'valorN' ]
			//
			if ( $input['field'] == 'combobox' ) {
				$bsHtml .= '<div class="form-group">';
				//$bsHtml .= '<label for="'.$label_for.'">'.$label_text.'</label>';
				$bsHtml .= bsLabel( $label_text, $label_for );
				$bsHtml .= '<select class="form-control" id="'.$id.'">';
				foreach ( $options as $k => $v ) {
					$bsHtml .= '<option>'.$v.'</option>';
				}
				$bsHtml .= '</select>';
				$bsHtml .= '</div>';
			}
			
			//
			// MULTISELECT
			//
			// $options = [ 'valor1', 'valor2', 'valor3', 'valorN' ]
			//
			if ( $input['field'] == 'multiselect' ) {
				$bsHtml .= '<div class="form-group">';
				//$bsHtml .= '<label for="'.$label_for.'">'.$label_text.'</label>';
				$bsHtml .= bsLabel( $label_text, $label_for );
				$bsHtml .= '<select multiple class="form-control" id="'.$id.'">';
					foreach ( $options as $k => $v ) {
						$bsHtml .= '<option>'.$v.'</option>';
					}
				$bsHtml .= '</select>';
				$bsHtml .= '</div>';
			}

			//
			// UPLOAD : FILE
			//
			if ( $input['field'] == 'upload' ) {
				$bsHtml .= '<div class="custom-file">';
				$bsHtml .= '<input type="file" class="custom-file-input" id="'.$id.'"';
					$bsHtml .= ($option['required']) ? ' required>' : '>';
				$bsHtml .= '<label class="custom-file-label" for="'.$label_for.'">'.$label_text.'</label>';
				$bsHtml .= '<div class="invalid-feedback">Example invalid custom file feedback</div>';
				$bsHtml .= '</div>';
			}

			//
			// SUBMIT button
			//
			if ( $input['field'] == 'submit' ) {
				$bsHtml .= '<button type="submit" class="btn btn-primary">Submit</button>';
			}

			//
			// RESET button
			//
			if ( $input['field'] == 'reset' ) {
			}

			//
			// BUTTON
			//
			if ( $input['field'] == 'button' ) {
			}

			// Como añadir nuevas funciones:
			// Copiar cualquiera de las etiquetas, ejemplo SUBMIT, y sustituir el HTML
			//
			// OTRO
			//
//			if ( $input['field'] == 'otro' ) {
//				$bsHtml .= '<button type="submit" class="btn btn-primary">Submit</button>';
//			}

		}
		
		//
		// FORM close
		//
		$bsHtml .= '</form>';
		
		// GETTER
		return $bsHtml;
	}
}
