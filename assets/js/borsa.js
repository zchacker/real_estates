var base_url = document.getElementById('base_url').value;
var see_aqar = document.getElementById('see_aqar').value;
var phone_url_json = document.getElementById('phone_url_json').value;

function initMap() {
  var map;
  var bounds = new google.maps.LatLngBounds();
  var myStyles =[
      {
          featureType: "poi",
          elementType: "labels",
          stylers: [
                { visibility: "off" }
          ]
      }
  ];
  var mapOptions = {
      mapTypeId: 'roadmap' //'satellite'
  };

  // Display a map on the web page
  map = new google.maps.Map(document.getElementById("map"), mapOptions , myStyles);
  map.setTilt(50);

  // Add multiple markers to map
  var infoWindow  = new google.maps.InfoWindow(), marker, i;
  var api         = base_url + "index.php/home/mapJson";
  var count = 0;

  $.getJSON( api , function( data ) {
      $.each( data, function( key, val ) {

          if(val.y == 0 && val.x == 0)
            return;

          count++;
          var request_type = "عرض";

          if(val.request_type == 1)
            request_type = "عرض";
          else if(val.request_type == 2)
            request_type = "طلب";
          else if(val.request_type == 3)
            request_type = "إيجار";

          var infoWindowContent;
          var test = '';
          var img_base = base_url + "img/";

          $.get( base_url + "index.php/home/get_real_easte_type/" + val.type , function( data ) {
              var real_easte_typee = data;
              test = "hello";

              infoWindowContent =
              '<div id="iw-container" style="width: 250px;">' +
                '<div class="iw-title"><a href ="'+ base_url +'real_estate?id='+ val.id +'" target="_blank">#' + val.id + '# ' + request_type + ' ' + real_easte_typee + '</a></div>' +
                '<div class="iw-content">'+
                  '<span class="span_line">نوع العقار : ' + real_easte_typee + '</span>' +
                  '<span class="span_line">فئة العقار : '+  val.category +'</span>'+
                  '<span class="span_line">المساحة : ' + val.space + '</span>'+
                  '<div id="more_info" style="display:none;">'+
                    '<span class="span_line">المخطط : ' + val.planned + '</span>' +
                    '<strong>السعر: <span style="color:red;">' + val.price + '</span></strong>' +
                    '</hr>'+
                    '<p> ملاحظات : '+ val.note +'</p>'+
                  '</div>'+
                  '<a href="#" id="more" onClick="divFunction()" >المزيد...</a>' +
                  '<div class="whatsapp_box">'+
                    '<a href="#" onClick="sendWhatsapp(' + val.id + ' );" ><img src="' + img_base + 'whatsapp-logo.png" ></a>'+
                  '</div>'+
                '</div>'+
                '<div class="iw-bottom-gradient"></div>'+
              '</div>';

          } , 'html' );



          // Add marker to map
          var position = new google.maps.LatLng( val.y , val.x );
          var icon_base = base_url + "img/";
          var icon = '';

          if(val.type == 1 ){
              icon = icon_base + 'land.png';
          }else if(val.type == 2 && val.category == 'تجاري'){
              icon = icon_base + 'building2.png';
          }else if(val.type == 2 && val.category == 'سكني'){
              icon = icon_base + 'building.png';
          }else if(val.type == 3){
              icon = icon_base + 'hotel.png';
          }else if(val.type == 4){
              icon = icon_base + 'villa.png';
          }else if(val.type == 5){
              icon = icon_base + 'villa_bulding.png';
          }else if(val.type == 6){
              icon = icon_base + 'home.png';
          }else if(val.type == 7){
              icon = icon_base + 'resort.png';
          }else if(val.type == 8){
              icon = icon_base + 'apartment.png';
          }else if(val.type == 9){
              icon = icon_base + 'apartment2.png';
          }else if(val.type == 10){
              icon = icon_base + 'apartment3.png';
          }else if(val.type == 11){
              icon = icon_base + 'exhibition2.png';
          }else if(val.type == 12){
              icon = icon_base + 'farm.png';
          }else if(val.type == 13){
              icon = icon_base + 'factory.png';
          }else if(val.type == 14){
              icon = icon_base + 'station.png';
          }else if(val.type == 15){
              icon = icon_base + 'land-marker.png';
          }

          else {
            icon = icon_base + 'pin.png';
          }

          bounds.extend(position);
          marker = new google.maps.Marker({
              position: position,
              map: map,
              icon : icon
              //title: markers[i][0]
          });

          // Add info window to marker
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                  infoWindow.setContent(infoWindowContent);
                  infoWindow.setOptions({maxWidth:750});
                  infoWindow.open(map, marker);
              }
          })(marker, i));

          // Center the map to fit all markers on the screen
          map.fitBounds(bounds);

      });
  });


  // Set zoom level
  var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
      this.setZoom(14);
      google.maps.event.removeListener(boundsListener);
  });

}

// Load initialize function
//google.maps.event.addDomListener(window, 'load', initMap);
function divFunction(){

     var more_info_box = document.getElementById("more_info");
     var more_info_btn = document.getElementById("more");

     more_info_btn.style.display = "none";
     more_info_box.style.display = "block";
}

$(".hide_map").click(function(){

    $("#map").toggle('slow');
    $(".def").toggle('slow');

    var hide = 'إخفاء الخريطة';
    var show = 'إظهار الخريطة';

    if( $(".hide_map").html() == hide ){
        $(".hide_map").html(show);
    } else {
        $(".hide_map").html(hide);
    }

});

$('#hide_filters').click(function(){
    $('.filters').toggle('slow');
    var hide = 'اخفاء الفلاتر';
    var show = 'اظهار الفلاتر';
    if( $("#hide_filters").html() == hide ){
        $("#hide_filters").html(show);
    } else {
        $("#hide_filters").html(hide);
    }
});

$('#filters_btn').click(function(){
    $('.filters').toggle('slow');
    var hide = 'اخفاء الفلاتر';
    var show = 'اظهار الفلاتر';
    if( $("#filters_btn").html() == hide ){
        $("#filters_btn").html(show);
    } else {
        $("#filters_btn").html(hide);
    }
});

$('#advanced_filters_btn').click(function(){
    $('.advanced_filters').toggle('slow');
    var hide = 'اخفاء فلاتر متقدمة';
    var show = 'اظهار فلاتر متقدمة';
    if( $("#advanced_filters_btn").html() == hide ){
        $("#advanced_filters_btn").html(show);
    } else {
        $("#advanced_filters_btn").html(hide);
    }
});

$('.advanced_filters_btn').click(function(){
  $('.advanced_filters').toggle('slow');
  var hide = 'اخفاء فلاتر متقدمة';
  var show = 'اظهار فلاتر متقدمة';
  if( $(this).html() == hide ){
      $(this).html(show);
  } else {
      $(this).html(hide);
  }
});

$("#delete_all").click(function(){

  $('.selected').each(function (e) {
       // reference all the stuff you need first
       var id         = $(this).find('input[name*="selected"]').val();
       var rowIndex   = parseInt( $(this).index() );
       delete_real_easte(id ,( rowIndex + 1 ) );
   });

   // load more rows after delete
   var per_apge = document.getElementById('per_page');
   window.setTimeout( load_more_rows_table(per_apge) , 20000 ); // 5 seconds
   $('#check_all').prop('checked', false);
   $("#delete_all").hide(300);

});

