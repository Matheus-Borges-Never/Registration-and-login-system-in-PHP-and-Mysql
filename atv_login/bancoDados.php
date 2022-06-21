<?php
    //Conexão com banco de dados
    //Criar o objeto de conexão
    $SERVIDOR   = 'localhost';
    $USUARIO    = 'admin';
    $SENHA      = '@Luno123';
    $BANCO      = 'TI41';

    $con = new mysqli ($SERVIDOR,$USUARIO,$SENHA,$BANCO);

    $nome       = $_GET['txtNome'];
    $user      = $_GET['txtUsua'];
    $senha      = $_GET['txtSenha'];
    $voltar      = true;

    if ( $con->connect_error){
        echo "Erro ao conectar com a base de dados";
    }else{

        $sql = "select * from TI41.login where usuario = '$user' and senha = '$senha';";
        $ret = $con -> query($sql);

    while ($registro = $ret->fetch_assoc()) {

        if ($user == $registro['usuario'] && $senha == $registro['senha']) {
            //echo "O login foi validade com sucesso!";
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['token'] = "ABCDEF";
            header("Location: cadastro.php");
            $voltar = false;
        }else {
            //echo "Usuario ou senhas invalidos.";
            //header("Location: index.php");
            $voltar = true;
        }
    }   
    if ($voltar == true){
        header("Location: index.php");
        
    }

        
}


?>