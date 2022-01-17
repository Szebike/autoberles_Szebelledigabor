<!--4. rögzítés view-t készítünk-->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <title>Kölcsönzés rögzítése</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>kolcsonzes/index">Kölcsönzések listája</a></li>
            <li><a href="<?php echo base_url(); ?>kolcsonzes/kolcsonzes_rogzit">Kölcsönzés rögzítése</a></li>
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
        <h1>Kölcsönzés rögzítése</h1>
        <form method="post">
            <input type="text" name="berloid" id="berloid" placeholder="Bérlő ID" required 
            <?php if ($this->session->userdata('last_request')):?>
                <?php if (array_key_exists('berloid', $this->session->userdata('last_request'))): ?> <?php //visszaíratás?>
                    value="<?php echo $this->session->userdata('last_request')['berloid']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="text" name="autoid" id="autoid" placeholder="Autó ID" required 
            <?php if ($this->session->userdata('last_request')):?>
                <?php if (array_key_exists('autoid', $this->session->userdata('last_request'))): ?> <?php //visszaíratás?>
                    value="<?php echo $this->session->userdata('last_request')['autoid']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="date" name="berletkezdete" id="berletkezdete" placeholder="Bérlet kezdete" required
            
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('berletkezdete', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('')['berletkezdete']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="number" name="napokszama" id="napokszama" placeholder="Napok száma" required
            
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('napokszama', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('')['napokszama']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="number" name="napidij" id="napidij" placeholder="Napi díj" required
                    
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('napidij', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('last_request')['napidij']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="submit" value="Rögzít" var_dump($evjarat)>
        </form>
    </div>
</body>
</html>