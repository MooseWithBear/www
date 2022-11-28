

$(document).ready(function () {
var imgSize;
  var startX, endX;
  var imgCount; //이미지 개수
  //이미지 너비
  var imgIndex = 0; //이미지 순서
  var spanBtn = "";
  imgCount = $(".gallery li").length; //li의 개수를 담는다
  imgSize = $(window).width();
   console.log('첫'+size)
  $(".gallery li").width(imgSize);
   console.log('두'+imgSize)
  $(".gallery").append("<div class='pageNum'></div>"); //이미지 개수만큼 페이지네이션 만들기
  for (var i = 1; i <= imgCount; i++) {
    spanBtn += "<span></span>";
  }
  $(".gallery .pageNum").html(spanBtn);
  $(".gallery .pageNum span:eq(0)").css({ background: "orange" });
  $(".gallery").on("touchstart mousedown", function (e) {
    e.preventDefault();
    startX = e.pageX || e.originalEvent.touches[0].pageX;
  });

  $(".gallery").on("touchend mouseup", function (e) {
    e.preventDefault();
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
    $(".gallery .pageNum span:eq(" + imgIndex + ")").css({ background: "orange" });
  });

  $(window).resize(function () {
    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    imgSize = $(window).width(); //너비를 li의 크기로 반환한다
    $(".gallery li").width(imgSize);
      console.log('밑'+imgSize)
    $(".gallery ul").css("left", -imgSize * imgIndex); //left값을 li의 너비 값에 대응하게 처리
  });
});