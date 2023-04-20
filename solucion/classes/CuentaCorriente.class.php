<?php
require_once('db.class.php');
class CuentaCorriente extends Cuenta {
    const TIPO = "corriente";

    public function calcularInteres() {
        if ($this->saldo <= $this->saldo_minimo) {
            $interes = $this->saldo * ($this->interes_anual / 2);
        } else {
            $interes = $this->saldo * ($this->interes_anual * 2);
        }
        return $this->saldo += $interes;
    }

    public function insertar($id_cliente){
        $db = new db();
        $insertar = true;
        if(($this->existNumero_Cuenta($this->getNumero_cuenta()))){
			$insertar=false;
        }
        if($this->getId_cliente()==""){
            $insertar=false;
        }
        if($this->getNumero_cuenta()==""){
            $insertar=false;
        }
        if($this->getSaldo()==""){
            $insertar=false;
        }
        if($this->getInteres_anual()==""){
            $insertar=false;
        }
        if ($insertar){
            try {
                $db = $db->getInstance();
                $sql = "insert into cuentas_clientes(";
                $sql .= "numero_cuenta";
                $sql .= ",tipo_cuenta";
                $sql .= ",saldo";
                $sql .= ",saldo_minimo";
                $sql .= ",interes_anual";
                $sql .= ",id_cliente";
                $sql .=") values (";
                $sql .= "'".$this->getNumero_cuenta()."'";
                $sql .= ",'".$this->getTipo_cuenta()."'";
                $sql .= ",'".$this->getSaldo()."'";
                $sql .= ", NULL";
                $sql .= ",'".$this->getInteres_anual()."'";
                $sql .= ",'".$this->getId_cliente()."'";
                $sql .=")";
                echo $sql;
                $sth=$db->prepare($sql);
				$sth->execute();
                $db = null;
				return true;
            } catch (Exception $e) {
                return false;
            }
        }else{
            return false;
        }
    }


}
?>