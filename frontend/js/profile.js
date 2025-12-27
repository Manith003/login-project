const token = localStorage.getItem("token");

if (!token) {
  window.location = "login.html";
}

$.get("/backend/api/getProfile.php", { token }, function (data) {
  if (data) {
    $("#age").val(data.age);
    $("#dob").val(data.dob);
    $("#contact").val(data.contact);
  }
}, "json");

$("#updateBtn").click(function () {
  $.post("/backend/api/updateProfile.php", {
    token: token,
    age: $("#age").val(),
    dob: $("#dob").val(),
    contact: $("#contact").val()
  }, function () {
    alert("Profile updated");
  });
});
