      $(document).on("click","#btnStoreProyecto",function(e)
      {
          e.preventDefault();
          var frm = $(this).closest("form");
          var datos = frm.serialize();

          $.ajax({
                  type: "POST",
                  url: __baseUrl + '/ajax/proyecto/store',
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


                  }
                });
      });










/*
$(document).on("click",".btn-do-popFecha",function(e)
{
    e.preventDefault();
    var frm = $(this).closest("form");
    var datos = frm.serialize();
    var relative = $(this).attr("rel");

    $.ajax({
            type: "POST",
            url: __baseUrl + '/ajax/tareas/updater/' + relative,
            data: datos,
            success: function( json )
            {
              if(json.status=="success")
              {
                $("#containerFecha-" + relative).html(json.html);
                Messenger().post({
                                    message: 'Listo, guardamos tus cambios!',
                                    type: 'success',
                                    showCloseButton: true
                                  });
              }
              $("#pop-fecha").hide();
               frm[0].reset();
            }
          });
});



$(document).on("click",".btnpop-fecha",function(e)
{
  e.preventDefault();
  $("#pop-fecha").toggle();
});

$(document).on("click",".btnpop-equipo",function(e)
{
  e.preventDefault();
  $("#pop-equipo").toggle();
});

$(document).on("click",".btnpop-tag",function(e)
{
  e.preventDefault();
  $("#pop-tags").toggle();
});

$(document).on("click",".btnAddMiembro2Tarea",function(e)
{

  e.preventDefault();
  var frm = $(this).closest("form");
  var datos = frm.serialize();
  var idTask = $(this).attr("rel");

  $.ajax({
          type: "POST",
          url: __baseUrl + '/ajax/collaborador/add/' + idTask,
          data: datos,
          success: function( json )
          {
            if(json.status=="success")
            {

                $("#containerEquipo-" + idTask).prepend(json.html);

                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").removeClass("fa-user");
                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").removeClass("text-muted");

                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").addClass("fa-check");
                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").addClass("text-success");


                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .text-litem a").removeClass("btnAddMiembro2Tarea");
                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .text-litem a").addClass("btnDelMiembro2Tarea");


            }else
            {
              Messenger().post({
                                  message: 'Ago salio mal, intenta mas tarde',
                                  type: 'error',
                                  showCloseButton: true
                                });
            }
          }
        });

});


$(document).on("click",".btnDelMiembro2Tarea",function(e)
{

  e.preventDefault();
  var frm = $(this).closest("form");
  var datos = frm.serialize();
  var idTask = $(this).attr("rel");

  $.ajax({
          type: "POST",
          url: __baseUrl + '/ajax/collaborador/remove/' + idTask,
          data: datos,
          success: function( json )
          {
            if(json.status=="success")
            {
                $("#containerEquipo-" + idTask + " .litem-" + json.relid).remove();
                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").removeClass("fa-check");
                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").removeClass("text-success");

                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").addClass("fa-user");
                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .icon-litem").addClass("text-muted");

                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .text-litem a").removeClass("btnDelMiembro2Tarea");
                $("#litemXAdd-" + idTask + " .litem-" + json.relid + "> .text-litem a").addClass("btnAddMiembro2Tarea");

            }else
            {
              Messenger().post({
                                  message: 'Ago salio mal, intenta mas tarde',
                                  type: 'error',
                                  showCloseButton: true
                                });
            }
          }
        });

});
*/
