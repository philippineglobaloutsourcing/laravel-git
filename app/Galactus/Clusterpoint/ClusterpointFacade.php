<?php

namespace App\Galactus\Clusterpoint;

use Illuminate\Support\Facades\Facade;

/**
* 
*/
class ClusterpointFacade extends Facade
{
	
	protected static function getFacadeAccessor() { return Clusterpoint::class; }

}