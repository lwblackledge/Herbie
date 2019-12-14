<?
$trooper_id=$row["trooper_id"];
$tkid=$row["tkid"];

// APRIL FOOLS 2015
//$first_name=$row["first_name"];

if ($april_fools == 1) {
	$first_name = "Mike";
	$full_name = "Mike " . $row["last_name"];
} else {
	$first_name = $row["first_name"];
	$full_name = $row["first_name"] . " " . $row["last_name"];
}
// END APRIL FOOLS 2015

$last_name=$row["last_name"];
//	$full_name = $row["first_name"] . " " . $row["last_name"];
	
$e_mail=$row["e_mail"];
$city=$row["city"];
$state_id=$row["state_id"];
$state_name=$row["state_name"];
$state_abbr=$row["state_abbr"];
$member_since = $row["member_since"];
$classified = $row["classified"];
$costume_id=$row["costume_id"];
$costume_abbr=$row["costume_abbr"];
$costume_name=$row["costume_name"];
$outfit_id=$row["outfit_id"];
$outfit_variant=$row["outfit_variant"];
$active_flag=$row["active_flag"];
$status_id=$row["status_id"];
$status=$row["status"];
$role_id=$row["role_id"];
$role_name=$row["role_name"];
$role_abbr=$row["role_abbr"];
$event_id=$row["event_id"];
$event_name=$row["event_name"];
$event_description = $row["event_description"];
$event_date=$row["event_date"];
$event_city=$row["event_city"];
$event_state=$row["event_state"];
$funds_raised=$row["funds_raised"];
$forum_topic_id=$row["forum_topic_id"];
$is_private=$row["is_private"];
$is_active=$row["is_active"];
$dl_cat_id=$row['dl_cat_id'];
$dl_cat_name=$row['dl_cat_name'];
$dl_url=$row['dl_url'];
$dl_name=$row['dl_name'];
$dl_content=$row['dl_content'];
$dl_tn=$row['dl_tn'];
$chcomm_id = $row['chcomm_id'];
$chcomm_name = $row['chcomm_name'];
$chcomm_address1 = $row['chcomm_address1'];
$chcomm_address2 = $row['chcomm_address2'];
$chcomm_city = $row['chcomm_city'];
$chcomm_state = $row['chcomm_state'];
$chcomm_postcode = $row['chcomm_postcode'];
$chcomm_phone1 = $row['chcomm_phone1'];
$chcomm_phone2 = $row['chcomm_phone2'];
$chcomm_fname = $row['chcomm_fname'];
$chcomm_lname = $row['chcomm_lname'];
$chcomm_email = $row['chcomm_email'];
$chcomm_lastedit = $row['chcomm_lastedit'];
$event_file = $row['event_file'];
?>
