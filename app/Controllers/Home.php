<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $comments_model = new \App\Models\comments_model();
        $data['comment_count'] = $comments_model->get_comments_count();
        $data['comments'] = $comments_model->get_comments();
        $data['replies'] = $comments_model->get_replies();
        echo view('templates/header');
        echo view('main', $data);
        echo view('templates/footer');
    }
    public function save_comment(){
        $comments_model = new \App\Models\comments_model();
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $date = $this->request->getVar('date');
        $text = $this->request->getVar('text');//($name, $email, $text, $date){
        echo $comments_model->save_comment($name,$email,$text,$date);
    }
    public function save_reply(){
        $comments_model = new \App\Models\comments_model();
        $c_id = $this->request->getVar('c_id');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $date = $this->request->getVar('date');
        $text = $this->request->getVar('text');//($name, $email, $text, $date){
        echo $comments_model->save_reply($c_id,$name,$email,$text,$date);
    }
}
