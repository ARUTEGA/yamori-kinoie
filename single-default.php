<?php get_header();?>
				<main id="single">
                    <article>
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                            <h1 class="article__ttl"><?php the_title(); //タイトル ?></h1>
                            <div class="article__wrap">
                                <p class="article__date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></p>
                                <p class="article__category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } //カテゴリー名 ?></p> 
                            </div>
                            <figure class="article__fig"><?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); //アイキャッチ ?></figure>
                            <div class="article__content">
                                <?php the_content();?>
                            </div>
                            <?php endwhile; endif; ?>
                    </article>
				</main>
                <aside>
                    <div>
                        <a href="">
                            <p>1Contact</p>
                            <p>お問合せ／資料請求／見学ご予約はこちらから</p>
                            <p>※ 来場はご予約制です。</p>
                            <p>※ 見学会やイベントはNEWSやSNSにてご確認ください。</p>
                        </a>
                    </div>
                </aside>
<?php get_footer(); ?>