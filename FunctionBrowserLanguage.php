<?php
/**
 * Browser Language
 */
 
function getPreferredLanguage(){
 
	$acceptedLanguages = @explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
	$preferredLanguage = null;
	$maxWeight = 0.0;
 
	foreach((array)$acceptedLanguages as $acceptedLanguage){
 
		$weight = (float)@substr(explode(';', $acceptedLanguage)[1], 2);
		if(!$weight){$weight = 1.0;}
 
		if($weight > $maxWeight){
			$preferredLanguage =  substr($acceptedLanguage, 0, 2);
			$maxWeight = $weight;
		}
	}
 
	return $preferredLanguage;
}

$BrowserLanguage =  getPreferredLanguage();	

echo $BrowserLanguage;
?> 
