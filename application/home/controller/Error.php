<?php
namespace app\home\controller;

class Error
{
    public function index()
    {
        //return 'Error : have no this controller';
		return redirect('index/index');
    }
}
