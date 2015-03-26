<?php

namespace app\components;

use Yii;

class Normalizer
{
	public static function executeKeyName($list)
	{
		$normalized = [];
    	foreach ($list as $key => $value) {
    		$normalized[$value['key']] = $value['name'];
    	}
    	return $normalized;
	}

	public static function executeIdName($list)
	{
		$normalized = [];
    	foreach ($list as $key => $value) {
    		$normalized[$value['id']] = $value['name'];
    	}
    	return $normalized;
	}

    public static function __callStatic($name, $arguments)
    {
        
    }
}