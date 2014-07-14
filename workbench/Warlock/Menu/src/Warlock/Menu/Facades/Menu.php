<?php
namespace Warlock\Menu\Facades;

use Illuminate\Support\Facades\Facade;

class Menu extends Facade
{
	/**
	* Get registered name of the component
	*/
	protected static function getFacadeAccessor() 
	{
		return "menu";
	}
}