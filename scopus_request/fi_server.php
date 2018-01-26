
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
   $url = 'http://api.elsevier.com/content/search/scopus?query=((af-id(60001282)+and+au-id(6603409991)+or+au-id(7005832799)+or+au-id(57191171418)+or+au-id(23477215300)+or+au-id(57002132600)+or+au-id(15834726300)+or+au-id(35118452400)+or+au-id(6504651863)+or+au-id(55961894100)+or+au-id(6602904332)+or+au-id(6506942113)+or+au-id(35732964200)+or+au-id(7004064531)+or+au-id(7006509502)+or+au-id(56609319700)+or+au-id(6602003201)+or+au-id(56353775400))+or+(af-id(60001282)+and+au-id(7007006597)+or+au-id(6701314317)+or+au-id(7004451923)+or+au-id(56290567400)+or+au-id(40762104400)+or+au-id(41561627700)+or+au-id(36117056000)+or+au-id(6603461677)+or+au-id(23010060500)+or+au-id(36117091400))+or+(af-id(60001282)+and+au-id(55911063200)+or+au-id(23466600500)+or+au-id(16318706200)+or+au-id(22634571800)+or+au-id(7003336314)+or+au-id(56343679600)+or+au-id(7402141385)+or+au-id(9743731700)+or+au-id(36166690800)+or+au-id(7006406404)+or+au-id(25521994200)+or+au-id(7005832568)+or+au-id(7003993398)+or+au-id(24279923300)+or+au-id(7005533422)+or+au-id(6603806362)+or+au-id(7003737536)+or+au-id(26222017000)+or+au-id(7004890330)+or+(au-id(7007175519)+and+pubyear+bef+2016))+or+(af-id(60001282)+and+au-id(14036817700)+or+au-id(26022749400)+or+au-id(8559973100)+or+au-id(35599816000)+or+au-id(14631693800)+or+au-id(7102732243)+or+au-id(14631878200)+or+au-id(22950573600)+or+au-id(24766261300)+or+au-id(6507251146)+or+au-id(56033163300)+or+au-id(57189078954)+or+au-id(14830565600)+or+au-id(7102371917)+or+au-id(7801486317)+or+au-id(23028926500)+or+au-id(6602259239)+or+au-id(8700108300)+or+au-id(7102692198)+or+au-id(7401636823)+or+au-id(7003572137)+or+au-id(56251299300)+or+au-id(6504152555)+or+au-id(7005420101)+or+au-id(7101834722)+or+au-id(35563978200)+or+au-id(7003287200)))+or+((af-id(60001282)+and+au-id(18633451400)+or+au-id(8636909600)+or+au-id(23134786100)+or+au-id(54961345300)+or+au-id(55622910300)+or+au-id(56909888800)+or+au-id(12445523200)+or+au-id(55622555200)+or+au-id(12242564800)+or+au-id(7202770598)+or+au-id(24080990600)+or+au-id(26538028400)+or+au-id(56343347700)+or+au-id(24774150400)+or+au-id(12446764200)+or+au-id(36142374800)+or+au-id(57193050559))+or+(af-id(60001282)+and+au-id(57194972261)+or+au-id(35329282500)+or+au-id(25027030100)+or+au-id(35329183500)+or+au-id(56188117500)+or+au-id(17343724100)+or+au-id(15822269000)+or+au-id(46460974700)+or+au-id(16231058000)+or+au-id(35078564500)+or+au-id(57041211300)+or+au-id(55915209500))+or+(af-id(60001282)+and+au-id(7402573815)+or+au-id(8319474400)+or+au-id(16633863700)+or+au-id(7007115634)+or+au-id(36992075300)+or+au-id(7101787191)+or+au-id(35610940800)+or+au-id(57146229200)+or+au-id(9274740100)+or+au-id(55787704900)+or+au-id(7007075731)+or+au-id(14420446700)+or+au-id(7006485504)+or+au-id(7402668970)+or+au-id(7005875307)+or+au-id(6602488252)+or+((au-id(8895508100)+and+(pubyear+aft+2016))+or+au-id(57190962957))+or+(af-id(60001282)+and+(au-id(25928259300)+and+(pubyear+aft+2015))+or+au-id(36242902000)+or+au-id(8392203200)+or+au-id(56406220600)+or+au-id(36466122600)+or+au-id(52364075700)+or+au-id(14055701500)+or+au-id(7202905254)+or+au-id(52364476600)+or+au-id(55667120700)+or+au-id(23098326700)+or+au-id(12759587200)+or+au-id(7004503513)+or+au-id(23569711200)+or+au-id(23478508600)+or+au-id(54404241700)+or+au-id(16647820700)+or+(au-id(56925394200)+and+pubyear+aft+2016)+or+(au-id(55567072800)+and+pubyear+aft+2016))))';
    // get complete scopus query
    $scraped_website = curl($url);

    $responseQueryArray = json_decode($scraped_website, true);
    $articles = $responseQueryArray['search-results']['entry'];
    
    // print_r($articles);

    $returnArray = array();
    
    $resObj = new stdClass();
    for ($i = 0; $i< 10; $i++){
        $myObj = new stdClass();
        // print_r($article);
        
        $myObj->title = $articles[$i]['dc:title'];
        $myObj->scopus_link = $articles[$i]['link'][2]['@href'];
        $myObj->cover_date = $articles[$i]['prism:coverDate'];
        $myObj->doc_api_link = $articles[$i]['prism:url'];

        // get article info
        $scraped_website = curl($myObj->doc_api_link);

        $responseArticleArray = json_decode($scraped_website, true);

        $myObj->publisher = $responseArticleArray['abstracts-retrieval-response']['coredata']['dc:publisher'];
        
        $article_authors = $responseArticleArray['abstracts-retrieval-response']['authors']['author']; 
        $authors_array = array();

        for($j = 0; $j < sizeof($article_authors); $j++){
            array_push($authors_array,$article_authors[$j]['ce:indexed-name']);    
        }

        
        $myObj->authors = $authors_array;
        array_push($returnArray,$myObj);
    }

    $myJSON = json_encode($returnArray);
    echo $myJSON;     
?>