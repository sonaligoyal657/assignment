<html>
<head>
	<title>
	</title>
	<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style>
		#signup-win {
			width: 350px;
			height: 300px;
			background-color: #f0f0f0;
			margin: auto;
			margin-top: 10px;
			border: 2px gray solid;
			box-shadow: 0px 0px 5px 1px black;
		}

		

		body {
			background-color: white;
		}

		
		#title {
			text-align: center;
			margin-top: 20px;
			font-size: 26px;
			font-family: Arial;			
			/*font-weight: bold;*/
				}

		tr {
			line-height: 35px;
		}

		input[type="number"],
		input[type="password"], 
		input[type="email"]{
			width: 100%;
			line-height: 30px;
			text-align: center;
			font-size: 15px;
			color: black;
			outline: none;


		}

		input[type="text"]:focus {
			border: 1px black solid;

		}

		input[type="password"]:focus {
			border: 1px black solid;
		}

		label {
			font-weight: bolder;
			color: red;
		}
		

		.btn {
			color: white;
			background-color: green;
			width: 120px;
			text-align: center;
			margin-left: 10px;
			padding: 10px;
			text-decoration: underline;
			font-weight: bolder;
			cursor: pointer;
			border: 1px black solid;
			margin-top: 10px;

		}
		#togglePassword {
        float: right;
        margin-right: 5px;
        margin-left: -25px;
        margin-top: 10px;
        position: relative;
        z-index: 2;
    }
		
	</style>
	<script type="text/javascript">
		 function showhide() {

        var type = document.getElementById("pwd").getAttribute("type");

        if (type == "password")
        {
            //Change type attribute
            document.getElementById("pwd").setAttribute("type", "text");
        } else
        {
            //Change type attribute
            document.getElementById("pwd").setAttribute("type", "password");
        }
		}
	</script>
	<script >
		 $(document).ready(function() {
		 	$("#btn-login").click(function() {
            var uid = $("#txtuser").val();
            //alert(uid);
            var pwd = $("#pwd").val();
            if (uid != '' && pwd != '') {
                var actionUrl = "ajax-login.php?uid=" + uid + "&pwd=" + pwd;
                $.get(actionUrl, function(response) {
                    if (response == "Successfull") {
                        $("#status-login").html("Successfull").css("color", "green");
                        location.href = "welcome.php";
                    } 
                    else
                        $("#status-login").html("Invalid Userid or Password").css("color", "red");
                });
            } else if (uid != '' && pwd == '')
                $("#status-login").html("Enter Password").css("color", "red");
            else if (uid == '' && pwd != '')
                $("#status-login").html("Enter userid").css("color", "red");
            else
                $("#status-login").html("Enter details").css("color", "red")
        });
		 })

      
               
       
	</script>
</head>
<body>
	<div id="title">Login Here</div>
	<div id="signup-win">
		
		<table width="90%" border="0" style="margin-left: 15px;" method="get" action="ajax-login.php">>
			<tr>
				<td>
					<label>Username</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="number" id="txtuser" name="txtuser" placeholder="Enter Mobile No." required>
				</td>
			</tr>
			<tr>
				<td>
					<label>Password</label>
				</td>
			</tr>
			<tr>
				<td>
				 <input type="password" id="pwd" name="pwd" placeholder="Enter password"><span id="togglePassword" class="fa fa-fw fa-eye pass-icon" onclick="showhide();"></span>
				</td>
			</tr>
			<tr>
				<td align="center">
					<div  id="status-login"></div>
					<input type="button" class="btn" id="btn-login" value="Login">
				</td>
			</tr>
		</table>
	</div>