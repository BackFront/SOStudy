<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
.abs-msg { position: absolute;width: 99%; }
.box { 
	max-width: 500px; 
	min-width: 300px; 
	min-height: 130px; 
	background: rgba( 255, 255, 0, .2); 
	border: 2px solid #ff0;
	display: block; 
	position: relative;
	margin: 20px auto; 
	box-shadow: 0 0 15px rgba(0, 0, 0, .2);
	opacity: 1;
	transition: .2s opacity;
	font-family: arial;
	
		 	 border-top-left-radius: 8px;
			border-top-right-radius: 8px;
			
		-moz-border-top-left-radius: 8px;
	   -moz-border-top-right-radius: 8px;

	 -webkit-border-top-left-radius: 8px;
	-webkit-border-top-right-radius: 8px;
}
.box .head-box {
	max-width: 960px; 
	min-width: 300px; 
	padding: 10px; 
	text-align: center; 
	background: #fff; 
	border-bottom: 1px solid #ff0; 
	font-family: arial; 
	color: rgba(0, 0, 0, .5);
	font-weight: bold;
	
			 border-top-left-radius: 8px;
			border-top-right-radius: 8px;
			
		-moz-border-top-left-radius: 8px;
	   -moz-border-top-right-radius: 8px;

	 -webkit-border-top-left-radius: 8px;
	-webkit-border-top-right-radius: 8px; 
}
.box .body-box { padding: 10px 20px; display: block; }
 
.box.alert { border: 2px solid #ff0; background: rgba( 255, 255, 0, .2); }
.box.alert .head-box { border-bottom: 1px solid #ff0; }

.box.error { border: 2px solid #f00; background: rgba( 255, 0, 0, .2); }
.box.error .head-box { border-bottom: 1px solid #f00; }

.box.sucess { border: 2px solid #0f0; background: rgba( 0, 255, 0, .2); }
.box.sucess .head-box { border-bottom: 1px solid #0f0; }  

.box.info { border: 2px solid #ccc; background: rgba( 0, 0, 0, .1); }
.box.info .head-box { border-bottom: 1px solid #ccc; }

.box .head-box a.close { 
	display: inline-block;
	height: 20px; 
	width: 20px; 
	background: url(http://i.stack.imgur.com/rnN2i.png) no-repeat -309px 2px;
	float: right; 
} 
.hidden { display: none; }
</style>
<?php
/*------------------------
 * EXEMPLE OF USE
 * -----------------------
 * $boxErro = new BoxMessenger();
 * $arrayVar = array('head'=>311,'box'=>'Erro haha');
 * $boxErro->sucess($arrayVar);
 */
	class MessageBox
	{
		public function sucess($msg){
			echo 
			'<div class="box sucess" id="box">
				<div class="head-box">'. $msg['head'] .'<a href="#" class="close" onclick="closeBox()"></a></div>
				<p class="body-box">'.$msg['box'].'</p>
			</div>';
		}
		public function alert($msg){
			echo 
			'<div class="box" id="box">
				<div class="head-box">'. $msg['head'] .'<a href="#" class="close" onclick="closeBox()"></a></div>
				<p class="body-box">'.$msg['box'].'</p>
			</div>';
		}
		public function error($msg){
			echo 
			'<div class="box error" id="box">
				<div class="head-box">'. $msg['head'] .'<a href="#" class="close" onclick="closeBox()"></a></div>
				<p class="body-box">'.$msg['box'].'</p>
			</div>';
		}
		public function info($msg){
			echo 
			'<div class="box info" id="box">
				<div class="head-box">'. $msg['head'] .'<a href="#" class="close" onclick="closeBox()"></a></div>
				<p class="body-box">'.$msg['box'].'</p>
			</div>';
		}
	}
?>
<script>
	function closeBox () {
		
		document.getElementById("box").style.opacity="0";
		setTimeout( function (){
			document.getElementById("box").style.display="none";
		}, 1000);
	}
</script>