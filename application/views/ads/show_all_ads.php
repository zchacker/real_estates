<?php

$result = $this->login_model->get_news_sttings()->result()[0];

$bg_color = $result->n_background;
$front_color = $result->n_forground;
$font_size = $result->n_font;
$hight = $result->n_height;
$word_color = $result->word_color;

$type = $result->type;
$speed = $result->speed;
$direction = $result->direction;
$limit_rows = $result->limit_rows;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>عرض العقارات</title>
    <style media="screen">
      marquee{
        position: fixed;
        top: 45%;
        left: 0;
        z-index: 999;
        height: <?=$hight?>px;
        background-color: #<?=$bg_color;?>;
        color: #<?=$front_color?>;
        font-size: <?=$font_size?>px;
        display: block;
      }
      marquee > a{
        color: #<?=$front_color?>;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <?php

    	$dir = "right";
    	if($direction == 1)
    		$dir = "right";
    	else
    		$dir = "left";

    	echo "<marquee  behavior='scroll' scrollamount='$speed' direction='$dir' onmouseover='this.stop();' onmouseout='this.start();'>";
    	$real_eastes = $this->login_model->get_real_data($result)->result();
    	foreach ($real_eastes as $key => $value) {

    		$request_type = "معروض";
    		if($value->request_type == 1)
    			$request_type = "معروض";
    		else if($value->request_type == 2)
    			$request_type = "مطلوب";
    		else if($value->request_type == 3)
    			$request_type = "للايجار";

    		echo "<a target='_blank'  href='".base_url() . "real_estate?id=". $value->id ."'><span style='color:#$word_color'> $request_type </span> $value->type_name - اسم المخطط :   $value->planned  - بسعر : $value->price - تفاصيل : $value->note </a> | ";
    	}
    	echo "</marquee>";

    ?>
  </body>
</html>
