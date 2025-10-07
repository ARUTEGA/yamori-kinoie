<?php get_header(); ?>
				<main id="blog">
					<article>
                        <h2 class="page-title">ブログ</h2>
                        <div class="contents">
                            <ul class="list">
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $query = new WP_Query(array(
                                    'category_name' => 'letter, makehouse',
                                    'posts_per_page' => 12,
                                    'paged' => $paged,
                                ));
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                    $cat = get_the_category();
                                    $cat = $cat[0];
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
					</article>
				</main>
                <aside class="sub">
                    <ul class="link">
                        <li><a href="<?php echo home_url(); ?>/aboutus/">家守の家づくり</a></li>
                        <li><a href="<?php echo home_url(); ?>/projects/">施工事例</a></li>
                    </ul>
                </aside>
<?php get_footer(); ?>