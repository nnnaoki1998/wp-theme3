$(function () {
    'use strict';

    // bgSwitcher
    $(document).ready(function () {
        $("#sec_top").bgSwitcher({
            images: [
                "http://benisakura.local/wp-content/themes/izakaya-theme3/img/rice.jpeg",
                "http://benisakura.local/wp-content/themes/izakaya-theme3/img/sashimi.jpg"
            ], // 切替背景画像を指定
            interval: 5000, // 背景画像を切り替える間隔を指定 3000=3秒
            loop: true, // 切り替えを繰り返すか指定 true=繰り返す　false=繰り返さない
            shuffle: false, // 背景画像の順番をシャッフルするか指定 true=する　false=しない
            effect: "fade", // エフェクトの種類をfade,blind,clip,slide,drop,hideから指定
            duration: 1000, // エフェクトの時間を指定します。
            easing: "swing" // エフェクトのイージングをlinear,swingから指定
        });
    });


    // mainの横幅調整
    function mainWidthAdjust() {
        if (window.innerWidth >= 992) {
            $('main').width(window.innerWidth - $('#side').width());
        } else {
            $('main').width(window.innerWidth);
        }
    }
    mainWidthAdjust();
    $(window).resize(function () {
        mainWidthAdjust();
    });


    // .main-imgの横幅,高さ調整
    function gallaryWidthAdjust() {
        if (window.innerWidth >= 992) {
            $('.main-img img').width(window.innerWidth - $('#side').width() - $('.thumb').width());
            $('.main-img img').height(window.innerHeight);
            $('.thumb').height(window.innerHeight);
            $('.main-img img').css('margin-top', '');
        } else if (window.innerWidth >= 768) {
            $('.main-img img').width(window.innerWidth - $('.thumb').width());
            $('.main-img img').height(window.innerHeight - $('#side').height());
            $('.thumb').height(window.innerHeight - $('#side').height());
            $('.main-img img').css('margin-top', '');
        } else {
            $('.main-img img').width(window.innerWidth);
            $('.main-img img').height(window.innerHeight - $('#side').height() - $('.thumb').height());
            $('.thumb').height("");
            $('.main-img img').css('margin-top', $('.thumb').height());
        }
    }
    gallaryWidthAdjust();
    $(window).resize(function () {
        gallaryWidthAdjust();
    });


    // sectionの高さ調整
    function secHeightAdjust() {
        if (window.innerWidth >= 992) {
            $('section').height(window.innerHeight);
        } else {
            $('section').height(window.innerHeight - $('#side').height());
        }
    }
    secHeightAdjust();
    $(window).resize(function () {
        secHeightAdjust();
    });


    // mainのmargin-top調整
    function mainMarginTop() {
        if (window.innerWidth >= 992) {
            $('main').css('margin-top', '');
        } else {
            $('main').css('margin-top', $('#side').height() + 'px');
        }
    }
    mainMarginTop();
    $(window).resize(function () {
        mainMarginTop();
    });


    // #sec_gallaryの作成
    var album = [
        'http://benisakura.local/wp-content/themes/izakaya-theme3/img/sashimi.jpg',
        'http://benisakura.local/wp-content/themes/izakaya-theme3/img/restaurant.jpeg',
        'http://benisakura.local/wp-content/themes/izakaya-theme3/img/steak.jpg',
        'http://benisakura.local/wp-content/themes/izakaya-theme3/img/rice.jpeg',
        'http://benisakura.local/wp-content/themes/izakaya-theme3/img/pub_counter.jpg',
        'http://benisakura.local/wp-content/themes/izakaya-theme3/img/food.jpeg'
    ];

    $('.front-img').attr('src', album[0]);

    for (var i = 0; i < album.length; i++) {  //.thumbの作成
        var thumbImg = $('<img>', {
            src: album[i]
        });
        $('.thumb-inner').append(thumbImg);
    }

    function thumbImgResize() {
        if (window.innerWidth >= 768) {
            $('.thumb img').width('');
            $('.thumb img').height($('.thumb').width() * 0.75);
            $('.thumb-inner').width('');
        } else {
            $('.thumb img').height('');
            $('.thumb img').width($('.thumb img').height() * 1.33);
            $('.thumb-inner').width($('.thumb img').width() * album.length);
        }
    }
    thumbImgResize();
    $(window).resize(function () {
        thumbImgResize();
    });


    $('.thumb').click(function (event) {  //.thumbクリック時の動作
        if (event.target.src) {
            $('.back-img').attr('src', event.target.src);
            $('.front-img').fadeOut(300);
            setTimeout(function () {
                $('.front-img').attr('src', event.target.src);
                $('.front-img').fadeIn(1);
            }, 300);
        }
    });


    // googleMaps
    $(document).ready(function () {
        function initMap() {

            var target = document.getElementById("google_maps");
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                address: '長崎駅'
            }, function (results, status) {
                // results[0].geometry.location
                if (status === 'OK' && results[0]) {
                    var map = new google.maps.Map(target, {
                        center: results[0].geometry.location,
                        zoom: 15,
                        disableDefaultUI: true,
                        zoomControl: true,
                        clickableIcons: false
                    });

                    new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map,
                        title: '紅桜',
                    });
                }
            })
        }
        initMap();
    });


    // <a>クリック時のアニメーション
    $('a').click(function (event) {
        event.preventDefault();
        var topSpace;
        if (window.innerWidth >= 992) {
            topSpace = 0;
        } else {
            topSpace = $('#side').height();
        }
        $("body,html").animate({
            scrollTop: $($(this).attr('href')).offset().top - topSpace
        }, 500);
    });
});