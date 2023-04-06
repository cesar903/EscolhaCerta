<?php
session_start() or die('A sessão não pode ser iniciada');

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:login.php?log=ok');
  }


$logado = $_SESSION['login'];

include_once('conecta.php');

if(isset($_GET['procura'])) {
    $procura = $_GET['procura'];

    $consulta = "SELECT * FROM clientes WHERE nome LIKE '%$procura%' OR cpf_cnpj LIKE '%$procura%' OR email LIKE '%$procura%' OR
                    cep LIKE '%$procura%' OR rua LIKE '%$procura%' OR numero LIKE '%$procura%' OR id LIKE '%$procura%' OR tipo LIKE '%$procura%' ORDER BY id";

}else{
    $consulta = "SELECT * FROM clientes ORDER BY id";
}

$con = mysqli_query($conecta, $consulta);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">


    <!-- Fonte awesome para icones -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--Ajax para font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Javascript ajax e bibliotecas do jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>


    <!-- Adiciona o bootstrap atraves da chamada por link externo do Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--Link da animação de scroll-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Link CSS -->
    <link rel="stylesheet" href="css/index.css">

    <script src="JavaScript/lista.js"></script>




<body onload="dado_escolhido()">

    <header>
        <div class="text-center ">
            <nav class="navbar navbar-expand-md p-0 " id="menu">
                <div class="container container-fluid">
                    <img class="navbar-brand  logo" src="img/logoEscolhaCerta-branco.png">
                    <button class="navbar-toggler navbar-light bg-light mr-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link " aria-current="page" href="index.php"><strong>HOME</strong> </a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link" href="empresa.php"><strong>EMPRESA</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link " href="atuacao.php"><strong>ATUAÇÕES</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link " href="contatos.php"><strong>CONTATOS</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link" href="galeria.php"><strong>GALERIA</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a href="login.php" class="nav-link active" ><strong><i class="fa fa-sign-out"
                                            aria-hidden="true"></i></strong></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="envio text-center"></div>
    <div class="container mb-5">
        <div class=" text-center mt-5 mb-5">
            <h1 class="subtitulo"><i><strong>Registros</strong> </i> </h1>
            <div class="mt-2 mb-2">
                <hr>
            </div>
        </div>

    </div>

    <div class="text-center">
        <form action="./model/pesquisa.php" method="post">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 col-sm-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="procura" id="procura" placeholder="Pesquisar"  aria-label="Username" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <button type="submit" class="input-group-text btn btn-outline-info rounded-right" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
   

    <div class="m-3">

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">DATA</th>
                    <th scope="col">FINALIZADA</th>
                    <th scope="col">AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while($dado = $con->fetch_array()) { ?>
                <tr>
                    <td>
                        <?php echo $dado['id']; ?>
                    </td>
                    <td>
                        <?php echo $dado['nome']; ?>
                    </td>
                    <td>
                        <?php echo $dado['email']; ?>
                    </td>
                    <td>
                        <?php echo $dado['hora_data']; ?>
                    </td>
                    <td>
                        <?php 
                            $situacao = $dado['situacao'];
                            if($situacao == 1){
                                echo "Não";}else if($situacao == 0){
                                    echo "Sim";}
                            
                            ?>
                    </td>

                    <td>
                        <input type="submit" class="btn btn-outline-success m-1"
                            onclick="return finaliza(<?php echo $dado['id']; ?>)" value="Finalizar">
                        <input type="submit" class="btn btn-outline-info m-1"
                            onclick="return edita(<?php echo $dado['id']; ?>)" value="Editar">
                        <input type="submit" class="btn btn-outline-warning m-1"
                            onclick="return info(<?php echo $dado['id']; ?>)" value="INFO">
                        <input type="submit" class="btn btn-outline-danger m-1"
                            onclick="return exclui(<?php echo $dado['id']; ?>)" value="Excluir">
                    </td>
                </tr>
                <?php } ?>

                </tr>

            </tbody>
        </table>
    </div>

    <div class="rodape" data-aos="fade-up">
        <footer class="" style="margin-top: 150px;">
            <div class="text-center mb-4">
                <img src="img/logoEscolhaCertaMeio.png" alt="" class="imagem-footer">
                <h1 class="text-white"><i><strong>FALE CONOSCO</strong></i></h1>
            </div>

            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-md-4 col-sm-12 contatos text-white text-center mb-5">
                        <h2>Contatos</h2>
                        (11) 91082-7429 <i class="fa fa-whatsapp" aria-hidden="true"></i><br>
                    </div>
                    <div class="col-md-4 col-sm-12 contatos text-white text-center mb-5">
                        <h2>Redes Sociais</h2>
                        Escolha_Certa <i class="fa fa-instagram" aria-hidden="true"></i><br>
                        Escolha Certa <i class="fa fa-facebook-official" aria-hidden="true"></i><br>
                        escolhaCerta@gmail.com <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-4 col-sm-12 contatos text-white text-center mb-5">
                        <h2>Ouvidoria</h2>
                        Dúvidas <i class="fa fa-info" aria-hidden="true"></i><br>
                        Sugestões <i class="fa fa-commenting-o" aria-hidden="true"></i><br>
                        Reclamações <i class="fa fa-frown-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

        </footer>
        <div class="container text-center p-0">
            <img src="img/devCesar.png" class="devCesar mr-3" alt=""><strong class="fontDevCesar"><em>DevCesar -
                    Desenvolvedor FullStack - <i class="fa fa-whatsapp" aria-hidden="true"></i></em></strong>
        </div>
    </div>

    <a href="https://wa.me/5511910827429?text=Ol%C3%A1%21%21%21+Me+chamo+_____%2C+e+gostaria+de+fazer+um+or%C3%A7amento.+Segue+meu+or%C3%A7amento%3A+"
        class="btn">
        <img src="img/iconeWhatsapp.png" class="iconeWhatsapp" alt="">
    </a>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });

    </script>

</body>

<?php mysqli_close($conecta); ?>
</html>