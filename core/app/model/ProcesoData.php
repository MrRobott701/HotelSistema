<?php
class ProcesoData {
	public static $tablename = "proceso";


	public function ProcesoData(){
		$this->dinero_dejado = ""; 
		$this->fecha_entrada = "";
		$this->fecha_salida = "";
		$this->cant_personas = "";
		 
		$this->fecha_creada = "NOW()";
	} 

	public function getHabitacion(){ return HabitacionData::getById($this->id_habitacion);}
	public function getTarifaHabitacion(){ return TarifaHabitacionData::getById($this->id_tarifa);}
	public function getTarifa(){ return TarifaData::getById($this->id_tarifa);}
	public function getCliente(){ return PersonaData::getById($this->id_cliente);}
	public function getUsuario(){ return UserData::getById($this->id_usuario);}
	public function getComprobante(){ return TipoComprobanteData::getById($this->comprobante);}
	public function getTipoPago(){ return TipoPagoData::getById($this->id_tipo_pago);}
	public function getLimpieza(){ return UserData::getById($this->id_limpieza);}

	public function addIngreso(){
		$sql = "insert into proceso (id_habitacion,id_tarifa,id_cliente,precio,cant_noche,dinero_dejado,id_tipo_pago,fecha_entrada,fecha_salida,id_usuario,cant_personas,id_caja,fecha_creada,cantidad,pagado,extra,tarjeta_e,observacion,nro_operacion,nro_folio,comprobante,credito,id_comisionista,tipo_servicio,pasajero) ";
		$sql .= "value ($this->id_habitacion,$this->id_tarifa,\"$this->id_cliente\",\"$this->precio\",\"$this->cant_noche\",\"$this->dinero_dejado\",$this->id_tipo_pago,\"$this->fecha_entrada\",\"$this->fecha_salida\",$this->id_usuario,\"$this->cant_personas\",\"$this->id_caja\",$this->fecha_creada,$this->cantidad,$this->pagado,\"$this->extra\",\"$this->tarjeta_e\",\"$this->observacion\",\"$this->nro_operacion\",\"$this->nro_folio\",\"$this->comprobante\",1,$this->id_comisionista,$this->tipo_servicio,\"$this->pasajero\")";
		return Executor::doit($sql);
	}

	public function addIngresoMensual(){
		$sql = "insert into proceso (id_habitacion,id_tarifa,id_cliente,precio,cant_noche,dinero_dejado,id_tipo_pago,fecha_entrada,fecha_salida,id_usuario,cant_personas,id_caja,fecha_creada,cantidad,pagado,extra,tarjeta_e,observacion,nro_folio,comprobante,credito,id_comisionista,tipo_servicio,mensual) ";
		$sql .= "value ($this->id_habitacion,$this->id_tarifa,\"$this->id_cliente\",\"$this->precio\",\"$this->cant_noche\",\"$this->dinero_dejado\",$this->id_tipo_pago,\"$this->fecha_entrada\",\"$this->fecha_salida\",$this->id_usuario,\"$this->cant_personas\",\"$this->id_caja\",$this->fecha_creada,$this->cantidad,$this->pagado,\"$this->extra\",\"$this->tarjeta_e\",\"$this->observacion\",\"$this->nro_folio\",\"$this->comprobante\",1,$this->id_comisionista,$this->tipo_servicio,1)";
		return Executor::doit($sql);
	}

	public function addIngresoRe(){
		$sql = "insert into proceso (id_habitacion,id_tarifa,id_cliente,precio,cant_noche,dinero_dejado,id_tipo_pago,fecha_entrada,fecha_salida,id_usuario,cant_personas,id_caja,fecha_creada,cantidad,pagado,extra,tarjeta_e,observacion,nro_folio,comprobante,credito,reserva) ";
		$sql .= "value ($this->id_habitacion,$this->id_tarifa,\"$this->id_cliente\",\"$this->precio\",\"$this->cant_noche\",\"$this->dinero_dejado\",$this->id_tipo_pago,\"$this->fecha_entrada\",\"$this->fecha_salida\",$this->id_usuario,\"$this->cant_personas\",\"$this->id_caja\",\"$this->fecha_creada\",$this->cantidad,$this->pagado,\"$this->extra\",\"$this->tarjeta_e\",\"$this->observacion\",\"$this->nro_folio\",\"$this->comprobante\",1,1)";
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

// partiendo de que ya tenemos creado un objecto PersonaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",descripcion=\"$this->descripcion\",id_categoria=$this->id_categoria where id=$this->id";
		Executor::doit($sql);
	}

