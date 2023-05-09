
$("#signUp").on("click", function(){
    $("#container").addClass("right-panel-active");
    resetar_campos_login()
})

$("#signIn").on("click", function(){
    $("#container").removeClass("right-panel-active");
    resetar_campos_cadastro()
})

