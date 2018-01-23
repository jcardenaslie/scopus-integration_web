
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
    $url = 'http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+(au-id(25928259300)+and+(pubyear+aft+2015))+or+au-id(36242902000)+or+au-id(8392203200)+or+au-id(56406220600)+or+au-id(36466122600)+or+au-id(52364075700)+or+au-id(14055701500)+or+au-id(7202905254)+or+au-id(52364476600)+or+au-id(55667120700)+or+au-id(23098326700)+or+au-id(12759587200)+or+au-id(7004503513)+or+au-id(23569711200)+or+au-id(23478508600)+or+au-id(54404241700)+or+au-id(16647820700)+or+(au-id(56925394200)+and+(pubyear+aft+2016))+or+(au-id(55567072800)+and+(pubyear+aft+2016))&count=10';

    $scraped_website = curl($url);
    echo $scraped_website;

    // $someArray = json_encode($scraped_website, true);
  	// print_r($someArray);   
?>