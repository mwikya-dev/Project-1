<?php namespace App\Controllers;
class myHomecontroller extends BaseController
{
  public function index()
  {
        $session = \Config\Services::session();
        $checkUser = $session->get('u_id');
        if ($checkUser) {
            echo 'welcome: ' . $session->get('u_name');
        }
        else{
            echo 'redirect here...';
        }
  }
}