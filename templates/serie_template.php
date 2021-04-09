{ "collection" :
    {
        "title" : "Serie Database",
            "type" : "serie",
            "version" : "1.0",
            "href" : "{{ path_for('series')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/Serie","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('series') }}","prompt":"Series"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('series') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la serie"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción de la serie"},
                            {"name" : "director", "value" : "{{ item.director }}", "prompt" : "Director de la serie"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},
                            {"name" : "embedUrl", "value" : "{{ item.embedUrl }}", "prompt" : "Trailer en Youtube"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre de la serie"},
                {"name" : "description", "value" : "", "prompt" : "Descripción de la serie"},
                {"name" : "director", "value" : "", "prompt" : "Director de la serie"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"},
                {"name" : "embedUrl", "value" : "", "prompt" : "Trailer en Youtube"}        
            ]
                }
    } 
}




