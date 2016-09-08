<?php

/**
* Content code
* @package football pool
* @Copyright (C) 2006 John bultena - joomla.bultena.com and http://forge.joomla.org/sf/projects/football_pool
* @ All rights reserved
* @ football pool is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version 2.0
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

?>
<?php
global $database;
$querydate = 'select playdate from #__fp_game where playdate>now() GROUP BY playdate ORDER BY playdate LIMIT 1';
$database->setQuery($querydate);
$rowsdate=$database->loadObjectList();
if (count($rowsdate)>0)
{
  $query = 'SELECT g.playdate,t1.name as team1,t2.name as team2 FROM #__fp_game as g
            LEFT JOIN #__fp_teams as t1 on g.team_id_1=t1.id
			LEFT JOIN #__fp_teams as t2 on g.team_id_2=t2.id
			WHERE playdate="'.$rowsdate[0]->playdate.'"'; 

  $database->setQuery($query);
  $rows=$database->loadObjectList();
}
?>   
<table with="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="modules/wm_eng.gif" width="55" height="54"></td>
    <td>
    <?php
	if (count($rows)>0)
	  
	  {
	  echo $rows[0]->playdate.'<br><br>';
	  foreach ($rows as $row)
	  {
	  echo $row->team1.'-'.$row->team2.'<br><br>';
	  }
       }  
     else    { echo 'Het Wk 2006 is afgelopen. We zijn er weer bij met EK in 2008'; }
	?>

	</td>
  </tr>
</table>
