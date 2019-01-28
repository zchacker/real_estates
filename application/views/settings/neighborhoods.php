<div class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="<?=base_url()?>settings/add_neighborhood" class="btn btn-success">أضافة حي جديد</a>
      <div class="col-md-10">
        <table class="table table-bordered table-hover tablesorter">
          <thead>
            <th>#</th>
            <th>اسم العقار</th>
            <th>اجراء</th>
          </thead>
          <tbody>
            <?php
              foreach ($neighborhood as $key => $value) {
                echo "<tr>";
                echo "<td>$value->id</td>";
                echo "<td>$value->name</td>";
                echo "<td><a href='".base_url()."settings/edit_neighborhood/$value->id'>تعديل</a></td>";
                echo "<tr>";

              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
