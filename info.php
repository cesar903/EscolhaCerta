<?php
session_start() or die('A sessão não pode ser iniciada');

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
    <title>Contatos</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">


    <!-- Fonte awesome para icones -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--Bibliotecas do jquery-->
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css " rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


    <!-- Link CSS -->
    <link rel="stylesheet" href="css/index.css">

    <!--Link da animação de scroll-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
                                <a class="nav-link " href="atuacao.php"><strong>ATUAÇÕES</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link " href="#"><strong>CONTATOS</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link" href="galeria.php"><strong>GALERIA</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link active" href="login.php"><strong><i class="fa fa-sign-out"
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
            <h1 class="subtitulo"><i><strong>INFO Completas</strong> </i> </h1>
            <div class="mt-2 mb-2">
                <hr>
            </div>
        </div>

    </div>

    <div class="container">

        Nome:<input type="text" name="nome" id="nome" class="bloco-todo formulario" disabled
            value="<?php echo $dado['nome']?> ">
        <br>
        Email:<input type="email" name="email" id="email" value="<?php echo $dado['email']?>" disabled
            class="bloco-todo formulario">
        <br>

        CPF/CNPJ<input type="text" name="cpf_cnpj" id="cpf_cnpj" value="<?php echo $dado['cpf_cnpj']?>" disabled
            class=" mask-cpf bloco-todo formulario">
        <br>


        FIXO:<input type="text" name="fixo" id="fixo" value="<?php echo $dado['fixo']?> " disabled
            class="mask-telefone formulario">

        Celular:<input type="text" name="celular" id="celular" value="<?php echo $dado['celular']?>" disabled
            class="meio-todo mask-celular formulario" required>

        <br>
        <br>

        ID: <input type="text" name="id" id="id" value="<?php echo $dado['id']?> " disabled class=" formulario">

        Terminada: <input type="text" name="situacao" id="situacao" value="
            <?php 
                            $situacao = $dado['situacao'];
                            if($situacao == 1){
                                echo "Não";}else if($situacao == 0){
                                    echo "Sim";}
                            
                            ?>" disabled
            class=" formulario">

        <br>
        Data/Hora:<input type="text" name="hora_data" id="hora_data" value="<?php echo $dado['hora_data']?>" disabled
            class="meio-todo formulario" required>

        <h4 class="text-center endereco"><b>ENDEREÇO</b> </h4>

        CEP:<input type="text" name="cep" id="cep" value="<?php echo $dado['cep']?>" class="cep mask-cep formulario"
            disabled>

        Rua:<input type="text" name="rua" id="rua" value="<?php echo $dado['rua']?>" class="lagradouro formulario" disabled>
        <br>

        Numero:<input type="number" name="numero" id="numero" value="<?php echo $dado['numero']?>" class="numero formulario"
            disabled>
        Complemento:<input type="text" name="complemento" id="complemento" value="<?php echo $dado['complemento']?>" disabled
            class="complemento formulario">

        <br>
        Cidade:<input type="text" name="cidade" id="cidade" class="cidade formulario" value="<?php echo $dado['cidade']?>"
            disabled>
        Estado:<input type="text" name="estado" id="estado" class="estado formulario" value="<?php echo $dado['estado']?>"
            disabled>
        <br>
        Bairro:<input type="text" name="bairro" id="bairro" class="bloco-todo formulario" value="<?php echo $dado['bairro']?>"
            disabled>
        <br>
        <h4 class="text-center endereco"><b>Orçamento</b> </h4>
        <br>

        <br>
        TIPO:<input type="text" name="tipo" id="tipo" class="bloco-todo formulario" value="<?php echo $dado['tipo']?>"
            disabled>
        <br>

        <textarea type="text" name="orcamento" id="orcamento" class="bloco-todo formulario"
            disabled><?php echo $dado['orcamento']?></textarea>
        <br>
        <div class="text-center">
            <a href="lista.php"  class="btn btn_form mt-5">Voltar</a>
        </div>



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

<?php   mysqli_close($conecta); ?>
</html>