<?php include 'header.php'; ?>
		<div id="atividades">
			<div class="wrap clearfix">
				<ul class="clearfix atividades">
					<li class="colum-4">
						<a href="#" class="ativ"> <i>-</i> </a>
						ATIVIDADES
					</li>
					<li class="colum-4">
						<a href="#" class="publ"> <i>-</i> </a>
						MEUS INTERESSES
					</li>
					<li class="colum-4">
						<a href="#" class="saes"> <i>-</i> </a>
						SALA DE ESTUDOS
					</li>
				</ul>
			</div>
		</div>
		<section id="content">
			<div class="wrap clearfix">
				<div class="colum-8">
					<ul id="timeline">
						<?php
						$loop = $POST->Loop("WHERE post_type = 'public' ORDER BY id DESC");
						if($loop){
							foreach ($loop as $key) {								
								$autor = $POST->get_autor($key['user_id']);
								$d = date_transform($key['post_date'], true);
								$dia = $d['dia'];
								$mes = $d['mes'];
								$mes = substr($mes,0,3);
						?>
						<li>
							<h3><?=$key['post_category']?></h3>
						<h2><a href="<?=$key['post_link'];?>" target="_blank"><?=$key['post_title']?></a><?= ($key['user_id'] == IDUSER) ? '<a href="edit_content.php?id='.$key['id'].'" class="editar-post">[editar]</a>' : ''; ?> <sub class="data"><?=$dia.' | '.$mes?></sub> </h2>
							<div class="info">
								<a href="#"><img src="<?php if(!empty($autor['thumb'])){ echo URL.'/uploads/'.$autor['thumb']; }else{ ?>../uploads/user.jpg<?php }?>" class="ico-user" width="50" /></a>
								<p>por: <a href="#"><?=$autor['name'];?></a></p>
							</div>
							<div class="action">
								<a href="<?=$key['post_link'];?>"  target="_blank" class="hiperlink"  title="Visitar conteúdo"><b class="icon-link"></b></a>
								<a href="#" class="add-friend" ><b class="icon-user-add" title="Adicionar aos amigos"></b></a>
								<a href="#" class="send-mail" ><b class="icon-mail2" title="Enviar por email"></b></a>
								<a href="#" class="add-lib select"><b class="icon-paperclip" title="Adicionar ao meu roteiro"></b></a>
							</div>
							<p>
								<?=$key['post_description']?>
							</p>
							<div class="relat clearfix">
								<?php
								$iduser = IDUSER;
								$idpost = $key['id'];
								$select = $DB->QRSelect('_likes',"WHERE id_post = {$idpost} AND id_user = {$iduser}");
								?>
								<a href="#" id="recomended" class="recomended <?php if($select){ if($select['0']['like_unlike'] == 0 ){ echo 'unselected';  }}?> clearfix" data-postid="<?=$key['id']?>" data-userid="<?php echo IDUSER;?>"><i><?=$key['post_like']?></i></a>
								<a href="#" id="unrecomended" class="unrecomended <?php if($select){ if($select['0']['like_unlike'] == 1 ){ echo 'unselected';  }}?> clearfix" data-postid="<?=$key['id']?>" data-userid="<?php echo IDUSER;?>"><i><?=$key['post_unlike']?></i></a>
								<div class="coment"><span></span><i>0</i> Comentarios </div>
							</div>
						</li>
						<?php }} ?>						
					</ul>
				</div>
				<div class="colum-4">
					<ul id="sidebar">
						<?php
						$content = $DB->QRSelect('_post',"WHERE user_id = $iduser");
						$content = count($content);
						
						$rde = $DB->QRSelect('_guide',"WHERE user_id = $iduser");
						$rde = count($rde);
						?>
						<li><a href="new_content.php"><b class="ico icon-plus"> </b>Cadastrar referência</a></li>
						<li><a href="guide.php"><b class="ico icon-paperclip"> </b> Roteiros de estudos<i><?=$rde?></i></a></li>
						<li><a href="#"><b class="ico icon-folder"></b>Minhas Referências<i><?=$content?></i></a></li>
						<li><a href="#"><b class="ico icon-users"></b> amigos<i>120</i></a></li>
					</ul>
				</div>
			</div>
		</section>
<?php include 'footer.php'; ?>	