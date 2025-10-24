// 全体設定

const menu = document.querySelectorAll('.menu');
for (let i = 0; i < menu.length; i++) {
    menu[i].addEventListener('click', () => {
        body.classList.toggle('fixed');
    });
}

const body = document.querySelector('body');
const heroImage = document.querySelector('#home .hero-image');
const contents = document.querySelector('#home .contents');
let previousScrollY = 0;

/* window.addEventListener('scroll', () => {
    if (contents.getBoundingClientRect().top < window.innerHeight) {
        body.classList.add('js-hidden');
        //event.body.scrollTop = event.body.scrollTop;
        //body.scrollTop;
        window.scrollTo({
            top: contents.getBoundingClientRect().top - window.scrollY,
            behavior: 'smooth'
        });
    } else {
        body.classList.remove('js-hidden');
    }
}); */

const onScroll = () => {
    const targetTop = contents.getBoundingClientRect().top;
    const scrollTop = window.pageYOffset;

    if (targetTop <= scrollTop) {
        body.classList.add('js-hidden');
    } else {
        body.classList.remove('js-hidden');
    }
};
window.addEventListener('scroll', onScroll);

/* window.addEventListener('scroll', function() {
    const taeget_position = heroImage.getBoundingClientRect().bottom;
    if (taeget_position < window.innerHeight) {
        heroImage.classList.remove('js-hidden');
    }
}); */

// フェードインアニメーション
const fadein = document.querySelectorAll('.fadein');
for (let i = 0; i < fadein.length; i++) {
    window.addEventListener('scroll', () => {
        const fadeinPosition = fadein[i].getBoundingClientRect().top + 100;
        if (fadeinPosition < window.innerHeight) {
            fadein[i].classList.add('active');
        }
    });
}


// index

// hero-image
const topSlider = new Swiper('.hero-image__slide',{
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    speed: 2000,
    loop: true,
    effect: 'fade',
});

topSlider.on('slideChange', () => {
    document.querySelectorAll('.hero-image__slide video').forEach((video) => {
        video.removeAttribute('autoplay');
    });
    let activeSlide = document.querySelector('.swiper-slide-next');
    let videoElement = activeSlide.querySelector('video');
    if (videoElement) {
        videoElement.autoplay = true;
        videoElement.play();
        videoElement.playbackRate = 0.6;
    }
});

/* topSlider.on('slideChange', () => {
    const slideList = document.querySelectorAll('.hero-image__slide-video');
    slideList.forEach((element) => {
        const slideVideo = element.querySelector('video');
        if (element.classList.contains('swiper-slide-active')) {
            slideVideo.autoplay = true;
            slideVideo.play();
        } else {
            slideVideo.autoplay = false;
            slideVideo.pause();
        }
    });
}); */

/* $('.movie_full').modalVideo({
    channel: 'custom',
    url: 'movie/yamori_full.mp4',
});
$('.movie_s01').modalVideo({
    channel: 'custom',
    url: 'movie/yamori_s01.mp4',
});
$('.movie_s02').modalVideo({
    channel: 'custom',
    url: 'movie/yamori_s02.mp4',
}); */

// index modelhouse
const modelHouseSlider = new Swiper('.modelhouse_slide',{
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    speed: 2000,
    loop: true,
    slidesPerView: 1.5,
    spaceBetween: 20,
    centeredSlides: true,
    breakpoints: {
        600: {
            slidesPerView: 2.5,
        }
    }
});

// index about
let aboutSlider;
function initSwiper() {
    if (window.innerWidth <= 600) {
        if (aboutSlider) {
            aboutSlider.destroy();
            aboutSlider = undefined;
        }
        aboutSlider = new Swiper('.about_slide', {
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            speed: 2000,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
            },
        });
    } else {
        if (aboutSlider) {
            aboutSlider.destroy();
            aboutSlider = undefined;
        }
    }
}
window.addEventListener('load', initSwiper);
window.addEventListener('resize', initSwiper);

// index full
const fullSlider = new Swiper('.full_slide',{
    loop: true,
    slidesPerView: 1,
    speed: 60000,
    allowTouchMove: false,
    autoplay: {
      delay: 0,
      reverseDirection: true,
    },
});

