<?php
include 'database.php';
$customerObj = new database();
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $customer = $customerObj->displyaRecordById($editId);
}
if(isset($_POST['update'])) {
$customerObj->updateRecord($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gamers</title>
<meta name="description" content="Pubg">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">
<img src="./img/pubg.png" width="60" height="50" alt="">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">About</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Contact us</a>
</li>
</ul>
</div>
</nav>
<header>
<h1>Edit Account</h1>
</header>
<section class="container">
<div class="row">
<div class="col-md-5 mx-auto">
<div class="card">
<div class="card-header bg-primary">
<h4 class="text-white">Update Info</h4>
</div>
<div class="card-body bg-light">
<form action="edit.php" method="POST">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" class="form-control" name="uname" value="<?php echo $customer['name']; ?>" required="">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" name="uemail" value="<?php echo $customer['email']; ?>" required="">
</div>
<div class="form-group">
<label for="clan">Clan:</label>
<input type="text" class="form-control" name="uclan" value="<?php echo $customer['clan']; ?>" required="">
</div>
<div class="form-group">
<input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
<input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<footer class="text-center text-lg-start" style="background-color: #ffffff;">
</footer>
</body>
</html>
