
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
    $url = 'http://api.elsevier.com/content/search/scopus?query=TITLE-ABS-KEY(stem%20OR%20%22science%2C%20Technology%2C%20Engineering%20And%20Mathematics%22)%20AND%20SUBJTERMS%20(3304)%20or%20TITLE-ABS-KEY(innovation%20W%2F10%20%22engineering%20education%22)%20or%20(TITLE-ABS-KEY(engineering%20W%2F20%20education)%20AND%20%22soft%20skills%22)&view=COMPLETE';

    $scraped_website = curl($url);
    $someArray = json_decode($scraped_website, true);
    // print_r($someArray);
    $total_records = $someArray['search-results']['opensearch:totalResults'];
    echo $total_records . "</br>";
    $iter = ceil($total_records / 200);
    echo $iter;

    $acumulative_count = 0;
    $total_records = array();
    
    for ($i=0; $i < 2 ; $i++) { 
        $add_string = '';
        $add_string = "&count=200&start=$acumulative_count";

        $new_url = $url . $add_string;

        $scraped_website = curl($new_url);
        $someArray = json_decode($scraped_website, true);
        print_r($someArray);
        $requested_records = $someArray['search-results']['entry'];
        array_push($total_records,$requested_records);

        // echo $add_string. '</br>';
        // echo $acumulative_count . '</br>';
        $acumulative_count += 200;
    }

    echo sizeof($total_records);

?>

<?php

    function write_json($list){
        // $list = array
        // (
        // "Peter,Griffin,Oslo,Norway",
        // "Glenn,Quagmire,Oslo,Norway",
        // );

        $file = fopen("contacts.csv","w");

        foreach ($list as $line)
          {

            fputcsv($file,explode(',',$line));
          }

        fclose($file); 
    }
?>