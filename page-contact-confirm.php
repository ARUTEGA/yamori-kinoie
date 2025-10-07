<?php 
/*
Template Name : about
*/
get_header();
?>
				<main id="contact">
					<article>
                        <div class="wrapper">
                            <h2 class="page-title">Contact</h2>
                            <div class="mailform">
                                <p class="text_check">入力内容をご確認ください。</p>
                                <?php echo apply_shortcodes( '[contact-form-7 id="6f254d2" title="お問い合わせ（確認画面）"]' ); ?>
                            </div>
                        </div>
					</article>
				</main>
<?php get_footer(); ?>