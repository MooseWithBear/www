$(document).ready(function() {
   var hover = '';
   
    $('.family>a').hover(function(){
        if(hover==true) {

            $(this).addClass('on');
        }
    }, function() {
        if(hover==false) {
        $(this).removeClass('on');
}})





	$('.family>a').toggle(function(){
        // $('.modalBox').addClass('modal_box').fadeIn('slow');
        $(this).addClass('on')
		$('.family ul').fadeIn('slow');
        $('family>a i').removeClass('fa-angle-down').addClass('fa-angle-up');
        hover = true;
	},function(){
        // $('.modalBox').removeClass('modal_box').fadeOut('fast');

        $('.family ul').fadeOut('fast');
        $(this).removeClass('on');
        $('family>a i').addClass('fa-angle-down').removeClass('fa-angle-up');

        hover = false;

	});
    // $('.modalBox').click(function(){
    //     $(this).removeClass('modal_box').fadeOut('fast');
    //     $('.family ul').fadeOut('fast');
    //     $('.family>a').removeClass('on');
    //     hover = false;
    // })


$('.family>a').on('focus', function () {        
    $('.family ul').fadeIn('slow');	
    $(this).addClass('on')

});
$('.family ul li:last a').on('blur', function () {        
    $('.family ul').fadeOut('fast');
    $(this).removeClass('on');

});




})