<?php
include('Layout/HeaderView.php');
$dat=$this->person;
$cant=count($dat);
echo '<div class="bg-info">
<h1 class="text-center text-light text-uppercase h4"><span class="font-weight-bold">Reward</span>| Gateway</h1>
<h2 class="text-center text-light text-uppercase h6">Employeer List</h2>
</div>
<div class="container-fluid mx-2 -my-2 col-12">
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
      <div class="panel-body col bg-light border border-info">
        <div class="row bg-info">'.$dat[$i]['name'].'</div>';
        if($dat[$i]['bio']!=0 &&$dat[$i]['bio']!='')
        {
          echo '<div class="row shadow">'.$dat[$i]['bio'].'</div>';
        }
      echo '</div>
    </div>';
      }
include('Layout/FooterView.php');
