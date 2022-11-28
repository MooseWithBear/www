//! 비주얼영역
$(document).ready(function () {

var imgSize;
  var startX, endX;
  var imgCount; //이미지 개수
  //이미지 너비
  var imgIndex = 0; //이미지 순서
  var spanBtn = "";
  imgCount = $(".gallery li").length; //li의 개수를 담는다
  imgSize = $(window).width();
  $(".gallery li").width(imgSize);
  $(".gallery").append("<div class='pageNum'></div>"); //이미지 개수만큼 페이지네이션 만들기
  for (var i = 1; i <= imgCount; i++) {
    spanBtn += "<span></span>";
  }
  $(".gallery .pageNum").html(spanBtn);
  $(".gallery .pageNum span:eq(0)").css({ background: "#1179f2" });
  $(".gallery").on("touchstart mousedown", function (e) {
    startX = e.pageX || e.originalEvent.touches[0].pageX;
  });

  $(".gallery").on("touchend mouseup", function (e) {
    endX = e.pageX || e.originalEvent.changedTouches[0].pageX;
    //$('body').append(endX + '<br>');
    if (startX < endX) {
      //$('body').append(' 오른쪽으로 터치드래그' + '<br>');
      imgIndex--;
      if (imgIndex < 0) imgIndex = 0;
      $(".gallery ul").animate({ left: -imgSize * imgIndex }, "fast");
    } else {
      //$('body').append(' 왼쪽로 터치드래그' + '<br>');
      imgIndex++;
      if (imgIndex >= imgCount) imgIndex = imgCount - 1;
      $(".gallery ul").animate({ left: -imgSize * imgIndex }, "fast");
    }
    $(".gallery .pageNum span").css({ background: "#fff" });
    $(".gallery .pageNum span:eq(" + imgIndex + ")").css({ background: "#1179f2" });
  });

  $(window).resize(function () {
    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    imgSize = $(window).width(); //너비를 li의 크기로 반환한다
    $(".gallery li").width(imgSize);
    //   console.log('윈도우크기'+imgSize)
    $(".gallery ul").css("left", -imgSize * imgIndex); //left값을 li의 너비 값에 대응하게 처리
  });
});


//! 사업영역

// let curPos = 0;
// let postion = 0;
// let start_x, end_x;
// const IMAGE_WIDTH = $('.busListBox img').width();
// console.log(IMAGE_WIDTH)

// const images = document.querySelector(".busListBox ul");

// images.addEventListener('touchstart', touch_start);
// images.addEventListener('touchend', touch_end);

// function prev(){
//   if(curPos > 0){
//     postion += IMAGE_WIDTH;
//     images.style.transform = `translateX(${postion}px)`;

//     curPos = curPos - 1;
//   }
// }
// function next(){
//   if(curPos < 2){
//     postion -= IMAGE_WIDTH;
//     images.style.transform = `translateX(${postion}px)`;

//     curPos = curPos + 1;
//   }
// }

// function touch_start(event) {
//   start_x = event.touches[0].pageX
// }

