$( "#delete" ).click(function( event ) {
    let idsForDelete = [];
    $("#table input:checkbox:checked" ).each(function(index, el) {
        idsForDelete.push(  $(el).data('id') ) ;
       
    });
    /*$("#table tr" ).filter(':has(:checkbox:checked)').each(function(index, el){
        console.log(el)
        //console.log(idsForDelete);
        
    })*/
    
    jsonData = {ids: idsForDelete}
    $.post( "delete", jsonData )
        .done(function() {
            $("#table tr" ).filter(':has(:checkbox:checked)').remove()
        })
        .fail(function() {
            alert( "error" );
        });
    
});