<?php
$db = new Database();
$form = new Form("", "Simpan");

if ($_POST) {
    $db->insert("artikel", [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ]);
    echo "<p>Data berhasil disimpan</p>";
}

$form->addField("judul", "Judul");
$form->addField("isi", "Isi Artikel", "textarea");
$form->displayForm();
