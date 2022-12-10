<?php
    
    include 'config.php';
    
    session_start();

     $erro = 0;
     $teste = '';



    if( !empty(trim($_POST['chave_livro'])) && !empty(trim($_SESSION['email'])) ){

     
        $query = "Select * from  usuarios where email='".$_SESSION['email']."'";
        if ($result = $mysqli -> query($query)) {
            if(!$result || $result->num_rows == 0) {
                $erro = 1;
                $teste =  'Usuario não encontrado!';
             }else{

                $usuario = array();
                while ($row = $result->fetch_assoc()) {
                 array_push($usuario,$row);   
                }

                $query3 = "Select * from  livro_usuario where usuariofk=".$usuario[0]['chave']." and livrofk = ".$_POST['chave_livro']."";
                
                if ($result3 = $mysqli -> query($query3)) {
                    if($result3->num_rows > 0) {
                        echo "Livro ja adicionado!";
                        exit();

                    }
                  
                    
                  }else{
                    echo "Erro ao conectar com o banco";
                  }


                $query2 = " insert into livro_usuario (usuariofk , livrofk ) values (".$usuario[0]['chave'].",".$_POST['chave_livro'].")";
                echo $query2;
                if ($result2 = $mysqli -> query($query2)) {
                    if(!$result2) {
                        $erro = 1;
                        $teste =  'Erro ao inserir no banco!';
                        echo "erro ao inserir";
                        exit();
                    }
                    header('location: ./index.php');
                    
                  }else{
                    echo "erro ao inserir";
                  }

             }    

        }else{
            $erro = 1;
            $teste =  'Erro ao conectar com o banco!';
        }


    }else{

        $erro = 1;
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