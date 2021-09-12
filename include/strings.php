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

        "personal_info"     => "Personal Info",
        "name_label"        => "Name",
        "name_2"            => "SUN Yudong",
        "dob_label"         => "Born",
        "dob"               => "29 July 1998",
        "dob_place"         => "Shanghai, China",
        "nationality_label" => "Nationality",
        "nationality"       => "Singapore",
        "email_label"       => "E-Mail Address",
        "email"             => "<span class='mono'><a href='#'>yudongsun019 <it>(at)</it> gmail <it>(dot)</it> com</a></span>",
      
        "sk_and_ab"         => "Skills and Abilities"
    );

    $de = array(
        "name"              => "Yudong Sun",
        "expertise"         => "Physiker, Softwarentwickler",
        "small_expertise"   => "Sprachenthusiast, Photograf",
        "countries"         => "Singapur / Deutschland",

        "linkedin"          => "Meine LinkedIn Seite",
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
        "email"             => $en["email"],
        
        "sk_and_ab"         => "Qualifikationen und Fähigkeiten"
    );

    $zh = array(
        "name"              => "孙毓栋",
        "expertise"         => "物理学家、编码员",
        "small_expertise"   => "语言、摄影爱好者",
        "countries"         => "新加坡 / 德国",

        "linkedin"          => "我的领英",
        "about_me"          => "我的简历",
        "github"            => "我的GitHub页面",

        "personal_info"     => "个人信息",
        "name_label"        => "姓名",
        "name_2"            => "孙毓栋",
        "dob_label"         => "出生",
        "dob"               => "<span class='mono'>29/07/1998</span>",
        "dob_place"         => "中国，上海",
        "nationality_label" => "国籍",
        "nationality"       => "新加坡",
        "email_label"       => "邮箱",
        "email"             => $en["email"],
        
        "sk_and_ab"         => "个人技能与能力"
    );

    $strings = array(
        "en"                => $en,
        "de"                => $de,
        "zh"                => $zh
    );
?>
