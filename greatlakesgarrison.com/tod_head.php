<?php
// TOD header image randomizer

$head_filename[] = "grandville08";
$head_name[] = "Grandville Fourth of July Parade, 7/3/08";

$head_filename[] = "mcdonald06";
$head_name[] = "Ronald McDonald House Carnival, 5/13/06";

$head_filename[] = "bessemer07";
$head_name[] = "Bessemer Chamber of Commerce X-Mas Party, 12/22/07";

$head_filename[] = "stpats07";
$head_name[] = "Detroit St. Patrick's Day Parade, 3/11/07";

$head_filename[] = "tigers09";
$head_name[] = "Detroit Tigers '80s Night, 5/4/09";

$total = sizeof($head_filename);
$random_pick = rand(0, $total-1);

echo "<div style=\"text-align: center; font-style: italic; font-size: 8px; color: #ffffff; letter-spacing: 2px\">
<img src=\"img/tod_head_$head_filename[$random_pick].png\" width=500 height=200 style=\"border: 1px solid #2e4c82\" alt=\"$head_name[$random_pick]\" title=\"$head_name[$random_pick]\"><br>
$head_name[$random_pick]
</div>
";
