<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
$fileList = glob(APPROOT . '/../data/images/*');
?>

<main class="container">
    <?php echo "HELLO" ?>
    <?php foreach ($fileList as $filename): ?>
        <img src="<?php APPROOT ?>/../data/images<?php echo $filename ?>" alt="Img">
    <?php endforeach; ?>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
