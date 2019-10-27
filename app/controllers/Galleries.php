<?php

class Galleries extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Gallery',
        ];
        $this->view('galleries/index', $data);
    }
}
