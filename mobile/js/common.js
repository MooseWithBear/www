$(document).ready(function() {
    $('.contentTab li:eq(0)').addClass('current');



//^ nav 영역 //

        // 헤더 스크롤 반응
        var smh=$('.visual').height();
        // gnb 스크롤 이벤트 체크
        $(window).on('scroll',function(){//스크롤의 거리가 발생하면
            var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
            //console.log(scroll);
            
            if(scroll>100){//스크롤300까지 내리면
                $('#headerArea').addClass('on');
            } else {//스크롤 내리기 전 디폴트(마우스올리지않음)
                $('#headerArea').removeClass('on');
            };
        });

    // !nav modal 열기
    var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
    $(".hamberger").click(function(e) { //메뉴버튼 클릭시
        e.preventDefault();
        
        // var documentHeight =  $(document).height();
        // $("#gnb").css('height',documentHeight); 
        if(op==false){
        $("#gnb").removeClass('hide').addClass('aladin');
        $('body').css({overflow:"hidden"});
        $(".hamberger i").addClass('fa-solid fa-xmark').addClass('close');
        $('.headerTop').css('position','relative').css('z-index', '81')
        op=true;
        }else {
            $("#gnb").removeClass('aladin');
            $(".hamberger i").removeClass('fa-solid fa-xmark').addClass('fa-solid fa-bars').removeClass('close');
            $('body').css({overflow:"auto"});
            op=false;
        }
    })

    //! nav 뎁스리스트 열기
    $(".depth1").each(function (index) { //인덱스 찾아놓기
        $(this).find('.depth1_t').click(function(e) { //메뉴버튼 클릭시
            e.preventDefault(); //링크이동 없애고
                if ($(this).parent().parent().hasClass('on')) { //클래스 갖고 있으면 닫고 끝냄
                    $('.depth1 ul').slideUp('fast').parent().removeClass('on');
                    $(this).find('i').addClass('fa-chevron-down').removeClass('fa-chevron-up')
                }else { //그게 아니면 일단 클래스 삭제하고, 리스트열어주고, 부모li에만 클래스 부여
                    $('.depth1 ul').slideUp('fast').parent().removeClass('on');
                    $('.depth1:eq('+index+') ul').slideDown('fast').parent().addClass('on');
                    $('.depth1 i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                    $(this).find('i').addClass('fa-chevron-up').removeClass('fa-chevron-down');

                }
        })
    })


    //! family site 열기
    var open = false;
    $(".family>a").click(function(e) { //메뉴버튼 클릭시
        e.preventDefault();
        if(open==false) {
            $('.familyListBox').slideDown('fast'); //열어줌
            $('#footerArea').addClass('on');
            $(this).find('i').addClass('fa-chevron-down').removeClass('fa-chevron-up')
            open = true;
        } else {
            $('.familyListBox').slideUp('fast'); //닫아줌
            $('#footerArea').removeClass('on');
            $('.family i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            $(this).find('i').addClass('fa-chevron-up').removeClass('fa-chevron-down');
            open = false;
        }
    })




// topmove

$('.topMove').hide();
    
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
    var scroll = $(window).scrollTop(); //스크롤의 거리
    var scrollFoot = $('.use').offset().top - $(window).height() + 60; // 푸터에서의 값 계산
    
    //$('.text').text(scroll);
    if(scroll > 300){ // 300이상의 거리가 발생되면
        $('.topMove').fadeIn('slow');  // top 보이기

        if(scroll < scrollFoot){ // footer보다 작으면 bottom:20, fixed
            $('.topMove').css('bottom',25).css('position','fixed');
        } else { // footer보다 크면 bottom:200, absolute
            $('.topMove').css('bottom',76).css('position','absolute');
        };

    }else{
        $('.topMove').fadeOut('fast'); // top 감추기
    }
});

$('.topMove a').click(function(e){
    e.preventDefault();
    $("html,body").stop().animate({"scrollTop":0},500);//상단으로 스르륵 이동합니다.
});



// !sub 공통영역
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
     }) })


















})
