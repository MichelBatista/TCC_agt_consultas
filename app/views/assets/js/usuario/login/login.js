$("#login-usuario").on("click", function () {

    let email = $("#login-email").val();
    let senha = $("#login-senha").val();

    if (validar_campos_login(email, senha) == 0) {

        let url = '../../models/usuario/login/login.php';
        $.post(url, {
            email: email,
            senha: senha,
        }, function (result) {
        
            if (result == 1)
            window.location.replace("http://localhost/metalcoin/app/views/page/");
            else
                alert("Usuário ou senha invalido.")

            resetar_campos_login()
        });
    }

});

function validar_campos_login(email, senha) {
    validacao = 0;

    if (email == '') {
        campo_invalido_login_e_cadastro('login-email', 'Preencha o campo.');
        validacao = 1;
    }
    else {
        campo_valido_login('login-email');
    }

    if (senha == '') {
        campo_invalido_login_e_cadastro('login-senha', 'Preencha o campo');
        validacao = 1;
    }
    else {
        campo_valido_login('login-senha');
    }

    return validacao
}

function limpar_campos_login() {
    $("#login-email").val("");
    $("#login-senha").val("");
}

function campo_valido_login(id) {
    $(`#${id}`).removeClass("campo-invalido color-red");
}

function resetar_classes_login() {
    campo_valido_login('login-email');
    campo_valido_login('login-senha');
}

function resetar_campos_login() {
    limpar_campos_login();
    resetar_classes_login()
}

