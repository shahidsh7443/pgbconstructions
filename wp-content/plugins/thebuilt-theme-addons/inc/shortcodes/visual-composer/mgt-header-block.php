<?php

// VC [header_block_wp]

vc_map(array(
   "name" 			=> "MGT Header Block",
   "category" 		=> 'TheBuilt Content',
   "description"	=> "Add heading block with header and subheader text",
   "base" 			=> "mgt_header_block_wp",
   "class" 			=> "",
   "icon" 			=> "vc_mgt_header_block",
   
   "params" 	=> array(
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Title",
			"param_name"	=> "title",
			"std"			=> "Header",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Subtitle",
			"param_name"	=> "subtitle",
			"std"			=> "",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Text align",
			"param_name"	=> "align",
			"value"			=> array(
				"Left"	=> "left",
				"Center"	=> "center",
				"Right"	=> "right"
			),
			"std"			=> "left",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Header font size",
			"param_name"	=> "header_font_size",
			"value"			=> array(
				"H1"	=> "h1",
				"H2"	=> "h2",
				"H3"	=> "h3",
				"H4"	=> "h4",
				"H5"	=> "h5",
				"H6"	=> "h6",
			),
			"description"	=> "",
			"std"			=> "h2",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Show line below header block",
			"param_name"	=> "line",
			"value"			=> array(
				"Yes"	=> "1",
				"No"	=> "0"
			),
			"description"	=> "",
			"std"			=> "1",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Style",
			"param_name"	=> "style",
			"value"			=> array(
				"Title + subtitle / Bold"	=> "1",
				"Subtitle + title / Regular"	=> "2"
			),
			"description"	=> "",
			"std"			=> "1",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Text tranform",
			"param_name"	=> "texttransform",
			"value"			=> array(
				"Header upprecase"	=> "header",
				"Subheader uppercase"	=> "subheader",
				"Both uppercase"	=> "both",
				"None"	=> "none"
			),
			"description"	=> "",
			"std"			=> "header",
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
			"heading"		=> "CSS Animation",
			"description"	=> "Select type of animation for element to be animated when it 'enters' the browsers viewport (Note: works only in modern browsers).",
			"param_name"	=> "css_animation",
			"value"			=> array(
				"No"	=> "",
				"Top to bottom"	=> "top-to-bottom",
				"Bottom to top"	=> "bottom-to-top",
				"Left to right"	=> "left-to-right",
				"Right to left"	=> "right-to-left",
				"Appear"	=> "appear",
			),
			"std"			=> "",
		),
		array(
		    'type' => 'css_editor',
		    'heading' => 'Css',
		    'param_name' => 'css',
		    'group' => 'Content Design options',
		),
   )
   
));