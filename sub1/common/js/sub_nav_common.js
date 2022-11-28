



        

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
        


        
        

        