<?php 
	include 'header.php';
?>
	<section id="content" class="settings">
		<div class="wrap clearfix">
			<?php require '../fnt/CadastraContent.php'; ?>
			<div class="header-box">Adicionar Referência</div>
			<div class="body-box clearfix">
				<form action="" method="post">
					<label>
						Titulo do Conteúdo<br>
						<input type="text" name="titulo" autocomplete="off" class="small" value="<?=(isset($titulo)) ? $titulo : '' ;?>"/>
					</label>
					<label>
						Link para o Conteúdo: <br>
						<input type="text" name="link" autocomplete="off" class="medium"  value="<?=(isset($link)) ? $link : '' ;?>"/>
					</label>
					<label class="small pull-left">
						Categoria<br>
						<select name="categoria">
							<option disabled="disabled" selected="selected">Selecione uma Categoria</option>
							<option value="ASP">ASP</option>
							<option value="CSharp">C#</option>
							<option value="PHP">PHP</option>
							<option value="OUTRA">OUTRA</option>
						</select>
					</label>
					<label class="small pull-left">
						Tipo de Mídia<br>
						<select name="midia">
							<option disabled="disabled" selected="selected">Selecione uma Categoria</option>
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
							<option disabled="disabled" selected="selected">Selecione um idioma</option>
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
						<textarea class="medium" name="descricao"><?=(isset($descricao)) ? $descricao : '' ;?></textarea>
					</label>
					<label>
						<input type="checkbox" name="concordo" /><p>Concordo com os termos de uso e estou ciente que e de minha responsabilidade a origem do conteúdo.</p>
					</label>
					<label>
						<input type="submit" name="cadastrar" value="Cadastrar" class="button"/>
					</label>
					<input type="hidden" value="<?=IDUSER?>" name="autor" />
				</form>
			</div>	
		</div>
	</section>
<?php include 'footer.php'; ?>	