		<footer class="footer">
            <div class="footer__link">
                <ul class="footer__link__nav">
                    <li><a href="<?php echo home_url(); ?>/contactus/">お問合せ</a></li>
                    <li><a href="<?php echo home_url(); ?>/contactus/">資料請求</a></li>
                    <li><a href="<?php echo home_url(); ?>/contactus/">各種ご予約申込</a></li>
                </ul>
                <ul class="footer__link__contact">
                    <li class="mail"><a href="<?php echo home_url(); ?>/contactus/">Mail</a></li>
                    <li class="line"><a href="https://line.me/R/ti/p/@167ildne?from=page&accountId=167ildne#~">Line</a></li>
                </ul>
            </div>
            <div class="contents">
                <figure>
                    <a href="https://maps.app.goo.gl/ngsKR3NdyXFKH1FJ7" target="_blank">
                        <picture>
                            <source media="(min-width: 600px)" srcset="<?php echo get_template_directory_uri(); ?>/images/footer_map_pc.svg" width="" height="">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/footer_map_sp.svg" alt="" width="" height="" decoding="async" loading="lazy">
                        </picture>
                    </a>
                </figure>
                <div class="container">
                    <div class="inner">
                        <div class="logo">
                            <p>
                                <a href="<?php echo home_url(); ?>">
                                    <picture>
                                        <source media="(min-width: 600px)" srcset="<?php echo get_template_directory_uri(); ?>/images/footer_logo_pc.svg" width="226" height="150">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/footer_logo_sp.svg" alt="YAMORI STYLE. SALON & GALLERY<span>Yamori co.,ltd. Fujimigaoka Modelhouse" width="226" height="150" decoding="async" loading="lazy">
                                    </picture>
                                </a>
                            </p>
                        </div>
                        <div class="data">
                            <div class="office">
                                <p style="font-size: 1.2rem;">□ショールーム</p>
                                <p>株式会社 家守</p>
                                <p>栃木県宇都宮市富士見が丘<br>三丁目16-5　〒320-0011</p>
                                <p>TEL. 028-678-8957</p>
                            </div>
                            <div class="ju-ippaku">
                                <p><a href="https://ju-ippaku.yamori-kinoie.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/ju-ippaku.svg" alt="リフォーム 十一白（じゅういっぱく）" width="40" height="150"></a></p>
                            </div>
                        </div>
                    </div>
                    <ul class="sns">
                        <li data-title="Official"><a href="https://www.instagram.com/yamori_kinoie/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_insta.svg" alt="Instagram（Official）" width="147" height="150"></a></li>
                        <li data-title="Diary"><a href="https://www.instagram.com/yamori_diary/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_insta.svg" alt="Instagram（Diary）" width="147" height="150"></a></li>
                        <li><a href="https://www.facebook.com/yamori.kinoie/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_facebook.svg" alt="Facebook" width="150" height="150"></a></li>
                        <li><a href="https://line.me/R/ti/p/@167ildne?from=page&accountId=167ildne#~" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_line.svg" alt="Line" width="150" height="150"></a></li>
                        <li><a href="https://www.youtube.com/channel/UCf34G8K2SewUjpvVevmHSNQ" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_youtube.svg" alt="Youtube" width="125" height="150"></a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p><small>&copy; YAMORI Co., Ltd.</small></p>
                <p><a href="">privacy policy</a></p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/script.js?v1" charset="UTF-8"></script>
<?php wp_footer(); ?>

	</body>
</html>