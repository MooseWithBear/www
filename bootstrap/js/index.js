$(document).ready(function() {

window.addEventListener("DOMContentLoaded", (event) => {
  // Navbar shrink function
  var navbarShrink = function () {
    const navbarCollapsible = document.body.querySelector("#mainNav");
    if (!navbarCollapsible) {
      return;
    }
    if (window.scrollY === 0) {
      navbarCollapsible.classList.remove("navbar-shrink");
      $(".nav-link").addClass("first");
    } else {
      navbarCollapsible.classList.add("navbar-shrink");
      $(".nav-link").removeClass("first");
    }
  };

  // Shrink the navbar
  navbarShrink();

  // Shrink the navbar when page is scrolled
  document.addEventListener("scroll", navbarShrink);

  // Activate Bootstrap scrollspy on the main nav element
  const mainNav = document.body.querySelector("#mainNav");
  if (mainNav) {
    new bootstrap.ScrollSpy(document.body, {
      target: "#mainNav",
      offset: 74,
    });
  }

  // Collapse responsive navbar when toggler is visible
  const navbarToggler = document.body.querySelector(".navbar-toggler");
  const responsiveNavItems = [].slice.call(document.querySelectorAll("#navbarResponsive .nav-link"));
  responsiveNavItems.map(function (responsiveNavItem) {
    responsiveNavItem.addEventListener("click", () => {
      if (window.getComputedStyle(navbarToggler).display !== "none") {
        navbarToggler.click();
      }
    });
  });
});

const all = function () {
  var windowWidth = $( window ).width();
  var len = $("#species .nav-item").length-1

  if(windowWidth<990) {
    $("#species .tab-pane").removeClass("active");
    $("#species .tab-pane:eq(0)").addClass("active");
    $("#species .nav-link").removeClass("active")
    $("#species .nav-link:eq(0)").addClass("active")

  }else{
    $("#species .tab-pane").addClass("active");
    $("#species .nav-link").removeClass("active")
    $("#species .nav-link:eq("+len+")").addClass("active")

  }
}
all();
$( window ).resize(function() {
  //창크기 변화 감지
all();
});

$("#species .nav-item").click(function () {
  var ind = $("#species .nav-item").index(this);
  var len = $("#species .nav-item").length - 1;
  console.log(ind);
  console.log(len);
  if (ind < len) {
    $("#species .tab-pane").removeClass("active");
    $("#species .tab-pane:eq(" + ind + ")").addClass("active");
  }
});

$("#all-tab").on("click", function () {
  $("#all-tab").parent().addClass("active");
  $(".tab-pane").addClass("active in");
  $('[data-toggle="tab"]').parent().removeClass("active");
});
})


$(document).scroll(function(){
  var scrollFoot = $('#footerArea').offset().top - $(window).height() + 60; // 푸터에서의 값 계산
  var scrollTop = $(window).scrollTop();
  var screenHeight = $(window).height();
  var scroll = $(window).scrollTop(); //스크롤의 거리

  if(scroll > 300){ // 300이상의 거리가 발생되면
    $('.quicktop').fadeIn('slow');  // top 보이기

    if(scroll < scrollFoot){ // footer보다 작으면 bottom:20, fixed
        $('.quicktop').css('bottom',20).css('position','fixed');
    } else { // footer보다 크면 bottom:200, absolute
        $('.quicktop').css('bottom',300).css('position','absolute');
    };

  }
});
