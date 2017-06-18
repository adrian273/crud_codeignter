class Main

    base_url = "http://localhost/crud_codeignter/"

    window.delete_user = (ident, count)->
        swal
            title: '¿Estas seguro de borrarlo?'
            html: "<i class='fa fa-trash fa-3x'></i>"
            type: 'warning'
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'No, cancelar!',
            confirmButtonClass: 'btn green darken-3',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        .then ->
            $.post "#{base_url}Crud/delete_user", ident:ident
            .done((data)->
                $("#users_data#{ident}").remove()
                swal
                    title: 'Eliminado Correctamente'
                    text: data
                    type: 'success'
                    confirmButtonClass: 'btn green darken-3',
                    buttonsStyling: true
            )


    $ ->
        $("form#new_user_form").submit (e)->
            e.preventDefault()
            $.ajax
                type: 'GET'
                url: "#{base_url}Crud/add_new_user"
                data: $(@).serialize()
                dataType: 'json'
            .done((data)->
                box_form = $("#box_form")
                for i in data
                  if i.type is 'error'
                      box_form.show "fast"
                              .addClass "#{i.class}"
                      $("#msg_form").text "#{i.msg}"
                  else
                      box_form.show "fast"
                              .removeClass "#{i.remove_class}"
                              .addClass "#{i.class}"
                      $("#msg_form").text "#{i.msg}"
                      $("#view_user_get").append "
                          <tr id='users_data#{i.last_id}'>
                              #{i.request}
                              <td><a href='#!' onclick='delete_user(#{i.last_id})'><i class='fa fa-remove'></i></a></button></td>
                              <td><a href='#!' style='color:red;'><i class='fa fa-pencil'></i></a></td>
                          </tr>
                      "
                      $("#new_user_form").trigger('reset')
            )
            .fail((jqXHR, textStatus, errorThrown)->
                alert "#{textStatus} : #{errorThrown}"
            )

        #
        $(".close").click ->
            $("#box_form").hide()
