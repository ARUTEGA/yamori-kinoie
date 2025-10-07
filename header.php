<?php
global $post;
$slug = $post->post_name;
if($slug == "top") {
	$logo = '<h1 class="logo"><a href="'.home_url().'"><img src="'.get_template_directory_uri().'/img/logo.svg" alt="Note" width="264" height="150" decoding="async"></a></h1>';
} else {
	$logo = '<p class="logo"><a href="'.home_url().'"><img src="'.get_template_directory_uri().'/img/logo.svg" alt="Note" width="264" height="150" decoding="async"></a></p>';
}
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP&display=swap">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/modal-video@2.4.8/css/modal-video.min.css">
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
<?php if (is_front_page()): ?>
        <style>
            body {
                height: 100%;
                &.js-hidden {
                    height: auto;
                }
            }
            .header {
                opacity: 0;
                pointer-events: none;
                transition: opacity .8s;
                .js-hidden &, .fixed & {
                    opacity: 1;
                    pointer-events: all;
                }
            }
        </style>
<?php endif; ?>
        <script src="https://unpkg.com/jquery@3.6.1/dist/jquery.min.js"></script>
        <script src="https://unpkg.com/modal-video@2.4.8/js/jquery-modal-video.min.js"></script>
        <link rel="icon" href="https://yamori-kinoie.com/data/wp-content/themes/yamori_2022/images/favicon.ico" type="image/x-icon">
		
		<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MJYGLMPMWF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MJYGLMPMWF');
</script>
	</head>
	<body>
		
        <header class="header">
            <div class="wrapper">
                <h1 class="header__logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="株式会社 家守">
                    </a>
                </h1>
                <div class="header__link">
                    <ul>
                        <li><a href="<?php echo home_url(); ?>/contactus/">モデルハウス来場ご予約</a></li>
                        <li class="pc"><a href="<?php echo home_url(); ?>/contactus/">お問合せ</a></li>
                        <li class="pc"><a href="<?php echo home_url(); ?>/contactus/">資料請求</a></li>
                    </ul>
                    <button class="menu"><span></span><span></span><span></span></button>
                </div>
            </div>
        </header>
        <nav class="nav">
            <div class="nav__wrapper">
                <div class="nav__container">
                    <ul>
                        <li><a href="<?php echo home_url(); ?>/message/">メッセージ</a></li>
                        <li><a href="<?php echo home_url(); ?>/aboutus/">家守の家づくり</a></li>
                        <li><a href="<?php echo home_url(); ?>/modelhouse/">モデルハウス</a></li>
                        <li><a href="<?php echo home_url(); ?>/projects/">施工事例</a></li>
                        <li><a href="<?php echo home_url(); ?>/casestudies/">暮らしを訪ねて</a></li>
                        <li><a href="<?php echo home_url(); ?>/company/">会社概要</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo home_url(); ?>/infomation/">お知らせ</a></li>
                        <li><a href="<?php echo home_url(); ?>/blog/">ブログ</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo home_url(); ?>/contactus/">お問合せ</a></li>
                        <li><a href="<?php echo home_url(); ?>/contactus/">資料請求</a></li>
                        <li><a href="<?php echo home_url(); ?>/contactus/">各種ご予約申込</a></li>
                    </ul>
                </div>
                <div class="nav__inner">
                    <p><a href="https://ju-ippaku.yamori-kinoie.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/ju-ippaku.svg" alt="リフォーム 十一白（じゅういっぱく）" width="40" height="150"></a></p>
                    <div>
                        <ul>
                            <li data-title="Official"><a href="https://www.instagram.com/yamori_kinoie/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_insta.svg" alt="Instagram（Official）" width="147" height="150"></a></li>
                            <li data-title="Diary"><a href="https://www.instagram.com/yamori_diary/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_insta.svg" alt="Instagram（Diary）" width="147" height="150"></a></li>
                            <li><a href="https://www.facebook.com/yamori.kinoie/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_facebook.svg" alt="Facebook" width="150" height="150"></a></li>
                            <li><a href="https://line.me/R/ti/p/@167ildne?from=page&accountId=167ildne#~" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_line.svg" alt="Line" width="150" height="150"></a></li>
                            <li><a href="https://www.youtube.com/channel/UCf34G8K2SewUjpvVevmHSNQ" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_youtube.svg" alt="Youtube" width="125" height="150"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