$(document).ready(function(){

    $(".filter_forms").submit(function(e){
        e.preventDefault();
    });

    //$("#phone_box").autocomplete({ source: phone_url_json });
    //$("#phone_box").click(function(){})

    var current_page      = parseInt( $("#current_page").val() );
    var total_rows        = $("#total_rows").val();
    var per_page          = $("#per_page").val();


    if(per_page == 0)
      per_page = 20;
    var offset            = ( current_page - 1) * per_page;

    var real_easte_data   = base_url + "index.php/home/all_real_easte_json/" + offset + "/" + per_page;
    var real_easte_typee ;
    var x = 0;

    $("#offset").val(offset);

    $.getJSON(real_easte_data , function(data){


      var real_data = '';
      var scroll_bar = '';

      $.each(data,function(key , value){

        // if(see_aqar == 0){
        //   if(value.add_by_aqar == 1){
        //     return;
        //   }
        // }

        var row_class = "row1";
        if(value.request_type == 1)
          row_class = "row1";
        else if(value.request_type == 2)
          row_class ="row2";
        else if(value.request_type == 3)
          row_class ="row3";


        var request_type = "عرض";
        if(value.request_type == 1)
          request_type = "عرض";
        else if(value.request_type == 2)
          request_type = "طلب";
        else if(value.request_type == 3)
          request_type = "إيجار";

        var customer_type = "";

        if(value.customer_type == 1)
            customer_type = "زبون مباشر";
        else if(value.customer_type == 2)
            customer_type = "مالك مباشر";
        else if(value.customer_type == 3)
            customer_type = "وكيل";
        else if(value.customer_type == 4)
            customer_type = "وسيط";
        else if(value.customer_type == 5)
            customer_type = "وسيط أول";
        else if(value.customer_type == 6)
            customer_type = "وسيط ثاني";
        else if(value.customer_type == 7)
            customer_type = "وسيط ثالث";
        else if(value.customer_type == 8)
            customer_type = "وسيط رابع";
        else if(value.customer_type == 9)
            customer_type = "وسيط خامس";

        var note = value.note;
        var neighborhood  = value.neighborhood_name;
        var planned = value.planned;
        var char_limit = 25;

        if(note.length < char_limit)
          note = '<div> ' + note + '</div>';
        else
          note = '<div><span class="short-text">' + note.substr(0, char_limit) + '</span><span class="long-text">' + note.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

        if(neighborhood.length < char_limit)
          neighborhood = '<div> ' + neighborhood + '</div>';
        else
          neighborhood = '<div><span class="short-text">' + neighborhood.substr(0, char_limit) + '</span><span class="long-text">' + neighborhood.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

        if(planned.length < char_limit)
          planned = '<div> ' + planned + '</div>';
        else
          planned = '<div><span class="short-text">' + planned.substr(0, char_limit) + '</span><span class="long-text">' + planned.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

        var star = "";
        if(value.add_by_aqar == 1)
          star = "* ";

        //note = truncate.apply(note, [70, true]);
        //console.log(showGetResult(value.type))
        real_data += '<tr class='+row_class+'>';
        real_data += '<td  class=" select_checkbox"><input type="checkbox" onchange="selectRow(this)" name="selected" value="'+ value.id  +'"/></td>';
        real_data += '<td class="" title="('+value.id+'), بواسطة : '+value.by_user+'">'+ star +'<a target="_blank" href="'+ base_url +'real_estate?id='+ value.id +'">'+ request_type +'</a></td>';
        real_data += '<td class="">'+ value.type_name  + '</td>';
        real_data += '<td class="">'+ value.category + '</td>';
        real_data += '<td class="">'+ value.yard + '</td>';
        real_data += '<td class="">'+ value.space + '</td>';
        real_data += '<td class="">'+ value.age +'</td>';
        real_data += '<td class="">'+ value.floor_cat +'</td>';
        real_data += '<td class="">'+ value.number_of_floor +'</td>';
        real_data += '<td class="">'+ value.apartment_cat +'</td>';
        real_data += '<td class="">'+ value.apartment_number_store +'</td>';
        real_data += '<td title="'+value.neighborhood_name+'" class="">'+ neighborhood +'</td>';
        real_data += '<td title="'+value.planned+'" class="">'+ planned +'</td>';
        real_data += '<td class="">'+ value.income +'</td>';
        real_data += '<td class="">'+ value.price +'</td>';
        real_data += '<td class="">'+ value.percent +'</td>';
        real_data += '<td class="">'+ customer_type +'</td>';
        if(document.getElementById('show_phones').value == 1){
          real_data += '<td class="">'+ value.customer_name +'</td>';
          real_data += '<td class="">'+ value.customer_phone +'</td>';
        }
        real_data += '<td class="">'+ value.add_time +'</td>';
        real_data += '<td title="' + value.note + '" class="">'+ note +'</td>';

        scroll_bar += '<a target="_blank"  href="'+ base_url +'real_estate?id='+ value.id +'"><span style="color:red">'+ request_type +'</span> المخطط : '+ value.planned +'  السعر : ' + value.price + ' تفاصيل '+value.note+' </a> -- ';

      });

      $("#table_body").empty();
      $("#table_body").append(real_data);
      $("#news_bar").show(300);
      $("#news_bar").append(scroll_bar.trim());


      // this section for pagination
      var pagination_links  = "";
      var total_pages       = total_rows / per_page;
      total_pages           = Math.ceil(total_pages);

      pagination_links = "<div class='pagging text-center'>";
      pagination_links += "<nav>";
      pagination_links += "<ul class='pagination pagination-smd'>";

      if(current_page != 1){
          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( 1 )'  >الاولى</a>";
          pagination_links += "</li>";
          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page - 1) + " )'>  << </a>";
          pagination_links += "</li>";
      }


      for( var x = current_page ; x <= (current_page + 2)  && x <= total_pages ; x++ ){
        if(x == current_page) {
            pagination_links += "<li class='page-item active'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x + ")'  >" + x + "<span class='sr-only'>(current)</span></a>";
            pagination_links += "</li>";
        } else {
            pagination_links += "<li class='page-item'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x +")'  >" + x + "</a>";
            pagination_links += "</li>";
        }
      }

      if(current_page < total_pages){
          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page + 1) + " )'>  >> </a>";
          pagination_links += "</li>";
          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ total_pages +")'  >الأخيرة</a>";
          pagination_links += "</li>";
      }
      pagination_links += "</ul>";
      pagination_links += "</nav>";
      pagination_links += "</div>";

      $(".pagination_list").append(pagination_links);
      //$('#data_table').tablesorter( { headers: { 0: { sorter: false} } } );

      $('tr').click(function(e) {
        var rowIndex  = $(this).index();
        $(this).toggleClass('selected');
      });

      // Trigger action when the contexmenu is about to be shown
      $('tr').bind("contextmenu", function (event) {

          var rowIndex  = parseInt( $(this).index() );
          //$(this).toggleClass('selected');

          // Avoid the real one
          event.preventDefault();

          // Show contextmenu
          $(".custom-menu").finish().toggle(100).

          // In the right position (the mouse)
          css({
              top: event.pageY + "px",
              left: event.pageX + "px"
          });

          var ad_id = $('tr:eq(' + (rowIndex + 1) + ') td:eq(0)').children().val();
          $(".custom-menu li").attr("data-id" , ad_id);
          $(".custom-menu li").attr("row-index" , (rowIndex + 1));

      });

      // If the document is clicked somewhere
      $(document).bind("mousedown", function (e) {

          // If the clicked element is not the menu
          if (!$(e.target).parents(".custom-menu").length > 0) {
              // Hide it
              $(".custom-menu").hide(100);
          }

      });

      // If the menu element is clicked
      $(".custom-menu li").click( function() {

        var id = $(this).attr("data-id");
        var row_index = $(this).attr("row-index");

        // This is the triggered action name
        switch($(this).attr("data-action")) {

            // A case for each action. Your actions here
            case "eidt": edit_popup(id); break;
            case "del": delete_real_easte(id , row_index); break;
            case "whats": sendWhatsapp(id); break;
            case "copy" : getSelectedRows(); break;
            case "copy_phone" : copy_phone(); break;
            case "tweet" : sendTweet(id); break;
        }

        // Hide it AFTER the action was triggered
        $(".custom-menu").hide(100);

      });

  });

});

// delete real easte from databse
function delete_real_easte(id , row_index){

  var api = base_url + "index.php/home/delete_easte/" + id;
  $.get( api , function( data ) {

    // alert( "Load was performed." );
    // delete notifcation

  });
  var index = parseInt(row_index);
  $("tr").eq(index).remove();
}

