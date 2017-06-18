(function() {
  var Main;

  Main = (function() {
    var base_url;

    function Main() {}

    base_url = "http://localhost/crud_codeignter/";

    window.delete_user = function(ident, count) {
      return swal({
        title: '¿Estas seguro de borrarlo?',
        html: "<i class='fa fa-trash fa-3x'></i>",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'No, cancelar!',
        confirmButtonClass: 'btn green darken-3',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
      }).then(function() {
        return $.post(base_url + "Crud/delete_user", {
          ident: ident
        }).done(function(data) {
          $("#users_data" + ident).remove();
          return swal({
            title: 'Eliminado Correctamente',
            text: data,
            type: 'success',
            confirmButtonClass: 'btn green darken-3',
            buttonsStyling: true
          });
        });
      });
    };

    $(function() {
      $("form#new_user_form").submit(function(e) {
        e.preventDefault();
        return $.ajax({
          type: 'GET',
          url: base_url + "Crud/add_new_user",
          data: $(this).serialize(),
          dataType: 'json'
        }).done(function(data) {
          var box_form, i, j, len, results;
          box_form = $("#box_form");
          results = [];
          for (j = 0, len = data.length; j < len; j++) {
            i = data[j];
            if (i.type === 'error') {
              box_form.show("fast").addClass("" + i["class"]);
              results.push($("#msg_form").text("" + i.msg));
            } else {
              box_form.show("fast").removeClass("" + i.remove_class).addClass("" + i["class"]);
              $("#msg_form").text("" + i.msg);
              $("#view_user_get").append("<tr id='users_data" + i.last_id + "'> " + i.request + " <td><a href='#!' onclick='delete_user(" + i.last_id + ")'><i class='fa fa-remove'></i></a></button></td> <td><a href='#!' style='color:red;'><i class='fa fa-pencil'></i></a></td> </tr>");
              results.push($("#new_user_form").trigger('reset'));
            }
          }
          return results;
        }).fail(function(jqXHR, textStatus, errorThrown) {
          return alert(textStatus + " : " + errorThrown);
        });
      });
      return $(".close").click(function() {
        return $("#box_form").hide();
      });
    });

    return Main;

  })();

}).call(this);
