<?php get_header();?>
                <main id="works-single">
                    <article>
                        <p class="page-title">施工事例</p>
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>
                            <section class="works">
                                <div class="works__wrapper">
                                    <div>
                                        <h2 class="works__title"><?php the_title(); ?></h2>
                                        <p class="works__cate"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
                                        <p class="works__prefectures"><?php the_field('works_info_14'); ?></p>
                                        <p class="works__tag"><?php the_tags('<span>', '</span><span>', '</span>'); ?></p>
                                    </div>
                                    <p class="works__text"><?php the_field('works_info_15'); ?></p>
                                </div>
                                <div class="works__data">
                                    <!-- <?php the_content();?> -->
                                    <?php if (get_field('image_02')) { ?><figure><img src="<?php the_field('image_02'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_03')) { ?><figure><img src="<?php the_field('image_03'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_04')) { ?><figure><img src="<?php the_field('image_04'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_05')) { ?><figure><img src="<?php the_field('image_05'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_06')) { ?><figure><img src="<?php the_field('image_06'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_07')) { ?><figure><img src="<?php the_field('image_07'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_08')) { ?><figure><img src="<?php the_field('image_08'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_09')) { ?><figure><img src="<?php the_field('image_09'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_10')) { ?><figure><img src="<?php the_field('image_10'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_11')) { ?><figure><img src="<?php the_field('image_11'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_12')) { ?><figure><img src="<?php the_field('image_12'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_13')) { ?><figure><img src="<?php the_field('image_13'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_14')) { ?><figure><img src="<?php the_field('image_14'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                    <?php if (get_field('image_15')) { ?><figure><img src="<?php the_field('image_15'); ?>" alt="" decoding="async" loading="lazy"></figure><?php } ?>
                                </div>
                                <figure class="works__image"><img src="<?php the_field('image_01'); ?>" alt="" decoding="async" loading="lazy"></figure>
                            </section>
                            <div id="blog-single">
                                <article>
                                    <div class="blog__data">
                                        <?php the_content();?>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; endif; ?>
                    </article>
				</main>
                <aside class="sub">
                    <ul class="link">
                        <li><a href="<?php echo home_url(); ?>/aboutus/">家守の家づくり</a></li>
                        <li><a href="<?php echo home_url(); ?>/casestudies/">暮らしを訪ねて</a></li>
                    </ul>
                </aside>
<?php get_footer(); ?>