<?php
require_once 'connect.php';
connect();                                                    
?>

<?php
$parse_array = array();
function event_json(){
	global $parse_array;
	$query = "SELECT * FROM `events` WHERE 1";
	if($query_run=mysql_query($query)){
		/**************While Begins**************/		
		
		while($row = mysql_fetch_array($query_run)){
			${$row['event_title']} = array(
			'title'=>$row['event_title'],
			'details'=>$row['event_details'],
			'date'=>$row['event_date'],
			'poster'=>$row['event_image_poster'],
			'thumbnail'=>$row['event_image_thumbnail']
			);		
			//array_push($parse_array,${$row['event_title']});
			$parse_array[$row['event_title']] = ${$row['event_title']};
		}
		/**************************************/
	}
	else{
		die('Event Error');
	}
	return $parse_array;
}

function category_json(){
	global $parse_array;
	$query = "SELECT * FROM `categories` WHERE 1";
	if($query_run = mysql_query($query)){
		while($c = mysql_fetch_array($query_run)){
			//${$c['id']} = $c['project_category'];
			//${$c['id']} = array();
			//$arr = array($parse_array, );
			//array_push($parse_array,${$c['id']});
			///array_push($parse_array[$c['id']],$c['project_category']);
			$parse_array[$c['id']] = $c['project_category'];
		}
	}else{
		die("categories matching error");
	}
	return $parse_array;
}

function project_json(){
	global $parse_array;
	$query = "SELECT * FROM `projects` WHERE 1";
	$query2 = "SELECT * FROM `categories` WHERE 1";
	if($query_run=mysql_query($query)){
		
		$cat_query = mysql_query($query2);
		
		/******************************/
		if($cat_query){			
			  while($c = mysql_fetch_array($cat_query)){				
				  ${$c['id']} = array();
				  //array_push($parse_array,${$c});
				  //$newArray[$key] = $value;
				  $parse_array[$c['id']] = ${$c['id']};
			  }
		}
		else{
			die(mysql_error());
		}
		//print_r($parse_array);
		/**************************/
		
		/**************While Begins**************/
		while($row = mysql_fetch_array($query_run)){
			${$row['project_title']} = array(
				'category'=>$row['project_category'],
				'title'=>$row['project_title'],
				'details'=>$row['project_details'],
				'lead'=>$row['project_lead'],
				'members'=>$row['project_members'],
				'image_poster'=>$row['project_image_poster'],
				'image_thumbnail'=>$row['project_image_thumbnail']
			);
			/***************************************************************************************************************/
			$query3 = "SELECT * FROM `categories` WHERE project_category LIKE '{$row['project_category']}'";
			if($cat_query1 = mysql_query($query3)){
				$c1 = mysql_fetch_array($cat_query1);
				$parse_array[$c1['id']][$row['project_title']] = ${$row['project_title']};
			}else{
				die("error in cat. matching");
			}
			/***************************************************************************************************************/
			
			//array_push($parse_array[$row['project_category']],${$row['project_title']});
			//$parse_array[$row['project_category']][$row['project_title']] = ${$row['project_title']};
			//array_push($parse_array[$c['id']], ${$row['project_title']});

		}
		/**************************************/
	}
	else{
		die('Project Error');
	}
	
	return $parse_array;	
}

function workshop_json(){
	global $parse_array;
	$query = "SELECT * FROM `workshops` WHERE 1";
	$query_run = mysql_query($query);
	if($query_run=mysql_query($query)){
		/*****************Making the title Array************/
		while($row = mysql_fetch_array($query_run)){
			
			/*$t = $row['workshop_title'];$d = $row['workshop_description'];$o = $row['workshop_owner'];
			$p = $row['workshop_image_poster'];$th = $row['workshop_image_thumbnail'];*/
			
			${$row['workshop_title']} = array(
				'title'=>$row['workshop_title'],
				'owner'=>$row['workshop_owner'],
				'details'=>$row['workshop_description'],
				'image_poster'=>$row['workshop_image_poster'],
				'image_thumbnail'=>$row['workshop_image_thumbnail']
			);
			
			//array_push($parse_array,${$row['workshop_title']});
			$parse_array[$row['workshop_title']]=${$row['workshop_title']};
		}
		/***************************************************/
	}
	else{
		die('Workshop Error');
	}
	return $parse_array;
}

if(isset($_GET['page']) && !empty($_GET['page'])){
	if($_GET['page']=='e'){
		$arr = event_json();		
	}
	else if($_GET['page']=='p'){
		$arr = project_json();
	}else if($_GET['page']=='i'){
		$arr = category_json();
	}
	else if($_GET['page']=='w'){
		$arr = workshop_json();
	}
	else{
		die('Improper Method');
	}
	
	echo json_encode($arr);
}
?>