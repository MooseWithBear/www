


$(document).ready(function() {
    
    var smh=$('.main').height();  //비주얼 이미지의 높이를 리턴한다   500px
    var on_off=false;  //false(안오버)  true(오버)

    //console.log(smh);
    
    // gnb mouseenter
    $('#headerArea').mouseenter(function(){
        $(this).addClass('on');
        on_off=true;
    });
    
    // gnb mouseleave
    $('#headerArea').mouseleave(function(){
        var scroll = $(window).scrollTop();  //스크롤의 거리
        
        if(scroll>=0 && scroll<smh-50 ){
            $(this).removeClass('on');
        } else if(scroll> smh-50) {
            $(this).addClass('on');
        }
        on_off=false;
    });
    
    // gnb 스크롤 이벤트 체크
    $(window).on('scroll',function(){//스크롤의 거리가 발생하면
        var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
        //console.log(scroll);
        
        if(scroll>smh-300){//스크롤300까지 내리면
            $('#headerArea').addClass('on');
        } else {//스크롤 내리기 전 디폴트(마우스올리지않음)
            if(on_off==false){
                $('#headerArea').removeClass('on');
            }
        };
    });
    
    // gnb 2depth 열기/닫기
    $('ul.dropdownmenu').hover(
        function() {
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
            $('#headerArea').animate({height:400},'fast').clearQueue();
        },function() {
            $('ul.dropdownmenu li.menu ul').hide(); //모든 서브를 다 닫아라
            $('#headerArea').animate({height:100},'fast').clearQueue();
    });

    // gnb 접근성 tab 처리
    $('ul.dropdownmenu li.menu .depth1').on('focus', function () {
        $('#headerArea').addClass('on');
        $('ul.dropdownmenu li.menu ul').slideDown('normal');
        //$(this).parents('.menu').addClass('on');
        $('#headerArea').animate({height:400},'fast').clearQueue();
    });
    
    $('ul.dropdownmenu li.menuM6 li:last a').on('blur', function () {
        $('#headerArea').removeClass('on');
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        //$(this).parents('.menu').removeClass('on');
        $('#headerArea').animate({height:100},'normal').clearQueue();
    });








    // topmove
    $('.topMove').hide();
    
    $(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
        var scroll = $(window).scrollTop(); //스크롤의 거리
        var scrollFoot = $('#footerArea').offset().top - $(window).height() + 60; // 푸터에서의 값 계산
        
        //$('.text').text(scroll);
        if(scroll > 300){ // 300이상의 거리가 발생되면
            $('.topMove').fadeIn('slow');  // top 보이기

            if(scroll < scrollFoot){ // footer보다 작으면 bottom:20, fixed
                $('.topMove').css('bottom',55).css('position','fixed');
            } else { // footer보다 크면 bottom:200, absolute
                $('.topMove').css('bottom',222).css('position','absolute');
            };
    
        }else{
            $('.topMove').fadeOut('fast'); // top 감추기
        }
    });
    
    $('.topMove a').click(function(e){
        e.preventDefault();
        $("html,body").stop().animate({"scrollTop":0},500);//상단으로 스르륵 이동합니다.
    });












});













        

    var offset = 0;


    var smh= $('.main').height();  //메인 비주얼의 높이
    var h3 = $('.titleArea').offset().top-120;

// console.log(h3)



    var con= $('.contentTab');
        if(con.length) {
            var conh = con.offset().top-50;






               }

    var scroll = 0;
        //  ^ 서브 메인 네비게이션 스크롤이벤트 시작 //

        $(window).on('scroll',function(){
             scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            $('#scrollInfo').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            if(scroll>=smh) {
                $('.subNav').addClass('navOn');
                $('header').hide();
            }if(scroll<smh){
                $('.subNav').removeClass('navOn');
                    $('header').show();

        // // ^ 서브 메인 네비게이션 클릭시 스크롤 위치 //
        //     $('.subNav a').click(function(e){
        //         if(scroll>600) {
        //         // e.preventDefault();
                
        //         offset = $('.titleArea').offset();
        //         $('html').animate({scrollTop : offset.top}, 1200).clearQueue();
        //         // historyScrollEvent();
        //     }  })
        





            //  ^ 서브 컨텐츠 네비게이션 스크롤이벤트 //
            }if(scroll>=conh) {
                $('.subNav').removeClass('navOn');
                $('.contentTab').addClass('navOn').addClass('navOn2');
                $('header').hide();
            }if(scroll<=conh) {
                $('.contentTab').removeClass('navOn').removeClass('navOn2');;
            }
            })    




        $('.contentBox .content:eq(0)').fadeIn('fast');
        $('.contentTab li:eq(0)').addClass('current');
        
        // var cnt=$('.contentBox div').size();
        // console.log(cnt);

        var index = 0;
        $('.contentTab a').each(function (index) {
            $(this).click(function(e) {
                e.preventDefault();
                // console.log(index)

                $('.contentTab li').removeClass('current')
                $('.contentTab li:eq('+index+')').addClass('current');
                $('.contentBox .content').fadeOut('fast');//모든 탭내용을 안보이게...
                $('.contentBox .content:eq('+index+')').fadeIn('slow'); //클릭한 해당 탭내용만 보여라
             })
         })
        


        
        

        