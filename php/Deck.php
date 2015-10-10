<?php

class Deck{

	private $deck = array();

	function __construct(){
		$this->endTime = time() + $this->programLength;

		$tmp_deck = array();
		$suit = array('spade','heart','club','diamond');
		foreach($suit as $key){
			for($i=1;$i<14;$i++){
				$tmp_deck[] = $this->getCardName($i).'--'.$key;
			}
		}
		shuffle($tmp_deck);
		foreach($tmp_deck as $k => $v){
			$this->deck[] = $v;
		}

	}

	function selectCard(){
		return array_pop($this->deck);
	}

	function addCard($card){
		array_unshift($this->deck,$card);
	}


	function getCardName($key){
		switch($key){
			case 1:
				return 'ace';
			break;
			case 11:
				return 'jack';
			break;
			case 12;
				return 'queen';
			break;
			case 13:
				return 'king';
			break;
			default:
				return $key;

		}
	}

	function getJsonDeck(){
		return json_encode($this->deck);
	}

	function display($data){
		echo '<pre>';
		if(is_array($data))
			print_r($data);
		else
			echo $data;
		echo '</pre>';
	}
}

