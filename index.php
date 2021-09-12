<?php session_start(); ?>
<?php require_once 'include/strings.php'; ?>
<!DOCTYPE HTML>

<html <?php if($lang == "zh"){ echo "class='hl_zh'"; } ?> >
    <head>
        <title>Yudong Sun</title>
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
        <meta charset="utf-8"/>
    </head>
    <body>
        <div id="header" class="full">
            <div class="center big">
                <div id="profile-photo">
                    <div class="photoflank"></div>
                    <img src="assets/profile.jpg">
                    <div class="photoflank"></div>
                </div>
                <div id="name_expertise">
                    <span id="name"><?php echo $strings[$lang]["name"] ?></span>
                    <span id="expertise"><?php echo $strings[$lang]["expertise"] ?></span>
                    <span id="small_expertise"><?php echo $strings[$lang]["small_expertise"] ?></span>
                    <span id="countries">
                         // <?php echo $strings[$lang]["countries"] ?> //
                    </span>
                </div>
                <div id="languages" class="force-en-font">
                    <a href="?hl=en">EN</a><a href="?hl=de">DE</a><a href="?hl=zh">ZH</a>
                </div>
                <div id="linkbuttons">
                    <a href="//www.linkedin.com/in/sunjerry019/" title="<?php echo $strings[$lang]['linkedin'] ?>"><i class="fab fa-linkedin-in"></i></a>
                    <a href="?expand" id="linkbtn_expand" title="<?php echo $strings[$lang]['about_me'] ?>">
                        <span><?php echo $strings[$lang]["about_me"] ?></span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <a href="//github.com/sunjerry019" title="<?php echo $strings[$lang]['github'] ?>"><i class="fab fa-github-alt"></i></a>
                </div>
            </div>
        </div>

        <div id="body">
            <div id="personal_info" class="bulk">
                <h2><?php echo $strings[$lang]["personal_info"] ?></h2>
                <div class="content">
                    <table>
                        <tr>
                            <td><?php echo $strings[$lang]["name_label"] ?></td>
                            <td><?php echo $strings[$lang]["name_2"] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $strings[$lang]["dob_label"] ?></td>
                            <td><?php echo $strings[$lang]["dob"] ?>
                                <span id="dob_place"><?php echo $strings[$lang]["dob_place"] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $strings[$lang]["nationality_label"] ?></td>
                            <td><?php echo $strings[$lang]["nationality"] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $strings[$lang]["email_label"] ?></td>
                            <td><?php echo $strings[$lang]["email"] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div id="skills_and_abilities" class="bulk">
                <h2><?php echo $strings[$lang]["sk_and_ab"] ?></h2>
                <div class="content">
                    
                </div>
            </div>
            <!-- next section goes here -->
        </div>
    </body>
</html>
