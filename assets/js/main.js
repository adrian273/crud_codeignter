(function() {
  var Main;

  Main = (function() {
    var base_url;

    function Main() {}

    base_url = "http://localhost/crud_codeignter/";

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
              $("#view_user_get").append("<tr> " + i.request + " <td><a href='#!'><i class='fa fa-remove'></i></a></button></td> <td><a href='#!' style='color:red;'><i class='fa fa-pencil'></i></a></td> </tr>");
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
