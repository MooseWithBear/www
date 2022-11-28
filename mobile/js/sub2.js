//! sub2_2
//* FAQ
$(".contentArea dl").each(function (index) {
  $(this).find("a").click(function (e){
    e.preventDefault();
    if ($(this).parent().parent().hasClass("on")) { //dl이 on 갖고있으면
        $(this).parent().parent().removeClass("on").find('dd').slideUp("fast");
        $(this).find("i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
    } else {
        $('.contentArea dd').slideUp("fast").parent().removeClass("on");

          $(".contentArea i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
          $(".contentArea dl:eq(" + index + ") dd")
            .slideDown("slow")
            .parent()
            .addClass("on");
          $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");

    }   
  })
})

