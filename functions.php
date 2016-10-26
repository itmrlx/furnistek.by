<?php
// Patch for WP Admin rendering bug in Chrome 45+
function admin_menu_chrome_patch() {
    echo '<style>#adminmenu { transform: translateZ(0); }</style>';
}
add_action('admin_head', 'admin_menu_chrome_patch');

/*Optional*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Управление сайтом',
		'menu_title'	=> 'Управление',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts'
	));
}

// search
function wph_exclude_pages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','wph_exclude_pages');
//исключение страниц из результатов поиска end


// curs
function curs($curs){
	$result = $curs * get_field('curs', 'option');
	echo number_format($result, 2, '.', ' ');
};

// remove gallery inline style
add_filter( 'use_default_gallery_style', '__return_false' );

/*hide adminbar if u not admin*/
function my_function_admin_bar($content) {
	return ( current_user_can("administrator") ) ? $content : false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');
/*end*/

/*register menus*/
function register_my_menus() {
	register_nav_menus(
		array(
			'side-menu' => __( 'Боковое меню' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );
/*end*/

/*widgets*/
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	register_sidebar(
		array(
			'name' => 'widget name',
			'id' => 'widget id',
			'description' => '',
			'class' => '',
			'before_widget' => '<li class="widget">',
			'after_widget' => '</li>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>' 
		)
	);
}
/*end*/

/*short story more ...*/
function new_excerpt_more( $more ) {return '...';}
add_filter('excerpt_more', 'new_excerpt_more');
/*end*/

/*Prosites logotype (enter admin page)*/
function login_logo_prosites(){
	echo '<style type="text/css">
	h1 a {background-image:url('.get_bloginfo('template_directory').'/img/logo-prosites.jpg) !important;background-size: 150px 150px !important;width:150px !important;height:150px !important;box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); }
	h1 a:hover{box-shadow:none;}
	.wp-core-ui .button-primary {
		background:#BB5B5C;
		border:0;
		border-radius:0;
		box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
		padding:;
	}
	.wp-core-ui .button-primary:hover,.wp-core-ui .button-primary:focus{background:#A15756;box-shadow:none;}
	.wp-core-ui .button.button-large{padding: 0px 15px 2px;}
	</style>';
}
add_action('login_head', 'login_logo_prosites');
function my_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-content');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('all-in-one-seo-pack');
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );
function my_custom_login_url(){return 'http://prosites.by';}
add_filter( 'login_headerurl', 'my_custom_login_url', 10, 4 );
function login_header_title(){return 'Разработка и продвижение сайтов';}
add_filter('login_headertitle','login_header_title');
/*end*/

/*pagination*/
function proPagination($pages = '', $range = 2){
	$showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){$pages = 1;}
	};
	if(1 != $pages){
		echo "<ul class='pagination'>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
		if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<li class='active'><a class='btn-danger' href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
			};
		};
		if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
		if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
		echo "</ul>";
	};
};
/*end*/
?>