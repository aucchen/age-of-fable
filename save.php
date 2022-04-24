 
<?php
@include "header.txt";
?>
<div align="center"><img style="border:0px" src="http://www.apolitical.info/webgame/images/savegamelarge.gif"></div>
<div>&nbsp</div>
<div align="center"><b>TO SAVE YOUR GAME</b></div>
<div>&nbsp</div>
<table align="center" width="50%">
<tr><td>Copy the following text, then paste it into a program like Word or Notepad and save it. To start your game from the same place, open up the file, select all the text, and paste it into your web browser.</td></tr>
<tr></tr>
<tr><td>
<?php
$fullink="<div><b>game.php?para=".$para."&carry=".$carry."&street=".$street."&square=".$square."&weapon=".$weapon."&world=".$world."&blessings=".$blessings."&name=".$name."&prof=".$prof."&shells=".$shells."&maxsta=".$maxsta."&creda=".$creda."&rolls=".$rolls."</b></div>";
print wordwrap($fullink,100,"<br>",true);
?>
</td></tr>
</table>
<div>&nbsp</div>
<div align="center">Any problems, please email me: news (at) apolitical (dot) info</div>
<div>&nbsp</div>
<div align="center">
<!-- Project Wonderful Ad Box Code -->
<div id="pw_adbox_1077_2_0"></div>
<!-- End Project Wonderful Ad Box Code -->
<div>&nbsp</div>
<div><?php
@include "footer.txt";
?></div>
<div>&nbsp</div>
<div>
 
