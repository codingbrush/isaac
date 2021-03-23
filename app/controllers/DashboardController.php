<?php

namespace Isaac\App\Controllers;
use Isaac\Core\Helpers\Controller;

class DashboardController extends Controller{

    /**
     * @var object
     */
    private $users,$reports,$announcements;

    public function __construct() {
        if(isLoggedIn() != 'true')
            redirect('/login');
        $this->users = $this->model('Users');
        $this->reports = $this->model('Reports');
        $this->announcements = $this->model('Announcement');
    }

    public function dashboard()
    {
        $data = [
            'count_extensions' => $this->users->getNumberOfExtensionOfficers(),
            'count_farmers' => $this->users->getNumberOfFarmers(),
            'count_reports' => $this->reports->countReports(),
            'announcements' => $this->announcements->getAnnouncement()
        ];
        //die(var_dump($data['count_extensions']->extension_officers));
        return view('dashboard',$data);
    }
}