var onoffduck =true;
function 뒤돌아보기 () {

    if(onoffduck==true){
$('.ducks').css('background-image', 'url(./common/images/ducks2.webp)');
onoffduck = false;
}else {
    $('.ducks').css('background-image', 'url(./common/images/ducks.webp)');

    onoffduck = true;
}
}

function 도망가기 () {
    $('.ducks').addClass('run');
}
function 제자리 () {
    $('.ducks').removeClass('run');
    $('.ducks').removeClass('jump');

}
function 도망가기2 () {
    $('.ducks').addClass('jump');
}

setInterval(뒤돌아보기,3000);

$('.ducks').click(function(){
    도망가기2();

    setTimeout(제자리, 800)
})

