$(document).on("click","#btnStoreDevice",function(e)
{
    e.preventDefault();
    var frm = $(this).closest("form");
    var datos = frm.serialize();

    $.ajax({
            type: "POST",
            url: __baseUrl + '/ajax/dispositivo/store',
            data: datos,
            success: function( json )
            {
              if(json.status=="success")
              {

                  Messenger().post({
                                      message: 'Listo, guardamos tu proyecto!',
                                      type: 'success',
                                      showCloseButton: true
                                    });
                  frm[0].reset();
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
});
