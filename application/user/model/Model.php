<?php
namespace app\user\model;
use think\Model as BaseModel;

class Model extends BaseModel
{
	
    protected static function init()
    {
		self::event('before_write',function(){
			if(!check_database_space_usage()){
				return error(lang('database_space_not_enough'));
			}
		});
		
    }
	
}