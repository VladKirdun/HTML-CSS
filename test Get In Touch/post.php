<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Form</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="wrapper">
			<div class="bg-content">
				<div class="content">
					<main>
						<h1>GET IN TOUCH</h1>
						<p>
							Do you wanna offering me a job or just to say hello, please fell free to say it.
						</p>
						<form method="post" action="post.php">
							<p><label for="login">Login:</label></p>
							<input type="text" name="login" id="login" value="vlad.kirdun">
							<p><label for="password">Password:</label></p>
							<input type="password" name="password" id="password" value="12345678">
							<p><label for="email">Email:</label></p>
							<input type="text" name="email" id="email" value="vlad.kirdun@mail.ru">
							<h3>1. What courses are you interested in?</h3>
							<label for="HTML/CSS">HTML/CSS</label>
							<input type="checkbox" id="HTML/CSS" name="courses" checked>
							<label for="JS/JQuery">JS/JQuery</label>
							<input type="checkbox" id="JS/JQuery" name="courses">
							<label for="PHP">PHP</label>
							<input type="checkbox" id="PHP" name="courses">
							<h3>2. Enter your information: </h3>
							<p><label for="name">Name: </label></p>
							<input type="text" name="name" id="name" value="Vlad">
							<p><label for="surname">Surname: </label></p>
							<input type="text" name="surname" id="surname" value="Kirdun">
							<p><label for="telephone">Telephone: </label></p>
							<input type="text" name="telephone" id="telephone" value="+375293172814">
							<div class="clear"></div>
							<h3>3. Payment method:</h3>
							<select name="payment-method" id="payment-method">
								<option value="card">Card</option>
								<option value="cash" selected>Cash on delivery</option>
								<option value="online">Online wallet</option>
							</select>
							<h3>4. What time of day to bring order?</h3>
							<label for="morning">Morning</label>
							<input type="radio" id="morning" name="time-of-day">
							<label for="dinner">Dinner</label>
							<input type="radio" id="dinner" name="time-of-day">
							<label for="evening">Evening</label>
							<input type="radio" id="evening" name="time-of-day" checked>
							<textarea placeholder="your message..."></textarea>
							<p class="fields">All fields are required</p>
							<input type="submit" value="send">
						</form>
					</main>
					<aside>
						<div class="sidebar">
							<h2>Contact Info:</h2>
							<p>
								<span>Street/Road name 00.</span>
								<span>Address line 2.</span>
								<span>City Name 88456.</span>
								<span>Indonesia</span>
							</p>
							<p>
								<span>tel : +62 274 4568</span>
								<span>cell : +62 813 586 125</span>
							</p>
							<p>
								<span><a href="#">http://dynamicwp.net</a></span>
							</p>
							<p>
								<span><a href="#">dynamicwp@gmail.com</a></span>
								<span><a href="#">rochmanu@gmail.com</a></span>
							</p>
						</div>
					</aside>
				</div>
			</div>
		</div>
		<?php
	    $name = $_POST['name']; 
	    $surname = $_POST['surname'];
	    $email = $_POST['email'];// собираем введенные данные и записываем в переменные
	    $login = $_POST['login'];
	    $password = $_POST['password'];
	    $telephone = $_POST['telephone'];
	    $msg = "
 Name: $name
 Surname: $surname
 Еmail: $email
 Login: $login
 Password: $password
 Telephone: $telephone
 ---------------------------------------------
	    ";
      if (!empty($name) && !empty($surname) && !empty($email) && !empty($login) && !empty($password) && !empty($telephone)) //если все переменные имеют значения выполняем запись в файл
        {
        	if (!preg_match("/.+@.+\..+/i", strtolower($email)))
        	{ 
        		?>
    		  <script type="text/javascript">
    		  alert("Your email does not correspond to the rules of writing!");
    		  </script>
    		  <?php
          } 
          else
          {
        		$file = fopen ("message.txt", "a+"); //открываем для дозаписи файл message.txt лежаший в одной папке с текущей страницей
        		fwrite ($file,"$msg");
       		  fclose ($file);
       		  ?>
       		  	<script type="text/javascript">
    		  		alert("Your data has been successfully sent!");
    		 			 </script>
       		  <?php
    		  }
    		}
      else
    	  {
    	  	?>
    		  <script type="text/javascript">
    		  alert("All fields must be filled!");
    		  </script>
    		  <?php
    	  }	
    ?>
	</body>
</html>