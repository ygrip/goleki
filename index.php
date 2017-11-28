<?php
    // session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
   
    <!-- Site Properties -->
    <title>Goleki</title>
    <link rel="icon" href="media/site/icon.png" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link   href="suits/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="suits/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="suits/css/app.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="suits/js/semantic.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="//raw.github.com/botmonster/jquery-bootpag/master/lib/jquery.bootpag.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
    <link href="suits/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="suits/js/jquery.dataTables.min.js"></script>
    
    <script src="suits/js/following-header.js"></script>
    
    <script type="text/javascript">
        var $= jQuery.noConflict();
    </script>    
</head>
<body>
    <div class="pusher">
        <?php 
            // include composer autoloader
            require_once __DIR__ . '/vendor/autoload.php';
			require_once __DIR__ . '/brain/lib/session.php';
			$myDatabase = new \Sastrawi\Database;

            if (isset($_SESSION['user_session'])){
                $user_id = $_SESSION['user_session'];

                $connection = $myDatabase->connect();
                $sql = "SELECT fullname,email,username FROM tb_user WHERE id = '$user_id';";
                $result = mysqli_query($connection, $sql);
                
                $userInfoRow = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $myDatabase->disconnect();

            } 
        ?>

        <?php 
        $image_dir = "media/img/";
        $pages_dir = 'body';

        if (!empty($_GET['p'])&&strcmp($_GET['p'],'home')!=0){
            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]);
 
            $p = $_GET['p'];
            if(in_array($p.'.php', $pages)){
                include 'body/partials/header.php'; 
                include($pages_dir.'/'.$p.'.php');
            }
            else {
                include 'body/partials/header.php'; 
                include($pages_dir.'/404.php');
            }
        }elseif (!empty($_GET['q'])){
            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]); 
            $q = $_GET['q']; 
            $search_query = $q;  
            include 'body/partials/header.php';          
            include($pages_dir.'/search-content.php');
        }else {
            ?>
                <div class="ui borderless menu square masthead" id="nav-header" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
                    <div class="ui container" style="width: 90% !important;">
                        <div class="right item" style="width: 85% !important;">
                            <div class="item" style="width : 650px !important; height: 35px !important;">
                            </div>

                            <?php 

                                if (isset($_SESSION['user_session'])){
                                    
                            ?>
                                    <div class="item">
                                        <a href="?p=artikel" class="item" style="color: #33527c;">Artikel</a>
                                    </div>
                                    <div class="item">
                                    <?php
                                        $image = $image_dir."/user/man.png";
                                        echo '<a href="?p=profile"><img class="ui avatar image" src="'.$image.'"><span style="color : #33527c !important;">'.$userInfoRow['fullname'].'</span></a>';
                                    ?>
                                    </div>

                                    <div class="item">
                                        <a href="brain/logout.php" style="height: 35px !important;"  class="ui primary button masuk" id="square-button">Keluar</a>
                                    </div>
                            <?php

                                }
                                else {
                            ?>
                                    <div class="item" style="margin-right: 20%;">
                                        
                                    </div>
                                    <div class="item">
                                        <a  id="square-button" class="ui primary button masuk btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Masuk</a>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php

            include($pages_dir.'/home.php');
        }


        ?>

        <?php
            include_once '/body/login.php';
        ?>

        <?php 
            include 'body/partials/footer.php'; ?>
    </div>
</body>


</html>