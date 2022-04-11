<?php

    session_start();

    if(isset($_SESSION['codigo']) && !empty($_SESSION['codigo'])){
        echo "";
    }else{
        header("Location: login.php");
    }
?>

<DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='css/estilo2.css'>
    <meta charset='utf-8'>
    <title>Formulário</title>
  </head>
    <body>

        <img src = 'img/logo.jpg' height = '50%' width = '100%'>
        <p>
            <a href = formulario.php> Cadastre Novos Usuários </a>
        </p>  
        <p>
            <a href= sair.php> Sair </a>
        </p>     
        <h1>
            <marquee>
                Seja Bem Vindo!
            </marquee>
        </h1>

    </body>          
</html>