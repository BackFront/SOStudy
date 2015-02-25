<?php 
	include 'header.php';
	$id_post = $_GET['id'];
	$id_user = IDUSER;
	$condition = "WHERE id = {$id_post} AND user_id = {$id_user}";			
	$selection = $DB->QRSelect('_post',$condition);
	/*echo "<pre>";
	print_r($selection);*/
	if(!$selection){
		echo '<div class="msg erro">Conteúdo não pode ser editado ou não existe!</div>';
		die;
	} else {
?>
	<section id="content" class="settings">
		<div class="wrap clearfix">
			<?php require '../fnt/UpdateContent.php'; ?>
			<div class="header-box">Editar Conteúdo</div>
			<div class="body-box clearfix">
				<form action="" method="post">
					<label>
						Titulo do Conteúdo<br>
						<input type="text" name="titulo" autocomplete="off" class="small" value="<?php if(!empty($selection[0]['post_title'])){ echo $selection[0]['post_title']; }?>"/>
					</label>
					<label>
						Link para o Conteúdo: <br>
						<input type="text" name="link" autocomplete="off" class="medium"  value="<?php if(!empty($selection[0]['post_link'])){ echo $selection[0]['post_link']; }?>"/>
					</label>
					<label class="small pull-left">
						Categoria<br>
						<select name="categoria">
							<option selected="selected" value="<?=$selection[0]['post_category'];?>"><?php if(!empty($selection[0]['post_category'])){ echo $selection[0]['post_category'];}?></option>
							<option value="ASP">ASP</option>
							<option value="CSharp">C#</option>
							<option value="PHP">PHP</option>
							<option value="OUTRA">OUTRA</option>
						</select>
					</label>
					<label class="small pull-left">
						Tipo de Mídia<br>
						<select name="midia">
							<option selected="selected" value="<?=$selection[0]['post_midia']?>"><?php if(!empty($selection[0]['post_midia'])){ echo $selection[0]['post_midia']; }?></option>
							<option value="Conteúdo Online">Conteúdo Online</option>
							<option value="Video">Video</option>
							<option value="PDF">PDF</option>
							<option value="Livro Digital">Livro Digital</option>
							<option value="OUTRO">OUTRO</option>
						</select>
					</label>
					<label class="small pull-left">
						Idioma do Conteúdo<br>
						<select name="idioma">
							<option selected="selected" value="<?=$selection[0]['post_idioma']?>"><?php if(!empty($selection[0]['post_idioma'])){ echo $selection[0]['post_idioma']; }?></option>
							<option value="Portugues">Portugues</option>
							<option value="Ingles">Ingles</option>
							<option value="Espanhol">Espanhol</option>
						</select>
					</label>
					<div class="clearfix"></div>
					<label class="small pull-left">Tipo de Postagem<br><input type="radio" checked="checked" name="opc" value="public"/><p>Público</p></label>
					<label class="small pull-left"><br><input type="radio" name="opc" value="private"/><p>Privado</p></label>
					<label>
						Descrição<br>
						<textarea class="medium" name="descricao"><?php if(!empty($selection[0]['post_description'])){ echo $selection[0]['post_description']; }?></textarea>
					</label>
					<label>
						<input type="submit" name="editar" value="Atualizar" class="button"/>
					</label>
					<input type="hidden" value="<?=$id_post?>" name="post" />
				</form>
			</div>	
		</div>
	</section>
<?php include 'footer.php'; } ?>	