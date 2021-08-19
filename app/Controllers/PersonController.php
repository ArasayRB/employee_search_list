<?php
namespace App\Controllers;


use App\Models\Person;
use App\Controllers\ApiController;

class PersonController{
  private $employeer;
  private $data;
  public function index(){
    $employeers_list=new ApiController();
    $bod=$employeers_list->connect_api();
    $this->data=$this->jsonDecode($bod);//json_decode($bod,true);
    require_once  "./public/Views/PrincipalView.php";
  }

  public function jsonDecode(string $data):array{
    $list=json_decode($data,true);
    return $list;
  }
}
