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

	print_r($language);
?>