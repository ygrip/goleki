<?php
// demo.php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// create stemmer
// cukup dijalankan sekali saja, biasanya didaftarkan di service container;
// $db = new \Sastrawi\Database;
// $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
// $stemmer  = $stemmerFactory->createStemmer();

// //stopwords
//  $conn = $db->connect();

// $sql = "SELECT kata FROM tb_stopwords";
// $result = mysqli_query($conn,$sql);
// // $data = mysqli_fetch_array($result,MYSQLI_ASSOC);
// // print_r($result);
// $stopwords = array();

// foreach ($result as $word) {
//     # code...
//     array_push($stopwords, $word['kata']);
// }

// $db->disconnect();

// // stem
// $sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';
// $words = explode(' ', $sentence);
// $selected = array_diff($words, $stopwords);
// $sentence = "";
// foreach ($selected as $word) {
// 	# code...
// 	$sentence .= $word." ";
// }
// $output   = $stemmer->stem($sentence);

// echo $output . "\n";
// // ekonomi indonesia sedang dalam tumbuh yang bangga

// echo $stemmer->stem('Mereka menirukannya kupu-kupuan') . "\n";
// // mereka tiru
# Enable Error Reporting and Display:

require_once __DIR__.'/brain/lib/httpRequester.php';
require_once __DIR__.'/brain/lib/util.php';
$url = $_SERVER['HTTP_HOST'].'/goleki/brain/createArticle.php';
$data = array('author' => 1,
	'title' => 'MACAM-MACAM KESENIAN TRADISIONAL NUSANTARA',
	'content' => '
1. Kuda lumping
juga disebut jaran kepang atau jathilan adalah tarian tradisional Jawa menampilkan sekelompok prajurit tengah menunggang kuda. Tarian ini menggunakan kuda yang terbuat dari bambu yang di anyam dan dipotong menyerupai bentuk kuda. Anyaman kuda ini dihias dengan cat dan kain beraneka warna. Tarian kuda lumping biasanya hanya menampilkan adegan prajurit berkuda, akan tetapi beberapa penampilan kuda lumping juga menyuguhkan atraksi kesurupan, kekebalan, dan kekuatan magis, seperti atraksi memakan beling dan kekebalan tubuh terhadap deraan pecut. Jaran Kepang merupakan bagian dari pagelaran tari reog. Meskipun tarian ini berasal dari Jawa, Indonesia, tarian ini juga diwariskan oleh kaum Jawa yang menetap di Sumatera Utara dan di beberapa daerah di luar Indonesia seperti di Malaysia. Kuda lumping adalah seni tari yang dimainkan dengan properti berupa kuda tiruan, yang terbuat dari anyaman bambu atau kepang. Tidak satupun catatan sejarah mampu menjelaskan asal mula tarian ini, hanya riwayat verbal yang diturunkan dari satu generasi ke generasi berikutnya. Konon, tari kuda lumping merupakan bentuk apresiasi dan dukungan rakyat jelata terhadap pasukan berkuda Pangeran Diponegoro dalam menghadapi penjajah Belanda. Ada pula versi yang menyebutkan, bahwa tari kuda lumping menggambarkan kisah perjuangan Raden Patah, yang dibantu oleh Sunan Kalijaga, melawan penjajah Belanda. Versi lain menyebutkan bahwa, tarian ini mengisahkan tentang latihan perang pasukan Mataram yang dipimpin Sultan Hamengku Buwono I, Raja Mataram, untuk menghadapi pasukan Belanda.
Terlepas dari asal usul dan nilai historisnya, tari kuda lumping merefleksikan semangat heroisme dan aspek kemiliteran sebuah pasukan berkuda atau kavaleri. Hal ini terlihat dari gerakan-gerakan ritmis, dinamis, dan agresif, melalui kibasan anyaman bambu, menirukan gerakan layaknya seekor kuda di tengah peperangan. Seringkali dalam pertunjukan tari kuda lumping, juga menampilkan atraksi yang mempertontonkan kekuatan supranatural berbau magis, seperti atraksi mengunyah kaca, menyayat lengan dengan golok, membakar diri, berjalan di atas pecahan kaca, dan lain-lain. Mungkin, atraksi ini merefleksikan kekuatan supranatural yang pada zaman dahulu berkembang di lingkungan Kerajaan Jawa, dan merupakan aspek non militer yang dipergunakan untuk melawan pasukan Belanda.
2. Reog
adalah salah satu kesenian budaya yang berasal dari Jawa Timur bagian barat-laut dan Ponorogo dianggap sebagai kota asal Reog yang sebenarnya. Gerbang kota Ponorogo dihiasi oleh sosok warok dan gemblak, dua sosok yang ikut tampil pada saat reog dipertunjukkan. Reog adalah salah satu budaya daerah di Indonesia yang masih sangat kental dengan hal-hal yang berbau mistik dan ilmu kebatinan yang kuat. Ada lima versi cerita populer yang berkembang di masyarakat tentang asal-usul Reog dan Warok, namun salah satu cerita yang paling terkenal adalah cerita tentang pemberontakan Ki Ageng Kutu, seorang abdi kerajaan pada masa Bhre Kertabhumi, Raja Majapahit terakhir yang berkuasa pada abad ke-15. Ki Ageng Kutu murka akan pengaruh kuat dari pihak istri raja Majapahit yang berasal dari Cina, selain itu juga murka kepada rajanya dalam pemerintahan yang korup, ia pun melihat bahwa kekuasaan Kerajaan Majapahit akan berakhir. Ia lalu meninggalkan sang raja dan mendirikan perguruan di mana ia mengajar seni bela diri kepada anak-anak muda, ilmu kekebalan diri, dan ilmu kesempurnaan dengan harapan bahwa anak-anak muda ini akan menjadi bibit dari kebangkitan kerajaan Majapahit kembali. Sadar bahwa pasukannya terlalu kecil untuk melawan pasukan kerajaan maka pesan politis Ki Ageng Kutu disampaikan melalui pertunjukan seni Reog, yang merupakan "sindiran" kepada Raja Kertabhumi dan kerajaannya. Pagelaran Reog menjadi cara Ki Ageng Kutu membangun perlawanan masyarakat lokal menggunakan kepopuleran Reog. Dalam pertunjukan Reog ditampilkan topeng berbentuk kepala singa yang dikenal sebagai "Singa barong", raja hutan, yang menjadi simbol untuk Kertabhumi, dan diatasnya ditancapkan bulu-bulu merak hingga menyerupai kipas raksasa yang menyimbolkan pengaruh kuat para rekan Cinanya yang mengatur dari atas segala gerak-geriknya. Jatilan, yang diperankan oleh kelompok penari gemblak yang menunggangi kuda-kudaan menjadi simbol kekuatan pasukan Kerajaan Majapahit yang menjadi perbandingan kontras dengan kekuatan warok, yang berada dibalik topeng badut merah yang menjadi simbol untuk Ki Ageng Kutu, sendirian dan menopang berat topeng singabarong yang mencapai lebih dari 50 kg hanya dengan menggunakan giginya. Kepopuleran Reog Ki Ageng Kutu akhirnya menyebabkan Bhre Kertabhumi mengambil tindakan dan menyerang perguruannya, pemberontakan oleh warok dengan cepat diatasi, dan perguruan dilarang untuk melanjutkan pengajaran akan warok. Namun murid-murid Ki Ageng kutu tetap melanjutkannya secara diam-diam. Walaupun begitu, kesenian Reognya sendiri masih diperbolehkan untuk dipentaskan karena sudah menjadi pertunjukan populer di antara masyarakat, namun jalan ceritanya memiliki alur baru di mana ditambahkan karakter-karakter dari cerita rakyat Ponorogo yaitu Kelono Sewandono, Dewi Songgolangit, dan Sri Genthayu. Versi resmi alur cerita Reog Ponorogo kini adalah cerita tentang Raja Ponorogo yang berniat melamar putri Kediri, Dewi Ragil Kuning, namun di tengah perjalanan ia dicegat oleh Raja Singabarong dari Kediri. Pasukan Raja Singabarong terdiri dari merak dan singa, sedangkan dari pihak Kerajaan Ponorogo Raja Kelono dan Wakilnya Bujang Anom, dikawal oleh warok (pria berpakaian hitam-hitam dalam tariannya), dan warok ini memiliki ilmu hitam mematikan. Seluruh tariannya merupakan tarian perang antara Kerajaan Kediri dan Kerajaan Ponorogo, dan mengadu ilmu hitam antara keduanya, para penari dalam keadaan "kerasukan" saat mementaskan tariannya. Hingga kini masyarakat Ponorogo hanya mengikuti apa yang menjadi warisan leluhur mereka sebagai warisan budaya yang sangat kaya. Dalam pengalamannya Seni Reog merupakan cipta kreasi manusia yang terbentuk adanya aliran kepercayaan yang ada secara turun temurun dan terjaga. Upacaranya pun menggunakan syarat-syarat yang tidak mudah bagi orang awam untuk memenuhinya tanpa adanya garis keturunan yang jelas. mereka menganut garis keturunan Parental dan hukum adat yang masih berlaku.
3. Sintren
adalan kesenian tari tradisional masyarakat Jawa, khususnya di Pekalongan. Kesenian ini terkenal di pesisir utara Jawa Tengah dan Jawa Barat, antara lain di Pemalang, Pekalongan, Brebes, Banyumas, Kuningan, Cirebon, Indramayu, dan Jatibarang. Kesenian Sintren dikenal juga dengan nama lais. Kesenian Sintren dikenal sebagai tarian dengan aroma mistis/magis yang bersumber dari cerita cinta kasih Sulasih dengan Sulandono. Kesenian Sintren berasal dari kisah Sulandono sebagai putra Ki Baurekso hasil perkimpoiannya dengan Dewi Rantamsari. Raden Sulandono memadu kasih dengan Sulasih seorang putri dari Desa Kalisalak, namun hubungan asmara tersebut tidak mendapat restu dari Ki Baurekso, akhirnya R. Sulandono pergi bertapa dan Sulasih memilih menjadi penari. Meskipun demikian pertemuan di antara keduanya masih terus berlangsung melalui alam gaib. Pertemuan tersebut diatur oleh Dewi Rantamsari yang memasukkan roh bidadari ke tubuh Sulasih, pada saat itu pula R. Sulandono yang sedang bertapa dipanggil oleh roh ibunya untuk menemui Sulasih dan terjadilah pertemuan di antara Sulasih dan R. Sulandono. Sejak saat itulah setiap diadakan pertunjukan sintren sang penari pasti dimasuki roh bidadari oleh pawangnya, dengan catatan bahwa hal tersebut dilakukan apabila sang penari masih dalam keadaan suci (perawan).

5. Ludruk
 adalah kesenian drama tradisional dari Jawa Timur. Ludruk merupakan suatu drama tradisional yang diperagakan oleh sebuah grup kesenian yang di gelarkan disebuah panggung dengan mengambil cerita tentang kehidupan rakyat sehari-hari, cerita perjuangan dan lain sebagainya yang diselingi dengan lawakan dan diiringi dengan gamelan sebagai musik.
Dialog/monolog dalam ludruk bersifat menghibur dan membuat penontonnya tertawa, menggunakan bahasa khas Surabaya, meski kadang-kadang ada bintang tamu dari daerah lain seperti Jombang, Malang, Madura, Madiun dengan logat yang berbeda. Bahasa lugas yang digunakan pada ludruk, membuat dia mudah diserap oleh kalangan non intelek (tukang becak, peronda, sopir angkutan umum, dll). Sebuah pementasan ludruk biasa dimulai dengan Tari Remo dan diselingi dengan pementasan seorang tokoh yang memerakan "Pak Sakera", seorang jagoan Madura. Kartolo adalah seorang pelawak ludruk legendaris asal Surabaya, Jawa Timur. Ia sudah lebih dari 40 tahun hidup dalam dunia seni ludruk. Nama Kartolo dan suaranya yang khas, dengan banyolan yang lugu dan cerdas, dikenal hampir di seluruh Jawa Timur, bahkan hingga Jawa Tengah. Ludruk berbeda dengan ketoprak dari Jawa Tengah. Cerita ketoprak sering diambil dari kisah zaman dulu (sejarah maupun dongeng), dan bersifat menyampaikan pesan tertentu. Sementara ludruk menceritakan cerita hidup sehari-hari (biasanya) kalangan wong cilik.
6. Karapan sapi
Merupakan istilah untuk menyebut perlombaan pacuan sapi yang berasal dari Pulau Madura, Jawa Timur. Karapan Sapi, Budaya Indonesia dari Madura, pada perlombaan ini, sepasang sapi yang menarik semacam kereta dari kayu (tempat joki berdiri dan mengendalikan pasangan sapi tersebut) dipacu dalam lomba adu cepat melawan pasangan-pasangan sapi lain. Trek pacuan tersebut biasanya sekitar 100 meter dan lomba pacuan dapat berlangsung sekitar sepuluh detik sampai satu menit. Beberapa kota di Madura menyelenggarakan karapan sapi pada bulan Agustus dan September setiap tahun, dengan pertandingan final pada akhir September atau Oktober di kota Pamekasan untuk memperebutkan Piala Bergilir Presiden. Karapan Sapi didahului dengan mengarak pasangan-pasangan sapi mengelilingi arena pacuan dengan diiringi gamelan Madura yang dinamakan saronen. Babak pertama adalah penentuan kelompok menang dan kelompok kalah. Babak kedua adalah penentuan juara kelompok kalah, sedang babak ketiga adalah penentuan juara kelompok menang. Piala Bergilir Presiden hanya diberikan pada juara kelompok menang
7. Ondel-ondel
 adalah bentuk pertunjukan rakyat Betawi yang sering ditampilkan dalam pesta-pesta rakyat. Nampaknya ondel-ondel memerankan leluhur atau nenek moyang yang senantiasa menjaga anak cucunya atau penduduk suatu desa. Ondel-ondel yang berupa boneka besar itu tingginya sekitar 2,5 meter dengan garis tengah ± 80 cm, dibuat dari anyaman bambu yang disiapkan begitu rupa sehingga mudah dipikul dari dalamnya. Bagian wajah berupa topeng atau kedok, dengan rambut kepala dibuat dari ijuk. Wajah ondel-ondel laki-laki biasanya dicat dengan warna merah, sedangkan yang perempuan warna putih. Bentuk pertunjukan ini banyak persamaannya dengan yang ada di beberapa daerah lain. Di Pasundan dikenal dengan sebutan Badawang, di Jawa Tengah disebut Barongan Buncis, sedangkan di Bali lebih dikenal dengan nama Barong Landung. Menurut perkiraan jenis pertunjukan itu sudah ada sejak sebelum tersebarnya agama Islam di Pulau Jawa. Semula ondel-ondel berfungsi sebagai penolak bala atau gangguan roh halus yang gentayangan. Dewasa ini ondel-ondel biasanya digunakan untuk menambah semarak pesta- pesta rakyat atau untuk penyambutan tamu terhormat, misalnya pada peresmian gedung yang baru selesai dibangun. Betapapun derasnya arus modernisasi, ondel-ondel masih bertahan dan menjadi penghias wajah kota metropolitan Jakarta.
8. Wayang kulit 
merupakan salah satu kesenian tradisi yang tumbuh dan berkembang di masyarakat Jawa. Lebih dari sekadar pertunjukan, wayang kulit dahulu digunakan sebagai media untuk permenungan menuju roh spiritual para dewa. Konon, “wayang” berasal dari kata “ma Hyang”, yang berarti menuju spiritualitas sang kuasa. Tapi, ada juga masyarakat yang mengatakan “wayang” berasal dari tehnik pertunjukan yang mengandalkan bayangan (bayang/wayang) di layar. Wayang kulit diyakini sebagai embrio dari berbagai jenis wayang yang ada saat ini. Wayang jenis ini terbuat dari lembaran kulit kerbau yang telah dikeringkan. Agar gerak wayang menjadi dinamis, pada bagian siku-siku tubuhnya disambung menggunakan sekrup yang terbuat dari tanduk kerbau.
Wayang kulit dimainkan langsung oleh narator yang disebut dalang. Dalang tidak dapat diperankan oleh sembarang orang. Selain harus lihai memainkan wayang, sang dalang juga harus mengetahui berbagai cerita epos pewayangan seperti Mahabrata dan Ramayana. Dalang dahulu dinilai sebagai profesi yang luhur, karena orang yang menjadi dalang biasanya adalah orang yang terpandang, berilmu, dan berbudi pekerti yang santun. Sambil memainkan wayang, sang dalang diiringi musik yang bersumber dari alat musik gamelan. Di sela-sela suara gamelan, dilantunkan syair-syair berbahasa Jawa yang dinyanyikan oleh para pesinden yang umumnya adalah perempuan. Sebagai kesenian tradisi yang bernilai magis, sesaji atau sesajen menjadi unsur yang wajib dalam setiap pertunjukan wayang. Sesajian berupa ayam kampung, kopi, nasi tumpeng, dan hasil bumi lainnya, serta tak lupa asap dari pembakaran dupa selalu ada di setiap pementasan wayang. Tapi, karena banyak yang menganggap sesajian tersebut merupakan suatu hal yang mubazir, belakangan ini sesajian dalam pementasan wayang juga diperuntukkan bagi penonton dalam bentuk makan bersama. Wayang kulit merupakan kekayaan nusantara yang lahir dari budaya asli masyarakat Indonesia yang mencintai kesenian. Setiap bagian dalam pementasan wayang mempunyai simbol dan makna filosofis yang kuat. Apalagi dari segi isi, cerita pewayangan selalu mengajarkan budi pekerti yang luhur, saling mencintai dan menghormati, sambil terkadang diselipkan kritik sosial dan peran lucu lewat adegan goro-goro. Tidak salah jika UNESCO mengakuinya sebagai warisan kekayaan budaya Indonesia yang bernilai adiluhung.
9.     Batik
Untuk pengertian batik Menurut bahasa sendiri berasal dari bahasa Jawa “amba” yang berarti menulis dan “titik”. Kata batik merujuk pada kain dengan corak yang dihasilkan oleh bahan “malam” (wax) yang diaplikasikan ke atas kain, sehingga menahan masuknya bahan pewarna (dye), atau dalam Bahasa Inggris disebut "wax-resist dyeing".
 Menurut Sejarah batik secara turun temurun dari nenek moyang kita zaman dahulu mengatakan bahwa membatik (membuat batik) adalah keterampilan yang kemudian menjadi mata pencaharian bagi kaum perempuan remaja dan dewasa waktu itu. Pada masa ini kondisi pembuatan batik masih masuk dalam taraf manual (menggunakan tangan) atau disebut dengan istilah Canthing. Sebelum akhirnya masuk zaman lebih modern yaitu ditemukannya pembuatan batik dengan media cap atau mesin. Untuk pembuatan batik menggunakan media cap inilah memungkinkan 
peranan laki-laki untuk turut terjun didalamnya.
Untuk batik dengan media kain pada proses pembuatannya terdapat beberapa langkah yang harus dikerjakan dalam pembuatan batik, diantaranya :
1. Pemotongan bahan baku (mori) sesuai dengan kebutuhan.
2. Mengetel : menghilangkan kanji dari mori dengan cara membasahi mori tersebut dengan larutan : minyak kacang, soda abu, tipol dan air secukupnya. Lalu mori diuleni setelah rata dijemur sampai kering lalu diuleni lagi dan dijemur kembali. Proses ini diulang-ulang sampai tiga minggu lamanya lalu di cuci sampai bersih. Proses ini agar zat warna bisa meresap ke dalam serat kain dengan sempurna.
3. Nglengreng : Menggambar langsung pada kain.
4. Isen-isen : memberi variasi pada ornamen (motif) yang telah di lengreng.
5. Nembok : menutup (ngeblok) bagian dasar kain yang tidak perlu diwarnai.
6. Ngobat : Mewarnai batik yang sudah ditembok dengan cara dicelupkan pada larutan zat warna
7. Nglorod : Menghilangkan lilin dengan cara direbus dalam air mendidih (finishing).
8. Pencucian : setelah lilin lepas dari kain, lalu dicuci sampai bersih dan kemudian dijemur.

Menurut para sejarah seni budaya Indonesia khususnya di bidang batik mengatakan bahwa terdapat beberapa pendapat yang berkembang mengenai asal muasal batik Indonesia
Ditinjau dari Sejarah Kebudayaan
Prof. Dr. R.M. Sutjipto Wirjosuparta menyatakan bahwa sebelum masuknya kebudayaan India bangsa Indonesia telah mengenal teknik membuat kain batik.
Dari Segi Design Batik Dan Proses “Loax-resist tehnique”
Prof. Dr. Alfred Steinmann mengemukakan bahwa :
1. Telah ada semacam batik di Jepang pada zaman dinasti Narayang disebut “Ro-Kechr”, di China pada zaman dinasti T’ang, di Bangkok dan Turkestan Timur.Design batik dari daerah-daerah tersebut pada umumnya bermotif geometris, sedang batik Indonesia lebih banyak variasinya. Batik dari India Selatan (baru mulai dibuat tahun 1516 di Palekat dan Gujarat) Adalah sejenis kain batik lukisan lilin yang terkenal dengan nama batik Palekat. Perkembangan batik India mencapai puncaknya pada abad 17-19.
2. Daerah-daerah di Indonesia yang tidak terpengaruh kebudayaan India, ada produksi batik pula, misalnya di Toraja, daerah Sulawesi, Irian dan Sumatera.
3. Tidak terdapat persamaan ornamen batik Indonesia dengan ornamen batik India. Misal : di India tidak terdapat tumpal, pohon hayat, caruda, dan isen-isen cece serta sawut. Ditinjau dari sejarah Baik Prof. M. Yamin maupun Prof. Dr. R.M. Sutjipto Wirjosuparta, mengemukakan bahwa batik di Indonesia telah ada sejak zaman Sriwijaya, Tiongkok pada zaman dinasti Sung atau T’ang (abad 7-9). Kota-kota penghasil batik, antara lain : Pekalongan, Solo, Yogyakarta, Lasem, Banyumas, Purbalingga, Surakarta, Cirebon, Tasikmalaya, Tulunggagung, Ponorogo, Jakarta, Tegal, Indramayu, Ciamis, Garut, Kebumen, Purworejo, Klaten, Boyolali, Sidoarjo, Mojokerto, Gresik, Kudus, dan Wonogiri.
Sejarah batik diperkirakan dimulai pada zaman prasejarah dalam bentuk prabatik dan mencapai hasil proses perkembangannya pada zaman Hindu. Sesuai dengan lingkungan seni budaya zaman Hindu seni batik merupakan karya seni Istana. Dengan bakuan tradisi yang diteruskan pada zaman Islam. Hasil yang telah dicapai pada zaman Hindu, baik teknis maupun estetis, pada zaman Islam dikembangkan dan diperbaharui
');
// $url2 = 'http://localhost/goleki/brain/artikel.php/all';
// $response = HTTPRequester::HTTPOpen($url2);
// $array = (array) json_decode(json_decode(json_encode($response)),true);
// echo '<pre>';
// // print_r($array['feature']);
// print_r($response).'<br>';
// print_r($array);
// foreach ($array['feature'] as $data) {
// 	# code...
// 	echo $data['word'].' : '.$data['count'].'<br>';
// }
function strip_tags_content($text, $tags = '', $invert = FALSE) {

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
  $tags = array_unique($tags[1]);
   
  if(is_array($tags) AND count($tags) > 0) {
    if($invert == FALSE) {
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
    }
    else {
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
    }
  }
  elseif($invert == FALSE) {
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
  }
  return $text;
} 

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

$text = '<p><u>Macam-macam Kesenian Daerah dan Daerah Asalnya.</u> Negeri ini memiliki ragam budaya dan kesenian yang berbeda beda di setiap daerahnya. Setiap daerah memiliki kesenian dan hanya terdapat pada wilayah tersebut, keberagaman ini tentunya menjadi sumber kekayaan bangsa yang perlu dilestarikan. Mulai dari kesenian dibidang tarian daerah, lagu daerah, upacara adat, dan kegiatan lainnya yang berilai seni. Nah, lalu apa saja kah macam macam kesenian yang dimiliki oleh setiap daerah di Indonesia. Berikut informasinya.</p>
<p>&nbsp;</p>
<p>Macam-macam Tarian daerah dan daerah asalnya</p>
<p>&nbsp;</p>
<table>
<tbody>
<tr>
<td width="163">
<p>Nama Tarian</p>
</td>
<td width="192">
<p>Asal Daerah</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari seudati</strong></p>
</td>
<td width="192">
<p>Nanggroe Aceh Darussalam</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari tor-tor</strong></p>
</td>
<td width="192">
<p>Sumatera Utara</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari piring</strong></p>
</td>
<td width="192">
<p>Sumatra Barat</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari zapin</strong></p>
</td>
<td width="192">
<p>Riau</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari Gending sriwijaya</strong></p>
</td>
<td width="192">
<p>Sumatera Selatan</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari topeng</strong></p>
</td>
<td width="192">
<p>Jakarta</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari serimpi</strong></p>
</td>
<td width="192">
<p>Jawa Tengah</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari Jaran kepang</strong></p>
</td>
<td width="192">
<p>Jawa Timur</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari Gambir anom</strong></p>
</td>
<td width="192">
<p>Yogyakarta</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari Kecak</strong></p>
</td>
<td width="192">
<p>Bali</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tari Batunganga</strong></p>
</td>
<td width="192">
<p>NTB</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>Selain tarian daerah, Negara kita juga memiliki ragam lagu daerah yang mana hampir disetiap provinsi memiliki lagu daerahnya masing masing. Berikut beberapa diantaranya.</p>
<p>&nbsp;</p>
<table>
<tbody>
<tr>
<td width="163">
<p>Lagu Daerah</p>
</td>
<td width="192">
<p>Daerah Asal</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Ampar-ampar pisang</strong></p>
</td>
<td width="192">
<p>Kalimantan selatan</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Angin mamiri</strong></p>
</td>
<td width="192">
<p>Sulawesi Selatan</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Apuse dan yamko rambe yamko</strong></p>
</td>
<td width="192">
<p>Papua</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Kupendi jangi</strong></p>
</td>
<td width="192">
<p>NTB</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Bubuy bulan dan tokecang</strong></p>
</td>
<td width="192">
<p>Jawa Barat</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Bungong jeumpa</strong></p>
</td>
<td width="192">
<p>Naggroe aceh</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Burung tentiana dan O ulate</strong></p>
</td>
<td width="192">
<p>Maluku</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Bolelebo</strong></p>
</td>
<td width="192">
<p>NTT</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Gambang suling dan ilir-ilir</strong></p>
</td>
<td width="192">
<p>Jawa Tengah</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Injit-injit semut</strong></p>
</td>
<td width="192">
<p>Jambi</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Kabile-bile</strong></p>
</td>
<td width="192">
<p>Sumatera Selatan</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="163">
<p>Lagu Daerah</p>
</td>
<td width="192">
<p><strong>Daerah Asal</strong></p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Kabanglah bungo</strong></p>
</td>
<td width="192">
<p>Sumatera Barat</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tanduk majeng</strong></p>
</td>
<td width="192">
<p>Jawa Timur</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Kicir-kicir dan keroncong kemayoran</strong></p>
</td>
<td width="192">
<p>DKI Jakarta</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Sinaggar tulo</strong></p>
</td>
<td width="192">
<p>Sumatera Utara</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Sipatokahan</strong></p>
</td>
<td width="192">
<p>Sulawesi Utara</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Soleram</strong></p>
</td>
<td width="192">
<p>Riau</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Janger</strong></p>
</td>
<td width="192">
<p>Bali</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Tumpe wayu</strong></p>
</td>
<td width="192">
<p>Kalimantan Tengah</p>
</td>
</tr>
<tr>
<td width="163">
<p><strong>Suwe Ora Jamu dan pitik tukung</strong></p>
</td>
<td width="192">
<p>D.I Yogyakarta</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>Itulah macam macam ragam kesenian daerah Indonesia, tari daerah dan lagu daerahnya</p>';


var_dump(better_strip_tags($text));
?>