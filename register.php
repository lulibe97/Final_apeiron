<?PHP

if ($_POST){
      $usuario = [
          'name'=> $_POST ['name'],
          'user'=> $_POST ['user'],
          'Address'=> $_POST ['Address'],
          'City'=> $_POST ['City'],
          'State'=> $_POST ['State'],
          'Zip'=> $_POST ['Zip'],
          'Password'=> password_hash ($_POST ['Password'], PASSWORD_DEFAULT),
                  ];

    $usuarios= file_get_contents ('data/users.json');

      $data = json_decode ($usuarios, true);

      $data['usuarios'][]= $usuario;





$json = json_encode($data, JSON_PRETTY_PRINT);

file_put_contents('data/users.json', $json);

}
?>

<?php include'header.php';?>

<!-- formulario -->


<div class="container-fluid">
  <div class="row my-5 ">

        <div class="col-sm-12 col-lg-5 px-5 p-3 mb-2 bg-secondary text-white">
        <br>
        <br>

        <h3>Hello, please register here! </h3>
        <br>
        <br>
        <p> Welcome to Apeiron, we are glad to have you in our community, we want you to spend an excelent time with us and love all our works as much as we do! Please enter all your personal details here so yo can create a new profile! <br>
        We will meet you after send! </p>
      </div>

      <div class="col-sm-12 col-lg-7 px-5 my-5 bw">
      <form id='register' action='register.php' method='post'>
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" class="form-control" id="inputName" placeholder="Please enter your name and last name" name="name">
            </div>
            <div class="form-group ">
              <label for="inputUser">Ussername</label>
              <input type="text" class="form-control" id="inputUser" placeholder="Please enter your username" name="user">
            </div>
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="Email">
          </div>
          <div class="form-group col-sm-12 col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="Address">
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12 col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="City">
          </div>
          <div class="form-group col-sm-12 col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control" name="State">
              <option selected>Choose...</option>
              <option>Argenitna</option>
              <option>España</option>
              <option>Brasil</option>
              <option>Alemania</option>
              </select>
          </div>
          <div class="form-group col-sm-12 col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="Zip">
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>

          <button type="submit" class="btn btn-primary">
            <a href="profile.php">Continuar</a></button>
      </form>
<br><br><br>

    </div>





</div>
</div>
</div>
<?php include'footer.php';?>
