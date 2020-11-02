<!DOCTYPE html>
<html>
<head>
	<title>Thực Hành 2 </title>
	<style type="text/css">
		form {
			  box-sizing: border-box;
			  width: 260px;
			  margin: 100px auto 0;
			  box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
			  padding-bottom: 40px;
			  border-radius: 3px;
			}
		form h1 {
		  box-sizing: border-box;
		  padding: 20px;
		}
		 
		input {
		  margin: 40px 25px;
		  width: 200px;
		  display: block;
		  border: none;
		  padding: 10px 0;
		  border-bottom: solid 1px #1abc9c;
		  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
		  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
		  background-position: -200px 0;
		  background-size: 200px 100%;
		  background-repeat: no-repeat;
		  color: #0e6252;
		}
		input:focus, input:valid {
		  box-shadow: none;
		  outline: none;
		  background-position: 0 0;
		}
	
		button {
		  border: none;
		  background: #1abc9c;
		  cursor: pointer;
		  border-radius: 3px;
		  padding: 6px;
		  width: 200px;
		  color: white;
		  margin-left: 25px;
		  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
		}
		button:hover {
		  transform: translateY(-3px);
		  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
		}
	</style>
</head>
<body>
	<form action="{{url('postlogin')}}" method="post">
			{{ csrf_field() }}
	  <h1>Đăng nhập</h1>
	  <input placeholder="Username" type="text" required="" name="username">
	  <input placeholder="Password" type="password" required="" name="password">
	  <button type="submit" name="dangnhap"> Đăng Nhập</button>
    </form>
 </body>
 </html>   