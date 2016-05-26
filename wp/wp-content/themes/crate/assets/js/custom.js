// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

jQuery(document).ready(function($) {

	//FITVIDS
	$("body").fitVids();

	//FORM VALIDATION
	if (jQuery().validate) { jQuery("#commentform").validate(); }

	//DROPDOWNS - SUPERFISH
	$('nav ul#primary-menu')
		.superfish({
    		delay: 200,
    		animation: { opacity:'show', height:'show' },
    		speed: 'fast',
    		cssArrows: false,
    		disableHI: true
	});

	Bean_Media.initPosts();
	Bean_Likes.Bean_Likes_Init();

	//BACK TO TOP
	$('a.back-to-top').click(function() {
		$('body').animate({scrollTop: 0},600);
		return false;
	});

	//CONTACT TEMPLATE 
	$('#BeanForm input#contactName').attr('placeholder', 'Name');
	$('#BeanForm input#email').attr('placeholder', 'Email Address');
	$('#BeanForm textarea#commentsText').attr('placeholder', 'Message');
});


//MOBILE SIDEBARS
var pikabu = new Pikabu({
	viewportSelector: ['viewport'],
	selectors: {
        element: '.wrapper',
        common: '.mobile-sidebar',
        left: '.mobile-sidebar-left',
        right: '.mobile-sidebar-right',
        overlay: '.mobile-overlay',
        navToggles: '.mobile-nav-toggle'
    },
     widths: {
     	left: '80%',
		right: '80%'
    }
});


//BEAN LIKES FUNCTIONS
var Bean_Likes = {
	Bean_Reload_Likes: function(who) {
	var text = jQuery("#" + who).html();
	var patt= /(\d)+/;

	var num = patt.exec(text);
	num[0]++;
	text = text.replace(patt,num[0]);
	jQuery("#" + who).html('<span class="count">' + text + '</span>');
	},

	Bean_Likes_Init: function() {
	jQuery(".bean-likes").click(function() {
		var classes = jQuery(this).attr("class");
		classes = classes.split(" ");

		if(classes[1] == "active") {
			return false;
		}
		var classes = jQuery(this).addClass("active");
		var id = jQuery(this).attr("id");
		id = id.split("like-");
		jQuery.ajax({
		  type: "POST",
		  url: "index.php",
		  data: "likepost=" + id[1],
		  success: Bean_Likes.Bean_Reload_Likes("like-" + id[1])
		});
		return false;
	});
	}
};


// FUNCTIONS FOR HANDLING POSTS OF TYPE 'AUDIO' AND 'VIDEO'
var Bean_Media = {
	initPosts: function() {
		this.setupAudioPosts();
		this.setupVideoPosts();
		this.setupImagePosts();
		this.setupGalleryPosts();
	},

	setupAudioPosts: function() {

		if(jQuery().jPlayer) {
			jQuery(".jp-audio").each(function() {
				var mp3 = jQuery(this).data("file");
				var cssSelectorAncestor = '#' + jQuery(this).attr("id");

				jQuery(this).find(".jp-jplayer").jPlayer( {
					ready : function () {
							jQuery(this).jPlayer("setMedia", {
							mp3: mp3,
							end: ""
						});
					},
					size: {
					    width: "100%",
					},
					swfPath: WP_TEMPLATE_DIRECTORY_URI[0] + "/assets/js",
					cssSelectorAncestor: cssSelectorAncestor,
					supplied: (mp3 ? "mp3": "") + ", all"
				});
			});
		}
		jQuery(".jp-audio .jp-interface").css("display", "block");

	},

	setupVideoPosts: function() {
		jQuery('.jp-video').each(function() {
			var m4v = jQuery(this).data("file");
			var poster = jQuery(this).data("poster");

			var cssSelectorAncestor = '#' + jQuery(this).attr("id");

			jQuery(this).find(".jp-jplayer").jPlayer( { ready : function () {
			jQuery(this).jPlayer(
				'setMedia', {
						m4v: m4v,
						poster: poster
						}
					);
				},
				preload: 'auto',
				cssSelectorAncestor : cssSelectorAncestor,
				swfPath: WP_TEMPLATE_DIRECTORY_URI[0] + "/assets/js",
				supplied: (m4v ? "m4v":"") + ", all",
				size : {
					width : '100%',
					height: "100%"
				},
				wmode : 'window'
			});
		});
		jQuery(".jp-video .jp-interface").css("display", "block");
	},

	setupImagePosts: function() {
		jQuery('.lightbox').off('click', this.onImagePostClick);
		jQuery(".lightbox").on('click', this.onImagePostClick);
	},

	onImagePostClick: function(ev) {
		var origRel = jQuery(this).attr('rel');
		var $images = jQuery(this).siblings('.lightbox');
		var fancyBoxImageArray = [];

		$images.each(function() {
			if (jQuery(this).attr('rel') == origRel)
				fancyBoxImageArray.push({
					href: jQuery(this).attr('href'),
					title: jQuery(this).attr('title')
				});
		})
		jQuery.fancybox.open(fancyBoxImageArray);

		ev.preventDefault();
	},

	setupGalleryPosts: function() {
		jQuery('.flexslider').flexslider({
			namespace: "bean-",
			animation: "slide",
			slideshow: false,
			animationLoop: true,
			startAt: 0,
			randomize: jQuery(this).data('orderby-slides') == '1',
			directionNav: true,
			smoothHeight: true,
			controlNav: false,
			touch: true,
			prevText: "&larr;",
			nextText: "&rarr;",
			start: function (slider) {
			   if (typeof slider.container === 'object') {
			        slider.container.click(function (e) {
			            if (!slider.animating) {
			                slider.flexAnimate(slider.getTarget('next'));
			            }
			        });
			   }
			}
		});
	}
};