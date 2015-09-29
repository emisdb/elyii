  function onmover (id) { 
                doc=document.getElementById("svg_map");
                var svgDoc = doc.contentDocument;
                elem=svgDoc.getElementById("cityroad"+id);
                $(elem).css("stroke","#f72579");
            } 
  function onmout (id) { 
                doc=document.getElementById("svg_map");
                elem=doc.getElementById("cityroad"+id);
                $(elem).css("stroke","#f72579");
            }
