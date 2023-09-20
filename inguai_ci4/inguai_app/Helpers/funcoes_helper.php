<?php

if (! function_exists('admin_url'))
{
	/**
	 * Returns a site URL restrita as defined by the App config.
	 *
	 * @param mixed       $relativePath URI string
	 */
	function admin_url($relativePath = '')
	{
		$config = new \Config\App();
		//$folderRestrito = $config->baseFolderRestrito;
		//$folderRestrito = (empty($folderRestrito) ? 'restrito/' : $folderRestrito .'/'); 
		
		$folderRestrito = 'admin/';
		
		return site_url( $folderRestrito . $relativePath);
	}
}


/**
 * fct_date2bd: formata data
 */
if ( ! function_exists('fct_date2bd'))
{
	function fct_date2bd($pDate="", $format="Y-m-d")
	{
		if(empty($pDate)) return "";
		list($sDia, $sMes, $sAno) = preg_split('/[\/.-]+/', $pDate);
		$dteReturn = date($format, strtotime($sAno ."-".$sMes ."-".$sDia));
		return $dteReturn;
	}
}


/**
 * fct_formatdate: formata data
**/
if ( ! function_exists('fct_formatdate'))
{
	// 0000-00-00 00:00:00
	function fct_formatdate($pDate="", $format="Y-m-d", $template="", $return_array=false)
	{
		date_default_timezone_set('America/Sao_Paulo');
		//$ci =& get_instance();

		//$ci->config->load('cfg_settings');
		//$arr_meses = $ci->config->item('cfg_meses');
		//$arr_day_week = $ci->config->item('cfg_day_week');
		$arr_meses = array (
			'1'	=> array('jan','Janeiro'),
			'2'	=> array('fev','Fevereiro'),
			'3'	=> array('mar','Março'),
			'4'	=> array('abr','Abril'),
			'5'	=> array('mai','Maio'),
			'6'	=> array('jun','Junho'),
			'7'	=> array('jul','Julho'),
			'8'	=> array('ago','Agosto'),
			'9'	=> array('set','Setembro'),
			'10'=> array('out','Outubro'),
			'11'=> array('nov','Novembro'),
			'12'=> array('dez','Dezembro'),
		);
		$arr_day_week = array (
			0	=> array('dom','Domingo'),
			1	=> array('seg','Segunda-feira'),
			2	=> array('ter','Terça-feira'),
			3	=> array('qua','Quarta-feira'),
			4	=> array('qui','Quinta-feira'),
			5	=> array('sex','Sexta-feira'),
			6	=> array('sac','Sábado')
		);

		if(empty($pDate)) return "";

		$pDate = str_replace("0000-00-00 00:00:00", "", $pDate);
		if( empty($pDate) ) return $pDate;
		
		$type_return = "";
		$type_return = ( !empty($template)		? "template" : $type_return );
		$type_return = ( ($return_array==true)	? "array" : $type_return );

		$intDayOfWeek		= date('w',strtotime($pDate));	// Descobre o dia da semana			
		$intDayOfMonth		= date('d',strtotime($pDate));	// Descobre o dia do mês
		$intMonthOfYear		= date('n',strtotime($pDate));	// Descobre o mês
		$intYear			= date('Y',strtotime($pDate));	// Descobre o ano

		$_week			= isset($arr_day_week[$intDayOfWeek][0]) ? $arr_day_week[$intDayOfWeek][0] : "";
		$_week_full		= isset($arr_day_week[$intDayOfWeek][1]) ? $arr_day_week[$intDayOfWeek][1] : "";
		$_month			= isset($arr_meses[$intMonthOfYear][0]) ? $arr_meses[$intMonthOfYear][0] : "";
		$_month_full	= isset($arr_meses[$intMonthOfYear][1]) ? $arr_meses[$intMonthOfYear][1] : "";

		switch ($type_return){
			case "template":
				// modelo de formatacao de template
				// {semana}, {dia} de {mes} de {ano}
				$template = str_replace('{semana}', utf8_encode($_week_full), $template);
				$template = str_replace('{semanaabrev}', utf8_encode($_week), $template);
				$template = str_replace('{dia}', $intDayOfMonth, $template);
				$template = str_replace('{mes}', utf8_encode($_month_full), $template);
				$template = str_replace('{mesabrev}', utf8_encode($_month), $template);
				$template = str_replace('{ano}', $intYear, $template);			

				$dteReturn = $template;

			break;
			case "array":
				$dteReturn = array(
					"week"		=> $_week,
					"week_full"	=> $_week_full,
					"day"		=> $intDayOfMonth,
					"month"		=> $_month,
					"month_full"=> $_month_full,
					"year"		=> $intYear,
				);
				
			break;
			default:
				$dateTemp = preg_replace('/[\/.-]+/','/', $pDate);
				$dteReturn = date($format, strtotime($dateTemp));

			break;
		};

		return $dteReturn;
	}
}


