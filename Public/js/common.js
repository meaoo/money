
$(function () {

    $('.site-search-form input.search-input').on('keyup', searchSuggest);
    $('.site-search-form input.search-input').on('focus', searchSuggest);
    $('.site-search-form input.search-input').on('blur', function () {
        setTimeout(function () { $('.x-site-search-con .site-search-txt').hide(); }, 200);
    });

    $('.site-search-form').on('submit', function () {
        var key = $.trim($(this).find('input.search-input').val());
        $(this).find('input.search-input').val(key);
        if (key == '') {
            //window.location.href = siteIndex;
            return false;
        }
        
    });
});

function searchSuggest() {
    var key = $(this).val();    
    if (key.length < 2 || key.length > 10) {
        $('.x-site-search-con .site-search-txt').hide();
        return;
    }
    if (key == searchKey && key != '') {
        $('.x-site-search-con .site-search-txt').show();
    } else {

        $.ajax({
            method: 'post',
            url: siteIndex + 'home/api/searchkey',
            data: { 'key': key },
            dataType: 'json',
            success: function (data) {
                $('.x-site-search-con .site-search-txt').html('');
                if (data.Result) {
                    $.each(data.Data, function (i, item) {
                        $('.x-site-search-con .site-search-txt').append('<li><a href="' + $('.site-search-form').attr('action') + '?flag=1&k=' + item.name + '">' + item.name + '<span>'+item.company_count +' '+ data.Message + '</span></a></li>');
                    });

                    $('.x-site-search-con .site-search-txt').show();
                } else {
                    
                }

            }
        });

        
        searchKey = key;
    }
}
var searchKey;

function modalAlert(content, title, func) {
    if (!title || title.length < 1) {
        title = $('#modalAlert .modal-title').attr('aria-label');
    }
    $('#modalAlert .modal-title').html(title);
    $('#modalAlert .modal-body').html(content);
    $('#modalAlert').modal('show')

    $('#modalAlert').off('hidden.bs.modal');
    if (typeof (func) == "function") {
        $('#modalAlert').on('hidden.bs.modal', function (e) {
            func(e);
        })
    }

}
