<!DOCTYPE html>
<html>
<body>

<form action="update" method="post" autocomplete="on">
    <fieldset>
        <legend>Personal information:</legend>
        Firstname:<br>
        <input type="text" name="firstname" value="<?= $firstname ?>" autofocus><br><br>
        Lastname:<br>
        <input type="text" name="lastname" value="<?= $lastname ?>"><br><br>
        Age:<br>
        <input type="text" name="age" value="<?= $age ?>"><br><br>
        Birthday:<br>
        <input type="text" name="bday" value="<?= $bday ?>"><br><br>
        E-mail:<br>
        <input type="text" name="email" value="<?= $email ?>"><br><br>
        Sex:<br>
        <input type="radio" name="sex" value="male" <?php if ($sex == 'male') {echo "checked";} ?>>Male
        <input type="radio" name="sex" value="female" <?php if ($sex == 'female') {echo "checked";} ?>>Female<br><br>
        About yourself:<br>
        <textarea name="message" rows="15" cols="55" maxlength="255"></textarea><br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>
</body>
</html>