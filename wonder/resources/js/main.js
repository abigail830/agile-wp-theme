$(document).ready(function () {
    $('.menus_active_btn').on('click','',function () {
        $('.header-menus__ul').toggleClass('active')
    })
});

$(document).ready(function () {
    new Swiper('#home-banner .swiper-container', {
        autoplay: true,
        keyboard: true,
        loop: true,
        effect: 'fade',
        pagination: {
            el: '#home-banner .swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '#home-banner .swiper-button-next',
            prevEl: '#home-banner .swiper-button-prev'
        }
    });
});



// home-menus
$(document).ready(function () {
	
    if ($('.home-news__nav').length === 1) {
        var HomeNewsSwiper = new Swiper('#home-news .swiper-container', {
            autoplay: false,
            allowTouchMove: false,
            // effect : 'fade',
            on: {
                slideChangeTransitionEnd: function () {
                    // 调整位置时,改变 active 指向
                    var activeIndex = this.activeIndex
                    $('#home-news .home-news__nav .menu-item').each(function (index) {
                        if (index === activeIndex) {
                            $(this).addClass('active')
                        } else {
                            $(this).removeClass('active')
                        }
                    })
                }
            }
        });

        $('.home-news__nav').on('click', 'a', function () {
            event.stopPropagation();
            event.preventDefault();

            var item_id = parseInt($(this).data('id'));

            // 点击按钮跳转到对应分类
            $('#home-news .swiper-slide').each(function (index) {
                if ($(this).hasClass('menu-item-' + item_id)) {
                    HomeNewsSwiper.slideTo(index);
                }
            })

        });
    }
});




$(document).ready(function () {
    if ($('#home-snapshot').length === 1) {
        new Swiper('#home-snapshot .swiper-container', {
            autoplay: true,
            loop: true,
            slidesPerView: 4
        });
    }
});



$(document).ready(function(){
    window.init = function () {
        var amap = new AMap.Map('amap', {
            resizeEnable: true,
            zoom: 15,
            center: [23.123919, 113.324250]
        });
        var marker = new AMap.Marker({
            position: [23.124433, 113.321857]
        });
        marker.setMap(amap);
        amap.setCenter(marker.getPosition())
        marker.on('click', function (e) {
            infowindow.open(amap, e.target.getPosition());
        });
        var logo = "";
        var infowindow = new AMap.InfoWindow({
            content: '<div class="clearfix"><div class="content-box"><h1 class="title">雅居乐基金会</h1></div><div class="content">广州市天河区珠江新城华夏路26号雅居乐中心33楼</div></div>',
            offset: new AMap.Pixel(0, -30),
            size: new AMap.Size(300, 0)
        });
        infowindow.open(amap, marker.getPosition());
        amap.panBy(-330,50);
    }
})