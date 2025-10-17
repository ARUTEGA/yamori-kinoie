<?php
//wpのバージョン情報削除
remove_action('wp_head','wp_generator');
//wpのバージョン情報削除
function vc_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
//フィードリンク削除
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
//絵文字削除
//remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
//remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
//remove_action( 'wp_print_styles', 'print_emoji_styles' );
//remove_action( 'admin_print_styles', 'print_emoji_styles' );
//DNS Prefetch削除
remove_action('wp_head', 'wp_resource_hints', 2);
//Embed削除
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//EditURI
remove_action('wp_head', 'rsd_link');
//wlwmanifest削除
remove_action('wp_head', 'wlwmanifest_link');
//前の記事､次の記事のリンク削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// ショートリンクURLの削除
remove_action('wp_head', 'wp_shortlink_wp_head');
// アイキャッチ
function my_setup(){
	add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
	add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
	add_theme_support('title-tag'); // titleタグ自動生成
	add_theme_support('html5', array( //HTML5による出力
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));
}
add_action('after_setup_theme', 'my_setup');
// title 繋ぎ目の変更
function change_title_separator( $sep ){
  $sep = '|';
  return $sep;
}
add_filter( 'document_title_separator', 'change_title_separator' );
// JavaScriptの読み込み
function add_js(){
	// WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み
    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.5.1.min.js');
	// オリジナルJavaScriptの読み込み
    //wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.1', true );
}
add_action('wp_enqueue_scripts', 'add_js');
// CSSの読み込み ※'common'で設定すると管理画面の設定になってしまうので注意
function add_css(){
	// 共通CSS
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'new', get_template_directory_uri() . '/css/new-style.css' );
	// 個別ページCSS ※'about'で設定すると管理画面の設定になってしまうので注意
	global $post;
	$slug = $post -> post_name;
	// 一部、管理画面の設定になってしまうので、$slugの後に"-style"を追加
	$slug_name = $slug.'-style';
    if( is_page($slug) ){
        wp_enqueue_style( $slug_name, get_template_directory_uri() . '/css/'.$slug.'.css?v7', array('main') );
	}
	// トップページのheadにSwiperのCSSを追加
	if( $slug == "top" ){
        wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css', array('top-style') );
	}
	// aboutページのheadにSwiperのCSSを追加
	//if( $slug == "about" ){
        //wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css', array('about-style') );
	//}
}
add_action('wp_enqueue_scripts', 'add_css');
// パンくずリスト
function json_breadcrumb(){
	if( is_admin() || is_home() || is_front_page() ){ return; }
	$position  = 1;
	$query_obj = get_queried_object();
	$permalink = ( empty($_SERVER["HTTPS"] ) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$json_breadcrumb = array(
		"@context"        => "https://schema.org",
		"@type"           => "BreadcrumbList",
		"itemListElement" => array(
			array(
				"@type"    => "ListItem",
				"position" => $position++,
				"item"     => array(
					"name" => "TOP",
					"@id"  => esc_url( home_url('/') ),
				)
			),
		),
	);
	if( is_page() ){
		$ancestors   = get_ancestors( $query_obj->ID, 'page' );
		$ancestors_r = array_reverse($ancestors);
		if ( count( $ancestors_r ) != 0 ){
			foreach ($ancestors_r as $key => $ancestor_id){
				$ancestor_obj = get_post($ancestor_id);
				$json_breadcrumb['itemListElement'][] = array(
					"@type"    => "ListItem",
					"position" => $position++,
					"item"     => array(
						"name" => esc_html($ancestor_obj->post_title),
						"@id"  => esc_url( get_the_permalink($ancestor_obj->ID) ),
					)
				);
			}
		}
		$json_breadcrumb['itemListElement'][] = array(
			"@type"    => "ListItem",
			"position" => $position++,
			"item"     => array(
				"name" => esc_html($query_obj->post_title),
				"@id"  => $permalink,
			)
		);
	}elseif( is_post_type_archive() ){
		$json_breadcrumb['itemListElement'][] = array(
			"@type"    => "ListItem",
			"position" => $position++,
			"item"     => array(
				"name" => $query_obj->label,
				"@id"  => esc_url( get_post_type_archive_link( $query_obj->name ) ),
			)
		);
	}elseif( is_tax() || is_category() ){
		if ( !is_category() ){
			$post_type = get_taxonomy( $query_obj->taxonomy )->object_type[0];
			$pt_obj    = get_post_type_object( $post_type );
			$json_breadcrumb['itemListElement'][] = array(
				"@type"    => "ListItem",
				"position" => $position++,
				"item"     => array(
					"name" => $pt_obj->label,
					"@id"  => esc_url( get_post_type_archive_link($pt_obj->name) ),
				)
			);
		}
		$ancestors   = get_ancestors( $query_obj->term_id, $query_obj->taxonomy );
		$ancestors_r = array_reverse($ancestors);
		foreach ($ancestors_r as $key => $ancestor_id){
			$json_breadcrumb['itemListElement'][] = array(
				"@type"    => "ListItem",
				"position" => $position++,
				"item"     => array(
					"name" => esc_html( get_cat_name($ancestor_id) ),
					"@id"  => esc_url( get_term_link($ancestor_id, $query_obj->taxonomy) ),
				)
			);
		}
		$json_breadcrumb['itemListElement'][] = array(
			"@type"    => "ListItem",
			"position" => $position++,
			"item"     => array(
				"name" => esc_html( $query_obj->name ),
				"@id"  => esc_url( get_term_link($query_obj) ),
			)
		);
	}elseif( is_single() ){
		if ( !is_single('post') ){
			$pt_obj = get_post_type_object( $query_obj->post_type );
			$json_breadcrumb['itemListElement'][] = array(
				"@type"    => "ListItem",
				"position" => $position++,
				"item"     => array(
					"name" => $pt_obj->label,
					"@id"  => esc_url( get_post_type_archive_link($pt_obj->name) ),
				)
			);
		}
		$json_breadcrumb['itemListElement'][] = array(
			"@type"    => "ListItem",
			"position" => $position++,
			"item"     => array(
				"name" => esc_html( $query_obj->post_title ),
				"@id"  => $permalink,
			)
		);
	}elseif( is_404() ){
		$json_breadcrumb['itemListElement'][] = array(
			"@type"    => "ListItem",
			"position" => $position++,
			"item"     => array(
				"name" => "404 Not found",
				"@id"  => $permalink,
			)
		);
	}elseif( is_search() ){
		$json_breadcrumb['itemListElement'][] = array(
			"@type"    => "ListItem",
			"position" => $position++,
			"item"     => array(
				"name" => "「" . get_search_query(). "」の検索結果",
				"@id"  => $permalink,
			)
		);
	}
	echo '<script type="application/ld+json">'.json_encode($json_breadcrumb).'</script>';
}
add_action( 'wp_head', 'json_breadcrumb' );

/* インデックスしないページを設定 */
function my_add_noindex(){ 
 
    /* アーカイブ */
    if (is_archive('category-casestudy','category-letter')) {
        echo '<meta name="robots" content="noindex" />';
    }
}
add_action('wp_head', 'my_add_noindex');

// カスタム投稿タイプの追加
/* function add_custom_post_type(){
    register_post_type(
        'casestudies',
        array(
            'label'         => 'ケーススタディ', // 投稿タイプの名前
            'public'        => true, // 利用する場合はtrueにする 
            'has_archive'   => false, // この投稿タイプのアーカイブを有効にする
            'menu_position' => 6, // この投稿タイプが表示されるメニューの位置
            'menu_icon'     => 'dashicons-store', // メニューで使用するアイコン
        )
    );
    register_post_type(
        'works',
        array(
            'label'         => '施工事例', // 投稿タイプの名前
            'public'        => true, // 利用する場合はtrueにする 
            'has_archive'   => false, // この投稿タイプのアーカイブを有効にする
            'menu_position' => 7, // この投稿タイプが表示されるメニューの位置
            'menu_icon'     => 'dashicons-edit', // メニューで使用するアイコン
        )
    );
	flush_rewrite_rules( false );
}
add_action('init', 'add_custom_post_type'); */

// URLの変更
/* add_action('init', 'custom_rewrite_rules');

function custom_rewrite_rules() {
    add_rewrite_rule('^infomation/?$', 'index.php?category_name=news', 'top');
}

add_filter('query_vars', 'add_custom_query_vars');

function add_custom_query_vars($vars) {
    $vars[] = 'category_name';
    return $vars;
}

add_action('template_redirect', 'redirect_custom_urls');

function redirect_custom_urls() {
    if (get_query_var('category_name') == 'news') {
        include(TEMPLATEPATH . '/category-news.php');
        exit;
    }
} */

// jsでテンプレートタグを挿入
/* function my_enqueue_scripts() {
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    wp_localize_script('my-script', 'myScriptVars', array(
        'templateUri' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts'); */

?>

