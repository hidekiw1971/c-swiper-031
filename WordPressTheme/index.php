<?php get_header(); ?>
<main>
    <h3>index.php</h3>

    <?php
    $args = array(
        'posts_per_page' => 10,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );
    $my_query = new WP_Query($args);
    ?>

    <!-- 投稿件数表示 -->
    <p>Total Posts: <?php echo $my_query->found_posts; ?></p>
    <!-- /投稿件数表示 -->

    <!-- /クエリ設定 -->
    <!-- loop処理 -->
    <!-- kensho -->
    <ul class="xxx-ul">
        <?php if ($my_query->have_posts()) : ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <li class="xxx-li">
                    <a class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            $swiper_url = get_post_meta(get_the_ID(), 'swiper_url', true);
                            if (!empty($swiper_url)) {
                                $swiper_url_array = explode(',', $swiper_url);
                                foreach ($swiper_url_array as $swiper) {
                                    if (!empty($swiper)) {
                                        echo "
                                        <div class='swiper-slide'>
                                            <figure class='swiper-figure'>
                                                <img src='" . $swiper . "' alt=''>
                                            </figure>
                                        </div>
                                        <!-- swiper-slide -->
                                        ";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </a>
                </li>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </ul>
    <!-- kensho -->
</main>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<?php get_footer(); ?>