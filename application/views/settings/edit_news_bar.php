<div class="content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form class="" action="" method="post">

            <div class="form-group">
              <label for="type">نوع الاعلان</label>
              <select class="form-control" name="type" id="type">
                <option value="0" <?php if($news->type == 0) echo "selected";?> >الكل</option>
                <option value="1" <?php if($news->type == 1) echo "selected";?> >عرض</option>
                <option value="2" <?php if($news->type == 2) echo "selected";?> >طلب</option>
                <option value="3" <?php if($news->type == 3) echo "selected";?> >ايجار</option>
              </select>
            </div>

            <div class="form-group">
              <label for="speed">السرعة</label>
              <input type="number" name="speed" class="form-control" id="speed" value="<?=$news->speed?>">
            </div>

            <div class="form-group">
              <label for="direction">الاتجاه</label>
              <select class="form-control" name="direction" id="direction">
                <option value="1" <?php if($news->direction == 1) echo "selected";?>>يمين</option>
                <option value="2" <?php if($news->direction == 2) echo "selected";?>>يسار</option>
              </select>
            </div>

            <div class="form-group">
              <label for="limit_rows">عدد الاعلانات الاقصى</label>
              <input type="number" name="limit_rows" class="form-control" id="limit_rows" value="<?=$news->limit_rows?>">
            </div>

            <div class="form-group">
              <label for="limit_rows">ارتفاع الشريط الاخباري للصفحة المنفصلة</label>
              <input type="number" name="n_height" class="form-control" id="n_height" value="<?=$news->n_height?>">
            </div>

            <div class="form-group">
              <label for="limit_rows">حجم الخط للشريط الاخباري في الصفحة المنفصلة</label>
              <input type="number" name="n_font" class="form-control" id="n_font" value="<?=$news->n_font?>">
            </div>

            <div class="form-group">
              <label for="limit_rows">لون الخط في الصفحة المنفصلة</label>
              <input type="text" name="n_forground" class="jscolor form-control" id="n_forground" value="<?=$news->n_forground?>">
            </div>

            <div class="form-group">
              <label for="limit_rows">لون الخلفية في الصفحة المنفصلة</label>
              <input type="text" name="n_background" class="jscolor  form-control" id="n_background" value="<?=$news->n_background?>">
            </div>

            <div class="form-group">
              <label for="limit_rows">لون كلمة العرض </label>
              <input type="text" name="word_color" class="jscolor  form-control" id="word_color" value="<?=$news->word_color?>">
            </div>

            <button type="submit" class="btn btn-success" name="button">حفظ</button>

          </form>
        </div>
        <div class="col-md-4"></div>

      </div>
    </div>
</div>

<script src="<?=base_url();?>js/jscolor.min.js" charset="utf-8"></script>
