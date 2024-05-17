<?php
class PagoProcesoData {
	public static $tablename = "proceso_pago";

	public function PagoProcesoData(){

		$this->fecha_creada = "NOW()";
	  
	}

	public function getTipoPago(){ return TipoPagoData::getById($this->id_tipopago);}
	public function getProceso(){ return ProcesoData::getById($this->id_proceso);}


	public function getUser(){ return UserData::getById($this->id_user);}

	public function add(){ 
		$sql = "insert into proceso_pago (monto,total,nro_operacion,id_tipopago,id_proceso,id_caja,fecha_creada,cantidad,aval,banco,id_user,terminacion) ";
		$sql .= "value (\"$this->monto\",\"$this->total\",\"$this->nro_operacion\",$this->id_tipopago,$this->id_proceso,\"$this->id_caja\",NOW(),\"$this->cantidad\",\"$this->aval\",\"$this->banco\",\"$this->id_user\",\"$this->terminacion\")";
		return Executor::doit($sql);
	}

	public function addAdicional(){ 
		$sql = "insert into proceso_pago (monto,total,nro_operacion,id_tipopago,id_proceso,id_caja,fecha_creada,cantidad,aval,banco,id_user,terminacion) ";
		$sql .= "value (\"$this->monto\",\"$this->total\",\"$this->nro_operacion\",$this->id_tipopago,$this->id_proceso,\"$this->id_caja\",NOW(),\"$this->cantidad\",\"$this->aval\",\"$this->banco\",\"$this->id_user\",\"$this->terminacion\")";
		return Executor::doit($sql);
	}

	public function addMensual(){ 
		$sql = "insert into proceso_pago (monto,nro_operacion,id_tipopago,id_proceso,id_caja,fecha_creada,pagado) ";
		$sql .= "value (\"$this->monto\",\"$this->nro_operacion\",$this->id_tipopago,$this->id_proceso,\"$this->id_caja\",NOW(),$this->pagado)";
		return Executor::doit($sql);
	}

	public function addEstadia(){ 
		$sql = "insert into proceso_pago (monto,total,id_proceso,id_caja,fecha_creada,cantidad,fecha_entrada,fecha_salida,pagado,noche,nro_operacion,id_user) ";
		$sql .= "value (\"$this->monto\",\"$this->total\",$this->id_proceso,\"$this->id_caja\",NOW(),$this->cantidad,\"$this->fecha_entrada\",\"$this->fecha_salida\",0,\"$this->noche\",1,\"$this->id_user\")";
		return Executor::doit($sql);
	}

	public function addEstadiaMensual(){ 
		$sql = "insert into proceso_pago (monto,id_tipopago,id_proceso,id_caja,fecha_creada,cantidad,fecha_entrada,fecha_salida,pagado) ";
		$sql .= "value (\"$this->monto\",$this->id_tipopago,$this->id_proceso,\"$this->id_caja\",NOW(),$this->cantidad,\"$this->fecha_entrada\",\"$this->fecha_salida\",$this->pagado)";
		return Executor::doit($sql);
	}

	public function addPago(){ 
		$sql = "insert into proceso_pago (monto,nro_operacion,id_tipopago,id_proceso,id_caja,fecha_creada,aval) ";
		$sql .= "value (\"$this->monto\",\"$this->nro_operacion\",$this->id_tipopago,$this->id_proceso,\"$this->id_caja\",NOW(),\"$this->aval\")";
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
		$sql = "update ".self::$tablename." set monto=\"$this->monto\",nro_operacion=\"$this->nro_operacion\",id_tipopago=$this->id_tipopago,id_proceso=$this->id_proceso where id=$this->id";
		Executor::doit($sql);
	}

	public function updatePagoproceso(){
		$sql = "update ".self::$tablename." set monto=\"$this->monto\",nro_operacion=\"$this->nro_operacion\",id_tipopago=$this->id_tipopago,id_proceso=$this->id_proceso,id_caja=\"$this->id_caja\",aval=\"$this->aval\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateProceso(){
		$sql = "update ".self::$tablename." set id_proceso=$this->id_proceso where id=$this->id";
		Executor::doit($sql);
	}

