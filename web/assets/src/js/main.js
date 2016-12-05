$(document).ready(function(){

    //Function - Index homepage min-height
    function minHeight(tag){
        $hwd = $(window).height(); //height screen device
        $sh = $(tag);              //section bark need min-height
        $sh.css('min-height',$hwd);
    }

    //Toogle menu button
    function toogleButton() {
        $toogle = $('#toogle');
        $toogleDiv = $('.mobile-bg');

        $toogle.on('click', function(){

            if(this.classList.contains('active')){
                this.classList.remove('active');

                $toogleDiv.remove();
            }else {
                this.classList.add('active');

                //add mobile menu
                $div = '<div class="mobile-bg"></div>';
                $('body').prepend($div);
            }
        });

        $toogleDiv.on('click', function(){
            $toogleDiv.remove();
            $toogle.classList.remove('active');
        });

    }

    // $('.mobile-bg').on('click', function(){
    //     $('#toogle').removeClass('active');
    //     $('.mobile-bg').remove();
    // });

    //Run functions
    minHeight('#index-header');
    toogleButton();



    $(window).resize(function () {
        minHeight('#index-header');
        $('#toogle').removeClass('active');
        $('.mobile-bg').remove();
    });


});