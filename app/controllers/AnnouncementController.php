<?php

namespace Isaac\App\Controllers;

use Isaac\Core\Helpers\Controller;

class AnnouncementController extends Controller
{

    protected $announcements;
    public function __construct()
    {
        if (isLoggedIn() != 'true') {
            redirect('/login');
        }

        $this->announcements = $this->model('Announcement');
    }

    public function index()
    {
        $data = $this->announcements->getAnnouncement();
        //dd($data);
        return view('announcements/index', $data);
    }

    public function create()
    {
        return view('announcements/create');
    }

    public function store()
    {
        $post    = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // dd($post);
        $title   = clean($post['title']);
        $userid  = clean($post['user_id']);
        $image   = $_FILES['image']['name'];
        $content = clean($_POST['content']);
        //dd($_FILES);
        
        if (!isset($image)) {
            $imagename = '';
        } else {
            $targetdir = "public/imgs/";
            if(empty($_FILES["image"]["name"]))
            {
                $upFile = '';
            }else{
                $upFile = date("Y_m_d_H_i_s") . $_FILES["image"]["name"];
            }
            //$upFile = date("Y_m_d_H_i_s") . $_FILES["image"]["name"];

            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetdir.$upFile)) {
                    $imagename = $upFile;
                }
            }           
        }

        $data = [
            'title'   => $title,
            'user_id' => $userid,
            'content' => $content,
            'image'   => $upFile,

        ];
        $saved = $this->announcements->createAnnouncement($data);
        if ($saved) {
            session_create('success', 'Announcement Created Successfully');
            redirect('/announcements');
        }
        session_create('warning', 'Error Saving Data');
        redirect('/announcements');
    }

    public function edit($id)
    {
        $id = $id['id'];
        //dd($id);
        $data[] = $this->announcements->getAnnouncementDetails($id);
        //dd($report);
        return view('announcements/create', $data);
    }

    public function update($id)
    {
        $id = $id['id'];
        $post    = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         //dd($_POST);
        $title   = clean($post['title']);
        $userid  = clean($post['user_id']);
        $image   = $_FILES['image']['name'];
        $content = clean($_POST['content']);
        //dd($_FILES);
        
        if (!isset($image)) {
            $imagename = '';
        } else {
            $targetdir = "public/imgs/";
            if(empty($_FILES["image"]["name"]))
            {
                $upFile = '';
            }else{
                $upFile = date("Y_m_d_H_i_s") . $_FILES["image"]["name"];
            }

            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetdir.$upFile)) {
                    $imagename = $upFile;
                }
            }           
        }

        $data = [
            'id' => $id,
            'title'   => $title,
            'user_id' => $userid,
            'content' => $content,
            'image'   => $upFile,

        ];
        //dd($data);
        //$image_available = $this->announcements->checkImage($id);
        //dd($image_available);
        $saved = $this->announcements->updateAnnouncement($data);
        if ($saved) {
            session_create('success', 'Announcement Created Successfully');
            redirect('/announcements');
        }
        session_create('warning', 'Error Saving Data');
        redirect('/announcements');
    }

    public function destroy($id)
    {
        $id = $id['id'];
        $deleted = $this->announcements->deleteAnnouncement($id);
        if(!$deleted){
            session_create('warning','Report Deleted');
            redirect('/announcements');
        }
        session_create('success','Report Deleted');    
        redirect('/announcements');
    }

}
