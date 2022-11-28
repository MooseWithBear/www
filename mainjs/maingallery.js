
// $('.slogan01 strong>span:eq(3)').css('animation','aggro 0.4s linear infinite').css('opacity',1).css('animation-delay', '26s')

$('.gallery').addClass('gallery0');

$('.gallery li:eq(0)').fadeIn(2000);
$('.main').addClass('active')

$('.slogan01 strong>span').each(function(index){
    // console.log(index)
    $(this).css('animation-delay', (index*80)+'ms')
})
$('.slogan02 strong>span').each(function(index){
    // console.log(index)
    $(this).css('animation-delay', (index*40)+'ms')
})
$('.slogan03 strong>span').each(function(index){
    // console.log(index)
    $(this).css('animation-delay', (index*40)+'ms')
})
$('.slogan04 strong>span').each(function(index){
    // console.log(index)
    $(this).css('animation-delay', (index*40)+'ms')
})



$('.cycleWrap li:eq(0) a').addClass('galleryActive');


// animate({height:50},'slow').clearQueue();



        var onoff=true; //타이머 동작 유무
        var info = 0; //정지역할을 하는 변수
        var cnt = 0; //이미지 순서를 반복실행하기 위한 인덱스
        function 교체() {
            
            $('.gallery').removeClass('gallery'+cnt);

            cnt++;
            $('.gallery').addClass('gallery'+(cnt))

            if(cnt==4){
                cnt=0;
            }
            $('.gallery').addClass('gallery'+(cnt))

            $('.cycleWrap li a').removeClass('galleryActive');
            $('.cycleWrap li:eq('+cnt+') a').addClass('galleryActive');


            $('.gallery').addClass('gallery'+(cnt))
            $('.gallery li').hide();
            $('.gallery li:eq('+cnt+')').fadeIn('slow');
            $('.slogan').fadeIn('slow').animate({top:400},1000);


            // $('.gallery').removeClass('gallery0');
            // $('.gallery').removeClass('gallery'+cnt);
            
        }
        
        info = setInterval(교체,6000);
        // clearInterval(info);//정지시키는 함수

        // console.log(info) 

//인덱스버튼 클릭시 해당갤러리 나옴
            $('.cycleWrap>ul>li>a').click(function(e){
                e.preventDefault();
                clearInterval(info);//정지시키는 함수
                // $('.galleryPauseBox a').text('').removeClass('fa-solid fa-pause').addClass('fa-solid fa-play');

                var ind = $(this).index('.cycleWrap ul li a');
                var indL= $('.cycleWrap>ul>li').length;
                
                for (var i=0; i<indL; i++) { //배경컬러 클래스 삭제
                    $('.gallery').removeClass('gallery'+i);
                }

                $('.cycleWrap li a').removeClass('galleryActive');
                $('.cycleWrap li:eq('+ind+') a').addClass('galleryActive');

                // $('.cycleWrap li a').animate({height:15},0);
                // $('.cycleWrap li:eq('+ind+') a').animate({height:50},'slow');

                $('.gallery').addClass('gallery'+ind);
                $('.gallery li').hide();
                $('.gallery li:eq('+ind+')').fadeIn(2000);
                cnt = ind;  
                // info = setInterval(교체,6000);
                
                onoff=false;   

                if(onoff==false){
                    $('.galleryPauseBox a').text('').removeClass('fa-solid fa-pause').addClass('fa-solid fa-play');
                } else {
                    $('.galleryPauseBox a').text('').removeClass('fa-solid fa-play').addClass('fa-solid fa-pause');

                }

            })




        // $('.galleryPauseBox a').toggle(function(e) {   //토글로 시작,정지할 수 있는 함수
        //     e.preventDefault();
        //     clearInterval(info);//정지시키는 함수
        //     $(this).text('').removeClass('fa-solid fa-pause').removeClass('fa-solid fa-play').addClass('fa-solid fa-play');
        // },function(e) {
        //     e.preventDefault();
        //     info = setInterval(교체,6000);
        //     $(this).text('').removeClass('fa-solid fa-play').addClass('fa-solid fa-pause');
        // })


        $('.galleryPauseBox a').click(function(e) {   //토글로 시작,정지할 수 있는 함수
            e.preventDefault();
            if(onoff==true){
            clearInterval(info);//정지시키는 함수
            $(this).text('').removeClass('fa-solid fa-pause').addClass('fa-solid fa-play');
            onoff=false;   
            }else {
            info = setInterval(교체,6000);
            $(this).text('').removeClass('fa-solid fa-play').addClass('fa-solid fa-pause');
            onoff=true; 
        }
        })







        // //패럴

        // function castParallax() {

        //     var opThresh = 350;
        //     var opFactor = 750;
        
        //     window.addEventListener("scroll", function(event){
        
        //         var top = this.pageYOffset;
        
        //         var layers = document.getElementsByClassName("parallax");
        //         var layer, speed, yPos;
        //         for (var i = 0; i < layers.length; i++) {
        //             layer = layers[i];
        //             speed = layer.getAttribute('data-speed');
        //             var yPos = -(top * speed / 100);
        //             layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');
        
        //         }
        //     });
        // }
        
        // document.body.onload = castParallax();
        
        
        var scroll_pos = 0;
        $(document).scroll(function() { 
            scroll_pos = $(this).scrollTop();
            if(scroll_pos > 300) {
                $('.gallery').removeClass('gallery0');
                $('.gallery').removeClass('gallery'+cnt);
                        } else {
                            $('.gallery').addClass('gallery0');
                            $('.gallery').addClass('gallery'+cnt);
                                    }
        });