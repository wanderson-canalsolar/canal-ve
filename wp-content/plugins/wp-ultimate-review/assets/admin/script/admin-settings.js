
// show hide js global function
function xs_review_show_hide(getID){
	var idData = document.getElementById('xs_review_tr__'+getID);
	if(idData){
		idData.classList.toggle('active_tr');
	}
}

// show hide js global function
function xs_review_show_hide_2(getID){
	var idData = document.getElementById('xs_review_tr__custom_code');
	if(getID == 'custom_code'){
		idData.classList.add('active_tr');
	}else{
		idData.classList.remove('active_tr');
	}
}

// this function for copy data of Review Shortcode

function copyTextData(FIledid){
	var FIledidData = document.getElementById(FIledid);
	if(FIledidData){
		FIledidData.select();
		document.execCommand("copy");
	}
}



/*Ratting script*/

function responseMessage(msg) {
  jQuery('#review_data_show').fadeIn(200);  
  jQuery('#review_data_show').html("<span>" + msg + "</span>");
}
jQuery(document).ready(function(){
	click_xs_review_data();
});
function click_xs_review_data(){
	jQuery('#xs_review_stars li').on('mouseover', function(){
		var onStar = parseInt(jQuery(this).data('value'), 10); // The star currently mouse on
	   jQuery(this).parent().children('li.star-li').each(function(e){
		  if (e < onStar) {
			jQuery(this).addClass('hover');
		  }
		  else {
			jQuery(this).removeClass('hover');
		  }
		});
		
	  }).on('mouseout', function(){
		jQuery(this).parent().children('li.star-li').each(function(e){
		  jQuery(this).removeClass('hover');
		});
	  });
  
  
  jQuery('#xs_review_stars li').on('click', function(){
    var onStar = parseInt(jQuery(this).data('value'), 10); // The star currently selected
    var stars = jQuery(this).parent().children('li.star-li');
    
    for (i = 0; i < stars.length; i++) {
      jQuery(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      jQuery(stars[i]).addClass('selected');
    }
    
    var displayId = jQuery(this).parent().parent().children('input.right-review-ratting');
	displayId.val(onStar);
  });
}

/*Slider range*/
jQuery(document).ready(function($){
	jQuery('.xs-slidecontainer #xs_review_range').change(function(){
		var onData = parseInt(jQuery(this).val(), 10); 
		var displayId = jQuery(this).parent().parent().children('#review_data_show');
		displayId.html(onData);
	});

	// Review Location
	$('#review_location_id').on('change', function(){
		$('.wur-shortcode-wrapper').hide();
		if($(this).val() === 'custom_code'){
			$('.wur-shortcode-wrapper').fadeIn();
		}
	});
	$('#review_location_id').trigger('change');

	// Review form settings
	$('.wur-review-form-item').on('change', '.review_switch_button', function(){
		$(this).parents('.wur-review-form-item').find('.display-show-review-type').fadeToggle().toggleClass('active_tr');
	});


});

function click_xs_review_data_slider(dataTHis){
	var onData = parseInt(jQuery(dataTHis).val(), 10); 
	var displayId = jQuery(dataTHis).parent().parent().children('#review_data_show');
	displayId.html(onData);
}


