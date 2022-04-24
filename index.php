<?php
@include "header.txt";
$line="<div>&nbsp</div>";
$startdiv="<div align=\"center\">";
$link=$startdiv."<a href=\"";

extract($_GET);

if (!isset($mode)) {
$mode=0;
}

// NOTE: Unlike game.php, this file doesn't add or subtract 6
// for values over 25, because currently no stat can start over 25.

//these stats are BEFORE the additions to Stamina and Heroism
//class name, then attributes, then name, then gender:
//4=male, 5=female (courtesan counts as female)

$classes=20;
$class=array (
1=> array ("talking cat",1,20,5,15,1,11,1,20,5,20,1,20,"Seti Nur-ishtar",4),
2=> array ("wizard",3,8,8,8,12,20,10,12,9,10,16,4,"Perilandera",5),
3=> array ("scoundrel",5,16,9,12,5,6,1,5,20,20,1,20,"Urang Semalai",4),
4=> array ("bard",8,20,5,5,10,5,5,5,12,20,9,16,"Hisvet Sigrun",5),
5=> array ("knight",10,5,20,15,9,10,20,5,1,10,10,5,"Be-Steadfast Toth",4),
6=> array ("nomad",15,5,13,13,19,5,14,20,1,5,9,1,"Taruk Few-Clothes",4),
7=> array ("pirate",13,13,13,13,20,1,5,5,14,9,1,13,"Two Souls Macout",4),
8=> array ("fairy",1,19,1,1,1,19,10,10,19,19,15,5,"Damael",5),
9=> array ("dwarf",20,5,10,17,3,3,15,15,8,8,8,8,"Longshanks Macabee",4),
10=> array ("barbarian",14,5,14,19,14,5,9,14,10,10,1,5,"Ektor the Patient One",4),
11=> array ("assassin",1,15,15,15,5,11,1,11,15,11,5,15,"Owl-Waits-For-the-Moon",4),
12=> array ("witch",13,13,5,5,1,20,5,15,5,13,20,5,"Sulia Bukawayo",5),
13=> array ("faun",5,20,1,10,5,20,1,20,20,10,7,1,"Hekatotaratos",4),
14=> array ("troll",20,1,10,20,3,10,5,20,5,10,15,1,"Ingvar Arnesson",4),
15=> array ("courtesan",1,20,1,1,8,10,15,1,8,20,15,20,"White Sparrow",5),
16=> array ("fortune-teller",7,15,6,8,12,1,1,15,15,15,10,15,"Goody Atkins",5),
17=> array ("amazon",15,1,17,17,17,1,12,17,1,4,17,1,"Ana Blood-On-The-Arm",5),
18=> array ("lizard-man",19,1,19,19,1,19,19,19,1,1,1,1,"Bright Skin Young Jewel",4),
19=> array ("explorer",19,15,1,1,19,1,14,19,1,14,15,1,"Temperance Jobsworth",4),
20=> array ("aristocrat",1,10,20,1,20,20,1,10,2,20,10,5,"Euphemia",5),


);

// used to have priest:
// 1=> array ("priest",5,12,1,5,12,9,20,12,5,12,20,7,"Be-Steadfast Toth",4),

// attributes

$word=array (
'Stamina' => array ("near death","sickly","sickly","sickly","unhealthy","unhealthy","unhealthy","unremarkable","unremarkable","unremarkable","unremarkable","healthy","healthy","healthy","healthy","robust","robust","robust","unstoppable","unstoppable","unstoppable"),
'Charisma' => array ("null","repulsive","repulsive","hateful","hateful","hateful","annoying","annoying","annoying","innocuous","innocuous","innocuous","likeable","likeable","likeable","charming","charming","charming","mesmerising","mesmerising","mesmerising"),
'Duelling' => array ("null","clumsy","clumsy","clumsy","clumsy","slow","slow","slow","slow","average","average","average","average","agile","agile","agile","agile","dangerous","dangerous","deadly","deadly"),
'Brawling' => array ("null","puny","puny","puny","weak","weak","weak","unremarkable","unremarkable","unremarkable","unremarkable","strong","strong","strong","strong","strong","powerful","powerful","powerful","legendary","legendary"),
'Seafaring' => array ("null","gets seasick in the bath","gets seasick in the bath","landlubber","landlubber","mediocre","mediocre","mediocre","fair","fair","fair","good","good","good","great","great","great","old salt","old salt","old salt","old salt"),
'Magic' => array ("null","powerless","powerless","poor","poor","mediocre","mediocre","mediocre","fair","fair","fair","good","good","good","great","great","great","superb","superb","overwhelming","overwhelming"),
'Heroism' => array ("wicked","wicked","wicked","corrupt","corrupt","selfish","selfish","wavering","wavering","wavering","good-hearted","good-hearted","good-hearted","bold","bold","bold","bold","heroic","heroic","heroic","heroic"),
'Scouting' => array ("null","gets lost in the back yard", "gets lost in the back yard","terrible","terrible","poor","poor","mediocre","mediocre","fair","fair","good","good","good","great","great","great","superb","superb","legendary","legendary"),
'Roguery' => array ("null","terrible","terrible","poor","poor","mediocre","mediocre","mediocre","fair","fair","fair","good","good","good","great","great","great","superb","superb","legendary","legendary"),
'Luck' => array ("null","cursed","cursed","ill-starred","ill-starred","mediocre","mediocre","mediocre","fair","fair","fair","lucky","lucky","lucky","auspicious","auspicious","auspicious","charmed","charmed","blessed","blessed"),
'Healing' => array ("null","terrible","terrible","poor","poor","mediocre","mediocre","mediocre","fair","fair","fair","good","good","good","great","great","great","superb","superb","legendary","legendary"),
'Streetwise' => array ("null","babe in the woods","babe in the woods","clueless","clueless","foolish","foolish","unwise","unwise","fair","fair","alert","alert","alert","crafty","crafty","crafty","cunning as a fox","cunning as a fox","cunning as a shithouse rat","cunning as a shithouse rat"),
);

