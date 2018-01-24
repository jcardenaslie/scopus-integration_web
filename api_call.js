
function populateTable(data, table_name){
    var articles = data['search-results']['entry'];
    var table = document.getElementById(table_name);
    var tbody = document.createElement("tbody");
    
    for (var i = 0, len = articles.length; i < 10; i++) {
        title = articles[i]['dc:title'];
        author = articles[i]['dc:creator'];
        var tr = document.createElement("tr");
                        
        var tdTitle = document.createElement("td");
        var txt = document.createTextNode(title);
        tdTitle.appendChild(txt);

        var tdAuthor = document.createElement("td");
        var txt = document.createTextNode(author);
        tdAuthor.appendChild(txt);

        tr.appendChild(tdTitle);
        tr.appendChild(tdAuthor);
        tbody.appendChild(tr);
        }
     table.appendChild(tbody)
}

$(document).ready(function() {
        
        // // dii
        $.ajax({url: 'scopus_request/dii_server.php',
            type: 'GET',
            dataType: 'json',
            xhrFields: {
                withCredentials: true
            },
            crossDomain: true,
            success: function(result){
                populateTable(result, "dii_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // mec problem
        $.ajax({url: 'scopus_request/mec_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "mec_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // mat
        $.ajax({url: 'scopus_request/mat_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "mat_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // // met
        $.ajax({url: 'scopus_request/met_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "met_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // // qui
        $.ajax({url: 'scopus_request/qui_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "qui_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // // inf
        $.ajax({url: 'scopus_request/dic_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "dic_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // die
        $.ajax({url: 'scopus_request/die_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "die_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // civ
        $.ajax({url: 'scopus_request/civ_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "civ_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // fi
        $.ajax({url: 'scopus_request/fi_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                populateTable(result, "fi_table");
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });
      });

      function setHeader(xhr) {
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
      }