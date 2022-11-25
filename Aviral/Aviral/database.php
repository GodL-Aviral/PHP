 <?php

class database{
  private $servername = "172.31.22.43";
  private $username   = "Aviral200520371";
  private $password   = "tkpJNPsb54";
  private $database   = "Aviral200520371";
  public  $con;

  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }else{
      return $this->con;
    }
  }

  // Insert customer data into customer table
  public function insertData($post)
  {
    $name = $this->con->real_escape_string($_POST['name']);
    $email = $this->con->real_escape_string($_POST['email']);
    $clan = $this->con->real_escape_string($_POST['clan']);
    $query="INSERT INTO pubg(name,email,clan) VALUES('$name','$email','$clan')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }
// this is to display data
  public function displayData()
  {
    $query = "SELECT * FROM pubg";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No found records";
    }
  }

  // Fetch single data for edit from customer table
  public function displyaRecordById($id)
  {
    $query = "SELECT * FROM pubg WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }
// this is for updating records
  public function updateRecord($postData)
  {
    $name = $this->con->real_escape_string($_POST['uname']);
    $email = $this->con->real_escape_string($_POST['uemail']);
    $clan = $this->con->real_escape_string($_POST['clan']);
    $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
      $query = "UPDATE pubg SET name = '$name', email = '$email', clan = '$clan' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    }

  }
// This is for deleteing records
  public function deleteRecord($id)
  {
    $query = "DELETE FROM pubg WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }
}
