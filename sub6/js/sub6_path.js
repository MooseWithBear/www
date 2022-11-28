


const logo = document.querySelectorAll("#pathBox path");

for(let i = 0; i < logo.length; i++) {
    console.log(`${i+1}번째 path 길이 ${logo[i].getTotalLength()}`);
    var length = logo[i].getTotalLength();
    $('#pathBox path:eq('+i+')').css({
        'stroke-dasharray' : length,
        'stroke-dashoffset' : length
    })
  }
