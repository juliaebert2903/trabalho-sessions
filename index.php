
<?php
    include 'config.php';
    $logado = 0;
    session_start();
    if(!isset($_SESSION['first'])) {
        $_SESSION['first'] = 0;
    }
    if( isset($_SESSION['nome']) && isset($_SESSION['email']) ) {

        $logado = 1;
        if($_SESSION['first'] == 1) {
            
            echo $_SESSION['first'] == 1 ? ('<script>alert("Seja Bem Vindo '. $_SESSION['nome'] . '"); </script>') : "";
            $_SESSION['first'] = 0;

        }
    }

?>

<!doctype html>


<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <?php
    if($_SESSION['first'] == 1) {
            
            echo $_SESSION['first'] == 1 ? ('<script>alert("Seja Bem Vindo '. $_SESSION['nome'] . '); </script>') : "";
            $_SESSION['first'] = 0;

        } ?>
    <title>My Library</title>
</head>

<body>

    <div class="container">

        <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="headerlogin">
                            <span> Entrar</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="formlogin" action="./entrar.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="email" >

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Senha</label>
                                <input type="password"  name="senha" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div><button type="submit" class="btn btn-primary">Logar</button></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade" id="Registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="headerlogin">
                            <span> Registrar-se</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="formlogin" action="./cadastro.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control"  name="nome" id="nome_completo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email"  id="Email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Senha</label>
                                <input type="password" class="form-control" name="senha" id="exampleInputPassword1">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <div class="navbar-brand" >
                    <img src="./imgs/logo.png" alt="logo" class="logo">
                    <span>My Library</span>

                    <?php

                    echo $logado == 1 ? '
                    <a class="nav-link containersejabenvindo" href="./meuslivros.php">
                        
                        
                        <i class="bi bi-book"></i>
                       
                       
                       
                       <span>  Meus Livros </span>
                       
                       
                       
                       </a>' : ""; ?>
                 </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="arrumarcabecalho">
                    
    

                    <form class="d-flex">
                      <?php echo $logado == 1 ?' 
                        <a class="nav-link '.($logado ==1 ? "containersejabenvindo": ""). '" href="#">
                        
                        
                        <i class="bi bi-person-fill"></i>
                        
                        
                        
                        <span>  Seja Bem Vindo, '. $_SESSION["nome"] .' </span>
                        
                        
                        
                        </a>

                        <a class="nav-link deslogar" href="./Deslogar.php"><span>Deslogar-se </span></a>
                      
                      
                      ' : '<a class="nav-link " href="#" data-bs-toggle="modal" data-bs-target="#Login">Entrar</a>
                        <a class="nav-link " data-bs-toggle="modal" data-bs-target="#Registrar"
                            href="#">Registrar-se</a>
            ';
                            ?>
                    </form>
                      </div>
                </div>

            </div>
        </nav>



        <!-- Fim Do Header  comeco do Main -->


        <div class="maincontainer">

            <div class="ContainerLivros">
                <div class="titulo_livros">
                        Livros Disponiveis
                </div>
                <div class="containerbutoes">
                    <div>
                        <div id="proximo"> > </div>
                            <div class="meio"> </div>
                        <div id="antes"> < </div>
                    </div>
                </div>

                <div class="containercarrosel">

                   
                    <?php 

                $query  = "SELECT livros.*, autores.nome  FROM livros  inner join  autor_livro on autor_livro.livrofk = livros.chave inner join autores on autores.chave = autor_livro.autorfk where livros.disponiveis > 0";

                if ($result = $mysqli -> query($query)) {
                    if(!$result) {
                       echo '<div class="notfond"> Nenhum Livro Encontrado</div>';
                    }
                    
                    if($result->num_rows == 0) {
                        $erro = 1;
                        echo '<div class="notfond"> Nenhum Livro Encontrado</div>';
                    }
    
                    $disponiveis = array();
                    while ($row = $result->fetch_assoc()) {
                     array_push($disponiveis,$row);   
                    }

                    $filtro = array_keys(array_unique(array_column($disponiveis,'titulo')));
                    $filtrado = array();
                    foreach($filtro as &$valor){
                        $autores = '';
                      $teste3 = array_filter($disponiveis, function($asd) {
                          global $valor;
                          global $disponiveis;
                                        if($disponiveis[$valor]['titulo'] == $asd['titulo'] ) {
                                            return true;
                                        }else{
                                            return false;
                                        }
                      });
                     foreach($teste3 as &$auto){
                         $autores = $autores. '<span>'.$auto['nome'].'</span>';
                     }
    

                        echo " <div class='item'>
                        <div class='addlivro'>
                        
                        <div onClick=(teste(".$disponiveis[$valor]['chave']."))>
                        
                        Adicionar a sua lista

                        </div>

                           <form method='POST' action='./addlivro.php' style='display:none;'> 
                           
                            <input value='".$disponiveis[$valor]['chave']."' name='chave_livro' />

                            <button type='submit' id='btn".$disponiveis[$valor]['chave']."'> </button>
                           
                            </form>

                    </div>
                        <img src='./book.png'>
                        <span>".$disponiveis[$valor]['titulo']."</span>
                        <div>".$autores."</div>
                        <div>
                            <span> Quantidade</span>
                            <span>". $disponiveis[$valor]['disponiveis']."</span>
                        </div>
                </div>";
                    }

                    
    

                  }


        ?>

                </div>

            </div>

            <div class="ContainerLivros">
                <div class="titulo_livros">
                        Livros Não Disponiveis
                </div>
                <div class="containerbutoes">
                    <div>
                        <div id="proximo2"> > </div>
    
                        <div id="antes2"> < </div>
                    </div>
                </div>
    
                <div class="containercarrosel2">
    
                <?php 

$query  = "SELECT livros.*, autores.nome  FROM livros  inner join  autor_livro on autor_livro.livrofk = livros.chave inner join autores on autores.chave = autor_livro.autorfk where livros.disponiveis <= 0";

if ($result = $mysqli -> query($query)) {
    if(!$result) {
       echo '<div class="notfond"> Nenhum Livro Encontrado</div>';
    }
    
    if($result->num_rows == 0) {
        $erro = 1;
        echo '<div class="notfond"> Nenhum Livro Encontrado</div>';
    }

    $disponiveis = array();
    while ($row = $result->fetch_assoc()) {
     array_push($disponiveis,$row);   
    }

    $filtro = array_keys(array_unique(array_column($disponiveis,'titulo')));
    $filtrado = array();
    foreach($filtro as &$valor){
        $autores = '';
      $teste3 = array_filter($disponiveis, function($asd) {
          global $valor;
          global $disponiveis;
                        if($disponiveis[$valor]['titulo'] == $asd['titulo'] ) {
                            return true;
                        }else{
                            return false;
                        }
      });
     foreach($teste3 as &$auto){
         $autores = $autores. '<span>'.$auto['nome'].'</span>';
     }


        echo " <div class='item2'>
        <div class='addlivro'>
            <div>
                Adicionar a sua lista
            </div>
        </div>
        <img src='./book.png'>
        <span>".$disponiveis[$valor]['titulo']."</span>
        <div>".$autores."</div>
        <div>
            <span> Quantidade</span>
            <span>". $disponiveis[$valor]['disponiveis']."</span>
        </div>
</div>";
    }

    


  }


?>
    
                </div>
    
            </div>
    
    
        </div>


        </div>







    </div>


    <footer>

            <span> Site Desenvolvido por</span>
            <a href="https://github.com/LuanSVXM" target="_blank">@Luan Vieira</a>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="main.js"></script>
    <script src="multiitems.js"></script>
</body>

</html>