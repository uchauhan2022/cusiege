<?php
session_start();
include('dbconfig.php');
if(isset($_GET['question'])){
	$qid=mysqli_real_escape_string($dbconfig,$_POST['qid']);
	$query=mysqli_query($dbconfig,"SELECT * FROM pre_lev1 where questionid=$qid");
	$res=mysqli_fetch_array($query);
	echo "
	<h3>Options</h3>";
  					for($op=1;$op<5;$op++)
    				{
						echo '<div class="radiobtn"><input type="radio" name="'.$res['questionid'].'" class="quesradio'.$res['questionid'].'" id="'.$res['questionid'].'-'.$op.'" value="'.$res['choice'.$op].'"><label for="'.$res['questionid'].'-'.$op.'">'.$res['choice'.$op].'</label></div>';
						echo '<br> <br>';
						
					}
			echo '<input type="submit" value="Save Answer" class="save_answer_button button" id="save_answer:'.$res['questionid'].'"><br><br>
			';
}
elseif(isset($_GET['marks'])){
	$qid=mysqli_real_escape_string($dbconfig,$_POST['qid']);
	$query=mysqli_query($dbconfig,"SELECT score from pre_lev1 where questionid=$qid");
	$res=mysqli_fetch_array($query);
	echo $res['score'];
}
elseif(isset($_GET['submit'])){
	$qid=mysqli_real_escape_string($dbconfig,$_POST['qid']);
	$answer=mysqli_real_escape_string($dbconfig,$_POST['answer']);
	$query=mysqli_query($dbconfig, "SELECT * from pre_lev1 where questionid=$qid");
	$res=mysqli_fetch_array($query);
	if($res['choice'.$res['answer']]==$answer){
		$query=mysqli_query($dbconfig,"UPDATE pre_lev1 set score=score-1 where questionid=$qid");
		$query=mysqli_query($dbconfig,"UPDATE results set score=score+{$res['score']} where userid={$_SESSION['userid']}");
	}
	else{
		$query=mysqli_query($dbconfig,"UPDATE pre_lev1 set score=score+1 where questionid=$qid");
		//$query=mysqli_query($dbconfig,"UPDATE results set score=score-{$res['score']} where userid={$_SESSION['userid']}");
	}
	$query=mysqli_query($dbconfig,"insert into answers (userid,qid,answer) VALUES ({$_SESSION['userid']},$qid,'$answer')");
	$query=mysqli_query($dbconfig,"SELECT score from results where userid={$_SESSION['userid']}");
	$result=mysqli_fetch_array($query);
	echo $result['score'];
		
	}

else{
	$query=mysqli_query($dbconfig,"SELECT * FROM pre_lev1 where questionid NOT IN (SELECT qid FROM answers where userid={$_SESSION['userid']})");
		while($res=mysqli_fetch_array($query))
		{
			echo'<div class="question_div" id="question_div:'.$res['questionid'].'"><div class="question_inner_div">'.$res['question'].'</div><div id="marks_div'.$res['questionid'].'"class="marks_div">'.$res['score'].'</div></div><div class="option_div" id="option_div'.$res['questionid'].'"></div>';
			
		}
}
?>