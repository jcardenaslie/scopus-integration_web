
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
    
    $url = 'http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+au-id(7007006597)+or+au-id(6701314317)+or+au-id(7004451923)+or+au-id(56290567400)+or+au-id(40762104400)+or+au-id(41561627700)+or+au-id(36117056000)+or+au-id(6603461677)+or+au-id(23010060500)+or+au-id(36117091400)&count=10';
    
    $scraped_website = curl($url);
    echo $scraped_website
    
   //  $someArray = json_encode($scraped_website, true);
  	// print_r($someArray);   
?>