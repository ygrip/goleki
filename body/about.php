<?php
	$yunaz = 'media/site/yunaz.jpg';
    require_once '/../brain/lib/httpRequester.php';
    $dir = substr(str_replace('\\', '/', realpath(dirname(__FILE__))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));

    $url = $_SERVER['HTTP_HOST'].'/goleki/brain/artikel.php';
    $request = array('url'=>'all');
    $data = HTTPRequester::HTTPPost($url,$request);
    $result = (array) json_decode(json_decode(json_encode($data)),true); 
?>
<section class="showroom-section" style="height: 100%; margin-bottom: 10%;">
            <div class="ui container">
            
            <div class="barang-section">
                <hgroup class="mb20">
                	<br><br>
                    <h1>About Goleki</h1>                              
                </hgroup>
                <div class="ui blue very padded segment" id="show-barang">
                    <div class="ui stackable grid">
         <article class="search-result row">
		<div class="col-lg-4 col-sm-4 col-md-2">
		<h3>Sang Pengembang :</h3>
            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="<?php echo $yunaz;?>">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="https://www.linkedin.com/in/yunaz-gilang-a99706129/">Yunaz Gilang</a>
                    </div>
                    <div class="desc"><h4>Developer</h4></div><br>
                    <div class="desc" style="padding: 13px;"><p>I am an Informatics Engineering Student from Politeknik Elektronika Negeri Surabaya. I learn general things of Information and Technology. Having high spirit to learn and be able to adapt to new things are my major traits.</p></div>
                    <br>
                </div>
                <div class="bottom">
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="https://plus.google.com/u/0/+YunazGilangJOSS">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-default btn-sm" rel="publisher"
                       href="https://github.com/YunazGilang">
                        <i class="fa fa-github"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="https://www.linkedin.com/in/yunaz-gilang-a99706129/">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>

        </div>
         <div class="col-xs-6 col-sm-12 col-md-8 excerpet">
         <h3>Mengenal Goleki :</h3>

                            <div class="ui stackable middle aligned center aligned grid" id="top-login-regis">
                    <div class="column" id="content-login-regis" style="max-width: 100% !important;">
                        <a href="?p=home">
                            <img class="ui centered medium image" src="media/site/logo.png">
                        </a>
                        </div>
                        </div style="text-align: center;">
                            <center><p><strong>Goleki</strong> adalah mesin pencarian sederhana untuk artikel terkait <strong>kesenian</strong>.
                            	<strong><br>Goleki</strong>, dirancang menggunakan algoritma Text Mining yaitu TF.	
                            </p> 
                            <p><strong>Goleki</strong> menggunakan library Text Mining Bahasa Indonesia <a href="https://github.com/sastrawi/sastrawi">Sastrawi</a>	dengan sedikit modifikasi.
                            <br><strong>Goleki</strong> menggunakan kata dasar bahasa Indonesia yang dapat diperoleh dari link berikut : <a href="https://www.dropbox.com/s/dbo2zoh3h6ddkbi/tb_katadasar.sql">https://www.dropbox.com/s/dbo2zoh3h6ddkbi/tb_katadasar.sql</a>
                             <br><strong>Goleki</strong> juga menggunakan stoplist bahasa Indonesia yang dapat diperoleh dari link berikut : <a href="https://www.kaggle.com/oswinrh/indonesian-stoplist">https://www.kaggle.com/oswinrh/indonesian-stoplist</a>.
                            </p>  
                            <p>Saat ini terdapat <?php echo count($result['data']);?> artikel di database <strong>Goleki</strong></p>
                            </center>                     
                        </div>
                        <span class="clearfix borda"></span>
        </article>
</div>
</div>
</div>
</div>
</section>

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

    .mb20 { margin-bottom: 20px; } 

    hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
    hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
    hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

    .search-result .thumbnail { border-radius: 0 !important; }
    .search-result:first-child { margin-top: 0 !important; }
    .search-result { margin-top: 20px; }
    .search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
    .search-result ul { padding-left: 0 !important; list-style: none;  }
    .search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
    .search-result ul li i { padding-right: 5px; }
    .search-result .col-md-7 { position: relative; }
    .search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
    .search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
    .search-result span.plus { position: absolute; right: 0; top: 126px; }
    .search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }

.card {
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    display: inline-block;
}

.card .card-heading {
    padding: 0 20px;
    margin: 0;
}

.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}

.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}

.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}

.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}

.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}

.card.people:first-child {
    margin-left: 0;
}

.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}

.card.people .card-top.green {
    background-color: #53a93f;
}

.card.people .card-top.blue {
    background-color: #427fed;
}

.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}

.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.hovercard {
	display: inline-block;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}

.card.hovercard .cardheader {
    background: url("media/site/back.png");
    background-size: cover;
    height: 135px;
}

.card.hovercard .avatar {
    position: relative;
    top: -50px;
    margin-bottom: -50px;
}

.card.hovercard .avatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}

.card.hovercard .info {
    padding: 4px 8px 10px;
}

.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}

.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}


</style>