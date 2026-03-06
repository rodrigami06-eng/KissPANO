
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->get('titulo')?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <?= $this->html->css('kiss.css')?>
</head>
<body>

    <?= $this->element('sidebar')?>

    <div class="main-content">
        
        <?= $this->fetch('content')?>

    </div>

    <?= $this->Html->script('kissJs.js') ?>
</body>
</html>