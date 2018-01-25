
<?php
    // Defining the basic cURL function
    function curl($url) {

        $ch = curl_init();  // Initialising cURL
        curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    	'Accept: application/json',
	    	'X-ELS-APIKey: 82b47f24bf707a447d642d170ae6e318'
	    ));
        $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
        curl_close($ch);    // Closing cURL
        return $data;   // Returning the data from the function
    }
?>
<?php
	// $url = '';
	// $headers = array('Accept: application/json','X-ELS-APIKey: 82b47f24bf707a447d642d170ae6e318');
    $url = "http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+AU-ID(57194972261)+or+AU-ID(35329282500)+or+AU-ID(25027030100)+or+AU-ID(35329183500)+or+AU-ID(56188117500)+or+AU-ID(17343724100)+or+AU-ID(15822269000)+or+AU-ID(46460974700)+or+AU-ID(16231058000)+or+AU-ID(35078564500)+or+AU-ID(57041211300)+or+AU-ID(55915209500)&count=10";

    // get complete scopus query
    $scraped_website = curl($url);

    $responseQueryArray = json_decode($scraped_website, true);
    $articles = $responseQueryArray['search-results']['entry'];
    
    // print_r($articles);

    $returnArray = array();
    
    $resObj = new stdClass();

    $i = 0;
    foreach ($articles as $article) {
        $myObj = new stdClass();
        // print_r($article);
        
        $myObj->title = $article['dc:title'];
        $myObj->scopus_link = $article['link'][2]['@href'];
        $myObj->cover_date = $article['prism:coverDate'];
        $myObj->doc_api_link = $article['prism:url'];

        // get article info
        $scraped_website = curl($myObj->doc_api_link);

        $responseArticleArray = json_decode($scraped_website, true);

        $myObj->publisher = $responseArticleArray['abstracts-retrieval-response']['coredata']['dc:publisher'];
        
        $authors = $responseArticleArray['abstracts-retrieval-response']['authors']['author']; 
        $authors_array = array();
        foreach ($authors as $author) {
            array_push($authors_array,$author['ce:indexed-name']);    
        }

        
        $myObj->authors = $authors_array;
        // print_r($myObj);

        // $resObj->$i = $myObj;
        // $i += 1;
        array_push($returnArray,$myObj);
        // $myObj = NULL;  
    
    }
    // print_r($resObj);
    // print_r($resObj);
    $myJSON = json_encode($returnArray);
    echo $myJSON;  
?>