<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" 
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
      <a href="#">home server</a>
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
  <div class="container">
    <div class="card">
      <h2 class="card-header">Featured</h2>
      <div class="card-body d-flex flex-row mt-2">
        <div class="p-4">
          <?php
          $user = '';
          $database = '';
          $dsn = "mysql:host=localhost;dbname=$database";
          $password = '';
          $table = 'tvrecs';
          $pkey = 'whenrec';
          $allmov = "SELECT * FROM $table;";
          $mcount = "SELECT COUNT(*) FROM $table;";

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
                              'target="_blank">supports', 'HTML5',
                                  'video</a>') );
          $failct = '</p>';
          $vidct = '</video>';

          try {
            $db = new PDO($dsn, $user, $password);
            $seldat = $db->query($allmov);
            $selnum = $db->query($mcount);
            $rows = $seldat->fetchAll();
            $count = $selnum->fetchColumn();
            $rowpick = $rows[rand(0, $count - 1)];

            echo implode( "", array($vidtgl, $rowpick[$pkey], $attribs,
                $rowpick[$pkey], $vidtgr, $srctgl, $rowpick[$pkey], $srctgr) );
            if ($rowpick[$col3]) {
              echo $trktgl . $rowpick[$pkey] . $trktgr;
            }
            echo $failtg . $failin . $failct . $vidct;
          } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
          }      
          ?>
        </div>
        <div class="p-4">
          Sample Bing landscape image
        </div>
      </div>
    </div>
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
</body>
</html>
