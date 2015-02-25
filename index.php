<?php
require 'Sistem/iniSis.php';
$ver = $USER->redirectLogado();
if ($ver) {
    header('Location: user/');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//PT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
            <title>SOStudy</title>
            <link rel="stylesheet" type="text/css" href="css/style.css">
                </head>
                <body>
                    <header>
                        <div class="wrap clearfix mt15">
                            <a href="#" class="logo"> </a>
                            <div id="wrap-login">
                                <form name="login" action="fnt/LogaUser.php" method="post">
                                    <input type="text" id="login-user" placeholder="Email" name="login-user" />
                                    <input type="password" id="login-senha" placeholder="Password" name="login-pass"/><input type="submit" value="Logar" />
                                    <span class="clearfix"> </span>
                                    <a href="#" class="recuperar-senha">Esqueci minha senha</a>
                                </form>
                            </div>
                        </div>
                    </header>
                    <section id="content">
                        <div class="wrap clearfix">

                            <div class="colum-6 pt30 pb30 line-right">
                                <h1 class="title-section">Saiba Mais</h1>
                                <iframe width="100%" height="300" src="//www.youtube.com/embed/TZq6znxCPQ0" frameborder="0" allowfullscreen></iframe>
                            </div>

                            <div class="colum-6 pt30">
                                <h1 class="title-section">Cadastre-se</h1>

                                <form action="fnt/CadastraUser.php" method="post">
                                    <table id="table-cadastro">
                                        <tr>	
                                            <td> <input type="text" placeholder="Nome" name="nome" /> </td>
                                            <td> <input type="text" placeholder="Sobrenome" name="sobrenome" /> </td>
                                        </tr> 
                                        <tr> 
                                            <td colspan="2"> <input type="text" placeholder="Email" name="email" /> </td>
                                        </tr>
                                        <tr> 
                                            <td colspan="2"> <input type="text" placeholder="Confirme seu Email" name="cemail" autocomplete="off" /> </td>
                                        </tr>
                                        <tr>	
                                            <td> <input type="password" placeholder="Senha" name="senha" /> </td>
                                            <td> <input type="password" placeholder="Repita a Senha" name="rsenha" /> </td>
                                        </tr> 
                                        <tr>
                                            <td> <input type="radio" name="sexo" value="M" /> Masculino <input type="radio" name="sexo" value="F" /> Feminino </td>
                                            <td> <input type="submit" value="Cadastrar" /> </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                        </div>
                    </section>
                </body>
                </html>