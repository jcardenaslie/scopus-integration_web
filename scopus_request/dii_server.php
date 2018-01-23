
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

    $scraped_website = curl($url);
    echo $scraped_website;

    // $someArray = json_encode($scraped_website, true);
  	// print_r($someArray);   
?>