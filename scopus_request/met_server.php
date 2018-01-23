
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
    
    $url = 'http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+au-id(7402573815)+or+au-id(8319474400)+or+au-id(16633863700)+or+au-id(7007115634)+or+au-id(36992075300)+or+au-id(7101787191)+or+au-id(35610940800)+or+au-id(57146229200)+or+au-id(9274740100)+or+au-id(55787704900)+or+au-id(7007075731)+or+au-id(14420446700)+or+au-id(7006485504)+or+au-id(7402668970)+or+au-id(7005875307)+or+au-id(6602488252)+or+(au-id(8895508100)+AND+(PUBYEAR+aft+2016))+or+au-id(57190962957)&count=10';

    $scraped_website = curl($url);
    echo $scraped_website;
   //  $someArray = json_encode($scraped_website, true);
  	// print_r($someArray);   
?>