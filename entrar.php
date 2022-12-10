<?php

session_cache_expire(5);
$tempo_expirar = session_cache_expire();
session_start();

$erro = 0;
$teste = "";
    include 'config.php';

    if(isset($_POST['email']) && isset($_POST['senha'])){

        $senha = trim($_POST['senha']);
        $email= trim($_POST['email']);
        $senha_encripitado =  Bcrypt::hash($_POST['senha']);
        if( !empty(trim($_POST['senha'])) && !empty(trim($_POST['email'])) ) {

            $query = 'Select * from  usuarios where email = "'.$email.'" limit 1;'; 
            
            if ($result = $mysqli -> query($query)) {
                if(!$result) {
                    $erro = 1;
                    $teste =  'Email não encontrado!';
                    exit();
                }
                
                if($result->num_rows == 0) {
                    $erro = 1;
                    $teste =  'Email não encontrado!';
                }


                while ($row = $result->fetch_assoc()) {
                  
                  var_dump($row);
                    if (Bcrypt::check($senha, $row['password'])) {
                        $_SESSION['nome'] = $row['nome'];
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['first'] = 1;
                        header('location:index.php');
                    } else {
                        $erro = 1;
                        $teste =  'Senha incorreta!';
                    }
                    
                }

                


              }


        }else{
            $erro = 1;
        }

    }else{

        $erro = 1;
       ;
    }


?>






<html>


<head>


<?php echo  $erro == 1 ? " <script> alert('Erro! :  ".$teste." '); 
  location.href = './index.php';


</script>" : "" ?>


</head>





<body> 







</body>









</html>