// this to load page from links
function load_table(current_page) {

  var current_page      = parseInt( current_page );
  var per_page          = $("#per_page").val();

  if(per_page == 0)
    per_page = 20;
  var offset            = ( current_page - 1) * per_page;

  $("#current_page").val(current_page);

  var filters = "";
  var order   = "";

  var request_type  = document.getElementById("request_type")
  var category      = document.getElementById("category")
  var type          = document.getElementById("real_type")
  var floor_cat     = document.getElementById("floor_cat")
  var apartment_cat = document.getElementById("apartment_cat")
  var neighborhood  = document.getElementById("neighborhood")
  var income        = document.getElementById("income")
  var customer_type = document.getElementById("customer_type")
  var search_box    = document.getElementById("search_box");
  var phone_box     = document.getElementById("phone_box");
  var added_by      = document.getElementById("added_by");
  var price_order   = document.getElementById("price_order");
  var price1        = document.getElementById("price1");
  var price2        = document.getElementById("price2");


  var has_comments = 0;
  var sent = 0;
  var show_aqar = 0;

  if($('#have_comments:checkbox:checked').length > 0){
    has_comments = 1;
  }

  if($('#sent_whats:checkbox:checked').length > 0){
    sent = 1;
  }

  if($('#show_aqar:checkbox:checked').length > 0){
    show_aqar = 1;
  }

  /*if (document.getElementById('have_comments').checked) {
    has_comments = 1;
  }

  if (document.getElementById('sent_whats').checked) {
    sent = 1;
  }

  if (document.getElementById('show_aqar').checked) {
    show_aqar = 1;
  }*/

  if(has_comments == 1){
    if(filters.length == 0) {
        filters += "WHERE comments > 0";
    }else{
        filters += " AND comments > 0";
    }
  }

  if(sent == 1){
    if(filters.length == 0) {
        filters += "WHERE whatsapp_sent = 1";
    }else{
        filters += " AND whatsapp_sent = 1";
    }
  }

  if(show_aqar == 1){
    if(filters.length == 0) {
        filters += "WHERE add_by_aqar = 1";
    }else{
        filters += " AND add_by_aqar = 1";
    }
  }else{
    if(filters.length == 0) {
        filters += "WHERE add_by_aqar = 0";
    }else{
        filters += " AND add_by_aqar = 0";
    }
  }

  if(request_type.value != 0) {

      if(filters.length == 0) {
          filters += "WHERE real_easte.request_type='"+request_type.value+"'";
      }else{
          filters += " AND real_easte.request_type='"+request_type.value+"'";
      }
  }

  if(category.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.category='"+category.value+"'";
      }else{
          filters += " AND real_easte.category='"+category.value+"'";
      }
  }

  if(type.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.type="+type.value+" ";
      }else{
          filters += " AND real_easte.type="+type.value+" ";
      }
  }

  if(floor_cat.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.floor_cat='"+floor_cat.value+"'";
      }else{
          filters += " AND real_easte.floor_cat='"+floor_cat.value+"'";
      }
  }

  if(apartment_cat.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.apartment_cat='"+apartment_cat.value+"'";
      }else{
          filters += " AND real_easte.apartment_cat='"+apartment_cat.value+"'";
      }
  }

  if(neighborhood.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.neighborhood="+neighborhood.value+" ";
      }else{
          filters += " AND real_easte.neighborhood="+neighborhood.value+" ";
      }
  }

  if(income.value != 0) {
      if(income.value == "نعم"){
          if(filters.length == 0) {
              filters += "WHERE real_easte.income > 0";
          }else{
              filters += " AND real_easte.income > 0 ";
          }
      } else {
          if(filters.length == 0) {
              filters += "WHERE real_easte.income = 0";
          }else{
              filters += " AND real_easte.income = 0 ";
          }
      }
  }

  if(customer_type.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.customer_type="+customer_type.value+" ";
      }else{
          filters += " AND real_easte.customer_type="+customer_type.value+" ";
      }
  }

  if(search_box.value.length > 3){
      if(filters.length == 0) {
          filters += "WHERE real_easte.note LIKE '%"+search_box.value+"%' ";
      }else{
          filters += " AND real_easte.note LIKE '%"+search_box.value+"%' ";
      }
  }

  if(phone_box.value.length > 7){
      if(filters.length == 0) {
          filters += "WHERE real_easte.customer_phone LIKE '"+phone_box.value+"'";
      }else{
          filters += " AND real_easte.customer_phone LIKE '"+phone_box.value+"'";
      }
  }

  if(added_by.value != -1) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.add_by='"+added_by.value+"' ";
      }else{
          filters += " AND real_easte.add_by='"+added_by.value+"' ";
      }
  }

  if(price_order.value != -1) {
      if(price_order.value == 0) {
          order += " ORDER BY real_easte.price ASC";
      }else{
          order += " ORDER BY real_easte.price DESC";
      }
  }

  if(price2.value.length > 0 && price1.value.length > 0 && price2.value > 0 ) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.price BETWEEN "+ price1.value +" AND "+ price2.value +" ";
      }else{
          filters += " AND real_easte.price BETWEEN "+ price1.value +" AND "+ price2.value +" ";
      }
  }


  var result     = null;
  var scriptUrl  = base_url + "index.php/home/get_real_easte_data_with_filter_rows/?q=" + filters;

  $.ajax({
     url: scriptUrl,
     type: 'get',
     dataType: 'html',
     async: false,
     success: function(data) {
         result = data;
     }
  });

  var total_rows  =  result;

  var real_easte_data = base_url + "index.php/home/all_real_easte_json_with_filter/"+offset+"/"+per_page+"/?q="+filters+ "&o=" + order;
  var real_easte_typee ;
  var x = 0;

  $.ajaxSetup({
      async: true
  });

  $.getJSON(real_easte_data , function(data){

      var real_data = '';
      var scroll_bar = '';
      var scroll_bar = '';

      $.each(data,function(key , value){

        var row_class = "row1";
        if(value.request_type == 1)
          row_class = "row1";
        else if(value.request_type == 2)
          row_class ="row2";
        else if(value.request_type == 3)
          row_class ="row3";

        var request_type = "عرض";
        if(value.request_type == 1)
          request_type = "عرض";
        else if(value.request_type == 2)
          request_type = "طلب";
        else if(value.request_type == 3)
          request_type = "إيجار";


        var customer_type = "";

        if(value.customer_type == 1)
            customer_type = "زبون مباشر";
        else if(value.customer_type == 2)
            customer_type = "مالك مباشر";
        else if(value.customer_type == 3)
            customer_type = "وكيل";
        else if(value.customer_type == 4)
            customer_type = "وسيط";
        else if(value.customer_type == 5)
            customer_type = "وسيط أول";
        else if(value.customer_type == 6)
            customer_type = "وسيط ثاني";
        else if(value.customer_type == 7)
            customer_type = "وسيط ثالث";
        else if(value.customer_type == 8)
            customer_type = "وسيط رابع";
        else if(value.customer_type == 9)
            customer_type = "وسيط خامس";


        var note = value.note;
        var neighborhood  = value.neighborhood_name;
        var planned = value.planned;
        var char_limit = 25;

        if(note.length < char_limit)
          note = '<div> ' + note + '</div>';
        else
          note = '<div><span class="short-text">' + note.substr(0, char_limit) + '</span><span class="long-text">' + note.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

        if(neighborhood.length < char_limit)
          neighborhood = '<div> ' + neighborhood + '</div>';
        else
          neighborhood = '<div><span class="short-text">' + neighborhood.substr(0, char_limit) + '</span><span class="long-text">' + neighborhood.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

      if(planned.length < char_limit)
        planned = '<div> ' + planned + '</div>';
      else
        planned = '<div><span class="short-text">' + planned.substr(0, char_limit) + '</span><span class="long-text">' + planned.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

        //note = truncate.apply(note, [70, true]);
        var star = "";
        if(value.add_by_aqar == 1)
          star = "* ";

        real_data += '<tr class='+row_class+'>';
        real_data += '<td class="select_checkbox"><input type="checkbox" onchange="selectRow(this)" value="'+ value.id  +'" name="selected"/></td>';
        real_data += '<td title="('+value.id+'), بواسطة : '+value.by_user+'">'+ star +'<a target="_blank" href="'+ base_url +'Real_estate?id='+ value.id +'">'+ request_type +'</a></td>';
        real_data += '<td>'+ value.type_name  + '</td>';
        real_data += '<td>'+ value.category + '</td>';
        real_data += '<td>'+ value.yard + '</td>';
        real_data += '<td>'+ value.space + '</td>';
        real_data += '<td>'+ value.age +'</td>';
        real_data += '<td>'+ value.floor_cat +'</td>';
        real_data += '<td>'+ value.number_of_floor +'</td>';
        real_data += '<td>'+ value.apartment_cat +'</td>';
        real_data += '<td>'+ value.apartment_number_store +'</td>';
        real_data += '<td>'+ neighborhood +'</td>';
        real_data += '<td>'+ planned +'</td>';
        real_data += '<td>'+ value.income +'</td>';
        real_data += '<td>'+ value.price +'</td>';
        real_data += '<td>'+ value.percent +'</td>';
        real_data += '<td>'+ customer_type +'</td>';
        if(document.getElementById('show_phones').value == 1){
          real_data += '<td class="small_cell">'+ value.customer_name +'</td>';
          real_data += '<td class="small_cell">'+ value.customer_phone +'</td>';
        }
        real_data += '<td class="larg_cell">'+ value.add_time +'</td>';
        real_data += '<td title="' + note + '">'+ note +'</td>';

        scroll_bar += '<a target="_blank"  href="'+ base_url +'real_estate?id='+ value.id +'"><span style="color:red">'+ request_type +'</span> المخطط : '+ value.planned +'  السعر : ' + value.price + ' تفاصيل '+value.note+' </a> -- ';

      });

      $("#table_body").empty();
      $("#table_body").append(real_data);
      $("#news_bar").html("");
      $("#news_bar").show(300);
      $("#news_bar").append(scroll_bar.trim());

      // this section for pagination
      var pagination_links  = "";
      var total_pages       = total_rows / per_page;
      total_pages           = Math.ceil(total_pages);

      pagination_links = "<div class='pagging text-center'>";
      pagination_links += "<nav>";
      pagination_links += "<ul class='pagination pagination-smd'>";



      if(current_page != 1){

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( 1 )'  >الاولى</a>";
          pagination_links += "</li>";

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page - 1) + " )'>  << </a>";
          pagination_links += "</li>";
      }

      for( var x = current_page ; x <= (current_page + 2)  && x <= total_pages ; x++ ){
        if(x == current_page) {
            pagination_links += "<li class='page-item active'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x + ")'  >" + x + "<span class='sr-only'>(current)</span></a>";
            pagination_links += "</li>";
        } else {
            pagination_links += "<li class='page-item'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x +")'  >" + x + "</a>";
            pagination_links += "</li>";
        }
      }

      if(current_page < total_pages){

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page + 1) + " )'>  >> </a>";
          pagination_links += "</li>";

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ total_pages +")'  >الأخيرة</a>";
          pagination_links += "</li>";
      }

      pagination_links += "</ul>";
      pagination_links += "</nav>";
      pagination_links += "</div>";

      $(".pagination_list").html('');
      $(".pagination_list").append(pagination_links);

      $('tr').click(function(e) {
        var rowIndex  = $(this).index();
        $(this).toggleClass('selected');
      });

      // Trigger action when the contexmenu is about to be shown
      $('tr').bind("contextmenu", function (event) {

          var rowIndex  = parseInt( $(this).index() );
          //$(this).toggleClass('selected');

          // Avoid the real one
          event.preventDefault();

          // Show contextmenu
          $(".custom-menu").finish().toggle(100).

          // In the right position (the mouse)
          css({
              top: event.pageY + "px",
              left: event.pageX + "px"
          });

          var ad_id = $('tr:eq(' + (rowIndex + 1) + ') td:eq(0)').children().val();
          $(".custom-menu li").attr("data-id" , ad_id);
          $(".custom-menu li").attr("row-index" , (rowIndex + 1));

      });

      // If the document is clicked somewhere
      $(document).bind("mousedown", function (e) {

          // If the clicked element is not the menu
          if (!$(e.target).parents(".custom-menu").length > 0) {
              // Hide it
              $(".custom-menu").hide(100);
          }

      });

      // If the menu element is clicked
      $(".custom-menu li").click( function() {

        var id = $(this).attr("data-id");
        var row_index = $(this).attr("row-index");

        // This is the triggered action name
        switch($(this).attr("data-action")) {

            // A case for each action. Your actions here
            case "eidt": edit_popup(id); break;
            case "del": delete_real_easte(id , row_index); break;
            case "whats": sendWhatsapp(id); break;
            case "copy" : getSelectedRows(); break;
            case "copy_phone" : copy_phone(); break;
            case "tweet" : sendTweet(id); break;
        }

        // Hide it AFTER the action was triggered
        $(".custom-menu").hide(100);

      });



  });

}

