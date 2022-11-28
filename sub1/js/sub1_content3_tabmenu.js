$('#content .details').each(function(index){
   $('#content .details:eq('+index+') dl dd').each(function(index){
      $(this).css('animation-delay', (index*50)+'ms')
   })
})


var offset = 0;
var con= $('.contentTab');
if(con.length) {
    var conh = con.offset().top-50;
       }
var h1= $('.yearBox:eq(0)').offset().top-250 ;
var h2= $('.yearBox:eq(1)').offset().top-250 ;
var h3= $('.yearBox:eq(2)').offset().top-250 ;
var h4= $('.yearBox:eq(3)').offset().top-230 ;


        
var scroll = 0;
//  ^ 서브 메인 네비게이션 스크롤이벤트 시작 //



function historyScrollEvent () {
$(window).on('scroll',function(){
     scroll = $(window).scrollTop();
    //스크롤top의 좌표를 담는다
    $('#scrollInfo').text(scroll);
    $('.contentTab li').removeClass('current');

    $('.contentTab li').removeClass('current0');
    $('.contentTab li').removeClass('current1');
    $('.contentTab li').removeClass('current2');
    $('.contentTab li').removeClass('current3');

    $('.yearSlogan p').removeClass('textfix').removeClass('textpall');
    $('.pallImgBox div').removeClass('textpall');


if(h1<scroll && scroll<h2) {
   $('#yearSlogan2022 p').addClass('textfix').addClass('textpall')
   $('.yearsBox2022 .pallImgBox div').addClass('textpall');

}

if(0<scroll && scroll<h2){

   $('.contentTab li:eq(0)').addClass('current0');
   //첫번째 서브메뉴 활성화

   //첫번째 내용 콘텐츠 애니메이
}else if(h2<scroll && scroll<h3){

   $('.contentTab li:eq(1)').addClass('current1');
   $('#yearSlogan2015 p').addClass('textfix').addClass('textpall');
   $('.yearsBox2015 .pallImgBox div').addClass('textpall');


   //두번째 서브메뉴 활성화
   
}else if(h3<scroll && scroll<h4){

   $('.contentTab li:eq(2)').addClass('current2');
   $('#yearSlogan2010 p').addClass('textfix').addClass('textpall');
   $('.yearsBox2010 .pallImgBox div').addClass('textpall');


   //네번째 서브메뉴 활성화
   
}

else if(scroll>h4){
   $('.contentTab li:eq(3)').addClass('current3');
   $('#yearSlogan2005 p').addClass('textfix').addClass('textpall');
   $('.yearsBox2005 .pallImgBox div').addClass('textpall');


   //네번째 서브메뉴 활성화
}
// console.log(h1); 1270
// console.log(h2); 3519
// console.log(h3); 5779
// console.log(h4); 6981
//!스파이 끝   
       })}



$('.contentTab a').each(function (index) {
    $(this).click(function(e) {
        e.preventDefault();
      //   console.log(index)
        $('.contentTab li').removeClass('current');
        $('.contentTab li:eq('+index+')').addClass('current');
        offset = $('.yearsBigBox .yearBox:eq('+index+')').offset(); 
        // offset = offset({top:500})
        $('html').animate({scrollTop : offset.top-90}, 1200).clearQueue();
        historyScrollEvent();
    })
 })


 $(window).on('scroll',function(){
    historyScrollEvent();

 })


        //패럴

        function castParallax() {

            var opThresh = 350;
            var opFactor = 750;
        
            window.addEventListener("scroll", function(event){
        
                var top = this.pageYOffset;
        
                var layers = document.getElementsByClassName("textpall");
                var layer, speed, yPos;
                for (var i = 0; i < layers.length; i++) {
                    layer = layers[i];
                    speed = layer.getAttribute('data-speed');
                    var yPos = -(top * speed / 100);
                    layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');
        
                }
            });
        }
        
        document.body.onload = castParallax();
     