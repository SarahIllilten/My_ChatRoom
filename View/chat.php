<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Envoie de message</title>
</head>

<body>
	<form action=<?php echo "'index.php?controller=chat&action=send&username=" . $_GET['username'] . "&roomname=" . $_GET['roomname'] . "'";?> method='POST'>
		<p>Welcom in  <?php echo $_GET['roomname'];?></p>
		<p><?php echo $_GET['username'];?></p>

		<input type="text" name="content" />
		<input type="submit" value="Send" />
	</form>

	<div>
		<?php
			if (!empty($result)) {
				foreach ($result as $value) {
					echo '<label>' . $value['username'] . '</label>';
					echo '<p>' . $value['content'] . '</p>';
					echo '<p>' . $value['date'] . '</p>';
				}
			}
		?>
	</div>
</body>
</html>