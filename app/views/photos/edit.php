<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <h1 class="font-weight-light text-center mt-4 mb-0 text-center"><?php echo $data['user']->username ?></h1>

    <hr class="mt-2 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img class="img-fluid rounded" src="data:image/png;base64, <?php echo base64_encode(file_get_contents(APPROOT . '/../data/images/' . $photo->photo_url)) ?>" alt="photo"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 justify-content-center">

        </div>
        <div class="col-md-6 justify-content-center">

        </div>
    </div>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
