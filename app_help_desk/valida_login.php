<?php
    
    require_once("validador_acesso.php");
    if (!isset($_SESSION['autenticado'] ) || $_SESSION['autenticado'] != 'SIM' ) {
        header('Location: index.php?login=erro2');
    };
   
// Variável para autenticar o usuário
    $autenticando_usuario = false;
    $usuario_id = null;
    $usuario_perfil_id = null;
    $perfis = array(1 => 'administrativo', 2 => 'Usuário');




    // Usuários do sistema
    $usuarios_app = array(
    array('id' => 1, 'email' => 'asm@test.com.br', 'senha' => '123456', 'perfil_id' => 1),
    array('id' => 2,'email' => 'user@test.com.br', 'senha' => '123456', 'perfil_id' => 1),
    array('id' => 3,'email' => 'jose@test.com.br', 'senha' => '123456', 'perfil_id' => 2),
    array('id' => 4,'email' => 'maria@test.com.br', 'senha' => '123456', 'perfil_id' => 2));


foreach ($usuarios_app as  $user) {

    if ($user['email'] == $_POST['email'] &&  $user['senha'] == $_POST['password']) {
        $autenticando_usuario = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
  
    } if ($autenticando_usuario) {       
        echo 'Usuário autenticado <br/>';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    } else {
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'Não';
    };
};
?>