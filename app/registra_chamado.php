<?php

session_start();

$titulo = str_replace('#', '-',$_POST['titulo']);
$categoria = str_replace('#', '-',$_POST['descricao']);
$descricao = str_replace('#', '-',$_POST['descricao']);

$text = $_SESSION['id'] . '#' . $titulo .'#'.  $categoria.'#'.  $descricao . PHP_EOL;

var_dump($_SESSION);
exit;

$arquivo = fopen('arquivo.hd', 'a');



fwrite($arquivo, $text);

fclose($arquivo);

header("Location: abrir_chamado.php");