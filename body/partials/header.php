<?php
    
?>
            <div class="ui borderless menu square masthead" id="nav-header" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
                <div class="ui container" style="width: 90% !important;">
                    <div class="item">
                        <a href="?p=home">
                            <img class="ui small image" src="media/site/logo.png">
                        </a>
                    </div>
                    <div class="right item" style="width: 85% !important;">
                        <div class="item">
                            <form class="ui action input" method="post" action="<?php $_PHP_SELF ?>">
                                <input id="search-box" style="font-size : 16px !important; width : 550px !important; height: 35px !important; padding : 0 !important; padding-left: 10px !important;" type="text" name="search-key" placeholder="Apa yang anda cari ?">
                                <button style="height: 35px !important;" class="ui icon primary button" name="search-something" type="submit">
                                    <i class="search icon"></i>
                                </button>
                            </form>
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

        <div style="margin-bottom: 100px; top: 0;"></div>

<?php
    include_once '/../login.php';
?>

<?php

            if (isset($_POST['search-something'])){
                $search_key = $_POST['search-key'];
                ?>
                    <script type="text/javascript">
                        var search_key = <?php echo json_encode($search_key); ?>;
                        window.location.href = 'index.php?q='+search_key;
                    </script>
                <?php

            }
        ?>

       <script type="text/javascript">
            $("#search-box").keypress(function(e){
                var search_key = $("#search-box").val();
                if(e.keyCode==13&&search_key!=""&&search_key!=null){
                    search_key = textFromHtmlString(search_key).split(' ').join('+');
                    // console.log(search_key);
                    window.location.href = 'index.php?q='+search_key;    
                }
                
            });

                function textFromHtmlString( arbitraryHtmlString ) {
                    const temp = document.createElement('div');
                    temp.innerHTML = arbitraryHtmlString;
                    return temp.innerText;
                }
        </script>