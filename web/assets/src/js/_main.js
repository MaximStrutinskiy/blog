$(function () {
	$(document).ready(function () {

		//mmenu
		var indexId = document.getElementById('index-header'),
			infoId = document.getElementById('info-header'),
			contactId = document.getElementById('contact-header');

		//for index-page
		if (indexId) {
			$('#index-header .menu-list').after("<div id='mobile-menu'>").clone().appendTo('#mobile-menu');
		}

		//for info-page
		if (infoId) {
			$('#info-header .menu-list').after("<div id='mobile-menu'>").clone().appendTo('#mobile-menu');
		}

		//for contact-page
		if (contactId) {
			$('#contact-header .menu-list').after("<div id='mobile-menu'>").clone().appendTo('#mobile-menu');

		}

		$("#mobile-menu").children("ul").removeClass('.menu-list')
			.parent().mmenu({
			extensions: ['widescreen', 'effect-menu-slide', 'pagedim-black', 'theme-dark'],
			navbar: {
				title: "Menu."
			}
		});

		var mmenuId = document.getElementById('toogle');
		if (mmenuId) {
			var api = $('#mobile-menu').data("mmenu");

			$("#toogle").click(function () {
				$(this).removeClass('active');
				api.open();
			});

			api.bind("closed", function () {
				$('#toogle').removeClass('active');
			});

			//Toogle menu button
			function toogleButton() {
				var $toogle = $('#toogle');

				$toogle.on('click', function () {
					$(this).toggleClass('active');
				});
			}

			toogleButton();
		}

		//dropdown menu
		var dropMenuId = document.getElementById('bm_user_drop_menu_button');
		if (dropMenuId) {
			function dropDownMenu() {
				var buttonCont = '#bm_user_drop_menu_button';
				var dropCont = $(buttonCont + '> #bm_user_drop_menu_content');
				$(buttonCont).hover(
					function () {
						dropCont.addClass('active').fadeIn(300);
					},
					function () {
						dropCont.removeClass('active').fadeOut();
					}
				)
			}

			dropDownMenu();
		}

		//min height
		function minHeight(tag, e) {
			var $hwd = $(window).height(),
				$sh = $(tag);

			if (e) {
				$hwd = $hwd / e;
				$sh.css('min-height', $hwd);
			} else {
				$sh.css('min-height', $hwd);
			}
		}

		//Run functions
		minHeight('#index-header');
		minHeight('#info-header', 2.5);
		minHeight('#contact-header', 2.5);

		$(window).resize(function () {
			minHeight('#index-header');
			minHeight('#info-header', 2.5);
			minHeight('#contact-header', 2.5);

			$('#toogle').removeClass('active');
			api.close();
		});
	});
});
