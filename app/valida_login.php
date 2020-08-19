<?php

    session_start(); 
    
    //Variavel para verificar se autenciação foi realizada com sucesso

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfil = array(1=>'Administrativo', 2=>'Usuário');

    //array de usuário sem conexão com o BD
    $usuarios = array(
        array("id", 1, "email"=>"adm@teste.com.br", "senha"=>"1234", "perfil_id" => 1),
        array("id", 2, "email"=>"user@teste.com.br", "senha"=>"1234" , "perfil_id" => 1),
        array("id", 3, "email"=>"jose@teste.com.br", "senha"=>"1234" , "perfil_id" => 2),
        array("id", 4, "email"=>"maria@teste.com.br", "senha"=>"1234" , "perfil_id" => 2)
    );

   foreach($usuarios as $user){
        
        /*echo 'Usuario App: ' . $user['email'] . '/' . $user['senha'];
        echo '<br />';
        echo 'Usuario form:. ' . $_POST ['email'] . '/' . $_POST ['senha'];
        echo '<br />';
        */

        if ($user['email'] == $_POST ['email'] && $user['senha'] == $_POST ['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }

        if($usuario_autenticado){
            
            echo "Usuário Autenticado com Sucesso!";
            $_SESSION['autenticado'] = 'Sim';
            $_SESSION['id'] = $usuario_id;
            $_SESSION['perfil_id'] = $usuario_perfil_id;

            header('Location: home.php');
        }else{
            
            $_SESSION['autenticado'] = 'Não';
            header("Location: index.php?login=erro");
        }
       

        
    }

    


?>