<?php

    session_start();  

    
    //Variavel para verificar se autenciação foi realizada com sucesso

    $usuario_autenticado = false;
    //array de usuário sem conexão com o BD
    $usuarios = array(
        array("email"=>"adm@teste.com.br", "senha"=>"123456"),
        array("email"=>"user@teste.com.br", "senha"=>"abdc")
    );

   /* echo '<pre>';
    print_r($usuarios);
    echo'</pre>';*/

    foreach($usuarios as $user){
        
        /*echo 'Usuario App: ' . $user['email'] . '/' . $user['senha'];
        echo '<br />';
        echo 'Usuario form:. ' . $_POST ['email'] . '/' . $_POST ['senha'];
        echo '<br />';
        */

        if ($user['email'] == $_POST ['email'] && $user['senha'] == $_POST ['senha']){
            $usuario_autenticado = true;
        }

        if($usuario_autenticado){
            
            echo "Usuário Autenticado com Sucesso!";
            $_SESSION['autenticado'] = 'Sim';
            header('Location: home.php');
        }else{
            
            $_SESSION['autenticado'] = 'Não';
            header("Location: index.php?login=erro");
        }
       

        
    }

    


?>