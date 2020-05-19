<?php
namespace app\common\model;
use think\Model;

class Image extends Model
{
	
	//table name
	protected $name = 'image';
	
	protected static function init()
    {
		
		self::event('before_write',function(){
			if(!check_database_space_usage()){
				return error(lang('database_space_not_enough'));
			}
		});
		
    }
	
	public function deleteImage($id)
	{
		if(is_array($id)){
			$id = implode(',', $id);
		}
		return $this::destroy($id);
	}
	
}