<?php

 session_cache_expire(5);
 $tempo_expirar = session_cache_expire();
 session_start();



    include 'config.php' ;
    

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome'])){

        $senha = trim($_POST['senha']);
        $nome = trim($_POST['nome']);
        $email= trim($_POST['email']);
        if( !empty(trim($_POST['senha'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST["nome"]))) {
        
            $query3 = "Select * from  usuarios where email='".$_POST['email']."'";
                    
            if ($result3 = $mysqli -> query($query3)) {
                if($result3->num_rows > 0) {
                    echo "usuario ja adicionado!";
                    exit();
                }
            }

        $senha_encripitado =  Bcrypt::hash($_POST['senha']);
        echo $senha_encripitado;
        $query = 'insert into usuarios (nome, email, password)  values ( "'.$_POST['nome'].'", "'.$_POST['email'].'", "'.$senha_encripitado.'")';


        if ($result = $mysqli -> query($query)) {
            if(!$result) {
                echo "Erro ao inserir o usuario no banco!!!!";
                exit();
            }

            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['first'] = 1;
            echo " ". $_SESSION['nome'] ." ". $_SESSION['email'] ." ". $_SESSION['first'];
            header('location:index.php');
          }
          
          $mysqli -> close();


    }else{
        echo "erro";
    }
}else{
    echo "Ops ocorreu um erro...";
}


?>