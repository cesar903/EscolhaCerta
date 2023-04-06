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
                                <a class="nav-link active" href="#"><strong>ATUAÇÕES</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link" href="contatos.php"><strong>CONTATOS</strong></a>
                            </li>
                            <li class="nav-item mr-lg-3">
                                <a class="nav-link" href="galeria.php"><strong>GALERIA</strong></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>

    <?php
    $conf ="";
    if(isset($_GET['conf'])){
        echo '<div class="bg-success text-white text-center p-2"><strong> Dados enviados com sucesso. Aguarde retorno no email indicado</strong></div>';
    }
    ?>

    <div class="envio text-center"></div>
    <div class="container mb-5">
        <div class=" text-center mt-5 mb-5">
            <h1 class="subtitulo"><i><strong>Entre em contato</strong> </i> </h1>
            <div class="mt-2 mb-2">
                <hr>
            </div>
        </div>

    </div>

    <div class="container">
        <form method="post" action="./model/adiciona.php" class=" container container-fluid">
            <input type="text" name="nome" id="nome" placeholder="Nome completo ou Instituição"
                class="bloco-todo formulario" required>
            <br>
            <input type="email" name="email" id="email" placeholder="Email para retorno" class="bloco-todo formulario"
                required>
            <br>


            <div class="dados mt-3 container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <input type="radio" name="doc" id="cpf" value="cpf" onclick="dado_escolhido()"
                            class="formulario" checked><label for="cpf"><span>CPF</span></label>
                    </div>

                    <div class="col-md-4">
                        <input type="radio" name="doc" id="cnpj" value="cnpj" onclick="dado_escolhido()"
                            class="formulario"><label for="cnpj"><span>CNPJ</span></label>
                    </div>
                </div>
            </div>

            <input type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="Escolha CPF ou CNPJ"
                class=" mask-cpf bloco-todo formulario" required>
            <br>


            <input type="text" name="fixo" id="fixo" placeholder="Tel. Fixo (opcional)"
                class="mask-telefone formulario">

            <input type="text" name="celular" id="celular" placeholder="Celular"
                class="meio-todo mask-celular formulario" required>

            <h4 class="text-center endereco"><b>ENDEREÇO</b> </h4>

            <input type="text" name="cep" id="cep" placeholder="CEP (Obrigatorio.)" class="cep mask-cep formulario"
                size="10" maxlength="9" onblur="pesquisacep(this.value);" required>

            <input type="text" name="rua" id="rua" placeholder="Lagradouro (Rua, Avenida, etc...)"
                class="lagradouro formulario">
            <br>

            <input type="number" name="numero" id="numero" placeholder="Numero" class="numero formulario" required>
            <input type="text" name="complemento" id="complemento" placeholder="Complemento"
                class="complemento formulario">


            <br>
            <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="cidade formulario">
            <input type="text" name="estado" id="estado" placeholder="Estado" class="estado formulario">
            <br>
            <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="bloco-todo formulario">
            <br>

            <h4 class="text-center endereco"><b>Pedir Orçamento</b> </h4>
            <br>
            <select name="tipo" id="tipo" class="ls-select formulario" style="width:300px" data-search="false"
                placeholder="Selecione um Serviço">
                <option value="ServicosGerais">Serviços Gerais</option>
                <option value="Eletricista" >Eletricista</option>
                <option value="Azulejista">Azulejista</option>
                <option value="Pintor">Pintor</option>
                <option value="Marceneiro">Marceneiro</option>
                <option value="Outros">Outros</option>
            </select>
            <br><br>

            <textarea type="text" name="orcamento" id="orcamento" placeholder="Digite seu orçamento"
                class="bloco-todo formulario" required></textarea>
            <br>
            <div id="resposta" class="text-danger"></div>

            <br>
            <div class="text-center">
                <button type="submit" class="btn btn_form mt-5" onclick="return valida()">Enviar</button>
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