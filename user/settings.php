<?php 
	include 'header.php'; 
	
	$condition = "WHERE email = '{$_SESSION['emailUser']}'";
	$selection2 = $DB->QRSelect('_user',$condition);
	if($selection2) {
		//Recupera as informacoes do usuario
		foreach ($selection2 as $key) {
			$sexoUser = $key['sexo'];
			$nome = $key['name'];
			$thumb = $key['thumb'];
		}
	}
?>
<!--------------------------------------------------------------->
	<div class="modal hidden" id="mdl01">
		<div class="box">
			<form action="" method="post">
				<a href="#" id="close_">fechar [X]</a>
				<h2>Alterar Senha</h2>
				<hr>
				<label class="mb0">
					Digite a senha antiga<br>
					<input type="password" name="atual" class="medium"/>
				</label>
				<hr>
				<label class="mb0">
					Digite a nova senha<br>
					<input type="password" name="nova" class="medium"/>
				</label>
				<label>
					<br>Repita a senha<br>
					<input type="password" name="cnova" class="medium"/>
					<input type="submit" name="atualizasenha" value="Alterar" class="button"/>
				</label>
			</form>
		</div>
	</div>
<!--------------------------------------------------------------->	
	<section id="content" class="settings">
		<div class="wrap clearfix">
			<?php require '../fnt/SettingsEdit.php'; ?>
			<div class="header-box">Meu Perfil</div>
			<div class="body-box clearfix">
				<form action="settings.php" method="post" enctype="multipart/form-data">
					<?php if($thumb == ''){ ?>
					<label>
						Imagem de Perfil<br>
						<input type="file" name="thumb" class="medium"/><br>
						<img src="../uploads/user.jpg" class="mt15" width="100">
					</label>
					<?php } else { ?>
					<label>
						<img src="<?php echo URL;?>/uploads/<?=$thumb?>" width="100"/></a>					
						<a href="?edit=remove-thumb"><img src="../imagens/delete.png" title="Remover" /></a>
					</label>
					<?php }?>
					<label>
						Nome: <br>
						<input type="text" name="nome" class="medium" value="<?=$nome;?>"/>
					</label>
					<label>
						Senha: <br>
						<input type="password" disabled="disabled" name="senha" class="small" value="**********"/><p><a href="#" id="open_">Editar</a></p>
					</label>
					<label class="small pull-left">
						Sexo<br>
						<select name="sexo">
							<option <?php if($sexoUser == 'M'){echo 'selected="selected"';} ?> value="M">M</option>
							<option <?php if($sexoUser == 'F'){echo 'selected="selected"';} ?> value="F">F</option>
						</select>
					</label>
					<label>
						Email: <br>
						<input type="text" disabled="disabled" class="medium" value="<?php echo EMAILUSER;?>"/>
					</label>
					<label>
						<input type="submit" name="atualiza" value="Atualizar" class="button"/>
					</label>
				</form>
			</div>	
		</div>
	</section>
<?php include 'footer.php'; ?>	