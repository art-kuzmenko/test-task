<?php
/**
 * Template Name: Кредиты
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage exchange
 * @since exchange 1.0
 */

get_header();
?>
 <section class="bank-cards">
        <div class="container flex">
            <?php

        $args = array(
          'post_type' => 'credits',
          'posts_per_page' => -1,

        );

        $credits_posts = new WP_Query($args);

        while ( $credits_posts->have_posts() ) : $credits_posts->the_post(); 
        $credit_type = get_field('credit_type');
        $credit_summ = get_field('credit_summ');
        $credit_term = get_field('credit_term');
        $credit_psk = get_field('credit_psk');
        $credit_link = get_field('credit_link');
        ?>
            <div class="bank-card">
                <div class="bank-first-row flex">
                    <div class="bank-info-wrapper flex">
                    <div class="bank-logo">
                       <?php echo get_the_post_thumbnail(); ?>
                        <div class="bank-text-info-mb">
                            <div class="bank-name-mb black">
                            <?php the_title(); ?>
                    </div>
                    <?php if($credit_type): ?>
                      <div class="bank-credit-type-mb black">
                        <?php echo $credit_type; ?>
                    </div>
                    <?php endif; ?>
                        </div>
                    </div>
                    <div class="bank-text-info">
                    <div class="bank-name black">
                            <?php the_title(); ?>
                    </div>
                    <?php if($credit_type): ?>
                     <div class="bank-credit-type black">
                        <?php echo $credit_type; ?>
                    </div>
                    <?php endif; ?>
                      <div class="bank-info flex grey">
                        <div class="bank-rating flex">
                            <img class="star" src="<?=get_template_directory_uri()?>/images/star.svg" alt="star">
                            4.33
                        </div>
                        <div class="bank-comments flex">
                            <img class="link" src="<?=get_template_directory_uri()?>/images/Link.svg" alt="link">
                            5
                        </div>
                        <div class="bank-views flex">
                            <img class="views" src="<?=get_template_directory_uri()?>/images/views.svg" alt="views">
                            1189
                        </div>
                        <div class="bank-likes flex">
                            <img class="like" src="<?=get_template_directory_uri()?>/images/like.svg" alt="like">
                            10
                        </div>
                    </div>
                    </div>
                </div>
                <div class="bank-numbers flex">
                    <?php if($credit_summ): ?>
                    <div class="bank-summ-wrapper">
                        <p class="grey bank-summ-txt">Сумма</p>
                        <p class="black bank-summ-nmb">
                         <?php echo $credit_summ; ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    <?php if($credit_term): ?>
                    <div class="bank-year-wrapper">
                        <p class="grey bank-year">Срок</p>
                        <p class="black bank-year-nmb"><?php echo $credit_term; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($credit_psk): ?>
                    <div class="bank-psk-wrapper">
                        <div class="psk-inner">
                            <p class="grey bank-psk">ПСК <img src="<?=get_template_directory_uri()?>/images/info-circle.svg" alt="info icon"></p>
                            <p class="black bank-psk-nmb"><?php echo $credit_psk; ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="bank-btn-wrapper flex">
                        <div class="bank-chart-wrapper flex">
                            <img src="<?=get_template_directory_uri()?>/images/bar-chart-01.svg" alt="chart">
                        </div>
                       <button id="btn" class="bank-btn">Оформить</button>
                    </div>
                </div>
                <div class="bank-second-row flex">
                    <div class="bank-tags-wrapper flex">
                        <?php $tags = get_the_tags(); if ($tags) { foreach ($tags as $tag) 
                        { echo '<div class="bank-tag"><span class="black">' . esc_html($tag->name) . '</span></div>'; } } ?>
                    </div>
                    <?php if($credit_link): ?>
                    <div class="bank-more-info-wrapper">
                        <a href="<?php echo $credit_link; ?>" class="bank-more-info-link">
                            <span class="bank-more-info-icon flex"><img src="<?=get_template_directory_uri()?>/images/info-circle-green.svg" alt="green info circle"></span>
                            Подробнее
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
<?php endwhile; wp_reset_postdata(); ?>
        </div>
    </section>
<?php get_footer(); ?>