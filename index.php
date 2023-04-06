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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <script src="include/script.js"></script>
    </head>
    <body>
        <div id="header" class="full">
            <div class="center big">
                <div id="header-wrap">
                    <div id="header-left">
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
                                //&nbsp;<?php echo $strings["countries"][$lang] ?>&nbsp;//
                            </span>
                        </div>
                    </div>
                    <div id="header-right">
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
            </div>
        </div>

        <div id="body">
            <div id="welcome">
                <h1><?php echo $strings["welcome_header"][$lang] ?></h1>
                <p><?php echo $strings["welcome"][$lang] ?></p>
            </div>
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
                        <div class="project_desc"><?php echo $strings["photonLauncher"][$lang] ?>
                            <p>Poster: <i>"<a href='/attachments/pst-2016-Lor, Choong, Sun, Lee.pdf' title="Poster: Measuring Temporal Coherence of Light from a Mercury Vapour Lamp, 2016">Measuring Temporal Coherence of Light from a Mercury Vapour Lamp</a>"</i> (Institute of Physics Singapore Meeting, 2016)</p>
                        </div>
                    </div>
                    <div class="project">
                        <div class="project_name">onecorpsec</div>
                        <div class="project_link"><a href="//github.com/sunjerry019/onecorpsec">github.com/onecorpsec</a></div>
                        <div class="project_desc"><?php echo $strings["onecorpsec"][$lang] ?></div>
                    </div>
                    <div class="project">
                        <div class="project_name">LatexBot</div>
                        <div class="project_link"><a href="//github.com/sunjerry019/LatexBot">github.com/LatexBot</a></div>
                        <div class="project_desc"><?php echo $strings["LatexBot"][$lang] ?></div>
                    </div>
                </div>
            </div>

            <div id="scientific_works" class="bulk">
                <h2><?php echo $strings["sciworks"][$lang] ?></h2>
                <div class="content">
                    <div id="orcid">
                        <span>ORCID</span>
                        <span>Yudong&nbsp;Sun</span>
                        <div id="orcid-link">
                            <img alt="ORCID logo" src="https://info.orcid.org/wp-content/uploads/2019/11/orcid_16x16.png" width="16" height="16" />
                            <a href="//orcid.org/0000-0002-1444-7474"> https://orcid.org/0000-0002-1444-7474</a>
                        </div>
                    </div>
                    <div class="sciwork">
                        <div class="sciwork_name"><a href="//doi.org/10.5282/ubm/epub.93330" target="_blank"><?php echo $strings["BA_name"][$lang] ?></a></div>
                        <div class="sciwork_type"><?php echo $strings["type_thesis_bach"][$lang] ?><span class="sciwork_year">2022</span></div>
                        <div class="sciwork_desc"><?php echo $strings["BA_desc"][$lang] ?></div>
                    </div>
                </div>
            </div>

            <div id="contact" class="bulk">
                <h2><?php echo $strings["contact"][$lang] ?></h2>
                <div class="content">
                    <table>
                        <tr>
                            <td><?php echo $strings["email"][$lang] ?></td>
                            <td>yudong.sun [at] physik.uni-muenchen.de</td>
                        </tr>
                    </table>
                    <div id="socials">
                        <a href="//www.facebook.com/yudongsun019/"><i class="fab fa-facebook-square"></i></a>
                        <a href="//www.linkedin.com/in/sunjerry019/"><i class="fab fa-linkedin"></i></a>
                        <a href="//github.com/sunjerry019"><i class="fab fa-github-square"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- next section goes here -->
        </div>

        <div id="footer">
            <div id="copyright">&copy <?php echo date("Y"); ?>, Yudong Sun</div>
            <div id="made_with">
                <span id="f_runs_on"><a href="//github.com/sunjerry019/profile-repo/" target="_blank" id="gitsrc">/ git source /</a> Runs on PHP, <a id="f_fa" href="//fontawesome.com/">fontawesome</a> and love</span>
                <span id="progress-pride-flag"></span>
            </div>
        </div>
    </body>
</html>
