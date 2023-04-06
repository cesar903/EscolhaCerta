function exclui(id){
    var id = id
    var conf = confirm("Deseja Realmente EXCLUIR?")

    if(conf == true){
        location.href = "./model/excluir.php?id="+id
    }else{
        alert("Operação cancelada!")
        return false

    }
}
function edita(id){
    var id = id
    var conf = confirm("Deseja Realmente EDITAR?")
    if(conf == true){
        location.href = "editar.php?id="+id
        return true
        
        }else{
            alert("Operação cancelada!")
            return false
    
        }
}

function finaliza(id){
    var id = id
    var conf = confirm("Deseja Realmente FINALIZAR?")
    if(conf == true){
        document.getElementById('acao').action = location.href = "finalizar.php?id="+id;
        return true
        
        }else{
            alert("Operação cancelada!")
            return false
    
        }
}

function info(id){
    var id = id
    var conf = confirm("Deseja ver as INFORMAÇÕES completas?")

    if(conf == true){
        location.href = "info.php?id="+id
    }else{
        alert("Operação cancelada!")
        return false

    }
}



