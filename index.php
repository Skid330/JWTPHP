<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (!empty($_GET)) {

  $USER_ID = $_GET['user_id'];
  $SECRET_KEY = $_GET['secret_key'];
  $LOGIN = $_GET['login'];
  $PASSWORD = $_GET['password'];

  $header = array(
    'alg' => 'HS256',
    'typ' => 'JWT'
  );

  $playload = array(
    'user_id' => $USER_ID
  );

  $json_header = json_encode($header);
  $json_playload = json_encode($playload);
  
  $unsignedToken = base64_encode($json_header) . '.' . base64_encode($json_playload);
  $signature = hash('sha256', $SECRET_KEY);

  $result = base64_encode($json_header) . '.' . base64_encode($json_playload) . '.' . $signature;
  

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>JWT PHP</title>
</head>
<body>
    <div class="container">
        <h1 style="margin-top: 50px;" class="text-center">JWT PHP</h1>
        <div style="margin-top: 50px;" class="col-6 mx-auto">
            <form>
              <div class="mb-3"> 
                  <label for="id" class="form-label">id</label>
                  <input name="user_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3"> 
                  <label for="login" class="form-label">Login</label>
                  <input name="login" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="Key" class="form-label">Secret Key</label>
                  <input name="secret_key" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="text" class="form-control" id="exampleInputPassword1">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <h3 style="margin-top: 20px;" class="text-center">Result</h3>
          <div class="text-break" style="margin-top: 10px;">
          <?php printf($result); ?>
          </div>
    </div>
</body>
</html>

