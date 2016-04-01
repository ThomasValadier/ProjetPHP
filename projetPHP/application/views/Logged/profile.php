<h1>Profile - data user id : <?= $id ?></h1>
<form method="post" action="edit">
    lastname :<input type="text" name="lastname" value="<?= $lastname ?>"></br>
    firstname :<input type="text" name="firstname" value="<?= $firstname?>"></br>
    Email :<input type="text" name="email" value="<?= $email ?>"></br>
    Address  :<input type="text" name="address" value="<?= $address . ", " . $postalcode . ", " . $city ?>"></br>
    Age :<input type="text" name="age" value="<?= $age ?>"></br>
    Sexe :
    <select name="sexe">
        <option value="1" <?= $sexe == 1 ? 'selected':'' ?>>Masculin</option>
        <option value="0" <?= $sexe == 0 ? 'selected':'' ?>>Féminin</option>
    </select><br>
    Description:
    <textarea name="description"><?= $description ?></textarea><br>

    <input type="submit" value="update" name="submit">
</form>