<?php get_header() ?>
<div id="homepage">
    <section class="main-slide">
        <div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 7500, animation: 'random-fx'}">
            <ul class="uk-slideshow">

                <li><img class="lazy" data-original="/uploads/images/logo/slide.png" src="/uploads/images/logo/slide.png" alt="/uploads/images/logo/slide.png" /></li>
            </ul>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                <li data-uk-slideshow-item="0"><a href=""></a></li>
            </ul>
        </div>
    </section><!-- .main-slide -->

    <section class="homepage-intro">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-2">
                <div class="intro-wrapper">
                    <h2 class="title">Quý vị mới đến với đạo phật ?</h2>

                    <div class="description">
                        <p><strong>Cái nhìn tổng quát ngắn gọn và lời khuyên thiết thực</strong></p>

                        <p>Thông suốt lý thuyết chưa chắc đã tu hành được. Nhưng tu hành được thì sẽ thông suốt lý thuyết. Nói lý thuyết thì hay mà không thể nào tu hành được. Ngược lại, tu hành được tuy nói không hay, nhưng mà chính xác. Cho nên, hành giả đọc kinh sách đức Trưởng Lão chỉ đọc cho biết khái niệm mà thôi. Rồi, chuyên cần theo thầy Thanh Thiện hướng dẫn tu tập cho tâm quen thuộc y như tập thể dục hàng ngày. Khi nào tâm quen thuộc pháp Phật, hành giả tiến đến tinh tấn, tích cực tu tập thì hành giả đạt được mong muốn là điều hiển nhiên.</p>

                        <p><em><strong>Tỳ kheo Thích Thanh Thiện</strong></em></p>
                    </div>
                </div>

                <div class="intro-slide">
                    <section class="main-slide">
                        <div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 7500, animation: 'random-fx'}">
                            <ul class="uk-slideshow">
                                <li><a href="" title="" class="image img-cover"><img class="lazy" data-original="/uploads/images/slide/einstein-1.png" src="/uploads/images/slide/einstein-1.png" alt="/uploads/images/slide/einstein-1.png" /></a></li>
                                <li><a href="" title="" class="image img-cover"><img class="lazy" data-original="/uploads/images/slide/thay-mc-4.png" src="/uploads/images/slide/thay-mc-4.png" alt="/uploads/images/slide/thay-mc-4.png" /></a></li>
                                <li><a href="" title="" class="image img-cover"><img class="lazy" data-original="/uploads/images/slide/untitled-1.png" src="/uploads/images/slide/untitled-1.png" alt="/uploads/images/slide/untitled-1.png" /></a></li>
                            </ul>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                <li data-uk-slideshow-item="0"><a href=""></a></li>
                                <li data-uk-slideshow-item="1"><a href=""></a></li>
                                <li data-uk-slideshow-item="2"><a href=""></a></li>
                            </ul>
                        </div>
                    </section><!-- .main-slide -->
                </div>

            </div>
        </div>
    </section>
    <?php
    $homePageCatgories = [9, 4];
    foreach ($homePageCatgories as $categoryId):
        $args = array(
            'posts_per_page' => get_theme_mod("home_page_number_rows_post") * 3,
            "numberposts" => get_theme_mod("home_page_number_rows_post") * 3,
            'offset' => 0,
            'cat' => $categoryId,
            'category_name' => '',
            'orderby' => 'date',
            'order' => 'DESC',
            'include' => '',
            'exclude' => '',
            'meta_key' => '',
            'meta_value' => '',
            'post_type' => 'post',
            'post_mime_type' => '',
            'post_parent' => '',
            'author' => '',
            'author_name' => '',
            'post_status' => 'publish',
            'suppress_filters' => true,
            'fields' => '',
        );
        $posts = get_posts($args);
