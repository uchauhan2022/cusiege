<?php
session_start();
include('dbconfig.php');
function get_question(){
	global $dbconfig;
	if(sizeof($_SESSION['r'])<$_SESSION['i']+1){
		echo 1;
	}
	else{
		
	$id=$_SESSION['i'];
	$qid=$_SESSION['r'][$id];
	$query=mysqli_query($dbconfig,"SELECT * FROM pre_lev".$_SESSION['lev']." where questionid=$qid");
	$res=mysqli_fetch_array($query);

			echo'<div class="question_div" id="question_div:'.$res['questionid'].'"><div class="question_inner_div">Question:<br> '.($id+1).".) ".$res['question'].'</div><div id="marks_div'.$res['questionid'].'"class="marks_div">Maximum Marks:'.$_SESSION['score'].'</div></div><div class="option_div" id="option_div'.$res['questionid'].'">';
			
	
	
	echo "
	<h3>Options</h3>";
  					for($op=1;$op<5;$op++)
    				{
						echo '<div class="radiobtn"><input type="radio" name="'.$res['questionid'].'" class="quesradio'.$res['questionid'].'" id="'.$res['questionid'].'-'.$op.'" value="'.$res['choice'.$op].'"><label for="'.$res['questionid'].'-'.$op.'">'.$res['choice'.$op].'</label></div>';
						echo '<br> <br>';
						
					}
			echo '<input type="submit" value="Save Answer" class="save_answer_button button" id="save_answer:'.$res['questionid'].'"><br><br>
			</div>';
}
}

if(isset($_GET['submit'])){
	$qid=$_SESSION['r'][$_SESSION['i']];
	$answer=mysqli_real_escape_string($dbconfig,$_POST['answer']);
	$query=mysqli_query($dbconfig, "SELECT * from pre_lev".$_SESSION['lev']." where questionid=$qid");
	$res=mysqli_fetch_array($query);
	if($res['choice'.$res['answer']]!=$answer){
		$query=mysqli_query($dbconfig,"UPDATE login SET marks_lev".$_SESSION['lev']."=marks_lev".$_SESSION['lev']."-5 where userid={$_SESSION['userid']}");
		$query=mysqli_query($dbconfig,"SELECT marks_lev".$_SESSION['lev']." from login where userid={$_SESSION['userid']}");
		$row=mysqli_fetch_array($query);
		
		$_SESSION['score']=$row["marks_lev".$_SESSION['lev']];
	}
	else{
		$query=mysqli_query($dbconfig,"UPDATE login SET score_lev".$_SESSION['lev']."=score_lev".$_SESSION['lev']."+{$_SESSION['score']} where userid={$_SESSION['user_id']}");
	}
	$query=mysqli_query($dbconfig,"insert into answers (userid,qid,answer) VALUES ({$_SESSION['userid']},$qid,'$answer')");
	$_SESSION['i']++;
	echo get_question();		
	}

else{
	$query=mysqli_query($dbconfig,"SELECT * FROM pre_lev".$_SESSION['lev']." where questionid NOT IN (SELECT qid FROM answers where userid={$_SESSION['userid']})");
	if(mysqli_num_rows($query)==0)
		echo 1;
	else{
		
		$r=array();
		$i=1;
		while($q=mysqli_fetch_array($query)){
			$r[$i]=$q['questionid'];
			$i++;
		}
		shuffle($r);
		$_SESSION['r']=$r;
		$_SESSION['i']=0;
		$query=mysqli_query($dbconfig,"SELECT marks_lev".$_SESSION['lev']." from login where userid={$_SESSION['userid']}");
		$row=mysqli_fetch_array($query);
		$_SESSION['score']=$row["marks_lev".$_SESSION['lev']];
		echo get_question();
	}
}
?>