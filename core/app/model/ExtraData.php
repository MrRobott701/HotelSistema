<?php
class ExtraData {
	public static $tablename = "extra";



	public function ExtraData(){
		$this->area = "";
		
	}

	public function getUsuario(){ return UserData::getById($this->id_usuario);}


	public function add(){
		$sql = "insert into extra (id_usuario,area,especifico,glosa,fecha) ";
		$sql .= "value ($this->id_usuario,\"$this->area\",\"$this->especifico\",\"$this->glosa\",\"$this->fecha\")";
		Executor::doit($sql);
	}

	public function addMantenimiento(){
		$sql = "insert into extra (id_usuario,area,especifico,glosa,fecha,tipo) ";
		$sql .= "value ($this->id_usuario,\"$this->area\",\"$this->especifico\",\"$this->glosa\",\"$this->fecha\",2)";
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
		$sql = "update ".self::$tablename." set area=\"$this->area\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_estado(){
		$sql = "update ".self::$tablename." set estado=1, fecha_inicio=\"$this->fecha_inicio\" where id=$this->id";
		Executor::doit($sql);
	}

	public function fintarea(){
		$sql = "update ".self::$tablename." set estado=2, fecha_fin=\"$this->fecha_fin\" where id=$this->id";
		Executor::doit($sql);
	}
	
	 

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ExtraData());

	}

	public static function getAllHoy($hoy){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}

	public static function getAllHoyUser($hoy,$id_usuario){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" and id_usuario=$id_usuario and tipo=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}


	public static function getAllHoyCompleto($hoy){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\"  and estado=2  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}


	public static function getAllHoyUserCompleto($hoy,$id_usuario){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" and id_usuario=$id_usuario and estado=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." where tipo=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}


	public static function getAllAgrupado(){
		$sql = "select * from ".self::$tablename." group by fecha  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}


	
	// MANTENIMIENTO

	public static function getAllMM(){
		$sql = "select * from ".self::$tablename." where tipo=2  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}


	public static function getAllHoyUserMM($hoy,$id_usuario){
		$sql = "select * from ".self::$tablename." where fecha=\"$hoy\" and id_usuario=$id_usuario and tipo=2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExtraData());
	}
	// FIN MANTENIMIENTO


}

?>