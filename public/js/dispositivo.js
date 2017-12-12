$(document).on("click","#btnDeleteModulo",function(e)
{
    e.preventDefault();
    var frm = $(this).closest("form");
    var datos = frm.serialize();

    var eliminar = confirm("Deseas eliminar este modulo?");

    if(eliminar)
    {
      var id_item = $(this).data("id");
        $.ajax({
            type: "POST",
            url: __baseUrl + '/ajax/dispositivo/delete',
            data: datos,
            success: function( json )
            {
              if(json.status=="success")
              {
                  $("#list-item-" + id_item).remove();
                  Messenger().post({
                                      message: 'Modulo eliminado',
                                      type: 'success',
                                      showCloseButton: true
                                    });

              }else
              {
                console.log(json);
                Messenger().post({
                                    message: 'Ooops, Ocurrio un error, intenta mas tarde!!',
                                    type: 'error',
                                    showCloseButton: true
                                  });
              }


            },
            statusCode: {
                            422: function()
                            {
                              Messenger().post({
                                                  message: '**Todos los campos son obligatorios',
                                                  type: 'error',
                                                  showCloseButton: true
                                                });
                            }
                        }
          });

    }
});
