vn_selector.on('click', function(){
    var vn = $(this).data('vn');
    var self = $(this);

    if(self.hasClass('font-weight-bold')){
        
        self.removeClass('font-weight-bold');

        var vnboxid = "#vnbox_" + vn;
        $(vnboxid).fadeOut("slow");
    }else{                
        self.addClass('font-weight-bold');

        $.ajax({
            url: "/profile/visit/",
            data: {
                "hn" : hn,
                "vn" : vn
            },
            success: function(data){
                $('#overvnbox_' + vn).html(data);
            }
        });
    }
});

//console.log(request_vn);
if(request_vn == undefined){
    $('a.vn_selector:first').trigger('click');
}else{
    $('#vnsel_' + request_vn).trigger('click');
}

$(document).on('click', '.remove-vnbox', function(){
    var vn = $(this).data('vnbox');
    var vnboxid = "#vnbox_" + vn
    $(vnboxid).fadeOut("slow");
    //alert(vn);
    $('#vnsel_' + vn).removeClass('font-weight-bold');
});