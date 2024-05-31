<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h1>Seznam obcí v okrese</h1>

<?php
use CodeIgniter\View\Table;

$table = new Table();

$table->setHeading('Pořadí', 'Název', 'Počet');

$pageNum = $pager->getCurrentPage();
$offset = ($pageNum - 1) * $pager->getPerPage();

foreach ($obec as $key => $row) {
    $table->addRow($offset + $key + 1, $row->nazev, $row->pocetMist);
}

$template = [
    'table_open' => '<table class="table table-striped">',

    'thead_open'  => '<thead>',
    'thead_close' => '</thead>',

    'heading_row_start'  => '<tr>',
    'heading_row_end'    => '</tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end'   => '</th>',

    'tfoot_open'  => '<tfoot>',
    'tfoot_close' => '</tfoot>',

    'footing_row_start'  => '<tr>',
    'footing_row_end'    => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end'   => '</td>',

    'tbody_open'  => '<tbody>',
    'tbody_close' => '</tbody>',

    'row_start'  => '<tr>',
    'row_end'    => '</tr>',
    'cell_start' => '<td>',
    'cell_end'   => '</td>',

    'row_alt_start'  => '<tr>',
    'row_alt_end'    => '</tr>',
    'cell_alt_start' => '<td>',
    'cell_alt_end'   => '</td>',

    'table_close' => '</table>',
];

$table->setTemplate($template);

echo $table->generate();
?>

<footer>
    <div class="d-flex">
        <div class="mx-auto text-center pagination a"> <?= $pager->links(); ?> </div>
        <form method="get" action="">
            <label for="per_page">Počet položek na stránku:</label>
            <select id="per_page" name="per_page" onchange="this.form.submit()">
                <option value="10" <?= ($per_page == 10) ? 'selected' : '' ?>>10</option>
                <option value="20" <?= ($per_page == 20) ? 'selected' : '' ?>>20</option>
                <option value="50" <?= ($per_page == 50) ? 'selected' : '' ?>>50</option>
                <option value="100" <?= ($per_page == 100) ? 'selected' : '' ?>>100</option>
            </select>
        </form>
    </div>
</footer>

<?= $this->endSection(); ?>
