<?php

class Util extends Error2
{
	public $DB;
    private $letras = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","x");
	private $numeros = array(0,1,2,3,4,5,6,7,8,9,0);
	
	function getKey(){
		$key="";
		
		for($x=0;$x<40;$x++){
			 $que = rand(0,1);
			 if($que==0){
				   $posicion=rand(0,25);
				   $caracter = $this->letras[$posicion];
				   $num=rand(0,1);
				   if($num==1){
					   $caracter = strtoupper($letra);
				   }
			 }else{
				 $posicion=rand(0,9);
				 $caracter = $this->numeros[$posicion];
			 }
			 $key.=$caracter;
		}
		return $key;
	}

	function validarRFC($rfc){
		$regex = '/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/';
		return preg_match($regex, $rfc);
	}

	public function quitarSaltos($cadena){
		 $cadena = str_replace("\n","",$cadena);
		 $cadena = str_replace("\r","",$cadena);
		 $cadena = str_replace('"',"'",$cadena);

		 return $cadena;
	}

	public function getTokenSession(){
		$min = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","a","b","c","d","e","f");
		
		$token="Usr";
		for($x=0;$x<46;$x++){
			$y=rand(0,1);
			if($y==0){
				$z=rand(0,30);
				$m=rand(0,1);
				if($m==0){ $token.=strtoupper($min[$z]); }else{ $token.=$min[$z]; }
			}else{
				$z=rand(0,9);
				$token.=$z;
			}

		}
		return $token;
	}
	
	public function DB() 
	{
		if($this->DB == null ) 
		{
			$this->DB = new DB();
		}
		return $this->DB;
	}
	
	
	public function getTiempoEspera($minutos){
		$mensaje="";
		if($minutos<60){
			if($minutos==1){
				$mensaje=$minutos." minuto";
			}else{
				$mensaje=$minutos." minutos";
			}
			
		}else{
			$horas = intval($minutos/60);
			$minutos=intval(fmod($minutos, 60));
			if($horas==1){
				if($minutos==1){
					$mensaje=$horas." hora ".$minutos." minuto";
				}else{
					$mensaje=$horas." hora ".$minutos." minuto";
				}
			}else{
				if($minutos==1){
					$mensaje=$horas." horas ".$minutos." minuto";
				}else{
					$mensaje=$horas." horas ".$minutos." minutos";
				}
			}
			
		}
		return $mensaje;
	}
	
	
	public function Escapar($value){ 
		return addslashes(trim($value));
	}
	
	function getMinutos($fecha_i,$fecha_f)
	{
		$minutos = (strtotime($fecha_i)-strtotime($fecha_f))/60;
		$minutos = abs($minutos); $minutos = floor($minutos);
		return $minutos;
	}
	
	function quitarComillas($dato){
		$dato = str_replace("'","[simple]",$dato);
		$dato = str_replace('"','[doble]',$dato);
		return $dato;
	}
	
	function getFechaCalendarFormatLocal($fecha){
			$partes=explode(" ",$fecha);
			$partesFecha=explode("/",$partes[0]);
			$partesHora=explode(":",$partes[1]);
			if(strlen($partesFecha[0])==1){ $partesFecha[0]=str_pad($partesFecha[0], 2, "0", STR_PAD_LEFT); }
			if(strlen($partesFecha[1])==1){ $partesFecha[1]=str_pad($partesFecha[1], 2, "0", STR_PAD_LEFT); }
			if(strlen($partesHora[0])==1){ $partesHora[0]=str_pad($partesHora[0], 2, "0", STR_PAD_LEFT); }
			if(strlen($partesHora[1])==1){ $partesHora[1]=str_pad($partesHora[1], 2, "0", STR_PAD_LEFT); }
			if(strlen($partesHora[2])==1){ $partesHora[2]=str_pad($partesHora[2], 2, "0", STR_PAD_LEFT); }
			$fechaNueva = $partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." ".$partesHora[0].":".$partesHora[1].":".$partesHora[2];
			return $fechaNueva;
	}

	public function DBSelect($empresaId = 1) 
	{
		if($this->DBSelect == null ) 
		{
			$this->DBSelect = new DB();
		}
		//$this->DBSelect->setSqlDatabase("facturas_".$empresaId);
		return $this->DBSelect;
	}
	
	  public function getEdad($fecha_nacimiento) { 
		$cumpleanos = new DateTime($fecha_nacimiento);
		$hoy = new DateTime();
		$annos = $hoy->diff($cumpleanos);
		return $annos->y;
	}
	
	function getOS() { 
			if(isset($_SERVER)){
				$user_agent = $_SERVER['HTTP_USER_AGENT'];
			}else {				
				if (isset($HTTP_SERVER_VARS)){
					$user_agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
				}else{					
					$user_agent = $HTTP_USER_AGENT;
				}
			}
			$os_array =  array(
							'/windows nt 10/i'      =>  'Windows 10',
							'/windows nt 6.3/i'     =>  'Windows 8.1',
							'/windows nt 6.2/i'     =>  'Windows 8',
							'/windows nt 6.1/i'     =>  'Windows 7',
							'/windows nt 6.0/i'     =>  'Windows Vista',
							'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
							'/windows nt 5.1/i'     =>  'Windows XP',
							'/windows xp/i'         =>  'Windows XP',
							'/windows nt 5.0/i'     =>  'Windows 2000',
							'/windows me/i'         =>  'Windows ME',
							'/win98/i'              =>  'Windows 98',
							'/win95/i'              =>  'Windows 95',
							'/win16/i'              =>  'Windows 3.11',
							'/macintosh|mac os x/i' =>  'Mac OS X',
							'/mac_powerpc/i'        =>  'Mac OS 9',
							'/linux/i'              =>  'Linux',
							'/ubuntu/i'             =>  'Ubuntu',
							'/iphone/i'             =>  'iPhone',
							'/ipod/i'               =>  'iPod',
							'/ipad/i'               =>  'iPad',
							'/android/i'            =>  'Android',
							'/blackberry/i'         =>  'BlackBerry',
							'/webos/i'              =>  'Mobile'
						  );
			//
			$os_platform = "Unknown OS Platform";
			foreach ($os_array as $regex => $value) { 
				if (preg_match($regex, $user_agent)) {
					$os_platform = $value;
				}
			}
			return $os_platform;
		}
		
