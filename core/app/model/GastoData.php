<?php
class GastoData {
	public static $tablename = "gasto";

	public function GastoData(){
		$this->descripcion = "";
		$this->precio = "";
		$this->fecha = "";
		$this->hora = "";
	}

	public function getUsuario(){ return UserData::getById($this->id_usuario);}
	public function getTipopago(){ return TipoPagoData::getById($this->id_tipopago);}

	public function add(){
		$sql = "insert into gasto (descripcion,precio,id_usuario,fecha,hora,id_caja,fecha_creacion) ";
		$sql .= "value (\"$this->descripcion\",\"$this->precio\",$this->id_usuario,\"$this->fecha\",\"$this->hora\",\"$this->id_caja\",NOW())";
		return Executor::doit($sql);
	}

	public function addIngreso(){
		$sql = "insert into gasto (descripcion,precio,id_usuario,fecha,hora,id_caja,fecha_creacion,estado,id_tipopago) ";
		$sql .= "value (\"$this->descripcion\",\"$this->precio\",$this->id_usuario,\"$this->fecha\",\"$this->hora\",\"$this->id_caja\",NOW(),3,$this->id_tipopago)";
		return Executor::doit($sql);
	}

	public function addIngresoNew(){
		$sql = "insert into gasto (descripcion,precio,id_usuario,fecha,hora,id_caja,fecha_creacion,estado,id_tipopago,modulo,categoria,Cancelled) ";
		$sql .= "value (\"$this->descripcion\",\"$this->precio\",$this->id_usuario,\"$this->fecha\",\"$this->hora\",\"$this->id_caja\",NOW(),3,$this->id_tipopago,\"$this->modulo\",\"$this->categoria\",0)";
		return Executor::doit($sql);
	}

	public function addEgresoNew(){
		$sql = "insert into gasto (descripcion,precio,id_usuario,fecha,hora,id_caja,fecha_creacion,estado,id_tipopago,modulo,categoria,Cancelled) ";
		$sql .= "value (\"$this->descripcion\",\"$this->precio\",$this->id_usuario,\"$this->fecha\",\"$this->hora\",\"$this->id_caja\",NOW(),1,$this->id_tipopago,\"$this->modulo\",\"$this->categoria\",0)";
		return Executor::doit($sql);
	}

	public function addIngresop(){
		$sql = "insert into gasto (descripcion,precio,id_usuario,fecha,hora,fecha_creacion,estado,id_tipopago,id_proceso) ";
		$sql .= "value (\"$this->descripcion\",\"$this->precio\",$this->id_usuario,\"$this->fecha\",\"$this->hora\",NOW(),3,$this->id_tipopago,$this->id_proceso)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set descripcion=\"$this->descripcion\",precio=\"$this->precio\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateSalida(){
		$sql = "update ".self::$tablename." set id_caja=$this->id_caja,id_tipopago=$this->id_tipopago where id=$this->id";
		Executor::doit($sql);
	}

	public function updateEstado(){
		$sql = "update ".self::$tablename." set estado=2 where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new GastoData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where estado=1 order by id desc limit 200";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getAllIngreso(){
		$sql = "select * from ".self::$tablename." where estado=3 order by id desc limit 200";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getAllIngresoCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and estado=3 order by id desc limit 200";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getAllIngresoProceso($id){
		$sql = "select * from ".self::$tablename." where id_proceso=$id order by id desc limit 200";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getAllAnulado(){
		$sql = "select * from ".self::$tablename." where estado=2 and id_tipopago is null";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	} 
	
	public static function getAllAnuladoIngreso(){
		$sql = "select * from ".self::$tablename." where estado=2 and id_tipopago is not null ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getEgresoDiario($hoy){
		$sql = "select * from ".self::$tablename." where  date(fecha)=\"$hoy\"  and estado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getEgresoNoDiario($hoy){
		$sql = "select * from ".self::$tablename." where  date(fecha)!=\"$hoy\"  and estado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where descripcion like '%$p%' and estado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getEgresoCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and estado=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getIngresoNuevoCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and estado=3  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}
 
	public static function getIngresoRangoFechas($start,$end){
		$sql = "select * from ".self::$tablename." where date(fecha_creacion) >= \"$start\" and date(fecha_creacion) <= \"$end\" and estado=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getIngresoGraficoFechas($anio,$mes){
		$sql = "select * from ".self::$tablename." where year(fecha_creacion) = $anio  and month(fecha_creacion) = $mes and estado=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getReporteMensualDia($dia,$fecha){
 $sql = "select * from ".self::$tablename." where day(fecha_creacion) = \"$dia\" and month(fecha_creacion) = \"$fecha\" and estado=1   order by Fecha_creacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}


	public static function getFiltroFechas($start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and estado=1   order by fecha_creacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getFiltroFechasIEl($start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and estado=1 and id_proceso is null  order by fecha_creacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getEgresoooCajaa($id_caja){
 $sql = "select * from ".self::$tablename." where id_caja=$id_caja and estado=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getFiltroFechasIngreso($start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and estado=3   order by fecha_creacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getFiltroFechasIngresoLK($start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and estado=3 and id_proceso is null   order by fecha_creacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getFiltroFechasAnulado($start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and estado=2 and id_tipopago is null   order by Fecha_creacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}
	
	public static function getFiltroFechasAnuladoIngreso($start,$end){
 $sql = "select * from ".self::$tablename." where date(fecha) >= \"$start\" and date(fecha) <= \"$end\" and estado=2 and id_tipopago is not null   order by Fecha_creacion desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	// FILTRO PARA REGISTROS

	public static function getIngresosEgresos(){
		$sql = "select * from ".self::$tablename." where estado=1 or estado=3  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getIngresosEgresosNuevoj(){
		$sql = "select * from ".self::$tablename." where estado=1 or estado=3 and id_proceso is null  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getIngresosEgresosCajaa($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and (estado=1 or estado=3) and id_proceso is null  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getIngresosCajaaNew($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and estado=3  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getIngresosCajaaNewFechas($start,$end){
		$sql = "select * from ".self::$tablename." where date(fecha_creacion) >= \"$start\" and date(fecha_creacion) <= \"$end\" and estado=3  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData()); 
	}

	public static function getEgresosCajaaNew($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and estado=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData());
	}

	public static function getEgresosCajaaNewFechas($start,$end){
		$sql = "select * from ".self::$tablename." where date(fecha_creacion) >= \"$start\" and date(fecha_creacion) <= \"$end\" and estado=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new GastoData()); 
	}




}

?>