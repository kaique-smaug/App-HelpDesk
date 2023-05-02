<?php 
   
   session_start();


    $arquivo = fopen('arquivo.txt', 'a');
    // $title = str_replace('#', '-', $_POST['title']);
    // $category = str_replace('#', '-', $_POST['category']);
    // $textarea = str_replace('#', '-', $_POST['textarea']);
    // O implode transforma um array em uma string
    $textarea = implode('-', $_POST);
    $texto = $_SESSION['id'] . PHP_EOL . $textarea;
    // A função fwrite espera 2 parâmetros 1-referencia do arquivo que abrimos 2-passa o que quer que seja escrito
    fwrite($arquivo, $texto);
    // Após escrever dentro do arquivo deve fechar o arquivo
    fclose($arquivo);
    // echo $texto;

    //Forçando um redirecionamento pós a escrita dos dados no arquivo para a x página

    header('Location: index.php')

?>