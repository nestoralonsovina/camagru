<?php
$js_files = [
    'camera.js'
];
$css_files = [
    'camera.css',
];
require APPROOT . '/views/inc/header.php'; ?>

    <main class="container">
        <h1 class="text-center m-5">CAMERA</h1>
        <div class="row justify-content-center" id="alerts">

        </div>
        <div class="row justify-content-center">
            <div class="video-wrap text-center">
                <video id="video" playsinline autoplay></video>
                <div class="is-relative">
                    <canvas id="canvas" width="640" height="480"></canvas>
                    <div  id="controlCenter">
                        <button id="savePhoto" class="btn btn-warning mt-3">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        </button>
                        <button id="discard" class="btn btn-danger mt-3">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Trigger canvas web API -->
            <div class="controller center">
                <button id="snap" class="btn btn-primary">
                    <i class="fa fa-camera-retro" aria-hidden="true"></i>
                </button>
                <label for="upload-photo" class="btn btn-info m-0">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                </label>
                <input type="file" name="upload-photo" id="upload-photo" style="display: none;">
            </div>
        </div>

        <div class="row">
            <!-- .side .column -->
            <div class="columns is-mobile" id="stickers">

            </div>
            <!-- /.side -->
        </div>
    </main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
