$("#loginBtn").click(function () {
  $.ajax({
    url: "/backend/api/login.php",
    type: "POST",
    dataType: "json",
    cache: false,
    data: {
      email: $("#email").val(),
      password: $("#password").val()
    },
    success: function (res) {
      console.log("SUCCESS:", res);

      if (res.token) {
        localStorage.setItem("token", res.token);
        window.location.href = "profile.html";
      } else {
        alert(res.error);
      }
    },
    error: function (xhr) {
      console.error("SERVER ERROR:");
      console.error(xhr.responseText);
      alert(xhr.responseText);
    }
  });
});
