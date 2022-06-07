<?php 
 
include 'Koneksi.php';

 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) { include 'user.php';
    header("Location: http://localhost/WEB/Menu.html");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['Username'];
    $password =($_POST['password']);
 
    $sql = "SELECT * FROM `admin` WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($kon, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: http://localhost/WEB/Menu.html");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	Body { 
background-color:	#c0c0c0;
	}
	

	
img {	
	display: block;
	margin-left: auto;
	margin-right: auto;
	}
	form { 
text-align : center; 

		}
.log {
	color:white;
	font-weight: bold;
	text-shadow: -1px -1px 0 #001, 1px -1px 0 #001, -1px 1px 0 #001, 1px 1px 0 #001;
	max-width: 500px;
	margin: auto;
	background-color: rgba(60, 60, 60, 0.9);
	background-size: 50%;
	border-radius: 25px;
	padding: 10px;
	}

h2 {
    position: absolute;
    bottom: 0;
    left: 0;
	opacity : 0.7;
	}
	
.user {
    position: fixed;
    bottom: 0;
    right: 0;
	opacity : 0.7;
	}


	</style>
	</head>
	<Body>

<h1 style="text-weight:bold; text-align:center;">TOKO KACA</h1>
<h1 style="text-weight:bold; text-align:center;">SEMOGA JAYA</h1> <br><br>
<form style="text-align:center;" method="POST" ><br>

    <div class="log"> <br>
				<label>Username</label>
                <input type="text" placeholder="Input Username" name="Username"><br><br>
                <label>Password</label>
                <input type="password" placeholder="Input password" name="password"><br><br>
       <button type="submit" class="btn" name="submit">LOGIN</button>
    </div><br>
</form>

	</Body>
</html>