<?php 
	/*Creating a session  based on a session identifier, passed via a GET or POST request.
  We will include config.php for connection with database.
  We will get the datas from login.php file and check if any of those datas is incorrect or doesn't exist
   when Sign in button is clicked in login.php file
  */
	session_start();

	include_once('config.php');

	if(isset($_POST['submit']))
	{
		//We will collect username from form data after submitting an HTML form with method="post".
		$username = trim($_POST['name'] ?? '');

		//We will collect password from form data after submitting an HTML form with method="post".
		$password = trim($_POST['password'] ?? '');

		//Check if any of username and password variables is empty
		if (empty($username) || empty($password)) {

			//If true, echo this message
			echo "Please fill in all fields
			";

		}
		else{

			//If false, we will create a query to select id,emri,username,email,password,is_admin from users table based on each username
			$sql = "SELECT id, name, email, password, is_admin FROM users WHERE username = :username";

			//We use prepared statement as a feature used to execute the same sql statement repeatedly with high efficiency
			$selectUser = $conn->prepare($sql);

			//bindParam binds a parameter to the specified variable name, so we bind :username to $username variable

			$selectUser->bindParam(":username", $username);

			/* At a later time, the application binds the values to the parameters, and the database executes the statement.
			 The application may execute the statement as many times as it wants with different values */

			$selectUser->execute();

			/*The fetch() method allows you to fetch a row from a result set associated with a PDOStatement object. Internally,
			 the fetch() method fetches a single row from a result set and moves the internal pointer to the next row in the result set.*/

			$data = $selectUser->fetch(PDO::FETCH_ASSOC);

			//We will check if $data value(which in this case would be username) does not exist:
			if ($data === false) {
				

				//If the condition is true, then we will echo this message
				echo "The user does not exist
				";
			}else{

					//If condition is not true, we will check if password in database matches the password that we wrote 
				if (password_verify($password, $data['password'])) {
					//If this condition is true, we will store $data values to $_SESSION variables
					$_SESSION['id'] = $data['id'];
					$_SESSION['name'] = $data['name'];
					$_SESSION['email'] = $data['email'];
					$_SESSION['is_admin'] = $data['is_admin'];

					//And head to dashboard.php
					header('Location: dashboard.php');
					exit;
				}
				else{
					//If the second condition is not true, then we will echo this message:
					echo "The password is not valid
					";
				}

			}

		}


	}


 ?>