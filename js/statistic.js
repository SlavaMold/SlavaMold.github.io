// let time = 5;
// $('')
// $('div').each(function(){
//     let i=1;
//     let num=$(this).data('num');
//     let step = 1000*time/num;
//     let that = $(this);
//     let int = setInterval(function(){
//         if(i<=num){
//             that.html(i);
//         }
//         else{
//             clearInterval(int);
//         }
//         i++
//     }, step);
// });

document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function onScroll() {
        let scrollNumbers = document.querySelectorAll(
            ".item_value"
        );
        scrollNumbers.forEach(function (item) {
            let numberTop = item.getBoundingClientRect().top,
                start = +item.innerHTML,
                end = +item.dataset.max;
            if (window.pageYOffset > numberTop - window.innerHeight / 2) {
                this.removeEventListener("scroll", onScroll);
                var interval = setInterval(function () {
                    item.innerHTML = ++start;
                    if (start == end) {
                        clearInterval(interval);
                    }
                }, 5);
            }
        });
    });
});