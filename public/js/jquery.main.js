jQuery(function($){

    $('table.todolist [contenteditable]').on('blur', function(e){
        if( !$(this).data('value') || $(this).data('value') != $(this).text() ) {
            //update value via ajax
            var url = home_url + ( $(this).parents('table').hasClass('items') ? 'item' : 'todolist' ) + '/update';

            var data = {
                item: $(this).parents('tr').data('item'),
                field: $(this).data('field'),
                value: $(this).text()
            };

            $.post( url, data, function( data ) {
                $( ".result" ).html( data );
            });
        }
    }).on('focus', function(e){
        $(this).data('value', $(this).text());
    });

});