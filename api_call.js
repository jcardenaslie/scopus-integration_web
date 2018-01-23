
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
                // result = JSON.parse(result);
                var articles = result['search-results']['entry'];
                var table = document.getElementById("dii_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // mec problem
        $.ajax({url: 'scopus_request/mec_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("mec_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // mat
        $.ajax({url: 'scopus_request/mat_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("mat_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // // met
        $.ajax({url: 'scopus_request/met_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("met_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // // qui
        $.ajax({url: 'scopus_request/qui_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("qui_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // // inf
        $.ajax({url: 'scopus_request/dic_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("inf_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // die
        $.ajax({url: 'scopus_request/die_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("die_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // civ
        $.ajax({url: 'scopus_request/civ_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("civ_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });

        // // fi
        $.ajax({url: 'scopus_request/fi_server.php',
            type: 'GET',
            dataType: 'json',
            success: function(result){
                var articles = result['search-results']['entry'];
                var table = document.getElementById("fi_table");

                for (var i = 0, len = articles.length; i < 10; i++) {
                        title = articles[i]['dc:title'];
                        author = articles[i]['dc:creator'];
                        // console.log(title + ' ' + author);
                        new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
                        table.innerHTML += new_entry;
                }
            },
            error: function() { alert('Hubo un problema cargando los articulos'); },
            beforeSend: setHeader
        });
      });

      function setHeader(xhr) {
        // xhr.setRequestHeader('X-ELS-APIKey', '936675bebed0ab4c03bd107785703f5c');
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
      }


function gotAjaxResponse(result,table){
    
    var articles = result['search-results']['entry'];
    var dii_table = document.getElementById("dii_table");

    for (var i = 0, len = articles.length; i < 10; i++) {
            title = articles[i]['dc:title'];
            author = articles[i]['dc:creator'];
            // console.log(title + ' ' + author);
            new_entry = '<tr><td>' + title + '</td><td>' + author + '</td></tr>';
            table.innerHTML += new_entry;
    }
}