<?php
session_start();
include('dbconfig.php');
if(isset($_GET['question'])){
	$qid=mysqli_real_escape_string($_POST['qid']);
	$query=mysqli_query($dbconfig,"SELECT * FROM pre_lev1 where quentionid=$qid");
	$res=mysqli_fetch_array($query);
	echo "
	<h3>Options</h3>";
  					for($op=0;$op<4;$op++)
    				{
						echo '<div class="radiobtn"><input type="radio" name="'.$i.'" id="'.$op.'" value="'.$res['choice'.$op].'"<label for="'.$op.'">'.$res['choice'.$op].'</label></div>';
						echo '<br> <br>';
						
					}
			echo '<input type="submit" value="Save Answer" id="button"><br><br>
			';
}
else{
	$query=mysqli_query($dbconfig,"SELECT * FROM pre_lev1 where questionid NOT IN (SELECT qid FROM answers where userid={$_SESSION['userid']})");
		while($res=mysqli_fetch_array($query))
		{
			echo'<div class="question_div" id="question_div:'.$res['questionid'].'"><div class="question_inner_div">'.$res['question'].'</div><div id="marks_div:'.$res['questionid'].'"class="marks_div">'.$res['score'].'</div></div>';
			
		}
}
?>