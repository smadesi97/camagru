<?php
	include "../config/statup.php";
	if (isset($_GET['email']) && isset($_GET['code'])){
		$email = $_GET['email'];
		$code = $_GET['code'];
		try{
			$sql = "SELECT veri_code FROM user WHERE email = ? AND veri_code = ?";
			$statement = $dbh->prepare($sql);
			// We add more information left out
			$statement->bindParam(1, $email);
			// We bind/link a parameter to the specified variable name.
			$statement->bindParam(2, $code);
			// We execute the sql statement
			$statement->execute();
			if ($statement->rowCount())
			{
				// We set verified to be 1 becouse we wanna start verification from 1
				$verified = 1;
				$sql = " UPDATE user SET verified = ? WHERE email = ? AND veri_code = ?";
				// Prepare statement is a feature used to execute the same SQL repeatedly
				$statement = $dbh->prepare($sql);
				$statement->bindParam(1, $verified);
				$statement->bindParam(2, $email);
				$statement->bindParam(3, $code);
				$statement->execute();
				if ($statement->rowCount())
				{
					echo "<br/>Account is verified";
				header("Location: ../login.php");
				exit;
				}
				else
				{
					echo "<br/>Not verified";
				}
			}
			else
			{
				echo "<br/>Account not found";
			}
		}
		catch(PDOException $e){
			echo "<br/>Error " . $e->getMessage();
		}
	}
?>
