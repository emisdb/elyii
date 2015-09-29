  function onmover (id) { 
                doc=document.getElementById("svg_map");
                elem=doc.getElementById("cityroad"+id);
 //               $(elem).addClass("cityroad-select");
                 $(elem).css("stroke","#f72579");
            } 
  function onmout (id) { 
                doc=document.getElementById("svg_map");
                elem=doc.getElementById("cityroad"+id);
                $(elem).addClass("cityroad");
            }
