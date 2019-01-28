<div class="content">
    <div class="container-fluid">
      <div class="row">

        <a href="<?=base_url()?>home/add_real_easte" class="btn btn-primary">أضافة عقار آخر</a>

        <hr/>
        <h2>اقتراحات للعقار المضاف رقم ( <?=$real_id?> )</h2>
        <hr/>

        <?php
          $count = 1;
          foreach ($suggests as $key => $value) {

            $url = base_url()."real_estate?id=$value->id&offer=$real_id";
            echo "<div class='col-md-12'>$count  - رقم : ($value->id) <a href='$url' target='_blank'>$value->type_name في $value->neighborhood_name بسعر $value->price </a> ( $value->customer_phone )</div>";
            $count++;
          }
        ?>
      </div>
    </div>
</div>
