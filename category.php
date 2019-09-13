<?php
get_header();
?>
<section id="body">
    <div id="article-page" class="page-body">
        <div class="breadcrumb">
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li><a href="<?php echo home_url() ?>" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li class="uk-active"><a href="<?php echo get_category_link($wp_query->get_queried_object_id()) ?>" title="<?php echo single_cat_title() ?>"><?php echo single_cat_title() ?></a></li>
                </ul>
            </div>
        </div><!-- .breadcrumb -->
        <section class="artcatalogue">
            <div class="uk-container uk-container-center">
                <header class="panel-head" style="margin-bottom:40px;">
                    <h1 class="heading-1"><span><?php echo single_cat_title() ?></span></h1>
                </header>

                <section class="panel-body">
                    <ul class="uk-list uk-clearfix uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 list-blog">
                        <?php
                        if (have_posts()):
                            while (have_posts()):
                                ?>
                                <li>
                                    <div class="blog">
                                        <div class="thumb"><a href="luu-y-hanh-gia-dang-tu-hanh-theo-chanh-phap-a1104.html" title="LƯU Ý HÀNH GIẢ ĐANG TU HÀNH THEO CHÁNH PHÁP" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="LƯU Ý HÀNH GIẢ ĐANG TU HÀNH THEO CHÁNH PHÁP" /></a></div>
                                        <div class="info">
                                            <h3 class="title"><a href="luu-y-hanh-gia-dang-tu-hanh-theo-chanh-phap-a1104.html" title="LƯU Ý HÀNH GIẢ ĐANG TU HÀNH THEO CHÁNH PHÁP">LƯU Ý HÀNH GIẢ ĐANG TU HÀNH THEO CHÁNH PHÁP</a></h3>
                                            <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                                <span>12:46:06 01/03/2019</span>
                                                <span>Đã xem: 801</span>
                                                <!--<span>Phản hồi: 0</span>-->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            endwhile;
                        endif;
                        ?>


                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="tu-mot-phap-mot-phap-tu-a728.html" title="TU MỘT PHÁP, MỘT PHÁP TU" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="TU MỘT PHÁP, MỘT PHÁP TU" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="tu-mot-phap-mot-phap-tu-a728.html" title="TU MỘT PHÁP, MỘT PHÁP TU">TU MỘT PHÁP, MỘT PHÁP TU</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>09:22:44 18/09/2017</span>
                                        <span>Đã xem: 2268</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="phuong-phap-de-ly-duc-va-ly-bat-thien-phap-a555.html" title="PHƯƠNG PHÁP ĐỂ LY DỤC VÀ LY BẤT THIỆN PHÁP" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="PHƯƠNG PHÁP ĐỂ LY DỤC VÀ LY BẤT THIỆN PHÁP" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="phuong-phap-de-ly-duc-va-ly-bat-thien-phap-a555.html" title="PHƯƠNG PHÁP ĐỂ LY DỤC VÀ LY BẤT THIỆN PHÁP">PHƯƠNG PHÁP ĐỂ LY DỤC VÀ LY BẤT THIỆN PHÁP</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>14:24:37 08/09/2017</span>
                                        <span>Đã xem: 618</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="di-kinh-hanh-a444.html" title="ĐI KINH HÀNH" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="ĐI KINH HÀNH" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="di-kinh-hanh-a444.html" title="ĐI KINH HÀNH">ĐI KINH HÀNH</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>10:19:03 06/09/2017</span>
                                        <span>Đã xem: 1958</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="giang-bo-tuc-bai-phap-180-kham-pha-tuyet-voi-tai-sao-phap-nhu-ly-tac-y-nhiem-mau-a195.html" title="GIẢNG BỔ TÚC: Bài pháp 180 - KHÁM PHÁ TUYỆT VỜI! TẠI SAO PHÁP NHƯ LÝ TÁC Ý NHIỆM MẦU!" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="GIẢNG BỔ TÚC: Bài pháp 180 - KHÁM PHÁ TUYỆT VỜI! TẠI SAO PHÁP NHƯ LÝ TÁC Ý NHIỆM MẦU!" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="giang-bo-tuc-bai-phap-180-kham-pha-tuyet-voi-tai-sao-phap-nhu-ly-tac-y-nhiem-mau-a195.html" title="GIẢNG BỔ TÚC: Bài pháp 180 - KHÁM PHÁ TUYỆT VỜI! TẠI SAO PHÁP NHƯ LÝ TÁC Ý NHIỆM MẦU!">GIẢNG BỔ TÚC: Bài pháp 180 - KHÁM PHÁ TUYỆT VỜI! TẠI SAO PHÁP NHƯ LÝ TÁC Ý NHIỆM MẦU!</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>16:10:12 14/04/2017</span>
                                        <span>Đã xem: 1480</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="bai-phap-179-thay-thanh-thien-khong-dung-kinh-de-giang-phap-a193.html" title="Bài pháp 179: THẦY THANH THIỆN KHÔNG DÙNG KINH ĐỂ GIẢNG PHÁP" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="Bài pháp 179: THẦY THANH THIỆN KHÔNG DÙNG KINH ĐỂ GIẢNG PHÁP" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="bai-phap-179-thay-thanh-thien-khong-dung-kinh-de-giang-phap-a193.html" title="Bài pháp 179: THẦY THANH THIỆN KHÔNG DÙNG KINH ĐỂ GIẢNG PHÁP">Bài pháp 179: THẦY THANH THIỆN KHÔNG DÙNG KINH ĐỂ GIẢNG PHÁP</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>06:09:24 17/03/2017</span>
                                        <span>Đã xem: 1244</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="bai-phap-172-con-tu-duoc-khong-thay-a186.html" title="Bài pháp 172: CON TU ĐƯỢC KHÔNG THẦY?" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="Bài pháp 172: CON TU ĐƯỢC KHÔNG THẦY?" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="bai-phap-172-con-tu-duoc-khong-thay-a186.html" title="Bài pháp 172: CON TU ĐƯỢC KHÔNG THẦY?">Bài pháp 172: CON TU ĐƯỢC KHÔNG THẦY?</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>05:41:09 11/03/2017</span>
                                        <span>Đã xem: 1351</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="bai-phap-168-nguoi-tu-hanh-co-nen-doi-ten-khong-a180.html" title="Bài pháp 168: NGƯỜI TU HÀNH CÓ NÊN ĐỔI TÊN KHÔNG?" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="Bài pháp 168: NGƯỜI TU HÀNH CÓ NÊN ĐỔI TÊN KHÔNG?" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="bai-phap-168-nguoi-tu-hanh-co-nen-doi-ten-khong-a180.html" title="Bài pháp 168: NGƯỜI TU HÀNH CÓ NÊN ĐỔI TÊN KHÔNG?">Bài pháp 168: NGƯỜI TU HÀNH CÓ NÊN ĐỔI TÊN KHÔNG?</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>10:52:38 01/03/2017</span>
                                        <span>Đã xem: 1667</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog">
                                <div class="thumb"><a href="bai-phap-162-hanh-gia-viet-hanh-gia-hoi-a175.html" title="Bài pháp 162: HÀNH GIẢ VIẾT, HÀNH GIẢ HỎI" class="image img-cover"><img src="/uploads/images/post/phap-thuc-hanh/phap-thuc-hanh-2/maxresdefault-4-.jpg" alt="Bài pháp 162: HÀNH GIẢ VIẾT, HÀNH GIẢ HỎI" /></a></div>
                                <div class="info">
                                    <h3 class="title"><a href="bai-phap-162-hanh-gia-viet-hanh-gia-hoi-a175.html" title="Bài pháp 162: HÀNH GIẢ VIẾT, HÀNH GIẢ HỎI">Bài pháp 162: HÀNH GIẢ VIẾT, HÀNH GIẢ HỎI</a></h3>
                                    <div class="meta uk-flex uk-flex-middle uk-flex-space-between">
                                        <span>16:59:44 22/02/2017</span>
                                        <span>Đã xem: 1005</span>
                                        <!--<span>Phản hồi: 0</span>-->
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section><!-- .panel-body -->
                <footer class="panel-foot">
                    <div class="pagination mb30"><ul class="uk-pagination uk-pagination-right"><li class="uk-active"><a>1</a></li><li><a href="http://phatphap.thegioiweb.org/phap-thuc-hanh/trang-2.html" data-ci-pagination-page="2" rel="start">2</a></li><li><a href="http://phatphap.thegioiweb.org/phap-thuc-hanh/trang-3.html" data-ci-pagination-page="3">3</a></li><li><a href="http://phatphap.thegioiweb.org/phap-thuc-hanh/trang-2.html" data-ci-pagination-page="2" rel="next">&gt;</a></li><li><a href="http://phatphap.thegioiweb.org/phap-thuc-hanh/trang-4.html" data-ci-pagination-page="4">&rsaquo;</a></li></ul></div>			</footer>
            </div>
        </section><!-- .artcatalogue -->
    </div><!-- .page-body -->
</section><!-- #body -->

<?php
get_footer();
