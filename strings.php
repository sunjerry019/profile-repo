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
        "name"              => "Sun Yudong",
        "expertise"         => "Engineer, Physicist",
        "small_expertise"   => "Language Enthusiast, Photographer",
        "ptg"               => "The collection of pixels I have taken",
        "about_me"          => "About Me",
        "github"            => "My GitHub Page",

        "personal_info"     => "Personal Info",
        "name_label"        => "Name",
        "name_2"            => "SUN Yudong",
        "dob_label"         => "Born",
        "dob"               => "29 July 1998",
        "dob_place"         => "Shanghai, China",
        "nationality_label" => "Nationality",
        "nationality"       => "Singapore",
        "email_label"       => "E-Mail Address",
        "email"             => "<span class='mono'>yudongsun019 [at] gmail [dot] com</span>"
    );

    $de = array(
        "name"              => "Sun Yudong",
        "expertise"         => "Ingenieur, Physiker",
        "small_expertise"   => "Sprachenthusiast, Photograf",
        "ptg"               => "Eine Sammlung aus meiner Kamera",
        "about_me"          => "Über Mich",
        "github"            => "Meine GitHub Seite",

        "personal_info"     => "Persönliche Daten",
        "name_label"        => "Name",
        "name_2"            => "SUN Yudong",
        "dob_label"         => "Geboren",
        "dob"               => "29. Juli 1998",
        "dob_place"         => "Shanghai, China",
        "nationality_label" => "Nationalität",
        "nationality"       => "Singapur",
        "email_label"       => "E-Mail-Adresse",
        "email"             => "<span class='mono'>yudongsun019 [at] gmail [dot] com</span>"
    );

    $zh = array(
        "name"              => "孙毓栋",
        "expertise"         => "工程师, 物理学家",
        "small_expertise"   => "语言、摄影爱好者",
        "ptg"               => "我拍的一些照片",
        "about_me"          => "我的履历",
        "github"            => "我的GitHub页面",

        "personal_info"     => "个人信息",
        "name_label"        => "姓名",
        "name_2"            => "孙毓栋",
        "dob_label"         => "出生",
        "dob"               => "<span class='mono'>29/07/1998</span>",
        "dob_place"         => "中国，上海",
        "nationality_label" => "国际",
        "nationality"       => "新加坡",
        "email_label"       => "电邮",
        "email"             => "<span class='mono'>yudongsun019 [at] gmail [dot] com</span>"
    );

    $strings = array(
        "en"                => $en,
        "de"                => $de,
        "zh"                => $zh
    );
?>
