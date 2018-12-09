<html>
<head>
    <!framework taken from w3.css for front-end work>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container">
        <div class="w3-container w3-teal">
  <h1>RSS Reader</h1>
            <form action="" method="post">
            <input type="text" name="rss_url" placeholder="Enter RSS URL">
                <input type="submit" value="Enter" name="submit" >
            </form>
</div>
    
    
    <!php code to handle backend operations
        
        
    fetching data from rss url>  
    <?php
        
        $url="http://feeds.bbci.co.uk/news/rss.xml";
        if (isset($_POST['submit'])) {
    $url_fetched = $_POST['rss_url'];
    $url=$url_fetched;        
  }
       
        if ($url==null){
            echo "Please Enter RSS url to fetch news:";
        }
    $feeds = array(            
            "$url"
            );
        
$entries = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            $entries = array_merge($entries, $xml->xpath("//item"));
        }
        
            
        ?>
         <!displaying data in a fixed format>
        <ul class="w3-ul w3-card-4 w3-hoverable" ><?php
        //Print all the entries
        foreach($entries as $entry){
            ?>
            <li class="w3-hover-blue" ><a class="" href="<?= $entry->link ?>"><?= $entry->title ?></a> 
            <p class="" ><?= $entry->description ?></p> </li>
            <?php
        }
        ?>
        </ul>
        </div>
    <div class="w3-container w3-teal">
  <h5>Made By:</h5>
  <p>Param Agrawal</p>
</div>

</body>
</html>