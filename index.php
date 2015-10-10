<?php
// ini_set('display_errors',true);
include('php/Deck.php');
$deck = new Deck();// added php to allow for data-driven dynamics

?>

<!DOCTYPE html>

<html>
<head>
	<title>RT 66</title>

	<style>
	body{
		background-color:green;
	}
	#nextCard{
		z-index:1000;
		left:8px;
		top:8px;
		position:absolute;
	}
	</style>

	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script>
	$(document).ready(function(){

		var deck = <?=$deck->getJsonDeck();?>;
		var imgCardPath = 'img/cards/';
		var cards;

		function setCardSrc(id,value){
			$('#card_'+id).attr('src',imgCardPath+value+'.png');
		}

		function swapCard(){
			var swapCardId = rand(0,cards.length-1);
			var oldCard = cards[swapCardId];
			
			addCard(oldCard);

			var newCard = selectCard();
			cards[swapCardId] = newCard;

			slideCard(swapCardId,newCard);
		
			setTimeout(swapCard, 3000);
		}

		function selectCard(){
			return deck.pop();
		}

		function addCard(card){
			deck.unshift(card);
		}

		function rand(min, max) {
		  return Math.floor(Math.random() * (max - min + 1)) + min;
		}

		function slideCard(id, card){
			$('#nextCard').attr('src',imgCardPath+card+'.png');

			$('#nextCardDiv').animate({top:'+=1px'}, 600, function(){
				setCardSrc(id,card);
				$('#nextCard').attr('src','');
			});	
		}

		function setCards(){
			cards = [selectCard(),selectCard(),selectCard()];
			setCardSrc(0,cards[0]);
			setCardSrc(1,cards[1]);
			setCardSrc(2,cards[2]);
		}

		setTimeout(setCards, 3000);//display three cards
		setTimeout(swapCard, 10000);//begin swapping cards

	});
	</script>

</head>

<body>

<div>
	<img id='deck' src='img/deck.png' alt='' />&nbsp;
	<div id='nextCardDiv'>
		<img id='nextCard' src='' alt=''/>
	</div>
</div>

<div>
	<img id='card_0' src='' alt='' />&nbsp;
	<img id='card_1' src='' alt='' />&nbsp;
	<img id='card_2' src='' alt='' />
</div>

</body>

</html>