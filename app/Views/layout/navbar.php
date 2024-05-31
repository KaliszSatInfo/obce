<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">

            <?php 
                $class = array(
                    'class' => 'nav-link'
                );
            ?>

            <?php foreach ($okres as $row){ ?>
                <li class="nav-item">
                <?php echo anchor('index/'.$row->kod, $row->nazev, $class); ?>
              </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>