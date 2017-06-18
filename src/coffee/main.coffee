class Main

    base_url = "http://localhost/crud_codeignter/"

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
                      $("#view_user_get").append "#{i.msg}"
            )
            .fail((jqXHR, textStatus, errorThrown)->
                alert "#{textStatus} : #{errorThrown}"
            )
