

function populateTable3(data, table_name){
    console.log(data);
    var table = document.getElementById(table_name);
    var tbody = document.createElement("tbody");

    for (var i = 0; i < data.length; i++) {
        
        var tr = document.createElement("tr");
        var td= document.createElement("td");
        var ul = document.createElement('ul');
        
        
        authorsTxt = '';
        for (var j = 0; j < data[i]['authors'].length; j++ ){
            
            authorsTxt +=  data[i]['authors'][j] + ", ";
        }

        text = 
            '<p><strong>TITULO: </strong><a href="' + data[i]['scopus_link'] + '">' + data[i]['title'] + '</a></p>' +
            '<p><strong>AUTORES: </strong>'+ authorsTxt + '</p>' +
            '<p class="article_publisher"><strong>EDITOR: </strong>' + data[i]['publisher'] + '</p>' +
            '<p class="article_year"><strong>AÑO: </strong>' + data[i]['cover_date'] + '</p>';

        td.innerHTML = text;
        
        tr.appendChild(td);
        tbody.appendChild(tr);
        }
    
    table.appendChild(tbody)
}

$(document).ready(function() {
        
        // dii
        // $.ajax({url: 'scopus_request/dii_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     xhrFields: {
        //         withCredentials: true
        //     },
        //     crossDomain: true,
        //     success: function(result){
        //         populateTable2(result, "dii_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // // mec problem
        // $.ajax({url: 'scopus_request/mec_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(result){
        //         populateTable(result, "mec_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // // mat
        // $.ajax({url: 'scopus_request/mat_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(result){
        //         populateTable(result, "mat_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // // met
        // $.ajax({url: 'scopus_request/met_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(result){
        //         populateTable(result, "met_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // // qui
        // $.ajax({url: 'scopus_request/qui_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(result){
        //         populateTable(result, "qui_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // // inf
        // $.ajax({url: 'scopus_request/dic_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(result){
        //         populateTable(result, "dic_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // // die
        // $.ajax({url: 'scopus_request/die_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(result){
        //         populateTable(result, "die_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // // civ
        // $.ajax({url: 'scopus_request/civ_server.php',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(result){
        //         populateTable(result, "civ_table");
        //     },
        //     error: function() { alert('Hubo un problema cargando los articulos'); },
        //     beforeSend: setHeader
        // });

        // fi
        $.ajax({url: 'scopus_request/fi_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable3(result, "fi_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });
      });

      function setHeader(xhr) {
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
      }