<?php

class Galleries extends Controller
{
    private $photoModel;

    public function __construct()
    {
        $this->photoModel = $this->model('Photo');
    }

    public function index()
    {
        $data = [
            'photos' => $this->photoModel->getPhotos(8, Photo::RANDOM),
        ];
        $this->view('galleries/index', $data);
    }
}
