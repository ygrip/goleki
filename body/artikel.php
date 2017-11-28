<?php
	if(isset($_SESSION['user_session'])){
?>
<section class="showroom-section" style="height: 100%; margin-bottom: 10%;">
            <div class="ui container">
            
            <div class="barang-section">
                <hgroup class="mb20">
                	<br><br>
                    <h1>Artikel</h1>                              
                </hgroup>
                <div class="ui blue very padded segment" id="show-barang">
                    <div class="ui stackable grid">
                    <div class="row" id="header">
                <?php
                  require_once '/../brain/lib/antiInjection.php';
                  require_once '/../vendor/autoload.php';
                  require_once '/../brain/lib/convertDate.php';
                  require_once '/../brain/lib/httpRequester.php';
                  $dir = substr(str_replace('\\', '/', realpath(dirname(__FILE__))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));

                  $url = $_SERVER['HTTP_HOST'].'/goleki/brain/artikel.php';
                  $request = array('url'=>'all');
                  $data = HTTPRequester::HTTPPost($url,$request);
                  $result = (array) json_decode(json_decode(json_encode($data)),true);                  
                ?>

                <!-- top action bar element : -->
                <?php 
                  echo '
                <div id="parent-add" class="navbar-form navbar-right">
                    <a href="?p=createArticle" class="btn btn-success"><i style="margin-right:10px;" class="fa fa-plus-square fa-lg" aria-hidden="true"></i>Create</a>
                    <div id="children-add" class = "pesan">
                        Tambah Data
                    </div>
                </div>';
                ?>
               

                
                <table class="table table-striped table-hover table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>PENULIS</th>
                      <th style="max-width: 540px;">JUDUL ARTIKEL</th>
                      <th>DIPERBAHARUI</th>
                      <th style="min-width: 120px;">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $no = 0;                  

                    $db = new \Sastrawi\Database;
                   if(!empty($result['data'])){
                    $connection = $db->connect();
                     foreach ($result['data'] as $row) {
                        $namanya = null;
                        $id_author = $row['author'];
                        $url = $_SERVER['HTTP_HOST'].'/goleki/brain/user.php';
                  $request = array('url'=>'id/'.$id_author);
                  $data = HTTPRequester::HTTPPost($url,$request);
                  $author = (array) json_decode(json_decode(json_encode($data)),true);
                        $namanya = $author['data']['fullname'];
                              $no++;
                              echo '<tr>';
                              echo '<td>'. $no . '</td>';
                              echo '<td>'. antiinjections($connection,$namanya) . '</td>';
                              echo '<td>'. antiinjections($connection,$row['title']) . '</td>';
                              echo '<td>'. antiinjections($connection,tgl_indonesia($row['created'])) . '</td>';
                              echo '<td style="max-width:250;min-width:50px;">';
                                  echo '
                                      <div id="parent-read">
                                        <a class="btn btn-info" href="?p=readArticle&id='.$row['id'].'">
                                          <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                        </a>
                                        <div id="children-read" class = "pesan">
                                           Lihat Detail
                                        </div>
                                      </div>';
                                  echo ' ';
                                  echo '
                                      <div id="parent-delete">
                                        <a type="button" class="btn btn-danger" onclick="confirm_modal(\'../brain/artikel.php\',\'Hapus artikel?\',\'Apa anda ingin menghapus artikel : \',\'/delete/'.$id_author.'/'.$row['id'].'\',\''.$row['title'].'\');">
                                          <i class="fa fa-trash-o fa-lg"></i>
                                        </a>
                                        <div id="children-delete" class = "pesan">
                                           Hapus Data
                                        </div>
                                      </div>';
                              echo '</td>';
                              echo '</tr>';
                     }
                   }
                   $db->disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
        </div>
         
</div>
</div>
</div>
</div>
</section>
<?php
}else{
    include '403.php';
}
?>

<!-- modal -->
        <div style="border : none !important; overflow: hidden !important; top : 30%; left : 25%; right : 25%; background-color: transparent; padding: 0 !important; [padding-right: 0;" tabindex="-1" class="modal fade" id="confirm-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: inherit;height: inherit;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <form class="form-horizontal" id="form-delete" method="post">
                  <div class="modal-body">
                      <input type="hidden" name="url" id="value-to-delete"/>
                      <p class="alert alert-error" id="alert-message-delete"></p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                      <button type="submit" id="btn-to-delete" class="btn btn-danger btn-ok">Ya</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
    
