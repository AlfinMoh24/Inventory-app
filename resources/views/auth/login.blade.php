<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style media="screen">
    /* ... tetap pakai style kamu ... */
    /* copy seluruh style CSS dari template login-mu di sini */
  </style>
</head>

<body>
  <form id="login-form">
    <h3>Login Here</h3>
    <div id="login-error" class="alert" style="display:none;"></div>
    <label for="email">Email</label>
    <input type="text" placeholder="Email" id="email" name="email">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">

    <button type="submit">Log In</button>
  </form>

  <script>
    document.getElementById("login-form").addEventListener("submit", function(e) {
      e.preventDefault();

      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      fetch("/api/auth/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify({
          email: email,
          password: password
        })
      })
      .then(res => res.json())
      .then(data => {
        if (data.token) {
          localStorage.setItem("token", data.token);
          window.location.href = "/dashboard";
        } else {
          document.getElementById("login-error").style.display = "block";
          document.getElementById("login-error").innerText = data.message || "Login gagal!";
        }
      })
      .catch(err => {
        console.error(err);
        document.getElementById("login-error").style.display = "block";
        document.getElementById("login-error").innerText = "Terjadi kesalahan server.";
      });
    });
  </script>
</body>

</html>
