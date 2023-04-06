<?php
session_start() or die('A sessÃ£o nÃ£o pode ser iniciada');

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:login.php?log=ok');
  }

$logado = $_SESSION['login'];

include("conecta.php");

$id = $_GET['id'];
$pesquisa = "SELECT * FROM clientes WHERE id = $id"; 
$con = mysqli_query($conecta, $pesquisa);

$dado = $con->fetch_array();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

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

    <!--Link da animaÃ§Ã£o de scroll-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Link CSS -->
    <link rel="stylesheet" href="css/index.css">

    <script src="JavaScript/index.js"></script>




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
                                <a class="nav-link " href="atuacao.php"><strong>ATUAÃ‡Ã•ES</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link" href="contatos.php"><strong>CONTATOS</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link" href="galeria.php"><strong>GALERIA</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a href="login.php" class="nav-link active"><strong><i class="fa fa-sign-out"
                                            aria-hidden="true"></i></strong></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
            </nav>
        </div>
    </header>
    <div class="envio text-center"></div>
    <div class="container mb-5">
        <div class=" text-center mt-5 mb-5">
            <h1 class="subtitulo"><i><strong>Editar</strong> </i> </h1>
            <div class="mt-2 mb-2">
                <hr>
            </div>
        </div>

    </div>

    <div class="container">
        <form action="./model/atualiza.php" method="post">
            Nome:<input type="text" name="nome" id="nome" class="bloco-todo formulario" value="<?php echo $dado['nome']?>" required>
            <br>
            Email:<input type="email" name="email" id="email" value="<?php echo $dado['email']?>" required
                class="bloco-todo formulario">
            <br>

            CPF/CNPJ:<input type="text" name="cpf_cnpj" id="cpf_cnpj" value="<?php echo $dado['cpf_cnpj']?>" required
                class=" mask-cpf bloco-todo formulario">
            <br>


            Fixo:<input type="text" name="fixo" id="fixo" value="<?php echo $dado['fixo']?> "
                class="mask-telefone formulario">

            Celular:<input type="text" name="celular" id="celular" value="<?php echo $dado['celular']?>" required
                class="meio-todo mask-celular formulario">

            <br>
            <br>

            ID: <input type="text" value="<?php echo $dado['id']?> " class=" formulario" disabled>

            Terminada: <input type="text" name="situacao" id="situacao" value="<?php 
                            $situacao = $dado['situacao'];
                            if($situacao == 1){
                                echo "NÃ£o";}else if($situacao == 0){
                                    echo "Sim";}
                            ?> "
                class=" formulario" disabled>
            <input type="hidden" name="situacao" id="situacao" value="<?php echo $dado['situacao']?>">

            <br>
            Data/Hora:<input type="text" name="hora_data" id="hora_data" value="<?php echo $dado['hora_data']?>" disabled
                class="meio-todo formulario" >

            <h4 class="text-center endereco"><b>ENDEREÃ‡O</b> </h4>

            Cep:<input type="text" name="cep" id="cep" value="<?php echo $dado['cep']?>" class="cep mask-cep formulario" required>

            Rua:<input type="text" name="rua" id="rua" value="<?php echo $dado['rua']?>" class="lagradouro formulario" required>
            <br>

            Numero: <input type="text" name="numero" id="numero" value="<?php echo $dado['numero']?>" required
                class="numero formulario">
            <input type="text" name="complemento" id="complemento"placeholder="complemento" value="<?php echo $dado['complemento']?>" 
                class="complemento formulario">


            <br>
            Cidade:<input type="text" name="cidade" id="cidade" class="cidade formulario" value="<?php echo $dado['cidade']?>" required>
            Estado:<input type="text" name="estado" id="estado" class="estado formulario" value="<?php echo $dado['estado']?>" required>
            <br>
            Bairro:<input type="text" name="bairro" id="bairro" class="bloco-todo formulario" required
                value="<?php echo $dado['bairro']?>">
            <br>
            <h4 class="text-center endereco"><b> OrÃ§amento</b> </h4>
            <br>
            <br>
            TIPO:<input type="text" name="tipo" id="tipo" class="bloco-todo formulario" value="<?php echo $dado['tipo']?>"
            disabled>
            <br>
            <textarea type="text" name="orcamento" id="orcamento" class="bloco-todo formulario" required
                required><?php echo $dado['orcamento']?></textarea>
            <br>

            <div class="text-center">
                <button type="submit" class="btn btn_form mt-5" onclick="return valida()">Atualizar</button>
            </div>
            <br>
            <input type="hidden" name="id" id="id" value="<?php echo $dado['id']?>">
            <div class="text-center">
                <a href="lista.php" class="btn btn_form mt-5" >Voltar</a>
            </div>
        </form>

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
                        DÃºvidas <i class="fa fa-info" aria-hidden="true"></i><br>
                        SugestÃµes <i class="fa fa-commenting-o" aria-hidden="true"></i><br>
                        ReclamaÃ§Ãµes <i class="fa fa-frown-o" aria-hidden="true"></i>
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


</html>