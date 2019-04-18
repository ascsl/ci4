<?php

/**
 * A.S.C.
 * 
 * @package    CodeIgniter 4.0.0.beta-2
 * @author     A.S.C.
 * 
 * Este helper NO requiere la carga del "form_helper" para su ejecucion
 */

/*
	$adminData = [
		// CALENDAR
		'object'  => [ 'type' => 'calendar', 'id' => 'calendar', 'title' => '' ], 
		'options' => [],
	];
*/
/*
	$adminData = [
		// MENU de la izquierda
		'object'  => [ 'type' => 'menu', 'id' => 'menu', 'title' => '' ], 
		'options' => [
			[ 
				'icon'  => 'fa-dashboard', 
				'name'  => 'Dashboard',
				'href'  => '#', 
				'items' => []
			],
			[ 
				'icon'  => 'fa-files-o', 
				'name'  => 'Layouts',
				'href'  => '#', 
				'items' => [
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/layout/top-nav.html', 			'name' => ' Top Navigation' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/layout/boxed.html', 			'name' => ' Boxed' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/layout/fixed.html', 			'name' => ' Fixed' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/layout/collapsed-sidebar.html', 'name' => ' Collapsed Sidebar' ],
				]
			],
			[ 
				'icon'  => 'fa-th', 
				'name'  => 'Widgets',
				'href'  => 'pages/widgets.html', 
				'items' => []
			],
			[ 
				'icon'  => 'fa-pie-chart', 
				'name'  => 'Charts',
				'href'  => '#', 
				'items'  => [
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/charts/chartjs.html', 	'name' => ' ChartJS' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/charts/morris.html', 	'name' => ' Morris' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/charts/flot.html', 		'name' => ' Flot' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/charts/inline.html', 	'name' => ' Inline charts' ],
				]
			],
			[ 
				'icon'  => 'fa-laptop', 
				'name'  => 'UI elementes',
				'href'  => '#', 
				'items' => []
			],
			[ 
				'icon'  => 'fa-edit', 
				'name'  => 'Forms',
				'href'  => '#', 
				'items' => [
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/forms/general.html', 	'name' => ' General Elements' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/forms/advanced.html', 	'name' => ' Advanced Elements' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/forms/editors.html', 	'name' => ' Editors' ],
				]
			],
			[ 
				'icon'  => 'fa-table', 
				'name'  => 'Tables',
				'href'  => '#', 
				'items' => [
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/tables/simple.html', 	'name' => ' Simple tables' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/tables/data.html', 		'name' => ' Data tables' ],
				]
			],
			[ 
				'icon'  => 'fa-calendar', 
				'name'  => 'Calendar',
				'href'  => 'pages/calendar.html', 
				'items' => []
			],
			[ 
				'icon'  => 'fa-envelope', 
				'name'  => 'Mailbox',
				'href'  => 'pages/mailbox/mailbox.html', 
				'items' => []
			],
			[ 
				'icon'  => 'fa-folder', 
				'name'  => 'Examples',
				'href'  => '#', 
				'items' => [
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/invoice.html', 	'name' => ' Invoice' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/profile.html', 	'name' => ' Profile' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/login.html', 		'name' => ' Login' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/register.html', 	'name' => ' Register' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/lockscreen.html', 	'name' => ' Lockscreen' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/404.html', 		'name' => ' 404 Error' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/500.html', 		'name' => ' 500 Error' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/blank.html', 		'name' => ' Blank Page' ],
					[ 'icon' => 'fa-circle-o', 'href' => 'pages/examples/pace.html', 		'name' => ' Pace Page' ],
				]
			],
			[ 
				'icon'  => 'fa-share', 
				'name'  => 'Multilevel',
				'href'  => '#', 
				'items' => [
					[ 'icon' => 'fa-circle-o', 'href' => '#', 'name' => ' Level One' ],
				]
			],
		], 
	];
*/
if (! function_exists('adminLTE'))
{
	/**
	 * adminLTE Declaration
	 *
	 * Crea un objeto en HTML para insertarlo en AdminLTE
	 *
	 * @return string
	 */
	function adminLTE( $adminData = [] ): string
	{
		$objeto  = $adminData['object']['type'];
		$id      = $adminData['object']['id'];
		$options = $adminData['object']['options'];

		//
		// DIV open
		//
		$admHtml  = '';

		// Este ARRAY permite generar un INPUT por cada linea del ARRAY['fields']
//		foreach ( $adminData['fields'] as $input ) {
			
			//
			// Aqui inicializamos todas las claves que se usan en el ARRAY
			//
//			$tag         = (array_key_exists('tag',         $input)) ? $input['tag'] : '';
//			$value       = (array_key_exists('value',       $input)) ? $input['value'] : '';
//			$checked     = (array_key_exists('checked',     $input)) ? $input['checked'] : false;

			//
			// MENU de la izquierda
			//
			if ( $objeto == 'menu' ) {
				$admHtml .= '';
				$admHtml .= '
					<!-- Left side column. contains the logo and sidebar -->
					<aside class="main-sidebar">
					<!-- sidebar: style can be found in sidebar.less -->
					<section class="sidebar">
					  <!-- Sidebar user panel -->
					  <div class="user-panel">
						<div class="pull-left image">
						  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
						  <p>Alexander Pierce</p>
						  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					  </div>
				';
				$admHtml .= '';
				
				// SEARCH form
				$admHtml .= '
					  <!-- search form -->
					  <form action="#" method="get" class="sidebar-form">
						<div class="input-group">
						  <input type="text" name="q" class="form-control" placeholder="Search...">
						  <span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat">
								  <i class="fa fa-search"></i>
								</button>
							  </span>
						</div>
					  </form><!-- /.search form -->
				';
				
				// MENU de la izquierda
				$admHtml .= '
					  <!-- sidebar menu: : style can be found in sidebar.less -->
					  <ul class="sidebar-menu" data-widget="tree">
						<li class="header">MAIN NAVIGATION</li>
				';
				foreach ( $options as $option ) {
//					$active = false;
//					$name   = '';
					$active   = (array_key_exists('active',   $option)) ? $option['active'] : false;
					$treeview = (array_key_exists('treeview', $option)) ? $option['treeview'] : false;
					$name     = (array_key_exists('name',   $option)) ? $option['name'] : '';
					$icon     = (array_key_exists('icon',   $option)) ? $option['icon'] : '';
					$href     = (array_key_exists('href',   $option)) ? $option['href'] : '#';
					$items    = (array_key_exists('items',   $option)) ? $option['items'] : [];
					
					// <li class="active treeview menu-open">
					$admHtml .= '<li class="';
//						$admHtml .= 'active';
						$admHtml .= ' treeview';
//						$admHtml .= ' menu-open';
						$admHtml .= '">';

					//		  <a href="#">
					//		  <a href="pages/widgets.html">
					//		  <a href="pages/calendar.html">
					//		  <a href="pages/mailbox/mailbox.html">
					$admHtml .= '<a href="'.$href.'">';
						//			<i class="fa '.$icon.' fa-dashboard"></i>
						//			<i class="fa '.$icon.' fa-files-o"></i>
						//			<i class="fa '.$icon.' fa-th"></i>
						//			<i class="fa '.$icon.' fa-pie-chart"></i>
						//			<i class="fa '.$icon.' fa-laptop"></i>
						//			<i class="fa '.$icon.' fa-edit"></i>
						//			<i class="fa '.$icon.' fa-table"></i>
						//			<i class="fa '.$icon.' fa-calendar"></i>
						//			<i class="fa '.$icon.' fa-envelope"></i>
						//			<i class="fa '.$icon.' fa-folder"></i>
						//			<i class="fa '.$icon.' fa-share"></i>
						$admHtml .= '<i class="fa '.$icon.'"></i>';
						//			<span>'.$name.' - Dashboard</span>
						//			<span>'.$name.' - Layouts</span>
						//			<span>'.$name.' - Widgets</span>
						//			<span>'.$name.' - Charts</span>
						//			<span>'.$name.' - UI Elements</span>
						//			<span>'.$name.' - Forms</span>
						//			<span>'.$name.' - Tables</span>
						//			<span>'.$name.' - Calendar</span>
						//			<span>'.$name.' - Mailbox</span>
						//			<span>'.$name.' - Examples</span>
						//			<span>'.$name.' - Multilevel</span>
						$admHtml .= '<span>'.$name.'</span>';
						//			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						//			<span class="pull-right-container"><span class="label label-primary pull-right">4</span></span>
						//			<span class="pull-right-container"><small class="label pull-right bg-green">new</small></span>
						$admHtml .= '<span class="pull-right-container">';
							$admHtml .= '<i class="fa fa-angle-left pull-right"></i>';
							//		  <small class="label pull-right bg-yellow">12</small>
							//		  <small class="label pull-right bg-green">16</small>
							//		  <small class="label pull-right bg-red">5</small>
							//		  <small class="label pull-right bg-blue">17</small>
						$admHtml .= '</span>';
						$admHtml .= '';
					$admHtml .= '</a>';

					$admHtml .= '<ul class="treeview-menu">';
					foreach ( $items as $line ) {
						$itemActive = (array_key_exists('active', $line)) ? $line['active'] : false;
						$itemIcon   = (array_key_exists('icon',   $line)) ? $line['icon'] : 'fa-circle-o';
						$itemHref   = (array_key_exists('href',   $line)) ? $line['href'] : '#';
						$itemName   = (array_key_exists('name',   $line)) ? $line['name'] : '';

						//
						// Dashboard
						//$admHtml .= '<li><a href="'.$href.'index.html"><i class="fa fa-circle-o"></i>'.$name.' - Dashboard v1</a></li>';
						//$admHtml .= '<li class="active"><a href="'.$href.'index2.html"><i class="fa fa-circle-o"></i>'.$name.' - Dashboard v2</a></li>';
						$admHtml .= '<li><a href="'.$itemHref.'"><i class="fa '.$itemIcon.'"></i>'.$itemName.'</a></li>';
						/*
							Layouts
								<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
								<li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
								<li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
								<li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
						
							Charts
								<li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
								<li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
								<li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
								<li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
						
							UI
								<li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
								<li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
								<li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
								<li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
								<li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
								<li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
						
							Forms
								<li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
								<li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
								<li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
						
							Tables
								<li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
								<li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
						
							Examples
								<li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
								<li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
								<li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
								<li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
								<li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
								<li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
								<li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
								<li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
								<li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
						
							Multilevel
								<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
								<li class="treeview">
								  <a href="#"><i class="fa fa-circle-o"></i> Level One
									<span class="pull-right-container">
									  <i class="fa fa-angle-left pull-right"></i>
									</span>
								  </a>
								  <ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
									<li class="treeview">
									  <a href="#"><i class="fa fa-circle-o"></i> Level Two
										<span class="pull-right-container">
										  <i class="fa fa-angle-left pull-right"></i>
										</span>
									  </a>
									  <ul class="treeview-menu">
										<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
										<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
									  </ul>
									</li>
								  </ul>
								</li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
						*/
					}
					$admHtml .= '</ul>';
					$admHtml .= '</li>';
				}
				$admHtml .= '
						<li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
						<li class="header">LABELS</li>
						<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
						<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
						<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
					  </ul>
					
					</section>
					</aside><!-- /.sidebar -->
				';
			}			
			
			//
			// CALENDAR
			//
			if ( $objeto == 'calendar' ) {
//				$admHtml .= '<label>'.$label_text.'</label>';
				$admHtml .= '';
				$admHtml .= '
				';
				$admHtml .= '
				<!-- Main content -->
				<section class="content">
				  <div class="row">
					<div class="col-md-3">
				';
				$admHtml .= '
					  <div class="box box-solid">
						<div class="box-header with-border">
						  <h4 class="box-title">Draggable Events</h4>
						</div>
						<div class="box-body">
						  <!-- the events -->
						  <div id="external-events">
							<div class="external-event bg-green">Lunch</div>
							<div class="external-event bg-yellow">Go home</div>
							<div class="external-event bg-aqua">Do homework</div>
							<div class="external-event bg-light-blue">Work on UI design</div>
							<div class="external-event bg-red">Sleep tight</div>
							<div class="checkbox">
							  <label for="drop-remove">
								<input type="checkbox" id="drop-remove">
								remove after drop
							  </label>
							</div>
						  </div>
						</div><!-- /.box-body -->
					  </div><!-- /. box -->
				';
				$admHtml .= '
					  <div class="box box-solid">
						<div class="box-header with-border">
						  <h3 class="box-title">Create Event</h3>
						</div>
						<div class="box-body">
						  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
							<!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
							<ul class="fc-color-picker" id="color-chooser">
							  <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
							  <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
							</ul>
						  </div><!-- /btn-group -->
				';
				$admHtml .= '
						  <div class="input-group">
							<input id="new-event" type="text" class="form-control" placeholder="Event Title">
							<div class="input-group-btn">
							  <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
							</div><!-- /btn-group -->
						  </div><!-- /input-group -->
				';
				$admHtml .= '
						</div>
					  </div>
					</div><!-- /.col -->
				';
				// ----------------- CALENDARIO --------------------
				$admHtml .= '
					<div class="col-md-9">
					  <div class="box box-primary">
						<div class="box-body no-padding">
						  <!-- THE CALENDAR -->
						  <div id="'.$id.'"></div><!-- id="calendar" -->
						</div><!-- /.box-body -->
					  </div><!-- /. box -->
					</div><!-- /.col -->
				';
				$admHtml .= '
				  </div><!-- /.row -->
				</section><!-- /.content -->
				';
			}

//		}
		
		// GETTER
		return $admHtml;
	}
}
