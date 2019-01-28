<div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <?php echo $this->pagination->create_links();?>
          <div class="content table-responsive table-full-width">
            <table class="table_wrapper">
              <thead class="">
                  <tr>
                    <th>#</th>
                    <th>نوع العملية</th>
                    <th>نوع العقار</th>
                    <th>فئة العقار</th>
                    <th>الحرم</th>
                    <th>المساحة</th>
                    <th>العمر</th>
                    <th>فئة الادوار</th>
                    <th>عدد الادوار</th>
                    <th>فئة الشقق</th>
                    <th>عدد الشقق</th>
                    <th>الحي</th>
                    <th>المخطط</th>
                    <th>الدخل</th>
                    <th>السعر</th>
                    <th>النسبة بالمئة</th>
                    <th>نوع العميل</th>
                    <th>اسم العميل</th>
                    <th>تيلفون العميل</th>
                    <th>تاريخ الاضافة</th>
                    <th>ملاحظات</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  //print_r($estates);
                  foreach ($estates as $key => $value) {

                    $request_type   = '' ;
                    $customer_type  = '' ;
                    $note           = '';

                    if($value->request_type == 1)
                      $request_type = 'عرض' ;

                    if($value->request_type == 2)
                      $request_type = 'طلب' ;

                    if($value->request_type == 3)
                      $request_type = 'إيجار' ;

                    if($value->customer_type == 1)
                      $customer_type = 'زبون مباشر';

                    if($value->customer_type == 2)
                      $customer_type = 'مالك مباشر';

                    if($value->customer_type == 3)
                      $customer_type = 'وكيل';

                    if($value->customer_type == 4)
                      $customer_type = 'وسيط';

                    if($value->customer_type == 5)
                      $customer_type = 'وسيط اول';

                    if($value->customer_type == 6)
                      $customer_type = 'وسيط ثاني';

                    if($value->customer_type == 7)
                      $customer_type = 'وسيط ثالث';

                    if($value->customer_type == 8)
                      $customer_type = 'وسيط رابع';

                    if($value->customer_type == 9)
                      $customer_type = 'وسيط خامس';

                    $note       = $value->note;
                    $char_limit = 30;

                    if(strlen($note)< $char_limit)
                      $note = '<div> ' . $note . '</div>';
                    else
                      $note = '<div><span class="short-text">'. substr($note , 0 , $char_limit) . '</span><span class="long-text">' . substr($note , $char_limit) . '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

                    echo "
                      <tr>
                        <td >$value->id</td>
                        <td >$request_type</td>
                        <td >$value->type_name</td>
                        <td >$value->category</td>
                        <td>$value->yard</td>
                        <td>$value->space</td>
                        <td>$value->age</td>
                        <td>$value->floor_cat</td>
                        <td>$value->number_of_floor</td>
                        <td>$value->apartment_cat</td>
                        <td>$value->apartment_number_store</td>
                        <td>$value->neighborhood_name</td>
                        <td>$value->planned</td>
                        <td>$value->income</td>
                        <td>$value->price</td>
                        <td>$value->percent</td>
                        <td>$customer_type</td>
                        <td>$value->customer_name</td>
                        <td>$value->customer_phone</td>
                        <td>$value->add_time</td>
                        <td>$note</td>
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
