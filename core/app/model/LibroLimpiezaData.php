<?php
class LibroLimpiezaData {
	public static $tablename = "libro_limpieza";



	public function LibroLimpiezaData(){
		$this->nombre = "";
		$this->fecha_creada = "NOW()";
	}

	public function getUsuario(){ return UserData::getById($this->id_usuario);}
	public function getHabitacion(){ return HabitacionData::getById($this->id_habitacion);}

	public function add(){
		$sql = "insert into libro_limpieza (id_tiempo,id_usuario,tipo,id_habitacion,fecha,estado,posi) ";
		$sql .= "value ($this->id_tiempo,$this->id_usuario,\"$this->tipo\",$this->id_habitacion,\"$this->fecha\",\"$this->estado\",\"$this->posi\")";
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

	public function update_estado(){
		$sql = "update ".self::$tablename." set estado=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function fintarea(){
		$sql = "update ".self::$tablename." set estado=2 where id=$this->id";
		Executor::doit($sql);
	}
	
	 

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LibroLimpiezaData());

	}

	public static function getAllHoy($hoy){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibroLimpiezaData());
	}

	public static function getAllHoyUserrr($hoy){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" group by id_usuario order by id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibroLimpiezaData());
	}

	public static function getAllHoyUser($hoy,$id_usuario){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" and id_usuario=$id_usuario order by orden asc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibroLimpiezaData());
	}


	public static function getAllHoyCompleto($hoy){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\"  and estado=2  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibroLimpiezaData());
	}


	public static function getAllHoyUserCompleto($hoy,$id_usuario){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" and id_usuario=$id_usuario and estado=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibroLimpiezaData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibroLimpiezaData());
	}


	public static function getAllAgrupado(){
		$sql = "select * from ".self::$tablename." group by fecha  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LibroLimpiezaData());
	}


	

}

?>