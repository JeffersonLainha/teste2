<?php
    session_start(); // Para iniciar uma sessão

    if(isset($_POST['email']) && !empty($_POST['email'])){ //verifica se foi digitado um e-mail
        $email = addslashes($_POST['email']); // verifica o e-mail informado (se existe no BD)
        $senha = addslashes($_POST['senha']); // verifica a senha informada (se existe no BD)
        
        $dsn = "mysql:dbname=jefferson;host=localhost"; // dados para conexao com o banco (qual BD e onde esta)
        $dbuser = "root"; // usuario
        $dbpass = ""; //senha

        try{
            $db = new PDO($dsn, $dbuser, $dbpass); // conectando com o BD

            $sql = $db->query("SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'"); //query a ser executada

            if($sql->rowCount() > 0){
                $dado = $sql->fetch(); //fetch  Retorna uma unica linha da consulta, neste caso o email digitado pelo usuario

                $_SESSION['codigo'] = $dado['codigo']; // sessao codigo passa a ser igual codigo do usuario cadastrado no BD
                header("Location: index.php"); //ir para a pagina index.php
            } // fazer um else de nao foi possivel logar
            else{
                echo 'Usuário ou Senha Inválido';
            }

        } catch(PDOException $e){
            echo "Falhou: ".$e->getMessage();
        }
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/estilo.css" />
    <script src=""></script>
</head>
<body>
    <div align='center'>
        <h2>Login</h2>
        <h3>Informe seu e-mail e sua senha</h3>
        <form method="POST">
            <p>
            E-mail:
            <input type='email'
                    name='email'>
                    
            </p>
            <p>
            Senha:
            <input type='password'
                    name='senha'>              
            </p>
            <input type='submit'
                    name='btn_enviar'
                    value='Entrar'
                    id='entrar'>
        </form>
    </div>               
</body>
</html>