//number and names of attributes
$attnum=12;
$attributes=array("null","Stamina","Charisma","Duelling","Brawling","Seafaring","Magic","Heroism","Scouting","Roguery","Luck","Healing","Streetwise");

// current character
$stats=array();



print "<table align=\"center\" width=\"100%\">";
print "<tr";
if ($mode==1 or $mode==3 or $mode==6) {
print " valign=\"center\"";
} elseif ($mode<>0) {
print " valign=\"top\"";
}
print "><td width=\"50%\">";
if ($mode==0) {

print $startdiv."<b><a href=\"https://aof.guzh.me/\" target=\"_blank\">Age of Fable for mobile devices</a></b>";
print $line;
print $link."?mode=2&method=1\" onMouseover=\"window.status='randomly generated character'; return true\">Random character</a></div>";
print $line;
print $link."?mode=5\" onMouseover=\"window.status='choose from a list of characters'; return true\">Pre-generated character</a></div>";
print $line;
print $startdiv."Create a custom character, using";
print $link."index.php?mode=4&method=2\" onMouseover=\"window.status='choose your character\'s attributes'; return true\">links</a> or <a href=\"index.php?mode=4&method=1\" onMouseover=\"window.status='choose your character\'s attributes'; return true\">drop-down menus</a></div>";
print $line;
print $link."?mode=6\" onMouseover=\"window.status='link to us'; return true\">Link to Age of Fable</a></div>";
print $line;
print $link."?mode=1\" onMouseover=\"window.status='FAQ'; return true\">Frequently Asked Questions</a></div>";
print $line;
print $link."credits.php\" onMouseover=\"window.status='artist and author details'; return true\">Credits</a></div>";
print $line;
print $startdiv;
// @include "update.txt";
// print $startdiv."Please feel free to leave</div>";
// print $startdiv."any feedback in the</div>";
print $startdiv."<a href=\"guestbook\" onMouseover=\"window.status='leave feedback, or read other people\'s'; return true\" target=\"_blank\">Guestbook</a></div>";
print $startdiv."(opens in a new window)";
print $line;
print $link."index.php?mode=3\" onMouseover=\"window.status='a small list of similar sites'; return true\">Links</a></div>";
print $line;
print $startdiv."Library";
print $link."index.php?mode=7&branch=1\" onMouseover=\"window.status='stories'; return true\">Stories</a> . <a href=\"index.php?mode=7&branch=2\" onMouseover=\"window.status='other resources'; return true\">Games</a></div>";
print $line;
print $link."sourcecode.php\" onMouseover=\"window.status='source-code for Age of Fable'; return true\" target=\"_blank\">Source Code</a></div>";
print $startdiv."(opens in a new window)";
} elseif ($mode==1) {
print $startdiv."<iframe src=\"faq.html\" height=450 frameborder=0></IFRAME></div>";
print $line;
print $link."index.php?mode=0\" onMouseover=\"window.status='back to the starting page'; return true\">back to the main page</a>";
} elseif ($mode==2) {

//$method (for generating stats):
//1=generate randomly
//2=use $rolls (renaming character randomly)
//3=use profession archetype
//4=use $rolls (entering name for character)
//5=use $rolls, but randomise (randomly changing stats)
//6=use $rolls (returning from choosing to enter name or editing)

if (!isset($method)) {
$method=1;
}

//generate initial stats for character
$total=0;

//for random characters only - choose a pre-generated
//character, do that +/- up to 6.

$rolltemplate=rand(1,$classes);

for ($loop=1;$loop<=$attnum;$loop++) {
if ($method==1) {
$stats[$loop]=min(20,max(1,$class[$rolltemplate][$loop]+6-rand(0,12)));
} elseif ($method==3) {
$stats[$loop]=$class[$type][$loop];
} else {
$stats[$loop]=ord($rolls[$loop-1])-64;
if ($attributes[$loop]=="Stamina" or $attributes[$loop]=="Heroism") {
$stats[$loop]=$stats[$loop]-5;
}
}
$total=$total+$stats[$loop];
}

if ($method==5) {
$tweak=array();
$tote=0;
for ($loop=1;$loop<=$attnum;$loop++) {
do {
$tweak[$loop]=rand(0,3)-rand(0,3);
$attnew=$tweak[$loop]+$stats[$loop];
} while ($attnew<1 or $attnew>20);
$tote=$tote+$tweak[$loop];
}
while ($tote<>0) {
if ($tote>0) {
$movement=-1;
} else {
$movement=1;
}
do {
$thisatt=rand(1,$attnum);
$newtweak=$tweak[$thisatt]+$movement;
$newvalue=$stats[$thisatt]+$newtweak;
} while ($newvalue==0 or $newvalue==21 or $newtweak==4 or $newtweak==-4);
$tweak[$thisatt]=$tweak[$thisatt]+$movement;
$tote=$tote+$movement;
}
for ($loop=1;$loop<=$attnum;$loop++) {
$stats[$loop]=$stats[$loop]+$tweak[$loop];
}
}

//balance characters stats
while ($total<>$attnum*10) {
$change=rand(1,$attnum);
$total=$total-$stats[$change];
$stats[$change]=0;
$ideal=($attnum*10)-$total;
if (($ideal>2 and $ideal<19) or ($ideal>0 and $ideal<21 and $method==1)) {
$stats[$change]=$ideal;
} else {
$stats[$change]=rand(1,20);
}
$total=$total+$stats[$change];
}

//decide what class the character is
//(unless you're just re-naming the character)
if ($method<>4 and $method<>2 and $method<>6) {
$score=array();
$lowest=100000;
for ($cloop=1;$cloop<=$classes;$cloop++) {
for ($aloop=1;$aloop<=$attnum;$aloop++) {
$ideal=$class[$cloop][$aloop];
$score[$cloop]=$score[$cloop]+abs($stats[$aloop]-$ideal);
}
$lowest=min($lowest,$score[$cloop]);
}
$prof=0;
do {
$prof++;
} while ($score[$prof]>$lowest);
}
//add 5 to Stamina and Heroism
for ($loop=1;$loop<=$attnum;$loop++) {
if ($attributes[$loop]=="Stamina" or $attributes[$loop]=="Heroism") {
$stats[$loop]=$stats[$loop]+5;
}
}

//generate name if necessary
if (!isset($name) or $name=="") {

// random name elements
// with flags for where they can be: 1=first, 2=last, 3=alone.
// and for genders 4=male, 5=female
//(doesn't apply if used as surname)

$namebit=array (
1=> array ("Be-Steadfast",1,1,1,1,1),
2=> array ("Toth",1,1,1,1,0),
3=> array ("Perilandera",1,1,1,0,1),
4=> array ("Urang",1,1,1,1,0),
5=> array ("Semalai",1,1,1,1,1),
6=> array ("Djemmela",1,0,1,0,1),
7=> array ("Hisvet",1,0,1,0,1),
8=> array ("Tasmetum-sharrat",1,1,1,0,1),
9=> array ("Goodenough",1,1,0,1,1),
10=> array ("Taruk",1,1,1,1,0),
11=> array ("Few-Clothes",1,1,1,1,1),
12=> array ("Two Souls",1,1,1,1,1),
13=> array ("Macout",1,1,1,1,1),
14=> array ("Damael",1,1,1,1,1),
15=> array ("Gadabout",1,1,1,1,1),
16=> array ("Longshanks",1,1,0,1,1),
17=> array ("Ektor",1,0,1,1,0),
18=> array ("the Patient One",0,1,0,0,0),
19=> array ("Owl-Waits-For-The-Moon",1,1,1,1,1),
20=> array ("Sulia",1,1,1,0,1),
21=> array ("Bukawayo",1,1,1,1,1),
22=> array ("Hekatotaratos",1,1,1,1,0),
23=> array ("Ingvar",1,0,1,1,0),
24=> array ("Arnesson",0,1,0,0,0),
25=> array ("White",1,1,0,1,1),
26=> array ("Sparrow",1,1,1,1,1),
27=> array ("Goody",1,0,0,0,1),
28=> array ("Atkins",1,1,0,1,0),
29=> array ("Ana",1,0,1,0,1),
30=> array ("Blood-On-The-Arm",1,1,1,1,1),
31=> array ("Bright Skin",1,1,1,1,1),
32=> array ("Young Jewel",1,1,1,1,1),
33=> array ("Athousandapologies",1,1,1,1,1),
34=> array ("Gottmundsdaughter",0,1,0,0,1),
35=> array ("the Virtuous",0,1,0,1,1),
36=> array ("Sun",1,1,1,1,1),
37=> array ("Mad Tom",1,0,1,1,0),
38=> array ("Wee Jock",1,0,1,1,0),
39=> array ("Padrath",1,1,1,1,1),
40=> array ("Lori",1,1,1,0,1),
41=> array ("Ingrid",1,0,0,0,1),
42=> array ("Macabee",1,1,1,1,1),
43=> array ("du Mal",0,1,0,1,1),
44=> array ("Obadiah",1,0,1,1,0),
45=> array ("Perdus",1,1,1,1,1),
46=> array ("Iakkos",1,0,1,1,0),
47=> array ("the Unwanted Guest",0,1,0,1,1),
48=> array ("Crumhorn",1,1,1,1,1),
49=> array ("Agatha",1,0,0,0,1),
50=> array ("The Magnificent",0,1,0,1,1),
51=> array ("Cathlin",1,0,0,0,1),
52=> array ("Ajibayo",1,1,1,1,0),
53=> array ("Abanazir",1,1,1,1,1),
54=> array ("Notsoblind",0,1,1,1,1),
55=> array ("Deanna",1,0,0,0,1),
56=> array ("Hassan",1,1,1,1,0),
57=> array ("Kittybiscuits",1,1,1,1,1),
58=> array ("Anaxagoras",1,0,1,1,0),
59=> array ("Charis",1,1,1,0,1),
60=> array ("Leofric",1,1,1,1,0),
61=> array ("Idris",1,1,1,1,1),
62=> array ("Betrys",1,1,1,0,1),
64=> array ("Arnheld",1,1,0,1,0),
65=> array ("She-Is-Not-Sterile",1,1,1,0,1),
66=> array ("Artemisios",1,1,1,1,0),
67=> array ("Chariton",1,1,1,1,0),
68=> array ("Dodekatheon",1,1,1,1,0),
69=> array ("Ambrosia",1,0,1,0,1),
70=> array ("Appolonia",1,1,1,0,1),
71=> array ("Charis",1,1,1,0,1),
72=> array ("Dionysia",1,1,1,0,1),
73=> array ("Euphemia",1,0,1,0,1),
74=> array ("Hekabe",1,1,1,0,1),
75=> array ("Kallistrate",1,1,1,0,1),
76=> array ("Snorri",1,1,0,1,0),
77=> array ("Skallagrim",1,1,1,1,0),
78=> array ("Ragnvald",1,1,1,1,0),
79=> array ("Geirmund",1,1,1,1,0),
80=> array ("Sigrun",1,1,1,0,1),
81=> array ("Sigrid",1,0,1,0,1),
82=> array ("Olwen",1,1,1,0,1),
83=> array ("Grimhildr",1,1,1,0,1),
84=> array ("Freygerd",1,1,1,0,1),
85=> array ("Arnthrud",1,1,1,0,1),
86=> array ("Jobsworth",1,1,1,1,1),
87=> array ("Temperance",1,0,0,1,1),
88=> array ("Timeandtide",1,1,1,1,1),
89=> array ("ben Ibrahim",0,1,0,1,0),
90=> array ("Halfull",1,1,0,1,1),
91=> array ("Halfempty",1,1,1,1,1),
92=> array ("Isisnofret",1,1,1,0,1),
93=> array ("Neferu",1,1,1,0,1),
94=> array ("Seti",1,1,1,1,0),
95=> array ("Ishtar-rabi-at",1,1,1,0,1),
96=> array ("Ummi-waqrat",1,1,1,0,1),
97=> array ("Ammat-Baal",1,1,1,0,1),
98=> array ("Yashub-yahad",1,1,1,1,0),
99=> array ("Nur-ishtar",1,1,1,1,0),
100=> array ("Wobblebottom",1,1,1,1,1),
101=> array ("Violet",1,0,0,0,1),
102=> array ("Viola",1,0,0,0,1),
103=> array ("Tibbletibtub",1,1,1,1,1),
104=> array ("Agnes",1,0,0,0,1),
105=> array ("Prudence",1,0,0,0,1),
106=> array ("Barelegs",1,1,0,1,1),
107=> array ("Lackland",1,1,0,1,1),
108=> array ("Boneless",1,1,1,1,1),
109=> array ("Epaminondas",1,0,0,1,0),
110=> array ("Beloved",1,1,1,1,1),
111=> array ("Solemn",1,0,0,1,1),
112=> array ("Brightness",1,1,1,1,1),
113=> array ("Sidebottom",0,1,0,1,1),
114=> array ("Highpants",1,1,0,1,1),
115=> array ("Silka",1,0,1,0,1),
116=> array ("Ichabod",1,0,1,1,0),
117=> array ("Greedyguts",1,1,0,1,1),
118=> array ("Biddy",1,0,0,0,1),
119=> array ("the Wretched",0,1,0,0,0),
120=> array ("Abi-Simti",1,1,1,0,1),
121=> array ("Haroun",1,0,1,1,0),
122=> array ("Huggenkiss",1,1,1,1,1),
);

$namebits=122;

if (rand(1,9)<3) {
// one element
do {
$which=rand(1,$namebits);
} while ($namebit[$which][3]==0 or $namebit[$which][$class[$prof][$attnum+2]]==0);
// OR gender
$name=$namebit[$which][0];
} else {
// two elements
do {
$whichf=rand(1,$namebits);
$whichl=rand(1,$namebits);
} while ($whichf==$whichl or $namebit[$whichf][1]==0 or $namebit[$whichl][2]==0 or $namebit[$whichf][$class[$prof][$attnum+2]]==0 or ($whichl==34 and $class[$prof][$attnum+2]==4) or ($whichl==90 and $class[$prof][$attnum+2]==5));
// gender check only for first name
// but elements 34 is special.
$name=$namebit[$whichf][0]." ".$namebit[$whichl][0];
}
} else {
$name=str_replace(chr(92),chr(0),$name);
}

// replace spaces with ^s
$name=str_replace(" ","^",$name);

//print character, and create $rolls string
print "<table align=\"center\"><tr><td>";
print $startdiv."<img src=\"images/thumb ".$class[$prof][0].".jpg\"></div>";
print $startdiv."<i>".str_replace("^"," ",$name)."</i></div>";
print $startdiv.$class[$prof][0]."</div>";
print "</td><td>";
$rolls="";
print "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
for ($loop=1;$loop<=$attnum;$loop++) {
print "<tr><td>".$attributes[$loop].":</td><td align=\"right\">".$stats[$loop]." (</td><td>";
$rating=$stats[$loop];
if ($attributes[$loop]=="Stamina" or $attributes[$loop]=="Heroism") {
$rating=$rating-5;
}
print $word[$attributes[$loop]][$rating];
print ")</td></tr>";
$rolls=$rolls.chr($stats[$loop]+64);
}
print "</table>";
print "</td></tr></table>";

//options - re-roll or accept character
if ($method==2) {
print "<div align=\"center\">";
print "<form name=\"input\" action=\"index\" method=\"get\">";
print "<input type=\"text\" name=\"name\">";
print "<input type=\"submit\" value=\"enter\">";
print "<input type=\"hidden\" name=\"prof\" value=".$prof.">";
print "<input type=\"hidden\" name=\"rolls\" value=\"".$rolls."\">";
print "<input type=\"hidden\" name=\"mode\" value=2>";
print "<input type=\"hidden\" name=\"method\" value=6>";
print "</form>";
print "</div>";
print $startdiv."Enter the character's name in the text box above and click the 'enter' button, or</div>";
print $link."index.php?mode=2&method=6&rolls=".$rolls."&prof=".$prof."&name=".$name."\" onMouseover=\"window.status='leave the character\'s name as it is'; return true\">leave the name as it is</a></div>";
} else {
print $link."game.php?rolls=".$rolls."&prof=".$prof."&name=".$name."\" onMouseover=\"window.status='start playing'; return true\">start playing with this character</a></div>";
print $line;
print $startdiv."Edit this character, using";
print $link."index.php?mode=4&method=2&rolls=".$rolls."&name=".$name."\" onMouseover=\"window.status='choose your character\'s attributes'; return true\">links</a> or <a href=\"index.php?mode=4&method=1&rolls=".$rolls."&name=".$name."\" onMouseover=\"window.status='choose your character\'s attributes'; return true\">drop-down menus</a></div>";
print $startdiv."or <a href=\"index.php?mode=2&method=5&rolls=".$rolls."&name=".$name."\" onMouseover=\"window.status='make a small, random change to this character'; return true\">randomly change</a> their scores</div>";
print $line;
print $startdiv."rename this character - <a href=\"index.php?mode=2&method=4&prof=".$prof."&rolls=".$rolls."\" onMouseover=\"window.status='random new name for this character'; return true\">randomly</a> or <a href=\"index.php?mode=2&method=2&rolls=".$rolls."&prof=".$prof."&name=".$name."\" onMouseover=\"window.status='enter a name of your choice for this character'; return true\">your choice</a></div>";
print $line;
print $startdiv."New character - <a href=\"index.php?mode=2&method=1\" onMouseover=\"window.status='randomly generate a new character'; return true\">random</a> or <a href=\"index.php?mode=5\" onMouseover=\"window.status='choose from a list of characters'; return true\">pre-generated</a>.</div>";
print $line;
print $startdiv."The following links all open in a new window:</div>";
print $line;
print $link."index.php?mode=6\" onMouseover=\"window.status='link to us'; return true\" target=\"_blank\">Link to Age of Fable</a></div>";
print $line;
print $link."index.php?mode=1\" onMouseover=\"window.status='FAQ'; return true\" target=\"_blank\">Frequently Asked Questions</a></div>";
print $line;
print $link."credits.php\" target=\"_blank\" onMouseover=\"window.status='author and artist details'; return true\">Credits</a></div>";
print $line;
print $startdiv."<a href=\"http://www.apolitical.info/guestbook\" onMouseover=\"window.status='leave feedback, or read other people\'s'; return true\" target=\"_blank\">Guestbook</a></div>";
print $line;
print $link."index.php?mode=3\" onMouseover=\"window.status='a small list of similar sites'; return true\" target=\"_blank\">Links</a></div>";
print $line;
print $startdiv."Library: <a href=\"index.php?mode=7&branch=1\" onMouseover=\"window.status='stories'; return true\" target=\"_blank\">Stories</a> . <a href=\"index.php?mode=7&branch=2\" onMouseover=\"window.status='other resources'; return true\" target=\"_blank\">Games</a></div>";
print $line;
print $link."sourcecode.php\" onMouseover=\"window.status='source-code for Age of Fable'; return true\" target=\"_blank\">Source Code</a></div>";
}
} elseif ($mode==3) {
print $startdiv."<iframe src=\"links.html\" height=450 frameborder=0></IFRAME></div>";
print $line;
print $link."index.php?mode=0\" onMouseover=\"window.status='back to the starting page'; return true\">back to the main page</a></div>";
} elseif ($mode==5) {
if (!isset($order)) {
$classdone=array();
for ($click=1;$click<=$classes;$click++) {
do {
$nextclass=rand(1,$classes);
} while ($classdone[$nextclass]=="done");
$classdone[$nextclass]="done";
$order=$order.chr($nextclass+64);
}
}
if (!isset($orderplace)) {
$orderplace=1;
}
print $line;
print "<table align=\"center\">";
$flag=0;
$x=4;
$y=3;
for ($click=$orderplace;$click<=$orderplace+($x*$y)-1;$click++) {
$bclick=$click;
if ($bclick>$classes) {
$bclick=$bclick-$classes;
}
$loop=ord($order[$bclick-1])-64;
if ($flag==0) {
print "<tr>";
}
print "<td>";
print $startdiv."<a href=\"index.php?mode=2&method=3&type=".$loop."&name=".$class[$loop][$attnum+1]."\" onMouseover=\"window.status='choose ".$class[$loop][$attnum+1]."'; return true\"><img style=\"border-color: #8888FF\" src=\"images/thumb ".$class[$loop][0].".jpg\" alt=\"".$class[$loop][$attnum+1].", a";
$z=substr($class[$loop][0],0,1);
if ($z=="a" or $z=="e") {
print "n";
}

print " ".$class[$loop][0]."\"></a></div>";
print "</td>";
if ($flag==$x-1) {
print "</tr>";
}
$flag++;
if ($flag==$x) {
$flag=0;
}
}
print "</table>";
print $line;
$orderplace=$orderplace+($x*$y);
if ($orderplace>$classes) {
$orderplace=$orderplace-$classes;
}
print $startdiv."Click a picture to choose that character, or</div>";
print $startdiv."<a href=\"index.php?mode=5&order=".$order."&orderplace=".$orderplace."\" onMouseover=\"window.status='see more characters'; return true\">see more characters</a></div>";

} elseif ($mode==6) {
print $startdiv."<img src=\"images/banner.jpg\"></div>";
print $line;
print $startdiv."You can use the image above to link to us. Use the following three lines of code:</div>";
print $line;
print "<ul>";
print "<li><xmp><a href=\"http://www.ageoffable.net\"></xmp>";
print "<li><xmp><img src=\"images/banner.jpg\"></xmp>";
print "<li><xmp></a></xmp>";
print "</ul>";
print $line;
print $startdiv."if you save the banner to your own server, obviously change the address in the second line to whatever address you save the picture to.</div>";
print $line;
print $startdiv."If you want a banner of a different size or shape, please feel free to email:</div>";
print $startdiv."news (at) apolitical (dot) info.</div>";
print $line;
print $link."index.php?mode=0\" onMouseover=\"window.status='back to the starting page'; return true\">back to the main menu</a></div>";
} elseif ($mode==7) {
if (!isset($branch)) {
$branch=2;
}
if ($branch==1) {
print "A small collection of writing in a similar vein to Age of Fable.";
print $line;
print "<ul>";
print "<li>from <a href=\"confessions\" onMouseover=\"window.status='a short extract from \'Confessions of an English Opium-Eater\' by Thomas de Quincy'; return true\">Confessions of an English Opium-Eater</a>";
print $line;
print "<li><a href=\"sarnath\" onMouseover=\"window.status='\'The Doom That Came To Sarnath\', by H.P. Lovecraft'; return true\">The Doom That Came To Sarnath</a>";
print $line;
print "<li><a href=\"garden\" onMouseover=\"window.status='\'The Garden of Adompha\', by Clark Ashton Smith'; return true\">The Garden of Adompha</a>";
print $line;
print "<li><a href=\"gilgalad\" onMouseover=\"window.status='\'Gil-galad Was an Elven-King\', by J.R.R. Tolkien'; return true\">Gil-Galad Was an Elven-King</a>";
print $line;
print "<li><a href=\"jackals\" onMouseover=\"window.status='\'Jackals and Arabs\', by Franz Kafka'; return true\">Jackals and Arabs</a>";
print $line;
print "<li><a href=\"masque\" onMouseover=\"window.status='\'The Masque of the Red Death\', by Edgar Allen Poe; return true\">The Masque of the Red Death</a>";
print $line;
print "<li><a href=\"morthylla\" onMouseover=\"window.status='\'Morthylla\', by Clark Ashton Smith'; return true\">Morthylla</a>";
print $line;
print "<li><a href=\"ozymandias.php\" onMouseover=\"window.status='\'Ozymandias\', by Percy Shelley'; return true\">Ozymandias</a>";
print $line;
print "<li><a href=\"poltarnees.php\" onMouseover=\"window.status='\'Poltarnees, Beholder of Ocean\', by Lord Dunsany'; return true\">Poltarnees, Beholder of Ocean</a>";
print $line;
print "<li><a href=\"tower\" onMouseover=\"window.status='\'The Tower of the Elephant\', by Robert E. Howard'; return true\">The Tower of the Elephant</a>";
print $line;
print "<li><a href=\"worms\" onMouseover=\"window.status='\'Worms of the Earth\', by Robert E. Howard'; return true\">Worms of the Earth</a>";
print $line;
print "<li><a href=\"xanadu\" onMouseover=\"window.status='\'Xanadu\', by Samuel Taylor Coleridge'; return true\">Xanadu</a>";
print $line;
print "<li>This speech by <a href=\"ukleguin.php\" onMouseover=\"window.status='speech by Ursula K. LeGuin'; return true\">Ursula K. Le Guin</a> discusses fantasy cliches.</div>";
} else {
print "<b>Online Games</b>";
print "<ul>";
print "<li><a href=\"http://www.apolitical.info/private/mars\" onMouseover=\"window.status='Under the Moons of Mars'; return true\">Under the Moons of Mars</a> Inspired by the game <a href=\"http://www.boardgamegeek.com/boardgame/54201/the-d6-shooters\">The d6 Shooters</a>, this game is set in a science fictional version of the planet Mars.</div>";
print $line;
print "<li><a href=\"http://www.apolitical.info/blaze\" onMouseover=\"window.status='Blaze of Glory'; return true\">Blaze of Glory</a> and <a href=\"http://www.apolitical.info/hunters\" onMouseover=\"window.status='Hunters'; return true\">Hunters</a> Two versions of the same simple game - one's about fighting fires, the other's about hunting vampires. <i>Hunters</i> is a bit harder.</div>";
print $line;
print "<li><a href=\"westward\" onMouseover=\"window.status='Westward!'; return true\">Westward!</a> An online game, based on an early version of the computer game <i>Oregon Trail</i>.</div>";
print $line;
print "<li><a href=\"http://www.apolitical.info/private/hex\" onMouseover=\"window.status='Bidding Hex'; return true\">Bidding Hex</a> A variant of the board game <i>Hex</i>.</div>";
print "</ul>";
print "<b>Resources for Pen-and-Paper Role-Playing Games</b>";
print "<ul>";
print "<li>The <a href=\"class/becmi.php\" onMouseover=\"window.status='Dungeons & Dragons custom class creator'; return true\">Basic/Expert D&D custom class creator</a> Generates a random character class (not an individual character), for Basic Dungeons & Dragons (the version from the 1980s), or Labyrinth Lord (a free 'clone' of Basic D&D). The <a href=\"class/d20.php\" onMouseover=\"window.status='Dungeons & Dragons custom class creator'; return true\">d20 custom class creator</a> is exactly the same thing, but for 3.5 edition D&D.</div>";
print $line;
print "<li><a href=\"tables.php\" onMouseover=\"window.status='Tables for Fables'; return true\">Tables for Fables</a> is a collection of random tables.</div>";
print $line;
print "<li><a href=\"heroes\" onMouseover=\"window.status='Cute Board Heroes'; return true\">Cute Board Heroes</a> A collection of pictures, for making paper miniatures.</div>";
print $line;
print "<li><a href=\"dungeon\" onMouseover=\"window.status='Dungeons & Dragons / Tunnels & Trolls dungeon generator'; return true\">Dungeons & Dragons/Tunnels & Trolls dungeon generator</a> Creates a random dungeon for the games Tunnels & Trolls, Basic Dungeons & Dragons, or Labyrinth Lord.</div>";
print "</ul>";
print "<b>Resources for Pen-and Paper Role-Playing Games, or For Writing</b>";
print "<ul>";
print "<li>The <a href=\"ideas\" onMouseover=\"window.status='randomly generates ideas for fantasy stories or role-playing games'; return true\">Adventure Ideas Generator</a> gives ideas for fantasy stories or role-playing games.";
print $line;
print "<li>The <a href=\"plots\" onMouseover=\"window.status='randomly generates short plots for a variety of genres'; return true\">Plot Generator</a> gives short ideas for fantasy, pulp, space opera, superhero, western or cyberpunk plots - or any combination of these.";
print $line;
print "<li><a href=\"map\" onMouseover=\"window.status='randomly generates maps for stories or role-playing games'; return true\">Random Map Generator</a>";
print $line;
print "<li>The <a href=\"creature\" onMouseover=\"window.status='randomly generates creatures for stories or role-playing games'; return true\">Creature Creator</a> will randomly create fantasy creatures.";
print $line;
}
print "</ul>";
print "<div><a href=\"?mode=0\" onMouseover=\"window.status='back to the starting page'; return true\">back to the main menu</a> . ";
$otherbranch="stories";
if ($branch==1) {
$otherbranch="games";
}
print "<a href=\"?mode=7&branch=".(3-$branch)."\" onMouseover=\"window.status='".$otherbranch."'; return true\">".$otherbranch."</a></div>";
} elseif ($mode==4) {

if (!isset($rolls)) {
$rolls="OJJJJJOJJJJJ";
}

if (isset($name)) {
$name=str_replace(chr(92),chr(0),$name);
}
// get attributes.
if ($rolls=="notusing") {
$stats[1]=$Stamina;
$stats[2]=$Charisma;
$stats[3]=$Duelling;
$stats[4]=$Brawling;
$stats[5]=$Seafaring;
$stats[6]=$Magic;
$stats[7]=$Heroism;
$stats[8]=$Scouting;
$stats[9]=$Roguery;
$stats[10]=$Luck;
$stats[11]=$Healing;
$stats[12]=$Streetwise;
} else {
for ($loop=1;$loop<=$attnum;$loop++) {
$stats[$loop]=ord($rolls[$loop-1])-64;
}
}

// get total of attributes
$total=0;
for ($loop=1;$loop<=$attnum;$loop++) {
$total=$total+$stats[$loop];
}

// decide on $prof (class), except for when first arrive with
// a rolled character, in the rare event of ties.
if (!isset($prof)) {
$score=array();
$lowest=100000;
for ($cloop=1;$cloop<=$classes;$cloop++) {
for ($aloop=1;$aloop<=$attnum;$aloop++) {
$ideal=$class[$cloop][$aloop];
if ($attributes[$aloop]=="Heroism" or $attributes[$aloop]=="Stamina") {
$ideal=$ideal+5;
}
$score[$cloop]=$score[$cloop]+abs($stats[$aloop]-$ideal);
}
$lowest=min($lowest,$score[$cloop]);
}
$prof=0;
do {
$prof++;
} while ($score[$prof]>$lowest);
}
//print character (name and picture)
print $startdiv."<img src=\"images/thumb ".$class[$prof][0].".jpg\"></div>";
print $startdiv."<i>".str_replace("^"," ",$name)."</i></div>";
print $startdiv.$class[$prof][0]."</div>";
print $line;

if ($method==1) {
print "<table align=\"center\">";
print "<form name=\"input\" action=\"index\" method=\"get\">";
for ($att=1;$att<=$attnum;$att++) {
print "<tr><td align=\"right\">".$attributes[$att].":</td><td>";
print "<select name=".$attributes[$att]." style=\"width:210px\">";
for ($x=1;$x<21;$x++) {
$y=$x;
if ($attributes[$att]=="Stamina" or $attributes[$att]=="Heroism") {
$y=$y+5;
}
print "<option";
if ($y==$stats[$att]) {
print " selected";
}
print " value=".$y.">";
print $y." (";
print $word [$attributes[$att]][$x];
print ")</option>";
}
print "</select>";
print "</td></tr>";
}
print "<input type=\"hidden\" name=\"mode\" value=4>";
print "<input type=\"hidden\" name=\"method\" value=1>";
print "<input type=\"hidden\" name=\"rolls\" value=\"notusing\">";
if (isset($name)) {
print "<input type=\"hidden\" name=\"name\" value=\"".$name."\">";
}
print "<tr><td></td><td><input type=\"submit\" value=\"check character\"></td></tr>";
if ($total==$attnum*10+10) {
//pack attributes into $rolls;
$rolls="";
for ($loop=1;$loop<=$attnum;$loop++) {
$rolls=$rolls.chr($stats[$loop]+64);
}
}
print "</form></table>";

} else {
print "<table align=\"center\">";
for ($loop=1;$loop<=$attnum;$loop++) {
print "<tr><td align=\"right\"><b>".$attributes[$loop]."</b></td>";
$lowstat=1;
if ($attributes[$loop]=="Stamina" or $attributes[$loop]=="Heroism") {
$lowstat=6;
}
for ($nloop=0;$nloop<=19;$nloop++) {
$thisone=$lowstat+$nloop;
print "<td align=\"center\"";
if ($thisone==$stats[$loop]) {
print " bgcolor=\"#FF0000\"><font color=\"white\"><b>";
} else {
$newroll=$rolls;
$newroll[$loop-1]=chr($thisone+64);
print "><a href=\"?mode=4&method=2&rolls=".$newroll."&name=".$name."\" onMouseover=\"window.status='change ".$attributes[$loop]." to ".$thisone."'; return true\">";
}
print $thisone;
if ($thisone==$stats[$loop]) {
print "</font></b>";
} else {
print "</a>";
}
print "</td>";
}
$rating=$stats[$loop];
if ($attributes[$loop]=="Stamina" or $attributes[$loop]=="Heroism") {
$rating=$rating-5;
}
print "<td>(".$word[$attributes[$loop]][$rating].")</td></tr>";
}
print "</table>";
}
print $line;
print "<div align=\"center\">The total attributes for this character are ".$total."</div>";
print $line;
print "<div align=\"center\">";
if ($total<>$attnum*10+10) {
print "Total attributes need to be ".($attnum*10+10);
} else {
print "<a href=\"?mode=2&method=6&prof=".$prof."&rolls=".$rolls."&name=".$name."\" onMouseover=\"window.status='continue, with the character as is'; return true\">Accept this character</a>";
}
print "</div>";
}
print $line;
print "</td>";
print "<td width=\"60%\">";
print $startdiv."artwork by Rene Magritte</div>";
print $startdiv."<img src=\"images/intro.jpg\"></div>";

print $line;
print $startdiv;
?>
<!-- Project Wonderful Ad Box Code -->
<div id="pw_adbox_1077_2_0"></div>
<!-- End Project Wonderful Ad Box Code -->
<?php

print "</div>";
print "</td>";
print "</table>";
@include "footer.txt";
?>
 
