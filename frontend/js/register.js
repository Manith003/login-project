$("#registerBtn").click(function () {
  $.ajax({
    url: "../backend/api/register.php",
    type: "POST",
    data: {
      name: $("#name").val(),
      email: $("#email").val(),
      password: $("#password").val()
    },
    success: function () {
      alert("Registration successful");
      window.location = "login.html";
    }
  });
});
