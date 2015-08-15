<?php

namespace App\Galactus\Clusterpoint;

/**
* 
*/
class ClusterpointMethods
{
	
	public function instantiateConnectionString()
	{
		// Connection hubs
		$connectionStrings = array(
			'tcp://cloud-us-0.clusterpoint.com:9007',
			'tcp://cloud-us-1.clusterpoint.com:9007',
			'tcp://cloud-us-2.clusterpoint.com:9007',
			'tcp://cloud-us-3.clusterpoint.com:9007'
		);

		// Creating a CPS_Connection instance
		$cpsConn = new \CPS_Connection(
			new \CPS_LoadBalancer($connectionStrings),
			$this->db_name,
			$this->username,
			$this->password,
			'document',
			'//document/id',
			array('account' => $this->account_id)
		);

		// Debug
		//$cpsConn->setDebug(true);
		// Creating a CPS_Simple instance
		$this->cpsSimple = new \CPS_Simple($cpsConn);
	}

	public function refineQuery($query)
	{
		if (is_array($query)) {
			$data = '';
			foreach ($query as $key => $value) {
				if (is_numeric($key)) {
					$data = $data . CPS_Term($value);
				}else {
					$data = $data . CPS_Term($value, $key);
				}
			}
			return $data;
		} else {
			return $query;
		}
	}

	public function refineOrdering($ordering)
	{
		if ($ordering != null) {
			if ($ordering[0] == 'string') {
				return CPS_StringOrdering($ordering[1], 'en', $ordering[2]);
			}else {
				return CPS_NumericOrdering($ordering[1], $ordering[2]);
			}
		} else {
			return CPS_StringOrdering('type', 'en', 'ascending');
		}
	}

	public function generateID()
	{
		$str = 'qwertyuiopasdfghjklzxcvbnm1234567890';

		$id_string = '';
		for ($i=0; $i < 5; $i++) { 
			$id_string .= $str[rand(0, strlen($str) - 1)];
		}

		$id_stamp = time();

		return $id_stamp . $id_string;
	}

}