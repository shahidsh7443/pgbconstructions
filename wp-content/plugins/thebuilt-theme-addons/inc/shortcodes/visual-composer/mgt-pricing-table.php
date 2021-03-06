<?php

// VC [pricing_table_wp]

vc_map(array(
   "name" 			=> "MGT Pricing Table",
   "category" 		=> 'TheBuilt Content',
   "description"	=> "Pricing table with different options",
   "base" 			=> "mgt_pricing_table_wp",
   "class" 			=> "",
   "icon" 			=> "vc_mgt_pricing_table",
   
   "params" 	=> array(
   		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Pricing Table Style",
			"param_name"	=> "layout_style",
			"value"			=> array(
				"Lite"	=> "style-light",
				"Dark"	=> "style-dark"
			),
			"description"	=> "Change pricing table colors. You can override colors for specific elements in \"Colors\" tab. and override formatting in \"Format\" tab.",
			"std"			=> "style-light",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Pricing Table Hover animation",
			"param_name"	=> "hover_animation",
			"value"			=> array(
				"None"	=> "animation-none",
				"Zoom"	=> "animation-zoom",
				"Shadow"	=> "animation-shadow",
				"Zoom + Shadow"	=> "animation-shadowzoom"
			),
			"description"	=> "Pricing table will use this animation for mouse hover",
			"std"			=> "animation-none",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Mark this Pricing Table as Featured (Main Pricing Table)",
			"param_name"	=> "featured_table",
			"value"			=> array(
				"No"	=> "0",
				"Yes"	=> "1",
			),
			"description"	=> "If you have few pricing tables around and want to highlight one (for example your main service or tarif plan) you can use this option. We recommend to use it only on ONE table in your several pricing tables.",
			"std"			=> "0",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Add borders to table and rows",
			"param_name"	=> "bordered",
			"value"			=> array(
				"No"	=> "0",
				"Yes"	=> "1",
			),
			"description"	=> "You can override border color in \"Colors\" tab.",
			"std"			=> "1",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Show table Zoomed / Enlarged",
			"param_name"	=> "enlarge",
			"value"			=> array(
				"No"	=> "0",
				"Yes"	=> "1",
			),
			"description"	=> "Useful to highlight some table. Make sure that you have enought space (margins) in tables row at the bottom and top to not overflow your site design. Recommended to use for some middle/center table (not side tables).",
			"std"			=> "0",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Add Shadow to table",
			"param_name"	=> "shadow",
			"value"			=> array(
				"No"	=> "0",
				"Yes"	=> "1",
			),
			"description"	=> "Useful to highlight some table. You can use this with 'Show table Zoomed' option together for nice effect.",
			"std"			=> "0",
		),
   		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Header Text",
			"description"	=> "",
			"param_name"	=> "header_text",
			"std"			=> "Service name",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Subheader Text (Price)",
			"description"	=> "HTML tags allowed for formatting",
			"param_name"	=> "subheader_text",
			"std"			=> "<sup>$</sup>99 <sub>/ per month</sub>",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Subheader icon name",
			"description"	=> "If you want to add icon to subheader (Before subheader) you can input Font Awesome icon name here, for example <em>calendar</em>. <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>Check all available icons names</a>.",
			"param_name"	=> "subheader_icon",
			"std"			=> "",
			"group"			=> "",
		),
		array(
			"type"			=> "textarea_html",
			"holder"		=> "div",
			"class" 		=> "mgt-pricing-table-content-html",
			"admin_label" 	=> false,
			"heading"		=> "Pricing Table List items",
			"param_name"	=> "content",
			"description"	=> "Use Ordered List element in Text Editor field to add your pricing table rows (elements list). Check Theme Documentation for more information about pricing table usage.",
			"std"			=> '<ul><li>Element 1</li><li>Element 2</li><li>Element 3</li><li>Element 4</li><li>Element 5</li></ul>',
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Element ID",
			"description"	=> "Unique ID generated automatically for Custom CSS usage. Change it manually if you dublicated this element.",
			"param_name"	=> "unique_block_id",
			"std"			=> rand(10000000000, 90000000000),
		),
		array(
			"type"			=> "vc_link",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Button with link",
			"description"	=> "Leave empty if you don't need button",
			"param_name"	=> "button_url",
			"std"			=> "",
			"group"			=> "Button",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button style",
			"param_name"	=> "button_style",
			"value"			=> array(
				"Default"	=> "solid",
				"Black"	=> "solid-invert",
				"Grey"	=> "grey",
				"Bordered"	=> "bordered",
				"Bordered Black"	=> "borderedblack",
				"Bordered Grey"	=> "borderedgrey",
				"Bordered White"	=> "borderedwhite",
				"Red"	=> "red",
				"Green"	=> "green",
				"Text link dark"	=> "text",
				"Text link light (use on dark backgrounds)"	=> "textwhite"
			),
			"description"	=> "Change button style",
			"std"			=> "solid",
			"group"			=> "Button",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button hover effect",
			"param_name"	=> "hover_effect",
			"value"			=> array(
				"Default"	=> "default",
				"[Shape] Grow"	=> "grow",
				"[Shape] Shrink"	=> "shrink",
				"[Shape] Pulse"	=> "pulse",
				"[Shape] Pulse Grow"	=> "pulse-grow",
				"[Shape] Pulse Shrink"	=> "pulse-shrink",
				"[Shape] Push"	=> "push",
				"[Shape] Pop"	=> "pop",
				"[Shape] Bounce In"	=> "bounce-in",
				"[Shape] Bounce Out"	=> "bounce-out",
				"[Shape] Rotate"	=> "rotate",
				"[Shape] Grow Rotate"	=> "grow-rotate",
				"[Shape] Float"	=> "float",
				"[Shape] Sink"	=> "sink",
				"[Shape] Bob"	=> "bob",
				"[Shape] Hang"	=> "hang",
				"[Shape] Skew"	=> "skew",
				"[Shape] Skew Forward"	=> "skew-forward",
				"[Shape] Skew Backward"	=> "skew-backward",
				"[Shape] Wobble Horizontal"	=> "wobble-horizontal",
				"[Shape] Wobble Vertical"	=> "wobble-vertical",
				"[Shape] Wobble To Bottom Right"	=> "wobble-to-bottom-right",
				"[Shape] Wobble To Top Right"	=> "wobble-to-top-right",
				"[Shape] Wobble Top"	=> "wobble-top",
				"[Shape] Wobble Bottom"	=> "wobble-bottom",
				"[Shape] Wobble Skew"	=> "wobble-skew",
				"[Shape] Buzz"	=> "buzz",
				"[Shape] Buzz Out"	=> "buzz-out",

				"[Background] Sweep To Right"	=> "sweep-to-right",
				"[Background] Sweep To Left"	=> "sweep-to-left",
				"[Background] Sweep To Bottom"	=> "sweep-to-bottom",
				"[Background] Sweep To Top"	=> "sweep-to-top",
				"[Background] Bounce To Right"	=> "bounce-to-right",
				"[Background] Bounce To Left"	=> "bounce-to-left",
				"[Background] Bounce To Bottom"	=> "bounce-to-bottom",
				"[Background] Bounce To Top"	=> "bounce-to-top",

				"[Icon] Icon Back"	=> "icon-back",
				"[Icon] Icon Forward"	=> "icon-forward",
				"[Icon] Icon Down"	=> "icon-down",
				"[Icon] Icon Up"	=> "icon-up",
				"[Icon] Icon Spin"	=> "icon-spin",
				"[Icon] Icon Drop"	=> "icon-drop",
				"[Icon] Icon Grow"	=> "icon-grow",
				"[Icon] Icon Shrink"	=> "icon-shrink",
				"[Icon] Icon Pulse"	=> "icon-pulse",
				"[Icon] Icon Pulse Grow"	=> "icon-pulse-grow",
				"[Icon] Icon Pulse Shrink"	=> "icon-pulse-shrink",
				"[Icon] Icon Push"	=> "icon-push",
				"[Icon] Icon Pop"	=> "icon-pop",
				"[Icon] Icon Bounce"	=> "icon-bounce",
				"[Icon] Icon Rotate"	=> "icon-rotate",
				"[Icon] Icon Grow Rotate"	=> "icon-grow-rotate",
				"[Icon] Icon Float"	=> "icon-float",
				"[Icon] Icon Sink"	=> "icon-sink",
				"[Icon] Icon Bob"	=> "icon-bob",
				"[Icon] Icon Hang"	=> "icon-hang",
				"[Icon] Icon Wobble Horizontal"	=> "icon-wobble-horizontal",
				"[Icon] Icon Wobble Vertical"	=> "icon-wobble-vertical",
				"[Icon] Icon Buzz"	=> "icon-buzz",
				"[Icon] Icon Buzz Out"	=> "icon-buzz-out",
			),
			"description"	=> "Change button hover effect (<a href='http://ianlunn.github.io/Hover/' target='_blank'>Preview effects</a>).",
			"std"			=> "default",
			"group"			=> "Button",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button size",
			"param_name"	=> "button_size",
			"value"			=> array(
				"Small"	=> "small",
				"Normal"	=> "normal",
				"Large"	=> "large"
			),
			"description"	=> "",
			"std"			=> "normal",
			"group"			=> "Button",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button icon name",
			"description"	=> "If you want to add icon to button you can input Font Awesome icon name here, for example <em>angle-left</em>. <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>Check all available icons names</a>.",
			"param_name"	=> "button_icon",
			"std"			=> "",
			"group"			=> "Button",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button Text size",
			"param_name"	=> "button_text_size",
			"value"			=> array(
				"Small"	=> "small",
				"Normal"	=> "normal",
				"Large"	=> "large"
			),
			"description"	=> "",
			"std"			=> "normal",
			"group"			=> "Button",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Button Text transform",
			"param_name"	=> "text_tranform",
			"value"			=> array(
				"None"	=> "none",
				"UPPERCASE"	=> "uppercase"
			),
			"description"	=> "",
			"std"			=> "none",
			"group"			=> "Button",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Header font size",
			"description"	=> "For ex.: 25px",
			"param_name"	=> "format_header_fontsize",
			"group"			=> "Format",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Header padding",
			"description"	=> "For ex.: 0 0 30px 0",
			"param_name"	=> "format_header_padding",
			"group"			=> "Format",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Subheader font size",
			"description"	=> "For ex.: 20px",
			"param_name"	=> "format_subheader_fontsize",
			"group"			=> "Format",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Subheader padding",
			"description"	=> "For ex.: 0 0 20px 0",
			"param_name"	=> "format_subheader_padding",
			"group"			=> "Format",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "List item font size",
			"description"	=> "For ex.: 12px",
			"param_name"	=> "format_item_fontsize",
			"group"			=> "Format",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "List item padding",
			"description"	=> "For ex.: 0 0 5px 0",
			"param_name"	=> "format_item_padding",
			"group"			=> "Format",
			"std"			=> "",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Header Text Color",
			"param_name"	=> "header_color",
			"group"			=> "Colors",
			"std"			=> "Leave empty to use colors from your selected style or override it with your own color.",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Header Background Color",
			"param_name"	=> "header_bg_color",
			"group"			=> "Colors",
			"std"			=> "Leave empty to use colors from your selected style or override it with your own color.",
		),
		array(
			"type"			=> "attach_image",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Header Background image",
			"param_name"	=> "header_bg_image",
			"group"			=> "Colors",
			"std"			=> "",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Subheader Text Color",
			"param_name"	=> "subheader_color",
			"group"			=> "Colors",
			"std"			=> "Leave empty to use colors from your selected style or override it with your own color.",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Subheader Background Color",
			"param_name"	=> "subheader_bg_color",
			"group"			=> "Colors",
			"std"			=> "Leave empty to use colors from your selected style or override it with your own color.",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Pricing Table List Text Color",
			"param_name"	=> "list_text_color",
			"group"			=> "Colors",
			"std"			=> "",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Pricing Table List Background Color (Odd element)",
			"param_name"	=> "list_bg_color_1",
			"group"			=> "Colors",
			"std"			=> "",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Pricing Table List Background Color (Even element)",
			"param_name"	=> "list_bg_color_2",
			"group"			=> "Colors",
			"std"			=> "",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Link text color",
			"param_name"	=> "a_color",
			"description"	=> "",
			"group"			=> "Colors",
			"std"			=> "",
		),
		array(
			"type"			=> "colorpicker",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "Border color",
			"param_name"	=> "border_color",
			"description"	=> "",
			"group"			=> "Colors",
			"std"			=> "",
		),
		array(
		    'type' => 'css_editor',
		    'heading' => __( 'Css' ),
		    'param_name' => 'css',
		    'group' => __( 'Content Design options' ),
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
   )

   
));
