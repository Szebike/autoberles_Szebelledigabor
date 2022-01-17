<!--a 3. lépés a view kialakítása a lsiták megjelenítéséhez-->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <title>Bérlők listája</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>berlok/index">Bérlők listája</a></li> <!--szükséges a base url, hogy hol keressük, majd a controller neve/függvény neve (ugyanide mutat) a köv. / után a paraméter lenne-->
            <li><a href="<?php echo base_url(); ?>berlok/berlok_rogzit">Bérlő rögzítése</a></li>
            <li><a href="<?php echo base_url(); ?>berlok/berlok_modosit">Bérlő adatainak módosítása</a></li>
        </ul>        
    </nav>
    <h1>Bérlők listája</h1>
    <!--ha van autok változó, az autok nem üres, kiírunk egy táblázatot-->
    <?php if (isset($berlok)): ?>
        <?php if (!empty($berlok)): ?>
            <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Jogosítvány</th>
                    <th>Telefonszám</th>
                    
                </tr>
            </thead>
            <tbody>
                <!--a táblázat tartalmában végig megyek foreach-el-->
                <?php foreach ($berlok as $berlo): ?>
                    <tr>
                        <td><?php echo $berlo['id'] ?></td>
                        <td><?php echo $berlo['nev'] ?>
                        <!--<form method="POST" name="modosit">
                        <input type="text" name="nev" id="nev" placeholder="Név" required 
                        value="<?php //echo $berlo['nev'] ?>">
                        <input type="submit" value="Módosít" var_dump($nev)>-->
                        </td>
                        <td><?php echo $berlo['jogositvany'] ?></td>
                        <td><?php echo $berlo['telefon'] ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>            
            </table>
        <?php else: ?>
            
        <?php endif; ?>
    <?php else: ?>
        
    <?php endif; ?>
</body>
</html>