<!DOCTYPE html>
<html lang="en-us">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Holistic : Leads Registration
    </title>
    <?php
        echo $this->Html->meta('icon');
 
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('starter-template.css');
        echo $this->Html->css('dist/css/AdminLTE.css');           
        echo $this->Html->css('plugins/iCheck/flat/blue.css');  
 
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>

    <link rel="shortcut icon" href="<?= $this->Url->build("/webroot/ico/") ?>favicon.ico"> 
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:600,400,300" />
</head>
<script type="text/javascript">
    var BASE_URL = "<?= $base_url; ?>";
</script>
<body class="hold-transition register-page" style="background-color:#000000;">
   <div class="row">          
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