<script type="text/javascript">
function confirm_modal(action,title,message,id,username)
        {
              // console.log("cek");
            $('#confirm-delete').modal('show', {backdrop: 'static'});
            document.getElementById('form-delete').action = action;
            document.getElementById("value-to-delete").value = id;
            // console.log(action);
            // console.log(title);
            // console.log(message);
            // console.log(id);
            // console.log(username);
            var alert = document.getElementById('alert-message-delete');
            var str = message+'<strong>'+username+'</strong>';
            if (alert) {
                alert.innerHTML = str;
            }
            if($('.modal-title')){
                $('.modal-title').empty();
                $('.modal-title').append(title);

            }
        }
  $('#load-content').ready(function(){
    $('#dataTable').DataTable();
        $('#dataTable_filter input').attr('placeholder', 'Filter Pencarian');
        $('#dataTable_filter input').attr('id', 'search-box1');
        $('#dataTable_filter').append('<i id="search-icon1" class="fa fa-search fa-lg" aria-hidden="true" style="color:#777;float : left !important; left : 0;z-index:1;"></i>');
        $('#dataTable_filter').append($('#dataTable_filter input'));

        $('#dataTable_filter label').remove();
        $('#dataTable_filter').children().width($('#dataTable_filter').width());
        var select = $('#dataTable_length select');
        $('#dataTable_length label').empty();
        $('#dataTable_length label').append("Tampilkan : ");
        $('#dataTable_length label').append(select);
        $('#dataTable_length label').append(" data");
        $('.dataTables_empty').empty();
        $('.dataTables_empty').append("Belum ada data tersimpan untuk table ini");


     //    $('#search-box1').on('focus', function() {
      //     $('#search-icon1').addClass('get-focused');
      // });

      // $('#search-box1').off('focus', function() {
      //     $('#search-icon1').removeClass('get-focused');
      // });

      $('#search-box1').on({
          focus: function () {
              $('#search-icon1').addClass('get-focused');
          },

          blur: function () {
              $('#search-icon1').removeClass('get-focused');
          }
      });
  });
        
</script>

<style type="text/css">
	@import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";

	.footer{
		position: absolute !important;
		bottom: unset !important;
      right: 0;
      left: 0;
      background-color: #efefef;
      text-align: center;
	}
#dataTable_length, #dataTable_filter{
        margin-bottom: 10px !important;
        align-items: center !important;
        display: flex !important;
        float : left;
        justify-content: center !important;
        overflow: visible !important;  
        margin-top: 5px !important;     
      }
      #dataTable_filter{
        max-width: 450px !important;
        min-width: 300px !important;
        max-height: 33px !important;
        float: right !important;
        right: 10px !important;
        align-items: right !important;
        display: flex !important;
        justify-content: right !important;
      }

      #dataTable_filter input{
          max-width: 150px !important;
          min-width: 100px !important; 
          min-height: 33px !important;
          margin-bottom: 10px !important;
          margin-left:  0 !important;
          border-top-left-radius: 0px;
          border-top-right-radius: 25px;
          border-bottom-right-radius: 25px;
          border-bottom-left-radius: 0px;
          float: right !important;
          z-index: 2 !important;
          border-left-width: 0px !important;
      }

      .get-focused{
        color: rgb(0,0,0) !important;
        border-color: #66afe9 !important;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
        outline: 0 none !important;
      }

      #dataTable_filter i{
        border-bottom-left-radius: 25px;
        border-top-left-radius: 25px;
        box-sizing: border-box;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        /*border: 1px solid #ccc;*/
        height: 33px !important;
        padding: 5px;
        padding-top: 8px !important;
        width: 33px !important;
        margin-right: 0 !important;
        border-top-width: 1px;
        border-right-width: 0px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: rgb(204, 204, 204);
        border-right-color: rgb(204, 204, 204);
        border-bottom-color: rgb(204, 204, 204);
        border-left-color: rgb(204, 204, 204);
        -moz-border-top-colors: none;
        -moz-border-right-colors: none;
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        border-image-source: none;
        border-image-slice: 100% 100% 100% 100%;
        border-image-width: 1 1 1 1;
        border-image-outset: 0 0 0 0;
        border-image-repeat: stretch stretch;
      }

      #dataTable_filter input:focus{
          max-width: 450px !important;
          border-color: #66afe9 !important;
          -webkit-box-shadow: inset -2px 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
          box-shadow: inset -2px 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
          outline: 0 none !important;
      }
      #dataTable_length select{
          max-width: 100px !important;
          text-decoration: none !important;
      }
      #dataTable_length select option{
          text-decoration: none !important;
      }
      #parent-read, #parent-update, #parent-delete{
        align-items: center !important;
        display: flex !important;
        float : left !important ;
        justify-content: center !important;
        overflow: visible !important;
        
      }
      #parent-read a, #parent-update a, #parent-delete a{
        margin-right: 10px !important;
        margin-left: 10px !important;
      }
      #parent-add{
        margin-left: 88%;
      }
      #parent-add, #parent-drop, #parent-drop-table, #parent-reset{
        margin-top: -10px !important;
        margin-bottom: 10px !important;
      }
       #parent-read:hover #children-read{
        display: block !important;
      }
      #parent-update:hover #children-update{
        display: block !important;
      }
      #parent-delete:hover #children-delete{
        display: block !important;
      }
      #parent-add:hover #children-add{
        display: block !important;
      }
      #parent-drop:hover #children-drop{
        display: block !important;
      }
      #parent-drop-table:hover #children-drop-table{
        display: block !important;
      }
      #parent-reset:hover #children-reset{
        display: block !important;
      }
      #children-read, #children-update, #children-delete, #children-add, #children-drop, #children-drop-table, #children-reset{
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
      #children-add, #children-drop, #children-drop-table, #children-reset{
        margin-top: -80px !important;
        padding: 10px !important;
      }
      #children-read:before, #children-update:before, #children-delete:before, #children-add:before, #children-drop:before, #children-drop-table:before, #children-reset:before{
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
      .pesan{
        position: absolute;
      }
 </style>