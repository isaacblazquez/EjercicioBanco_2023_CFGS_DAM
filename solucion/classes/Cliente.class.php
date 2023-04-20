<?php
require_once('db.class.php');
class Cliente {

    protected $nombre;
    protected $DNI;
    protected $cuentasCliente=array();

    public function setnombre($valor) {$this->nombre = $valor;  }
    public function setDNI($valor) {$this->DNI = $valor;  }

    public function getnombre() {return $this->nombre;}
	public function getDNI() {return $this->DNI;}

    public function __construct(){
    }

    public function carga($id){
        $db = new db();
        try{
            $db = $db->getInstance();
			$sql  = "select * from clientes";
			$sql .= " where id_cliente= '".$id."'";
            //echo $sql;
            foreach ($db->query($sql) as $row) {
                $this->nombre = $row['nombre_cliente'];
                $this->DNI = $row['DNI_cliente'];
                //$this->cuentasCliente = $this->getArrayCuentasCliente($DNI);
            }
            $db = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertar(){
        $db = new db();
        $insertar = true;
        if(($this->existDNI($this->getDNI()))){
			$insertar=false;
        }

        if($this->getnombre()==""){
            $insertar=false;
        }
        if($this->getDNI()==""){
            $insertar=false;
        }

        if ($insertar){
            try {
                $db = $db->getInstance();
                $sql = "insert into clientes(";
                $sql .= "nombre_cliente";
                $sql .= ",DNI_cliente";
                $sql .=") values (";
                $sql .= "'".$this->getnombre()."'";
                $sql .= ",'".$this->getDNI()."'";
                $sql .=")";
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

    public function setDataFromFormToObject($myPostArgs,$cliente){
        if (isset($myPostArgs['nombre_cliente'])){$cliente->setnombre(trim($myPostArgs['nombre_cliente']));}
        if (isset($myPostArgs['DNI_cliente'])){$cliente->setDNI(trim($myPostArgs['DNI_cliente']));}
    }

    public function existDNI($DNI){
		try {
            $db = new db();
			$db = $db->getInstance();
			$sql="SELECT DNI_cliente FROM clientes where DNI_cliente='".$DNI."'";
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

    public function agregarCuenta(Cuenta $cuenta) {
        if (count($this->cuentas) < 10) {
            $this->cuentas[] = $cuenta;
        } else {
            echo "El cliente ya tiene el máximo de cuentas permitidas.";
        }
    }

    public function getCuentas() {
        return $this->cuentas;
    }

    public function getJSONTodoClientes(){
        $db = new db();
		try{
            $db = $db->getInstance();
			$sql="SELECT * FROM clientes";
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

	public function getOptionsSelectClientes(){
		$json = $this->getJSONTodoClientes();
		$array=json_decode($json,true);
		$option="";
		foreach ($array['data'] as $data){
			$option.='<option value ="'.$data['id_cliente'].'" ';
			$option.='>'.$data['nombre_cliente'].' - '.$data['DNI_cliente'].' </option>';		
		}
		return $option;
	}

}
?>