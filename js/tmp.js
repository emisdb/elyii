     // �?�?�����?���� �����?�?�?
    //ymaps.ready(function(){
    $(window).load(function(){
    	
    	$.fancybox.showActivity();
    	
    	// ���?�������?���� �����? �?�������?�?�?���������������?���������� �������?����
    	$.extend($.expr[":"], { 
    		"containsIgnoreCase": function(elem, i, match, array) { 
    		return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0; 
    	}}); 
    	
    	var idOpen1 = "";
    	
    	// �?�?�?������������ �?���?���?�� - �����?���?���?��
    	function setColor(){
    		$("div.element:visible:even").css("background-color", "#ffffff");
    		$("div.element:visible:odd").css("background-color", "#e9e9e9");
    	}
    	
    	// ���?���?�?�?���� ���?�����������?�?������ ��������
    	$("a#pointFancy").fancybox({
			'hideOnContentClick': false, 
			'zoomSpeedIn': 300, 
			'zoomSpeedOut': 300, 
			'overlayShow': true,
			'margin'			: 0,
			'padding'			: 0,   				
			'autoScale'			: false,
			'autoDimensions'	: true,
			'scrolling'			: 'no',
			'opacity'			: true,
			'showCloseButton'	: false,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic', 				
			'overlayOpacity'	: '0.7',
			'overlayColor'		: '#000',
			'centerOnScroll'	: false,
			'enableEscapeButton': true
		});
    	
    	$("a#picFancy").fancybox({
			'hideOnContentClick': false, 
			'zoomSpeedIn': 300, 
			'zoomSpeedOut': 300, 
			'overlayShow': true,
			'margin'			: 0,
			'padding'			: 0,   				
			'autoScale'			: false,
			'autoDimensions'	: true,
			'scrolling'			: 'no',
			'opacity'			: true,
			'showCloseButton'	: true,
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic', 				
			'overlayOpacity'	: '0.7',
			'overlayColor'		: '#000',
			'centerOnScroll'	: false,
			'enableEscapeButton': true
		});
    	
    	$("a.fbImage").live("click", function(){
    		$.fancybox.showActivity();
    		var imgHref = $(this).attr("href");
    		
    		$.ajax({
    			url: "/catalog/pic.php?p=" + imgHref,
    			type: "GET",
    			cache	: false,
    			success: function(data){
    				$("#ModalAjax").html(data);
    			}
    		});
    		$.fancybox.hideActivity();
    		return false;
    	});
    	
    	
    	// ������������ �������?�?�?���? �?�����?���������?��
    	$("a#fn-close").live('click',function(){
    		$.fancybox.close();
    		return false;
    	});
    	
    	$("a#fn-close-1").live('click',function(){
    		$.fancybox.showActivity();
    		var imgHref = $("#pointFancy").attr("rel");
    		var checkedBox = "/catalog/dialog.php?POINT=" + imgHref;
    		$.each( $("#" + imgHref + " input[type=checkbox]") , function() {
    			if ( $(this).is(":checked") ){
    				var idCheck = $(this).attr("name");
    				checkedBox = checkedBox + "&p[" + idCheck + "]=1";
    			}
    		});
    		
    		$.ajax({
    			url: checkedBox,
    			type: "GET",
    			cache	: false,
    			success: function(data){
    				$("#ModalAjax").html(data);
    			}
    		});
    		$.fancybox.hideActivity();
    		return false;
    	});
    	
    	function OpenDialog( id ){
    		var checkedBox = "/catalog/dialog.php?POINT=" + id;
    		$.each( $("#" + id + " input[type=checkbox]") , function() {
    			if ( $(this).is(":checked") ){
    				var idCheck = $(this).attr("name");
    				checkedBox = checkedBox + "&p[" + idCheck + "]=1";
    			}
    		});
    		$("a#pointFancy").attr("href", checkedBox);
    		$("a#pointFancy").attr("rel", id);
    		$("a#pointFancy").click();
    		return false;
    	}
    	
    	setColor();
    	
    	// ���?���������������� �� �?���?�?�?������ �����?�?�?
		var position = $('#top_panel').offset();
		var wHeight = 	$(window).height();
		var Htop = 343;
		//var Htop = 309;

		if( wHeight < 1000 ){
			var newHeight = wHeight - 210;
			$("#BannerMap").height(newHeight);
			$(".catalog").css("min-height", wHeight);
		}else{
			$("#BannerMap").height("1000");
			$(".catalog").css("min-height", "1200");
		}
	
		var scroller = new StickyScroller("#top_panel",
        {
            start: Htop,
            end: 30000,
            interval: 0,
            range: 0,
            margin: 0
        });
		
		var scroller1 = new StickyScroller(".city-map",
        {
            start: Htop,
            end: 30000,
            interval: 0,
            range: 0,
            margin: 0
        });
		
		// �������?�?�?���� ��������
		$('.ui-widget-overlay').live('click',
    		function() {
      		  $("#dialog").dialog("close");
   		});
		
		// ���������� ���?���?�������?�? �?���?����
		$('#showSelected').click(function(){
			scrollToTop();
			$.fancybox.showActivity();
			$.each( $(".element") , function() { 
				$(this).show();
				if( $(this).find("input:checked").length < 1){
					$(this).hide();
				}
			});
			$(this).css("text-decoration", "none");
			$(this).css("font-weight", "bold");
			$('#showAll').css("text-decoration", "underline");
			$('#showAll').css("font-weight", "normal");
			
			$("#selectArea").val(0);
			newPoints(1);
			MapSetCenter();
			$.fancybox.hideActivity();
			return false;
		});
		
		// ���������� ���?���? �?���?����
		$('#showAll').click(function(){
			scrollToTop();
			$.fancybox.showActivity();
			$.each( $(".element") , function() { 
				$(this).show();
			});
			$('#showSelected').css("text-decoration", "underline");
			$('#showSelected').css("font-weight", "normal");
			$(this).css("text-decoration", "none");
			$(this).css("font-weight", "bold");
			
			$("#selectArea").val(0);
			newPoints(0);
			MapSetCenter();
			$("#searchPoint").val("�?�����?�� ���� �����?���?�?");
			$.fancybox.hideActivity();
			return false;
		});

		// ���?���?�?�?���� ��������
		$('div [class=adress_element]').click(function(){
			var id = $(this).parent().attr("id");
			OpenDialog(id);
			return false;
		});
				
		$('div [class=id_element]').click(function(){
			var id = $(this).parent().attr("id");
			OpenDialog(id);
			return false;
		});
		
		// ������������������ �?�����?�� ���?�� ���?�����?�� �?�����������?��
		$(".rowtable input[type=checkbox]").change(function(){
			idOpen = $(this).parent().parent().parent().parent().parent().attr("id");
			
			if ( $(this).is(":checked") ){
				countCheck++;
				$("#countCheck").html(countCheck);
				$(this).parent().parent().parent().parent().parent().addClass("greenFontStyle");
				imgArray[idOpen] = "/images/map/point1.png";
				eval("myPlacemark" + idOpen + ".options.set('iconImageHref', '/images/map/point1.png')");
			}
			else{
				countCheck--;
				$("#countCheck").html(countCheck);
				if( $(this).parent().parent().parent().find("input:checked").length < 1){
					$(this).parent().parent().parent().parent().parent().removeClass("greenFontStyle");
					imgArray[idOpen] = "/images/map/point2.png";
				}
			}
			
		});
		
		$("#addToProgramm input[type=checkbox]").live("change", function(){
			var Construction = $(this).parent().attr("rel");
			var Point = $(this).attr("NAME");
			if ( $(this).is(":checked") ){
				$(".element INPUT[NAME=" + Point + "]").attr("checked","checked");
				countCheck++;
				$("#countCheck").html(countCheck);
				$("#" + Construction).addClass("greenFontStyle");
				imgArray[Construction] = "/images/map/point1.png";
				eval("myPlacemark" + Construction + ".options.set('iconImageHref', '/images/map/point1.png')");
			} else {
				$(".element INPUT[NAME=" + Point + "]").removeAttr("checked");
				countCheck--;
				$("#countCheck").html(countCheck);
				if( $("#" + Construction).find("input:checked").length < 1 ){
					$("#" + Construction).removeClass("greenFontStyle");
					imgArray[Construction] = "/images/map/point2.png";
				}
			}
		});
		
		// �?�?���?�?������ ���������?���?�?���� �?���?����
		var countCheck =$("input:checked").length;
		$("#countCheck").html(countCheck);
		
		var countCheckAll =$("input[type=checkbox]").length;
		$("#countCheckAll").html(countCheckAll);

    	
    	// �������?�������������?���? �����?�?�?
		var myMap = new ymaps.Map('BannerMap', {
            center: [59.94207,30.282711],
            zoom: 10,
            behaviors: ["default", "scrollZoom"]
        }),myCollection = new ymaps.GeoObjectCollection({}, {});
		
    	// ���?�����?������������ ���?���? �?���?����
		newPoints(0);
    	
		// �������������������� �������?�?��������
        myMap.controls
        .add('zoomControl')
        .add('typeSelector')
        .add('mapTools');
		
        // �?�?�?������������ �?�����?�?��
        function MapSetCenter(){
        	myMap.setCenter([59.94207,30.282711], "10");
        }
        
        // �?�?�����?���? ������������ �?���?���� ���� �����?�?��
		function newPoints(select){
			myCollection.removeAll();
			myMap.geoObjects.remove(myCollection);
			
			for ( i= 0; i < pointsArray.length; i++){
				
    			var testValue = pointsArray[i];
    			
    			var pName = testValue[1];
    			var pMap1 = testValue[3];
    			var pMap2 = testValue[2];
    			var pAdr = testValue[4];
    			var pArea = testValue[5];
    			var imgP = imgArray[pName];
    			
    			if(select == "2"){
    				var visibleVar = $("#" + pName).css("display");
    				if(visibleVar != "none"){
    					eval("myPlacemark" + pName + " = new ymaps.Placemark([ " + pMap1 + "," + pMap2 + "], {hintContent: '" + pAdr + "'}, {iconImageHref: '" + imgP  + "',iconImageSize: [18, 19],iconImageOffset: [-9, -9]})");
	            		eval("myPlacemark" + pName + ".events.add('click', function () {OpenDialog('" + pName + "');})");
	            		eval("myCollection.add(myPlacemark" + pName + ")");
    				}
    			}if(select == "1"){
    				if(imgP == "/images/map/point1.png"){
    					eval("myPlacemark" + pName + " = new ymaps.Placemark([ " + pMap1 + "," + pMap2 + "], {hintContent: '" + pAdr + "'}, {iconImageHref: '" + imgP  + "',iconImageSize: [18, 19],iconImageOffset: [-9, -9]})");
	            		eval("myPlacemark" + pName + ".events.add('click', function () {OpenDialog('" + pName + "');})");
	            		eval("myCollection.add(myPlacemark" + pName + ")");
    				}
    			}else if(select != "0"){
    				if(pArea == select){
    					eval("myPlacemark" + pName + " = new ymaps.Placemark([ " + pMap1 + "," + pMap2 + "], {hintContent: '" + pAdr + "'}, {iconImageHref: '" + imgP  + "',iconImageSize: [18, 19],iconImageOffset: [-9, -9]})");
	            		eval("myPlacemark" + pName + ".events.add('click', function () {OpenDialog('" + pName + "');})");
	            		eval("myCollection.add(myPlacemark" + pName + ")");
    				}
    			}else{
            		eval("myPlacemark" + pName + " = new ymaps.Placemark([ " + pMap1 + "," + pMap2 + "], {hintContent: '" + pAdr + "'}, {iconImageHref: '" + imgP  + "',iconImageSize: [18, 19],iconImageOffset: [-9, -9]})");
            		eval("myPlacemark" + pName + ".events.add('click', function () {OpenDialog('" + pName + "');})");            		
            		eval("myCollection.add(myPlacemark" + pName + ")");
    			}
            }
			myMap.geoObjects.add(myCollection);
		}
		
		// �?�������� ���?�� ���?�����?�� �?����������
		$("#selectArea").change(function(){
			scrollToTop();
			$.fancybox.showActivity();
			var select = $("#selectArea").val();
			$("#searchPoint").val("�?�����?�� ���� �����?���?�?");
			
			if(select == "0"){
				$(".element").show();
				setColor();
				newPoints(0);
				MapSetCenter();
			} else {
				var testValue1 = areaArray[select];
				$(".element").hide();
				$(".element[data-area=" + select + "]").show();
				setColor();
				newPoints(select);
				eval("myMap.setZoom('" + testValue1[3] + "')");
				eval("myMap.panTo([" + testValue1[1] + "," + testValue1[2] + "])");
			}
			
			$('#showSelected').css("text-decoration", "underline");
			$('#showSelected').css("font-weight", "normal");
			$('#showAll').css("text-decoration", "underline");
			$('#showAll').css("font-weight", "normal");
			$.fancybox.hideActivity();
		})
		
		// �?�?�����?���? �?�������? �����?�?�������� ���?�� ������������������
		$("DIV.element").live({
			mouseover: function() {
				eval("myPlacemark" + $(this).attr('id') + ".options.set('iconImageHref', '/images/map/point1_.png')");
			},
			mouseout: function() {
				var Obj = $(this).attr('id');
				setIcoBack( Obj );
			}
		});
		
		function setIcoBack(idImg){
			var imgP2 = imgArray[idImg];
			eval("myPlacemark" + idImg + ".options.set('iconImageHref', '" + imgP2 + "')");
		}
		
		// �?�?�����?���? �?�������? �����?�?�������� ���?�� ������������������
		$("ymaps.ymaps-image-with-content").live({
			mouseover: function() {
				ImgOpen = $(this).css("background-image");
				$(this).css("background-image", "url(/images/map/point1_.png)");
			},
			mouseout: function() {
				$(this).css("background-image", "" + ImgOpen + "");
			}
		});
		
		// ���?���?�?���� ���?���?������������
		$("#clearSelected").click(function(){
			scrollToTop();
			$.fancybox.showActivity();
			//$("#selectArea").val(0);
			var select = $("#selectArea").val();
			countCheck = 0;
			$("#countCheck").html(countCheck);
			//$("#searchPoint").val("�?�����?�� ���� �����?���?�?");
			$.each( $(".element") , function() { 
				//$(this).show();
				$(this).removeClass("greenFontStyle");
				idOpen = $(this).attr("id");
				imgArray[idOpen] = "/images/map/point2.png";
				$(this).find("input:checked").attr('checked', false);
			});
			newPoints(select);
			MapSetCenter();
			$.fancybox.hideActivity();
			return false;
		});
		
		// ���?���?�?���� ���?������
		$("#clearAll").click(function(){
			scrollToTop();
			$.fancybox.showActivity();
			$("#selectArea").val(0);
			$("#searchPoint").val("�?�����?�� ���� �����?���?�?");
			countCheck = 0;
			$("#countCheck").html(countCheck);
			MapSetCenter();
			$.each( $(".element") , function() { 
				$(this).show();
				$(this).removeClass("greenFontStyle");
				idOpen = $(this).attr("id");
				imgArray[idOpen] = "/images/map/point2.png";
				$(this).find("input:checked").attr('checked', false);
			});
			newPoints(0);
			$.fancybox.hideActivity();
			return false;
		});

		// ���?�����?�?�?���� �� �?���?����
		function scrollToTop(){
			destination = $("#topLink").offset().top;
			if($.browser.safari){
				$('body').animate( { scrollTop: destination }, 1100 );
			}else{
				$('html').animate( { scrollTop: destination }, 1100 );
			}
		}
		
		scrollToTop();
		
		// �������?��
		$("#searchForm").submit(function() {
			scrollToTop();
			$.fancybox.showActivity();
			myCollection.removeAll();
			myMap.geoObjects.remove(myCollection);
			$("#selectArea").val(0);
			var sString = $("#searchPoint").val();
			$.each( $(".element") , function() { 
				$(this).hide();
				$(this).find(".adress_element").find(":containsIgnoreCase('" + sString + "')").parent().parent().show();
			});
			newPoints(2);
			MapSetCenter();
			$.fancybox.hideActivity();
			return false;
		});

		
		$.fancybox.hideActivity();
		
		$("#sendPointsForm").click(function(){
			$("#PointsForm").submit();
			return false;
		});
		
    });

	function init () {
            // �������� ���������� ����� � ��� �������� � ���������� �
            // �������� id ("map")
            var myMap1 = new ymaps.Map('map_1', {
                    // ��� ������������� �����, ����������� ����� �������
                    // �� ����� � ����������� ���������������
                    center: [59.9857, 30.35705], // 30.357721,59.985678
                    zoom: 15
                },{
				    geoObjectDraggable: false,
                    geoObjectFillColor: '#ff0000'
				});
				               // ������ ������ ������� �����
             myPlacemark = new ymaps.Placemark([59.9861, 30.3577], {
                iconContent: '������� ������������',
                balloonContent: '���� ��������� �����, 3277679'},
				{
				preset:'twirl#yellowStretchyIcon'
			});
             var myPla = new ymaps.Placemark([59.9861, 30.3577],{},{draggable:true});
                // ������ ������
             myGeoObject = new ymaps.GeoObject({
                     geometry: {
						type: "Point",// ��� ��������� - �����
						coordinates: [59.9847, 30.3444]// ���������� �����.
                    },
					properties:{
					iconContent:'��������',
                }},{ 
					preset:'twirl#metroStPetersburgIcon'});
			var myPolyline = new ymaps.GeoObject({
					geometry: {
				type: "LineString",
				strokeColor: '#ff0000',
				coordinates: [[59.9847, 30.3444],[59.9861, 30.3577]]
				} });
            // ��������� ����� �� �����
            myMap1.geoObjects
                .add(myPlacemark)
                .add(myPolyline)
                .add(myGeoObject);
       
	   var myMap2 = new ymaps.Map('map_2', {
                    // ��� ������������� �����, ����������� ����� �������
                    // �� ����� � ����������� ���������������
                    center: [59.9857, 30.35705], // 30.357721,59.985678
                    zoom: 15,
                    type: 'yandex#satellite'
					});
            myMap2.geoObjects
                .add(myPla);
     }
