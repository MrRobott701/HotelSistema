<?php
class ErrorData {
	public static $tablename = "error";



	public function ErrorData(){
		$this->nombre = "";
		
	}

	public function add(){
		$sql = "insert into error (nombre,accion,razon,fecha,hora) ";
		$sql .= "value (\"$this->nombre\",\"$this->accion\",\"$this->razon\",\"$this->fecha\",\"$this->hora\")";
		Executor::doit($sql);
	}

	public function add_c(){
		$sql = "insert into error (nombre,accion,razon,fecha,hora,estado) ";
		$sql .= "value (\"$this->nombre\",\"$this->accion\",\"$this->razon\",\"$this->fecha\",\"$this->hora\",0)";
		Executor::doit($sql);
	}

	

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoriaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateError(){
		$sql = "update ".self::$tablename." set accion=\"$this->accion\",estado=1 where id=$this->id";
		Executor::doit($sql);
	}
	
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ErrorData());

	}


	public static function getByUltimo(){
		$sql = "select * from ".self::$tablename." where estado=0 order by id desc limit 1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ErrorData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where estado=1 or estado=0 order by id desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ErrorData());
	}




}

?>