// function touch_end(event) {
//   end_x = event.changedTouches[0].pageX;
//   if(start_x > end_x){
//     next();
//   }else{
//     prev();
//   }
// }
var size;
var imgSize;
$(document).ready(function () {
  var startX, endX;
  var imgCount; //이미지 개수
  //이미지 너비
  var imgIndex = 0; //이미지 순서
  var spanBtn = "";
  imgCount = $(".busListBox li").length; //li의 개수를 담는다
  size = $(window).width();
  //  console.log('첫'+size)
  imgSize = size - size * 0.0675; // 페이지 로드시 윈도우의 너비값을 li의 너비값으로 반환한다
  $(".busListBox li").width(imgSize);
  //  console.log('두'+imgSize)
  $(".busListBox").append("<div class='pageNum'></div>"); //이미지 개수만큼 페이지네이션 만들기
  for (var i = 1; i <= imgCount; i++) {
    spanBtn += "<span></span>";
  }
  $(".busListBox .pageNum").html(spanBtn);
  $(".busListBox .pageNum span:eq(0)").css({ background: "orange" });
  $(".busListBox").on("touchstart mousedown", function (e) {
    startX = e.pageX || e.originalEvent.touches[0].pageX;
  });

  $(".busListBox").on("touchend mouseup", function (e) {
    endX = e.pageX || e.originalEvent.changedTouches[0].pageX;
    //$('body').append(endX + '<br>');
    if (startX < endX) {
      //$('body').append(' 오른쪽으로 터치드래그' + '<br>');
      imgIndex--;
      if (imgIndex < 0) imgIndex = 0;
      $(".busListBox ul").animate({ left: -imgSize * imgIndex }, "fast");
    } else {
      //$('body').append(' 왼쪽로 터치드래그' + '<br>');
      imgIndex++;
      if (imgIndex >= imgCount) imgIndex = imgCount - 1;
      $(".busListBox ul").animate({ left: -imgSize * imgIndex }, "fast");
    }
    $(".busListBox .pageNum span").css({ background: "#fff" });
    $(".busListBox .pageNum span:eq(" + imgIndex + ")").css({ background: "orange" });
  });

  $(window).resize(function () {
    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    size = $(window).width(); //너비를 li의 크기로 반환한다
    imgSize = size - size * 0.0675; // 페이지 로드시 윈도우의 너비값을 li의 너비값으로 반환한다
    $(".busListBox li").width(imgSize);
    //   console.log('밑'+imgSize)
    $(".busListBox ul").css("left", -imgSize * imgIndex); //left값을 li의 너비 값에 대응하게 처리
  });
});

//! 미디어센터

var margin = 20;
var marginCount = 9;
var listCount = $('.media ul li').length;
var mediaWidth = ($('.media ul li').width() * listCount) + (marginCount * margin); // ul 가로값
var nowScroll = $('.mediaBox').scrollLeft() + $('.media').width();
var percent = (nowScroll * 100) / mediaWidth;
  $(".progressbar span").css("width", percent+'%');
  console.log(percent)

  $(".mediaBox").scroll(function () {

var margin = 20;
var marginCount = 9;
var listCount = $('.media ul li').length


var mediaWidth = ($('.media ul li').width() * listCount) + (marginCount * margin); // ul 가로값
var nowScroll = $('.mediaBox').scrollLeft() + $('.media').width();
var percent = (nowScroll * 100) / mediaWidth;


  $(".progressbar span").css("width", percent+'%');

console.log(percent)



//   var now = $(this).scrollLeft();
//   var total = $('.mediaBox li').length
//   total = total*imgsz
//   var right = $('.mediaBox').scrollWidth;
//     console.log('오른쪽'+right)
//   console.log(total);
//   console.log('현재'+now)
//   var percent = (now / total) * 100 + "%";
  // console.log(percent)


var sizz = $(window).width();
console.log('윈도우크기'+sizz)

});

//! FAQ 메뉴열기
$(".question").each(function (index) {
  //인덱스 찾아놓기
  $(this)
    .find("a")
    .click(function (e) {
      //메뉴버튼 클릭시
      e.preventDefault(); //링크이동 없애고
      console.log(index);
      if ($(this).parent().parent().hasClass("on")) {
        //클래스 갖고 있으면 닫고 끝냄
        $(".ans").slideUp("fast").parent().removeClass("on");
        $(this).find("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      } else {
        //그게 아니면 일단 클래스 삭제하고, 리스트열어주고, 부모li에만 클래스 부여
        $(".ans").slideUp("fast").parent().removeClass("on");
        $(".question i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
        $(".question:eq(" + index + ") .ans")
          .slideDown("fast")
          .parent()
          .addClass("on");
        $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
      }
    });
});
