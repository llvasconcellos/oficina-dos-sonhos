<?php
/**
 * Document Description
 * 
 * Document Long Description 
 * 
 * PHP4/5
 *  
 * Created on May 25, 2007
 * 
 * @package Migrator
 * @subpackage Tests
 * @author Sam Moffatt <s.moffatt@toowoomba.qld.gov.au>
 * @author Toowoomba City Council Information Management Department
 * @license GNU/GPL http://www.gnu.org/licenses/gpl.html
 * @copyright 2007 Toowoomba City Council/Sam Moffatt
 * @version SVN: $Id:$
 * @see Project Documentation DM Number: #???????
 * @see Gaza Documentation: http://gaza.toowoomba.qld.gov.au
 * @see JoomlaCode Project: http://joomlacode.org/gf/project/
 */

global $database;
$enumerator = new ETLEnumerator();
$plugins = $enumerator->createPlugins(true);
$tasks = new TaskBuilder($database, $plugins);
$tasks->buildTaskList();
$tasks->saveTaskList();
$tasklist = new TaskList($database);
$tasklist->listAll();
$database->setQuery("TRUNCATE TABLE #__migrator_tasks");
$database->Query();
echo '<p>Note: Task table has been truncated.</p>';
?>