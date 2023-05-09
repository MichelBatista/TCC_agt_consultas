$("#cadastro-usuario").on("click", function () {
    let nome = $("#cadastro-nome").val();
    let email = $("#cadastro-email").val();
    let senha = $("#cadastro-senha").val();
    let confirmar_senha = $("#cadastro-confirmar-senha").val();

    
    if (validar_campos_cadastro(nome, email, senha, confirmar_senha) == 0)
    {
        let url = '../../models/usuario/cadastro/cadastro.php';
        $.post(url, {
            nome : nome,
            email : email,
            senha : senha,
        }, function(result) {
            if (result == 1)
            {
                $("#container").removeClass("right-panel-active")
                resetar_campos_cadastro()
            }
            else if (result == 2) 
            {

                campo_invalido_login_e_cadastro('cadastro-email', 'Este Email já está sendo usado.');  
            }            
        });
    }

});

function validar_campos_cadastro(nome, email, senha, confirmar_senha)
{
    validacao = 0;

    if (nome.length > 255 )
    {
        campo_invalido_login_e_cadastro('cadastro-nome', 'Limite de caracteres ultrapassado.');       
        validacao = 1;
    }
    else if (nome == '')
    {
        campo_invalido_login_e_cadastro('cadastro-nome', 'Preencha o campo.');
        validacao = 1;
    }
    else
    {
        campo_valido_cadastro('cadastro-nome');
    }

    if (email.length > 255)
    {
        campo_invalido_login_e_cadastro('cadastro-email', 'Limite de caracteres ultrapassado.');   
        validacao = 1;
    }
    else if (email == '')
    {
        campo_invalido_login_e_cadastro('cadastro-email', 'Preencha o campo.');
        validacao = 1;
    }
    else
        campo_valido_cadastro('cadastro-email');


    if (senha.length > 255)
    {
        campo_invalido_login_e_cadastro('cadastro-senha', 'Limite de caracteres ultrapassado.');
    }
    else if (senha == '')
    {
        campo_invalido_login_e_cadastro('cadastro-senha', 'Preencha o campo');
        validacao = 1;
    }
    else 
    {
        campo_valido_cadastro('cadastro-senha')
    }

    if (confirmar_senha.length > 255)
    {
        campo_invalido_login_e_cadastro('cadastro-confirmar-senha', 'Limite de caracteres ultrapassado.');
        validacao = 1;
    }
    else if (confirmar_senha == '')
    {
        campo_invalido_login_e_cadastro('cadastro-confirmar-senha', 'Preencha o campo');
        validacao = 1;
    }
    else if (confirmar_senha != senha)
    {
        campo_invalido_login_e_cadastro('cadastro-confirmar-senha', 'As senhas são diferentes');
        validacao = 1;
    }
    else 
    {
        campo_valido_cadastro('cadastro-confirmar-senha');
    }

    return validacao
}

function campo_invalido_login_e_cadastro(id, mensagem) 
{
    $(`#${id}`).removeClass("campo-valido");
    $(`#${id}`).addClass("campo-invalido color-red");
    $(`#${id}`).attr("placeholder", `${mensagem}`);
    $(`#${id}`).val("");
}

function campo_valido_cadastro(id) 
{
    $(`#${id}`).removeClass("campo-invalido color-red");
    $(`#${id}`).addClass("campo-valido");
}

function limpar_campos_cadastro() 
{
    $("#cadastro-nome").val("");
    $("#cadastro-email").val("");
    $("#cadastro-senha").val("");
    $("#cadastro-confirmar-senha").val("");
}

function resetar_classes_cadastro()
{
    $("#cadastro-nome").removeClass("campo-valido campo-invalido color-red");
    $("#cadastro-email").removeClass("campo-valido campo-invalido color-red");
    $("#cadastro-senha").removeClass("campo-valido campo-invalido color-red");
    $("#cadastro-confirmar-senha").removeClass("campo-valido campo-invalido color-red");
    
}

function resetar_campos_cadastro()
{  
    limpar_campos_cadastro();
    resetar_classes_cadastro();

}