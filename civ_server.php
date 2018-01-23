
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
   $url = 'http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+au-id(18633451400)+or+au-id(8636909600)+or+au-id(23134786100)+or+au-id(54961345300)+or+au-id(55622910300)+or+au-id(56909888800)+or+au-id(12445523200)+or+au-id(55622555200)+or+au-id(12242564800)+or+au-id(7202770598)+or+au-id(24080990600)+or+au-id(26538028400)+or+au-id(56343347700)+or+au-id(24774150400)+or+au-id(12446764200)+or+au-id(36142374800)+or+au-id(57193050559)&count=10&view=COMPLETE';

    $scraped_website = curl($url);
    
    $someArray = json_encode($scraped_website, true);
  	print_r($someArray);   
?>