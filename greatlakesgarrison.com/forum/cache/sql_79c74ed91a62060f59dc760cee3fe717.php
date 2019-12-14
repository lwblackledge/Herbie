<?php exit; ?>
1576251227
SELECT * FROM phpbb3_bbcodes WHERE bbcode_id = 17
1023
a:1:{i:0;a:10:{s:9:"bbcode_id";s:2:"17";s:10:"bbcode_tag";s:7:"youtube";s:15:"bbcode_helpline";s:103:"Copy ONLY the string following &quot;v=&quot; in the URL and paste between the [youtube][/youtube] tags";s:18:"display_on_posting";s:1:"1";s:12:"bbcode_match";s:25:"[youtube]{TEXT}[/youtube]";s:10:"bbcode_tpl";s:176:"<embed style="width:400px; height:326px;" src="http://www.youtube.com/v/{TEXT}"><br>
<a href="http://www.youtube.com/watch?v={TEXT}" target="_blank">Full version on YouTube</a>";s:16:"first_pass_match";s:33:"!\[youtube\](.*?)\[/youtube\]!ies";s:18:"first_pass_replace";s:142:"'[youtube:$uid]'.str_replace(array("\r\n", '\"', '\'', '(', ')'), array("\n", '"', '&#39;', '&#40;', '&#41;'), trim('${1}')).'[/youtube:$uid]'";s:17:"second_pass_match";s:41:"!\[youtube:$uid\](.*?)\[/youtube:$uid\]!s";s:19:"second_pass_replace";s:172:"<embed style="width:400px; height:326px;" src="http://www.youtube.com/v/${1}"><br>
<a href="http://www.youtube.com/watch?v=${1}" target="_blank">Full version on YouTube</a>";}}