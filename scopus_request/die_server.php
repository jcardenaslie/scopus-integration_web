
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
    $url = 'http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+au-id(14036817700)+or+au-id(26022749400)+or+au-id(8559973100)+or+au-id(35599816000)+or+au-id(14631693800)+or+au-id(7102732243)+or+au-id(14631878200)+or+au-id(22950573600)+or+au-id(24766261300)+or+au-id(6507251146)+or+au-id(56033163300)+or+au-id(57189078954)+or+au-id(14830565600)+or+au-id(7102371917)+or+au-id(7801486317)+or+au-id(23028926500)+or+au-id(6602259239)+or+au-id(8700108300)+or+au-id(7102692198)+or+au-id(7401636823)+or+au-id(7003572137)+or+au-id(56251299300)+or+au-id(6504152555)+or+au-id(7005420101)+or+au-id(7101834722)+or+au-id(35563978200)+or+au-id(7003287200)&count=10';


    $scraped_website = curl($url);
    echo $scraped_website;
    
   //  $someArray = json_encode($scraped_website, true);
  	// print_r($someArray);   
?>