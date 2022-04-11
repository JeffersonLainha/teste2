<?php

  session_start();

    if(isset($_SESSION['codigo']) && !empty($_SESSION['codigo'])){
        echo "";
    }else{
        header("Location: login.php");
    }


  $dsn = "mysql:dbname=jefferson;host=localhost"; 
  $dbuser = "root"; 
  $dbpass = "";

  if($_POST){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $db = new PDO($dsn, $dbuser, $dbpass); 

        $sql = $db->query("INSERT INTO cadastro (nome, email, senha) values ('".$nome."', '".$email."', '".$senha."')");               
        
        echo "Cadastro efetuado com sucesso!";
                   
        }
    catch(PDOException $erro) {
        echo "Erro ao conectar ao BD: " . $erro->getMessage();
    }
    
  }
  





/*
$mensagem = ''; // mensagem que será exibida

    if (($_POST)){
        $conexao = mysql_connect('localhost', 'root') or die(mysql_error()); //criar variável de conexão ao BD
        mysql_select_db('jefferson', $conexao) or die(mysql_error()); //qual BD será conectado
      
    #Variáveis dos campos que serão preenchidos...
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    #query que será executada ao clicar em enviar - neste caso de gravação o INSERT.

        $query = "INSERT INTO cadastro (nome, email, senha) values ('".$nome."', '".$email."', '".$senha."')";
       
        
    #Caso a query seja executada com sucesso...
       $q = mysql_query($query);
            if($q){
                $mensagem = "Usuário cadastrado com sucesso!";
                header("Location: formulario.php"); /*evitar de duplicar o cadastro ao banco e abre
                                                    após cadastrar.//
            }else {
                $mensagem = "Erro ao cadastrar usuário!";
            }
    }
   */ 
?>
<DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='css/estilo.css'>
    <meta charset='utf-8'>
    <title>Formulário</title>
  </head>
    <body>
        <?php
            /*if($mensagem){
                echo $mensagem;
            }*/
        ?>
    <div name='formcadastro' align='center'>
      <h1>
        Formulário de Cadastro
      </h1>
      <form method="POST" action="formulario.php">
        <p>
          Nome Completo:
          <input type='text'
                 name='nome'
                 placeholder='Informe o nome Completo'
                 autofocus
                 required>
        </p>
        <p>
          E-mail:
          <input type='email'
                 name='email'
                 placeholder='Informe seu e-mail válido'
                 required>
        </p>
        <p>
          Senha:
          <input type='password'
                 name='senha'
                 required>
        </p>
        <input type='submit'
               name='btn_enviar'
               value='Enviar'
               id='enviar'>
        <input type='reset'
               name='btn_limpar'
               value='Limpar Campos'
               id='limpar'>
      </form>
    </div>      
      </p>
    </body>
</html>