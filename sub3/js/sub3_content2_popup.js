$(document).ready(function(){
    var ind = 0;
    var cloned = '';

 
    $('.contentArea a').click(function(e){
        e.preventDefault();
        ind = $(this).index('.contentArea a');  // 0 1 2 3
        console.log(ind);
        $('.modal_box').fadeIn('slow');

        // $(this).addClass('popUpAnchor');
        cloned = $(this).clone();
        cloned.appendTo('.modalBox ul li').addClass('popUpAnchor');
        $('.modalBox .more').text('닫기');
        var $div = $('<div><img src="./images/content2/close.png" alt=""></div>');
        $('.popUpAnchor').prepend($div);



        $('.popUpAnchor').click(function(e){
            e.preventDefault();
        })

        $('.modalBox .more, img, .modal_box').click(function(e){
            e.preventDefault();
            console.log(ind);

            $('.modal_box').hide();
            cloned.remove();

        });

    });


  });
  