	public function updateHabitacionTarifa(){
		$sql = "update ".self::$tablename." set id_habitacion=$this->id_habitacion,id_tarifa=$this->id_tarifa,precio=\"$this->precio\"  where id=$this->id";
		Executor::doit($sql);
	} 

	public function updateSalida(){
		$sql = "update ".self::$tablename." set total=\"$this->total\",id_tipo_pago=$this->id_tipo_pago,estado=1,pagado=1,extra=\"$this->extra\",descuento=\"$this->descuento\",finalizado_por=\"$this->finalizado_por\"  where id=$this->id";
		Executor::doit($sql);
	}

	public function updateSalidaHora(){
		$sql = "update ".self::$tablename." set fecha_salida=\"$this->fecha_salida\"  where id=$this->id";
		Executor::doit($sql);
	}


	public function updateEstadao(){
		$sql = "update ".self::$tablename." set estado=\"$this->estado\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateLimpieza(){
		$sql = "update ".self::$tablename." set id_limpieza=\"$this->id_limpieza\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateTotalDeuda(){
		$sql = "update ".self::$tablename." set total_v=\"$this->total_v\",deuda=\"$this->deuda\" where id=$this->id";
		Executor::doit($sql);
	}


	public function updateEstadiaa(){
		$sql = "update ".self::$tablename." set fecha_salida=\"$this->fecha_salida\",cant_noche=\"$this->cant_noche\"  where id=$this->id";
		Executor::doit($sql);
	}

