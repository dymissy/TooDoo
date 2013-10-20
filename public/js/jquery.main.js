jQuery(function($){

    $('table.todolist [contenteditable]').on('blur', function(e){
        if( !$(this).data('value') || $(this).data('value') != $(this).text() ) {
            //update value via ajax
            var t = $(this);
            var url = home_url + ( t.parents('table').hasClass('items') ? 'item' : 'todolist' ) + '/update';

            var data = {
                item: t.parents('tr').data('item'),
                field: t.data('field'),
                value: t.text()
            };

            $.post( url, data, function( data ) {
                //restore the value if something is wrong
                if( data == 'false' ) {
                    t.text( t.data('value') );
                }
            });
        }
    }).on('focus', function(e){
        $(this).data('value', $(this).text());
    });

});