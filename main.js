const responsive={
    0:{
        items:1
    },
    320:{
        items:1
    },
    560:{
        items:2
    },
    960:{
        items:3
    }
}

$(document).ready(function(){

$nav=$('.nav');
$toggleCollapse=$('.toogle-Collapse');

$toggleCollapse.click(function(){
 $nav.$toggleClass('collapse');   
})

$('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:5000,
    dots:false,
    nav:true,
    navText:[$('.owl-navigation .owl-nav-prev'),$('.owl-navigation .owl-nav-next')],
    responsive:responsive
});

$('.move-up span').click(function(){
    $('html,body').animate({
        scrollTop:0
    },2000);
})

});
document.querySelector(".btn-log").addEventListener("click",function(){
    document.querySelector(".log").classList.add("active");
});
document.querySelector(".log .close-btn").addEventListener("click",function(){
    document.querySelector(".log").classList.remove("active");
});
