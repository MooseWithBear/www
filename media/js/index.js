$(document).ready(function () {

    //호버
$('.trail_01 div').hover(function(){
    $(this).find('a').addClass('aHover')
    $(this).find('i').addClass('iHover')

}, function (){
    $(this).find('a').removeClass('aHover')
    $(this).find('i').removeClass('iHover')

})
$('.trail_02 li').hover(function(){
    $(this).find('a').addClass('aHover')
    $(this).find('i').addClass('iHover')

}, function (){
    $(this).find('a').removeClass('aHover')
    $(this).find('i').removeClass('iHover')

})

// //마우스 커서 애니메이션
// let cursor;
// let x = 0, y = 0;
// let mx = 0, my = 0;
// const speed = 0.3;
// const mouseFunc = (e) =>{
//     x = e.clientX, y = e.clientY;
//     cursor.style.transform = `translate(${mx}px, ${my}px)`;
// }

// const loop = () =>{
//     mx += (x - mx) * speed;
//     my += (y - my) * speed;

//     window.requestAnimationFrame(loop);
// }

// window.onload = () =>{ 
//     cursor = document.getElementsByClassName("cursor_follower")[0];
//     document.addEventListener("mousemove", mouseFunc);
//     loop();
// }



});
