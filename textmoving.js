// window.addEventListener('scroll', function(e) {
//     const ice = document.querySelector("span.ice");
//     const foods = document.querySelector("span.foods");
//     const hands = document.querySelector("div#hands");
//     const global = document.querySelector("div#global");
//     let globalPos = global.getBoundingClientRect();
//     let intViewportHeight = window.innerHeight;

//     var scrolled = window.pageYOffset;
//     var rate = scrolled * 4;

//     ice.style.transform = 'translate3d(0px,' + rate + 'px, 0px)';
//     foods.style.transform = 'translate3d(' + rate + 'px, 0px, 0px';
//     // console.log(hands.getBoundingClientRect());
//     // console.log(globalPos.top);
//     // console.log(intViewportHeight);

//     let viewPortPercentage = globalPos.top / intViewportHeight;
//     // let viewPortPercent = viewPortPercentage.toFixed(1);

//     // global.style.opacity = Math.abs(viewPortPercent *= 1.5);



//     // console.log(Math.abs(viewPortPercent));
//     console.log(viewPortPercentage.toFixed(2));

// });
