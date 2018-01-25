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
    // $url = $_POST['link'];
    $url = "http://api.elsevier.com/content/abstract/scopus_id/85032993357";
    $scraped_website = curl($url);
    // echo $scraped_website;

    $someArray = json_decode($scraped_website, true);

    if (!isset($myObj)) $myObj = new stdClass();
    $myObj->publisher = $someArray['abstracts-retrieval-response']['coredata']['dc:publisher'];
    $authors = $someArray['abstracts-retrieval-response']['authors']['author'];
    
    $authors_array = array();
    foreach ($authors as $author) {
        array_push($authors_array,$author['ce:indexed-name']);    
    }

    $myObj->authors = $authors_array;

    $myJSON = json_encode($myObj);

    print_r($myJSON);

    // $someJson = json_encode($scraped_website, true);
  	// print_r($someArray);   
?>