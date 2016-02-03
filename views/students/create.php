<!DOCTYPE html>
<html>
<body>

<?= '<a href="index">Go back</a><br />' ?>

<form action="create" method="post" autocomplete="on">
	<fieldset>
		<legend>Personal information:</legend>
			Firstname:<br>
			<input type="text" name="firstname" autofocus><br><br>
			Lastname:<br>
			<input type="text" name="lastname"><br><br>
			Age:<br>
			<input type="text" name="age"><br><br>
			Birthday:<br>
			<input type="text" name="bday"><br><br>
			E-mail:<br>
			<input type="text" name="email"><br><br>
			Sex:<br>
			<input type="radio" name="sex" value="male">Male
			<input type="radio" name="sex" value="female">Female<br><br>
			About yourself:<br>
			<textarea name="comment" rows="15" cols="55" maxlength="255"></textarea><br><br>
			<input type="submit" value="Submit">		
	</fieldset> 
</form>
</body>
</html>