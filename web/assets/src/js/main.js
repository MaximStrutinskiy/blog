$(function(){
    $(document).ready(function(){

        //Function - Index homepage min-height
        function minHeight(tag){
            $hwd = $(window).height(); //height screen device
            $sh = $(tag);              //section bark need min-height
            $sh.css('min-height',$hwd);
        }

        //mmenu
        $('#index-header .menu-list').after("<div id='mobile-menu'>").clone().appendTo('#mobile-menu');
        $("#mobile-menu").find('*').attr('style', '');
        $("#mobile-menu").children("ul").removeClass('.menu-list')
            .parent().mmenu({
            extensions : [ 'widescreen', 'theme-white', 'effect-menu-slide', 'pagedim-black', 'theme-dark' ],
            navbar: {
                title: "Menu."
            }
        });

        var api = $('#mobile-menu').data("mmenu");

        $("#toogle").click(function() {
            $(this).removeClass('active');
            api.open();
        });

        api.bind("closed", function () {
            $('#toogle').removeClass('active');
        });

        //Toogle menu button
        function toogleButton() {
            $toogle = $('#toogle');

            $toogle.on('click', function(){
                $(this).toggleClass('active');
            });
        }

        //Run functions
        minHeight('#index-header');
        toogleButton();

        $(window).resize(function () {
            minHeight('#index-header');
            $('#toogle').removeClass('active');
            api.close();

        });
    });
});
