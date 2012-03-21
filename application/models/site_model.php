<?php 
/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Config $config
 * @property CI_Loader $load
 * @property CI_Session $session
 *
 * Add addtional libraries you wish
 * to use in your models here.
 * 
 */

class Site_model extends CI_Model {

	/**
	  *  function __construct()
	  {
		  parent::__construct();
	  } 
	  */

	function getAll()
	{
		$q = $this->db->get('test');
		if ($q->result() > 0) {
			foreach($q->result() as $row) {
			$data[] = $row;
			}
		}
		
		return $data;
	}

}
