(function($) {
  "use strict";

  $("#login-form").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
      url: base_url + $(this).attr("action"),
      type: "POST",
      data: $(this).serialize(),
      success: function(resp) {
        if (resp.type == "validation") {
          $.each(resp.message, function(item, val) {
            $("#login-form")
              .find(".alert")
              .show()
              .html(val);
          });
        }
        if (resp.type == "fail") {
          $("#login-form")
            .find(".alert")
            .show()
            .html(resp.message);
        }
        if (resp.type == "success") {
          $("#login-form")
            .find(".alert")
            .hide();
          swal({
            type: "success",
            text: resp.message
          }).then(result => {
            window.location = base_url + resp.redirect;
          });
        }
      }
    });
  });
})(jQuery);
