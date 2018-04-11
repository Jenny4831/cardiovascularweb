var mouseOver = false;
var imgIndex = 0;
var count;
var loop;


$(document).ready(function(){
    //$("#1").hide();
    //$("#1").fadeIn(1000);
    count = $(".slider img").size();
    nextImage();
    startSlider();
    
    $(".slider img").mouseenter(function() {
       mouseOver = true;
    });
    
    $(".slider img").mouseleave(function() {
       mouseOver = false;
    })
});

//prev, next buttons stops timer

//hover hover stops timer


function startSlider(){

    loop = setInterval(function() {
    
        if (mouseOver)
        {
            return;
        }
    
        nextImage(1000);
        
     }, 5000);
};

function nextImage(delay) {
    $(".slider img").fadeOut(delay);
    
    setTimeout(function() {
        imgIndex++;
        //console.log("Fade in " + imgIndex);
        $(".slider img#" + imgIndex).fadeIn(delay);   
        
        if (imgIndex >= count) {
            imgIndex = 0;
        }
    }, delay);
}

function nextButton() {
    clearInterval(loop);
    startSlider();
    
    nextImage(300);
}

function prevButton() {
    clearInterval(loop);
    startSlider();
    
    $(".slider img").fadeOut(300);
    
    setTimeout(function() {
        imgIndex--;
        
        if (imgIndex <= 0) {
            imgIndex = count;
        }
        
        //console.log("Fade in " + imgIndex);
        $(".slider img#" + imgIndex).fadeIn(300);   
        

    }, 300);
}