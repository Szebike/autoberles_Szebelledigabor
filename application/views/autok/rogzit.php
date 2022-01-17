<!--4. rögzítés view-t készítünk-->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <title>Autó rögzítése</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?php echo base_url(); ?>autok/index">Autók listája</a></li>
            <li><a href="<?php echo base_url(); ?>autok/autok_rogzit">Autó rögzítése</a></li>
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
        <h1>Autó rögzítése</h1>
        <form method="post">
            <input type="text" name="rendszam" id="rendszam" placeholder="Rendszám" required 
            <?php if ($this->session->userdata('last_request')):?>
                <?php if (array_key_exists('rendszam', $this->session->userdata('last_request'))): ?> <?php //visszaíratás?>
                    value="<?php echo $this->session->userdata('last_request')['rendszam']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="text" name="tipus" id="tipus" placeholder="Típus" required
                    
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('tipus', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('last_request')['tipus']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="number" name="evjarat" id="evjarat" placeholder="Évjárat" required
            
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('evjarat', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('')['evjarat']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="text" name="szin" id="szin" placeholder="Szín" required
                    
            <?php if ($this->session->userdata('last_request')): ?>
                <?php if (array_key_exists('szin', $this->session->userdata('last_request'))): ?>
                    value="<?php echo $this->session->userdata('last_request')['szin']; ?>"
                <?php endif; ?>
            <?php endif; ?>
            >
            <br>
            <input type="submit" value="Rögzít" var_dump($evjarat)>
        </form>
    </div>
</body>
</html>