// get more rows
function load_more_rows_table(number_of_rows) {

  var current_page      = parseInt( $("#current_page").val() );
  var per_page          = parseInt(number_of_rows.value);

  if(per_page == 0)
    per_page = 20;
  var offset            = ( current_page - 1) * per_page;

  $("#current_page").val(current_page);

  var filters = "";
  var order   = "";

  var request_type  = document.getElementById("request_type")
  var category      = document.getElementById("category")
  var type          = document.getElementById("real_type")
  var floor_cat     = document.getElementById("floor_cat")
  var apartment_cat = document.getElementById("apartment_cat")
  var neighborhood  = document.getElementById("neighborhood")
  var income        = document.getElementById("income")
  var customer_type = document.getElementById("customer_type")
  var search_box    = document.getElementById("search_box");
  var phone_box     = document.getElementById("phone_box");
  var added_by      = document.getElementById("added_by");
  var price_order   = document.getElementById("price_order");
  var price1        = document.getElementById("price1");
  var price2        = document.getElementById("price2");

  var has_comments = 0;
  var sent = 0;
  var show_aqar = 0;

  if($('#have_comments:checkbox:checked').length > 0){
    has_comments = 1;
  }

  if($('#sent_whats:checkbox:checked').length > 0){
    sent = 1;
  }

  if($('#show_aqar:checkbox:checked').length > 0){
    show_aqar = 1;
  }

  /*if (document.getElementById('have_comments').checked) {
    has_comments = 1;
  }

  if (document.getElementById('sent_whats').checked) {
    sent = 1;
  }

  if (document.getElementById('show_aqar').checked) {
    show_aqar = 1;
  }*/

  if(has_comments == 1){
    if(filters.length == 0) {
        filters += "WHERE comments > 0";
    }else{
        filters += " AND comments > 0";
    }
  }

  if(sent == 1){
    if(filters.length == 0) {
        filters += "WHERE whatsapp_sent = 1";
    }else{
        filters += " AND whatsapp_sent = 1";
    }
  }

  if(show_aqar == 1){
    if(filters.length == 0) {
        filters += "WHERE add_by_aqar = 1";
    }else{
        filters += " AND add_by_aqar = 1";
    }
  }else{
    if(filters.length == 0) {
        filters += "WHERE add_by_aqar = 0";
    }else{
        filters += " AND add_by_aqar = 0";
    }
  }

  if(request_type.value != 0) {

      if(filters.length == 0) {
          filters += "WHERE real_easte.request_type='"+request_type.value+"'";
      }else{
          filters += " AND real_easte.request_type='"+request_type.value+"'";
      }
  }

  if(category.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.category='"+category.value+"'";
      }else{
          filters += " AND real_easte.category='"+category.value+"'";
      }
  }

  if(type.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.type="+type.value+" ";
      }else{
          filters += " AND real_easte.type="+type.value+" ";
      }
  }

  if(floor_cat.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.floor_cat='"+floor_cat.value+"'";
      }else{
          filters += " AND real_easte.floor_cat='"+floor_cat.value+"'";
      }
  }

  if(apartment_cat.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.apartment_cat='"+apartment_cat.value+"'";
      }else{
          filters += " AND real_easte.apartment_cat='"+apartment_cat.value+"'";
      }
  }

  if(neighborhood.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.neighborhood="+neighborhood.value+" ";
      }else{
          filters += " AND real_easte.neighborhood="+neighborhood.value+" ";
      }
  }

  if(income.value != 0) {
      if(income.value == "نعم"){
          if(filters.length == 0) {
              filters += "WHERE real_easte.income > 0";
          }else{
              filters += " AND real_easte.income > 0 ";
          }
      } else {
          if(filters.length == 0) {
              filters += "WHERE real_easte.income = 0";
          }else{
              filters += " AND real_easte.income = 0 ";
          }
      }
  }

  if(customer_type.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.customer_type="+customer_type.value+" ";
      }else{
          filters += " AND real_easte.customer_type="+customer_type.value+" ";
      }
  }

  if(search_box.value.length > 3){
      if(filters.length == 0) {
          filters += "WHERE real_easte.note LIKE '%"+search_box.value+"%' ";
      }else{
          filters += " AND real_easte.note LIKE '%"+search_box.value+"%' ";
      }
  }

  if(phone_box.value.length > 7){
      if(filters.length == 0) {
          filters += "WHERE real_easte.customer_phone LIKE '"+phone_box.value+"'";
      }else{
          filters += " AND real_easte.customer_phone LIKE '"+phone_box.value+"'";
      }
  }

  if(added_by.value != -1) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.add_by='"+added_by.value+"' ";
      }else{
          filters += " AND real_easte.add_by='"+added_by.value+"' ";
      }
  }

  if(price_order.value != -1) {
      if(price_order.value == 0) {
          order += " ORDER BY real_easte.price ASC";
      }else{
          order += " ORDER BY real_easte.price DESC";
      }
  }

  if(price2.value.length > 0 && price1.value.length > 0 && price2.value > 0 ) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.price BETWEEN "+ price1.value +" AND "+ price2.value +" ";
      }else{
          filters += " AND real_easte.price BETWEEN "+ price1.value +" AND "+ price2.value +" ";
      }
  }


  var result     = null;
  var scriptUrl  = base_url + "index.php/home/get_real_easte_data_with_filter_rows/?q=" + filters;

  $.ajax({
     url: scriptUrl,
     type: 'get',
     dataType: 'html',
     async: false,
     success: function(data) {
         result = data;
     }
  });

  var total_rows  =  result;

  var real_easte_data = base_url + "index.php/home/all_real_easte_json_with_filter/"+offset+"/"+per_page+"/?q="+filters+ "&o=" + order;
  var real_easte_typee ;
  var x = 0;

  $.ajaxSetup({
      async: true
  });

  $.getJSON(real_easte_data , function(data){

      var real_data = '';
      var scroll_bar ='';

      $.each(data,function(key , value){

        var row_class = "row1";
        if(value.request_type == 1)
          row_class = "row1";
        else if(value.request_type == 2)
          row_class ="row2";
        else if(value.request_type == 3)
          row_class ="row3";

        var request_type = "عرض";
        if(value.request_type == 1)
          request_type = "عرض";
        else if(value.request_type == 2)
          request_type = "طلب";
        else if(value.request_type == 3)
          request_type = "إيجار";


        var customer_type = "";

        if(value.customer_type == 1)
            customer_type = "زبون مباشر";
        else if(value.customer_type == 2)
            customer_type = "مالك مباشر";
        else if(value.customer_type == 3)
            customer_type = "وكيل";
        else if(value.customer_type == 4)
            customer_type = "وسيط";
        else if(value.customer_type == 5)
            customer_type = "وسيط أول";
        else if(value.customer_type == 6)
            customer_type = "وسيط ثاني";
        else if(value.customer_type == 7)
            customer_type = "وسيط ثالث";
        else if(value.customer_type == 8)
            customer_type = "وسيط رابع";
        else if(value.customer_type == 9)
            customer_type = "وسيط خامس";


        var note = value.note;
        var neighborhood  = value.neighborhood_name;
        var planned = value.planned;
        var char_limit = 25;

        if(note.length < char_limit)
          note = '<div> ' + note + '</div>';
        else
          note = '<div title="'+note+'"><span class="short-text">' + note.substr(0, char_limit) + '</span><span class="long-text">' + note.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

        if(neighborhood.length < char_limit)
          neighborhood = '<div> ' + neighborhood + '</div>';
        else
          neighborhood = '<div><span class="short-text">' + neighborhood.substr(0, char_limit) + '</span><span class="long-text">' + neighborhood.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';

      if(planned.length < char_limit)
        planned = '<div> ' + planned + '</div>';
      else
        planned = '<div><span class="short-text">' + planned.substr(0, char_limit) + '</span><span class="long-text">' + planned.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';


        //note = truncate.apply(note, [70, true]);

        var star = "";
        if(value.add_by_aqar == 1)
          star = "* ";

        real_data += '<tr class='+row_class+'>';
        real_data += '<td class="select_checkbox"><input type="checkbox" onchange="selectRow(this)" value="'+ value.id  +'" name="selected"/></td>';
        real_data += '<td title="('+value.id+'), بواسطة : '+value.by_user+'">'+ star +'<a target="_blank" href="'+ base_url +'Real_estate?id='+ value.id +'">'+ request_type +'</a></td>';
        real_data += '<td>'+ value.type_name  + '</td>';
        real_data += '<td>'+ value.category + '</td>';
        real_data += '<td>'+ value.yard + '</td>';
        real_data += '<td>'+ value.space + '</td>';
        real_data += '<td>'+ value.age +'</td>';
        real_data += '<td>'+ value.floor_cat +'</td>';
        real_data += '<td>'+ value.number_of_floor +'</td>';
        real_data += '<td>'+ value.apartment_cat +'</td>';
        real_data += '<td>'+ value.apartment_number_store +'</td>';
        real_data += '<td>'+ neighborhood +'</td>';
        real_data += '<td>'+ planned +'</td>';
        real_data += '<td>'+ value.income +'</td>';
        real_data += '<td>'+ value.price +'</td>';
        real_data += '<td>'+ value.percent +'</td>';
        real_data += '<td>'+ customer_type +'</td>';
        if(document.getElementById('show_phones').value == 1){
          real_data += '<td class="small_cell">'+ value.customer_name +'</td>';
          real_data += '<td class="small_cell">'+ value.customer_phone +'</td>';
        }
        real_data += '<td class="larg_cell">'+ value.add_time +'</td>';
        real_data += '<td>'+ note +'</td>';

        scroll_bar += '<a target="_blank"  href="'+ base_url +'real_estate?id='+ value.id +'"><span style="color:red">'+ request_type +'</span> المخطط : '+ value.planned +'  السعر : ' + value.price + ' تفاصيل '+value.note+' </a> -- ';


      });

      $("#table_body").empty();
      $("#table_body").append(real_data);
      $("#news_bar").html("");
      $("#news_bar").show(300);
      $("#news_bar").append(scroll_bar.trim());

      // this section for pagination
      var pagination_links  = "";
      var total_pages       = total_rows / per_page;
      total_pages           = Math.ceil(total_pages);

      pagination_links = "<div class='pagging text-center'>";
      pagination_links += "<nav>";
      pagination_links += "<ul class='pagination pagination-smd'>";



      if(current_page != 1){

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( 1 )'  >الاولى</a>";
          pagination_links += "</li>";

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page - 1) + " )'>  << </a>";
          pagination_links += "</li>";
      }

      for( var x = current_page ; x <= (current_page + 2)  && x <= total_pages ; x++ ){
        if(x == current_page) {
            pagination_links += "<li class='page-item active'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x + ")'  >" + x + "<span class='sr-only'>(current)</span></a>";
            pagination_links += "</li>";
        } else {
            pagination_links += "<li class='page-item'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x +")'  >" + x + "</a>";
            pagination_links += "</li>";
        }
      }

      if(current_page < total_pages){

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page + 1) + " )'>  >> </a>";
          pagination_links += "</li>";

          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ total_pages +")'  >الأخيرة</a>";
          pagination_links += "</li>";
      }




      pagination_links += "</ul>";
      pagination_links += "</nav>";
      pagination_links += "</div>";

      $(".pagination_list").html('');
      $(".pagination_list").append(pagination_links);

      //alert(current_page +' == '+total_pages);
      //alert(pagination_links);

      //$('#data_table').tablesorter( { headers: { 0: { sorter: false} } } );
      //$("#data_table").trigger("update");

      $('tr').click(function(e) {
        var rowIndex  = $(this).index();
        $(this).toggleClass('selected');
      });

      // Trigger action when the contexmenu is about to be shown
      $('tr').bind("contextmenu", function (event) {

          var rowIndex  = parseInt( $(this).index() );
          //$(this).toggleClass('selected');

          // Avoid the real one
          event.preventDefault();

          // Show contextmenu
          $(".custom-menu").finish().toggle(100).

          // In the right position (the mouse)
          css({
              top: event.pageY + "px",
              left: event.pageX + "px"
          });

          var ad_id = $('tr:eq(' + (rowIndex + 1) + ') td:eq(0)').children().val();
          $(".custom-menu li").attr("data-id" , ad_id);
          $(".custom-menu li").attr("row-index" , (rowIndex + 1));

      });

      // If the document is clicked somewhere
      $(document).bind("mousedown", function (e) {

          // If the clicked element is not the menu
          if (!$(e.target).parents(".custom-menu").length > 0) {
              // Hide it
              $(".custom-menu").hide(100);
          }

      });

      // If the menu element is clicked
      $(".custom-menu li").click( function() {

        var id = $(this).attr("data-id");
        var row_index = $(this).attr("row-index");

        // This is the triggered action name
        switch($(this).attr("data-action")) {

            // A case for each action. Your actions here
            case "eidt": edit_popup(id); break;
            case "del": delete_real_easte(id , row_index); break;
            case "whats": sendWhatsapp(id); break;
            case "copy" : getSelectedRows(); break;
            case "copy_phone" : copy_phone(); break;
            case "tweet" : sendTweet(id); break;
        }

        // Hide it AFTER the action was triggered
        $(".custom-menu").hide(100);

      });


  });

}

