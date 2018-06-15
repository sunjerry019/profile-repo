<?php
	$supportedLanguages = [
	    'en', // first one is the default/fallback
	    'en-gb',
	    'de',
	    'de-de',
	    'de-at',
	    'de-ch',
	    'zh',
	    'zh-cn',
	    'zh-sg'
	];

	// Returns the negotiated language
	// or the default language (i.e. first array entry) if none match.
	$language = http\Env::negotiateLanguage($supportedLanguages, $result);

	$lang = substr($language, 0, 2);

	if(isset($_SESSION["hl"])) $lang = $_SESSION["hl"];

	if(isset($_GET["hl"]))
	{
		$lang = $_GET["hl"];
		$_SESSION["hl"] = $lang;
	}

	$en = array(
		"name"				=> "Sun Yudong",
		"expertise" 		=> "Engineer, Physicist",
		"small_expertise"	=> "Language Enthusiast, Photographer",
		"ptg"				=> "The collection of pixels I have taken",
		"about_me"			=> "About Me",
		"github"			=> "My GitHub Page"
	);

	$de = array(
		"name"				=> "Sun Yudong",
		"expertise" 		=> "Ingenieur, Physiker",
		"small_expertise"	=> "Sprachenthusiast, Photograf",
		"ptg"				=> "Eine Sammlung aus meiner Kamera",
		"about_me"			=> "Über Mich",
		"github"			=> "Meine GitHub Seite"
	);

	$zh = array(
		"name"				=> "孙毓栋",
		"expertise" 		=> "工程师, 物理学家",
		"small_expertise"	=> "语言、摄影爱好者",
		"ptg"				=> "我拍的一些照片",
		"about_me"			=> "我的履历",
		"github"			=> "我的GitHub页面"
	);

	$strings = array(
		"en"				=> $en,
		"de" 				=> $de,
		"zh" 				=> $zh
	);
?>
