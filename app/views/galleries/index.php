<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
$fileList = glob(APPROOT . '/../data/images/*');
?>

<main class="container">

    <h1 class="font-weight-light text-center mt-4 mb-0 text-center">Gallery</h1>

    <hr class="mt-2 mb-5">

    <div class="row text-center text-lg-left">
        <?php foreach ($data['photos'] as $photo): ?>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="<?php URLROOT ?>/photos/edit/<?php echo $photo->id ?>" class="d-block mb-4 h-100">
                    <figure class="text-center figure">
                        <img class="img-fluid figure-img rounded" src="data:image/png;base64, <?php echo base64_encode(file_get_contents(APPROOT . '/../data/images/' . $photo->photo_url)) ?>" alt="photo"/>
                        <figcaption class="figure-caption">
                            <div class="h4"><?php echo $photo->likes ?> <i class="fa fa-heart"></i></div>
                            <p><?php echo $photo->creation_date ?></p>
                        </figcaption>
                    </figure>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
