$("#registerBtn").click(function () {
  $.ajax({
    url: "/backend/api/register.php",
    type: "POST",
    dataType: "json",
    data: {
      name: $("#name").val(),
      email: $("#email").val(),
      password: $("#password").val()
    },
    success: function (res) {
      console.log("REGISTER RESPONSE:", res);

      // Redirect on success
      window.location.href = "login.html";
    },
    error: function (xhr) {
      console.error("REGISTER ERROR:", xhr.responseText);
      alert("Registration failed");
    }
  });
});
