$(".main").addClass("active");
$(".titleArea").addClass("active");


var now = 0;
var gap = 800;
$(window).on("scroll", function () {
    //스크롤 값의 변화가 생기면
    now = $(window).scrollTop();
    //스크롤top의 좌표를 담는다
    $("#scrollInfo").text(now);




var main = $(".main").offset().top - gap;
var subSlogan = $(".subSlogan").offset().top - gap;
var h3_1 = $('#content h3:eq(0)').offset().top - gap;
var h3_2= $('#content h3:eq(1)');
var h3_3= $('#content h3:eq(2)');
var h3_4= $('#content h3:eq(3)');

if(h3_2.length) {
    h3_2 = $("#content h3:eq(1)").offset().top - gap;
}
if(h3_3.length) {
    h3_3 = $("#content h3:eq(2)").offset().top - gap;
}
if(h3_4.length) {
    h3_4 = $("#content h3:eq(3)").offset().top - gap;
}

    // console.log('main : '+main);
    // console.log('subSlogan : '+subSlogan);
    // console.log('h3_1 : '+h3_1);
    // console.log('h3_2 : '+h3_2);
    // console.log('h3_3 : '+h3_3);
    // console.log('h3_4 : '+h3_4);
    // console.log('현재 : '+ now)


  
    // if (now > main) {
      // $(".main").addClass("active");
    // } 
  
    if (now > subSlogan) {
      $(".subSlogan").addClass("active");
    } 
  
    if (now > h3_1) {
      $("#content section:eq(0)").addClass("active");
    } 

    if (now > h3_2) {
      $("#content section:eq(1)").addClass("active");
    }
  
    if (now > h3_3) {
      $("#content section:eq(2)").addClass("active");
    }
  
    if (now > h3_4) {
      $("#content section:eq(3)").addClass("active");
    }
  });
  
  
