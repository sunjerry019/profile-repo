<?php session_start(); ?>
<?php require_once 'include/strings.php'; ?>
<!DOCTYPE HTML>

<html <?php if($lang == "zh"){ echo "class='hl_zh'"; } ?> >
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $strings["name"][$lang] ?></title>
        <link href="//fonts.googleapis.com/css?family=Roboto+Mono|Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="assets/flag-icon-css-master/css/flag-icon.min.css" type="text/css"/> -->
        <link rel="stylesheet" href="include/style.css<?php echo '?v='.rand(); ?>" type="text/css"/>
        <?php 
        if($lang == "zh")
        { 
            echo '<link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notosansscsliced.css" type="text/css"/>'; 
            echo "<style> body { font-family: 'Noto Sans SC Sliced', 'Yu Gothic', sans-serif; } </style>";
        } 
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="include/script.js"></script>
    </head>
    <body>
        <div id="header" class="full">
            <div class="center big">
                <div id="profile-photo">
                    <div class="photoflank"></div>
                    <img alt="Picture of me" src="assets/profile.jpg">
                    <div class="photoflank"></div>
                </div>
                <div id="name_expertise">
                    <span id="name"><?php echo $strings["name"][$lang] ?></span>
                    <span id="expertise"><?php echo $strings["expertise"][$lang] ?></span>
                    <span id="small_expertise"><?php echo $strings["small_expertise"][$lang] ?></span>
                    <span id="countries">
                         // <?php echo $strings["countries"][$lang] ?> //
                    </span>
                </div>
                <div id="languages" class="force-en-font">
                    <a href="?hl=en">EN</a><a href="?hl=de">DE</a><a href="?hl=zh">ZH</a>
                </div>
                <div id="linkbuttons">
                    <a href="//www.linkedin.com/in/sunjerry019/" title="<?php echo $strings['linkedin'][$lang] ?>"><i class="fab fa-linkedin-in"></i></a>
                    <a href="?expand" id="linkbtn_expand" title="<?php echo $strings['about_me'][$lang] ?>">
                        <span><?php echo $strings["about_me"][$lang] ?></span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <a href="//github.com/sunjerry019" title="<?php echo $strings['github'][$lang] ?>"><i class="fab fa-github-alt"></i></a>
                </div>
            </div>
        </div>

        <div id="body">
            <div id="projects" class="bulk">
                <h2><?php echo $strings["projects"][$lang] ?></h2>
                <div class="content">
                    <div class="project">
                        <div class="project_name">nanosquared</div>
                        <div class="project_link"><a href="//github.com/sunjerry019/nanosquared">github.com/nanosquared</a></div>
                        <div class="project_desc"><?php echo $strings["nanosquared"][$lang] ?></div>
                    </div>
                    <div class="project">
                        <div class="project_name">photonLauncher</div>
                        <div class="project_link"><a href="//github.com/sunjerry019/photonLauncher">github.com/photonLauncher</a></div>
                        <div class="project_desc"><?php echo $strings["photonLauncher"][$lang] ?></div>
                    </div>
                </div>
            </div>
            
            <!-- next section goes here -->
        </div>
    </body>
</html>
