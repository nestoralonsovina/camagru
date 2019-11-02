<?php

class Photos extends Controller
{
    private $photoModel;
    private $userModel;

    public function __construct()
    {
        $this->photoModel = $this->model('Photo');
        $this->userModel = $this->model('User');
    }

    public function camera() {
        if (!isLoggedIn()) {
            redirect('');
        }
        $this->view('photos/camera');
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = file_get_contents('php://input');
            $data = json_decode($data);

            $data->photoBase64 = $this->decodePhoto($data);
            if (isset($data->time) && isset($data->photoBase64) && isset($data->sticker)
                && isset($data->sticker_x) && isset($data->sticker_y)) {
                // create data folder if it doesn't exist
                if (!file_exists( APPROOT . "/../data")) {
                    mkdir(APPROOT . "/../data", 0777, true);
                    if (!file_exists(APPROOT . "/../data/images")) {
                        mkdir(APPROOT . "/../data/images", 0777, true);
                    }
                }

                // save photo to file with uniq id
                $file = md5(uniqid()) . '.png';
                file_put_contents( APPROOT . "/../data/images/" . $file,  $data->photoBase64);
                if ($this->photoModel->add($file, $_SESSION['user_id'])) {
                    header('Content-type: application/json');
                    echo json_encode( ["code" => 200]);
                } else {
                    header('Content-type: application/json');
                    echo json_encode( ["code" => 404]);
                }
            }
        }
    }

    public function edit($id) {
        $data['photo'] = $this->photoModel->getPhotoById($id);
        $data['user'] = $this->userModel->getUserById($data['photo']->user_id);

        $this->view('photos/edit', $data);
    }

    private function decodePhoto($data) {
        // take out the encoding information
        $img = $data->photoBase64;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);

        // decode base64 image
        return base64_decode($img);
    }
}