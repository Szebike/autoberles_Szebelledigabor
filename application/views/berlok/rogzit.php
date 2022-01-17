<!--4. rögzítés view-t készítünk-->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <title>Bérlő rögzítése</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>berlok/index">Bérlők listája</a></li>
            <li><a href="<?php echo base_url(); ?>berlok/berlok_rogzit">Bérlő rögzítése</a></li>
        </ul>        
    </nav>
    <?php if($this->session->userdata('errors')):?> <!--ha van error-->
        <div style="color:red">
        <?php echo $this->session->userdata('errors') ?> 
        </div>
    <?php endif; ?>
    
    <?php if($this->session->userdata('success')):?>
        <div style="color:green">
        <?php echo $this->session->userdata('success') ?>
        </div>
    <?php endif; ?>
    <div>
        <!--sima rögzítő/registrációs form-->
        <h1>Bérlő rögzítése</h1>
        <form method="post">
            <input style= "padding: 10px; margin: 8px; box-sizing: border-box; border: 1px solid black; background-color: beige;
            "; type="text" name="nev" id="nev" placeholder="Név" required 
            <?php if ($this->session->userdata('last_request')):?>
                <?php if (array_key_exists('nev', $this->session->userdata('last_request'))): ?> <?php //visszaíratás?>
                    value="<?php echo $this->session->userdata('last_request')['nev']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input style= "padding: 10px; margin: 8px; box-sizing: border-box; border: 1px solid black; background-color: beige;
            "; type="text" name="jogositvany" id="jogositvany" placeholder="Jogosítvány száma" required
                    
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('jogositvany', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('last_request')['jogositvany']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            
            <input style= "padding: 10px; margin: 8px; box-sizing: border-box; border: 1px solid black; background-color: beige;
            "; type="text" name="telefon" id="telefon" placeholder="Telefonszám" required
                    
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('telefon', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('last_request')['telefon']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input style= "padding: 10px; margin: 8px;" type="submit" value="Rögzít" var_dump($nev)>
        </form>
    </div>
</body>
</html>