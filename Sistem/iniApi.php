<?php
@define(SUBURL, '/sostudy');
@define(BASE,substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME'])).SUBURL);
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
require_once BASE.'/Class/Database.class.php';
require_once BASE.'/Sistem/iniConfig.php';
require_once BASE.'/Sistem/iniFunc.php';
 