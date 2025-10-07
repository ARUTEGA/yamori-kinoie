<?php get_header(); ?>
				<main id="blog">
					<article>
                        <h2 class="page-title">ブログ</h2>
                        <div class="contents">
                            <ul class="list">
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                // タグ一覧を取得するためのWP_Query
                                $tag_query = new WP_Query(array(
                                    'post_type' => 'post', // 投稿タイプ
                                    'posts_per_page' => 12, // 全ての投稿を取得
                                    'no_found_rows' => true, // ページネーションを必要としない場合はtrueに設定
                                    'paged' => $paged,
                                ));

                                // タグ一覧を表示
                                if ($tag_query->have_posts()) :
                                    while ($tag_query->have_posts()) : $tag_query->the_post();
                                        $post_tags = get_the_tags();
                                        if ($post_tags) :
                                            foreach ($post_tags as $tag) :
                                ?>
                                <li>
                                    <a href="<?php echo get_permalink(); ?>" class="link">
                                        <h3><?php the_title(); ?></h3>
                                        <time datetime="<?php the_time('Y-m-d'); ?>" class="blog__date"><?php the_time('Y.m.d'); ?></time>
                                        <figure><img src="<?php the_field('image'); ?>" alt="" decoding="async" loading="lazy"></figure>
                                    </a>
                                    <p class="tag">
                                    <?php
                                    $tags = get_the_tags();
                                    if ($tags) :
                                        foreach ($tags as $tag) :
                                    ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>">#<?php echo $tag->name; ?></a>
                                    <?php
                                        endforeach;
                                    else :
                                    ?>
                                    <?php endif; ?>
                                    </p>
                                </li>
                                <?php
                                endforeach;
                                endif;
                                endwhile;
                                else :
                                    echo 'タグはありません。';
                                endif;
                                wp_reset_postdata(); // クエリのリセット
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
                        </div>
					</article>
				</main>
                <aside class="sub">
                    <ul class="link">
                        <li><a href="<?php echo home_url(); ?>/aboutus/">家守の家づくり</a></li>
                        <li><a href="<?php echo home_url(); ?>/projects/">施工事例</a></li>
                    </ul>
                </aside>
<?php get_footer(); ?>