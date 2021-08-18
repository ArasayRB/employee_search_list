<?php $cant=count($this->$dat);?>
<div class="bg-info">
<h1 class="text-center text-light text-uppercase h4"><span class="font-weight-bold">Reward</span>| Gateway</h1>
<h2 class="text-center text-light text-uppercase h6">Employeer List</h2>
</div>
<div class="container-fluid mx-2 -my-2 col-8">
  <div class="border">
    <p>Around <?php echo $cant; ?> results</p>
    <?php
    for ($i=0; $i < $cant; $i++) {
      ?>
        <div class="panel row border mx-2 my-2 rounded">
          <div class="panel-header col-2">
          <?php
          $urlparts= parse_url($dat[$i]['avatar']);
          $scheme = $urlparts['scheme'];
          if ($scheme === 'https') {
            ?>
            <img src="<?php echo $dat[$i]['avatar']; ?>" class="img-fluid w-50 h-80 mx-auto d-block rounded-circle" alt="Red dot"/>
          <?php
        }
          else{
            ?>
            <img src="public/images/employeer_default.png" class="img-fluid w-50 h-80 mx-auto d-block rounded-circle" alt="Red dot"/>
        <?php
       }
       ?>

        </div>
        <div class="panel-body col bg-light">
          <div class="row shadow"><?php echo $dat[$i]['name']; ?></div>
          <?php
          if($dat[$i]['bio']!=0 &&$dat[$i]['bio']!='')
          {
            ?>
            <div class="row shadow"><?php echo $dat[$i]['bio']; ?></div>
          <?php
        }
        ?>
        </div>
      </div>
      <?php  }
      ?>
