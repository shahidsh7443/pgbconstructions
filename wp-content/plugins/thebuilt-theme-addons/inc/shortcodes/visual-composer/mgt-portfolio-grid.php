<?php

// VC [portfolio_grid_wp]

vc_map(array(
   "name" 			=> "MGT Portfolio Grid",
   "category" 		=> 'TheBuilt Content',
   "description"	=> "Show portfolio items grid with filter",
   "base" 			=> "mgt_portfolio_grid_wp",
   "class" 			=> "",
   "icon" 			=> "vc_mgt_portfolio_grid",
   
   "params" 	=> array(
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Grid layout",
			"description"	=> "",
			"param_name"	=> "layout",
			"value"			=> array(
				"Equal thumbs"	=> "0",
				"Masonry 1"	=> "1",
				"Masonry 2"	=> "2",
				"Masonry 3"	=> "3",
				"Gallery Slideshow"	=> "4",
				"Compact List"	=> "5",
				"Medium List"	=> "6"
			),
			"std"			=> "0",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Item Hover Animation ",
			"description"	=> "",
			"param_name"	=> "item_hover_effect",
			"value"			=> array(
				"Text from left, Zoom, Theme Color Overlay" => "0",
				"Text from left, Zoom, Transparent Overlay" => "1",
				"Text from left, Transparent Overlay" => "2",
				"Text from bottom, Zoom, Transparent Overlay" => "3",
				"Text from bottom, Transparent Overlay" => "4",
				"Text fly-in, Transparent Overlay" => "5",
				"Text style, Large text (Image and text always visible)" => "6",
				"Text style, Large text (Image on hover, text always visible)" => "7"
			),
			"std"			=> "0",
		),
   		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Items per row in grid (columns)",
			"description"	=> "",
			"param_name"	=> "columns",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("0"),
			),
			"value"			=> array(
				"3"	=> "3",
				"4"	=> "4",
				"5"	=> "5"
			),
			"std"			=> "4",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Slides per row in carousel slider (columns)",
			"description"	=> "",
			"param_name"	=> "slider_columns",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("4"),
			),
			"value"			=> array(
				"1"	=> "1",
				"2"	=> "2",
				"3"	=> "3",
				"4"	=> "4",
				"5"	=> "5"
			),
			"std"			=> "4",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Slider autoplay",
			"description"	=> "",
			"param_name"	=> "slider_autoplay",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("4"),
			),
			"value"			=> array(
				"Enable"	=> "true",
				"Disable"	=> "false",
			),
			"std"			=> "false",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Slider navigation arrows",
			"description"	=> "",
			"param_name"	=> "slider_navigation",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("4"),
			),
			"value"			=> array(
				"Enable"	=> "true",
				"Disable"	=> "false",
			),
			"std"			=> "false",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Slider pagination buttons",
			"description"	=> "",
			"param_name"	=> "slider_pagination",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("4"),
			),
			"value"			=> array(
				"Enable"	=> "true",
				"Disable"	=> "false",
			),
			"std"			=> "false",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Add spaces between elements in grid",
			"description"	=> "",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("0", "2", "3", "4", "5", "6"),
			),
			"param_name"	=> "spaces",
			"value"			=> array(
				"No"	=> "0",
				"Yes"	=> "1"
			),
			"std"			=> "0",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Show View More button in projects boxes",
			"description"	=> "",
			"param_name"	=> "show_viewmore_button",
			"value"			=> array(
				"Show"	=> "1",
				"Hide"	=> "0"
			),
			"std"			=> "show",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Show project short description in projects boxes",
			"description"	=> "",
			"param_name"	=> "show_description",
			"value"			=> array(
				"Show"	=> "1",
				"Hide"	=> "0"
			),
			"std"			=> "show",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Grid animation effect 1",
			"description"	=> "",
			"param_name"	=> "filter_effect_1",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("0", "1", "2", "3", "5", "6"),
			),
			"value"			=> array(
				"Fade" => "fade",
				"Scale" => "scale",
				"TranslateX" => "translateX",
				"TranslateY" => "translateY",
				"TranslateZ" => "translateZ",
				"RotateX" => "rotateX",
				"RotateY" => "rotateY",
				"RotateZ" => "rotateZ",
				"Stagger" => "stagger"
			),
			"std"			=> "fade",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Grid animation effect 2",
			"description"	=> "",
			"param_name"	=> "filter_effect_2",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("0", "1", "2", "3", "5", "6"),
			),
			"value"			=> array(
				"Fade" => "fade",
				"Scale" => "scale",
				"TranslateX" => "translateX",
				"TranslateY" => "translateY",
				"TranslateZ" => "translateZ",
				"RotateX" => "rotateX",
				"RotateY" => "rotateY",
				"RotateZ" => "rotateZ",
				"Stagger" => "stagger"
			),
			"std"			=> "scale",
		),		
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Show project categories ajax filter",
			"param_name"	=> "show_filter",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("0", "1", "2", "3", "5", "6"),
			),
			"value"			=> array(
				"Yes"	=> "1",
				"No"	=> "0"
			),
			"std"			=> "1",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Portfolio Filter Align",
			"description"	=> "",
			"param_name"	=> "filter_align",
			"value"			=> array(
				"Left"	=> "left",
				"Center"	=> "center"
			),
			"std"			=> "left",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Portfolio Filter Border",
			"description"	=> "Show border near portfolio filter block",
			"param_name"	=> "filter_border",
			"value"			=> array(
				"Show"	=> "show",
				"Hide"	=> "hide"
			),
			"std"			=> "hide",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Reset filters button text",
			"param_name"	=> "reset_filter_button_text",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("0", "1", "2", "3", "5", "6"),
			),
			"dependency"	=> array(
				"element"	=> "show_filter",
				"value"		=> Array("1"),
			),
			"std"			=> "All",
			"description"	=> "If you show your portfolio list as part of page with limited items use 'Recent', if you show your portfolio with all items for example on separated Portfolio page use 'All' or other text you need.",
		),
		array(
			"type"			=> "vc_link",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> false,
			"heading"		=> "View all portfolio items button (link to Portfolio page)",
			"description"	=> "",
			"param_name"	=> "show_viewall_button",
			"dependency"	=> array(
				"element"	=> "layout",
				"value"		=> Array("0", "1", "2", "3", "5", "6"),
			),
			"std"			=> "",
			"dependency"	=> array(
				"element"	=> "show_filter",
				"value"		=> Array("1"),
			),
			"description"	=> "Leave empty if you don't want to have 'View all' button that open your separated portfolio page. You need to choose to create your portfolio page first and choose its url here.",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Open portfolio item image in lightbox on grid item click instead of item page",
			"description"	=> "",
			"param_name"	=> "open_image",
			"value"			=> array(
				"No"	=> "0",
				"Yes"	=> "1"
			),
			"std"			=> "0",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Open portfolio item url on grid item click instead of item page",
			"description"	=> "",
			"param_name"	=> "open_url",
			"dependency"	=> array(
				"element"	=> "open_image",
				"value"		=> Array("0"),
			),
			"value"			=> array(
				"No"	=> "0",
				"Yes"	=> "1"
			),
			"std"			=> "0",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Order By",
			"param_name"	=> "orderby",
			"value"			=> array(
				"ID"	=> "id",
				"Title"	=> "title",
				"Date"	=> "date",
				"Random"	=> "rand"
			),
			"std"			=> "date",
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Order",
			"param_name"	=> "order",
			"value"			=> array(
				"Desc"	=> "DESC",
				"Asc"	=> "ASC"
			),
			"std"			=> "DESC",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Portfolio grid items limit",
			"param_name"	=> "posts_per_page",
			"description"	=> "Leave empty to show ALL portfolio items on your separated portfolio page. ",
			"std"			=> "",
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class" 		=> "hide_in_vc_editor",
			"admin_label" 	=> true,
			"heading"		=> "Show Portfolio items from specific one category only",
			"param_name"	=> "category_name",
			"description"	=> "Input portfolio category SLUG (not name!) here, for example 'web-design'. You can see/set category SLUG when you edit category. Using this option will disable category filter block. Leave empty to show elements from categories.",
			"std"			=> "",
		),
		
   )

  
));