	public function updateSalida(){
		$sql = "update ".self::$tablename." set pagado=1,id_tipopago=$this->id_tipopago,cantidad=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function updateDelPago(){
		$sql = "update ".self::$tablename." set monto=\"$this->monto\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateOperacion(){
		$sql = "update ".self::$tablename." set operacion=\"$this->operacion\",mbanco=\"$this->mbanco\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateTranferencia(){
		$sql = "update ".self::$tablename." set mbanco=\"$this->mbanco\",malimentacion=\"$this->malimentacion\",operacion=\"$this->operacion\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateTranferenciaSO(){
		$sql = "update ".self::$tablename." set mbanco=\"$this->mbanco\",malimentacion=\"$this->malimentacion\" where id=$this->id";
		Executor::doit($sql);
	}
	
	public static function anularPago($id){
    // Actualiza las variables monto y total a 0 en todos los registros con el mismo id_proceso.
    $updateSql = "UPDATE " . self::$tablename . " SET monto = 0, total = 0 WHERE id_proceso = $id";
    Executor::doit($updateSql);
}



	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PagoProcesoData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." where  pagado=1 and monto>0 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}



	public static function getAllDeposit(){
		$sql = "select * from ".self::$tablename." where  pagado=1 and monto>0 and id_tipopago=3 GROUP BY operacion ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllDepositFechas($start,$end){
		$sql = "select * from ".self::$tablename." where  pagado=1 and monto>0 and id_tipopago=3 and date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\" GROUP BY operacion ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllDepositOpera($operacion,$fecha){
		$sql = "select * from ".self::$tablename." where  pagado=1 and monto>0 and id_tipopago=3 and operacion=\"$operacion\" and date(fecha_creada) = \"$fecha\" ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}


	public static function getAllProceso($id_proceso){
		$sql = "select * from ".self::$tablename." where id_proceso=$id_proceso and pagado=1  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getByIdProceso($id_proceso){
		$sql = "select * from ".self::$tablename." where id_proceso=$id_proceso  order by id desc";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PagoProcesoData());
	}

	public static function getAllProcesoDesc($id_proceso){
		$sql = "select * from ".self::$tablename." where id_proceso=$id_proceso and pagado=1  order by id asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllProcesoTodo($id_proceso){
		$sql = "select * from ".self::$tablename." where id_proceso=$id_proceso and pagado=0  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	} 

	public static function getAllProcesoExtender($id_proceso){
		$sql = "select * from ".self::$tablename." where id_proceso=$id_proceso and nro_operacion!=0   order by id asc";
		$query = Executor::doit($sql);  
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllProcesoExtenderMensual($id_proceso){
		$sql = "select * from ".self::$tablename." where id_proceso=$id_proceso   order by id asc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and pagado=1  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllCajaMostrar($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and pagado=1 and monto>0  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllCajaMostrarFechas($start,$end){
		$sql = "select * from ".self::$tablename." where  date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\" and pagado=1 and monto>0  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllCajaTipoDocumento($id_caja,$id_documento){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and id_tipopago=$id_documento and pagado=1 order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getAllCajaMedioPago($id_caja,$id_pago){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and id_tipopago=$id_pago and pagado=1  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}


	public static function getIngresoRangoFechas($start,$end){
		$sql = "select * from ".self::$tablename." where  date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\" and pagado=1 and monto>0 order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function getIngresoRangoFechasTotal($start,$end){
		$sql = "select * from ".self::$tablename." where  date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\" and pagado=1 and monto>0 and id_tipopago=3 order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}

	public static function GetProceoPagos($id_proceso){
		$sql = "select SUM(monto) as monto_total from ".self::$tablename." where  id_proceso=$id_proceso  GROUP BY id_proceso ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PagoProcesoData());
	}


	

}

?>