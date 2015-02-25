<?php
$hostDB = @HOST;
$userDB = @USER;
$passDB = @PASS;
$portDB = @PORT;
$nameDB = @DBSA;

//Cria a Classe de Manipulamento do Banco de Dados
$DB = new Database($hostDB,$userDB,$passDB);
//Cria a conexao
$DB->Connect();
//Seleciona o Banco de Dados
$DB->SelectDB($nameDB);
?>