<!-- Banner -->

<?php
function better_strip_tags( $str, $allowable_tags = '', $strip_attrs = false, $preserve_comments = false, callable $callback = null ) {
  $allowable_tags = array_map( 'strtolower', array_filter( // lowercase
      preg_split( '/(?:>|^)\\s*(?:<|$)/', $allowable_tags, -1, PREG_SPLIT_NO_EMPTY ), // get tag names
      function( $tag ) { return preg_match( '/^[a-z][a-z0-9_]*$/i', $tag ); } // filter broken
  ) );
  $comments_and_stuff = preg_split( '/(<!--.*?(?:-->|$))/', $str, -1, PREG_SPLIT_DELIM_CAPTURE );
  foreach ( $comments_and_stuff as $i => $comment_or_stuff ) {
    if ( $i % 2 ) { // html comment
      if ( !( $preserve_comments && preg_match( '/<!--.*?-->/', $comment_or_stuff ) ) ) {
        $comments_and_stuff[$i] = '';
      }
    } else { // stuff between comments
      $tags_and_text = preg_split( "/(<(?:[^>\"']++|\"[^\"]*+(?:\"|$)|'[^']*+(?:'|$))*(?:>|$))/", $comment_or_stuff, -1, PREG_SPLIT_DELIM_CAPTURE );
      foreach ( $tags_and_text as $j => $tag_or_text ) {
        $is_broken = false;
        $is_allowable = true;
        $result = $tag_or_text;
        if ( $j % 2 ) { // tag
          if ( preg_match( "%^(</?)([a-z][a-z0-9_]*)\\b(?:[^>\"'/]++|/+?|\"[^\"]*\"|'[^']*')*?(/?>)%i", $tag_or_text, $matches ) ) {
            $tag = strtolower( $matches[2] );
            if ( in_array( $tag, $allowable_tags ) ) {
              if ( $strip_attrs ) {
                $opening = $matches[1];
                $closing = ( $opening === '</' ) ? '>' : $closing;
                $result = $opening . $tag . $closing;
              }
            } else {
              $is_allowable = false;
              $result = '';
            }
          } else {
            $is_broken = true;
            $result = '';
          }
        } else { // text
          $tag = false;
        }
        if ( !$is_broken && isset( $callback ) ) {
          // allow result modification
          call_user_func_array( $callback, array( &$result, $tag_or_text, $tag, $is_allowable ) );
        }
        $tags_and_text[$j] = $result;
      }
      $comments_and_stuff[$i] = implode( '', $tags_and_text );
    }
  }
  $str = implode( '', $comments_and_stuff );
  return $str;
}
    if(!empty($_GET['q'])){
        $response = array();
        require_once '/../brain/lib/antiInjection.php';
        require_once '/../vendor/autoload.php';
        require_once '/../brain/lib/convertDate.php';
        require_once '/../brain/lib/httpRequester.php';
        $db = new \Sastrawi\Database;
        $connection = $db->connect();
        $url_query = $_GET['q'];
        // $query = antiinjections($connection,$url_query);
        $url = $_SERVER['HTTP_HOST'].'/goleki/brain/search.php';
        $request = array('query'=>$url_query);
        $data = HTTPRequester::HTTPGet($url,$request);
        $result = (array) json_decode(json_decode(json_encode($data)),true);
        $db->disconnect();
        if($result['success']==='true'){
            $response = $result['data'];
        
?>
       
        </br>
       <!-- Show Barang per Kategori -->
        <section class="showroom-section" style="height: 100%;">
            <div class="ui container">
            
            <div class="barang-section">
                <hgroup class="mb20">
                    <h1>Search Results</h1>
                    <h2 class="lead"><strong class="text-danger"><?php echo count($response);?> artikel</strong> ditemukan dari hasil pencarian : <strong class="text-danger"><?php echo $result['query'];?></strong></h2>                               
                </hgroup>
                <div class="ui blue very padded segment" id="show-barang">
                    <div class="ui stackable grid" id="content_search">
                    <?php 
                        foreach ($response as $article) {
                            $url_article = '?p=readArticle&id='.$article['id'];
                            $url = $_SERVER['HTTP_HOST'].'/goleki/brain/artikel.php';
                            $request = array('url'=>'index/'.$article['id']);
                            $data = HTTPRequester::HTTPPost($url,$request);
                            $result = (array) json_decode(json_decode(json_encode($data)),true);
                            $content = mb_strimwidth(better_strip_tags($result['data']['content']), 0, 440, "...");
                            $title = $result['data']['title'];
                    ?>
                     <article class="search-result row">
                        <div class="col-xs-9 col-sm-9 col-md-2">
                            <a href="#" class="btn btn-sq-lg" style="color: white;background-color: #787878; width: 125px; height: 130px;">
                                <strong style="font-size: 4vw;"><?php echo $article['score'];?></strong><br/>
                                Score
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-10 excerpet">
                            <h3><a href="<?php echo $url_article;?>" title=""><?php echo $title;?></a></h3>
                            <h5 style="margin-top: 0; margin-bottom: 3px;"><a href="<?php echo $url_article;?>" title="" style="color: green;"><?php echo $article['url'];?></a></h5>
                            <p><?php echo $content;?></p> 
                            <span style="float: right;"><a href="<?php echo $url_article;?>" title="Read More">Read More</a></span>                       
                        </div>
                         <span class="clearfix borda"></span>
                        <div class="col-xs-12 col-sm-12 col-md-10 excerpet" style="margin-top : 20px; margin-left: 170px;">
                        <h4>Keywords :</h4>
                        </div>
                        <span class="clearfix borda"></span>
                        <div class="col-xs-12 col-sm-12 col-md-10 excerpet" style="margin-left: 170px; margin-top : 5px;margin-bottom : 5px;  ">
                        <?php
                        foreach ($article['keywords'] as $key) {
                            # code...
                            ?>
                                <span class="label label-warning" style="display: inline-block;margin: 5px; font-size: 13px"><?php echo $key['word'].' : '.$key['count'];?></span>
                            <?php
                        }
                        ?>
                        </div>
                        <span class="clearfix borda"></span>
                    </article> 
                    <div class="ui divider"></div>  
                    <?php } ?>

                   

                </div>
                </div>
            </div>         

            </div>
        </section>

<?php
}else{
    ?>
    <br>
    <br>
    <section class="showroom-section" style="height: 100%; margin-bottom: 20%;">
            <div class="ui container">
            
            <div class="barang-section">
                <hgroup class="mb20">
                    <h1>Search Results</h1>
                    <h2 class="lead"><strong class="text-danger"><?php echo count($response);?> artikel</strong> ditemukan dari hasil pencarian : <strong class="text-danger"><?php echo $result['query'];?></strong></h2>                               
                </hgroup>
                <div class="ui blue very padded segment" id="show-barang">
                    <div class="ui stackable grid">
                    <p><strong>Sorry, sistem kami tidak dapat menemukan pencarian anda.</strong></p>
                    
                    </div>
                    <br>
                    <p>Anda mungkin bisa mencoba untuk melakukan pencarian lainnya.</p>
                    </div>
                </div>
                </div>
                </section>
                <?php

}

    }else{
        header("Location: ?p=home");
    }

?>
<style>
    @import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";
.footer{
        position: absolute !important;
        bottom: unset !important;
      right: 0;
      left: 0;
      background-color: #efefef;
      text-align: center;
    }
    .container { margin-top: 20px; }
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
    .search-result h3 > a, .search-result i { color: #248dc1 !important; }
    .search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
    .search-result span.plus { position: absolute; right: 0; top: 126px; }
    .search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
    .search-result span.plus a:hover { background-color: #414141; }
    .search-result span.plus a i { color: #fff !important; }
    .search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
</style>