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
						echo '<div class="radiobtn"><input type="radio" name="'.$res['questionid'].'" id="'.$res['questionid'].'-'.$op.'" value="'.$res['choice'.$op].'"><label for="'.$res['questionid'].'-'.$res['questionid'].'">'.$res['choice'.$op].'</label></div>';
						echo '<br> <br>';
						
					}
			echo '<input type="submit" value="Save Answer" id="button"><br><br>
			';
}
elseif(isset($_GET['marks'])){
	$qid=mysqli_real_escape_string($dbconfig,$_POST['qid']);
	$query=mysqli_query($dbconfig,"SELECT score from pre_lev1 where questionid=$qid");
	$res=mysqli_fetch_array($query);
	echo $res['score'];
}
else{
	$query=mysqli_query($dbconfig,"SELECT * FROM pre_lev1 where questionid NOT IN (SELECT qid FROM answers where userid={$_SESSION['userid']})");
		while($res=mysqli_fetch_array($query))
		{
			echo'<div class="question_div" id="question_div:'.$res['questionid'].'"><div class="question_inner_div">'.$res['question'].'</div><div id="marks_div'.$res['questionid'].'"class="marks_div">'.$res['score'].'</div><div class="option_div" id="option_div'.$res['questionid'].'"></div></div>';
			
		}
}
?>