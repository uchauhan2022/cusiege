<?php
session_start();
if ( ( !isset( $_SESSION[ 'username' ] ) ) ) {
	header( "location:index.php" );
}

?>

<html>
<head>
	<link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
	<title>Play</title>
	<link rel="stylesheet" href="Assets/css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>

<body>
	<?php
	if ( isset( $_SESSION[ 'start' ] ) && $_SESSION[ 'lev' ] != 3 ) {
		echo '
      <div class="sub_navbartimer"><div id="clockdiv" style="
    zoom: 0.4;
		  -moz-transform: scale(0.4);"><span id="tl">Time Left :</span>
	<div><span class="hours" id="hours">00</span><div class="smalltext">Hours</div></div>
	<div><span class="minutes" id="minutes">00</span><div class="smalltext">Minutes</div></div>
	<div><span class="seconds" id="seconds">00</span><div class="smalltext">Seconds</div></div>
	</div></div><form method="post" action="finish.php" name="finalSubmit"></form>
	';
	} else {
		echo '<ul class="sub_navbarul">
  <li class="sub_navbarli"><a href="finish.php">Logout</a></li>
  
</ul>';
	}
	?>

	<?php
	//		  if(isset($_SESSION['atm']))
	//		  {
	//			  echo "<div id='wrapper' class='div'> <div class='div'>
	//		<center><h2>You have already attempted the quiz</h2></center></div></div>";
	//		  }
	if ( isset( $_SESSION[ 'start' ] ) ) {

		echo '<div id="questions_div"></div>';
	} elseif ( $_SESSION[ 'lev' ] == 1 ) {
		echo '<div id="rules"></div>';
	}
	?>
</body>
</html> 
<script type = "text/javascript">

	var deadline = <?php
if ( $_SESSION[ 'lev' ] == 1 )
	echo   strtotime( '20 January 2020 23:00:00' ) - strtotime( 'now' );
elseif ( $_SESSION[ 'lev' ] == 2 )
	echo '1530000';
?>;
var t = deadline ;
var downloadTimer = setInterval( function () {
	t--;
	var seconds = Math . floor( ( t ) % 60 );
	var minutes = Math . floor( ( t / 60 ) % 60 );
	var hours = Math . floor( ( t / ( 60 * 60 ) ) % 24 );
	document . getElementById( "hours" ) . textContent = ( '0' + hours ) . slice( -2 );
	document . getElementById( "minutes" ) . textContent = ( '0' + minutes ) . slice( -2 );
	document . getElementById( "seconds" ) . textContent = ( '0' + seconds ) . slice( -2 );
	if ( t <= 0 ) {
		clearInterval( downloadTimer );
		document . finalSubmit . submit();
	}
}, 1000 );



</script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script>
	$( document ).ready( function () {
		$.get( 'rule1.php', function ( data ) {
			$( '#rules' ).html( data );
		} );
		get_questions();
		$( document ).on( 'click', '.question_div', function () {
			var array = this.id.split( ':' );
			$.post( 'pre.php?question', {
				qid: array[ 1 ]
			}, function ( data ) {
				$( '#option_div' + array[ 1 ] ).html( data );
			} );
		} );
		$( document ).on( 'click', '.save_answer_button', function () {

			var array = this.id.split( ':' );
			var answer = $( '.quesradio' + array[ 1 ] + ':checked' ).val();
			$.post( 'pre.php?submit', {
				qid: array[ 1 ],
				answer: answer
			}, function ( data ) {
				var score = $( '#score_div' ).val();

				get_questions();

			} );
		} );
	} );

	function get_questions() {
		$.get( 'pre.php', function ( data ) {
			if(data==1)
				document . finalSubmit . submit();
			else
			$( '#questions_div' ).html( data );
		} );
	}
	process();

	function process() {

		$.post( 'pre.php?marks', {
			qid: 1
		}, function ( data ) {
			$( '#marks_div1' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 2
		}, function ( data ) {
			$( '#marks_div2' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 3
		}, function ( data ) {
			$( '#marks_div3' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 4
		}, function ( data ) {
			$( '#marks_div4' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 5
		}, function ( data ) {
			$( '#marks_div5' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 6
		}, function ( data ) {
			$( '#marks_div6' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 7
		}, function ( data ) {
			$( '#marks_div7' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 8
		}, function ( data ) {
			$( '#marks_div8' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 9
		}, function ( data ) {
			$( '#marks_div9' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 10
		}, function ( data ) {
			$( '#marks_div10' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 11
		}, function ( data ) {
			$( '#marks_div11' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 12
		}, function ( data ) {
			$( '#marks_div12' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 13
		}, function ( data ) {
			$( '#marks_div13' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 14
		}, function ( data ) {
			$( '#marks_div14' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 15
		}, function ( data ) {
			$( '#marks_div15' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 16
		}, function ( data ) {
			$( '#marks_div16' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 17
		}, function ( data ) {
			$( '#marks_div17' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 18
		}, function ( data ) {
			$( '#marks_div18' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 19
		}, function ( data ) {
			$( '#marks_div19' ).html( data );
		} );
		$.post( 'pre.php?marks', {
			qid: 20
		}, function ( data ) {
			$( '#marks_div20' ).html( data );
		} );
		setTimeout( function () {
			process();
		}, 10000 )
	}
</script>