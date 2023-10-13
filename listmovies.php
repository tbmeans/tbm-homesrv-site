<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta
    name="viewport" 
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
  >
  <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
  <link 
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous">
  <style>
    .hero {
      background-color: #77F;
      color: white;
      padding: 2rem;
    }
    .nav-item {
      padding: 0.5rem;
    }
    a {
      color: white;
    }
  </style>
  <title>Home server</title>
</head>
<body>
  <div class="hero mb-4">
    <h2>
      <a href="index.php">home server</a>
    </h2>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="blog">WordPress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="movies.html">Movies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="walls.html">Bing wallpaper</a>
      </li>
    </ul>
  </div>

  <div class="container text-center">
    <?php
    if ( array_key_exists('keywords', $_GET) ) {
      $req = htmlspecialchars($_GET['keywords']);
    } else if ( array_key_exists('category', $_GET) ) {
      $req = htmlspecialchars($_GET['category']);
    }

    $user = '';
    $database = implode("_", array($user, ''));
    $dsn = "mysql:host=localhost;dbname=$database";
    $password = '';
    $table = 'tvrecs';
    $pkey = 'whenrec';
    $col1 = 'title';
    $col2 = 'cc';
    $meta = 'tags';

    if ($req == 'all' or $req == 'All') { /* mobile starts w/ capital letter */
      $crit = "SELECT * FROM $table";
    } else if ( array_key_exists('category', $_GET) ) {
      $req = "'%" . $req . "%'";
      $crit = "SELECT * FROM $table WHERE (
          $meta LIKE $req OR $col1 LIKE $req);";
    } else {
      $req = "'%" . $req . "%'";
      $crit = "SELECT * FROM $table WHERE (
          $meta LIKE $req OR $col1 LIKE $req OR $col2 LIKE $req);";
    }

    $restg = '<div class="row mt-4">';
    $medtg = '<div class="col">';

    $vidtgl = '<video id="';
    /* $row[$pkey] between */
    $attribs = implode( " ", array(
        '"', 'class="video-js"', 'controls', 'preload="auto"',
            'height="240"', 'poster="Videos/posters/') );
    /* $row[$pkey] between */
    $vidtgr = '.png" data-setup="{}">';

    $srctgl = '<source src="Videos/';
    /* $row[$pkey] between */
    $srctgr = '.mp4" type="video/mp4" />';

    /* CONDITIONAL: track tag printed if media has CCs */
    $trktgl = implode( " ", array(
        '<track', 'default', 'kind="captions"',
            'srclang="en"', 'src="Videos/') );
    /* $row[$pkey] between */
    $trktgr = '.vtt">';

    $failtg = '<p class="vjs-no-js">';
    $failin = implode( " ", array(
        'To', 'view', 'this', 'video', 'please', 'enable', 'JavaScript,',
            'and', 'consider', 'upgrading', 'to', 'a', 'web', 'browser',
                'that', '<a',
                    'href="https://videojs.com/html5-video-support/"',
                        'target="_blank">supports', 'HTML5', 'video</a>') );
    $failct = '</p>';
    $vidct = '</video>';
    $medct = '</div>';
    $mednametg = '<div class="col"><p>';
    /* $row[$col1] between */ 
    $mednamect = '</p></div>';
    $resct = $medct;

    try {
      $db = new PDO($dsn, $user, $password);
      foreach($db->query($crit) as $row) {
        echo implode( "", array($restg, $medtg, $vidtgl, $row[$pkey], $attribs,
            $row[$pkey], $vidtgr, $srctgl, $row[$pkey], $srctgr) );
        if ($row[$col2]) {
          echo $trktgl . $row[$pkey] . $trktgr;
        }
        echo implode( "", array($failtg, $failin, $failct, $vidct, $medct,
            $mednametg, $row[$col1], $mednamect, $resct) );
      }
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }      
    ?>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
  </script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous">
  </script>
  <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
  <!-- https://videojs.com/getting-started/#videojs-cdn -->
</body>
</html>
