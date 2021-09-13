<?php
    require_once "include/http.php";

    $supportedLanguages = array(
        'en'    => true, // first one is the default/fallback
        'en-gb' => true,
        'de'    => true,
        'de-de' => true,
        'de-at' => true,
        'de-ch' => true,
        'zh'    => true,
        'zh-cn' => true,
        'zh-sg' => true
    );

    // Returns the negotiated language
    // or the default language (i.e. first array entry) if none match.
    $language = negotiateLanguage($supportedLanguages);

    $lang = substr($language, 0, 2);

    if(isset($_SESSION["hl"])) $lang = $_SESSION["hl"];

    if(isset($_GET["hl"]))
    {
        $lang = $_GET["hl"];
        $_SESSION["hl"] = $lang;
    }

    // Retrive strings
    $file = "include/strings.csv";
    $csv = array_map('str_getcsv', file($file));
    $strings = array();

    foreach ($csv as $key => $a) {
        $a = array_combine($csv[0], $a);
        $_key = array_shift($a); # get the actual key
        $strings[$_key] = $a;
    };

    // $string has the form: $string[key][lang]
?>
