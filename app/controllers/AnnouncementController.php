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
        //$report_date = clean($post['report_date']);
        //$fileType = $_FILES["image"]["type"];
        // $fileSize = $_FILES["profile_image"]["size"];

        // if ($fileSize / 1024 > "2048") {
        //     //Its good idea to restrict large files to be uploaded.
        //     echo "Filesize is not correct it should equal to 2 MB or less than 2 MB.";
        //     exit();
        // } //FileSize Checking
        if (!isset($image)) {
            $imagename = '';
        } else {
            $targetdir = "public/imgs/";
            $upFile = date("Y_m_d_H_i_s") . $_FILES["image"]["name"];

            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetdir.$upFile)) {
                    $imagename = $upFile;
                }
            }           
        }

        ///$profile_image = $upFile;
        $data = [
            'title'   => $title,
            'user_id' => $userid,
            'content' => $content,
            'image'   => $upFile,
            //'report_date' => $report_date
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
