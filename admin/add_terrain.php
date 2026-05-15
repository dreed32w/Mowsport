<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="save_terrain.php" method="POST" enctype="multipart/form-data">

    <input name="terrain_name" placeholder="Nom terrain">
    <input name="city_name" placeholder="Ville">
    <input name="price" type="number" placeholder="Prix">

    <textarea name="description"></textarea>

    <input type="file" name="image">

    <button>Ajouter</button>
</form>

</body>
</html>