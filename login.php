<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

    <script src="JavaScript/login.js"></script>




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
                                <a class="nav-link active"><strong><i class="fa fa-user active"
                                            aria-hidden="true"></i></strong></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>

    <?php
    $log ="";
    if(isset($_GET['log']) == 'ok'){
        echo '<div class="bg-danger text-white text-center p-2"><strong> Faça Login para ter acesso / Login ou Senha Incorretos</strong></div>';
    }
    ?>

    <div class="container">
        <div id="login">
            <h3 class="text-center text-white">Login form</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form formulario" class="form" action="session.php" method="POST">
                                <h3 class="text-center text-info"><strong>LOGIN</strong></h3>
                                <div class="form-group">
                                    <label for="username" class="text-info">Usuario:</label><br>
                                    <input type="text" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Senha:</label><br>
                                    <input type="password" name="senha" id="senha" class="form-control" required>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-info btn-lg" onclick="return valida()"
                                        value="Enviar">
                                </div>

                                <div id="resposta" class="text-danger"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
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


</html>