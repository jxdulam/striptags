<?php
//Created on 06/26/2016

//class to remove the tags with variables
class Strip_Article {
	var $link;
	var $display;
	var $printtags;
//constructor methods used for an article it will take the link and process step by step from heading and paragraph and followed by images
	function Strip_Article($link) {
		global $printtags;
		$display = new DOMDocument();
		libxml_use_internal_errors(true);
		$display->loadHTMLFile($link);
		$article = $display->getElementsByTagName('article');
		$printtags = new DOMDocument();
		foreach ($article as $a) {
			$printtags->appendChild($printtags->importNode($a,true));
		}
	}
//strips the heading with h1 tags
function Strip_Heading()
{
	global $printtags;
	$elements = $printtags->getElementsByTagName('h1');
		foreach ($elements as $e)
		{
			echo $e->nodeValue."<br>";
		}
}
//strips the paragraph with p tags
function Strip_Para()
{
	global $printtags;
	$elements = $printtags->getElementsByTagName('p');
		foreach ($elements as $e)
		{
			echo $e->nodeValue."<br>";
		}
}
//strips the images with img and saveHtml is used so it won't replace
function Strip_Images()
{
	global $printtags;
	$elements = $printtags->getElementsByTagName('img');
		foreach ($elements as $e)
		{
			echo $printtags->saveHtml($e);
		}
}

}
//links  must be given here
$link = 'http://bleacherreport.com/articles/2648628-argentina-vs-chile-score-reaction-from-2016-copa-america-final';
//calls the calss and it's methods
$article = new Strip_Article($link);
$article->Strip_Heading();
$article->Strip_Para();
$article->Strip_Images();
?>
