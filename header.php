<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="index.php?active=0">Home</a></li>
  <li><a href="Login.php">Login</a></li>
  <li><a href="signup.php">Signup</a></li>
  <li><a href="profile.php">Profile</a></li>
</ul>

</body>
</html>
