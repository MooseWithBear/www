
$(document).ready(function() {

   var smh=$('.grow').height();  //비주얼 이미지의 높이를 리턴한다   900px
   var on_off=false;  //false(안오버)  true(오버)
   
       $('#headerArea').mouseenter(function(){
//           // var scroll = $(window).scrollTop();
           $(this).css('background','#fff');
           $('.dropdownmenu li a').css('color','black'); 
           $('#headerArea h1 a').css('background','url(./common/images/logo_02_blue.png) no-repeat')
        on_off=true;
       });
   
      $('#headerArea').mouseleave(function(){
           var scroll = $(window).scrollTop();  //스크롤의 거리
           
           if(scroll<50 ){
               $(this).css('background','rgba(0, 0, 0, 0.3)').css('border-bottom','none'); 
               $('.dropdownmenu li a').css('color','#fff');
            //    $('.dropdownmenu ')
           }else{
               $(this).css('background','#fff'); 
               $('.dropdownmenu li a').css('color','#333');
               $('#headerArea h1 a').css('background','url(./common/images/logo_02_blue.png) no-repeat')

           }
          on_off=false;    
      });
   
      $(window).on('scroll',function(){//스크롤의 거리가 발생하면
           var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
//            //console.log(scroll);

           if(scroll>smh-550){//스크롤300까지 내리면
               $('#headerArea').css('background','#fff').css('border-bottom','1px solid #ccc');
               $('.dropdownmenu li a').css('color','#333');
               $('#headerArea h1 a').css('background','url(./common/images/logo_02_blue.png) no-repeat')


           }else{//스크롤 내리기 전 디폴트(마우스올리지않음)
              if(on_off==false){
                   $('#headerArea').css('background','rgba(0, 0, 0, 0.3)').css('border-bottom','none');
                   $('.dropdownmenu li a').css('color','#fff');
                   
                   $('#headerArea h1 a').css('background','url(./common/images/logo_01_white.png) no-repeat')

              }
            // else{
            //     $('#headerArea').css('background','rgba(0, 0, 0, 0.3)').css('border-bottom','none');
            //     $('.dropdownmenu li a').css('color','#fff');
            //     $('#headerArea h1 a').css('background','url(./common/images/logo_01_white.png) no-repeat')
            //   }
           }; 
           
        });

  
    //2depth 열기/닫기
    $('#headerArea h1 a').hover(function(){
        $(this).css('background','url(./common/images/logo_02_blue.png) no-repeat')

    },function() {
        $('#headerArea h1 a').css('background','url(./common/images/logo_01_white.png) no-repeat')
    })
    

    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').css('color', 'blue').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:334},'fast').clearQueue();
          $('#headerArea h1 a').css('background','url(./common/images/logo_02_blue.png) no-repeat')

       },function() {
          $('ul.dropdownmenu li.menu ul').hide(); //모든 서브를 다 닫아라
          $('#headerArea').css('color', 'blue').css('background', '#fff').animate({height:100},'fast').clearQueue();
          $('#headerArea h1 a').css('background','url(./common/images/logo_01_white.png) no-repeat')
     });
    
    //  1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#1179f2');
       },function() {
          $('.depth1',this).css('color','#333');
     });
     
     // 2depth 효과
     $('.menu ul li a').hover(
        function() { 
            $(this).css('color','#1179f2');
        },function() {
           $(this).css('color','#333');
      });

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').slideDown('normal');
        $('#headerArea').animate({height:100},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('#headerArea').animate({height:100},'normal').clearQueue();
        $('#headerArea').css('background', 'rgba(0, 0, 0, 0.3)')
    });
});

    // $('a.depth1').hover(function(){
    //     $('a.depth1').css('color','#1179f2')
    // })
