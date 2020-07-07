<?php 

include_once "classe/conexao.php";


$operacao = $_GET["operacao"];
//Cadastro de produto
if($operacao == "cad_produto"){
   echo " operacao Cadastro de produto ";
   $imagem = $_FILES["imagem"]['tmp_name'];
   $nome = $_POST["nome"];
   $categoria = $_POST["categoria"];
   $preco = $_POST ["preco"];
   $descricao = $_POST ["descricao"];
   $quantidade = $_POST ["quantidade"];
   
    
   $sql = "INSERT INTO produto (imagem ,nome, categoria, preco, descricao, quantidade) VALUES ";
   $sql .= "('$imagem','$nome','$categoria', '$preco' ,'$descricao', '$quantidade')";
   if($mysqli->query($sql)===TRUE){
       echo "PRODUTO CADASTRADO COM SUCESSO";

       header('Location: gerenciar_produto.php');
   }else {
       echo " Erro: " . $mysqli->error;
   }

    /*if($imagem != NULL) { 
        $nomeFinal = time().'.jpg';
        if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal); 
     
            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
     
            mysql_connect($host,$username,$password) or die("Impossível Conectar"); 
     
            @mysql_select_db($db) or die("Impossível Conectar"); 
     
            mysql_query("INSERT INTO produto (imagem ,nome, categoria, preco, descricao, quantidade) VALUES ('$imagem','$nome','$categoria', '$preco' ,'$descricao', '$quantidade')") or
            die("O sistema não foi capaz de executar a query"); 
     
            unlink($nomeFinal);
             
            
        }
    } 
    else { 
        echo"Você não realizou o upload de forma satisfatória."; 
    }*/

      
}
// Alterar Produto
if($operacao == "alt_produto"){
    echo "Operação alterar produto iniciada!";

   $id = $_GET["id"];
   $imagem = $_POST["imagem"];
   $nome = $_POST["nome"];
   $categoria = $_POST["categoria"];
   $preco = $_POST ["preco"];
   $descricao = $_POST ["descricao"];
   $quantidade = $_POST ["quantidade"];

   $sql = "UPDATE produto SET 
            imagem = '".$imagem."', nome = '".$nome."', categoria = '".$categoria."',preco = '".$preco."',descricao = '".$descricao."',quantidade = '".$quantidade."'
            WHERE id = ".$id;

    if($mysqli->query($sql)===TRUE){
        echo "PRODUTO ATUALIZADO COM SUCESSO";
    }else {
        echo " Erro: " . $mysqli->error;
    }

}
// Excluir produto
if($operacao == "exc_produto"){
    

   $id = $_GET["id"];
   $sql = "DELETE FROM produto WHERE id = ".$id;

    if($mysqli->query($sql)===TRUE){

        header("Location: gerenciar_produto.php");
    }else {
        echo " Erro: " . $mysqli->error;
    }

}
// Cadastro de usuario
if($operacao == "cad_usuario"){
    echo "Operação cadastro de usuario iniciada!";
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuario (nome, sobrenome, email, cpf, senha) VALUES ";
    $sql .= "('$nome','$sobrenome', '$email','$cpf', '$senha')";

    if($mysqli->query($sql)===TRUE){
        echo "USUARIO CADASTRADO COM SUCESSO";
    }else {
        echo " Erro: " . $mysqli->error;
    }

}








?>