	public function updateEstacionamiento(){
		$sql = "update ".self::$tablename." set tarjeta_e=\"$this->tarjeta_e\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateCredito(){
		$sql = "update ".self::$tablename." set credito=\"$this->credito\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateFechaSalida(){
		$sql = "update ".self::$tablename." set fecha_salida=\"$this->fecha_salida\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateVoucher(){
		$sql = "update ".self::$tablename." set nro_folio=\"$this->nro_folio\",comprobante=\"$this->comprobante\" where id=$this->id";
		Executor::doit($sql);
	}
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoData());

	}

	public static function getByRecepcion($id){
		$sql = "select * from ".self::$tablename." where id_habitacion=$id and estado=0";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoData());

	} 

	public static function getByComisionista($id,$start,$end){
		$sql = "select * from ".self::$tablename." where id_comisionista=$id and  date(fecha_entrada) >= \"$start\" and date(fecha_entrada) <= \"$end\" ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function getByRecepcionReserva($id,$hoy){
		$sql = "select * from ".self::$tablename." where id_habitacion=$id and (estado=3 or estado=4) and (\"$hoy\" >= date(fecha_entrada)  and \"$hoy\" < date(fecha_salida) )";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoData());

	}

	public static function getByRecepcionReservaTodas($hoy){
		$sql = "select * from ".self::$tablename." where (estado=3 or estado=4) and (\"$hoy\" >= date(fecha_entrada)  and \"$hoy\" < date(fecha_salida) )";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id_habitacion like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function getProceso(){
		$sql = "select * from ".self::$tablename." where estado=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 

	public static function getAllMensual(){
		$sql = "select * from ".self::$tablename." where mensual=1 and estado=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 


	public static function getUltimoProcess($id){
		$sql = "select * from ".self::$tablename." where comprobante=$id order by id desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}


	public static function getProcesoReserva(){
		$sql = "select * from ".self::$tablename." where reserva=1 order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 




	public static function getProcesoReservaReporte($fecha){
		$sql = "select * from ".self::$tablename." where reserva=1 and (date(fecha_creada) = \"$fecha\") ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 

	public static function getProcesoReservaReporteConfirmado($fecha){
		$sql = "select * from ".self::$tablename." where (estado=1 or estado=0) and reserva=1 and (date(fecha_creada) = \"$fecha\") ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 

	public static function getProcesoCredito(){
		$sql = "select * from ".self::$tablename." where id_tipo_pago=4 order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 
	

	public static function getProcesoHabitacion($id_habitacion){
		$sql = "select * from ".self::$tablename." where id_habitacion=$id_habitacion";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 

	public static function getProcesoCliente($q){
		$sql = "select * from ".self::$tablename." where estado=0 and id_cliente=$q ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData()); 

	}

	public static function getReporteDiario($hoy){
		$sql = "select * from ".self::$tablename." where (date(fecha_entrada) = \"$hoy\" or date(fecha_salida) = \"$hoy\") and pagado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function getReporteDiarioUser($hoy,$user){
		$sql = "select * from ".self::$tablename." where (date(fecha_entrada) = \"$hoy\" or date(fecha_salida) = \"$hoy\") and id_usuario=$user and pagado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function getIngresoCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and pagado=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	public static function getIngresoRangoFechasGrafica($hoy){
		$sql = "select * from ".self::$tablename." where \"$hoy\" >= date(fecha_entrada)  and \"$hoy\" <= date(fecha_salida) and pagado=1 and estado!=5 order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}


	public static function getIngresoRangoFechas($start,$end){
		$sql = "select * from ".self::$tablename." where  date(fecha_entrada) >= \"$start\" and date(fecha_entrada) <= \"$end\" and pagado=1 and estado!=5 order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	public static function getIngresoRangoFechasHoras($idh,$start,$end){
		$sql = "select * from ".self::$tablename." where estado!=5 and id_habitacion=$idh and ( ( \"$start\" BETWEEN fecha_entrada AND fecha_salida ) or ( \"$end\" BETWEEN fecha_entrada AND fecha_salida) )";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	public static function getHabConfirm($idh, $start, $end,$id_p){
		$sql = "select * from ".self::$tablename." where estado!=5 and estado!=1 and id != $id_p and id_habitacion=$idh and ( ( \"$start\" BETWEEN fecha_entrada AND fecha_salida ) or ( \"$end\" BETWEEN fecha_entrada AND fecha_salida) )";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}
	
	public static function getHabConfirm3($idh, $start, $end){
		$sql = "select * from ".self::$tablename." where estado!=5 and estado!=1 and id_habitacion=$idh and ( ( \"$start\" BETWEEN fecha_entrada AND fecha_salida ) or ( \"$end\" BETWEEN fecha_entrada AND fecha_salida) )";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	public static function getHabConfirm2($idh, $start, $end){
		$sql = "select * from ".self::$tablename." where estado!=5 and estado!=1 and estado!=0 and id_habitacion=$idh and ( ( \"$start\" BETWEEN fecha_entrada AND fecha_salida ) or ( \"$end\" BETWEEN fecha_entrada AND fecha_salida) )";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	public static function getByIdHab($id_habitacion){
		$sql = "SELECT COUNT(*) AS num_reservas FROM ".self::$tablename." WHERE id_habitacion = $id_habitacion AND estado = 0";
		$query = Executor::doit($sql);
		return Model::one($query[0], new ProcesoData());
	}
	
	

public static function getIngresoRangoFechasCheckin($start,$end){
		$sql = "select * from ".self::$tablename." where  date(fecha_entrada) >= \"$start\" and date(fecha_entrada) <= \"$end\" and pagado=1 and estado=0 order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}

	public static function getIngresoRangoFechasCheckout($start,$end){
		$sql = "select * from ".self::$tablename." where  date(fecha_entrada) >= \"$start\" and date(fecha_entrada) <= \"$end\" and pagado=1 and estado=1 order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}


	public static function getResidentesRangoFechas($start,$end){
		$sql = "select * from ".self::$tablename." where  date(fecha_entrada) >= \"$start\" and date(fecha_entrada) <= \"$end\" and pagado=1 and mensual=1 order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}
	
	public static function getIngresoRangoFechasUser($start,$end,$id_usuario){
		$sql = "select * from ".self::$tablename." where  date(fecha_entrada) >= \"$start\" and date(fecha_entrada) <= \"$end\" and pagado=1 and id_usuario=$id_usuario order by id desc  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());
	}


	

	public static function getReporteMensualUser($anio,$mes,$user){
		$sql = "select * from ".self::$tablename." where ( year(fecha_entrada) = $anio or year(fecha_salida) = $anio) and (month(fecha_entrada) = $mes or month(fecha_salida) = $mes) and id_usuario=$user ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function getReporteMensual($anio,$mes){
		$sql = "select * from ".self::$tablename." where ( year(fecha_entrada) = $anio or year(fecha_salida) = $anio) and (month(fecha_entrada) = $mes or month(fecha_salida) = $mes)  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function getReporteMensual11($dia,$mes){
		$sql = "select * from ".self::$tablename." where day(fecha_entrada) = \"$dia\"  and month(fecha_entrada) = \"$mes\" ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	}

	public static function getProcesoDeudor(){
		$sql = "select * from ".self::$tablename." where estado!=5 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoData());

	} 

	



} 

?>