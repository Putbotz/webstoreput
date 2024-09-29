<?php include 'header.php'; ?>

<?php
$AktivitiEdit = $_GET['id'];

$dataAktiviti = mysqli_query($con, "SELECT * FROM aktiviti WHERE kod='$AktivitiEdit'");

$EditAktiviti = mysqli_fetch_array($dataAktiviti);
?>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $data1 = $_POST['aktiviti'];
    $data2 = $_POST['tarikh'];

    $result = mysqli_query($con, "UPDATE aktiviti SET keterangan='$data1', tarikhAktiviti='$data2' WHERE kod='$id'");

    echo "<script>alert('Kemaskini aktiviti berjaya'); window.location='aktiviti.php'</script>";
}
?>

<html>
<!-- PAPAR MENU -->
<div id="menu" style="color: white;"> <!-- Set text color to white for the menu -->
    <?php include 'menu.php'; ?>
</div>

<!-- PAPAR ISI -->
<div id="isi">
    <head>
    <h2 style="color: white;">UPDATE AKTIVITI</h2>
    </head>
    <body>
        <form method="POST">
            <p style="color: white;">KETERANGAN: <br>
                <input type="text" name="aktiviti" value="<?php echo $EditAktiviti['keterangan'];?>" size="70%" autofocus></p>
            <p style="color: white;">TARIKH :<br>
                <input type="date" name="tarikh" value="<?php echo $EditAktiviti['tarikhAktiviti'];?>" />
                <!-- RUJUKAN PRIMARY KEY -->
                <input type="text" name="id" value="<?php echo $EditAktiviti['kod'];?>" hidden>
            </p>
            <button name="submit" type="submit">SIMPAN</button>
            <br>
            <font color="red">*Pastikan maklumat anda betul</font>
        </form>
    </body>
</div>
</html>
