<?php
function menuOutput($postType, $menuCategories) {
    $args = array(
        'posts_per_page' => 3000,
        'post_type' => $postType,
        'post_status' => 'publish'
    );
    $the_query = new WP_Query($args);
    if ($the_query -> have_posts()):
        for ($i = 0; $i < count($menuCategories); $i++):
        ?>
<h3><?php echo $menuCategories[$i]; ?></h3>
<ul>
    <?php
            while ($the_query -> have_posts()): $the_query -> the_post();
                if (get_field('menu_category') == $menuCategories[$i]):
    ?>
    <li>
        <dl>
            <dt><?php the_field('menu_name'); ?></dt>
            <dd><?php the_field('menu_price'); ?>円</dd>
        </dl>
    </li>
    <?php
                endif;
            endwhile;
        ?>
</ul>
<?php
        endfor;
    endif;
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/logo_square.jpg" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <!-- animate -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
    <!-- style.css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <!-- jquery -->
    <?php wp_enqueue_script('jquery'); ?>
</head>

<body>
    <main>
        <div class="wrapper">
            <section id="sec_top">
                <h1 class="text-center">季節を感じる料理を</h1>
                <div class="scrolldown text-center">
                    <a href="#sec_food">
                        <span>進む</span>
                        <div class="scrolldown-arrow">
                            <div class="scrolldown-arrowline1"></div>
                            <div class="scrolldown-arrowline2"></div>
                            <div class="scrolldown-arrowline3"></div>
                        </div>
                    </a>
                </div>
            </section>
            <section id="sec_food" class="y-center">
                <div class="inner w-100">
                    <h1 class="text-center">お品書き</h1>
                    <div class="menulist row mx-0">
                        <div class="left-menulist col-12 col-sm-6">
                            <?php
                            $menuCategories = array('サラダ', '一品物', '煮物', '汁物');
                            menuOutput('menu', $menuCategories);
                            ?>
                        </div>
                        <div class="right-menulist col-12 col-sm-6">
                            <?php
                            $menuCategories = array('焼き物', '揚げ物', 'お造り', '〆のお食事');
                            menuOutput('menu', $menuCategories);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="scrolldown text-center">
                    <a href="#sec_sake">
                        <span>進む</span>
                        <div class="scrolldown-arrow">
                            <div class="scrolldown-arrowline1"></div>
                            <div class="scrolldown-arrowline2"></div>
                            <div class="scrolldown-arrowline3"></div>
                        </div>
                    </a>
                </div>
            </section>
            <section id="sec_sake" class="y-center">
                <div class="inner w-100">
                    <h1 class="text-center">酒</h1>
                    <div class="menulist row mx-0">
                        <div class="left-menulist col-12 col-sm-6">
                            <?php
                            $menuCategories = array('日本酒', '焼酎', '果実酒');
                            menuOutput('sake', $menuCategories);
                            ?>
                        </div>
                        <div class="right-menulist col-12 col-sm-6">
                            <?php
                            $menuCategories = array('ビール', '酎ハイ');
                            menuOutput('sake', $menuCategories);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="scrolldown text-center">
                    <a href="#sec_gallary">
                        <span>進む</span>
                        <div class="scrolldown-arrow">
                            <div class="scrolldown-arrowline1"></div>
                            <div class="scrolldown-arrowline2"></div>
                            <div class="scrolldown-arrowline3"></div>
                        </div>
                    </a>
                </div>
            </section>
            <section id="sec_gallary">
                <div class="main-img">
                    <img src="" class="back-img">
                    <img src="" class="front-img">
                </div>
                <div class="thumb">
                    <div class="thumb-inner"></div>
                </div>
                <div class="scrolldown text-center">
                    <a href="#sec_access">
                        <span>進む</span>
                        <div class="scrolldown-arrow">
                            <div class="scrolldown-arrowline1"></div>
                            <div class="scrolldown-arrowline2"></div>
                            <div class="scrolldown-arrowline3"></div>
                        </div>
                    </a>
                </div>
            </section>
            <section id="sec_access" class="y-center">
                <div class="inner text-center w-100">
                    <h1>アクセス</h1>
                    <h2>〒412-0054 長崎県長崎市住吉6丁目2-52</h2>
                    <h2>080-2342-5326</h2>
                    <h2>17時~24時(LO:23時半)</h2>
                    <div id="google_maps"></div>
                </div>
            </section>
        </div>
    </main>
    <aside id="side" class="y-center">
        <div class="inner">
            <div class="logo">
                <a href="#sec_top">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo_cutout.png" class="w-100">
                </a>
            </div>
            <nav class="text-center">
                <ul>
                    <li>
                        <a href="#sec_food"><span>お品書き</span></a>
                    </li>
                    <li>
                        <a href="#sec_sake"><span>酒</span></a>
                    </li>
                    <li>
                        <a href="#sec_gallary"><span>様子</span></a>
                    </li>
                    <li>
                        <a href="#sec_access"><span>アクセス</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- Googlemaps -->
    <script
        src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAdtxao9b-udTRYu7yWgKAxm42DbW4R7ds&libraries=places"
        async defer></script>
    <!--bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- wow -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/wow.js"></script>
    <script>
    new WOW().init();
    </script>
    <!-- jQuery -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.4.1.min.js"></script>
    <!-- bgswitcher -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bgswitcher.js"></script>
    <!-- js -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
</body>

</html>