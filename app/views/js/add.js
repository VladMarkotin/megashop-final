$( "#form" ).submit(function( event ) {
    event.preventDefault();
    let name = ( $("#name").val() )
    let price = ( $("#price").val() )
    let table = ($("#table"));
    let lastId = $("#table tr td[data-id]").last().data('id')
    if (!lastId) {
        lastId = 1;
    } else {
        lastId += 1;
    }
    console.log(lastId)
    jsonData = {name: name, price: price}
    editButton = `<button type="button" class="edit btn btn-info" data-toggle="modal"
    data-target="#exampleModal2"
    data-id=`+lastId+`>
     Edit
   </button>`;
    $.post( "add", jsonData )
        .done(function() {
            table.append(`<tr><td data-id=`+lastId+`>` +lastId+ `</td><td>`+name+`</td><td>`+price+`</td><td>`+editButton+`</td><td><input type="checkbox" data-id=`+ lastId +`></td></tr>`);
        }
    );
    
});