<?php
namespace app\user\controller;
use think\Controller;
class Error extends Controller
{
    public function index()
    {
        $this->redirect('account/index');
    }
}
