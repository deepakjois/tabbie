<?php /* begin license *
 * 
 *     Tabbie, Debating Tabbing Software
 *     Copyright Contributors
 * 
 *     This file is part of Tabbie
 * 
 *     Tabbie is free software; you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation; either version 2 of the License, or
 *     (at your option) any later version.
 * 
 *     Tabbie is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with Tabbie; if not, write to the Free Software
 *     Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 * end license */

$title = "Tabbie - BP Debating Tab Software";
$dir_hack = "run/";
require("run/view/header.php");
$local = ($_SERVER["SERVER_NAME"] != "tabbie.sourceforge.net");
?>

<div id="mainmenu">
    <h2 class="hide">Main Menu</h2>
    <ul>
    <li><a href="index.php" class="activemain">Home</a></li>
    <li><a href="http://sourceforge.net/project/showfiles.php?group_id=199347">Download</a></li>
    <li><a href="installation.php">Installation Guide</a></li>
    <li><a href="contributors.php">Contributors</a></li>
    <li><a href="run/">Run<? if (!$local) echo " Online Demo"; ?></a></li>
    </ul>
</div>

<?php if ($local) { ?>

<h3><a href="run/">Run Tabbie</a></h3>
<div>
Welcome to Tabbie, running on <b><?= $_SERVER["SERVER_NAME"] ?></b>. If you just installed it - congratulations! Good luck <a href="run/">actually running it</a>. This page may look a lot like <a href="http://tabbie.sourceforge.net">Tabbie's website</a> which is accesible for anyone - rest assured because it's not. These sites are just very much integrated to make the online demo run smoothly and provide you with all the documentation on your local version.
</div>

<?php } ?>

<h3>What is Tabbie?</h3>
<div>
Tabbie is Tab Software for British Parliamentary Debating Tournaments. It has a number of properties:
<ul>
<li>Official. It uses the official <a href="doc/Worlds_Tab_Rules_-_DRAFT.doc">WUDC rules</a> to calculate its draw.</li>
<li>Safe and stable - It's been tried in practice at a tournament as large as NTU Worlds 2004 with great success.</li>
<li>Fair. Tabbie currently has the best known implementation worldwide of the draw algorithm, giving the most balanced distribution of positions in the debate to the teams. (<a href="draw_algorithms.php">More info</a>)</li>
<li>Scalable for large tournaments: It is web based, you can use multiple computers for inputting data.</li>
<li>Easy. Things like customized adjudication sheets for the tab can be created in <a href="run/rest.php?result_type=pdf&amp;function=adjudicator_sheets&amp;param=1">one click.</a></li>
<li>Open and Free. Its source code is freely inspectable. You can inspect any file <a href="http://tabbie.svn.sourceforge.net/viewvc/tabbie/trunk/run/draw/algorithms/silver_line.php?view=markup">(like the Draw Algorithm)</a>, and modify or add anything you like. Download is free.</li>
<li>Alive. As of September 2007 changes are being made to make it work even better.</li>
</ul>
</div>

<h3>News</h3>
<p>
<b>15 August 2007</b><br>
The Bangkok Worlds 2008 team has chosen Tabbie as its Tab system. A roadmap of features is to be prepared for the tournament in the coming weeks. We are looking for tournaments that are willing to try Tabbie out before the big one.
</p>
<a href="old_news.php">More News...</a>

<?php 
if (! $local) {
?>
<h3><a href="run/">Online Demo</a></h3>
<div>Why take our word for it if you can just dive in and <a href="run/">play with the real thing</a>? A full running system is available online. (remember, Tabbie is web based).

Two words of caution: because this is a demo, some features have been disabled, specifically those that involve writing to files. Secondly, you are not neceserraly the only person using this demo at any given time, so some data may change mysteriously. Feel free to play around though!</div>

<?php } ?>

<h3><a href="http://sourceforge.net/project/showfiles.php?group_id=199347">Download</a></h3>
<div>The latest version of Tabbie can be downloaded at <a href="http://sourceforge.net/project/showfiles.php?group_id=199347">Sourceforge</a>.
</div>

<h3><a href="installation.php">Install</a></h3>
<div>
You will also need a Web Server to run Tabbie since it's based on PHP. Use the <a href="installation.php">Installation Guide</a> to get you started.
</div>

<h3><a href="http://sourceforge.net/projects/tabbie/">Contribute</a></h3>
<div>
Contributing to Tabbie BP Debating Software is possible in many ways. The developers use a <a href="http://groups.google.com/group/tabbie-devel">group / email list</a> to communicate. Reading through these mails will give you an idea where the project is going, and this is also a good place to report bugs and request features.
Sending a mail to <a href="mailto:klaas@vanschelven.com">Klaas</a> is another good starting point. The <a href="http://sourceforge.net/projects/tabbie/">Sourceforge Project Page</a> contains access to Subversion code history. Things you can do are:
<ul>
<li>Tell us that you're using Tabbie for your tournament</li>
<li>Tell us how easy/hard Tabbie was to install on your system</li>
<li>Report bugs</li>
<li>Request a feature</li>
<li>Add a feature yourself, and upload it</li>
<li>Become a developer</li>
</ul>
You can also take a look at the <a href="doc/CHANGELOG">Change Log</a>.

</div>
<div>
We strive to make Tabbie a platform for the many different diverging efforts that are being put into creating Tabbing Software and welcome help. We also try to reverse the trend of Tabbing Software being created for just one tournament and then being tossed aside.
</div>

<h3><a href="draw_algorithms.php">Draw Algorithm</a></h3>
<div>Tabbie currently has the best known implementation worldwide of the draw algorithm, giving the most balanced distribution of positions in the debate to the teams. <br><a href="draw_algorithms.php">Read more...</a>
</div>

<h3>Ran at...</h3>
<div><ul>
<li>2004 NTU Singapore Worlds - c. 300 teams, version 0.1</li>
<li>2007 Vancouver Worlds - c. 300 teams, version 0.1 (slightly modified)</li>
<li>2007 London IV - c. 35 teams, tournament specific version</li>
<li>2007 LSE Open - 92 teams, tournament specific version</li>
<li>2007 IDC Herzelia English Open 2007 - 20 teams, version 1.0</li>
</ul></div>

<?php require("run/view/footer.php"); ?>
