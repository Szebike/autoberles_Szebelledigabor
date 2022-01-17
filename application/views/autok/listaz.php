
<!--a 3. lépés a view kialakítása a lsiták megjelenítéséhez-->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <title>Autók listája</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>autok/index">Autók listája</a></li> <!--szükséges a base url, hogy hol keressük, majd a controller neve/függvény neve (ugyanide mutat) a köv. / után a paraméter lenne-->
            <li><a href="<?php echo base_url(); ?>autok/autok_rogzit">Autó rögzítése</a></li>
        </ul>        
    </nav>
    <h1>Autók listája</h1>
    <!--ha van autok változó, az autok nem üres, kiírunk egy táblázatot-->
    <?php if (isset($autok)): ?>
        <?php if (!empty($autok)): ?>
            <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rendszám</th>
                    <th>Típus</th>
                    <th>Évjárat</th>
                    <th>Szín</th>
                </tr>
            </thead>
            <tbody>
                <!--a táblázat tartalmában végig megyek foreach-el-->
                <?php foreach ($autok as $auto): ?>
                    <tr>
                        <td><?php echo $auto['id'] ?></td>
                        <td><?php echo $auto['rendszam'] ?></td>
                        <td><?php echo $auto['tipus'] ?></td>
                        <td><?php echo $auto['evjarat'] ?></td>
                        <td><?php echo $auto['szin'] ?></td>
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