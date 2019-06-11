<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    // ...
    include('conn.php');
    $rs = mysqli_query($conn,"select count(*) from t_shenqing");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];
    $offset=($page-1)*$rows;
    $rs = mysqli_query($conn,"select * from t_shenqing limit $offset,$rows");
    
    $items = array();
    while($row = mysqli_fetch_object($rs)){
        array_push($items, $row);
    }
    $result["rows"] = $items;
    
    echo json_encode($result);
	// include('conn.php');
	// $sql="select * from t_shenqing";
	// $rs=array();
	// $row=mysqli_query($conn,$sql);
	// while($row1 = mysqli_fetch_object($row)){
 //     	array_push($rs, $row1);
	// }
	//  	echo json_encode($rs); 
?>