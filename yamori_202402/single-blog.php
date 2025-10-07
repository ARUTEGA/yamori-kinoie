<?php get_header();?>
				<main id="blog-single">
                    <article>
                        <p class="page-title">Blog</p>
                        <section class="blog">
                            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                            <div class="blog__wrapper">
                                <div>
                                    <h2 class="blog__title"><?php the_title(); ?></h2>
                                    <p class="blog__tag"><?php the_tags('<span>', '</span><span>', '</span>'); ?></p>
                                </div>
                                <p class="blog__date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></p>
                            </div>
                            <figure class="blog__image"><img src="<?php the_field('image'); ?>" alt="" decoding="async" loading="lazy"></figure>
                            <div class="blog__data">
                                <?php the_content();?>
                            </div>
                            <?php endwhile; endif; ?>
                        </section>
                        <ul class="link">
                            <li>
                                <?php
                                $next_post = get_next_post(true, '', 'category');
                                if ($next_post) {
                                    next_post_link('%link', '< 前の記事', true);
                                } else {
                                    echo '< 前の記事';
                                }
                                ?>
                            </li>
                            <li><a href="<?php echo home_url(); ?>/infomation/">全て</a></li>
                            <li>
                                <?php
                                $prev_post = get_previous_post(true, '', 'category');
                                if ($prev_post) {
                                    previous_post_link('%link', '次の記事 >', true);
                                } else {
                                    echo '次の記事 >';
                                }
                                ?>
                            </li>
                        </ul>
                    </article>
                    <aside>
                        <h3>Contact</h3>
                        <p>お問合せ／資料請求／見学ご予約はこちらから</p>
                        <div class="small">
                            <p>※ 来場はご予約制です。</p>
                            <p>※ 見学会やイベントはNEWSやSNSにてご確認ください。</p>
                        </div>
                        <a href="<?php echo home_url(); ?>/contactus/" class="arrow"></a>
                    </aside>
				</main>
<?php get_footer(); ?>