// load table from filters
function load_table_filter(){

  var current_page      = parseInt( $("#current_page").val() );
  //var total_rows        = $("#total_rows").val();
  var per_page          = parseInt( $("#per_page").val() );

  if(per_page == 0)
    per_page = 20;
  var offset            = ( current_page - 1) * per_page;

  var filters = "";
  var order   = "";

  var easte_num     = document.getElementById("easte_num");
  var request_type  = document.getElementById("request_type");
  var category      = document.getElementById("category");
  var type          = document.getElementById("real_type");
  var floor_cat     = document.getElementById("floor_cat");
  var apartment_cat = document.getElementById("apartment_cat");
  var neighborhood  = document.getElementById("neighborhood");
  var income        = document.getElementById("income");
  var customer_type = document.getElementById("customer_type");
  var search_box    = document.getElementById("search_box");
  var phone_box     = document.getElementById("phone_box");
  var added_by      = document.getElementById("added_by");
  var price_order   = document.getElementById("price_order");
  var price1        = document.getElementById("price1");
  var price2        = document.getElementById("price2");

  var has_comments = 0;
  var sent = 0;
  var show_aqar = 0;

  //alert($('#have_comments:checkbox:checked').length)

  if($('#have_comments:checkbox:checked').length > 0){
    has_comments = 1;
  }

  if($('#sent_whats:checkbox:checked').length > 0){
    sent = 1;
  }

  if($('#show_aqar:checkbox:checked').length > 0){
    show_aqar = 1;
  }

  /*if (document.getElementById('have_comments').checked) {
    has_comments = 1;
  }

  if (document.getElementById('sent_whats').checked) {
    sent = 1;
  }

  if (document.getElementById('show_aqar').checked) {
    show_aqar = 1;
  }*/

  if(has_comments == 1){
    if(filters.length == 0) {
        filters += "WHERE comments > 0";
    }else{
        filters += " AND comments > 0";
    }
  }

  if(sent == 1){
    if(filters.length == 0) {
        filters += "WHERE whatsapp_sent = 1";
    }else{
        filters += " AND whatsapp_sent = 1";
    }
  }

  if(show_aqar == 1){
    if(filters.length == 0) {
        filters += "WHERE add_by_aqar = 1";
    }else{
        filters += " AND add_by_aqar = 1";
    }
  }else{
    if(filters.length == 0) {
        filters += "WHERE add_by_aqar = 0";
    }else{
        filters += " AND add_by_aqar = 0";
    }
  }

  if(easte_num.value.length > 2 ){
    if(filters.length == 0) {
        filters += "WHERE real_easte.id='"+easte_num.value+"'";
    }else{
        filters += " AND real_easte.id='"+easte_num.value+"'";
    }
  }

  if(request_type.value != 0) {

      if(filters.length == 0) {
          filters += "WHERE real_easte.request_type='"+request_type.value+"'";
      }else{
          filters += " AND real_easte.request_type='"+request_type.value+"'";
      }
  }

  if(category.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.category='"+category.value+"'";
      }else{
          filters += " AND real_easte.category='"+category.value+"'";
      }
  }

  if(type.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.type="+type.value+" ";
      }else{
          filters += " AND real_easte.type="+type.value+" ";
      }
  }

  if(floor_cat.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.floor_cat='"+floor_cat.value+"'";
      }else{
          filters += " AND real_easte.floor_cat='"+floor_cat.value+"'";
      }
  }

  if(apartment_cat.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.apartment_cat='"+apartment_cat.value+"'";
      }else{
          filters += " AND real_easte.apartment_cat='"+apartment_cat.value+"'";
      }
  }

  if(neighborhood.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.neighborhood="+neighborhood.value+" ";
      }else{
          filters += " AND real_easte.neighborhood="+neighborhood.value+" ";
      }
  }

  if(income.value != 0) {
      if(income.value == "نعم"){
          if(filters.length == 0) {
              filters += "WHERE real_easte.income > 0";
          }else{
              filters += " AND real_easte.income > 0 ";
          }
      } else {
          if(filters.length == 0) {
              filters += "WHERE real_easte.income = 0";
          }else{
              filters += " AND real_easte.income = 0 ";
          }
      }
  }

  if(customer_type.value != 0) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.customer_type="+customer_type.value+" ";
      }else{
          filters += " AND real_easte.customer_type="+customer_type.value+" ";
      }
  }

  if(search_box.value.length > 3){
      if(filters.length == 0) {
          filters += "WHERE real_easte.note LIKE '%"+search_box.value+"%' ";
      }else{
          filters += " OR real_easte.note LIKE '%"+search_box.value+"%' OR real_easte.planned LIKE '%"+search_box.value+"%' OR real_easte.category LIKE '%"+search_box.value+"%' OR real_easte.yard LIKE '%"+search_box.value+"%' ";
      }
  }

  if(phone_box.value.length > 7){
      if(filters.length == 0) {
          filters += "WHERE real_easte.customer_phone LIKE '"+phone_box.value+"'";
      }else{
          filters += " AND real_easte.customer_phone LIKE '" + phone_box.value + "'";
      }
  }

  if(added_by.value != -1) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.add_by='"+added_by.value+"' ";
      }else{
          filters += " AND real_easte.add_by='"+added_by.value+"' ";
      }
  }

  if(price_order.value != -1) {
      if(price_order.value == 0) {
          order += " ORDER BY real_easte.price ASC";
      }else{
          order += " ORDER BY real_easte.price DESC";
      }
  }

  if(price2.value.length > 0 && price1.value.length > 0 && price2.value > 0 ) {
      if(filters.length == 0) {
          filters += "WHERE real_easte.price BETWEEN "+ price1.value +" AND "+ price2.value +" ";
      }else{
          filters += " AND real_easte.price BETWEEN "+ price1.value +" AND "+ price2.value +" ";
      }
  }

  console.log(filters);

  var result     = null;
  var scriptUrl  = base_url + "index.php/home/get_real_easte_data_with_filter_rows/?q=" + filters ;

  $.ajax({
     url: scriptUrl,
     type: 'get',
     dataType: 'html',
     async: false,
     success: function(data) {
         result = data;
     }
  });

  var total_rows  =  result;

  var real_easte_data = base_url + "index.php/home/all_real_easte_json_with_filter/"+offset+"/"+ per_page +"/?q="+filters+ "&o=" + order;
  var real_easte_typee ;
  var x = 0;

  $.ajaxSetup({
      async: true
  });

  $.getJSON(real_easte_data , function(data){
      var real_data = '';
      var scroll_bar = '';

      $.each(data,function(key , value){

        var row_class = "row1";
        if(value.request_type == 1)
          row_class = "row1";
        else if(value.request_type == 2)
          row_class ="row2";
        else if(value.request_type == 3)
          row_class ="row3";

        var request_type = "عرض";
        if(value.request_type == 1)
          request_type = "عرض";
        else if(value.request_type == 2)
          request_type = "طلب";
        else if(value.request_type == 3)
          request_type = "إيجار";

        var customer_type = "";

        if(value.customer_type == 1)
            customer_type = "زبون مباشر";
        else if(value.customer_type == 2)
            customer_type = "مالك مباشر";
        else if(value.customer_type == 3)
            customer_type = "وكيل";
        else if(value.customer_type == 4)
            customer_type = "وسيط";
        else if(value.customer_type == 5)
            customer_type = "وسيط أول";
        else if(value.customer_type == 6)
            customer_type = "وسيط ثاني";
        else if(value.customer_type == 7)
            customer_type = "وسيط ثالث";
        else if(value.customer_type == 8)
            customer_type = "وسيط رابع";
        else if(value.customer_type == 9)
            customer_type = "وسيط خامس";


        var note = value.note;

        var char_limit = 25;

        if(note.length < char_limit)
          note = '<div> ' + note + '</div>';
        else
          note = '<div title="'+note+'"><span class="short-text">' + note.substr(0, char_limit) + '</span><span class="long-text">' + note.substr(char_limit) + '</span><span class="text-dots">...</span><span class="show-more-button" onClick="readMore(this)" data-more="0">المزيد</span></div>';


        //note = truncate.apply(note, [70, true]);
        //console.log(showGetResult(value.type))

        var star = "";
        if(value.add_by_aqar == 1)
          star = "* ";

        real_data += '<tr class='+row_class+'>';
        real_data += '<td class="select_checkbox"><input type="checkbox" onchange="selectRow(this)" value="'+ value.id  +'" name="selected"/></td>';
        real_data += '<td title="('+value.id+'), بواسطة : '+value.by_user+'">'+ star +'<a target="_blank" href="'+ base_url +'Real_estate?id='+ value.id +'">'+ request_type +'</a></td>';
        real_data += '<td>'+ value.type_name  + '</td>';
        real_data += '<td>'+ value.category + '</td>';
        real_data += '<td>'+ value.yard + '</td>';
        real_data += '<td>'+ value.space + '</td>';
        real_data += '<td>'+ value.age +'</td>';
        real_data += '<td>'+ value.floor_cat +'</td>';
        real_data += '<td>'+ value.number_of_floor +'</td>';
        real_data += '<td>'+ value.apartment_cat +'</td>';
        real_data += '<td>'+ value.apartment_number_store +'</td>';
        real_data += '<td>'+ value.neighborhood_name +'</td>';
        real_data += '<td>'+ value.planned +'</td>';
        real_data += '<td>'+ value.income +'</td>';
        real_data += '<td>'+ value.price +'</td>';
        real_data += '<td>'+ value.percent +'</td>';
        real_data += '<td>'+ customer_type +'</td>';
        if(document.getElementById('show_phones').value == 1){
          real_data += '<td class="small_cell">'+ value.customer_name +'</td>';
          real_data += '<td class="small_cell">'+ value.customer_phone +'</td>';
        }
        real_data += '<td class="larg_cell">'+ value.add_time +'</td>';
        real_data += '<td>'+ note +'</td>';

        scroll_bar += '<a target="_blank"  href="'+ base_url +'real_estate?id='+ value.id +'"><span style="color:red">'+ request_type +'</span> المخطط : '+ value.planned +'  السعر : ' + value.price + ' تفاصيل '+value.note+' </a> -- ';


      }); // end of foreache


      $("#table_body").empty();
      $("#table_body").append(real_data);
      $("#news_bar").show(300);
      $("#news_bar").html("");
      $("#news_bar").html(scroll_bar.trim());

      //$("#data_table").trigger("update");
      //$('#data_table').tablesorter( { headers: { 0: { sorter: false} } } );

      // this section for pagination
      var pagination_links  = "";
      var total_pages       = total_rows / per_page;
      total_pages           = Math.ceil(total_pages);

      pagination_links = "<div class='pagging text-center'>";
      pagination_links += "<nav>";
      pagination_links += "<ul class='pagination pagination-smd'>";

      pagination_links += "<li class='page-item'>";
      pagination_links += "<a class='page-link' href='javascript:load_table( 1 )'  >الاولى</a>";
      pagination_links += "</li>";

      if(current_page != 1){
          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page - 1) + " )'>  << </a>";
          pagination_links += "</li>";
      }

      for( var x = current_page ; x <= (current_page + 2)  && x <= total_pages ; x++ ){
        if(x == current_page) {
            pagination_links += "<li class='page-item active'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x + ")'  >" + x + "<span class='sr-only'>(current)</span></a>";
            pagination_links += "</li>";
        } else {
            pagination_links += "<li class='page-item'>";
            pagination_links += "<a class='page-link' href='javascript:load_table(" + x +")'  >" + x + "</a>";
            pagination_links += "</li>";
        }
      }

      if(current_page < total_pages){
          pagination_links += "<li class='page-item'>";
          pagination_links += "<a class='page-link' href='javascript:load_table( "+ ( current_page + 1) + " )'>  >> </a>";
          pagination_links += "</li>";
      }


      pagination_links += "<li class='page-item'>";
      pagination_links += "<a class='page-link' href='javascript:load_table( "+ total_pages +")'  >الأخيرة</a>";
      pagination_links += "</li>";

      pagination_links += "</ul>";
      pagination_links += "</nav>";
      pagination_links += "</div>";

      $(".pagination_list").html('');
      $(".pagination_list").append(pagination_links);

      $('tr').click(function(e) {
        var rowIndex  = $(this).index();
        $(this).toggleClass('selected');
      });

      // Trigger action when the contexmenu is about to be shown
      $('tr').bind("contextmenu", function (event) {

          var rowIndex  = parseInt( $(this).index() );
          //$(this).toggleClass('selected');

          // Avoid the real one
          event.preventDefault();

          // Show contextmenu
          $(".custom-menu").finish().toggle(100).

          // In the right position (the mouse)
          css({
              top: event.pageY + "px",
              left: event.pageX + "px"
          });

          var ad_id = $('tr:eq(' + (rowIndex + 1) + ') td:eq(0)').children().val();
          $(".custom-menu li").attr("data-id" , ad_id);
          $(".custom-menu li").attr("row-index" , (rowIndex + 1));

      });

      // If the document is clicked somewhere
      $(document).bind("mousedown", function (e) {

          // If the clicked element is not the menu
          if (!$(e.target).parents(".custom-menu").length > 0) {
              // Hide it
              $(".custom-menu").hide(100);
          }

      });

      // If the menu element is clicked
      $(".custom-menu li").click( function() {

        var id = $(this).attr("data-id");
        var row_index = $(this).attr("row-index");

        // This is the triggered action name
        switch($(this).attr("data-action")) {

            // A case for each action. Your actions here
            case "eidt": edit_popup(id); break;
            case "del": delete_real_easte(id , row_index); break;
            case "whats": sendWhatsapp(id); break;
            case "copy" : getSelectedRows(); break;
            case "copy_phone" : copy_phone(); break;
            case "tweet" : sendTweet(id); break;
        }

        // Hide it AFTER the action was triggered
        $(".custom-menu").hide(100);

      });


  });

}

