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



