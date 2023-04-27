<?php defined('BASEPATH') OR exit('No direct script access allowed');


function sess($str)
{
  $ci =  &get_instance();
  return $ci->session->userdata($str);
}


function setting($kd = null , $field = "value")
{
  $ci =  &get_instance();
  $kd = strtolower($kd);
  $qry = $ci->db->get_where("setting", ["options" => $kd]);
  if ($qry->num_rows() > 0) {
    return $qry->row()->$field;
  }else {
    return "System not available";
  }
}


function imgView($img = "", $class = "img-thumbnail", $style = "")
{
  $str ='';
  if ($img!="") {
    $str.='<a href="'.base_url().'_temp/uploads/img/'.$img.'" data-fancybox="gallery">
              <img src="'.base_url().'_temp/uploads/img/'.$img.'" alt="'.$img.'" style="'.$style.'" class="'.$class.'" />
            </a>';
  }else {
    $str.='<a href="'.base_url().'_temp/uploads/noimage.jpg" data-fancybox="gallery">
              <img src="'.base_url().'_temp/uploads/noimage.jpg" alt="noimage" style="'.$style.'" class="'.$class.'" />
            </a>';
  }

  return $str;
}


function readJSON($path)
{
    $string = file_get_contents($path);
    $obj = json_decode($string);
    return $obj;
}

 function isValidNationalId(string $nationalId)
  {
    $var = $nationalId;
    $srt[0] = substr($var, 0, 1);
    $srt[1] = substr($var, 1, 4);
    $srt[2] = substr($var, 5, 5);
    $srt[3] = substr($var, 10, 2);
    $srt[4] = substr($var, 12, 1);
    return $srt[0]."-".$srt[1]."-".$srt[2]."-".$srt[3]."-".$srt[4];
  }

function notify_message($message, $token)
{
  $queryData = array('message' => $message);
  $queryData = http_build_query($queryData, '', '&');
  $headerOptions = array(
      'http' => array(
          'method' => 'POST',
          'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
              . "Authorization: Bearer " . $token . "\r\n"
              . "Content-Length: " . strlen($queryData) . "\r\n",
          'content' => $queryData
      ),
  );
  $context = stream_context_create($headerOptions);
  $result = file_get_contents(LINE_API, FALSE, $context);
  $res = json_decode($result);
  return $res;
}
function DateThai($strDate)
{
  $strYear = date("Y", strtotime($strDate)) + 543;
  $strMonth = date("n", strtotime($strDate));
  $strDay = date("j", strtotime($strDate));
  $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  $strMonthThai = $strMonthCut[$strMonth];

  return "วันที่ $strDay เดือน $strMonthThai พ.ศ. $strYear";
}