var selected_count = 0;

// check all rows
function checkAll(){
    var input, table, tr, td, i;

    input = $("#check_all");
    if(input.prop("checked")){
        $("#data_table > tbody > tr").each(function(){
            td = $('.select_checkbox');
            td.find('input[type="checkbox"]').prop("checked", true);
            $(this).addClass('selected');
            $("#delete_all").show();
            selected_count++;
        });
    }else{
        $("#data_table > tbody > tr").each(function(){
            td = $('.select_checkbox');
            td.find('input[type="checkbox"]').prop("checked", false);
            $(this).removeClass('selected');
        });
        $("#delete_all").hide();
        selected_count = 0;
    }

}

// select one row
function selectRow(e){

    if(e.checked == true){

        var row = e.parentElement.parentElement;
        row.classList.add('selected');
        selected_count++;

        if(selected_count >= 1){
          $("#delete_all").show();
          // $("#delete_all").val(e.value);
        }else{
          $("#delete_all").hide();
        }

    } else {

        var row = e.parentElement.parentElement;
        row.classList.remove('selected');
        selected_count--;

        if(selected_count >= 1){
          $("#delete_all").show();
          // $("#delete_all").val(e.value);
        }else{
          $("#delete_all").hide();
        }
    }
}

// get selected rows
function getSelectedRows(){

    var rows = $('.selected');
    var real_data = "";
    real_data += "بورصة الوساطة التعاونية الذكية\n\n";
    var count = 0;

    rows.each(function(){
      count++;
      var columns   = $(this).find('td > input');
      var id        = $(this).children().children()[0].value
      // var api       = base_url + "index.php/home/get_real_easte_data_as_json/" + id;
      //
      // $.ajaxSetup({
      //     async: false
      // });

      var rowIndex         = $(this).index() ;

      var ad_id           = $('tr:eq(' + (rowIndex + 1) + ') td:eq(0)').children().val();
      var request_type    = $('tr:eq(' + (rowIndex + 1) + ') td:eq(1)').text();
      var type_name       = $('tr:eq(' + (rowIndex + 1) + ') td:eq(2)').text();
      var category        = $('tr:eq(' + (rowIndex + 1) + ') td:eq(3)').text();
      var space           = $('tr:eq(' + (rowIndex + 1) + ') td:eq(5)').text();
      var neighborhood    = $('tr:eq(' + (rowIndex + 1) + ') td:eq(11)').children().find('.short-text').text() + ' ' + $('tr:eq(' + (rowIndex + 1) + ') td:eq(11)').children().find('.long-text').text()
      var income          = $('tr:eq(' + (rowIndex + 1) + ') td:eq(13)').text();
      var price           = $('tr:eq(' + (rowIndex + 1) + ') td:eq(14)').text();
      var note            = $('tr:eq(' + (rowIndex + 1) + ') td:eq(20)').children().find('.short-text').text() + ' ' + $('tr:eq(' + (rowIndex + 1) + ') td:eq(20)').children().find('.long-text').text();

      real_data +=  "رقم الاعلان :- " + ad_id;
      real_data +=  "\nنوع العقار: " + type_name ;
      real_data +=  "\n فئة العقار : " + category;
      real_data +=  "\nالحي :- " + neighborhood;
      if(parseInt(income) > 0)
        real_data +=  "\nالدخل :- " + income;
      real_data +=  "\nالمساحة : " + space;
      real_data += "\nالسعر :- " + price;
      real_data +=  "\nتفاصيل أكثر : " + note + "\n";
      real_data +=  "==========================================\n";

    });// end of rows

    //$('#copy_area').val(real_data);
    if(count >= 500){
      alert('لا يمكن نسخ 500 عقار, الرجاء اختيار 200');
    }
    var $temp = $("<textarea contenteditable='true' readonly='false' >");
    $("body").append($temp);
    $temp.val(real_data).select();
    document.execCommand("copy");
    $temp.remove();

    if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
      $('.ios_copy').show(200);
      var $ios = $('.copied_text');
      $ios.val(real_data).select();
    }

    //alert("تم النسخ");

}

