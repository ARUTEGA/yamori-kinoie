<?php 
/*
Template Name : works
*/
get_header();
?>
				<main id="works">
					<article>
                        <h2 class="page-title">施工事例</h2>
                        <ul class="category">
                            <li><a href="<?php echo home_url(); ?>/projects/">ALL</a></li>
                            <li><a href="<?php echo home_url(); ?>/category/wooden">木組</a></li>
                            <li><a href="<?php echo home_url(); ?>/category/woodenhouse">木の家</a></li>
                            <li><a href="<?php echo home_url(); ?>/category/store">店舗</a></li>
                            <!-- <li><a href="<?php echo home_url(); ?>/category/reform">リフォーム</a></li> -->
                        </ul>
                        <div class="contents">
                            <ul class="list">
                                <?php
                                $query = new WP_Query(array(
                                    'category_name' => 'casestudy, wooden, woodenhouse, store, reform',
                                    'posts_per_page' => -1,
                                ));
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <p class="works__title"><?php the_title(); ?></p>
                                        <p class="works__hash"><?php the_tags('<span class="tag-links">', '</span><span class="tag-links">', '</span>'); ?></p>
                                        <figure class="works__image"><img src="<?php the_field('image_01'); ?>" alt="" decoding="async" loading="lazy"></figure>
                                    </a>
                                </li>
                                <?php 
                                endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo '記事はありません。';
                                endif;
                                ?>
                            </ul>
                        </div>
					</article>
				</main>
                <aside class="sub">
                    <ul class="link">
                        <li><a href="<?php echo home_url(); ?>/aboutus/">家守の家づくり</a></li>
                        <li><a href="<?php echo home_url(); ?>/casestudies/">暮らしを訪ねて</a></li>
                    </ul>
                </aside>
<?php get_footer(); ?>