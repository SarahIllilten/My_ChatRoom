<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>My_ChatRoom</title>
  
</body>
  <link rel="stylesheet" href="home.css"/>
</head>
<body>
 <form action='index.php?controller=home&action=connect' method='POST'>
  <p> My ChatRoom <p>
  <fieldset>
    <p><label for="username">Username</label></p>
    <p><input type="text" id="username" minlength="2" name="username" placeholder="Username..."></p> <br>

    <p><label for="roomname">Roomname</label></p>
    <select name="roomname">
    <?php 
      $roomnames = explode(",", $result);
      foreach ($roomnames as $value) {
        echo '<option value="' . $value . '">' . $value . '</option>';
      }
    ?>
    </select>
     <p><input type="text" id="roomname" minlength="2" name="newroomname" placeholder="New RoomName..."></p> <br>

    <p><input type="submit" value="Chat"></p>
    
  </fieldset>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>