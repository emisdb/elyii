  function onmover (id) { 
                doc=document.getElementById("svg_map");
                elem=doc.getElementById("cityroad"+id);
                if(elem.getAttribute("set")=='0')
                {
                    if(elem.tagName=='circle')
                    {
                        $(elem).css("stroke","#f72579");
                        $(elem).setAttribute("fill","#f72579");
                        $(elem).setAttribute("stroke-width",3);
                        elemtxt=doc.getElementById("textcityroad"+id);
                        elemtxt.setAttribute("fill","#f72579");
                    }
                    else
                    {
                        $(elem).setAttribute("stroke","#f72579");
                        $(elem).setAttribute("stroke-width",5);
                        elemtxt=doc.getElementById("textcityroad"+id);
                        elemtxt.setAttribute("fill-opacity",.9);
                       
                    }
                }
            } 
  function onmout (id) { 
               doc=document.getElementById("svg_map");
               elem=doc.getElementById("cityroad"+id);
                if(elem.getAttribute("set")=='0')
                {
                    if(elem.tagName=='circle')
                    {
                        $(elem).setAttribute("stroke","#336666");
                        $(elem).setAttribute("fill","#dededd");
                        $(elem).setAttribute("stroke-width",1);
                        elemtxt=doc.getElementById("textcityroad"+id);
                        elemtxt.setAttribute("fill","#000");
                    }
                    else
                    {
                        $(elem).setAttribute("stroke","#336666");
                        $(elem).setAttribute("stroke-width",4);
                        elemtxt=doc.getElementById("textcityroad"+id);
                        elemtxt.setAttribute("fill-opacity",0);
                     
                    }
            }
        }
