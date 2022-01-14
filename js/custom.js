function send_message() {
  var name = jQuery("#name").val();
  var email = jQuery("#email").val();
  var mobile = jQuery("#mobile").val();
  var message = jQuery("#message").val();

  if (name == "") {
    alert("Ju lutem vendosni emrin...");
  } else if (email == "") {
    alert("Ju lutem vendosni emailin...");
  } else if (mobile == "") {
    alert("Ju lutem vendosni numrin e celularit...");
  } else if (message == "") {
    alert("Ju lutem vendosni nje mesazh...");
  } else {
    jQuery.ajax({
      url: "send_message.php",
      type: "post",
      data:
        "name=" +
        name +
        "&email=" +
        email +
        "&mobile=" +
        mobile +
        "&message=" +
        message,
      success: function (result) {
        alert("Mesazhi u dergua me sukses!");
      },
    });
  }
}

function user_register() {
  jQuery(".field_error").html("");
  var name = jQuery("#name").val();
  var email = jQuery("#email").val();
  var mobile = jQuery("#mobile").val();
  var password = jQuery("#password").val();
  var is_error = "";
  if (name == "") {
    jQuery("#name_error").html("Ju lutem vendosni emrin...");
    is_error = "yes";
  }
  if (email == "") {
    jQuery("#email_error").html("Ju lutem vendosni emailin...");
    is_error = "yes";
  }
  if (mobile == "") {
    jQuery("#mobile_error").html("Ju lutem vendosni numrin e celularit...");
    is_error = "yes";
  }
  if (password == "") {
    jQuery("#password_error").html("Ju lutem vendosni passwordnin...");
    is_error = "yes";
  }
  if (is_error == "") {
    jQuery.ajax({
      url: "register_submit.php",
      type: "post",
      data:
        "name=" +
        name +
        "&email=" +
        email +
        "&mobile=" +
        mobile +
        "&password=" +
        password,
      success: function (result) {
        if (result == "email_present") {
          jQuery("#email_error").html(
            "Adresa e emailit eshte tashme ekzistuese"
          );
        }
        if (result == "insert") {
          jQuery(".register_msg p").html("Ju faleminderit per rregjistrimin!");
        }
      },
    });
  }
}

function user_login() {
  jQuery(".field_error").html("");
  var email = jQuery("#login_email").val();
  var password = jQuery("#login_password").val();
  var is_error = "";
  if (email == "") {
    jQuery("#login_email_error").html("Ju lutem vendosni emailin!");
    is_error = "yes";
  }
  if (password == "") {
    jQuery("#login_password_error").html("Ju lutem vendsoni passwordin!");
    is_error = "yes";
  }
  if (is_error == "") {
    jQuery.ajax({
      url: "login_submit.php",
      type: "post",
      data: "email=" + email + "&password=" + password,
      success: function (result) {
        if (result == "wrong") {
          jQuery(".login_msg p").html(
            "Ju lutem vendosni kredenciale te vlefshme!"
          );
        }
        if (result == "valid") {
          window.location.href = window.location.href;
        }
      },
    });
  }
}

function manage_cart(pid, type) {
  if (type == "update") {
    var qty = jQuery("#" + pid + "qty").val();
  } else {
    var qty = jQuery("#qty").val();
  }
  jQuery.ajax({
    url: "manage_cart.php",
    type: "post",
    data: "pid=" + pid + "&qty=" + qty + "&type=" + type,
    success: function (result) {
      if (type == "update" || type == "remove") {
        window.location.href = window.location.href;
      }
      jQuery(".htc__qua").html(result);
    },
  });
}

function sort_product_drop(cat_id, site_path) {
  var sort_product_id = jQuery("#sort_product_id").val();
  window.location.href =
    site_path + "categories.php?id=" + cat_id + "&sort=" + sort_product_id;
}

function wishlist_manage(pid, type) {
  jQuery.ajax({
    url: "wishlist_manage.php",
    type: "post",
    data: "pid=" + pid + "&type=" + type,
    success: function (result) {
      if (result == "not_login") {
        window.location.href = "login.php";
      } else {
        jQuery(".htc__wishlist").html(result);
      }
    },
  });
}
