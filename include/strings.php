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

    $en = array(
        "name"              => "Yudong Sun",
        "expertise"         => "Physicist, Developer",
        "small_expertise"   => "Language Enthusiast, Photographer",
        "countries"         => "Singapore / Germany",


        "linkedin"          => "My LinkedIn Page",
        "about_me"          => "About Me",
        "github"            => "My GitHub Page",

        "projects"          => "Projects",
    );

    $de = array(
        "name"              => "Yudong Sun",
        "expertise"         => "Physiker, Softwarentwickler",
        "small_expertise"   => "Sprachenthusiast, Photograf",
        "countries"         => "Singapur / Deutschland",

        "linkedin"          => "Meine LinkedIn Seite",
        "about_me"          => "Über Mich",
        "github"            => "Meine GitHub Seite",

        "projects"          => "Projekte",
    );

    $zh = array(
        "name"              => "孙毓栋",
        "expertise"         => "物理学家、编码员",
        "small_expertise"   => "语言、摄影爱好者",
        "countries"         => "新加坡 / 德国",

        "linkedin"          => "我的领英",
        "about_me"          => "我的简历",
        "github"            => "我的GitHub页面",

        "projects"          => "我做过的项目",
    );

    $strings = array(
        "en"                => $en,
        "de"                => $de,
        "zh"                => $zh
    );
?>
