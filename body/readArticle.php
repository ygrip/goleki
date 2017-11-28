<?php
if(isset($_GET['id'])){
    require_once '/../brain/lib/antiInjection.php';
    require_once '/../vendor/autoload.php';
    require_once '/../brain/lib/convertDate.php';
    require_once '/../brain/lib/httpRequester.php';

    $url = $_SERVER['HTTP_HOST'].'/goleki/brain/artikel.php';
    $request = array('url'=>'index/'.$_GET['id']);
    $data = HTTPRequester::HTTPPost($url,$request);
    $result = (array) json_decode(json_decode(json_encode($data)),true);

    $url = $_SERVER['HTTP_HOST'].'/goleki/brain/user.php';
    $request = array('url'=>'id/'.$result['data']['author']);
    $data = HTTPRequester::HTTPPost($url,$request);
    $author = (array) json_decode(json_decode(json_encode($data)),true);
    $namanya = $author['data']['fullname'];


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
<div class="container" style="padding-left: 3%; width: 100%; padding-right: 0;">
	<div class="row">
		 <!-- HEADER -->
        <div class="header">
            <img style="width:100%" src="media/site/back.png" />
            <div class="triangulo"></div>
            <div class="profile" style="position: absolute;top: 270px; left: 10px; width: 200px;">
                <img class="photo-author img-circle" src="media/img/user/man.png" />
                <span class="name-author"><?php echo $namanya;?></span>
            </div>
            <br>
            <br>
            <h5 class="sub-title"><?php echo waktu_gabung($result['data']['created']);?></h5>
            <h1 class="title"><?php echo $result['data']['title'];?></h1>
            
        </div>

        <!-- INFO -->
        <div class="row row-eq-height">
            <div class="col-xs-12 text" style="padding: 15px;">
                <p><?php echo $result['data']['content'];?></p>
            </div>
           
        </div>
	</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section>
<?php
}else{ 
    header("Location: ?p=artikel");
}?>

<style type="text/css">
.footer{
        position: absolute !important;
        bottom: unset !important;
      right: 0;
      left: 0;
      background-color: #efefef;
      text-align: center;
    }
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
body{font-family: 'Open Sans', sans-serif;}
.header{position:relative;overflow:hidden;max-height:350px;display:flex;align-items:center;justify-content:center}
.text{
    /*-webkit-column-count: 2; 
    -moz-column-count: 2; 
    column-count: 2; */  
    margin-top:15px;        
}
.statistics > p{margin-bottom:2px;}
.statistics > p > span.label{background-color:white;color:gray;}
.side{background:#fafafa;padding-top:15px}
.side > img { margin-bottom:15px;}
.semi-title{font-weight: bold;margin-top:30px;}
.title{    
    position: absolute;
    bottom: 45px;
    padding: 7px;
    right: 25px;
    padding-left: 25px;
    padding-right: 30px;
    color: white;
    background: rgba(0,0,0,0.5);
}
.sub-title{    
    position: absolute;
    bottom: 94px;
    padding: 7px;
    right: 25px;
    padding-left: 12px;
    padding-right: 12px;
    color: orange;
    background: rgba(0,0,0,0.7);
}        
.name-author{
    position: absolute;
    bottom: 35px;
    left: 100px;
    font-size: 11px;
    color: white;
    background: black;
    padding: 2px;
    padding-right: 10px;
    padding-left: 22px;
    margin-left: -21px;
    z-index: 1;
    font-weight: 500;            
}
.photo-author{
    max-height: 70px;
    padding: 2px;
    position: absolute;
    left: 25px;
    bottom: 25px;
    background: white;
    z-index: 3;            
}
.triangulo{
    position:absolute;
    bottom:0px;
    left:0px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 60px 0 0 1200px;
    border-color: transparent transparent transparent #ffffff;
}
.row-eq-height {
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
}   

@media (max-width: 426px) {
    .header{
            margin-left: -15px;
            margin-top: -15px;
            margin-right: -15px;
    }
    .title{
        font-size:15px;
        bottom:-12px;
        right:0px;
        padding-left:10px;
        padding-right:10px;
    }
    .photo-author{
        max-height:45px;
        left:5px;
        bottom:40px;
    }
    .name-author{
        font-size:9px;
        margin-left:-63px;
        bottom:44px;
    }
    .sub-title{
        right:0px;
        bottom:18px;
        padding:5px;
        font-size:10px;
    }
}
</style>