<!--a 3. lépés a view kialakítása a lsiták megjelenítéséhez-->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <title>Kölcsönzések listája</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>kolcsonzes/index">Kölcsönzések listája</a></li> <!--szükséges a base url, hogy hol keressük, majd a controller neve/függvény neve (ugyanide mutat) a köv. / után a paraméter lenne-->
            <li><a href="<?php echo base_url(); ?>kolcsonzes/kolcsonzes_rogzit">Kölcsönzés rögzítése</a></li>
        </ul>        
    </nav>
    <h1>Kölcsönzések listája</h1>
    <!--ha van autok változó, az autok nem üres, kiírunk egy táblázatot-->
    <?php if (isset($kolcsonzes)): ?>
        <?php if (!empty($kolcsonzes)): ?>
            <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Autó ID</th>
                    <th>Bérlő ID</th>
                    <th>Bérlet kezdete</th>
                    <th>Napok száma</th>
                    <th>Napi díj</th>
                    
                </tr>
            </thead>
            <tbody>
                <!--a táblázat tartalmában végig megyek foreach-el-->
                <?php foreach ($kolcsonzes as $kolcson): ?>
                    <tr>
                        <td><?php echo $kolcson['id'] ?></td>
                        <td><?php echo $kolcson['berloid'] ?></td>
                        <td><?php echo $kolcson['autoid'] ?></td>
                        <td><?php echo $kolcson['berletkezdete'] ?></td>
                        <td><?php echo $kolcson['napokszama'] ?></td>
                        <td><?php echo $kolcson['napidij'] ?></td>
                        
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