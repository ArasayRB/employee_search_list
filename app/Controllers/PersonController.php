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
    $this->data=json_decode($bod,true);
    require_once  "./public/Views/PrincipalView.php";
  }

  public function show(){
    $employeers_list=new ApiController();
    $bod=$employeers_list->connect_api();
    $dat=json_decode($bod,true);
    $cant=count($dat);
    echo '<!doctype html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    </head>

    <body>';
    echo '<div class="bg-info">
    <h1 class="text-center text-light text-uppercase h4"><span class="font-weight-bold">Reward</span>| Gateway</h1>
    <h2 class="text-center text-light text-uppercase h6">Employeer List</h2>
    </div>
    <div class="container-fluid mx-2 -my-2 col-8">
      <div class="border">';
      echo '<p>Around '.$cant.' results</p>';
      for ($i=0; $i < $cant; $i++) {
      echo'
          <div class="panel row border mx-2 my-2 rounded">
            <div class="panel-header col-2">
            ';
            $urlparts= parse_url($dat[$i]['avatar']);
            $scheme = $urlparts['scheme'];
            if ($scheme === 'https') {
              echo '<img src="'.$dat[$i]['avatar'].'" class="img-fluid w-50 h-80 mx-auto d-block rounded-circle" alt="Red dot"/>';
            }
            else{
              echo '<img src="public/images/employeer_default.png" class="img-fluid w-50 h-80 mx-auto d-block rounded-circle" alt="Red dot"/>';
            }
            echo '
          </div>
          <div class="panel-body col bg-light">
            <div class="row shadow">'.$dat[$i]['name'].'</div>';
            if($dat[$i]['bio']!=0 &&$dat[$i]['bio']!='')
            {
              echo '<div class="row shadow">'.$dat[$i]['bio'].'</div>';
            }
          echo '</div>
        </div>';
          }
          echo '
          </div>
          </div><!-- jQuery first, then Popper.js, then Bootstrap JS -->
           <script src="public/js/jquery-3.5.0.min.js"></script>
           <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
           <!-- el bundle ya incluye el popper -->';
           echo'</body>

           </html>
          ';
  }
}