/**
 * fct_to_money: formata numero decimal
**/
if ( ! function_exists('fct_to_money'))
{
	function fct_to_money($pValue="", $decimal=2, $type="")
	{
		if( $type == "bd" ){
			$pValue = (empty($pValue)?0:$pValue);
			$pValue = str_replace(".", "", $pValue);
			$pValue = str_replace(",", ".", $pValue);
			return $pValue;
		}

		if( empty($type) || $type == "br"){
			return number_format( $pValue, $decimal, ',', '.' );
		}
	}
}


function show_error($validation, $field)
{
	if(isset($validation))
	{
		//if (in_array($field, $validation)) 
		if ( array_key_exists($field, $validation) )
		{
			return '<small class="badge badge-danger label-custom-error"><i class="fas fa-exclamation"></i> '. $validation[$field] .'</small>';
		}
		// $validation->getError($field) .'
		//print_r($validation);
	}
	
	//if( $validation->getError($field) ){
		//return '<div class="alert alert-danger mt-2">'. 
			//$validation->getError($field) .'
		//</div>';
	//}
}

/**
 * fct_encripta : encripta uma string
**/
if ( ! function_exists('fct_encripta'))
{
	function fct_password_hash($pString="", $pTipo="sha512") {
		if(!empty($pString))
		{
			$config = new \Config\AppSettings();
			$encryption_hashkey = $config->encryption_hashkey;			
			$passGerada	= hash($pTipo, sha1($pString . $encryption_hashkey));		
		}else{
			$passGerada = "";
		};

		return $passGerada;
	}
}



/**
 * fct_valida_cnpj : validar número de CNPJ
**/
if ( ! function_exists('fct_valida_cnpj'))
{
	function fct_valida_cnpj($cnpj = null)
	{
		// Verifica se um número foi informado
		if(empty($cnpj)) {
			return false;
		}

		//Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
		$j=0;
		for($i=0; $i<(strlen($cnpj)); $i++)
			{
				if(is_numeric($cnpj[$i]))
					{
						$num[$j]=$cnpj[$i];
						$j++;
					}
			}
		//Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
		if(count($num)!=14)
			{
				$isCnpjValid=false;
			}
		//Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
		if ($num[0]==0 && $num[1]==0 && $num[2]==0 && $num[3]==0 && $num[4]==0 && $num[5]==0 && $num[6]==0 && $num[7]==0 && $num[8]==0 && $num[9]==0 && $num[10]==0 && $num[11]==0)
			{
				$isCnpjValid=false;
			}
		//Etapa 4: Calcula e compara o primeiro dígito verificador.
		else
			{
				$j=5;
				for($i=0; $i<4; $i++)
					{
						$multiplica[$i]=$num[$i]*$j;
						$j--;
					}
				$soma = array_sum($multiplica);
				$j=9;
				for($i=4; $i<12; $i++)
					{
						$multiplica[$i]=$num[$i]*$j;
						$j--;
					}
				$soma = array_sum($multiplica);
				$resto = $soma%11;
				if($resto<2)
					{
						$dg=0;
					}
				else
					{
						$dg=11-$resto;
					}
				if($dg!=$num[12])
					{
						$isCnpjValid=false;
					}
			}
		//Etapa 5: Calcula e compara o segundo dígito verificador.
		if(!isset($isCnpjValid))
			{
				$j=6;
				for($i=0; $i<5; $i++)
					{
						$multiplica[$i]=$num[$i]*$j;
						$j--;
					}
				$soma = array_sum($multiplica);
				$j=9;
				for($i=5; $i<13; $i++)
					{
						$multiplica[$i]=$num[$i]*$j;
						$j--;
					}
				$soma = array_sum($multiplica);
				$resto = $soma%11;
				if($resto<2)
					{
						$dg=0;
					}
				else
					{
						$dg=11-$resto;
					}
				if($dg!=$num[13])
					{
						$isCnpjValid=false;
					}
				else
					{
						$isCnpjValid=true;
					}
			}

		return $isCnpjValid;
	}
}


/**
 * fct_mask : mascaras
**/
if ( ! function_exists('fct_mask'))
{
	function fct_mask($val, $mask) {
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++) {
			if($mask[$i] == '#') {
				if(isset($val[$k])) $maskared .= $val[$k++];
			} else {
				if(isset($mask[$i])) $maskared .= $mask[$i];
			}
		}
		return $maskared;
	}
}


