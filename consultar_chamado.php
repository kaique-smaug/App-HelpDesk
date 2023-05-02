<?php 
require_once("validador_acesso.php");





// Esse array irá conter nossos chamados
$chamados = array();
// Abrir o arquivo.txt
$arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');
// Enquanto ouver registros/linhas a serem recuperados
while(!feof($arquivo)) { // testa pelo fim de um arquivo, percorre determinado arquivo recuperando cadas umas das linhas até que ela o dinal da linha
  // linhas
 $registro = fgets($arquivo); //Recupera o que tiver na linha até uma determinada quantidade de bytesou até encontrar o final da linha
  $chamados[] = $registro;
}
// feechar o aruivo aberto
fclose($arquivo);
//...

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
          <li class="nav-item">
            <a href="logoff.php" class="nav-link">Sair</a>
          </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php foreach($chamados as $chamado) { ?>
                <?php 
                  $chamado_dados = explode('#', $chamado);
                 
                  if ($_SESSION['perfil_id'] == 2) {
                      // Só vamos exibir o chamado se for criado pelo usuário
                      if ($_SESSION['id'] != $chamado_dados[0]) {
                       continue;
                      };
                    };

                  print_r($chamado_dados);
                  if (count($chamado_dados) < 3) {
                   continue;
                  };               
                  ?>
                <?php $chamado.'<br>/'; ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?php$chamado_dados[0];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php$chamado_dados[1];?></h6>
                    <p class="card-text"><?php $chamado_dados[2];?></p>
                  </div>
                </div>

                <?php  } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" >Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>