</section><!-- #body -->
<footer class="footer">

</footer><!--.footer -->


<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer>{
        lang: 'vi'
    }</script>	<div id="offcanvas" class="uk-offcanvas offcanvas">
    <div class="uk-offcanvas-bar">
        <form class="uk-search" action="tim-kiem-san-pham.html" data-uk-search="{}">
            <input class="uk-search-field" type="search" name="keyword" placeholder="Tìm kiếm...">
        </form>

        <ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav>
            <li class="l1 ">
                <a href="." title="Trang chủ" class="l1">Trang chủ</a>
            </li>
            <li class="l1 ">
                <a href="sach-goi-dau-tu-tap.html" title="Sách gối đầu tu tập" class="l1">Sách gối đầu tu tập</a>
            </li>
            <li class="l1 ">
                <a href="phap-thuc-hanh.html" title="Pháp thực hành" class="l1">Pháp thực hành</a>
            </li>
            <li class="l1 ">
                <a href="thay-thanh-thien.html" title="Thầy Thanh Thiện" class="l1">Thầy Thanh Thiện</a>
            </li>
            <li class="l1 ">
                <a href="cac-bai-giang-phap.html" title="Các bài giảng pháp" class="l1">Các bài giảng pháp</a>
            </li>
            <li class="l1 ">
                <a href="lien-he.html" title="Liên hệ" class="l1">Liên hệ</a>
            </li>
        </ul>
    </div>
</div><!-- #offcanvas -->	
<script src="<?= get_template_directory_uri() ?>/old_files/uikit/js/components/slider.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/uikit/js/components/slideshow.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/uikit/js/components/sticky.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/uikit/js/components/accordion.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/uikit/js/components/lightbox.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/plugins/Readmore/readmore.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/plugins/lightslider-master/dist/js/lightslider.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/function.js"></script>
<script src="<?= get_template_directory_uri() ?>/old_files/library/js/library.js"></script>

