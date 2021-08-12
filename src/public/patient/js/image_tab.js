
    //IMAGE TAB
    var image_tab_clicked = 0; //{0: not click yet, 1: clicked}
    $('a[href="#image"]').on('click', function(){
        if(image_tab_clicked == 0){ 
            image_tab_clicked = 1;
            $.ajax({
                url: "/profile/image/",
                data: {
                    "hn" : hn
                },
                success: function(data){
                    $('#image_box').html(data);
                }
            });
        }
    });

    

    //EkkoLightBox image
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
                alwaysShowClose: true
            });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
    });