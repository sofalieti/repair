<?php
if(!isset($_GET['secret123'])) die('Access denied');
?>
<a href="get_sheets.php?secret123">Get Sheets</a>
<table border=1 width="100%">
	<tr>
		<th>Sheet</th>
		<th>Status</th>
		<th>Pid</th>
		<th>Logs</th>
		<th></th>
	</tr>
	<tr>
		<td>All</td>
		<td><?=get_pid('all') > 0 && isRunning(get_pid('all')) ? get_pid('all') : "-"?></td>
		<td><?=get_pid('all') > 0 && isRunning(get_pid('all')) ? 'Working' : "-"?></td>
		<td><a href="pidall.txt" target="_blank">Logs</a></td>
		<td>
			<? if(get_pid('all') > 0 && isRunning(get_pid('all'))):?>
			-
			<? else:?>
			<a href="start.php?sheet=all">Start</a>
			<? endif;?>
		</td>
	</tr>
	<? foreach(sheets() as $id => $name):?>
	<tr>
		<td><?=$name?></td>
		<td><?=get_pid($id) > 0 && isRunning(get_pid($id)) ? 'Working' : "-"?></td>
		<td><?=get_pid($id) > 0 && isRunning(get_pid($id)) ? get_pid($id) : "-"?></td>
		<td><a href="pid<?=$id?>.txt" target="_blank">Logs</a></td>
		<td>
			<? if(get_pid($id) > 0 && isRunning(get_pid($id))):?>
			-
			<? else:?>
			<a href="start.php?sheet=<?=$id?>">Start</a>
			<? endif;?>
		</td>
	</tr>
	<? endforeach;?>
</table>

<?php
	function isRunning($pid){
        try{
            $result = shell_exec(sprintf("ps %d", $pid));
            if( count(preg_split("/\n/", $result)) > 2){
                return true;
            }
        }catch(Exception $e){}

        return false;
	} 
	function get_pid($sheet){
		$file = $_SERVER['DOCUMENT_ROOT'].'/dev/google_docs_domains_checker/pid'.$sheet;
		if(file_exists($file)){
			return (int)trim(@file_get_contents($file));
		}		
		return 0;
	}
	function sheets(){
		$data = array();
		if(file_exists('sheets.json')){
			$file = file_get_contents('sheets.json');
			$data = json_decode($file, true);
		}
		return $data;
	}
?>