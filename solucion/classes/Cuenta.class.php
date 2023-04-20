<?php
require_once('db.class.php');
abstract class Cuenta {

    protected $numero_cuenta;
    protected $tipo_cuenta;
    protected $saldo;
    protected $saldo_minimo;
    protected $interes_anual;
    protected $id_cliente;

    public function __construct(){
    }

    abstract public function calcularInteres();





    //METODOS COMUNES A CUENTAS

    /** Realiza el ingreso de dinero en la cuenta
     * @param $dinero el valor a ingresar
     */
    public function ingresar($dinero) {
       return $this->saldo += $dinero;
    }
    
    /** Realiza la retirada de dinero en la cuenta
     * si existe saldo suficiente para ello
     * @param $dinero el valor a retirar
     */
    public function retirar($dinero) {
        if ($dinero <= $this->saldo) {
            $nuevosaldo= $this->saldo -= $dinero;
            return $nuevosaldo;
        } else {
             echo "No hay suficiente saldo en la cuenta";
             return null;
        }
    }

    /** Realiza la actualizacion de Saldo en la base de datos
     * @param $dinero 
     */

    public function actualizarSaldoBBDD($dinero){
        $db = new db();
        try{
            $db = $db->getInstance();
            $sql = "UPDATE cuentas_clientes";
            $sql .=" set ";
            $sql .=" saldo= '".$dinero."'";
            $sql.= " WHERE numero_cuenta=".$this->getNumero_cuenta();
            echo $sql;
            $sth=$db->prepare($sql);
            $sth->execute();
            $db = null;
            return true;
        } catch (Exception $excepcion) {
            return $excepcion;
        }
    } 


    public function carga($numero_cuenta){
        $db = new db();
        try{
            $db = $db->getInstance();
			$sql  = "select * from cuentas_clientes";
			$sql .= " WHERE numero_cuenta=".$numero_cuenta;
            //echo $sql;
            foreach ($db->query($sql) as $row) {
                $this->numero_cuenta = $row['numero_cuenta'];
                $this->tipo_cuenta = $row['tipo_cuenta'];
                $this->saldo = $row['saldo'];
                $this->saldo_minimo = $row['saldo_minimo'];
                $this->interes_anual = $row['interes_anual'];
                $this->id_cliente = $row['id_cliente'];
            }
            $db = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }




    /** Obtiene todas las cuentas de un cliente 
     * @param $id_cliente : el id de cliente
     * @return JSON con los datos de todas las cuenta del cliente.
     */
    public function getJSONTodoCuentas_byIdCliente($id_cliente){
        $db = new db();
		try{
            $db = $db->getInstance();
			$sql="SELECT * FROM cuentas_clientes WHERE id_cliente=".$id_cliente;
			$sth=$db->prepare($sql);
			$sth->execute();
			$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
			$json = "";
			$json .= "{\n";
			$json .= "\"data\": [";
			$c=0;
			while ($c < count($rs)) { 
				if (!($c==0)){$json .=",";}
				$json .= json_encode(($rs[$c]));
			$c++;
			}
			$json .= "]";
			$json .= "}";
			return $json;
			$db=null;
		}catch (Exception $e) {
			
			return false;
		}
	}

    public function setDataFromFormToObject($myPostArgs,$cuenta){
        if (isset($myPostArgs['id_cliente'])){$cuenta->setId_cliente(trim($myPostArgs['id_cliente']));}
        if (isset($myPostArgs['tipo_cuenta'])){$cuenta->setTipo_cuenta(trim($myPostArgs['tipo_cuenta']));}
        if (isset($myPostArgs['numero_cuenta'])){$cuenta->setNumero_cuenta(trim($myPostArgs['numero_cuenta']));}
        if (isset($myPostArgs['saldo_minimo'])){$cuenta->setSaldo_minimo(trim($myPostArgs['saldo_minimo']));}
        if (isset($myPostArgs['saldo'])){$cuenta->setSaldo(trim($myPostArgs['saldo']));}
        if (isset($myPostArgs['interes_anual'])){$cuenta->setInteres_anual(trim($myPostArgs['interes_anual']));}
    }

    public function existNumero_Cuenta($numero_cuenta){
		try {
            $db = new db();
			$db = $db->getInstance();
			$sql="SELECT numero_cuenta FROM cuentas_clientes where numero_cuenta='".$numero_cuenta."'";
			$sth=$db->prepare($sql);
			$sth->execute();
			$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
			switch (count($rs)) {
				case '1': return true; break; //echo "encontrado"
				default: return false; break; //echo "NO encontrado";
			}
			$db=null;
		} catch (Exception $e) {
			return false;
		}
	}

    public function getNumeroTotalCuentasCliente($id_cliente){
        try {
            $db = new db();
			$db = $db->getInstance();
			$sql="SELECT count(numero_cuenta) as total_cuentas_cliente FROM cuentas_clientes where id_cliente='".$id_cliente."'";
			$sth=$db->prepare($sql);
			$sth->execute();
			$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
            $db=null;
            return $rs[0]['total_cuentas_cliente'];
		} catch (Exception $e) {
			return false;
		}

    }

    /**     * Get the value of numero_cuenta     */ 
    public function getNumero_cuenta(){return $this->numero_cuenta;}
    /**     * Get the value of tipo_cuenta     */     
    public function getTipo_cuenta(){return $this->tipo_cuenta;}
    /**     * Get the value of saldo     */     
    public function getSaldo(){return $this->saldo;}
    /**     * Get the value of saldo_minimo     */     
    public function getSaldo_minimo(){return $this->saldo_minimo;}
    /**     * Get the value of interes_anual     */     
    public function getInteres_anual(){return $this->interes_anual;}    
    /**     * Get the value of id_cliente     */     
    public function getId_cliente(){return $this->id_cliente;}

    /**     * Set the value of numero_cuenta     *     * @return  self     */ 
    public function setNumero_cuenta($numero_cuenta){$this->numero_cuenta = $numero_cuenta;return $this;}
    /**     * Set the value of tipo_cuenta     *     * @return  self     */     
    public function setTipo_cuenta($tipo_cuenta){$this->tipo_cuenta = $tipo_cuenta;return $this;}
    /**     * Set the value of saldo     *     * @return  self     */     
    public function setSaldo($saldo){$this->saldo = $saldo;return $this;}
    /**     * Set the value of saldo_minimo     *     * @return  self     */    
    public function setSaldo_minimo($saldo_minimo){$this->saldo_minimo = $saldo_minimo;return $this;}
    /**     * Set the value of interes_anual     *     * @return  self     */     
    public function setInteres_anual($interes_anual){$this->interes_anual = $interes_anual;return $this;}
    /**     * Set the value of id_cliente     *     * @return  self     */     
    public function setId_cliente($id_cliente){$this->id_cliente = $id_cliente;return $this;}


}
?>