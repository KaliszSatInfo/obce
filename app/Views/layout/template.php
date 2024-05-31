<!Doctype html>
<html>
    <head>
        <title>Titulek</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <?= $this->include("layout/assets");?> 
    </head>

    <body>
        <?= $this->include("layout/navbar");?>
        <div class="container-fluid">
            <?= $this->renderSection("content"); ?> 
        </div>
    </body>
</html>