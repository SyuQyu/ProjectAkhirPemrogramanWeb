// Packages JS
let loadMoreBtn = document.querySelector('.packages .load-more');
let currentItem = 3;

loadMoreBtn.onclick = () => {
    let boxes = [...document.querySelectorAll('.packages .box-container .box')];
    for (var i = currentItem; i < currentItem + 3; i++) {
        boxes[i].style.display = 'inline-block';
    };

    currentItem += 3;
    
    if(currentItem >= boxes.length) {
        loadMoreBtn.style.display = 'none';
    }
}

var swiper = new Swiper(".reviews-slider", {
    loop:true,
    spaceBetween: 20,
    autoHeight: true,
    grabCursor: true,
    breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
});