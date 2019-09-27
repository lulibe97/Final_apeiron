<!-- -PHP- -->

<?php

if ($_POST) {

    $contacto = [
      'contact_name' => $_POST ['contact_name'],
      'contact_email' => $_POST ['contact_email'],
      'contact_issue' => $_POST ['contact_issue'],
      'contact_message' => $_POST ['contact_message'],
    ];

    $contactos = file_get_contents ('data2.json');

      $data = json_decode ($contactos, true);

      $data ['contactos'][] = $contacto;

    $json = json_encode ($data, JSON_PRETTY_PRINT);

    file_put_contents('data2.json', $json);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Contacto</title>

    <!-- bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <!-- Internal CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Google Fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
  </head>
  <body>

    <a name="top"></a>
    <!-- MENU RESPONSIVE -->
    <?php include'header.php';?>

  <!-- CONTENIDO -->
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="container-fluid container_md">

        <h2 class="contact_team" > Contact <br> Apeiron Team</h2>

        <h5 class="contact_team_h5">If you have any concern , just let us know</h5>
        <p class="contact_team_p">  Don't forget you also count with our <a class="anchor_color" href="F_A_Q.html">
          F.A.Q section</a>, where there are tons of already-made questions, where you can push your doubts out. If not, let's get personal! </p>

      </div>
    </div>
  </div>
  <!-- formulario -->
  <form action="contacto.php" method="post" enctype="multipart/form-data">

      <div class="form-row">

      </div>

        <div class="form-group">
        <label for="formGroupExampleInput"> Full Name</label>
        <input type="text" class="form-control" name="contact_name" id="formGroupExampleInput" placeholder="Example input"required>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="contact_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"required>
        </div>

        <div class="form-group">
      <label for="inputState"> What's the Issue?</label>
      <select id="inputState" name="contact_issue" class="form-control">
        <option selected>Choose...</option>
        <option>Membership </option>
        <option> Payments</option>
        <option>Branding</option>
        <option>Technical problem</option>
        <option>Suggestions or feedback</option>
        <option>Other</option>
        </select>
        </div>


        <div class="form-group">
        <label for="exampleFormControlTextarea1"> Message </label>
        <textarea class="form-control" name="contact_message" id="exampleFormControlTextarea1" rows="3"></textarea >
        </div>

        <button type="submit" class="btn btn-primary">Let us know!</button>



    </form>


<div>
  <?php include'footer.php';?>
</div>

  </body>
</html>
