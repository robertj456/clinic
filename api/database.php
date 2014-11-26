<?php
function excuteQuery($selectQ, $data) {
	try {
		$pdo = new PDO ( 'mysql:dbname=CQS;host=localhost',"root", "");
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$stmt = $pdo->prepare ( $selectQ );
		
		if ($stmt->execute ( $data )) {
			$queryResults = $stmt->fetchAll ( PDO::FETCH_ASSOC );
			
			return ($queryResults);
		} else {
			echo "failed";
		}
	} catch ( PDOException $e ) {
		echo $e->getMessage ();
	}
	finally 
	
	{
		unset ( $pdo );
	}
}
?>