
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

    $url = 'http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+au-id(55911063200)+or+au-id(23466600500)+or+au-id(16318706200)+or+au-id(22634571800)+or+au-id(7003336314)+or+au-id(56343679600)+or+au-id(7402141385)+or+au-id(9743731700)+or+au-id(36166690800)+or+au-id(7006406404)+or+au-id(25521994200)+or+au-id(7005832568)+or+au-id(7003993398)+or+au-id(24279923300)+or+au-id(7005533422)+or+au-id(6603806362)+or+au-id(7003737536)+or+au-id(26222017000)+or+au-id(7004890330)+or+(au-id(7007175519)+and+(pubyear+aft+2016))&count=10&';


    $scraped_website = curl($url);
    echo $scraped_website;

   //  $someArray = json_encode($scraped_website, true);
  	// print_r($someArray);   
?>