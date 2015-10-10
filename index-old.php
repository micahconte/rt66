
<?php
// ini_set('display_errors',true);
include('php/Deck.php');
?>

<!DOCTYPE html>
<html>
<head>

	<style>
	body{
		background-color:green;

	}
	</style>

	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script>
	$(document).ready(function(){

			var imgCardPath = 'img/cards/';
			function setCard(id,value){
				$('#card_'+id).src(imgCardPath+value+'.png');
			}
		

	});
	</script>

</head>

<body>

<?php
$deck = new Deck();
$show = array(
				0=>$deck->selectCard(),
				1=>$deck->selectCard(),
				2=>$deck->selectCard()
			);

$deck->display("<img id='card_0' src='img/deck.png' alt='' /><br><br><img id='card_0' src='img/cards/{$show[0]}.png' alt='' />&nbsp;<img id='card_1' src='img/cards/{$show[1]}.png' alt='' />&nbsp;<img id='card_2' src='img/cards/{$show[2]}.png' alt='' />");


while(!$deck->programEnd()){
	sleep(5);
	$removeCardId = rand(0,2);
	$deck->addCard($show[$removeCardId]);
	$newCard = $deck->selectCard();
	$show[$removeCardId] = $newCard;
	
	echo "<script>setCard($removeCardId,$newCard);</script>";

}

?>


</body>

</html>