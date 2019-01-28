<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">

          <div class="add_button">
            <a href="<?=base_url()?>scrapping/add_section" class='btn btn-success' >إضافة قسم كامل</a>
          </div>

          <hr>
          <div class="links">
            <?php echo $this->pagination->create_links();?>
          </div>
          <div class="content table-responsive table-full-width">
            <table class="med_table table-bordered table-hover tablesorter table-sm">
              <thead class="thead-dark" >
                <tr>
                  <th>#</th>
                  <th>رابط القسم</th>
                  <th>الحي</th>
                  <th>نوع العقار</th>
                  <th>حالة الجلب</th>
                  <th>اجراء</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  foreach ($sections as $key => $value) {
                    $url = urldecode($value->section_url);

                    $progress = "جاري المعالجة";

                    if($value->done == 1){
                      $progress = "تمت المعالجة";
                    }

                    $delete_url = base_url().'scrapping/delete_section/'.$value->id;

                    echo "
                    <tr>
                      <td>$value->id</td>
                      <td><a href='$value->section_url' target='_blank'  >$url</a></td>
                      <td>$value->neighborhoodName</td>
                      <td>$value->type</td>
                      <td>$progress</td>
                      <td><a href='$delete_url'>حذف</a></td>
                    </tr>
                    ";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
</div>