<script type="text/javascript">
    /*! Lazy Load 1.9.3 - MIT license - Copyright 2010-2013 Mika Tuupola */
    !function (a, b, c, d) {
        var e = a(b);
        a.fn.lazyload = function (f) {
            function g() {
                var b = 0;
                i.each(function () {
                    var c = a(this);
                    if (!j.skip_invisible || c.is(":visible"))
                        if (a.abovethetop(this, j) || a.leftofbegin(this, j))
                            ;
                        else if (a.belowthefold(this, j) || a.rightoffold(this, j)) {
                            if (++b > j.failure_limit)
                                return!1
                        } else
                            c.trigger("appear"), b = 0
                })
            }
            var h, i = this, j = {threshold: 0, failure_limit: 0, event: "scroll", effect: "show", container: b, data_attribute: "original", skip_invisible: !0, appear: null, load: null, placeholder: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};
            return f && (d !== f.failurelimit && (f.failure_limit = f.failurelimit, delete f.failurelimit), d !== f.effectspeed && (f.effect_speed = f.effectspeed, delete f.effectspeed), a.extend(j, f)), h = j.container === d || j.container === b ? e : a(j.container), 0 === j.event.indexOf("scroll") && h.bind(j.event, function () {
                return g()
            }), this.each(function () {
                var b = this, c = a(b);
                b.loaded = !1, (c.attr("src") === d || c.attr("src") === !1) && c.is("img") && c.attr("src", j.placeholder), c.one("appear", function () {
                    if (!this.loaded) {
                        if (j.appear) {
                            var d = i.length;
                            j.appear.call(b, d, j)
                        }
                        a("<img />").bind("load", function () {
                            var d = c.attr("data-" + j.data_attribute);
                            c.hide(), c.is("img") ? c.attr("src", d) : c.css("background-image", "url('" + d + "')"), c[j.effect](j.effect_speed), b.loaded = !0;
                            var e = a.grep(i, function (a) {
                                return!a.loaded
                            });
                            if (i = a(e), j.load) {
                                var f = i.length;
                                j.load.call(b, f, j)
                            }
                        }).attr("src", c.attr("data-" + j.data_attribute))
                    }
                }), 0 !== j.event.indexOf("scroll") && c.bind(j.event, function () {
                    b.loaded || c.trigger("appear")
                })
            }), e.bind("resize", function () {
                g()
            }), /(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion) && e.bind("pageshow", function (b) {
                b.originalEvent && b.originalEvent.persisted && i.each(function () {
                    a(this).trigger("appear")
                })
            }), a(c).ready(function () {
                g()
            }), this
        }, a.belowthefold = function (c, f) {
            var g;
            return g = f.container === d || f.container === b ? (b.innerHeight ? b.innerHeight : e.height()) + e.scrollTop() : a(f.container).offset().top + a(f.container).height(), g <= a(c).offset().top - f.threshold
        }, a.rightoffold = function (c, f) {
            var g;
            return g = f.container === d || f.container === b ? e.width() + e.scrollLeft() : a(f.container).offset().left + a(f.container).width(), g <= a(c).offset().left - f.threshold
        }, a.abovethetop = function (c, f) {
            var g;
            return g = f.container === d || f.container === b ? e.scrollTop() : a(f.container).offset().top, g >= a(c).offset().top + f.threshold + a(c).height()
        }, a.leftofbegin = function (c, f) {
            var g;
            return g = f.container === d || f.container === b ? e.scrollLeft() : a(f.container).offset().left, g >= a(c).offset().left + f.threshold + a(c).width()
        }, a.inviewport = function (b, c) {
            return!(a.rightoffold(b, c) || a.leftofbegin(b, c) || a.belowthefold(b, c) || a.abovethetop(b, c))
        }, a.extend(a.expr[":"], {"below-the-fold": function (b) {
                return a.belowthefold(b, {threshold: 0})
            }, "above-the-top": function (b) {
                return!a.belowthefold(b, {threshold: 0})
            }, "right-of-screen": function (b) {
                return a.rightoffold(b, {threshold: 0})
            }, "left-of-screen": function (b) {
                return!a.rightoffold(b, {threshold: 0})
            }, "in-viewport": function (b) {
                return a.inviewport(b, {threshold: 0})
            }, "above-the-fold": function (b) {
                return!a.belowthefold(b, {threshold: 0})
            }, "right-of-fold": function (b) {
                return a.rightoffold(b, {threshold: 0})
            }, "left-of-fold": function (b) {
                return!a.rightoffold(b, {threshold: 0})
            }})
    }(jQuery, window, document);
    /*! Lazy Load 1.9.3 - MIT license - Copyright 2010-2013 Mika Tuupola */
    !function () {
        var a = jQuery.event.special, b = "D" + +new Date, c = "D" + (+new Date + 1);
        a.scrollstart = {setup: function () {
                var c, d = function (b) {
                    var d = this, e = arguments;
                    c ? clearTimeout(c) : (b.type = "scrollstart", jQuery.event.dispatch.apply(d, e)), c = setTimeout(function () {
                        c = null
                    }, a.scrollstop.latency)
                };
                jQuery(this).bind("scroll", d).data(b, d)
            }, teardown: function () {
                jQuery(this).unbind("scroll", jQuery(this).data(b))
            }}, a.scrollstop = {latency: 300, setup: function () {
                var b, d = function (c) {
                    var d = this, e = arguments;
                    b && clearTimeout(b), b = setTimeout(function () {
                        b = null, c.type = "scrollstop", jQuery.event.dispatch.apply(d, e)
                    }, a.scrollstop.latency)
                };
                jQuery(this).bind("scroll", d).data(c, d)
            }, teardown: function () {
                jQuery(this).unbind("scroll", jQuery(this).data(c))
            }}
    }();

    $(document).ready(function () {
        $("img.lazy").lazyload({effect: "fadeIn"})
    });
</script>

<script src="templates/acore/function.js" type="text/javascript"></script>

<div id="modal-cart" class="uk-modal">
    <div class="uk-modal-dialog" style="width:768px;">
        <a class="uk-modal-close uk-close"></a>
        <div class="cart-content">


        </div>
    </div>
</div>

<div id="modal-alert" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-small">
        <a class="uk-modal-close uk-close"></a>
        <div class="alert-content"></div>
    </div>
</div>


<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer>{
        lang: 'vi'
    }</script>
<?php wp_footer() ?>
</body>
</html>