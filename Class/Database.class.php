<?php
	class Database {
		
		private $Host;
		private $User;
		private $Pass;
		private $Port;
		private $DBname;
		
		function __construct($Host, $User, $Pass, $Port = null, $DBname = null)
		{
			$this->Host = $Host;
			$this->User = $User;
			$this->Pass = $Pass;
			$this->Port = $Port;
			$this->DBname = $DBname;
		}
		
		public function Connect()
		{
			@mysql_connect($this->Host, $this->User, $this->Pass) or die ('Erro ao Conectar com o Host ('.$this->Host.') - in '.__FILE__.': '.__LINE__);;
		}
		
		public function SelectDB( $nameDB = null )
		{
			if($nameDB == ''){
				@mysql_select_db($this->DBname) or die ('Erro ao Selecionar Database - in '.__FILE__.': '.__LINE__);
			}else{
				@mysql_select_db($nameDB) or die ('Erro ao Selecionar Database - in '.__FILE__.': '.__LINE__);
			}
		}
		
		public function QRInsert( $nameTable, array $datas )
		{
			$fields = implode(", ", array_keys($datas));
			$values = "'".implode("', '", array_values($datas))."'";
			$query = mysql_query("INSERT INTO {$nameTable} ($fields) VALUES ($values)") or die ('Erro ao Inserir dados - in '.__FILE__.': '.__LINE__.'<br>'.mysql_error());
			return true;
		}
		
		public function QRSelect($tabela, $cond = NULL){		
			$qrRead = "SELECT * FROM {$tabela} {$cond}";
			$stRead = mysql_query($qrRead) or die ('Erro ao ler em '.$tabela.' '.mysql_error());
			$cField = mysql_num_fields($stRead);
			for($y = 0; $y < $cField; $y++){
				$names[$y] = mysql_field_name($stRead,$y);
			}
			for($x = 0; $res = mysql_fetch_assoc($stRead); $x++){
				for($i = 0; $i < $cField; $i++){
					$resultado[$x][$names[$i]] = $res[$names[$i]];
				}
			}
			return @$resultado;
		}

		public function QRUpdate( $nameTable, array $datas, $cond ){
			foreach($datas as $fields => $values){
				$campos[] = "$fields = '$values'";
			}
			
			$campos = implode(", ",$campos);
			$qrUpdate = "UPDATE {$nameTable} SET $campos $cond";
			$stUpdate = mysql_query($qrUpdate) or die ('Erro ao atualizar em '.$nameTable.' '.mysql_error());
	
			if($stUpdate){
				return true;	
			}
		
		}
	}
?>