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
	<section id="content" class="guide">
		<div class="wrap clearfix">
			<?php require '../fnt/SettingsEdit.php'; ?>
			<div class="header-box">Meus Roteiros</div>
			<div class="body-box clearfix">
				<table class="table-box" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td><b>#</b></td>
							<td><b>CONTEÚDO</b></td>
							<td><b>DESCRIÇÃO</b></td>
							<td><b>LINK</b></td>
							<td><b>TAGS</b></td>
							<td><b>AÇÃO</b></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>---</td>
							<td>---</td>
							<td>---</td>
							<td>---</td>
							<td>---</td>
							<td>
								<i class="icon-pencil"></i>
								<i class="icon-trash3"></i>
								<i class="icon-share"></i>
							</td>
						</tr>
						<tr>
							<td>---</td>
							<td>---</td>
							<td>---</td>
							<td>---</td>
							<td>---</td>
							<td>
								<i class="icon-pencil"></i>
								<i class="icon-trash3"></i>
								<i class="icon-share"></i>
							</td>
						</tr>						
					</tbody>
				</table>
			</div>	
		</div>
	</section>
<?php include 'footer.php'; ?>	