function copy_phone(){
  var rows = $('.selected');
  var real_data = "";
  // 18

  rows.each(function(){
    var rowIndex  = $(this).index() ;
    var columns   = $(this).find('td > input');
    var id        = $(this).children().children()[0].value
    var phone     = $('tr:eq(' + (rowIndex + 1) + ') td:eq(18)').text();
    real_data += phone + '\r\n';
  });

  $('.ios_copy').show(200);
  var $ios = $('.copied_text');
  $ios.val(real_data).select();

}

function hide_phones(){
  // var x = document.getElementsByTagName('th');
  // x[16].style.visibility='hidden';
  // x[17].style.visibility='hidden';
  // x[18].style.visibility='hidden';

  if($('#show_phones').val() == 1){
    $('#hide_phone').text('اظهار الارقام');
    $('#show_phones').val(0);
    load_table_filter();
  }else{
    $('#hide_phone').text('اخفاء الارقام');
    $('#show_phones').val(1);
    load_table_filter();
  }

}

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

function edit_popup(id){

  var real_id   = id;// e.value;
  var api       = base_url + "index.php/home/get_real_easte_data_as_json/" + real_id;
  $('#easte_form').trigger("reset");

  $.ajaxSetup({
      async: false
  });

  $.getJSON( api , function(data){
      $.each( data , function( key, val ){
          //console.log("yardd : " + val.yard);
          //alert(val.apartment_cat.length);
          $("#easte_form input[name=real_number]").val(val.id);
          $("#easte_form select[name=request_type] option[value='"+val.request_type+"']").attr('selected','selected');
          $("#easte_form select[name=type] option[value='"+val.type+"']").attr('selected','selected');
          $("#easte_form select[name=category] option[value='"+val.category+"']").attr('selected','selected');
          if(val.yard.length > 0)
            $("#easte_form select[name=yard] option[value='"+val.yard+"']").attr('selected','selected');
          $("#easte_form input[name=space]").val(val.space);
          $("#easte_form input[name=age]").val(val.age);
          if(val.floor_cat.length > 0)
            $("#easte_form select[name=floor_cat] option[value='"+val.floor_cat+"']").attr('selected','selected');
          $("#easte_form input[name=number_of_floor]").val(val.number_of_floor);
          if(val.apartment_cat.length > 0)
            $("#easte_form select[name=apartment_cat] option[value='"+val.apartment_cat+"']").attr('selected','selected');
          $("#easte_form input[name=apartment_number_store]").val(val.apartment_number_store);
          $("#easte_form input[name=estate_numebr]").val(val.estate_numebr);
          $("#easte_form input[name=street]").val(val.street);
          if(val.neighborhood.length > 0)
            $("#easte_form select[name=neighborhood] option[value='"+val.neighborhood+"']").attr('selected','selected');
          $("#easte_form input[name=planned]").val(val.planned);
          $("#easte_form input[name=street_width]").val(val.street_width);
          if(val.elevator.length > 0)
            $("#easte_form select[name=elevator] option[value='"+val.elevator+"']").attr('selected','selected');
          $("#easte_form input[name=income]").val(val.income);
          $("#easte_form input[name=price]").val(val.price);
          $("#easte_form input[name=percent]").val(val.percent);
          if(val.customer_type.length > 0)
            $("#easte_form select[name=customer_type] option[value='"+val.customer_type+"']").attr('selected','selected');
          $("#easte_form input[name=customer_name]").val(val.customer_name);
          $("#easte_form input[name=customer_phone]").val(val.customer_phone);
          $("#easte_form input[name=y]").val(val.y);
          $("#easte_form input[name=x]").val(val.x);
          $("#easte_form textarea[name=note]").val(val.note);

          //console.log('aqar :' + val.aqar_url.length);
          var value = parseInt( $('.private_form input[name=permission]').val() );

          if(value == 1) {
            if(val.aqar_url.length > 0){
              $('#aqar_url').attr('href', val.aqar_url);
              $('#aqar_box').show();
            }
          }

          openMap(val.x , val.y);

      });
  });

  $('.edit_popup').show();
  $(".popup_form").show('slow');
  window.scrollTo(0, 0);
}

function hide_popup(){
  $('.edit_popup').hide();
  $(".popup_form").hide(200);
}

function hide_ios_copy(){
  $('.ios_copy').hide(200);
}

var map;
var marker;

function openMap(x , y) {

    //console.log("X : " + x + " Y:  "  + y);
    map = new google.maps.Map(document.getElementById('edit_map'), {
      center: {lat: parseFloat(y) , lng: parseFloat(x) },
      zoom: 14,
      mapTypeId: 'satellite'
    });

    marker = new google.maps.Marker({
      position: {lat: parseFloat(y) , lng: parseFloat(x) },
      map: map,
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend' , function(){
      y = marker.getPosition().lat();
      x = marker.getPosition().lng();

      $("input[name='y']").val(y);
      $("input[name='x']").val(x);

    });
}

