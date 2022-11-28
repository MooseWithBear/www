//! sub 4_1 미디어센터
$(document).ready(function () {

{/* <iframe width="560" height="315" src="https://www.youtube.com/embed/M03F4TC6icU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> */}

$('.conBox ul li').each(function (index){
    $(this).find("a").click(function (e){
      e.preventDefault();
    console.log(index)
    })
})

    var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.
    var responseObject;
    
    xhr.onload = function() {                       // When readystate changes
     
        responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
                                                         // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.
    };
    
    xhr.open('GET', 'js/sub4.json', true);        // 요청을 준비한다.
    xhr.send(null);                                 // 요청을 전송한다
    
    
    
    
       var newContent='';
      $('.conBox a').click(function(e){
          e.preventDefault();
          $("html, body").css({"overflow":"hidden"}); // body scroll 비활성화
    
          var ind = $(this).index('.conBox a');
    
          newContent='';
        //   newContent+='<iframe width="560" height="315" src="'+ responseObject.video[ind].youtube +'" ' + 'title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        newContent+="<div class='iframeBox'>"
          newContent+="<iframe width='100%' height='100%' src='"+ responseObject.video[ind].youtube +"' " + "title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
          newContent+="</div>"

          newContent+='<dl>'
          newContent+='<dt>' + responseObject.video[ind].title + '</dt>'
          newContent+='<dd>' + responseObject.video[ind].desc + '</dd>'
          newContent+='</dl>'
          newContent+='<a class="popClose" href="#"><i class="fa-regular fa-solid fa-xmark"></i></a>'
          $('.videoPop').html(newContent);
          $("html, body").css({"overflow":"hidden"}); // body scroll 비활성화
    
          $('.videoPop').fadeIn('fast').find('dd').fadeIn('fast');
          $('.videoPop').scrollTop(0).css('display', 'block');
    
          //console.log(responseObject); 
        
          $('.videoPop .popClose').click(function(e){
            e.preventDefault();
            var closedContent = '';
            $('.videoPop').fadeOut('fast');
            $('.videoPop').html(closedContent);
            $("html, body").css({"overflow":""}); // body scroll 활성화
      
      });
      })



// ! sub4_2 FAQ

  var faqArticle = $(".sub_faq ul li"); // 전체 li
  $(".sub_faq").find("a").append('<i class="fa-regular fa-square-plus"></i>');
  $(".sub_faq ul li p a").click(function (e) {
    e.preventDefault();
    var answer = $(this).parent().parent(); // 해당 li
    if (answer.is(".on")) {
      // li에 on이 있으면
      answer.removeClass("on"); // on없애고
      answer.children().next().stop().slideUp("fast"); // 본인 닫아라
      $(this).find("i").removeClass("fa-square-minus").addClass("fa-square-plus");
    } else {
      // li에 on이 없으면
      faqArticle.removeClass("on"); // 다른 li에 on 없애고
      $(".sub_faq ul li p").find("i").removeClass("fa-square-minus").addClass("fa-square-plus");

      answer.addClass("on"); // 내 li에만 on을 넣어라
      faqArticle.children().next().stop().slideUp("fast");
      answer.children().next().stop().slideDown("fast");
      $(this).find("i").removeClass("fa-square-plus").addClass("fa-square-minus");
    }
  });

  $(".all").toggle(
    function (e) {
      e.preventDefault();
      $(this).html('답변 모두 닫기 <i class="fa-regular fa-square-minus"></i>');
      faqArticle.find("i").removeClass("fa-square-plus").addClass("fa-square-minus");
      faqArticle.children().next().stop().slideDown("fast");
    },
    function (e) {
      e.preventDefault();
      $(this).html('답변 모두 열기 <i class="fa-regular fa-square-plus"></i>');
      faqArticle.find("i").removeClass("fa-square-minus").addClass("fa-square-plus");
      faqArticle.children().next().stop().slideUp("fast");
    }
  );


  

});

