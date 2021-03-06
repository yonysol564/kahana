var total 	= jQuery(".journal_sec").data("total");


jQuery(document).ready(function($) {
	var post_id = jQuery(".journal_sec").data("pid");
	load_term_content("all");

	//Load first 4 posts
	load_more_posts(1,post_id);

	jQuery(".projects_cat_nav ul li a , #projects_nav_mobile ul li a").click( function(e){
		e.preventDefault(); 
		jQuery("#projects_nav_mobile").hide(); 
		jQuery(".projects_cat_nav ul li a").removeClass('active');
		jQuery(this).addClass('active');
		var term_id = jQuery(this).attr("href");
		var term_name = jQuery(this).html();
		jQuery('.choose_cat span').html(term_name);
		if(term_id){
			load_term_content(term_id);
		}
	});

	jQuery(".wrap_load_more a").click(function(e){
		e.preventDefault();
		var current = jQuery(this).data("current");
		var post_id = jQuery(this).data("post_id");
		console.log(current);
		load_more_posts(current,post_id);
	});

});

//Load terms content
function load_term_content(term_id){
	jQuery('.ajax_res .row .ajax_holder').html('');
	jQuery('.loader_div').show();
	jQuery.ajax({
		type : "post",
		dataType : "json",
		url : ajaxurl,
		data : {
			action: "load_term_content", 
			term_id : term_id,
		},
		success: function(response) {
			if(response.type == "success") {
			  jQuery('.loader_div').hide();
			  jQuery('#projects_nav_mobile').hide();
			  
			  jQuery('.ajax_res .row .ajax_holder').html(response.html);
			}
			else {
			   console.log(response.html); 
			}
		}
	});
}


//Load more posts
function load_more_posts(current,post_id){
	jQuery.ajax({
		type : "post",
		dataType : "json",
		url : ajaxurl,
		data : {
			action: "load_more_posts", 
			current : current,
			total : total,
			post_id : post_id
		},
		success: function(response) {
			if(response.type == "success") {
				jQuery(".ajax_response_row").append(response.html);
				jQuery(".wrap_load_more a").data("current",current+1);
			}
		}
	});
}