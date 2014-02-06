jQuery(document).ready(function(){
                
        // Prettify
        prettyPrint();
                
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        // accordion widget
	jQuery('.accordion').accordion({heightStyle: "content"});
        
        // growl notification
	if(jQuery('#growl').length > 0) {
		jQuery('#growl').click(function(){
			jQuery.jGrowl("Hello world!");
		});
	}
	
	// another growl notification
	if(jQuery('#growl2').length > 0) {
		jQuery('#growl2').click(function(){
			var msg = "This notification will live a little longer.";
			jQuery.jGrowl(msg, { life: 5000});
		});
	}
        
        // basic alert box
	if(jQuery('.alertboxbutton').length > 0) {
		jQuery('.alertboxbutton').click(function(){
                        //jQuery.alerts.dialogClass = 'customStyle';
			jAlert('This is a custom alert box', 'Alert Dialog', function(){
                           //jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
	
	// confirm box
	if(jQuery('.confirmbutton').length > 0) {
		jQuery('.confirmbutton').click(function(){
			jConfirm('Apakah anda yakin?', 'Confirmation Dialog', function(r) {
				jAlert('Confirmed: ' + r, 'Confirmation Results');
			});
		});
	}
	
	// promptbox
	if(jQuery('.promptbutton').length > 0) {
		jQuery('.promptbutton').click
		(function(){
			jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
				if( r ) alert('You entered ' + r);
			});
		});
	}
	
	// alert with html
	if(jQuery('.alerthtmlbutton').length > 0) {
		jQuery('.alerthtmlbutton').click(function(){
			jAlert('You can use HTML, such as <strong>bold</strong>, <em>italics</em>, and <u>underline</u>!');
		});
	}
        
        // alert danger
        if(jQuery('.alertdanger').length > 0) {
		jQuery('.alertdanger').click(function(){
                        jQuery.alerts.dialogClass = 'alert-danger';
			jAlert('This is a custom alert box for danger', 'Alert Danger', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert warning
        if(jQuery('.alertwarning').length > 0) {
		jQuery('.alertwarning').click(function(){
                        jQuery.alerts.dialogClass = 'alert-warning';
			jAlert('This is a custom alert box for warning', 'Alert Warning', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert success
        if(jQuery('.alertsuccess').length > 0) {
		jQuery('.alertsuccess').click(function(){
                        jQuery.alerts.dialogClass = 'alert-success';
			jAlert('This is a custom alert box for success', 'Alert Success', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert info
        if(jQuery('.alertinfo').length > 0) {
		jQuery('.alertinfo').click(function(){
                        jQuery.alerts.dialogClass = 'alert-info';
			jAlert('This is a custom alert box for info', 'Alert Info', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        
        // alert inverse
        if(jQuery('.alertinverse').length > 0) {
		jQuery('.alertinverse').click(function(){
                        jQuery.alerts.dialogClass = 'alert-inverse';
			jAlert('This is a custom alert box for inverse', 'Alert Inverse', function(){
                           jQuery.alerts.dialogClass = null; // reset to default
                        });
		});
	}
        

	// normal slider
	jQuery("#slider").slider({value: 40});
	
	// slider snap to increments
	jQuery("#slider2").slider({
			value:100,
			min: 0,
			max: 500,
			step: 50,
			slide: function(event, ui) {
				jQuery("#amount").text("$"+ui.value);
			}
	});
	jQuery("#amount").text("$" + jQuery("#slider").slider("value"));

	
	// slider with range
	jQuery("#slider3").slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
			jQuery("#amount2").text("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
		}
	});
	jQuery("#amount2").text("$" + jQuery("#slider3").slider("values", 0) +
			" - $" + jQuery("#slider3").slider("values", 1));
	
	
	// slider with fixed minimum
	jQuery("#slider4").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount4").text(ui.value);
			}
	});
	jQuery("#amount4").text(jQuery("#slider4").slider("value"));
	
	jQuery("#slider10").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount10").text(ui.value);
				jQuery("#val10").val(ui.value);
			}
	});
	jQuery("#amount10").text(jQuery("#slider10").slider("value"));
	jQuery("#val10").val(jQuery("#slider10").slider("value"));
	
	jQuery("#slider11").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount11").text(ui.value);
				jQuery("#val11").val(ui.value);
			}
	});
	jQuery("#amount11").text(jQuery("#slider11").slider("value"));
	jQuery("#val11").val(jQuery("#slider11").slider("value"));
	
	jQuery("#slider12").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount12").text(ui.value);
				jQuery("#val12").val(ui.value);
			}
	});
	jQuery("#amount12").text(jQuery("#slider12").slider("value"));
	jQuery("#val12").val(jQuery("#slider12").slider("value"));
	
	jQuery("#slider13").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount13").text(ui.value);
				jQuery("#val13").val(ui.value);
			}
	});
	jQuery("#amount13").text(jQuery("#slider13").slider("value"));
	jQuery("#val13").val(jQuery("#slider13").slider("value"));
	
	jQuery("#slider14").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount14").text(ui.value);
				jQuery("#val14").val(ui.value);
			}
	});
	jQuery("#amount14").text(jQuery("#slider14").slider("value"));
	jQuery("#val14").val(jQuery("#slider14").slider("value"));
	
	jQuery("#slider15").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount15").text(ui.value);
				jQuery("#val15").val(ui.value);
			}
	});
	jQuery("#amount15").text(jQuery("#slider15").slider("value"));
	jQuery("#val15").val(jQuery("#slider15").slider("value"));
	
	jQuery("#slider16").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount16").text(ui.value);
				jQuery("#val16").val(ui.value);
			}
	});
	jQuery("#amount16").text(jQuery("#slider16").slider("value"));
	jQuery("#val16").val(jQuery("#slider16").slider("value"));
	
	jQuery("#slider17").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount17").text(ui.value);
				jQuery("#val17").val(ui.value);
			}
	});
	jQuery("#amount17").text(jQuery("#slider17").slider("value"));
	jQuery("#val17").val(jQuery("#slider17").slider("value"));
	
	jQuery("#slider18").slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
				jQuery("#amount18").text(ui.value);
				jQuery("#val18").val(ui.value);
			}
	});
	jQuery("#amount18").text(jQuery("#slider18").slider("value"));
	jQuery("#val18").val(jQuery("#slider18").slider("value"));
	
	// slider with fixed maximum
	jQuery("#slider5").slider({
			range: "max",
			value: 60,
			min: 1,
			max: 100,
			slide: function(event, ui) {
				jQuery("#amount5").text("$"+ui.value);
			}
	});
	jQuery("#amount5").text("$"+jQuery("#slider5").slider("value"));
	
	
	// slider vertical
	jQuery("#slider6").slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			value: 60,
			slide: function( event, ui ) {
				jQuery("#amount6").text(ui.value);
			}
	});
	jQuery("#amount6").text( jQuery("#slider6").slider("value"));

	
	// slider vertical with range
	jQuery("#slider7").slider({
			orientation: "vertical",
			range: true,
			values: [17, 67],
			slide: function(event, ui) {
				jQuery("#amount7").text("$"+ui.values[0]+"-$"+ui.values[1]);
			}
		});
	jQuery("#amount7").text("$"+jQuery("#slider7").slider("values",0) +
			" - $"+jQuery("#slider7").slider("values",1));
	
});