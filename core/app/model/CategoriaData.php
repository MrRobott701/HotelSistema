<?php
class CategoriaData {
	public static $tablename = "categoria";



	public function CategoriaData(){
		$this->nombre = "";
		$this->fecha_creada = "NOW()";
	}

	public function add(){
		$sql = "insert into categoria (nombre,fecha_creada,cant) ";
		$sql .= "value (\"$this->nombre\",$this->fecha_creada,$this->cant)";
		Executor::doit($sql);
	}

	public function add_whit_image(){
		$sql = "insert into categoria (nombre,imagen,fecha_creada,cant) ";
		$sql .= "value (\"$this->nombre\",\"$this->imagen\",$this->fecha_creada,$this->cant)";
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
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",cant=\"$this->cant\" where id=$this->id";
		Executor::doit($sql);
	}
	
	public function update_estado(){
		$sql = "update ".self::$tablename." set estado=0 where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set imagen=\"$this->imagen\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoriaData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where estado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoriaData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoriaData());

	}


}

?>