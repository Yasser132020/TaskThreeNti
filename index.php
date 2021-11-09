<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Register</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype ="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">address</label>
    <input type="text" name="address"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Linkedin url</label>
    <input type="text" name="url"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div> 
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>

<?php



if($_SERVER['REQUEST_METHOD'] == "POST"){

    $errorMessages = [];

    $name     = $_POST['name'];
    $address  = $_POST['address'];
    $url      = $_POST['url'];
    $mail     = $_POST['email'];
    $password = $_POST['password'];


    if(empty($name)){

        $errorMessages['Name'] = "Name Required";
    }

    if(empty($mail)){

        $errorMessages['Email'] = "Email Required";
    }else {
        
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
            
            $errorMessages['EMAIL-validiate'] = "invalid EMAIL";

        }
    }

    if(empty($password) || strlen($password) < 6){

        $errorMessages['Password'] = " please write at least 6 characters";
    }

    if(empty($address) || strlen($address) < 10){
        $errorMessages['address'] = "please  write at least 10 characters";
    }


    if(empty($url)){
        $errorMessages['url'] = "url Required";
    }else {
        
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            
            $errorMessages['url-validitate'] = "invalid url";

        }
        
    }

  





    if(count($errorMessages) > 0){

       foreach($errorMessages as $key => $value){

           echo $key.' : '.$value.'<br>';
       }


    }else{
    
         echo 'Valid Data';
   
    }


}


?>