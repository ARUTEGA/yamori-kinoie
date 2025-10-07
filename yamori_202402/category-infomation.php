<?php get_header(); ?>
                <main id="news">
					<article>
                        <h2 class="page-title">お知らせ</h2>
                        <ul class="category">
                            <li><a href="<?php echo home_url(); ?>/infomation/">ALL</a></li>
                            <li><a href="<?php echo home_url(); ?>/category/openhouse">完成内覧会</a></li>
                            <li><a href="<?php echo home_url(); ?>/category/event">イベント</a></li>
                            <li><a href="<?php echo home_url(); ?>/category/news">お知らせ</a></li>
                        </ul>
                        <div class="contents">
                            <ul class="list">
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $query = new WP_Query(array(
                                    'category_name' => 'all_news',
                                    'posts_per_page' => 12,
                                    'paged' => $paged,
                                ));
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                    $cat = get_the_category();
                                    $cat = $cat[0];
                                ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <p class="news__title"><?php the_title(); ?></p>
                                        <div>
                                            <p class="news__date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></p>
                                            <p class="news__cat"><?php echo $cat->name; ?></p>
                                        </div>
                                        <figure><img src="<?php the_field('image'); ?>" alt="" decoding="async" loading="lazy"></figure>
                                    </a>
                                </li>
                                <?php 
                                endwhile;
                                ?>
                            </ul>
                            <div class="pagination">
                                <?php
                                echo paginate_links(array(
                                    'total' => $query->max_num_pages,
                                    'current' => $paged,
                                    'prev_text' => __('<'),
                                    'next_text' => __('>'),
                                ));
                                ?>
                            </div>
                            <?php
                            wp_reset_postdata();
                            else :
                                echo '記事はありません。';
                            endif;
                            ?>
                        </div>
                        <section class="news__contact">
                            <div class="wrapper">
                                <h3>Contact</h3>
                                <p class="text">お問合せ／資料請求／見学ご予約はこちらから</p>
                                <div class="notice">
                                    <p>来場はご予約制です。</p>
                                    <p>見学会やイベントはNEWSやSNSにてご確認ください。</p>
                                </div>
                                <p class="arrow"><a href="<?php echo home_url(); ?>/contactus/"></a></p>
                            </div>
                        </section>
					</article>
				</main>
<?php get_footer(); ?>