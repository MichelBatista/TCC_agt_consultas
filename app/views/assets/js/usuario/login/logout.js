
$("#logout").on("click", function () {
    let url = '../../models/usuario/login/logout.php';
    $.post(url, function (result) {
        if (result == 1);
            window.location.replace("http://localhost/metalcoin/");
    })
})