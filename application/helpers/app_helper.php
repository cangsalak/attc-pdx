<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('is_allowed')) {
	function is_allowed($permission = '') {
		$ci =& get_instance();
		if ($permission == '') {
	    die("parameter `is_allowed` not empty");
	  }else {
	    $ci->load->library("auth");
	    $ci->auth->created_permission($permission);
	    if ($ci->auth->is_allowed($permission)) {
	      return true;
	    }else {
	      return false;
	    }
	  }
	}
}

if(!function_exists('set_message')) {
	function set_message($type = 'info', $message = null) {
		$ci =& get_instance();
		$ci->session->set_flashdata(['tt_message'=> "$message", 'tt_type'=> "$type"]);
	}
}


if(!function_exists('profile')) {
	function profile($field)
	{
	  $ci=& get_instance();
	  $qry = $ci->db->select("auth_user_to_group.id_user AS id_user,
	                          auth_user_to_group.id_group AS id_group,
	                          auth_user.`name` AS name,
	                          auth_user.email AS email,
	                          auth_user.`password` AS password,
	                          auth_user.token AS token,
														auth_user.photo AS photo,
	                          auth_user.is_active AS is_active,
														auth_user.last_login AS last_login,
	                          auth_user.created AS created,
	                          auth_user.modified AS modified,
	                          auth_user.is_delete AS is_delete,
	                          auth_group.`group` AS group,
	                          auth_group.definition AS definition_group")
	                  ->from("auth_user_to_group")
	                  ->join("auth_user","auth_user.id_user = auth_user_to_group.id_user","left")
	                  ->join("auth_group","auth_group.id = auth_user_to_group.id_group","left")
	                  ->where("auth_user_to_group.id_user",sess("id_user"))
	                  ->get()
	                  ->row();
	    return $qry->$field;
	}
}

if (!function_exists('cclang'))
{
    function cclang($langkey = null, $params = [])
    {
    	if (!is_array($params)) {
    		$params = [$params];
    	}

        $lang = lang($langkey);

        $idx = 1;
        foreach ($params as $value) {
        	$lang = str_replace('$'.$idx++, $value, $lang);
        }

        $lang = preg_replace('/\$([0-9])/', '', $lang);

        if (!$lang) {
        	return ucwords($langkey);
        }

        return $lang;
    }
}



//pass hash
if(!function_exists('pass_encrypt')) {
	function pass_encrypt($token,$str)
	{
	    $ecrypt = password_hash($str."".$token,PASSWORD_DEFAULT);
	    return $ecrypt;
	}
}

if(!function_exists('pass_decrypt')) {
	function pass_decrypt($token,$str,$hash)
	{
	    if (password_verify($str."".$token, $hash)) {
	        return true;
	    }else {
	        return false;
	    }
	}
}

if(!function_exists('get_url')) {
	function get_url($params = "pagenotfound")
	{
		return site_url(ADMIN_ROUTE."/$params");
	}
}

if(!function_exists('url')) {
	function url($params = "pagenotfound")
	{
		return site_url(ADMIN_ROUTE."/$params");
	}
}


function dateTimeFormat($str)
{
	$date = date("Y-m-d", strtotime($str));
	$time = date("H:i", strtotime($str));
	return $date."T".$time;
}

function changeText($str)
{
	$text ='';
	$arr = explode("_",$str);
	for ($i=1; $i < count($arr) ; $i++) {
		$text.= $arr[$i]." ";
	}

	// $exp = implode(" ",$text);

	return ucwords($text);
}

if (!function_exists('is_image')) {
	function is_image($params = false, $class = "", $style = "")
	{
		$str = '';
		if ($params) {
			if (file_exists(FCPATH."_temp/uploads/img/$params")) {
				$str.='<a href="'.base_url().'_temp/uploads/img/'.$params.'" data-fancybox="gallery" title="'.$params.'">
		              <img src="'.base_url().'_temp/uploads/img/'.$params.'" alt="'.$params.'" style="'.$style.'" class="'.$class.'" />
		            </a>';
			}else {
				$str.='<a href="'.base_url().'_temp/uploads/noimage.jpg" data-fancybox="gallery" title="No Image Available">
		              <img src="'.base_url().'_temp/uploads/noimage.jpg" alt="noimage" style="'.$style.'" class="'.$class.'" />
		            </a>';
			}
		}else {
			$str.='<a href="'.base_url().'_temp/uploads/noimage.jpg" data-fancybox="gallery" title="No Image Available">
	              <img src="'.base_url().'_temp/uploads/noimage.jpg" alt="noimage" style="'.$style.'" class="'.$class.'" />
	            </a>';
		}

		return $str;
	}
}

if (!function_exists('is_select')) {
	function is_select($table, $attribute, $value, $label, $entry_value = "")
	{
		$ci=& get_instance();
		$str = "";
		$qry =  $ci->db->get($table);
		$str.= '<select class="form-control form-control-sm select2" data-placeholder=" -- Select -- " name="'.$attribute.'">';
		$str.= '<option value=""></option>';
		foreach ($qry->result() as $row) {
			$str.='<option '.($row->$value == $entry_value ? "selected":"").' value="'.$row->$value.'">'.$row->$label.'</option>';
		}
		$str.= '</select>';
		$str.='<div  id="'.$attribute.'"></div>';

		return $str;
	}
}

if (!function_exists('is_radio')) {
	function is_radio($table, $attribute, $value, $label, $entry_value = "")
	{
		$ci=& get_instance();
		$str = "";
		$qry =  $ci->db->get($table);
		$get_where = $ci->db->get_where("$table",["$value"=>"$entry_value"]);
		foreach ($qry->result() as $row) {
			$str.= '<div class="form-check">';
			$str.= '<label class="form-check-label">';
			$str.= '<input type="radio" '.($row->$value == $entry_value ? "checked":"").' class="form-check-input" name="'.$attribute.'" value="'.$row->$value.'">';
			$str.= $row->$label;
			$str.= '<i class="input-helper"></i>';
			$str.= '</label>';
			$str.= '</div>';
		}
		$str.= '<input type="radio" '.($get_where->num_rows() < 1 ? "checked":"").' name="'.$attribute.'" value="" style="display:none" />';
		$str.= '<div id="'.$attribute.'"></div>';

		return $str;
	}
}

if (!function_exists('is_select_filter')) {
	function is_select_filter($table, $attribute, $value, $label, $label_title, $entry_value = "")
	{
		$ci=& get_instance();
		$str = "";
		$qry =  $ci->db->get($table);
		$str.= '<select class="form-control form-control-sm" name="'.$attribute.'" id="'.$attribute.'">';
		$str.= '<option value="">-- Select '.$label_title.' --</option>';
		foreach ($qry->result() as $row) {
			$str.='<option '.($row->$value == $entry_value ? "selected":"").' value="'.$row->$value.'">'.$row->$label.'</option>';
		}
		$str.= '</select>';

		return $str;
	}
}

if (!function_exists('is_radio_filter')) {
	function is_radio_filter($table, $attribute, $value, $label, $entry_value = "")
	{
		$ci=& get_instance();
		$str = "";
		$qry =  $ci->db->get($table);
		foreach ($qry->result() as $row) {
			$str.= '<div class="form-check">';
			$str.= '<label class="form-check-label">';
			$str.= '<input type="radio" id="'.$attribute.'" '.($row->$value == $entry_value ? "checked":"").' class="form-check-input" name="'.$attribute.'" value="'.$row->$value.'">';
			$str.= $row->$label;
			$str.= '<i class="input-helper"></i>';
			$str.= '</label>';
			$str.= '</div>';
		}

		return $str;
	}
}

// if (!function_exists('is_button')) {
// 	function is_button($allowed, $button, $uri = "")
// 	{
// 		$str = '';
// 		if (is_allowed($allowed)) {
// 			if ($button == 'add') {
// 				$str.='<a href="'.$uri.'" class="btn btn-sm btn-success btn-icon-text"><i class="fa fa-file btn-icon-prepend"></i>'.cclang("add_new").'</a>';
// 			}elseif ($button == 'filter') {
// 				$str.='<a href="'.$uri.'" id="filter-show" class="btn btn-sm btn-primary btn-icon-text"><i class="mdi mdi-magnify btn-icon-prepend"></i> Filter</a>';
// 			}elseif ($button == 'detail') {
// 				$str.='<a href="'.$uri.'" id="detail" class="btn btn-primary" title="'.cclang("detail").'"><i class="mdi mdi-file"></i></a>';
// 			}elseif ($button == 'update') {
// 				$str.='<a href="'.$uri.'" id="update" class="btn btn-warning" title="'.cclang("update").'"><i class="ti-pencil"></i></a>';
// 			}elseif ($button == 'delete') {
// 				$str.='<a href="'.$uri.'" id="delete" class="btn btn-danger" title="'.cclang("delete").'"><i class="ti-trash"></i></a>';
// 			}else {
// 				$str.='<a href="'.$uri.'" id="default" class="btn btn-default" title="default"><i class="mdi mdi-file"></i></a>';
// 			}
// 		}
// 		return $str;
// 	}
// }



//combobox
if(!function_exists('is_combo')) {
	function is_combo($table,$id_name,$id_field,$name_field,$value)
	{
	  $ci=& get_instance();
	  $qry = $ci->db->get_where("$table",["id !="=>"1"]);
	  $str = '<select class="form-control" name="'.$id_name.'" id="'.$id_name.'">';
	  $str .= '<option value="">-- Select --</option>';
	  foreach ($qry->result() as $row) {
	    $str .='<option value="'.$row->$id_field.'" ';
	    $str .=  $value==$row->$id_field ? "selected>":">";
	    $str .= $row->$name_field;
	    $str .='</option>';
	  }
	  $str .= '<select>';

	  return $str;
	}
}

if(!function_exists('system_info')) {
function system_info()
{
    $CI =& get_instance();
    
    // Load the required classes
    $CI->load->helper('file');
    $CI->load->library('user_agent');

    // Get some basic server info
    $server_info = array(
		'PHP Version' => phpversion(),
		'Server IP' => $_SERVER['SERVER_ADDR'],
		'Server Name' => $_SERVER['SERVER_NAME'],
		'Server Software' => $_SERVER['SERVER_SOFTWARE'],
		'Server Protocol' => $_SERVER['SERVER_PROTOCOL'],
		'Request Method' => $_SERVER['REQUEST_METHOD'],
		'IP Address' => gethostbyname($_SERVER['HTTP_HOST']),
		'Server Administrator' => $_SERVER['SERVER_ADMIN'],
		'Server Port' => $_SERVER['SERVER_PORT'],
		'Document Root' => $_SERVER['DOCUMENT_ROOT'],
		'Script Name' => $_SERVER['SCRIPT_NAME'],
		'Script Filename' => $_SERVER['SCRIPT_FILENAME'],
		'Gateway Interface' => $_SERVER['GATEWAY_INTERFACE'],
		'HTTP Connection' => $_SERVER['HTTP_CONNECTION'],
		'HTTP Accept' => $_SERVER['HTTP_ACCEPT'],
		'HTTP Accept-Encoding' => $_SERVER['HTTP_ACCEPT_ENCODING'],
		'HTTP Accept-Language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
		'HTTP User-Agent' => $_SERVER['HTTP_USER_AGENT'],
		'Remote Address' => $_SERVER['REMOTE_ADDR'],
		'Remote Port' => $_SERVER['REMOTE_PORT'],
		'Session Save Path' => session_save_path(),
		'Session ID' => session_id(),
		'Session Name' => session_name(),
	);


    // Get some basic CodeIgniter info
    $ci_info = array(
        'CI Version' => CI_VERSION,
        'CI Base URL' => base_url(),
        'CI User Agent' => $CI->agent->agent_string(),
        'CI Language' => $CI->config->item('language'),
        'CI Timezone' => $CI->config->item('time_zone'),
        'CI Session Driver' => $CI->config->item('sess_driver'),

        'Application' => $CI->config->item('app'),
        'author' => $CI->config->item('author'),
        'Version' => $CI->config->item('version'),
        'facebook' => $CI->config->item('facebook'),
        'fanspage' => $CI->config->item('fanspage'),
        'youtube' => $CI->config->item('youtube'),
        'website' => $CI->config->item('website'),

        'url_suffix' => $CI->config->item('url_suffix'),
        'language' => $CI->config->item('language'),
        'charset' => $CI->config->item('charset'),
        'log_date_format' => $CI->config->item('log_date_format'),
        'encryption_key' => $CI->config->item('encryption_key'),
        'encryption_url' => $CI->config->item('encryption_url'),
        'rest_default_format' => $CI->config->item('rest_default_format'),
        'rest_auth' => $CI->config->item('rest_auth'),
        'rest_key_column' => $CI->config->item('rest_key_column'),
        'rest_logs_table' => $CI->config->item('rest_logs_table'),
        'rest_access_table' => $CI->config->item('rest_access_table')
    );

    // Output the information in a nicely formatted table
    echo "<h4>Server Information</h4>";
    echo "<div class='table table-responsive'>";
    echo "<table class='table-setting table-striped table-hover'>";
    foreach ($server_info as $key => $value) {
        echo "<tr><td>{$key}</td><td>{$value}</td></tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<br>";
    echo "<h4>CodeIgniter Information</h4>";
    echo "<div class='table table-responsive'>";
    echo "<table class='table-setting table-striped table-hover'>";
    foreach ($ci_info as $key => $value) {
        echo "<tr><td>{$key}</td><td>{$value}</td></tr>";
    }
    echo "</table>";
    echo "</div>";
}
}
