<?php 
namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------


public function main()
{
	return view('register');
}


public function test()
{
	return view('testing');
}

public function loadAjax()
{

	return view('loadAjax');
}

public function header()
{

	$data["title"]=ucfirst('CodeIgniter');

	return view("header", $data);

}


public function footer()
{

	return view ("footer");
}
}
