<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
          <form action="" method="post">

            <div class="row">
              <div class="col">
                <label for="">الرابط</label>
                <input type="url" name="section_url" class="form-control" placeholder="رابط القسم">
              </div>
              <div class="col">
                <label for="">الحي</label>
                <select class="form-control" name="neighborhood">
                  <?php
                    foreach ($neighborhood as $key => $value) {
                      echo "<option value='$value->id'>$value->name</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="col">
                <label for="">نوع العقار</label>
                <select class="form-control" name="easte_type">
                  <?php
                    foreach ($type as $key => $value) {
                      // code...
                      echo "<option value='$value->id'>$value->name</option>";
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <br>
                <button type="submit" class="btn btn-success" name="button">اضافة الرابط</button>
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>
</div>