	 function getSumarDias($fecha,$dias){
		 $dias=$dias+1;
		 $nuevafecha = strtotime('+'.$dias.' day',strtotime($fecha));
		 $nuevafecha = date('Y-m-d H:i:s',$nuevafecha);
		 
		 return $nuevafecha;
	 }

	 function getSumarMinutos($fecha,$minutos){
		 $dias=$dias+1;
		 $nuevafecha = strtotime('+'.$minutos.' minute',strtotime($fecha));
		 $nuevafecha = date('Y-m-d H:i:s',$nuevafecha);
		 
		 return $nuevafecha;
	 }
	 
	 function getRestarDiasSinHora($fecha,$dias){
		  
		 $nuevafecha = strtotime('-'.$dias.' day',strtotime($fecha));
		 $nuevafecha = date('d-m-Y',$nuevafecha);
		 
		 return $nuevafecha;
	 }
	 
	 
	function getIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

	function RoundNumber($number)
	{
		return round($number, 6);
	}
	
	function FormatSeconds($sec, $padHours = false)
	{
	    $hms = "";
	    $hours = intval(intval($sec) / 3600); 
	    $hms .= ($padHours) 
    	      ? str_pad($hours, 2, "0", STR_PAD_LEFT). ':'
        	  : $hours. ':';
	    $minutes = intval(($sec / 60) % 60); 
	    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ':';
	    $seconds = intval($sec % 60); 
	    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);
	    return $hms;
	}
	
	public function getJson($arreglo){
		 $arreglo = json_encode($arreglo, JSON_UNESCAPED_UNICODE);
		 return $arreglo; 
	}
	
	public function getSubString($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 50;
    //Primero eliminamos las etiquetas html y luego cortamos el string
    $stringDisplay = substr(strip_tags($string), 0, $length);
    //Si el texto es mayor que la longitud se agrega puntos suspensivos
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= ' ...';
    return $stringDisplay;
}

	function FormatNumber($number, $dec = 2)
	{
		return number_format($number, $dec);
	}

	function FormatDateAndTime($time)
	{
		$time = date("Y-m-d H:i:s", $time);
	    return $time;
	}

	function FormatDateAndTimeSat($date)
	{
		$time = strtotime($date);
		$date = date("d/m/Y H:i:s", $time);
    return $date;
	}
	
	function sinEspaciosSinAcentosMinusculas($dato){
		return str_replace(" ","",mb_strtolower($this->limpiar($dato)));
	}
	
	function noAcentos($string){
		return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
		'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
	}
	function limpiar($String){
    $String = str_replace(array('á','à','â','ã','ª','ä'),"a",$String);
    $String = str_replace(array('Á','À','Â','Ã','Ä'),"A",$String);
    $String = str_replace(array('Í','Ì','Î','Ï'),"I",$String);
    $String = str_replace(array('í','ì','î','ï'),"i",$String);
    $String = str_replace(array('é','è','ê','ë'),"e",$String);
    $String = str_replace(array('É','È','Ê','Ë'),"E",$String);
    $String = str_replace(array('ó','ò','ô','õ','ö','º'),"o",$String);
    $String = str_replace(array('Ó','Ò','Ô','Õ','Ö'),"O",$String);
    $String = str_replace(array('ú','ù','û','ü'),"u",$String);
    $String = str_replace(array('Ú','Ù','Û','Ü'),"U",$String);
    $String = str_replace(array('[','^','´','`','¨','~',']'),"",$String);
    $String = str_replace("ç","c",$String);
    $String = str_replace("Ç","C",$String);
    $String = str_replace("ñ","n",$String);
    $String = str_replace("Ñ","N",$String);
    $String = str_replace("Ý","Y",$String);
    $String = str_replace("ý","y",$String);
     
    $String = str_replace("&aacute;","a",$String);
    $String = str_replace("&Aacute;","A",$String);
    $String = str_replace("&eacute;","e",$String);
    $String = str_replace("&Eacute;","E",$String);
    $String = str_replace("&iacute;","i",$String);
    $String = str_replace("&Iacute;","I",$String);
    $String = str_replace("&oacute;","o",$String);
    $String = str_replace("&Oacute;","O",$String);
    $String = str_replace("&uacute;","u",$String);
    $String = str_replace("&Uacute;","U",$String);
    return $String;
}


	function FormatDate($time)
	{
		$time = date("Y-m-d", $time);
	    return $time;
	}
	
	    function datecheck($input)
    {
		
       $input=trim($input);
		   if(strlen($input)==10){
			$input_array= explode("-",$input);
		   
				return checkdate($input_array[1],$input_array[0],$input_array[2]);
			
			$input_array=array();
	   }else{
		   return false;
	   }
    }
	
	
	function get_format($df) {

    $str = '';
    $str .= ($df->invert == 1) ? ' - ' : '';
    if ($df->y > 0) {
        // years
        $str .= ($df->y > 1) ? $df->y . ' años ' : $df->y . ' año ';
    } if ($df->m > 0) {
        // month
        $str .= ($df->m > 1) ? $df->m . ' meses ' : $df->m . ' mes ';
    } if ($df->d > 0) {
        // days
        $str .= ($df->d > 1) ? $df->d . ' días ' : $df->d . ' día ';
    } if ($df->h > 0) {
        // hours
        $str .= ($df->h > 1) ? $df->h . ' horas ' : $df->h . ' hora ';
    } if ($df->i > 0) {
        // minutes
        $str .= ($df->i > 1) ? $df->i . ' minutos ' : $df->i . ' minuto ';
    } /* if ($df->s > 0) {
        // seconds
        $str .= ($df->s > 1) ? $df->s . ' segundos ' : $df->s . ' segundo ';
    } */

    return $str; 
}

	function FormatDateMySql($date)
	{
		$date = explode("-", $date);
		return $date[2]."-".$date[1]."-".$date[0];
	}
	
	 function inicio_fin_semana($fecha){

		$diaInicio="Monday";
		$diaFin="Sunday";

		$strFecha = strtotime($fecha);

		$fechaInicio = date('Y-m-d',strtotime('last '.$diaInicio,$strFecha));
		$fechaFin = date('Y-m-d',strtotime('next '.$diaFin,$strFecha));

		if(date("l",$strFecha)==$diaInicio){
			$fechaInicio= date("Y-m-d",$strFecha);
		}
		if(date("l",$strFecha)==$diaFin){
			$fechaFin= date("Y-m-d",$strFecha);
		}
		return Array("fechaInicio"=>$fechaInicio,"fechaFin"=>$fechaFin);
	}
	
	function getDateRange($fecha,$vista){
		//$day = date("w", strtotime($fecha));
		switch($vista){
			  case "s":
						return $this->inicio_fin_semana($fecha);
			  break;
			  case "m":
						$month = date("m", strtotime($fecha)); 
						$year =  date("Y", strtotime($fecha));
						$day = date("d", mktime(0,0,0, $month+1, 0, $year));
						$fechaFin=date('Y-m-d', mktime(0,0,0, $month, $day, $year));
						$fechaInicio=date('Y-m-d', mktime(0,0,0, $month, 1, $year));
						return Array("fechaInicio"=>$fechaInicio,"fechaFin"=>$fechaFin);
			  break;
			  case "d":
						return Array("fechaInicio"=>$fecha,"fechaFin"=>$fecha);
			  break;	
		}
	}
	
	function getPeriodoFechas($fechaInicio,$fechaFin){
		$meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	    $mesesCorto=array("","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
		$diasCorto = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb","Dom");
	    if(strtotime($fechaInicio)==strtotime($fechaFin)){
			$fechas=$this->getDateImprimirSH($this->FormatDateMySql($fechaInicio));
			return $fechas["larga"];
		}else{
			$inicio=explode("-",$fechaInicio);
			$fin=explode("-",$fechaFin);
			if($inicio[2]==$fin[2]){
				$textYear=" de ".$inicio[2];
				if($inicio[1]==$fin[1]){
					$dayInicio = date("w", strtotime($fechaInicio));
					$diaInicio=$dias[$dayInicio];
					$dayFin = date("w", strtotime($fechaFin));
					$diaFin=$dias[$dayFin];
					
					$mes=$meses[intval($inicio[1])];
					$textMes="Del ".$inicio[0]." al ".$fin[0]." de ".$mes;
				}else{
					$mesInicio=$meses[intval($inicio[1])];
					$mesFin=$meses[intval($fin[1])];
					$dayInicio = date("w", strtotime($fechaInicio));
					$diaInicio=$dias[$dayInicio];
					$dayFin = date("w", strtotime($fechaFin));
					$diaFin=$dias[$dayFin];
					
					
					$textMes="Del ".$inicio[0]." de ".$mesInicio." al ".$fin[0]." de ".$mesFin;
				}
			}else{
				$mesInicio=$meses[intval($inicio[1])];
				$mesFin=$meses[intval($fin[1])];
				$dayInicio = date("w", strtotime($fechaInicio));
				$diaInicio=$dias[$dayInicio];
				$dayFin = date("w", strtotime($fechaFin));
				$diaFin=$dias[$dayFin];
				$textMes="Del ".$inicio[0]." de ".$mesInicio." de ".$inicio[2]." al ".$fin[0]." de ".$mesFin." de ".$fin[2];
			}
			
			
			return $textMes.$textYear;
			
		}
	}
	
	function getDiasTranscurridos($fecha_inicial,$fecha_final) 
		{
		$dias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
		$dias = abs($dias); $dias = floor($dias);
		return $dias;
		}
	
	function getDateImprimirSH($date){
		//echo $date;
		
	    $meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	    $mesesCorto=array("","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
		$diasCorto = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb","Dom");
	    $lista=explode("-",$date);
	    
		$day = date("w", strtotime($date));
		$dia=$dias[$day];
		$diaCorto=$diasCorto[$day];
		$mes=$meses[intval($lista[1])];
		$mesCorto=$mesesCorto[intval($lista[1])];
		
		$fechaLarga=$dia.", ".$lista[2]." de ".$mes." de ".$lista[0];
		$fechaCorta=$dia.", ".$lista[2]." de ".$mesCorto." de ".$lista[0];
		$fechaDl=$dia.", ".$lista[2]."/".$mes."/".$lista[0];
		$fechaG=$dia.", ".$lista[2]."-".$mes."-".$lista[0];
		
		$fechas["corta"]=$fechaCorta;
		$fechas["larga"]=$fechaLarga;
		$fechas["diagonal"]=$fechaDl;
		$fechas["guion"]=$fechaG;
		return $fechas;
	}
	
	function getDateChat($date){
		$partes=explode(" ",$date);
	    $meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	    $mesesCorto=array("","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
		$diasCorto = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb","Dom");
	    $lista=explode("-",$partes[0]);
		//print_r($lista);
		$lista2=explode(":",$partes[1]);
		if(strtotime($partes[0])==strtotime(date("Y-m-d"))){
			$result= "Hoy a las ".date('h:i a',strtotime($date));
			return $result;
		}
		$hoy = date('Y-m-d');
		$ayer = strtotime ( '-1 day' , strtotime ( $hoy ) ) ;
		$ayer = date ( 'Y-m-d' , $ayer );
		if(strtotime($partes[0])==strtotime($ayer)){
			$result= "Ayer a las ".date('h:i a',strtotime($date));
			return $result;
		}
	    
		$day = date("w", strtotime($date));
		$dia=$dias[$day];
		$diaCorto=$diasCorto[$day];
		$mes=$meses[intval($lista[1])];
		$mesCorto=$mesesCorto[intval($lista[1])]; 
		$result = $dia.", ".$lista[2]." de ".$mes." de ".$lista[0]." ".date('h:i a',strtotime($date));
		return $result;
	}
	
	function getDateImprimirCH($date){
		//echo $date;
		$partes=explode(" ",$date);
	    $meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	    $mesesCorto=array("","Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
		$diasCorto = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb","Dom");
	    $fechas["fecha"]=$this->FormatDateMySql($partes[0]);
		$lista=explode("-",$partes[0]);
		//print_r($lista);
		$lista2=explode(":",$partes[1]);
		$fechas["hora"]=$lista2[0];
		$fechas["minuto"]=$lista2[1];
	    
		$day = date("w", strtotime($date));
		$dia=$dias[$day];
		$diaCorto=$diasCorto[$day];
		$mes=$meses[intval($lista[1])];
		$mesCorto=$mesesCorto[intval($lista[1])]; 
		
		$fechaLarga=$dia.", ".$lista[2]." de ".$mes." de ".$lista[0]."  ".$lista2[0].":".$lista2[1];
		$fechaCorta=$dia.", ".$lista[2]." de ".$mesCorto." de ".$lista[0]."  ".$lista2[0].":".$lista2[1];
		$fechaDl=$dia.", ".$lista[2]."/".$mes."/".$lista[0]."  ".$lista2[0].":".$lista2[1];
		$fechaG=$dia.", ".$lista[2]."-".$mes."-".$lista[0]." ".$lista2[0].":".$lista2[1];
		
		$fechas["corta"]=$fechaCorta;
		$fechas["larga"]=$fechaLarga;
		$fechas["diagonal"]=$fechaDl;
		$fechas["guion"]=$fechaG;
		
		return $fechas;
	}

	function FormatDateMySqlBack($date)
	{
		$this->FormatDateMySql($date);
	}



	function ValidateInteger(&$number, $max = 0, $min = 0)
	{
		if (!preg_match("/^[0-9]+$/",$number)) $number = 0;

		if($min != 0 && $number < $min) 
		{ 
			$number = $min; 
			return; 
		}	

		if($max != 0 && $number > $max) 
		{ 
			$number = $max; 
			return; 
		}	
		
		if($number > 9223372036854775807)
		{
			$number = 9223372036854775807;
		}
	}
	
	function ValidateFloat(&$number, $decimals = 2, $max = 0, $min = 0)
	{
		if (!is_numeric($number))
		{
			$number=0;
		}

		$number=round($number, $decimals);
	
		if($max != 0 && $number > $max)
		{ 
			$number = $max; 
			return; 
		}	

		if($min != 0 && $number < $min)
		{ 
			$number = $min; 
			return; 
		}	

		if($number>9223372036854775807) 
		{
			$number=9223372036854775807;
		}
	}
	
	function ValidateDecimal($number)
	{
		if (!is_numeric($number))
		{			
			$this->setError(10055, 'error', '', 'Monto de la Renta');
			return false;
		}

		return true;
	}
	
	function ValidateOption($value, $field){
		
		if($value == '')
			return $this->setError(10037, "error", "", $field);
		
	}
	
 function CheckDomain($domain,$server,$findText)
 {
		// Open a socket connection to the whois server
		$con = fsockopen($server, 43);
		if (!$con)
		{	
			return false;
		}
    // Send the requested doman name
    fputs($con, $domain."\r\n");
        
		// Read and store the server response
		$response = ' :';
		while(!feof($con)) {
				$response .= fgets($con,128); 
		}
        
		fclose($con);
        
		// Check the response stream whether the domain is available
		if (strpos($response, $findText)){
				return true;
		}
		else {
				return false;   
		}
  }	

	function ValidateString(&$string, $max_chars=5000, $minChars = 1, $field = null)
	{
		$string = htmlspecialchars($string, ENT_QUOTES);
		
		if(strlen($string) < $minChars)
		{
			return $this->setError(10000, "error", "", $field);
		}
			
		if(strlen($string) > $max_chars)
		{
			$string = substr($string,0,$max_chars);
		}
	}	

	function ValidateRequireField($string, $field = null)
	{				
		if($string == ""){
			$this->setError(10013, "error", "", $field);
			return false;
		}
		
		return true;
	}
	
	function ValidateFieldCero($string, $field = null)
	{				
		if($string == 0)
		{
			$this->setError(10013, "error", "", $field);
			return false;
		}
		
		return true;
	}

	function ValidateMail($mail)
	{
		$mail = strtolower($mail);
		if (!preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/',trim($mail)))
		{
			return $this->setError(10002, "error", "", "Email");
		}
	}
	
	function ValidateEmail($mail)
	{
		$mail = strtolower($mail);
		if (!preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/',trim($mail)))
		{
			return false;
		}
		
		return true;
	}	

	function ValidateUrl($url)
	{
		if (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url))
		{
			return $this->error = 10001;
		}
	}

	function ValidateFile($pathToFile)
	{
		$handle = @fopen($pathToFile, "r");
		if ($handle === false)
		{
			return $this->error = 10003;
		}
		fclose($handle);
	}

	function wwwRedirect()
	{
		if(!preg_match("/^www./", $_SERVER['HTTP_HOST']))
		{
			header("Location: ".WEB_ROOT);
		}
	}
	
	function MakeTime($day, $month, $year)
	{
		return mktime(0,0,0, $month, $day, $year);
	}
	
	function CreateDropDown($name, $from, $to, $selectedIndex)
	{
		$select = "<select name='".$name."' id='".$name."'>";
		for($ii=$from; $ii <= $to; $ii++)
		{
			if($selectedIndex == $ii)
			  $select.= "<option value='".$ii."' selected='selected'>".$ii."</option>";
			else
				$select.= "<option value='".$ii."'>".$ii."</option>"; 
		}
		$select.= "</select>";	 
		return $select;
	}

	function GetCurrentYear()
	{
		return date("Y", time());
	}
	
	function GetCents($num)
	{
		$cents = ($num - floor($num))*100;
		$cents = ceil($cents);
		if($cents < 10)
			$cents = "0".$cents;
		return $cents;
	}	
	
	function num2letras($num, $fem = false, $dec = false) 
	{ 
		 $matuni[2]  = "dos"; 
		 $matuni[3]  = "tres"; 
		 $matuni[4]  = "cuatro"; 
		 $matuni[5]  = "cinco"; 
		 $matuni[6]  = "seis"; 
		 $matuni[7]  = "siete"; 
		 $matuni[8]  = "ocho"; 
		 $matuni[9]  = "nueve"; 
		 $matuni[10] = "diez"; 
		 $matuni[11] = "once"; 
		 $matuni[12] = "doce"; 
		 $matuni[13] = "trece"; 
		 $matuni[14] = "catorce"; 
		 $matuni[15] = "quince"; 
		 $matuni[16] = "dieciseis"; 
		 $matuni[17] = "diecisiete"; 
		 $matuni[18] = "dieciocho"; 
		 $matuni[19] = "diecinueve"; 
		 $matuni[20] = "veinte"; 
		 $matunisub[2] = "dos"; 
		 $matunisub[3] = "tres"; 
		 $matunisub[4] = "cuatro"; 
		 $matunisub[5] = "quin"; 
		 $matunisub[6] = "seis"; 
		 $matunisub[7] = "sete"; 
		 $matunisub[8] = "ocho"; 
		 $matunisub[9] = "nove"; 
	
		 $matdec[2] = "veint"; 
		 $matdec[3] = "treinta"; 
		 $matdec[4] = "cuarenta"; 
		 $matdec[5] = "cincuenta"; 
		 $matdec[6] = "sesenta"; 
		 $matdec[7] = "setenta"; 
		 $matdec[8] = "ochenta"; 
		 $matdec[9] = "noventa"; 
		 $matsub[3]  = 'mill'; 
		 $matsub[5]  = 'bill'; 
		 $matsub[7]  = 'mill'; 
		 $matsub[9]  = 'trill'; 
		 $matsub[11] = 'mill'; 
		 $matsub[13] = 'bill'; 
		 $matsub[15] = 'mill'; 
		 $matmil[4]  = 'millones'; 
		 $matmil[6]  = 'billones'; 
		 $matmil[7]  = 'de billones'; 
		 $matmil[8]  = 'millones de billones'; 
		 $matmil[10] = 'trillones'; 
		 $matmil[11] = 'de trillones'; 
		 $matmil[12] = 'millones de trillones'; 
		 $matmil[13] = 'de trillones'; 
		 $matmil[14] = 'billones de trillones'; 
		 $matmil[15] = 'de billones de trillones'; 
		 $matmil[16] = 'millones de billones de trillones'; 
	
		 $num = trim((string)@$num); 
		 if ($num[0] == '-') { 
				$neg = 'menos '; 
				$num = substr($num, 1); 
		 }else 
				$neg = ''; 
		 while ($num[0] == '0') $num = substr($num, 1); 
		 if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
		 $zeros = true; 
		 $punt = false; 
		 $ent = ''; 
		 $fra = ''; 
		 for ($c = 0; $c < strlen($num); $c++) { 
				$n = $num[$c]; 
				if (! (strpos(".,'''", $n) === false)) { 
					 if ($punt) break; 
					 else{ 
							$punt = true; 
							continue; 
					 } 
	
				}elseif (! (strpos('0123456789', $n) === false)) { 
					 if ($punt) { 
							if ($n != '0') $zeros = false; 
							$fra .= $n; 
					 }else 
	
							$ent .= $n; 
				}else 
	
					 break; 
	
		 } 
		 $ent = '     ' . $ent; 
		 if ($dec and $fra and ! $zeros) { 
				$fin = ' coma'; 
				for ($n = 0; $n < strlen($fra); $n++) { 
					 if (($s = $fra[$n]) == '0') 
							$fin .= ' cero'; 
					 elseif ($s == '1') 
							$fin .= $fem ? ' una' : ' un'; 
					 else 
							$fin .= ' ' . $matuni[$s]; 
				} 
		 }else 
				$fin = ''; 
		 if ((int)$ent === 0) return 'Cero ' . $fin; 
		 $tex = ''; 
		 $sub = 0; 
		 $mils = 0; 
		 $neutro = true; 
		// echo $ent." esto es entero";
		 while ( ($num = substr($ent, -3)) != '   ') { 
				$ent = substr($ent, 0, -3); 
				if (++$sub < 3 and $fem) { 
					 $matuni[1] = 'una'; 
					 $subcent = 'os'; /* MODIFICADO as */
				}else{ 
					 $matuni[1] = $neutro ? 'un' : 'uno'; 
					 $subcent = 'os'; 
				} 
				$t = ''; 
				$n2 = substr($num, 1); 
				if ($n2 == '00') { 

				}elseif ($n2 < 21){ 
					 $t = ' ' . $matuni[(int)$n2]; 
				}elseif ($n2 < 30) { 
					 $n3 = $num[2]; 
					 if ($n3 != 0) $t = 'i' . $matuni[$n3]; 
					 $n2 = $num[1]; 
					 $t = ' ' . $matdec[$n2] . $t; 
				}else{ 
					 $n3 = $num[2]; 
					 if ($n3 != 0) $t = ' y ' . $matuni[$n3]; 
					 $n2 = $num[1]; 
					 $t = ' ' . $matdec[$n2] . $t; 
				} 
				$n = $num[0]; 
				if ($n == 1 && strlen(trim($num))==3) { 
					 $t = ' ciento' . $t; 
				}elseif ($n == 5 && strlen(trim($num))==3){ 
					 $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t; 
				}elseif ($n != 0 && strlen(trim($num))==3){ 
					 $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t; 
				} 

				if ($sub == 1) { 
				}elseif (! isset($matsub[$sub])) { 
					 if ($num == 1) { 
							$t = ' mil'; 
					 }elseif ($num > 1){ 
							$t .= ' mil'; 
					 } 
				}elseif ($num == 1) { 
					 $t .= ' ' . $matsub[$sub] . '?n'; 
				}elseif ($num > 1){ 
					 $t .= ' ' . $matsub[$sub] . 'ones'; 
				}   
				if ($num == '000') $mils ++; 
				elseif ($mils != 0) { 
					 if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
					 $mils = 0; 
				} 
				$neutro = true; 
				$tex = $t . $tex; 
		 } 
		 $tex = $neg . substr($tex, 1) . $fin; 
		 return ucfirst($tex); 
	} 
	
	function ImprimeNoFolio($folio)
	{
		return sprintf("%05d", $folio);
	}

	function ConvertirMes($mes)
	{
		$mesArray = array("N/A", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
		return $mesArray[$mes];
	}	
	
	function LoadPage($page, $extendible = "")
	{
			header("location: ".WEB_ROOT."/".$page.$extendible);
	}
	
	function Today()
	{
		return date("Y-m-d");
	}
	
	function ExtractPeriod()
	{
		$today = $this->Today();
		$this->DB()->setQuery("SELECT periodoId FROM periodo WHERE status = 'activo'");
		
		$period = $this->DB()->GetSingle();
		
		if($period == 0)
		{
			$period = 1;
		}
		
		return $period;
	}
	
	function GetReservationDays($in, $out)
	{
		$entrada = explode("-", $in);
		$entrada[2] = str_replace(" 00:00:00", "", $entrada[2]);
		
		$fechaEntrada = $this->MakeTime($entrada[2], $entrada[1], $entrada[0]);
		
		$salida = explode("-", $out);
		$salida[2] = str_replace(" 00:00:00", "", $salida[2]);
		$fechaSalida = $this->MakeTime($salida[2], $salida[1], $salida[0]);		
		
		return $days = ($fechaSalida - $fechaEntrada) / (3600 * 24);
	}
	
	function LoadUrl($url)
	{
			header("location: ".$url);
	}


function HandleMultipages($page,$total,$link,$items_per_page=0,$pagevar="p"){

	if(!$items_per_page)
		$items_per_page = ITEMS_PER_PAGE;

	$pages["items_per_page"] = $items_per_page;

	if(empty($page)){
		$page = 0;
	}//if

	$pages["start"] = $page*$items_per_page;
	$pages["end"]   = $pages["start"] + $items_per_page;
	if($pages["end"] > $total){
		$pages["end"] = $total;
	}//if

	if($total%$items_per_page == 0){
		$total_pages = $total/$items_per_page - 1;
		if($total_pages < 0){
			$total_pages = 0;
		}//if
	}//if
	else{
		$total_pages = (int)($total/$items_per_page);
	}//else

	if($page > 0){
		if(!$this->hs_eregi("\|$pagevar\|",$link))
		$pages["prev"] = $link."/".$pagevar."/".($page-1);
		else
		$pages["prev"] = $this->hs_ereg_replace("\|$pagevar\|",(string)($page-1),$link);
	}//if

	if($total_pages > 0){
		if($total_pages > 15){
			$start = $page - 7;
			if($start < 0)
				$start = 0;
			$end = $start + 15;
			if($end > $total_pages){
				$end = $total_pages;
				$start = $end - 15;
			}//if
		}//if
		else{
			$start = 0;
			$end = $total_pages;
		}//else
		for($i=$start;$i<=$end;$i++){
			if(!$this->hs_eregi("\|$pagevar\|",$link))
			$pages["numbers"][$i+1] = $link."/".$pagevar."/".$i;
			else
			$pages["numbers"][$i+1] = $this->hs_ereg_replace("\|$pagevar\|",(string)$i,$link);
		}//for
	}//if

	if($page < $total_pages){
		if(!$this->hs_eregi("\|$pagevar\|",$link))
		$pages["next"] = $link."/".$pagevar."/".($page+1);
		else
		$pages["next"] = hs_ereg_replace("\|$pagevar\|",(string)($page+1),$link);
	}//if
	
	if($start > 0){
		if(!$this->hs_eregi("\|$pagevar\|",$link))
		$pages["first"] = $link."/".$pagevar."/0";
		else
		$pages["first"] = hs_ereg_replace("\|$pagevar\|","0",$link);
	}
	
	if($end < $total_pages){
		if(!$this->hs_eregi("\|$pagevar\|",$link))
		$pages["last"] = $link."/".$pagevar."/".$total_pages;
		else
		$pages["last"] = hs_ereg_replace("\|$pagevar\|",(string)($total_pages),$link);
	}

	$pages["current"] = $page+1;

	return $pages;

}//handle_multipages

	function hs_eregi($var1,$var2,$var3 = null){
		
		if(function_exists("mb_eregi"))
			return @mb_eregi($var1,$var2,$var3);
		else
			return @preg_match("/$var1/i",$var2,$var3);
		
	}//hs_eregi


	function hs_ereg_replace($var1,$var2,$var3){
		
		if(function_exists("mb_ereg_replace"))
			return mb_ereg_replace($var1,$var2,$var3);
		else
			return preg_replace("/$var1/",$var2,$var3);
		
	}//hs_ereg_replace

	function SexoString($sex)
	{
		switch($sex)
		{
			case "m": $sexo = "Masculino";break;
			case "f": $sexo = "Femenino";break;
			default: $sexo = "Masculino";
		}
		return $sexo;
	}
	function CalculateIva($price)
	{
		return $price * (IVA / 100);
	}
	
	function ReturnLang()
	{
		if(!$_SESSION['lang'])
		{
			$lang = "es";
		}
		elseif($_SESSION['lang'] == "es")
		{
			$lang = "es";
		}
		else
		{
			$lang = "en";
		}
		
		return $lang;
	}
	
	function FormatOutputText(&$text)
	{
		$text = nl2br($text);
	}
	
	function SetIp()
	{
		if ($_SERVER) 
		{
			if ( $_SERVER["HTTP_X_FORWARDED_FOR"] ) 
			{
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			}
			elseif ( $_SERVER["HTTP_CLIENT_IP"] )
			{
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			}
			else
			{
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		}
		else
		{
			if ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) 
			{
				$realip = getenv( 'HTTP_X_FORWARDED_FOR' );
			} elseif ( getenv( 'HTTP_CLIENT_IP' ) ) 
			{
					$realip = getenv( 'HTTP_CLIENT_IP' );
			} else 
			{
				$realip = getenv( 'REMOTE_ADDR' );
			}
		}
		
		return $realip;
	
	}	
	
	
	
	function validateDateFormat($date, $field)
	{
		//match the format of the date
		if (preg_match ("/^([0-9]{2})-([0-9]{2})-([0-9]{4})$/", $date, $parts))
		{ 
			//check weather the date is valid of not
					if(checkdate($parts[2],$parts[1],$parts[3]))
						return true;
					else
					 return $this->setError(10011, "error", "", $field);
		}
		else
			return $this->setError(10011, "error", "", $field);
	}
	
	function DP($variable)
	{
		echo "<pre>";
		print_r($variable);
		echo "</pre>";
	}
	
	function CadenaOriginalVariableFormat($cadena, $formatNumber = false, $addPipe = true, $dec = 2)
	{
		//change tabs, returns and newlines into spaces
		$cadena = utf8_encode(urldecode($cadena));
		$cadena = str_replace("|","/",$cadena);
		$remove = array("\t", "\n", "\r\n", "\r");
    $cadena = str_replace($remove, ' ', $cadena);
		
		$pat[0] = "/^\s+/";
		$pat[1] = "/\s{2,}/";
		$pat[2] = "/\s+\$/";
		$rep[0] = "";
		$rep[1] = " ";
		$rep[2] = "";
		$cadena = preg_replace($pat,$rep,$cadena);

		if($formatNumber)
		{
			$cadena = @number_format($cadena, $dec, ".", "");
		}
		
		if(strlen($cadena) > 0 && $addPipe)
		{
			$cadena .= "|";
		}
		return $cadena = trim($cadena);
	}
	
	function CadenaOriginalPDFFormat($cadena, $formatNumber = false, $addPipe = true, $dec = 2)
	{
		//change tabs, returns and newlines into spaces
		$cadena = utf8_encode(urldecode($cadena));
		$cadena = str_replace("|","/",$cadena);
//		$remove = array("\t", "\n", "\r\n", "\r");
//    $cadena = str_replace($remove, ' ', $cadena);
		
		$pat[0] = "/^\s+/";
		$pat[1] = "/\s{2,}/";
		$pat[2] = "/\s+\$/";
		$rep[0] = "";
		$rep[1] = " ";
		$rep[2] = "";
		$cadena = preg_replace($pat,$rep,$cadena);

		if($formatNumber)
		{
			$cadena = number_format($cadena, $dec, ".", "");
		}
		
		if(strlen($cadena) > 0 && $addPipe)
		{
			$cadena .= "|";
		}
		return $cadena = trim($cadena);
	}
	
	function DecodeVal($value){
		
		return urldecode($value);
		
	}//decodeVal
	
	//new
	function Wrap($string, $lenght)
	{
		$wrapped = wordwrap($string, $lenght);
		return $wrapped;
	}

	function ShortString($string, $lenght)
	{
		$string = html_entity_decode($string);
		$string = strip_tags($string);
		$wrapped = substr($string, 0, $lenght);
		return $wrapped;
	}

	function DecodeString($string)
	{
		$string = html_entity_decode($string);
		$string = strip_tags($string);
		$string = utf8_encode($string);
		return $string;
	}
	
	function EncodeRow($row){
		
		foreach($row as $key => $val){
			$info[$key] = utf8_encode($val);
		}
		
		return $info;
		
	}
	
	function EncodeResult($result){
	
		foreach($result as $k => $row){
			
			foreach($row as $key => $val){
				$info[$key] = utf8_encode($val);
			}
			
			$card[$k] = $info;
			
		}
		
		return $card;
		
	}
	
	function DecodeRow($row){
		
		foreach($row as $key => $val){
			$info[$key] = utf8_decode($val);
		}
		
		return $info;
		
	}
	
	function DecodeResult($result){
	
		foreach($result as $k => $row){
			
			foreach($row as $key => $val){
				$info[$key] = utf8_decode($val);
			}
			
			$card[$k] = $info;
			
		}
		
		return $card;
		
	}
	
	function GetHours(){
		
		for($k=0; $k<=23; $k++){
			if($k <= 9)
				$val = '0'.$k;
			else
				$val = $k;
			
			$card['value'] = $k;
			$card['name'] = $val;
					
			$hours[$k] = $card;
		}
		
		return $hours;
	
	}
	
	function GetMinutes(){
		
		for($k=0; $k<=59; $k++){
			if($k <= 9)
				$val = '0'.$k;
			else
				$val = $k;
			
			$card['value'] = $k;
			$card['name'] = $val;
					
			$minutes[$k] = $card;
		}
		
		return $minutes;
	
	}
	
	function EnumerateStates(){
		
		$sql = "SELECT 
					* 
				FROM 
					state 
				ORDER BY 
					name ASC";
		
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		
		return $result;
		
	}
	
	function GetClaveState($stateId){
		
		$sql = "SELECT 
					clave 
				FROM 
					state 
				WHERE 
					stateId = ".$stateId;
		
		$this->Util()->DB()->setQuery($sql);
		$clave = $this->Util()->DB()->GetSingle();
		
		return $clave;
		
	}
	
	function GetDayByKey($key){
		
		$days = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
		
		return $days[$key];
	
	}
	
	function GetMonthByKey($key){
		
		$months = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
					  'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		
		return $months[$key];
	
	}
	
	function getMonthsList(){
		
		for($k=1; $k<=12; $k++){
			$months[$k] = $this->getMonthByKey($k);
		}//for
		
		return $months;
		
	}//getMonthsList
	
	function getDaysList(){
		
		for($k=1; $k<=31; $k++)
			$days[$k] = $k;
		
		return $days;
		
	}//getDaysList
	
	function ValidateDate($year, $month, $day)
	{
		//validamos que sean numericos
		if( !is_numeric($year) || !is_numeric($month) || !is_numeric($day))
			return false;
		//validamos el dia
		if($day < 1 || $day > 31 )
			return false;
		//validamos el mes
		if($month < 1 || $month > 12)
			return false;

		//echo '<br/>*** dia: ' . $day . ', mes: ' . $month . ' ***<br/>';
		
		//todos los meses tienen 28 dias, si es asi es una fecha valida
		if($day <= 28)
			return true;
		
		//todos los meses excepto febrero (si no es bisiesto) tienen 29 dias, es una fecha valida
		if($day == 29 && $month != 2)
			return true;
		
		//si el dia es 29 y el mes es febrero, validar solo si es año bisiesto
		if($day == 29 && $month == 2 &&
		    ( ($year % 4 == 0) && (($year % 100 != 0) || ($year % 400 == 0)) )   )
		{
			//dia 29, mes Feb, año es bisiesto, fecha valida
			return true;
		}
		if($day == 29 && $month == 2 &&
		    !( ($year % 4 == 0) && (($year % 100 != 0) || ($year % 400 == 0)) )   )
		{
			//dia 29, mes Feb, Año no es bisiesto, fecha no valida
			return false;
		}
		// si el dia es mayor a 29 y es febrero, es fecha no valida
		if( ($day > 29) && ($month == 2) )
			return false;
		
		//si el dia es 31, y el mes es Abr, Jun, Sep y Nov, la fecha no es valida (solo tienen 30 dias)
		if( ($day > 30) && ( $month == 4 || $month == 6 || $month == 9 || $month == 11) )
			return false;
		
		//si el dia es 30 todos los meses tienen 30, excepto febreo que ya se evaluo antes...
		return true;

	}
	
	function GetYearsOld($date){
		
		list($dia,$mes,$anio) = explode("-",$date);
		
		$anio_dif = date("Y") - $anio;
		$mes_dif = date("m") - $mes;
		$dia_dif = date("d") - $dia;
		
		if ($dia_dif < 0 || $mes_dif < 0)
			$anio_dif--;
		
		return $anio_dif;
	
	}
	
	function orderMultiDimensionalArray ($toOrderArray, $field, $inverse = false) {
		
		$position = array();
		$newRow = array();
		foreach ($toOrderArray as $key => $row) {
				$position[$key]  = $row[$field];
				$newRow[$key] = $row;
		}
		if ($inverse) {
			arsort($position);
		}
		else {
			asort($position);
		}
		$returnArray = array();
		foreach ($position as $key => $pos) {     
			$returnArray[] = $newRow[$key];
		}
		return $returnArray;
		
	}
	
	function GetNextAutoIncrement($table){
		
		$sql = 'SHOW TABLE STATUS LIKE "'.$table.'"';
		$this->Util()->DB()->setQuery($sql);
		$row = $this->Util()->DB()->GetRow();
		
		return $row['Auto_increment'];
		
	}
	
	function EnumTiposComprobante(){
		
		$sql = 'SELECT * FROM tiposComprobante WHERE tiposComprobanteId = 1 ORDER BY nombre ASC';
		$this->Util()->DB()->setQuery($sql);
		$tipos = $this->Util()->DB()->GetResult();
		
		return $tipos;
	}
	
	function PadStringLeft($input, $chars, $char)
	{
		return str_pad($input, $chars, $char, STR_PAD_LEFT);
	}
	
	function CalculateEndDateUp($startDate, $periodo){
		
		$startDate = date('Y-m-d',strtotime($startDate));
				
		$timeStartDate = strtotime($startDate);
		
		if($periodo == 'mensual'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)+1, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'bimestral'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)+2, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'trimestral'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)+3, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'semestral'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)+6, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'anual'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate), date('d',$timeStartDate), date('Y',$timeStartDate)+1); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'bianual'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate), date('d',$timeStartDate), date('Y',$timeStartDate)+2); 
			$endDate = date('Y-m-d', $endDate); 
		}
		
		return $endDate;
		
	}//CalculateEndDateUp
	
	function CalculateEndDateDown($startDate, $periodo){
		
		$startDate = date('Y-m-d',strtotime($startDate));
				
		$timeStartDate = strtotime($startDate);
		
		if($periodo == 'mensual'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)-1, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'bimestral'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)-2, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'trimestral'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)-3, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'semestral'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate)-6, date('d',$timeStartDate), date('Y',$timeStartDate)); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'anual'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate), date('d',$timeStartDate), date('Y',$timeStartDate)-1); 
			$endDate = date('Y-m-d', $endDate); 
		}
		elseif($periodo == 'bianual'){
			$endDate = mktime(0, 0, 0, date('m',$timeStartDate), date('d',$timeStartDate), date('Y',$timeStartDate)-2); 
			$endDate = date('Y-m-d', $endDate); 
		}
		
		return $endDate;
		
	}//CalculateEndDateDown
	
	function ChangeDateFormat($fecha){
		
		$sD = explode('-',$fecha);
		$mes = $this->GetMonthByKey(intval($sD[1]));
		$fecha = $sD[2].' '.substr($mes,0,3).' '.$sD[0];
		
		return $fecha;
		
	}//ChangeDateFormat
	
	function GetStatusByDate($fecha, $recibido = 0){
		
		$status = 'Futuro';
		if($recibido)
			$status = 'Entregado';
		elseif($fecha == '')
			$status = '';			
		elseif($fecha < date('Y-m-d'))
			$status = 'Retrasado';
		
			 //Si faltan 2 semanas para la entrega
		elseif($fecha <= date('Y-m-d',strtotime('+2 week')))
			$status = 'Proximo';
		
		return $status;
		
	}//GetStatusByDate
	
	function GetContCatName($contCatId){
		
		$sql = 'SELECT name FROM contract_category WHERE contCatId = '.$contCatId;
		$this->Util()->DB()->setQuery($sql);
		$category = $this->Util()->DB()->GetSingle();
		
		return $category;
		
	}//GetContCatName
	
	function GetContSubCatName($contSubcatId){
		
		$sql = 'SELECT name FROM contract_subcategory WHERE contSubcatId = '.$contSubcatId;
		$this->Util()->DB()->setQuery($sql);
		$subcategory = $this->Util()->DB()->GetSingle();
		
		return $subcategory;
		
	}//GetContSubCatName
	
	function setFormatDate($fecha){
		
		$mesEnt = $this->GetMonthByKey(date('n',strtotime($fecha)));
		$mesEnt = substr($mesEnt,0,3);
				
		$fecha = date('d',strtotime($fecha)).' '.strtoupper($mesEnt).' '.date('Y',strtotime($fecha));	
		
		return $fecha;
		
	}//setFormatDate
	
	
	function DecodeUrlRow($row){
		
		foreach($row as $key => $val){
			$info[$key] = urldecode($val);
		}
		
		return $info;
		
	}
		
	
	function DecodeUrlResult($result){
	
		if(!$result)
			return;
			
		foreach($result as $k => $row){
			
			foreach($row as $key => $val){
				$info[$key] = urldecode($val);
			}
			
			$card[$k] = $info;
			
		}
		
		return $card;
		
	}
	
	
	function Unzip($path, $file)
	{
		$zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res === true) 
		{
    	$zip->extractTo($path);
      $zip->close();
      return true;
    } 
		else 
		{
    	return false;
    }
	}
	
	function Zip($path, $file) 
	{
		$zip = new ZipArchive();
		$res = $zip->open($path.$file.".zip", ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
		if ($res === TRUE) 
		{
			$zip->addFile($path.$file.".xml",$file.".xml");
    	$zip->close();
		}
    
    return file_exists($path.$file);
  }	
	
}


?>