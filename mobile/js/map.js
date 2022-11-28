    // ! 탭메뉴 스크립트시작 //



    $('.map .mapList').fadeOut('fast');
    $('.map .mapList:eq(0)').fadeIn('fast');
    $('.contentTab li:eq(0)').addClass('current');




    var container = document.getElementById('kakaoMap01');
    var options = {
        center: new daum.maps.LatLng(37.501934611682074, 127.03747321216726),
        level: 2
    };

    var map = new daum.maps.Map(container, options);
    
    var mapTypeControl = new daum.maps.MapTypeControl();
    map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);

    var zoomControl = new daum.maps.ZoomControl();
    map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);
    
    var markerPosition  = new daum.maps.LatLng(37.501934611682074, 127.03747321216726); 
    var marker = new daum.maps.Marker({
        
        position: markerPosition
    });

    marker.setMap(map);
    
    var overlay = new daum.maps.CustomOverlay({
        map: map,
        position: marker.getPosition()       
    });
     
    //두번째 맵
     
      var container2 = document.getElementById('kakaoMap02');
    var options2 = {
        center: new daum.maps.LatLng(37.39357100289076, 126.9670697483353),
        level: 2
    };

    var map2 = new daum.maps.Map(container2, options2);
    
    var mapTypeControl2 = new daum.maps.MapTypeControl();
    map2.addControl(mapTypeControl2, daum.maps.ControlPosition.TOPRIGHT);

    var zoomControl2 = new daum.maps.ZoomControl();
    map2.addControl(zoomControl2, daum.maps.ControlPosition.RIGHT);
    
    var markerPosition2  = new daum.maps.LatLng(37.39357100289076, 126.9670697483353); 
    var marker2 = new daum.maps.Marker({
        position: markerPosition2
    });

    marker2.setMap(map2);
    
    var overlay2 = new daum.maps.CustomOverlay({
        map: map2,
        position: marker2.getPosition()       
    }); 
     
     
    // 세번째 맵
     
     var container3 = document.getElementById('kakaoMap03');
   var options3 = {
       center: new daum.maps.LatLng(37.51942689345995, 126.795028605577),
       level: 2
   };

   var map3 = new daum.maps.Map(container3, options3);
   
   var mapTypeControl3 = new daum.maps.MapTypeControl();
   map3.addControl(mapTypeControl3, daum.maps.ControlPosition.TOPRIGHT);

   var zoomControl3 = new daum.maps.ZoomControl();
   map3.addControl(zoomControl3, daum.maps.ControlPosition.RIGHT);
   
   var markerPosition3  = new daum.maps.LatLng(37.51942689345995, 126.795028605577); 
   var marker3 = new daum.maps.Marker({
       position: markerPosition3
   });

   marker3.setMap(map3);
   
   var overlay3 = new daum.maps.CustomOverlay({
       map: map3,
       position: marker3.getPosition()       
   }); 
   
    // 네번째 맵
     
     var container4 = document.getElementById('kakaoMap04');
   var options4 = {
       center: new daum.maps.LatLng(35.74974153130874, 129.3649089028622),
       level: 2
   };

   var map4 = new daum.maps.Map(container4, options4);
   
   var mapTypeControl4 = new daum.maps.MapTypeControl();
   map4.addControl(mapTypeControl4, daum.maps.ControlPosition.TOPRIGHT);

   var zoomControl4 = new daum.maps.ZoomControl();
   map4.addControl(zoomControl2, daum.maps.ControlPosition.RIGHT);
   
   var markerPosition4  = new daum.maps.LatLng(35.74974153130874, 129.3649089028622); 
   var marker4 = new daum.maps.Marker({
       position: markerPosition4
   });

   marker4.setMap(map4);
   mapa = new daum.maps.LatLng(35.74974153130874, 129.3649089028622)
   var overlay2 = new daum.maps.CustomOverlay({
       map: map4,
       position: marker4.getPosition()       
   }); 

    


// //    var cnt=$('.map h3').size();
// //    // console.log(cnt);
//    $('.networkTab a').each(function (index) {
//        $(this).click(function(e) {
//            e.preventDefault();
//            $('.contentTab li').removeClass('current');
//            $('.contentTab li:eq('+index+')').addClass('current');
//            $('.map .mapList').fadeOut('fast'); //모든 탭내용을 안보이게...
//            $('.map .mapList:eq('+index+')').fadeIn('slow'); //클릭한 해당 탭내용만 보여라
//         })
//     })


 
 
 
 
