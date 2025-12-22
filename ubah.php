<?php
$db = new Database();
$id = $_GET['id'];

$data = $db->query("SELECT * FROM artikel WHERE id=$id")->fetch_assoc();

if ($_POST) {
    $db->update("artikel", [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ], "id=$id");

    header("Location: /lab11_php_oop/artikel/index");
}
?>

<h3>Ubah Artikel</h3>

<form method="POST">
    <p>
        Judul<br>
        <input type="text" name="judul" value="<?= $data['judul']; ?>">
    </p>
    <p>
        Isi<br>
        <textarea name="isi"><?= $data['isi']; ?></textarea>
    </p>
    <button type="submit">Update</button>
</form>
