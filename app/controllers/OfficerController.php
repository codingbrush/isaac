<?php

namespace Isaac\App\Controllers;
use Isaac\Core\Helpers\Controller;

class OfficerController extends Controller{

    public $users,$reports;
    
    public function __construct() {
        if(isLoggedIn() != 'true' && isOfficer() != 'true')
            redirect('/login');
        $this->users = $this->model('Users');
        $this->reports = $this->model('Reports');
        $this->announcements = $this->model('Announcement');
    }

    public function index()
    {
        $data = [
            'count_extensions' => $this->users->getNumberOfExtensionOfficers(),
            'count_farmers' => $this->users->getNumberOfFarmers(),
            'count_reports' => $this->reports->countReports(),
            'announcements' => $this->announcements->getAnnouncement()
        ];
        return view('/officers/dashboard',$data);
    }

}