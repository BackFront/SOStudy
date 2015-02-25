<?php
function date_transform($data,$x = null) {
	$timestamp = explode(" ",$data);
	$getData = $timestamp[0];
	$getTime = $timestamp[1];
	$setData = explode('-',$getData);
	$mes = $setData[1];
	if($x){
		switch ($mes) {
			case 01: $mes = 'Janeiro'; break;
			case 02: $mes = 'Fevereiro'; break;
			case 03: $mes = 'Março'; break;
			case 04: $mes = 'Abril'; break;
			case 05: $mes = 'Maio'; break;
			case 06: $mes = 'Junho'; break;
			case 07: $mes = 'Julho'; break;
			case 08: $mes = 'Agosto'; break;
			case 09: $mes = 'Setembro'; break;
			case 10: $mes = 'Outubro'; break;
			case 11: $mes = 'Novembro'; break;
			case 12: $mes = 'Dezembro'; break;
		}
		
		return array(
			'dia' => $setData[2],
			'mes' => $mes,
			'ano' => $setData[0]
		);
	} else {
		return array(
			'dia' => $setData[2],
			'mes' => $setData[1],
			'ano' => $setData[0]
		);
	}
}
