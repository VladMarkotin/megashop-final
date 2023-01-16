 edit = {
    id: ''
};
$( ".edit" ).click(function( event ) {
    
    jQuery.editId = $(event.target).data('id');
    console.log(edit.id)
    jsonData = {name: name, price: price}
    
});

$('#editButton').click(function (event){
    event.preventDefault();
    let form = $("#editForm").serializeArray();
    
    
    let newName = $("#newName").val();
    let newPrice = $("#newPrice").val();
    jsonData = {id: jQuery.editId, newName: newName, newPrice: newPrice}
    console.log(jsonData)
    $.post( "edit", jsonData )
        .done(function(response) {
            
            tr = $("tr").filter('[data-id='+jQuery.editId+']');
            console.log(tr)
            $("#newPrice").val(newPrice);
        }
    );
})