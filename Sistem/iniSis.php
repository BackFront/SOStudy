<?php
/*	
 * 
 * 
 * */
if(!isset($_SESSION)){
    session_start();
}

/*=================================================
 INI-SET
================================================*/
ini_set('display_errors', 1);
error_reporting(E_ALL);

//--------/ SYSTEM DEFINITIONS /-------------
@define(SITENAME,'SOStudy | Search..');
@define(SITEDESC,'Procura Otimizada por contaudo de estudos');
@define(SUBURL, '/sostudy');
@define(BASE,substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME'])).SUBURL);
@define(URL,'http://localhost'.SUBURL);
@define(SITEKEYS,'estudos,sos,study,aprender');
@define(AUTOR,'Douglas Alves Almeida');
@define(COMPANY,'SOStudy');
@define(CREATIONDATE,'24/02/2014');
@define(CHARSET, 'utf-8');
@define(LOG, true);

//--------/DATABASE DEFINITIONS/------------

@define(HOST,'localhost');
@define(USER,'root');
@define(PASS,'');
@define(DBSA,'sostudy');
@define(PORT, 3306);

 /*/
@define(HOST,'mysql8.000webhost.com');
@define(USER,'a6720942_sostudy');
@define(PASS,'douglas123');
@define(DBSA,'a6720942_sostudy');
*/
@define(PREFIXDBA, ''); //Default use ''

//--------/MAIL DEFINITION/------------
@define(MAILHOST,'smtp.mail.com');
@define(MAILUSER,'projeto@mail.com');
@define(MAILPASS,'******');
@define(MAILPORT,'587'); //Default use 587

//--------/USER DEFINITIONS/------------
@define(IDUSER,$_SESSION['idUser']);
@define(NAMEUSER, $_SESSION['nameUser']);
@define(EMAILUSER,$_SESSION['emailUser']);
@define(THUMUSER,$_SESSION['thumb']);

/*
 * ------------------ Don't change the start pointer --------------
 */
echo '<meta charset="'.CHARSET.'">';
/*================================
  Includes
===============================*/
require_once BASE.'/Class/MessageBox.class.php';
require_once BASE.'/Class/Database.class.php';
require_once BASE.'/Sistem/iniConfig.php';
require_once BASE.'/Class/User.class.php';
require_once BASE.'/Class/Post.class.php';
require_once BASE.'/Class/File.class.php';
require_once BASE.'/Sistem/iniFunc.php';

/*================================
  MODULES / FUNCTIONS
===============================*/
require_once BASE.'/fnt/Data.php';
$MSG = new MessageBox();
$USER = new User();
$POST = new Post();
$FILE = new File();
?>