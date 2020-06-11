function addToggle(){
    var screenW = $(window).width()
    console.log(screenW)
    if (screenW<992){
        $(".dropdown-toggle").attr("data-toggle", "dropdown")
    }
}
addToggle()
window.onresize = addToggle;
