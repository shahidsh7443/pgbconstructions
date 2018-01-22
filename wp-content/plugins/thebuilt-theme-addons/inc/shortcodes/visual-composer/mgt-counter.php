<?php

// VC [counter_wp]

vc_map(array(
   "name" 			=> "MGT Counter",
   "category" 		=> 'TheBuilt Content',
   "description"	=> "Animated counter with title",
   "base" 			=> "mgt_counter_wp",
   "class" 			=> "",
   "icon" 			=> "vc_mgt_counter",
   
   "params" 	=> array(

		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Counter start value",
			"description"	=> "Integer. Usualy leave 0.",
			"param_name"	=> "counter_value_from",
			"std"			=> "0",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Counter end value",
			"description"	=> "Integer. Counter will count to this value.",
			"param_name"	=> "counter_value_to",
			"std"			=> "100",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Counter title (Optional)",
			"description"	=> "Title will be displayed below counter.",
			"param_name"	=> "counter_title",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Counter animation duration (msec)",
			"description"	=> "How long it should take to count between the target numbers. 1000 = 1 second.",
			"param_name"	=> "speed",
			"std"			=> "2000",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Text color",
			"param_name"	=> "color",
			"value"			=> array(
				"Black"	=> "black",
				"White"	=> "white"
			),
			"description"	=> "",
			"std"			=> "black",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Text color",
			"param_name"	=> "align",
			"value"			=> array(
				"Left"	=> "left",
				"Center"	=> "center"
			),
			"description"	=> "",
			"std"			=> "left",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Icon name",
			"description"	=> "If you want to add icon to button you can input Font Awesome icon name here, for example <em>angle-left</em>. <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>Check all available icons names</a>.",
			"param_name"	=> "icon",
			"std"			=> "",
		)
		
   )
   
));