<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    $db = new \Sastrawi\Database;
  
    if (isset($_POST['create_article'])) {
         var_dump($_POST);
        // keep track validation errors
        $titleError = null;
         
        // keep track post values
        $author = $_SESSION['user_session'];
        $title = $_POST['title'];
        $content = $_POST['mytextarea'];
         
        // validate input
        $valid = true;
        if (empty($title)) {
            $titleError = 'Judul Artikel tidak boleh kosong';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
           $url = $_SERVER['HTTP_HOST'].'/goleki/brain/mineFeature.php';
        $data = array("sentence" => $title.$content);
        $feature = HTTPRequester::HTTPPost($url,$data);
        $conn = $db->connect();

           $query = mysqli_query($conn,"SELECT * FROM tb_artikel WHERE author = '$author' AND title ='".$title."';");
            $sql = null;
            if (mysqli_num_rows($query) != 0){
                $id = null;
                foreach ($query as $row) {
                    $id = $row['id'];
                    break;
                }
                $sql = "UPDATE tb_artikel SET author = '$author', title = '$title', content = '$content', feature = '$feature' ,created = now() WHERE ID_REPORT = '$id';";
            }else{
                $sql = "INSERT INTO tb_artikel (author,title,content,feature,created) values('$author', '$title', '$content', '$feature', now())";
            }
            
            mysqli_query($conn,$sql);
            $db->disconnect();
    		header("Location: ?p=artikel");
        }
    }
?>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=iclfvngzu4ctjg1f85p8vel6v8u5haw804nc6otxu1dzn3xj"></script> 

        <script>
          tinymce.init({
          selector: '#mytextarea',
          height: 500,
          theme: 'modern',
          plugins: [
            'lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime nonbreaking save table contextmenu directionality',
            'emoticons paste textcolor colorpicker textpattern codesample toc help'
          ],
          toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | preview | forecolor backcolor emoticons | help',
          image_advtab: true,
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ],
          setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
         });
          function myFunction() {
            document.getElementById("myForm").reset();
        }
        function decodeEntities(encodedString) {
            var textArea = document.createElement('textarea');
            textArea.innerHTML = encodedString;
            return textArea.value;
        }
        function create(){
            var $author=<?php echo json_encode($_SESSION['user_session']); ?>;
            var $title=$('#title_field').val();
            var $content=$('#mytextarea').val();
            // var translated = $.parseHTML($content);
            // var $final = $(translated).text();

            // console.log($author);
            // console.log($title);
            // console.log($final);
            ceateArticle($title,$author,$content);
        }
        function ceateArticle(title, author,content){
        var resp;
        $.ajax({
          type: "POST",
            url: "brain/createArticle.php",
            dataType: 'text',
            data: {'author':author,'title' : title, 'content' : content},
              success: function(data){
                  // console.log(data);
                  resp = data;
                  setTimeout(function(){
                           window.location.replace('?p=artikel');
                    }, 100);
              },
              error: function ( jqXHR, textStatus, errorThrown ) {
                console.log("textStatus: " + textStatus);
                console.log("errorThrown: " + errorThrown);
              }
        });
        return resp;
      }
        </script>
   <section class="showroom-section" style="height: 100%; margin-bottom: 10%;">
            <div class="ui container">
            
            <div class="barang-section">                             
                </hgroup>
                <div class="ui blue very padded segment" id="show-barang">
                    <div class="ui stackable grid">
        <div class="container-fluid main-container" style="width: 100%;">
                
                <div class="absolute-wrapper">
                    
                    <h1 class="well" style="text-align: center;">Buat Artikel
                    </h1>
                    <div style="text-align: center;">
                        <div class="well" style="width: 100%; margin: 0 auto;">
                        <form id="myForm"  method="post" action="createArticle.php">
                            <div style="text-align: center; margin-bottom: 20px; width: 100%;">
                                <div class="control-group <?php echo !empty($titleError)?'error':'';?>" style="display: table; margin: 0 auto; width: 100%;">

                                    <div class="controls ui input" style="display: table-cell; width: 80%;">
                                        <input id="title_field" style="margin-left:20px;width : 100%;margin-top:5px; padding-left:10px;" name="title" type="text"  placeholder="Judul Artikel" value="<?php echo !empty($title)?$title:'';?>" required>
                                        <?php if (!empty($titleError)): ?>
                                            <span class="help-inline"><?php echo $titleError;?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <textarea id="mytextarea" name="mytextarea" required></textarea>

                            <div class="form-actions" style="text-align: center; margin-top: 30px;">
                                <div style="display: table; margin:0 auto;">
                                    <div style="display: table-cell;">
                                        <button onclick="myFunction()" style="width: 100px; max-width: 200px;  margin-left: 20px; margin-right: 20px;" type="reset" class="btn btn-lg btn-warning">Reset</button> </br>
                                    </div>
                                    <div style="display: table-cell;">
                                        <button onclick="create()" style="width: 100px; max-width: 200px; margin-left: 20px; margin-right: 20px;" type="submit" name="create_article" class="btn btn-lg btn-info">Submit</button> </br>
                                    </div>
                                </div>           
                            </div>
                        </form>
                    </div>
                    </div>
                    
                
         </div> <!-- /container -->
         </div>
         </div>
         </div>
         </div>
         </div>
         </section>

         <style type="text/css">
         #title_field {
    text-align: center;
    font-size: 20px;
}
         /**/
            .controls input{
                min-height: 30px !important;
                min-width: 350px !important;
            }
            .controls{
                max-width: 450px !important;
                padding-right: 50px !important;
            }
            .row input #text{
                top:5px;
            }
            .row input{
                margin-right: 10px;
                margin-left: 10px;
                padding: 0;
                font-size: 18px;
            }
            .row{
                padding-left: 10px;
            }
            #parent-add{
                margin-top: -50px !important;
                margin-bottom: 10px !important;
            }
            #parent-add:hover #children-add{
                display: block !important;
            }
            #children-add{
                display: none !important;
                position: absolute;
                z-index: 1;
                background: #CCDBDC;
                background-color: rgb(204, 219, 220);
                background-image: none;
                background-repeat: repeat;
                background-attachment: scroll;
                background-clip: border-box;
                background-origin: padding-box;
                background-position-x: 0%;
                background-position-y: 0%;
                background-size: auto auto;
                color:#003366;
                padding-top : 10px;
                padding-bottom : 10px;
                padding-right: 5px;
                padding-left: 5px;
                margin-top: -90px;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                font-size: 12px !important;
              }
              #children-add{
                margin-top: -85px !important;
                padding: 10px !important;
              }
              #children-add:before{
                content: "";
                position: absolute;
                bottom: -10px;
                left: 40%;
                border-width: 10px 10px 0;
                border-style: solid;
                border-color: #CCDBDC transparent;
                display: block;
                width: 0;
                z-index: 2;
                box-sizing: border-box;
              }
              .footer{
        position: absolute !important;
        bottom: unset !important;
      right: 0;
      left: 0;
      background-color: #efefef;
      text-align: center;
    }
        </style>