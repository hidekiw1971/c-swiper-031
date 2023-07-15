
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
    // setting
    const swiper = new Swiper('.swiper', {
        autoplay: {
            delay: 1000,
        },
        loop: true,
    });
    // /setting
});
