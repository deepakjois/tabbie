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

This file is being cleanup up... must be finished later.

include("includes/dbconnection.php");

$query = "SELECT adjud_name, ranking, adjud_id, conflicts FROM adjudicator ORDER BY adjud_name ";
$result = mysql_query($query);

$header = array("Name", "Ranking", "Last Status", "Nr. of Chair", "Nr. of Panelist", "Nr. of Trainee", "Conflicts")

if ($result) {
    while ($row = mysql_fetch_assoc($result)) {
        
        $adjud_id=$adjrow['adjud_id'];
        $adjud_name=$adjrow['adjud_name'];
        $adjud_rank=$adjrow['ranking'];
        $adjud_conflicts=$adjrow['conflicts'];
        
        $prevquery="SELECT status FROM adjud_round_$roundno WHERE adjud_id='$adjud_id' ";
        $prevresult=mysql_query($prevquery);
        if($prevcount=mysql_num_rows($prevresult))
        {    $prevrow=mysql_fetch_assoc($prevresult);
            $prev_status=$prevrow['status'];
        }
        else
            $prev_status="<center><b> - </b></center>";
        
        // Get count of positions
        $chair_count=0;
        $panel_count=0;
        $trainee_count=0;
        for ($i=1; $i<=$roundno; $i++)
        {    
            // Count of Chair
            $chairquery="SELECT adjud_id FROM adjud_round_$i WHERE status='chair' AND adjud_id='$adjud_id' ";
            $chairresult=mysql_query($chairquery);
            if ($chaircount=mysql_num_rows($chairresult))
                $chair_count++;
                
            // Count of Panelist
            $panelquery="SELECT adjud_id FROM adjud_round_$i WHERE status='panelist' AND adjud_id='$adjud_id' ";
            $panelresult=mysql_query($panelquery);
            if ($panelcount=mysql_num_rows($panelresult))
                $panel_count++;
                
            // Count of Trainee
            $traineequery="SELECT adjud_id FROM adjud_round_$i WHERE status='trainee' AND adjud_id='$adjud_id' ";
            $traineeresult=mysql_query($traineequery);
            if ($traineecount=mysql_num_rows($traineeresult))
                $trainee_count++;
        }
    $something = array($adjud_name, $adjud_rank, $prev_status, $chair_count, $panel_count, $trainee_count, $adjud_conflicts
