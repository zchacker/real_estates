<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-8">
          <?=$msg;?>
          <form class="" action="" method="post">
            <div class="row">
              <div class="form-group col-md-3" id="request_type">
                <label for="" class="control-label"> عرض  </label>
                <input class="jscolor form-control" value="<?=$colors->offer;?>" type="text" name="offer" maxlength="7" size="7">
              </div>

              <div class="form-group col-md-3" id="request_type">
                <label for="" class="control-label"> طلب </label>
                <input class="jscolor form-control" value="<?=$colors->rent;?>" type="text" name="rent" maxlength="7" size="7">
              </div>

              <div class="form-group col-md-3" id="request_type">
                <label for="" class="control-label"> ايجار </label>
                <input class="jscolor form-control" value="<?=$colors->request;?>" type="text" name="request" maxlength="7" size="7">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3" id="request_type">
                <label for="" class="control-label"> لون الخط للعرض  </label>
                <input class="jscolor form-control" value="<?=$colors->offer_b;?>" type="text" name="offer_b" maxlength="7" size="7">
              </div>

              <div class="form-group col-md-3" id="request_type">
                <label for="" class="control-label"> لون الخط للطلب </label>
                <input class="jscolor form-control" value="<?=$colors->rent_b;?>" type="text" name="rent_b" maxlength="7" size="7">
              </div>

              <div class="form-group col-md-3" id="request_type">
                <label for="" class="control-label"> لون الخط للايجار </label>
                <input class="jscolor form-control" value="<?=$colors->request_b;?>" type="text" name="request_b" maxlength="7" size="7">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3" id="request_type">
                <button type="submit" class="btn btn-success" name="button">حفظ</button>
              </div>
            </div>
          </form>


        </div>

        <!-- <input class="jscolor" value="AB0402" type="text" name="color1" maxlength="7" size="7">
        <input class="jscolor" value="AB0402" type="text" name="color2" maxlength="7" size="7">
        <input class="jscolor" value="AB0402" type="text" name="color3" maxlength="7" size="7"> -->

      </div>
      <script src="<?=base_url();?>js/jscolor.min.js" charset="utf-8"></script>

    </div>
</div>
