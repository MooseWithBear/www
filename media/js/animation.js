

// $('.c-supermario2 div').each(function(index) {
//     nan = Math.random()*10
//     console.log(nan)
//     $('.c-supermario2 div:eq('+index+')').css('animation-delay', 15000+nan+'ms')

// })


var num = 1;
var step = 1;
var i = 0

if ($('.mario').hasClass('c-supermario_run')){

$('.c-supermario_run').addClass('moveRight');
const run = setInterval (function() {
if (num==1 && step==1) {
    setTimeout(run_1,0)
    num=2
    step=2
    i++
} 

if (num==2 && step==2) {
    setTimeout(run_2,300)
    num=3
    step=3
}

if (num==3 && step==3) {
    setTimeout(run_1,600)
    num=4;
    step=4;
}

if (num==4 && step==4) {
    setTimeout(run_3,900)
    num=5
    step=5
}

if (num==5 && step==5) {
    setTimeout(run_1,1200)
    num=1
    step=1
}
// console.log('뛰는중')

if(i==80) {
    clearInterval(run);
    console.log('끝')
    
}
},200)

}

if ($('.mario').hasClass('c-pacman')){

    $('.c-pacman').addClass('moveRight');
    $('.pinky').addClass('moveRight')
    const run2 = setInterval (function() {
        if (num==1 && step==1) {
            setTimeout(pacRun_1,0)
            setTimeout(pinkyRun_1,0)
            num=2
            step=2
            i++
        } 
        if (num==2 && step==2) {
            setTimeout(pacRun_2,300)
            setTimeout(pinkyRun_2,300)
            num=1
            step=1
        }
        
        // if (num==3 && step==3) {
        //     setTimeout(pacRun_1,600)
        //     num=4;
        //     step=4;
        // }
 
        // console.log('뛰는중')
        
        if(i==120) {
            clearInterval(run2);
            console.log('끝')
            
        }
        },300)
        
        }
    
    

        // if ($('.mario').hasClass('c-logo')){
        //     const run3 = setInterval (function() {
        //         if (num==1 && step==1) {
        //             setTimeout(logo_1,0)
        //             num=2
        //             step=2
        //             i++
        //         } 
        //         if (num==2 && step==2) {
        //             setTimeout(logo_2,2000)
        //             num=1
        //             step=1
        //         }
        //         if(i==30) {
        //             clearInterval(run3);
        //             console.log('끝')   
        //         }
        //         },5000)
                
        //         }
            



function moveRight () {
    $('.c-supermario_run').addClass('moveRight');
}

function run_1 () {
    $('.c-supermario_run').removeClass('second').removeClass('third')
}

function run_2 () {
    $('.c-supermario_run').removeClass('second').removeClass('third')
    $('.c-supermario_run').addClass('second')
}

function run_3 () {
    $('.c-supermario_run').removeClass('second').removeClass('third')
    $('.c-supermario_run').addClass('third')
}

function pacRun_1 () {
    $('.c-pacman').removeClass('second').removeClass('third');
}

function pacRun_2 () {
    $('.c-pacman').removeClass('second').removeClass('third');
    $('.c-pacman').addClass('second')
}

function pacRun_3 () {
    $('.c-pacman').removeClass('second').removeClass('third');
    $('.c-pacman').addClass('third')
}

function pinkyRun_1 () {
    $('.pinky').removeClass('second');
}

function pinkyRun_2 () {
    $('.pinky').addClass('second')
}


function logo_1 () {
    $('.c-logo').removeClass('second')
}


function logo_2 () {
    $('.c-logo').addClass('second')
}


$('.c-supermario div').each(function(index){
    
    var nan = (index*(Math.random()*15)-10 * 0.13)
    var nandiv = Math.floor(Math.random()*100)
    var nandiv2 = Math.floor(Math.random()*250)
    var nandiv3 = Math.floor(Math.random()*300)
    var nandiv4 = Math.floor(Math.random()*320)

    $('.c-supermario div:eq('+nandiv+')').css({
        'transform': 'translate('+(-nan)+'px,'+nan+'px)',
        'transition':'all 1s ease-out'
        
    })
    $('.c-supermario div:eq('+nandiv2+')').css({
        'transform': 'translate('+(nan)+'px,'+nan+'px)',
        'transition':'all 1s ease-out'
        
    })
    $('.c-supermario div:eq('+nandiv3+')').css({
        'transform': 'translate('+(-nan)+'px,'+-nan+'px)',
        'transition':'all 1s ease-out'
        
    })
    $('.c-supermario div:eq('+nandiv4+')').css({
        'transform': 'translate('+(+nan)+'px,'+-nan+'px)',
        'transition':'all 1s ease-out'
        
    })
    
})
