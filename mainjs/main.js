var now = 0;
var gap = 800;
// scroll transition
$(window).on("scroll", function () {
  //스크롤 값의 변화가 생기면
  now = $(window).scrollTop();
  //스크롤top의 좌표를 담는다
  $("#scrollInfo").text(now);

  var grow = $(".grow").offset().top - gap;
  var blue = $(".blue").offset().top - gap;
  var mint = $(".mint").offset().top - gap;
  var orange = $(".orange").offset().top - gap;
  var news = $(".news").offset().top - gap;
  var promo = $(".promo").offset().top - gap;

  // console.log(blue);

  if (now > grow) {
    $(".grow").addClass("active");
  } 
  // else {
  //   $(".grow").removeClass("active");
  // }

  if (now > blue) {
    $(".blue").addClass("active");
  } 
  // else {
  //   $(".blue").removeClass("active");
  // }

  if (now > mint) {
    $(".mint").addClass("active");
  } 
  // else {
  //   $(".mint").removeClass("active");
  // }

  if (now > orange) {
    $(".orange").addClass("active");
  }
  //  else {
  //   $(".orange").removeClass("active");
  // }

  if (now > news) {
    $(".news").addClass("active");
  }

  if (now > promo) {
    $(".promo").addClass("active");
  }
});


// !뉴스 호버
//  $('newsBox li').hover(function() {
//   (this).scale('1.5')

//  })
