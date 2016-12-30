$(function () {
	$(document).ready(function () {
		//Function - Index homepage min-height
		function minHeight(tag, e) {
			$hwd = $(window).height(); //height screen device

			if (e) {
				$hwd = $hwd / e;
				$sh = $(tag);              //section bark need min-height
				$sh.css('min-height', $hwd);
			} else {
				$sh = $(tag);
				$sh.css('min-height', $hwd);
			}
		}

		//mmenu
		//for index-page
		$('#index-header .menu-list').after("<div id='mobile-menu'>").clone().appendTo('#mobile-menu');
		//for info-page
		$('#info-header .menu-list').after("<div id='mobile-menu'>").clone().appendTo('#mobile-menu');
		//for contact-page
		$('#contact-header .menu-list').after("<div id='mobile-menu'>").clone().appendTo('#mobile-menu');

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
				$toogle = $('#toogle');

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
