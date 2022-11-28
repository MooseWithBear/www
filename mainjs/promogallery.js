$(document).ready(function() {

// ! 복제 캐러셀 함수 *//

//이미지백그라운드
        $('.promoGallery li').each(function(index) {
            $(this).css('animation-delay', 400+(index*300)+'ms')
        })

        // $('.promoGallery li>div>a').each(function(index) {
        //     $(this).css('background', 'url(./images/media_'+(index+1)+'.webp)').css('background-size', 'cover')
        // })


        
//변수정의

        var movesize = $('.promoGallery li').width()+20; //마진값 임시추가
        var promoTarget = 0;
        var promoFirstPosition = 0;
        var promoIndex = $('.promoGallery li').length;
        var promoLastPosition = -((promoIndex)*movesize)+(promoFirstPosition);
        var cloned = '';
        cloned = $('.promoGallery').after($('.promoGallery').clone());
        
//함수정의
        //오른쪽화살표 함수
        function rightArrow () {
            cloned.show();
            if(promoTarget<= -(movesize*promoIndex)){
                $('.promoGallery').css('left',0);
                promoTarget=0;
            }
            promoTarget-=movesize;
            $('.promoGallery').stop().animate({left:promoTarget}, 'fast');
        }

        //왼쪽화살표 함수
        function leftArrow() {
            if(promoTarget>=0) {
                cloned.show();
                $('.promoGallery').css('left',-4600);
                promoTarget=-4600;
            }
            if(promoTarget>=(promoFirstPosition)){ //현재위치가, 첫 위치보다 크거나 같다면
                $('.promoGallery').animate({left:promoLastPosition+movesize}, 'fast').clearQueue();
                promoTarget= promoLastPosition;
            }else{
                promoTarget += movesize
            $('.promoGallery').animate({left:promoTarget}, 'fast').clearQueue();
            }
        }
// ! 복제 캐러셀 함수 끝 *//




//* 처음으로 되돌아가는 캐러셀 함수 시작//


        //클론하지않고 그냥 처음과 끝으로 이동함수

        // var movesize = $('.promoGallery li').width()+20; //마진값 임시추가
        // var promoTarget = movesize*2;
        // var promoFirstPosition = movesize*2;
        // var promoIndex = $('.promoGallery li').length;
        // var promoLastPosition = -((promoIndex)*movesize)+(promoFirstPosition);

        // //함수정의
        // //오른쪽화살표 함수
        // function rightArrow () {
        //     promoTarget -= movesize
        //     $('.promoGallery li').animate({left:promoTarget}, 'fast').clearQueue();
        //     // console.log(promoTarget);
        //     if(promoTarget<= promoLastPosition){
        //         $('.promoGallery li').animate({left:promoFirstPosition}, 'fast').clearQueue();
        //         promoTarget= promoFirstPosition;
        // }}
        // //왼쪽화살표 함수
        // function leftArrow() {
        //     if(promoTarget>=(promoFirstPosition)){
        //         $('.promoGallery li').animate({left:promoLastPosition+movesize}, 'fast').clearQueue();
        //         promoTarget= promoLastPosition;
        //     }else{
        //         promoTarget += movesize
        //     $('.promoGallery li').animate({left:promoTarget}, 'fast').clearQueue();
        //     // console.log(promoTarget);
        //     }
        // }

//* 처음으로 되돌아가는 캐러셀 함수 끝//




// 클릭이벤트
            //오른쪽화살표 이벤트
        $('.promo .arrow li .next').click(function (e) {
            e.preventDefault();
            rightArrow();
            // console.log(promoTarget);
        })
        //왼쪽화살표 이벤트
        $('.promo .arrow .prev').click(function(e) {
            e.preventDefault();
            leftArrow();
            // console.log(promoTarget);
        })



// 키보드이벤트
        //키보드화살표오른쪽 이벤트
        $(document).keydown(function(event) {
            if (event.keyCode == '39') {
                rightArrow();
            }
        //키보드화살표왼쪽 이벤트
            else if (event.keyCode == '37') {
                leftArrow();
            }
        });
    });