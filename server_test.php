<?php 
	// include("simple_html_dom.php");
	// $html = file_get_html("https://www.scopus.com/results/results.uri?sort=plfo-f&src=s&imp=t&sid=589eb5909751b2edbc1f1cab0705db97&sot=mulcite&sdt=mulcite&sessionSearchId=589eb5909751b2edbc1f1cab0705db97&origin=resultslist&citeCnt=2000&mciteCt=2000&editSaveSearch=&txGid=ce25a4fe513b4619e78414f431bc9360");
	// echo $html;
	// $title = $html->find("table#srchResultsList",0)->innertext;
	// echo $title;
?>
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

    $scraped_website = curl("http://api.elsevier.com/content/search/scopus?query=af-id(60001282)+and+au-id(6603409991)+or+au-id(7005832799)+or+au-id(57191171418)+or+au-id(23477215300)+or+au-id(57002132600)+or+au-id(15834726300)+or+au-id(35118452400)+or+au-id(6504651863)+or+au-id(55961894100)+or+au-id(6602904332)+or+au-id(6506942113)+or+au-id(35732964200)+or+au-id(7004064531)+or+au-id(7006509502)+or+au-id(56609319700)+or+au-id(6602003201)+or+au-id(56353775400)");  // Executing our curl function to scrape the webpage http://www.example.com and return the results into the $scraped_website variable
    // echo $scraped_website;
    $someArray = json_encode($scraped_website, true);
  	print_r($someArray);   
?>