function ConfirmDialog(message) {
    $('<div></div>').appendTo('body')
    .html('<div><h6>'+message+'؟</h6></div>')
    .dialog({
        modal: true, title: '!!حذف', zIndex: 10000, autoOpen: true,
        width: 'auto', resizable: false,
        buttons: {
            نعم: function () {
                var id = $("#easte_form input[name=real_number]").val();
                var url = base_url;
                window.location.replace( url + "home/delete_easte/" + id);
                $(this).dialog("close");
            },
            لا: function () {
                //$('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                $(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $(this).remove();
        }
    });
};

function sendWhatsapp( real_id ){

  var location = $("#location");
  var msg_box = $("#whatsmsg");
  var content = "";
  var api = base_url + "index.php/home/real_easte_json/"+ real_id;

  location.click(function(){
      if($(this).is(":checked")){
        //var url = "https://www.google.com/maps/@?api=1&map_action=map&center="+location.val()+"&zoom=12";
        var url = "https://www.google.com/maps/search/?api=1&query="+location.val();
        $("#whatsmsg").val($("#whatsmsg").val() + "\n" + url);

      }else{
        $("#whatsmsg").val('')
        $.getJSON( api, function(data){
          $.each( data, function( key, val ){

              var request_type = "عرض";
              if(val.request_type == 1)
                request_type = "عرض";
              else if(val.request_type == 2)
                request_type = "طلب";
              else if(val.request_type == 3)
                request_type = "إيجار";



              $.get( base_url + "index.php/home/get_real_easte_type/" + val.type , function( data ) {
                  var real_easte_typee = data;

                  content = "رقم العرض :- "+ val.id + "\n"+
                  "نوع الطلب :- " + request_type + "\n"+
                  "نوع العقار :- " + real_easte_typee + "\n"+
                  "فئة العقار :- "+  val.category + "\n" +
                  " السعر :- " + val.price + "\n" +
                  "ملاحظات :- " + val.note + "\n";

                  $("#whatsmsg").val(content);

              } , 'html' );


          });
        });
      }
  });

  $.getJSON( api, function(data){
    $.each( data, function( key, val ){

        var request_type = "عرض";
        if(val.request_type == 1)
          request_type = "عرض";
        else if(val.request_type == 2)
          request_type = "طلب";
        else if(val.request_type == 3)
          request_type = "إيجار";



        $.get( base_url +  "index.php/home/get_real_easte_type/" + val.type , function( data ) {
            var real_easte_typee = data;
            $("#easte_type").val(val.type);
            $("#easte_id").val(real_id)

            content = "رقم العرض :- "+ val.id + "\n"+
            "نوع الطلب :- " + request_type + "\n"+
            "نوع العقار :- " + real_easte_typee + "\n"+
            "فئة العقار :- "+  val.category + "\n" +
            " السعر :- " + val.price + "\n" +
            "ملاحظات :- " + val.note + "\n";

            location.val(val.y + "," + val.x);
            $("#whatsmsg").val(content);

        } , 'html' );


    });
  });

  document.getElementById('id01').style.display='block';
}

function sendTweet(real_id){

  var tweet_url = "https://twitter.com/intent/tweet?text=";
  var api = base_url + "index.php/home/real_easte_json/"+ real_id;

  $.getJSON( api, function(data){
    $.each( data, function( key, val ){
        var request_type = "عرض";
        if(val.request_type == 1)
          request_type = "عرض";
        else if(val.request_type == 2)
          request_type = "طلب";
        else if(val.request_type == 3)
          request_type = "إيجار";

        $.get( base_url +  "index.php/home/get_real_easte_type/" + val.type , function( data ) {
            var real_easte_typee = data;
            $("#easte_type").val(val.type);
            $("#easte_id").val(real_id)

            content = "رقم العرض :- "+ val.id + "\n"+
            "نوع الطلب :- " + request_type + "\n"+
            "نوع العقار :- " + real_easte_typee + "\n"+
            "فئة العقار :- "+  val.category + "\n" +
            " السعر :- " + val.price + "\n" +
            "ملاحظات :- " + val.note + "\n";

            window.open(tweet_url+content);
            //alert(tweet_url+content);

        } , 'html' );

    });
  });


}

function isChecked(){

  if (document.getElementById('have_comments').checked)
  {
  }
}

// send copied text via whatsapp
function sendSelectedTextViaWhatsapp(){

    var rows = $('.selected');
    var real_data = "";
    var count = 0;
    real_data += "بورصة الوساطة التعاونية الذكية\n\n";

    rows.each(function(){
      count++;
      var columns   = $(this).find('td > input');
      var id        = $(this).children().children()[0].value
      var api       = base_url + "index.php/home/get_real_easte_data_as_json/" + id;

      $.ajaxSetup({
          async: false
      });

      var rowIndex        = $(this).index();
      var ad_id           = $('tr:eq(' + (rowIndex + 1) + ') td:eq(0)').children().val();
      var request_type    = $('tr:eq(' + (rowIndex + 1) + ') td:eq(1)').text();
      var type_name       = $('tr:eq(' + (rowIndex + 1) + ') td:eq(2)').text();
      var category        = $('tr:eq(' + (rowIndex + 1) + ') td:eq(3)').text();
      var space           = $('tr:eq(' + (rowIndex + 1) + ') td:eq(5)').text();
      //var neighborhood    = $('tr:eq(' + (rowIndex + 1) + ') td:eq(11)').children().find('.short-text').text() + ' ' + $('tr:eq(' + (rowIndex + 1) + ') td:eq(11)').children().find('.long-text').text()
      var neighborhood    = $('tr:eq(' + (rowIndex + 1) + ') td:eq(11)').text();// .children().find('.short-text').text() + ' ' + $('tr:eq(' + (rowIndex + 1) + ') td:eq(11)').children().find('.long-text').text()
      var income          = $('tr:eq(' + (rowIndex + 1) + ') td:eq(13)').text();
      var price           = $('tr:eq(' + (rowIndex + 1) + ') td:eq(14)').text();
      var note            = $('tr:eq(' + (rowIndex + 1) + ') td:eq(20)').children().find('.short-text').text() + ' ' + $('tr:eq(' + (rowIndex + 1) + ') td:eq(20)').children().find('.long-text').text();

      neighborhood = neighborhood.replace('...المزيد','');

      real_data +=  "رقم الاعلان :- " + ad_id;
      real_data +=  "\nنوع العقار: " + type_name ;
      real_data +=  "\n فئة العقار : " + category;
      real_data +=  "\nالحي :- " + neighborhood;
      if(parseInt(income) > 0)
        real_data +=  "\nالدخل :- " + income;
      real_data +=  "\nالمساحة : " + space;
      real_data += "\nالسعر :- " + price;
      real_data +=  "\nتفاصيل أكثر : " + note + "\n";
      real_data +=  "==========================================\n";

    });// end of rows

    if(count == 0){
      real_data = "";
    }

    var $temp = $("<textarea contenteditable='true' >");
    $("body").append($temp);
    $temp.val(real_data).select();
    document.execCommand("copy");
    $temp.remove();

    $("#whatsmsg").val(real_data);
    $("#location").prop('disabled', true);
    console.log('show whats app')
    $('#id01').show();
    document.getElementById('id01').style.display='block';

}

// get selected rows with maps
function getSelectedRowsWithMap(){

    var rows = $('.selected');
    var real_data = "";
    real_data += "بورصة الوساطة التعاونية الذكية\n\n";

    rows.each(function(){

      var columns   = $(this).find('td > input');
      var id        = $(this).children().children()[0].value
      var api       = base_url + "index.php/home/get_real_easte_data_as_json/" + id;
      var url       = "https://www.google.com/maps/search/?api=1&query=";

      $.ajaxSetup({
          async: false
      });
      $.getJSON( api , function(data){
          $.each( data , function( key, val ){
                var request_type = "عرض";
                if(val.request_type == 1)
                  request_type = "عرض";
                else if(val.request_type == 2)
                  request_type = "طلب";
                else if(val.request_type == 3)
                  request_type = "إيجار";

                real_data +=  "رقم الاعلان :- " + val.id;
                real_data +=  "\nنوع العقار: " + val.type_name ;
                real_data +=  "\n فئة العقار : " + val.category;
                real_data +=  "\nالحي :- " + val.neighborhood_name;
                if(val.income > 0)
                  real_data +=  "\nالدخل :- " + val.income;
                real_data +=  "\nالمساحة : " + val.space;
                real_data +=  "\nتفاصيل أكثر : " + val.note + "\n";

                if(val.y == 0 || val.x == 0)
                  real_data +=  "==========================================\n";
                else{
                  real_data +=  "الموقع على الخريطة : " + url + val.y + "," + val.x + "\n";
                  real_data +=  "==========================================\n";
                }


          });

      });
    });// end of rows

    $.ajaxSetup({
        async: true
    });

    var $temp = $("<textarea contenteditable='true' >");
    $("body").append($temp);
    $temp.val(real_data).select();
    document.execCommand("copy");
    $temp.remove();

    alert("تم النسخ");

}

// send to whatsapp with map
function sendCopyRowsToWhatsWithMap(){

  var rows = $('.selected');
  var real_data = "";
  real_data += "بورصة الوساطة التعاونية الذكية\n\n";

  rows.each(function(){

    var columns   = $(this).find('td > input');
    var id        = $(this).children().children()[0].value
    var api       = base_url + "index.php/home/get_real_easte_data_as_json/" + id;
    var url       = "https://www.google.com/maps/search/?api=1&query=";

    $.ajaxSetup({
        async: false
    });
    $.getJSON( api , function(data){
        $.each( data , function( key, val ){
              var request_type = "عرض";
              if(val.request_type == 1)
                request_type = "عرض";
              else if(val.request_type == 2)
                request_type = "طلب";
              else if(val.request_type == 3)
                request_type = "إيجار";

              real_data +=  "رقم الاعلان :- " + val.id;
              real_data +=  "\nنوع العقار: " + val.type_name ;
              real_data +=  "\n فئة العقار : " + val.category;
              real_data +=  "\nالحي :- " + val.neighborhood_name;
              if(val.income > 0)
                real_data +=  "\nالدخل :- " + val.income;
              real_data +=  "\nالمساحة : " + val.space;
              real_data +=  "\nتفاصيل أكثر : " + val.note + "\n";

              if(val.y == 0 || val.x == 0)
                real_data +=  "==========================================\n";
              else{
                real_data +=  "الموقع على الخريطة : " + url + val.y + "," + val.x + "\n";
                real_data +=  "==========================================\n";
              }


        });

    });
  });// end of rows

  $.ajaxSetup({
      async: true
  });

  var $temp = $("<textarea contenteditable='true' >");
  $("body").append($temp);
  $temp.val(real_data).select();
  document.execCommand("copy");
  $temp.remove();

  $("#whatsmsg").val(real_data);
  $("#location").prop('disabled', true);

  document.getElementById('id01').style.display='block';

}
