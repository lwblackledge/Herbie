<?php

// Adding PHP7 coalesce checks to prevent notice errors.

$trooper_id=$row["trooper_id"] ?? null;
$tkid=$row["tkid"] ?? null;

// APRIL FOOLS 2015
//$first_name=$row["first_name"];

if ($april_fools == 1) {
	$first_name = "Mike";
	$full_name = "Mike " . ($row["last_name"] ?? '');
} else {
	$first_name = $row["first_name"]  ?? '';
	$full_name = $first_name . " " . ($row["last_name"] ?? '');
}
// END APRIL FOOLS 2015

$last_name=$row["last_name"] ?? null;
//	$full_name = $row["first_name"] . " " . $row["last_name"];
	
$e_mail=$row["e_mail"] ?? null;
$city=$row["city"] ?? null;
$state_id=$row["state_id"] ?? null;
$state_name=$row["state_name"] ?? null;
$state_abbr=$row["state_abbr"] ?? null;
$member_since = $row["member_since"] ?? null;
$classified = $row["classified"] ?? null;
$costume_id=$row["costume_id"] ?? null;
$costume_abbr=$row["costume_abbr"] ?? null;
$costume_name=$row["costume_name"] ?? null;
$outfit_id=$row["outfit_id"] ?? null;
$outfit_variant=$row["outfit_variant"] ?? null;
$active_flag=$row["active_flag"] ?? null;
$status_id=$row["status_id"] ?? null;
$status=$row["status"] ?? null;
$role_id=$row["role_id"] ?? null;
$role_name=$row["role_name"] ?? null;
$role_abbr=$row["role_abbr"] ?? null;
$event_id=$row["event_id"] ?? null;
$event_name=$row["event_name"] ?? null;
$event_description = $row["event_description"] ?? null;
$event_date=$row["event_date"] ?? null;
$event_city=$row["event_city"] ?? null;
$event_state=$row["event_state"] ?? null;
$funds_raised=$row["funds_raised"] ?? null;
$forum_topic_id=$row["forum_topic_id"] ?? null;
$is_private=$row["is_private"] ?? null;
$is_active=$row["is_active"] ?? null;
$dl_cat_id=$row['dl_cat_id'] ?? null;
$dl_cat_name=$row['dl_cat_name'] ?? null;
$dl_url=$row['dl_url'] ?? null;
$dl_name=$row['dl_name'] ?? null;
$dl_content=$row['dl_content'] ?? null;
$dl_tn=$row['dl_tn'] ?? null;
$chcomm_id = $row['chcomm_id'] ?? null;
$chcomm_name = $row['chcomm_name'] ?? null;
$chcomm_address1 = $row['chcomm_address1'] ?? null;
$chcomm_address2 = $row['chcomm_address2'] ?? null;
$chcomm_city = $row['chcomm_city'] ?? null;
$chcomm_state = $row['chcomm_state'] ?? null;
$chcomm_postcode = $row['chcomm_postcode'] ?? null;
$chcomm_phone1 = $row['chcomm_phone1'] ?? null;
$chcomm_phone2 = $row['chcomm_phone2'] ?? null;
$chcomm_fname = $row['chcomm_fname'] ?? null;
$chcomm_lname = $row['chcomm_lname'] ?? null;
$chcomm_email = $row['chcomm_email'] ?? null;
$chcomm_lastedit = $row['chcomm_lastedit'] ?? null;
$event_file = $row['event_file'] ?? null;