// about
const headerImage = document.querySelector('#about .fv');
window.addEventListener('scroll', () => {
    let scroll = window.scrollY;
    headerImage.style.transform = `scale(${(100+scroll/10)/100})`;
    headerImage.style.top = `${-(scroll/50)}` + '%';
});

const subMenu = document.querySelector('.sub-menu');
const aboutContents = document.querySelector('#about .contents');
window.addEventListener('scroll', () => {
    let position = aboutContents.getBoundingClientRect().top;
    if(position <= 0) {
        subMenu.classList.add('active');
    }
});

const materialSlider = new Swiper('.material_slide',{
    speed: 2000,
    slidesPerView: 2,
    spaceBetween: 50,
    breakpoints: {
        600: {
            slidesPerView: 3,
            spaceBetween: 70,
        },
        1260: {
            slidesPerView: 3,
            spaceBetween: 100,
        },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

// modelhouse
const modelhouseImage = document.querySelector('#modelhouse .fv');
window.addEventListener('scroll', () => {
    let scroll = window.scrollY;
    modelhouseImage.style.transform = `scale(${(100+scroll/10)/100})`;
    modelhouseImage.style.top = `${-(scroll/50)}` + '%';
});

// cose01-04
const animation = document.querySelectorAll('.animation');
for( let i = 0; i < animation.length; i++ ) {
    window.addEventListener('scroll', function() {
        let taeget_position = animation[i].getBoundingClientRect().top + 100;
        if (taeget_position <= window.innerHeight) {
            animation[i].classList.add('blockIn');
        }
    });
}

// works
window.addEventListener('DOMContentLoaded', () => {
    const images = document.querySelectorAll('#works-single .works__data img');
    images.forEach(img => {
        const { naturalWidth, naturalHeight } = img;
        if (naturalHeight > naturalWidth) {
            img.classList.add('vertically-long');
        }
    });
});

/*
window.addEventListener('DOMContentLoaded', () => {
    const images = document.querySelectorAll('#works-single .works__data img');
    for (let i = 0; i < images.length; i++) {
        if(images[i].classList.contains('size-full')) {
            images[i].classList.add('vertically-long');
        }
    }
});*/


// blog
document.addEventListener('DOMContentLoaded', function(){
  // tableタグをwrapperで囲む
  document.querySelectorAll('.blog__data table').forEach(function(table){
    if (!table.parentElement.classList.contains('table-wrapper')) {
      var wrapper = document.createElement('div');
      wrapper.className = 'table-wrapper';
      table.parentNode.insertBefore(wrapper, table);
      wrapper.appendChild(table);
    }
  });

  // youtube埋め込みをwrapperで囲む
  const blogData = document.querySelectorAll('.blog__data iframe');

  blogData.forEach(iframe => {
    const src = iframe.getAttribute('src');
    // YouTubeのURLを含むか確認
    if (src && src.includes('youtube.com')) {
        const wrapper = document.createElement('div');
        wrapper.className = 'youtube';
        iframe.parentNode.insertBefore(wrapper, iframe);
        wrapper.appendChild(iframe);
    }
});

  // ctaボタンに矢印アイコンを追加
  const buttons = document.querySelectorAll('.su-button');

  buttons.forEach(button => {
    const span = button.querySelector('span');
    if (span) {
        span.insertAdjacentHTML('beforeend', `
          <svg width="41" height="9" viewBox="0 0 41 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40.3536 4.85355C40.5488 4.65829 40.5488 4.34171 40.3536 4.14645L37.1716 0.964466C36.9763 0.769204 36.6597 0.769204 36.4645 0.964466C36.2692 1.15973 36.2692 1.47631 36.4645 1.67157L39.2929 4.5L36.4645 7.32843C36.2692 7.52369 36.2692 7.84027 36.4645 8.03553C36.6597 8.2308 36.9763 8.2308 37.1716 8.03553L40.3536 4.85355ZM0 4.5V5H40V4.5V4H0V4.5Z" fill="#333333"/>
          </svg>
        `);
    }
  });
});