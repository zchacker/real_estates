<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form class="form-inline" action="" method="get">


              <div class="form-group col-md-4">
                <label for="type" class="col-form-label">نوع العقار</label>
                <select class="form-control" name="type">
                  <option value="0"></option>
                  <?php
                      foreach ($real_eastes as $value) {
                          echo "<option value='$value->id'>$value->name</option>";
                      }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-4">
                  <input type="tel" class="form-control" name="phone" placeholder="رقم الهاتف">
              </div>

              <button type="submit" class="btn btn-primary mb-2" >بحث</button>

          </form>
        </div>

        <div class="col-md-2">
          <a href="<?=base_url()?>WhatappSender/get_readed_msgs">الرسائل المقروءة</a>
        </div>
      </div>

      <hr/>

      <div class="row">

          <div class="col-md-2">
          </div>

          <div class="col-md-8">

            <?php
              if(strcmp($filter, "ON") == 0 )
                echo '<a href="'.base_url().'WhatappSender/get_all_msgs" style="color:red;">مسح الكل</a>';
            ?>

            <?php echo $this->pagination->create_links();?>
            <div class="content table-responsive table-full-width">
              <table class="med_table table-hover table-responsive">
                <thead class="thead-dark">
                  <th>#</th>
                  <th>اسم العميل</th>
                  <th>رقم الهاتف</th>
                  <th>الرسالة</th>
                  <th>التاريخ</th>
                  <th>إجراء</th>
                </thead>

                <tbody>
                  <?php
                      $page_number = 1;

                      if(strlen($this->uri->segment(3)) == 0 )
                       $page_number = 1;
                      else {
                       $page_number = $this->uri->segment(3);
                      }

                      $count = $page_number;

                      foreach ($msgs as $value) {

                          $url = base_url().'whatappSender/mark_as_read';
                          $add_to_req = base_url()."whatappSender/send_to_req/$value->id/$value->phone";

                          $messgae       = $value->messgae;
                          $char_limit = 30;

                          if(strlen($messgae)< $char_limit)
                            $messgae = '<div> ' . $messgae . '</div>';
                          else
                            $messgae = '<div><span class="short-text">'. substr($messgae , 0 , $char_limit) . '</span><span class="long-text">' . substr($messgae , $char_limit) . '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

                          echo "
                            <tr>
                              <td>$count</td>
                              <td>$value->name</td>
                              <td>$value->phone</td>
                              <td title='$messgae' >$messgae</td>
                              <td>$value->sent_time</td>
                              <td><a href='$url/$value->id' style='color:orange;'> تحديد كمقروءة </a> - <a href='$add_to_req' style='color:blue;'>نقل إلى الطلبات</a></td>
                            </tr>
                          ";

                          $count++;

                      }
                  ?>
                </tbody>

              </table>
            </div>

          </div>

      </div>

    </div>
</div>

<script type="text/javascript">
  // read more
  function readMore(e){
      // If text is shown less, then show complete
      if(e.getAttribute('data-more') == 0) {
        e.setAttribute('data-more', 1);
        e.style.display = 'block';
        e.innerHTML = 'أقل';

        e.previousSibling.style.display = 'none';
        e.previousSibling.previousSibling.style.display = 'inline';
      }
      // If text is shown complete, then show less
      else if(e.getAttribute('data-more') == 1) {
        e.setAttribute('data-more', 0);
        e.style.display = 'inline';
        e.innerHTML = 'المزيد';

        e.previousSibling.style.display = 'inline';
        e.previousSibling.previousSibling.style.display = 'none';
      }
  }
</script>
