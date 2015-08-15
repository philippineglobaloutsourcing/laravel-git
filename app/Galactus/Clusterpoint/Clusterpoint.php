<?php

namespace App\Galactus\Clusterpoint;

/**
* 
*/
class Clusterpoint extends ClusterpointMethods
{
	use ClusterpointAuthentication;

	public $db_name = "healthapp";
	public $username = "sh4der.xl@gmail.com";
	public $password = "PGOangelhack2015";
	public $account_id = 101101;
	
	function __construct()
	{
		require_once  public_path() . '/clusterpoint/cps_simple.php';

		$this->instantiateConnectionString();
	}

	public function test()
	{
		return "PGO Clusterpoint. Running.";
	}

	/**
	 * Search database
	 * 
	 * query 		array/string 		required
	 * offset 		integer 			no. of data to be skipped
	 * docs 		integer 			no. of data to be fetched
	 * lists 		array 				array of options
	 * ordering 	array 				('string/int', 'column', 'ascending/descending') 	
	 */
	public function search($query, $offset=null, $docs=null, $lists=null, $ordering=null)
	{
		$query = $this->refineQuery($query);
		$ordering = $this->refineOrdering($ordering);

		return $this->cpsSimple->search($query, $offset, $docs, $lists, $ordering);
	}

	/**
	 * Insert single row data
	 *
	 * type 		string 		type of data / name of table	required			
	 * document 	array 		array of data to be inserted 	required
	 */
	public function insertSingle($type, $document)
	{
		$id = $this->generateID();
		$document['type'] = $type;
		// dd($document);

		$this->cpsSimple->insertSingle($id, $document);
	}

	/**
	 * Update single row
	 *
	 * id 			string 		id of data to be edited		  	required
	 * document 	array 		array of data to be updated 	required
	 */
	public function updateSingle($id, $document)
	{
		$this->cpsSimple->updateSingle($id, $document);
	}

	/**
	 * Retrieve data by ID
	 *
	 * id 		id of row to be retrieved 		required
	 */
	public function retrieveSingle($id)
	{
		return $this->cpsSimple->retrieveSingle($id);
	}

	/**
	 * Delete data by ID
	 *
	 * id 		id of data to be deleted 		required
	 */
	public function deleteSingle($id)
	{
		return $this->cpsSimple->delete($id);
	}

}