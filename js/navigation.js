$(document).ready(function() { 
    function addToggle(){
        var screenW = $(window).width()
        console.log(screenW)
        if (screenW<992){
            $(".dropdown-toggle").attr("data-toggle", "dropdown")
        }
    }
    addToggle();
    window.onresize = addToggle;
    
    var exited = sessionStorage.getItem("exitNotice");
    if(exited){
        $(".notice-bar").css("display","none");  
    }
    
    $("#exit").click(function(){
        $(".notice-bar").addClass("exited");
        sessionStorage.setItem("exitNotice", true);
    })



});


