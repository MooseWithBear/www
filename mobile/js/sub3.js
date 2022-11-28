$(document).ready(function () {

$('.overview').find('a').html('<i class="fa-solid fa-magnifying-glass-plus"></i>')

//! 중단 공통 클릭
$('.overview li').each(function (index){
    $(this).find("a").click(function (e){
      e.preventDefault();
    // console.log(index)
    })
})
// $(".contentArea dl").each(function (index) {


//! 하단 공통 슬라이드
$('.slideList li:eq(0)').css('display','block').css('opacity',1).parent().addClass('now');
$('.slideList li').prepend("<i class='fa-solid fa-left-right'></i>").css('position','relative')
$('.slideList').find('i').css({
  'position':'absolute',
  'top':'3%',
  'right':'5%',
  'font-size':20,
  'transform':'scaleX(1.4)',
  'opacity':0.8,
  'z-index':50,
  'color': '#fff'

})

// $(".slideList li").each(function (index) { 
// })

let now = 0;
let ind = $(".slideList li").length-1; //총 개수 3개
let start_x, end_x;
const images = document.querySelector(".slideList") 
 
images.addEventListener('touchstart', touch_start);
images.addEventListener('touchend', touch_end);
 
function prev(){
  $(".slideList li").css('display','none').removeClass('activeRight').removeClass('activeLeft')

  if(now <= 0){
    now=ind
    $(".slideList li:eq("+now+")").addClass('activeRight').css('display', 'block')
    console.log('if'+now)
  }else {
    now--;

    $(".slideList li:eq("+now+")").addClass('activeRight').css('display', 'block')

  }


}
function next(){
  $(".slideList li").css('display','none').removeClass('activeLeft').removeClass('activeRight')

  if(now >= ind){
    now=0;
    $(".slideList li:eq("+now+")").addClass('activeLeft').css('display', 'block')
  } else {
    now++;
    $(".slideList li:eq("+now+")").addClass('activeLeft').css('display', 'block')
  }
}
 
function touch_start(event) {
  start_x = event.touches[0].pageX
}
 
function touch_end(event) {
  end_x = event.changedTouches[0].pageX;
  if(start_x > end_x){
    next();
    console.log('next')
  }else if (start_x < end_x){
    prev();
    console.log('prev')
  }else {
    console.log('stop')
  }
}





// !팝업js



var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.
var responseObject;

xhr.onload = function() {                       // When readystate changes
 
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
	                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.
};

xhr.open('GET', 'js/sub3.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다



// $(document).ready(function(){
  var arr = ["eco", "green"];
  jsonType = " ";

   var newContent='';
  $('.more').click(function(e){
      e.preventDefault();
      $("html, body").css({"overflow":"hidden"}); // body scroll 비활성화


      var ind = $(this).index('.more');

      newContent='';
    if($(this).hasClass('more2')) {
      newContent+='<img src="'+ responseObject.green[ind].image +'" ' + 'alt="">';
      newContent+='<dl>'
      newContent+='<dt>' + responseObject.green[ind].title + '</dt>'
      newContent+='<dd>' + responseObject.green[ind].desc + '</dd>'
      newContent+='</dl>'

    }else {
      newContent+='<img src="'+ responseObject.eco[ind].image +'" ' + 'alt="">';
      newContent+='<dl>'
      newContent+='<dt>' + responseObject.eco[ind].title + '</dt>'
      newContent+='<dd>' + responseObject.eco[ind].desc + '</dd>'
      newContent+='</dl>'
    }

      newContent+='<a class="popClose" href="#"><i class="fa-regular fa-solid fa-xmark"></i></a>'
      $('.subPop').html(newContent);
      $("html, body").css({"overflow":"hidden"}); // body scroll 비활성화

      $('.subPop').fadeIn('fast');
      $('.subPop').scrollTop(0);

      //console.log(responseObject); 

      $('.subPop .popClose').click(function(e){
        e.preventDefault();
        $('.subPop').fadeOut('fast');
        $("html, body").css({"overflow":""}); // body scroll 활성화
  
  });

 



  });
// });



})

