<?php
session_start();
?>
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
			width: 400px;
			height: 420px;
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
		#togglePassword {
        float: right;
        margin-right: 5px;
        margin-left: -25px;
        margin-top: 10px;
        position: relative;
        z-index: 2;
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
		#wait {
        width: 100px;
        height: 100px;
        background-image: url(wait.gif);
        background-size: contain;
        display: none;
        position: absolute;
        left: 45%;
        top: 20%;
        z-index: 10;
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

      
               
        $("#txtuser").blur(function() {
        	//var d= /^[0-9-+]+$/;
            var uid = $("#txuser").val();
            var actionUrl = "ajax-signup.php?uid=" + uid;
            $.get(actionUrl, function(response) {
                           		
                if (response == "Available") {
                    $("#errUid").html(response).css("color", "green");
                    $("#txtuser").html("Available").css("border-color", "green");
                } else {
                    $("#txtuser").focus();
                    $("#errUid").html(response).css("color", "red");
                    $("#txtuser").html("Not Available").css("border-color", "red");
                }
            
                       
        });
        })
        
        $(document).ajaxStart(function() {
            $("#wait").show();
        });

        $(document).ajaxStop(function() {
            $("#wait").hide();
        });

        $('#txtId').blur(function(){
        var regex =/^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
      var email=$("#txtId").val();
       if (regex.test(email) == false) {
                $("#txtId").focus();
                $("#errId").html("Incorrect Email").css("color", "red");
                $("#txtId").html(regex).css("border-color", "red");

            } else {
                $("#errId").html("Correct").css("color", "green");
                $("#txtId").html(regex).css("border-color", "green");

            }
        });
     


        $("#pwd").blur(function() {
            var r = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
            var passwd = $("#pwd").val();
            if (r.test(passwd) == false) {
                $("#pwd").focus();
                $("#errPwd").html("Minimum 8 characters which contain at least one numeric digit, one uppercase and one lowercase letter").css("color", "red");
                $("#pwd").html(r).css("border-color", "red");

            } else {
                $("#errPwd").html("Strong").css("color", "green");
                $("#pwd").html(r).css("border-color", "green");

            }
        });
        $("#btn-signup").click(function() {
            var uid = $("#txtuser").val();
            var pwd = $("#pwd").val();
            var eid = $("#txtId").val();
            if (uid == "" || pwd == "" || eid == '') {
                alert("Please complete all fields");
            } else {
                var actionUrl = "signup-process.php?uid=" + uid + "&eid=" + eid + "&pwd=" + pwd;
                //alert(actionUrl);
                $.get(actionUrl, function(response) {
                    if (response == 'Signed up Successfully') {
                        $("#status-signup").html(response).css("color", "green");
                        //alert(response);
                        location.href = "login.php";
                    }
                    else
                    	$("#status-signup").html('Error').css("color", "red");
                }); 
                }
                });
                });    
      

        

	</script>
</head>
<body>
	<div id="title">Signup Here</div>
	<div id="signup-win">
		
		
		<table width="90%" border="0" style="margin-left: 15px;" method="get" action="signup-process.php">>
			<tr>
				<td>
					<label>Username</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="number" id="txtuser" name="txtuser" placeholder="Enter Mobile No." required>
					 <div id="wait"></div>
                     <div id="errUid" name="errUid" class="form-text text-muted"></div>
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label>Email id</label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="email" id="txtId" name="txtId" placeholder="Enter email id" required>
					<div id="errId" name="errId"></div>
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
				  <div id="errPwd" name="errPwd"></div>
				</td>
			</tr>
			<tr>
				<td align="center">
					<b>Already Registered?<a href="login.php">Login Here</a></b>
				</td>
			</tr>
			<tr>
				<td align="center">
					<input type="button" class="btn" id="btn-signup" value="Signup">
				</td>
			</tr>
		</table>
	</div>