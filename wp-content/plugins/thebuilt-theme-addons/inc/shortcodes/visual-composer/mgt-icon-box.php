<?php

// VC [icon_box_wp]

vc_map(array(
   "name" 			=> "MGT Icon Box",
   "category" 		=> 'TheBuilt Content',
   "description"	=> "Block with title, subtitle, content and icon image",
   "base" 			=> "mgt_icon_box_wp",
   "class" 			=> "",
   "icon" 			=> "vc_mgt_icon_box",
   
   "params" 	=> array(
   		array(
			"type"			=> "attach_image",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Icon image",
			"description"	=> "Image will be scaled to 70x70px (upload 140x140px image for retina support)",
			"param_name"	=> "icon_image_id",
			"description"   => "Use if your want to upload your own icon image here. Leave empty if you want to use FontAwesome icon.",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Font Awesome Icon name",
			"description"	=> "You can input Font Awesome icon name here, for example <em>angle-left</em>. <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>Check all available icons names</a>.",
			"param_name"	=> "icon_font",
			"std"			=> "",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Add background for icon",
			"param_name"	=> "icon_background",
			"value"			=> array(
				"Yes"	=> "1",
				"No"	=> "0"
			),
			"description"	=> "",
			"std"			=> "0",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Background color",
			"param_name"	=> "icon_background_color",
			"value"			=> array(
				"Normal"	=> "normal",
				"Invert"	=> "invert"
			),
			"dependency"	=> array(
				"element"	=> "icon_background",
				"value"		=> Array("1"),
			),
			"description"	=> "Change background colors for idle and hover",
			"std"			=> "normal",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Animate icon on hover",
			"param_name"	=> "animateicon",
			"value"			=> array(
				"Yes"	=> "1",
				"No"	=> "0"
			),
			"description"	=> "",
			"std"			=> "0",
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
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Title",
			"param_name"	=> "title",
			"std"			=> "",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Title/Subtitle position",
			"param_name"	=> "title_position",
			"value"			=> array(
				"Below icon (Top)"	=> "top",
				"In content (Right)"	=> "right",
				"Below icon with text (align all centered)"	=> "centered",
				"Below icon with text (align all left)"	=> "left"
			),
			"description"	=> "Change icon box layout",
			"std"			=> "top",
		),
		array(
			"type"			=> "textarea_html",
			"holder"		=> "div",
			"class" 		=> "mgt-promo-block-content-html",
			"admin_label" 	=> false,
			"heading"		=> "Box content",
			"param_name"	=> "content",
			"std"			=> 'Sample text',
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