//                    $posts = get_posts([
//                    "numberposts" => 6,
//                    "category" => $categoryId,
//                    'post_status' => 'publish',
//                    ]);
        ?> 
        <section class="homepage-blog">
            <div class="uk-container uk-container-center">
                <header class="panel-head">
                    <h2 class="heading-1"><a href="<?php echo get_category_link($categoryId) ?>" title="<?php echo get_the_category_by_ID($categoryId) ?>"><?php echo get_the_category_by_ID($categoryId) ?></a></h2>
                </header>
                <section class="panel-body">
                    <ul class = "uk-list uk-clearfix uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 list-blog">
                        <?php foreach ($posts as $post): ?>
                            <li data-post-id="<?php echo get_the_ID(); ?>">
                                <div class="blog new">
                                    <div class="thumb">
                                        <a href="<?= the_permalink() ?>" title="<?= the_title() ?>" class="image img-cover">
                                            <img src="<?= the_post_thumbnail_url(); ?>" alt="<?= the_title() ?>" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <h3 class="title">
                                            <a href="<?= the_permalink() ?>" title="<?= the_title() ?>"><?= the_title() ?>
                                            </a>
                                        </h3>
                                        <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                                <!--<span>12:46:06 01/03/2019</span>-->
                                            <span>Đã xem: <?php echo number_format(pvc_get_post_views(get_the_ID())) ?></span>
                                            <span></span>															<!--<span>Phản hồi: 0</span>-->
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </section>
            </div>
        </section>
    <?php endforeach; ?>
    <section class="homepage-question">
        <div class="uk-container uk-container-center">
            <header class="panel-head"><h2 class="heading-2"><a href="tra-loi-doc-gia.html" title="Trả lời độc giả">Trả lời độc giả</a></h2></header>
            <section class="panel-body">
                <ul class="uk-list uk-clearfix uk-grid uk-grid-width-medium-1-2 uk-grid-width-large-1-3 list-question">
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="thuc-uan-va-tam-minh-a1105.html" title="THỨC UẨN và TAM MINH">THỨC UẨN và TAM MINH </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 05:14:10 04/03/2019</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-121-binh-phamvan-a1095.html" title="TRẢ LỜI THƯ BẠN ĐỌC  121.- binh phamvan ">TRẢ LỜI THƯ BẠN ĐỌC  121.- binh phamvan  </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:56:50 22/09/2017</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-120-nguoi-dua-do-tan-tuy-a1094.html" title="TRẢ LỜI THƯ BẠN ĐỌC  120.- NGƯỜI ĐƯA ĐÒ TẬN TỤY.">TRẢ LỜI THƯ BẠN ĐỌC  120.- NGƯỜI ĐƯA ĐÒ TẬN TỤY. </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:56:28 22/09/2017</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-119-bichly-le-a1093.html" title="TRẢ LỜI THƯ BAN ĐỌC  119. bichly le ">TRẢ LỜI THƯ BAN ĐỌC  119. bichly le  </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:56:06 22/09/2017</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-118-nguoi-lai-do-tan-tuy-a1092.html" title="TRẢ LỜI THƯ BẠN ĐỌC  118.- NGƯỜI LÁI ĐÒ TẬN TỤY">TRẢ LỜI THƯ BẠN ĐỌC  118.- NGƯỜI LÁI ĐÒ TẬN TỤY </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:55:47 22/09/2017</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-117-nguoi-lai-do-tan-tuy-a1091.html" title="TRẢ LỜI THƯ BẠN ĐỌC  117.- NGƯỜI LÁI ĐÒ TẬN TỤY">TRẢ LỜI THƯ BẠN ĐỌC  117.- NGƯỜI LÁI ĐÒ TẬN TỤY </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:55:26 22/09/2017</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-116-nguyen-thuy-a1090.html" title="TRẢ LỜI THƯ BẠN ĐỌC  116.- nguyen thuy">TRẢ LỜI THƯ BẠN ĐỌC  116.- nguyen thuy </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:55:07 22/09/2017</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-115-dinh-thanh-a1089.html" title="TRẢ LỜI THƯ BẠN ĐỌC  115.- Dinh Thanh">TRẢ LỜI THƯ BẠN ĐỌC  115.- Dinh Thanh </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:54:46 22/09/2017</div>
                        </div>
                    </li>
                    <li>
                        <div class="question">
                            <h3 class="title"><a href="tra-loi-thu-ban-doc-114-ha-vu-a1088.html" title="TRẢ LỜI THƯ BẠN ĐỌC  114.- Ha Vu">TRẢ LỜI THƯ BẠN ĐỌC  114.- Ha Vu </a></h3>
                            <div class="created"><i class="fa fa-clock-o"></i> 14:54:29 22/09/2017</div>
                        </div>
                    </li>
                </ul>
            </section>
        </div>
    </section>


    <section class="homepage-speaker">
        <div class="uk-container uk-container-center">
            <header class="panel-head"><h2 class="heading-1 uk-text-left"><a href="phap-am.html" title="Pháp âm">Pháp âm</a></h2>
                <div class="description"><p>Toàn bộ các bài giảng của Thầy Thanh Thiện được đọc tại đây. Mời các bạn đón nghe:<br />
                        (Link download mp3: https://drive.google.com/open?id=0BzAYGNUdKiLyVWJuWlZWb0FwQlE)</p></div>
            </header>
            <section class="panel-body">
                <iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/297973089&color=%23ff5500&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
            </section>
        </div>
    </section>

</div>
<?php get_footer() ?>