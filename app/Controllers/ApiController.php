<?php
namespace App\Controllers;

use GuzzleHttp\Client;

class ApiController{
  
  public function connect_api(){
    $client = new Client();
    $res = $client->get('https://hiring.rewardgateway.net/list', [
      'auth' =>  ['hard', 'hard']
    ]);
    $dat=$res->getBody()->getContents();
    return $dat;
  }
}
