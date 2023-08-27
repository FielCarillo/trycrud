<?php
include "conn_db.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $CS = $_POST['CIVIL_STATUS'];
  $ph = $_POST['phone'];

  $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender',`CIVIL_STATUS`='$CS' , `phone`='$ph' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        </div>

        <div class="form-group mb-3">
          <label>Gender:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="gender" id="Male" value="Male" <?php echo ($row["gender"] == 'Male') ? "checked" : ""; ?> required>
          <label for="Male" class="form-input-label">Male</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="gender" id="Female" value="Female" <?php echo ($row["gender"] == 'Female') ? "checked" : ""; ?> required>
          <label for="Female" class="form-input-label">Female</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="gender" id="Transgender" value="Transgender" <?php echo ($row["gender"] == 'Transgender') ? "checked" : ""; ?> required>
          <label for="Transgender" class="form-input-label">Transgender</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="gender" id="Non-binary" value="Non-binary" <?php echo ($row["gender"] == 'Non-binary') ? "checked" : ""; ?> required>
          <label for="Non-binary" class="form-input-label">Non-binary</label>
          &nbsp;     
          <input type="radio" class="form-check-input" name="gender" id="Prefer not to respond" value="Prefer not to respond" <?php echo ($row["gender"] == 'Prefer not to respond') ? "checked" : ""; ?> required>
          <label for="Prefer not to respond" class="form-input-label">Prefer not to respond</label>     
        </div>

        <div class="mb-3">
            <label for="CIVIL_STATUS">Civil Status:</label>

            <select name="CIVIL_STATUS" id="CIVIL_STATUS" required>
              <option value="SINGLE" >SINGLE</option>
              <option value="MARRIED" >MARRIED</option>
              <option value="DIVORCED">DIVORCED</option>
              <option value="WIDOWED">WIDOWED</option>
            </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="number" maxlength="10" class="form-control" name="phone" placeholder="9123456789" value="<?php echo $row['phone'] ?>">
            </div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script>
      document.querySelectorAll('input[type="number"]').forEach(input =>{
      input.oninput = () => {
      if(input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
            };
          });
  </script>

</body>

</html>