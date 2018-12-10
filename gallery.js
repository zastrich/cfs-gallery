jQuery(function(){
	CFSGalLoadSort();
});

CFSGalLoadSort = function(){
	jQuery(".cfs-gallery").sortable({
		items					:	'.base-img',
		forceHelperSize			:	true,
		forcePlaceholderSize	:	true,
		scroll					:	true,
		connectWith				:	jQuery(".cfs-gallery"),
		update: function(event, ui){
			CFSGalatualizaGallery(this);
		},
		sort: function(){
			jQuery(".cfs-gallery").addClass('recebe');
		},
		beforeStop: function(){
			jQuery(".cfs-gallery").removeClass('recebe');
		}
	}).disableSelection();
}

CFSusaGalleryWp = function(me){
	tgm_media_frame = wp.media.frames.tgm_media_frame = wp.media({
		multiple: true,
		library: {
			type: 'image'
		},
	});

	tgm_media_frame.on('select', function(){
		var selection = tgm_media_frame.state().get('selection');
		selection.map( function( attachment ) {
			attachment = attachment.toJSON();
			
			img = jQuery("<div>")
					.addClass("base-img")
					.attr("data-id",attachment.id)
					.css("background-image","url("+attachment.url+")");
			
			destroy = jQuery("<a>")
					.attr("href", "javascript:;")
					.attr("onclick", "CFSGalremoveItemGallery(jQuery(this));")
					.html("x");
			
			img.append(destroy);
			
			jQuery(me).parents(".cfs-gallery-base").find(".cfs-gallery").append(img);
		});
		
		CFSGalatualizaGallery(me);
		CFSGalLoadSort();
	});
	
	tgm_media_frame.open();
}

CFSGalatualizaGallery = function(me){
	valores = [];
		
	jQuery(me).parents(".cfs-gallery-base").find(".base-img").each(function(i,v){
		if(jQuery(v).attr("data-id") != undefined) valores.push(jQuery(v).attr("data-id"));
	});
	
	jQuery(me).parents(".cfs-gallery-base").find("input[type=hidden]").val(valores.join(","));
}

CFSGalremoveItemGallery = function(me){
	gal = jQuery(me).parents('.cfs-gallery');
	jQuery(me).parents('.base-img').remove();
	CFSGalatualizaGallery(gal);
}