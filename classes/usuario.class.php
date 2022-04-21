<?php

class Usuario extends Main
{

	private $usuarioId;
	private $nombre;
	private $telefono;
	private $email;
	private $passwd;
	private $rfc;
	private $notas;



	public function setUsuarioId($value){
		$this->usuarioId=$value;
	}

	public function setNombre($value){
		$this->nombre=$value;
	}

	public function setTelefono($value){
		$this->telefono=$value;
	}

	public function setEmail($value){
		$this->email = $value;
	}

	public function setRfc($value){
		$this->rfc=$value;
	}

	public function setPasswd($value){
		$this->passwd=$value;
	}

	public function setNotas($value){
		$this->notas=$value;
	}

	public function Repetido($email){
		$sql="select * from usuario where email='".$email."' ";
		$this->Util()->DB()->setQuery($sql);   
  		$row = $this->Util()->DB()->GetRow();

  		if($row){
  			return true;
  		}
  			return false;
  		
	}

	public function RepetidoRfc($rfc){
		$sql="select * from usuario where rfc='".$rfc."' ";
		$this->Util()->DB()->setQuery($sql);   
  		$row = $this->Util()->DB()->GetRow();

  		if($row){
  			return true;
  		}
  			return false;
  		
	}

	public function InfoUsuario(){
		$sql="select * from usuario where usuarioId='".$this->usuarioId."' ";
		$this->Util()->DB()->setQuery($sql);   
  		$row = $this->Util()->DB()->GetRow();
  		return $row;
	}

	public function getUsuarios(){
		$sql="select * from usuario order by fechaCaptura";
		$this->Util()->DB()->setQuery($sql);   
  		$result = $this->Util()->DB()->GetResult();
  		return $result;
	}

	public function Save(){
				$sql="
		INSERT INTO
			usuario
			(
					`nombre`,
					`telefono`,
					`email`,
					`passwd`,
					`rfc`,
					`notas`,
					`fechaCaptura`
					
					
					
			)
			VALUES
			(				
					'".$this->nombre."',
					'".$this->telefono."',
					'".$this->email."',
					'".md5($this->passwd)."',
					'".$this->rfc."',
					'".$this->notas."',
					'".date("Y-m-d H:i:s")."'
					
					
			);";
			
		$this->Util()->DB()->setQuery($sql);   
		$this->Util()->DB()->InsertData();
	}

	public function UpdateUsuario(){
		$sql="update usuario set nombre='".$this->nombre."',telefono='".$this->telefono."',rfc='".$this->rfc."',email='".$this->email."',notas='".$this->notas."' where usuarioId='".$this->usuarioId."' ";
		
		$this->Util()->DB()->setQuery($sql);   
		$this->Util()->DB()->UpdateData();
	}


	public function login(){
		$sql="select * from usuario where email='".$this->email."' and passwd='".md5($this->passwd)."'  ";
		//echo $sql;
		$this->Util()->DB()->setQuery($sql);   
  		$result = $this->Util()->DB()->GetRow();
  		return $result;
	}

	public function UpdatePass(){
		$sql="update usuario set passwd='".md5($this->passwd)."'  where usuarioId='".$this->usuarioId."' ";
		$this->Util()->DB()->setQuery($sql);   
		$this->Util()->DB()->UpdateData();
	}



}
?>