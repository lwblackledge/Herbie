<?php
include ("z_header.php");
require_once('magpierss/rss_fetch.inc');
$url='http://www.501st.com/news.php';
?>

<div class="mainbar">
<h1>Featured Member</h1>

	<?php include ("index_featmem.php"); ?>

<P>
<h1>501st Legion News</h1>
<?php
$num_items=10;
$rss = fetch_rss($url);
$items = array_slice($rss->items, 0, $num_items);

foreach ($items as $item ) {
	$title = $item[title];
	$url   = $item[link];
	$description = $item[description];
	echo "<a href=$url>$title</a><br>$description<br><br>
";
}
?>

</div>
<div class="sidebar">
    <h1>Newest Members</h1>
	<?php include ("index_newestrecruits.php"); ?>

    <h1>Events</h1>
    
    <?php include ("index_events.php"); ?>
    
    <!--h1>Friends of</h1-->



</div>
<div style="clear: both;"></div>

<?php include ("z_footer.php"); ?>
