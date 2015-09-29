  function onmover (id) { 
                doc=document.getElementById("svg_map");
                elem=doc.getElementById("cityroad"+id);
                if(elem.getAttribute("set")=='0')
                {
                    if(elem.tagName=='circle')
                    {
                        elem.setAttribute("stroke","#f72579");
                        elem.setAttribute("fill","#f72579");
                        elem.setAttribute("stroke-width",3);
                        elemtxt=doc.getElementById("textcityroad"+id);
                        elemtxt.setAttribute("fill","#f72579");
                    }
                    else
                    {
                        elem.setAttribute("stroke","#f72579");
                        elem.v("stroke-width",5);
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
                        elem.setAttribute("stroke","#336666");
                        elem.setAttribute("fill","#dededd");
                        elem.setAttribute("stroke-width",1);
                        elemtxt=doc.getElementById("textcityroad"+id);
                        elemtxt.setAttribute("fill","#000");
                    }
                    else
                    {
                        elem.setAttribute("stroke","#336666");
                        elem.setAttribute("stroke-width",4);
                        elemtxt=doc.getElementById("textcityroad"+id);
                        elemtxt.setAttribute("fill-opacity",0);
                     
                    }
            }
        }
    function checkiti(id) {
	var i,ii;
	var txt,txti;
        doc=document.getElementById("svg_map");
        elem=doc.getElementById("cityroad"+id);
	      if(elem.getAttribute("set")=='1')
	{
		onmover(id);
		elem.setAttribute("set")=='1';
		i=sel_arr.length;
		txt=$('#rg'+id).html();
		sel_arr[i]=new Array();
		sel_arr[i][0]=id;
		sel_arr[i][1]=txt;
		if(i==0)
		{
			chcol="#F72579";
			$("#pickbutton a").css('color','#F72579');
			$("#pickbutton div.left-circ").addClass('left-circ-p');
			$("#pickbutton div.left-circ-2").addClass('left-circ-2-p');
			$("#pickbutton div.left-circ").removeClass('left-circ');
			$("#pickbutton div.left-circ-2").removeClass('left-circ-2');
			$("#pickbutton_ a").css('color','#F72579');
			$("#pickbutton_ div.left-circ").addClass('left-circ-p');
			$("#pickbutton_ div.left-circ-2").addClass('left-circ-2-p');
			$("#pickbutton_ div.left-circ").removeClass('left-circ');
			$("#pickbutton_ div.left-circ-2").removeClass('left-circ-2');
		}
	}
	else
	{
		elem.setAttribute("set")=='0';
		ii=sel_arr.length;
		if(ii==1)
		{
			chcol="#EBEDEC";
			$("#pickbutton a").css('color','#EBEDEC');
			$("#pickbutton div.left-circ-p").addClass('left-circ');
			$("#pickbutton div.left-circ-2-p").addClass('left-circ-2');
			$("#pickbutton div.left-circ-p").removeClass('left-circ-p');
			$("#pickbutton div.left-circ-2-p").removeClass('left-circ-2-p');
			$("#pickbutton_ a").css('color','#EBEDEC');
			$("#pickbutton_ div.left-circ-p").addClass('left-circ');
			$("#pickbutton_ div.left-circ-2-p").addClass('left-circ-2');
			$("#pickbutton_ div.left-circ-p").removeClass('left-circ-p');
			$("#pickbutton_ div.left-circ-2-p").removeClass('left-circ-2-p');
		}
		for (i=0;i<ii;i++)
		{
			if(!(sel_arr[i]==undefined))
			if(sel_arr[i].length==2)
			{
				if(sel_arr[i][0]==id)
				{
						sel_arr.splice(i,1);
						break;					
				}
			}
		}
		onmout (id);	
	}
 
 }

