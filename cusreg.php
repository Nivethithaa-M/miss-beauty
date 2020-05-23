<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Customer Registration</title>
<style>
.logo {
  height: 60px;
  width: 100px;
  float: left;
  border-radius: 50px;
}
.logo {
  float: left;
  margin: 10px;
}
* {
  margin: 0px;
  padding: 0px;
}

body {
  background: url("src/img/regbg.jpg") no-repeat center fixed;
  background-size: cover;
  font-family: 'Helvetica Neue', sans-serif;
  font-weight: lighter;
}
h1{
  text-align: center;
  color: white;
  background: rgba(0,0,0,0.5);
  padding: 20px;
}
.registration{
   margin: auto;
   width: 50%;
   text-align: center;
   color: white;
   background: rgba(0,0,0,0.5);
   border: 2px solid white;
   padding: 15px;
}
h2{
  padding: 15px;
}
#name , #add{
   width: 40%;
   padding: 5px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   font-family: serif;
   font-size: 18px;
   background: none;
}
#number{
   width: 34%;
   padding: 5px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   font-family: serif;
   font-size: 18px;
   background: none;
   color: white;
}
#num{
   padding: 7px 0px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   background: none;
   color: white;
}
#count, #state{
   width: 320px;
   padding: 7px 0px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   background: none;
   color: white;
}
#count option, #num option , #state option{
   color: black;
}
#check{
   font-family: serif;
   font-size: 18px;
}
#sub{
   width: 150px;
   padding: 5px;
   font-family: serif;
   font-size: 18px;
   border: 1px solid white;
   outline: 0;
   border-radius: 5px;
   background: none;
   color: white;
}
::placeholder{
   color: white;
}
#sub:hover{
  background-color: hotpink;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: black;
  color: white;
}

.previous {
  background-color: white;
  color: black;
  margin-left:50px;
}

.next {
  background-color: hotpink;
  color: white;
  margin-left:1200px;
}

</style>
</head>
<body>
    <img class="logo" src="src/img/logoo.jpg" />
	<h1>MISS BEAUTY REGISTRATION</h1><br><br><br>
	<a href="main.php" class="previous">&laquo; Previous</a>
    <a href="cuslogin.php" class="next">Next &raquo;</a>
	<div class="registration">
	    <form id="registration" method="post" action="insert.php"><br><br>
		<h2>Customer Registration Form</h2><br>
		<input type="text" name="name" id="name" placeholder="Name" required><br><br>
		<input type="radio" id="male" name="gender" value="m" required>
            <label for="male">Male</label>&nbsp;&nbsp;
        <input type="radio" id="female" name="gender" value="f" required>
            <label for="female">Female</label>&nbsp;&nbsp;
        <input type="radio" id="other" name="gender" value="o" required>
            <label for="other">Other</label><br><br>
		<textarea name="address" id="add" placeholder="Address" required></textarea><br><br>
		<select id="state" name="statecode" required>
		  <option selected hidden value="">Select State</option>
		  <option value="delhi">Delhi</option>
		  <option value="tamilnadu">TamilNadu</option>
		  <option value="rajasthan">Rajasthan</option>
		  <option value="jammu">Jammu& Kashmir</option>
		  <option value="kerala">Kerala</option>
		</select><br><br>
		<select id="count" name="countrycode" required>
		  <option selected hidden value="">Country</option>
		  <option value="india">India</option>
		  <option value="unitedstates">UnitedStates</option>
		  <option value="china">China</option>
		  <option value="afric">SouthAfrica</option>
		  <option value="Srilanka">Srilanka</option>
		</select><br><br>
		<select id="num" name="phonecode" required>
		  <option value="91">+91</option>
		  <option value="92">+92</option>
		  <option value="93">+93</option>
		  <option value="94">+94</option>
		  <option value="95">+95</option>
		</select><input type="number" name="number" id="number" placeholder="Mobile Number" required><br><br>
		<input type="email" name="email" id="name" placeholder="Email Address"required><br><br>
		<input type="text" name="user" id="name" placeholder="User Name" required><br><br>
		<input type="password" name="password" id="name" placeholder="Password"required><br><br>
		<input type="checkbox" id="check" required>&nbsp;<span id="check">I agree all the terms and conditions.</span><br><br>
		<button type="submit" id="sub">Submit</button>
		</form>
	</div>
</body>
</html>