<?php session_start(); ?>
<?php require 'strings.php' ?>
<!DOCTYPE HTML>

<html <?php if($lang == "zh"){ echo "class='hl_zh'"; } ?> >
    <head>
        <title>Sun Yudong</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <?php if($lang == "zh"){ echo "<style>body{ font-family: 'Yu Gothic' }</style>"; } ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <div id="header" class="full">
            <div class="center big">
                <div id="profile-photo">
                    <div class="photoflank"></div>
                    <img src="profile.jpg">
                    <div class="photoflank"></div>
                </div>
                <div id="name_expertise">
                    <span id="name"><?php echo $strings[$lang]["name"] ?></span>
                    <span id="expertise"><?php echo $strings[$lang]["expertise"] ?></span>
                    <span id="small_expertise"><?php echo $strings[$lang]["small_expertise"] ?></span>
                </div>
                <div id="languages" class="force-en-font">
                    <a href="?hl=en">EN</a><a href="?hl=de">DE</a><a href="?hl=zh">ZH</a>
                </div>
                <div id="linkbuttons">
                    <a href="./ptg/" title="<?php echo $strings[$lang]['ptg'] ?>"><i class="fas fa-camera"></i></a>
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

            <!-- next section goes here -->
        </div>
    </body>
</html>
