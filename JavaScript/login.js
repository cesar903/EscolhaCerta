function valida(){
    return email()  && senha()
}

function email(){

    if(document.getElementById('email').value == ""){

        document.getElementById("email").style.borderBottom="red 3px solid";
        document.getElementById('resposta').innerHTML= `<i><b>Email Obrigatorio...</b></i>`;
        document.getElementById("email").focus();
        return false
    }else{
        document.getElementById("email").style.borderBottom="teal 3px solid";
        document.getElementById('resposta').innerHTML= "";
        return true
    }
}


function senha(){

    if(document.getElementById('senha').value == ""){
        document.getElementById("senha").style.borderBottom="red 3px solid";
        document.getElementById('resposta').innerHTML= `<i><b>Senha Obrigatória...</b></i>`;
        document.getElementById("senha").focus();
        return false

    }else{
        document.getElementById("senha").style.borderBottom="teal 3px solid";
        document.getElementById('resposta').innerHTML= "";
        return true
    }
}

