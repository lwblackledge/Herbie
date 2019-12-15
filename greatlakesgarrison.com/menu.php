<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

<script type='text/javascript'>

$(document).ready(function(){

// iOS Hover Event Class Fix
if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
$(".menu li").click(function(){  // Update class to point at the head of the list
});

}

});

</script> 
<?php

$link_array = array (
		"501st Legion" => "501st.com",
		"Midwest Garrison (IL)" => "midwestgarrison.com",
		"Wisconsin Garrison" => "wigarrison.com",
		"Ohio Garrison" => "ohio501st.com",
		"Northern Darkness Garrison (north IN)" => "ndgarrison.com",
		"Bloodfin Garrison (south IN)" => "bloodfingarrison.com",
		"Canadian Garrison" => "501st.ca",
		"Rebel Legion (the good guys)" => "rebellegion.com",
		"Great Lakes Base (RL: MI & OH)" => "greatlakesbase.com"
	);

?>
<ul class="menu">
	<li class="top"><a href="index.php" target="_self" class="top_link"><span>Home</span></a></li>
	<li class="top"><a class="top_link"><span class="down">The Garrison</span></a>
	<ul class="sub">
		<li> <a href="about.php">Info & History</a></li>
		<li> <a href="tod.php">Tours of Duty</a></li>
	</ul>
	</li>
	<li class="top"><a class="top_link"><span class="down">Members</span></a>
	<ul class="sub">
		<li> <a href="roster.php">Roster</a></li>
		<li> <a href="ftotm.php">Featured Trooper of the Month</a></li>
	</ul>
	</li>
	<li class="top"><a class="top_link" href="forum"><span>Forum</span></a></li>
	<li class="top"><a class="top_link"><span class="down">Contact</span></a>
	<ul class="sub">
		<li> <a href="http://www.501st.com/request.php" target="_new">Request an Appearance</a></li>
	</ul>
	</li>
	<li class="top"><a class="top_link"><span class="down">Nearby Units</span></a>
	<ul class="sub">
<?php
	foreach ($link_array as $name => $url) {
		echo "		<li> <a href=\"http://www.$url\" target=\"_new\">$name</a></li>
";
	}
?>
	</ul>
	</li>
</ul>
