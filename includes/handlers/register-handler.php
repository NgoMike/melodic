<?php 

function sanitizeFormUsername($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
};

function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText); 
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
};

function sanitizeFormPassword($inputText) {
  $inputText = strip_tags($inputText);
  return $inputText;
};

if (isset($_POST['registerButton'])) {
  // Register button was pressed
  // $username = $_POST['username']; // Set variable when username is entered
  // $username = strip_tags($username); // Strips html elements from entering into db / xss attacks
  // $username = str_replace(" ", "", $username); // Looks for empty space(first param) and replace with empty string(2nd param)
  $username = sanitizeFormUsername($_POST['username']);
  $firstName = sanitizeFormString($_POST['firstName']);
  $lastName = sanitizeFormString($_POST['lastName']);
  $email = sanitizeFormString($_POST['email']);
  $email2 = sanitizeFormString($_POST['email2']);
  $password = sanitizeFormPassword($_POST['password']);
  $password2 = sanitizeFormPassword($_POST['password2']);

  $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

  if ($wasSuccessful) {
    header("Location: index.php"); // takes them to index page
  }
};

?>