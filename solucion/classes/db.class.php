<?php

class db{
	protected $db_type;
	protected $db_name;
	protected $db_hostname;
	protected $db_username;
	protected $db_password;
	protected $db_port;
	protected $db_prefix;

	/**
	 * Mantiene una instancia de si mismo
	 * @var $instance
	 */
	private static $instance = NULL;

	/**
	*
	* El constructor lo defino como privado para evita
    * que nadie pueda crear una instancia usando new
	*
	*/
	public function __construct() {
		$this->db_type = 'mysql';
		$this->db_name = 'phpbank';
		$this->db_hostname = 'localhost';
		$this->db_username = 'root';
		$this->db_password = '';
		$this->db_port = '3308';
		$this->db_prefix = '';

	}

	/**
	*
	* Devuelve una instancia de DB o crea una conexion inicial
	*
	* @return object (PDO)
	*
	* @access public
	*
	*/
	public function getInstance()
	{
		if (!self::$instance)
		{
			try {
				//$config = config::getInstance();
				$db_type = $this->getDb_type();
				$hostname = $this->getDb_hostname();
				$dbname = $this->getDb_name();
				$db_password = $this->getDb_password();
				$db_username = str_replace('"','',$this->getDb_username());
				$db_port = $this->getDb_port();
	
				self::$instance = new PDO("$db_type:host=$hostname;port=$db_port;dbname=$dbname", $db_username, $db_password);
				self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
				
			} catch (Exception $e) {
			
			}
		}
		return self::$instance;
	}


	/**
	*
	* Like the constructor, we make __clone private
	* so nobody can clone the instance
	*
	*/
	private function __clone()
	{
	}


	/**
	 * Get the value of db_type
	 */ 
	public function getDb_type()
	{
		return $this->db_type;
	}

	/**
	 * Set the value of db_type
	 *
	 * @return  self
	 */ 
	public function setDb_type($db_type)
	{
		$this->db_type = $db_type;

		return $this;
	}

	/**
	 * Get the value of db_name
	 */ 
	public function getDb_name()
	{
		return $this->db_name;
	}

	/**
	 * Set the value of db_name
	 *
	 * @return  self
	 */ 
	public function setDb_name($db_name)
	{
		$this->db_name = $db_name;

		return $this;
	}

	/**
	 * Get the value of db_hostname
	 */ 
	public function getDb_hostname()
	{
		return $this->db_hostname;
	}

	/**
	 * Set the value of db_hostname
	 *
	 * @return  self
	 */ 
	public function setDb_hostname($db_hostname)
	{
		$this->db_hostname = $db_hostname;

		return $this;
	}

	/**
	 * Get the value of db_username
	 */ 
	public function getDb_username()
	{
		return $this->db_username;
	}

	/**
	 * Set the value of db_username
	 *
	 * @return  self
	 */ 
	public function setDb_username($db_username)
	{
		$this->db_username = $db_username;

		return $this;
	}

	/**
	 * Get the value of db_password
	 */ 
	public function getDb_password()
	{
		return $this->db_password;
	}

	/**
	 * Set the value of db_password
	 *
	 * @return  self
	 */ 
	public function setDb_password($db_password)
	{
		$this->db_password = $db_password;

		return $this;
	}

	/**
	 * Get the value of db_port
	 */ 
	public function getDb_port()
	{
		return $this->db_port;
	}

	/**
	 * Set the value of db_port
	 *
	 * @return  self
	 */ 
	public function setDb_port($db_port)
	{
		$this->db_port = $db_port;

		return $this;
	}

	/**
	 * Get the value of db_prefix
	 */ 
	public function getDb_prefix()
	{
		return $this->db_prefix;
	}

	/**
	 * Set the value of db_prefix
	 *
	 * @return  self
	 */ 
	public function setDb_prefix($db_prefix)
	{
		$this->db_prefix = $db_prefix;

		return $this;
	}
} // end of class
