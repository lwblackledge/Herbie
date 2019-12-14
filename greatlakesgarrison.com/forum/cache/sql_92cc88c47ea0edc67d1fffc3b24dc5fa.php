<?php exit; ?>
1576251883
SELECT * FROM phpbb3_bbcodes WHERE bbcode_id = 13
567
a:1:{i:0;a:10:{s:9:"bbcode_id";s:2:"13";s:10:"bbcode_tag";s:1:"s";s:15:"bbcode_helpline";s:9:"Strikeout";s:18:"display_on_posting";s:1:"1";s:12:"bbcode_match";s:13:"[s]{TEXT}[/s]";s:10:"bbcode_tpl";s:23:"<strike>{TEXT}</strike>";s:16:"first_pass_match";s:21:"!\[s\](.*?)\[/s\]!ies";s:18:"first_pass_replace";s:130:"'[s:$uid]'.str_replace(array("\r\n", '\"', '\'', '(', ')'), array("\n", '"', '&#39;', '&#40;', '&#41;'), trim('${1}')).'[/s:$uid]'";s:17:"second_pass_match";s:29:"!\[s:$uid\](.*?)\[/s:$uid\]!s";s:19:"second_pass_replace";s:21:"<strike>${1}</strike>";}}