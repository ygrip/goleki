   
        </br>

         <?php
                        require_once __DIR__.'/../brain/lib/antiInjection.php';
                        $dir = substr(str_replace('\\', '/', realpath(dirname(__FILE__))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));
                         
                        
        ?>
        <div style="margin-bottom: 120px; top: 0;"></div>
        <section class="showroom-section" style="vertical-align: middle; line-height: normal;">
            <div class="ui container">
                <div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
                    <div class="column" id="content-login-regis" style="max-width: 90% !important;">
                        <a href="?p=home">
                            <img class="ui centered medium image" src="media/site/logo.png">
                        </a>
                        </br>
                        </br>
                            <form class="ui action input centered medium" method="post" action="<?php $_PHP_SELF ?>">
                                <input id="search-box" style="font-size : 16px !important; width : 550px !important; height: 35px !important; padding : 0 !important; padding-left: 10px !important;" type="text" name="search-key" placeholder="Apa yang anda cari ?">
                                <button style="height: 35px !important;" class="ui icon primary button" name="search-something" type="submit">
                                    <i class="search icon"></i>
                                </button>
                            </form>
                    </div>
                    <?php
                    
                    ?>
                   

                </div>
                </div>
            </div>         

            </div>
        </section>


        <?php

            if (isset($_POST['search-something'])){
                $search_key = $_POST['search-key'];
                ?>
                    <script type="text/javascript">
                        var search_key = <?php echo json_encode(urlencode($search_key)); ?>;
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