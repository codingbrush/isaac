<?php

namespace Isaac\App\Controllers;

use Isaac\Core\Helpers\Controller;

class ReportsController extends Controller{

    public $reports;
    
    public function __construct()
    {
        if(isLoggedIn() != 'true')
            redirect('/login');
        $this->reports = $this->model('Reports');
    }

    public function index()
    {
        if($_SESSION['isOfficer'] == true){
            $data = $this->reports->getReportsById(clean($_SESSION['user_id']));
        }else{
            $data = $this->reports->getReports();
        }
        return view('reports/index',$data);
    }

    public function create()
    {
        return view('reports/create');
    }

    public function save()
    {
        //die(var_dump($_POST));
        //Filter the values sent by the user for XSS attacks
        $post     = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $title = clean($post['title']);
        $userid = clean($post['user_id']);
        $content = clean($_POST['content']);
        $report_date = clean($post['report_date']);
        $data = [
            'title' => $title,
            'user_id' => $userid,
            'content' => $content,
            'report_date' => $report_date
        ];
        $saved = $this->reports->createReport($data);
        if($saved){
            session_create('success','Report Created Successfully');
            redirect('/reports');
        }
        session_create('warning','Error Saving Data');
        redirect('/reports');
    }

    public function edit($id)
    {
        $id = $id['id'];
        //dd($id);
        $data[] = $this->reports->getReportDetails($id);
        //dd($report);
        return view('reports/create',$data);
    }

    public function show($id)
    {
        $id = $id['id'];
        //dd($id);
        $data[] = $this->reports->getReportDetails($id);
        //dd($report);
        return view('reports/show',$data);
    }

    public function update($id)
    {
        $id = $id['id'];
        //die(var_dump($_POST));
        //Filter the values sent by the user for XSS attacks
        $post     = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $title = clean($post['title']);
        $userid = clean($post['user_id']);
        $content = clean($_POST['content']);
        $report_date = clean($post['report_date']);
        $data = [
            'id' => $id,
            'title' => $title,
            'user_id' => $userid,
            'content' => $content,
            'report_date' => $report_date
        ];
        //dd($data);
        $saved = $this->reports->updateReport($data);
        if($saved){
            session_create('success','Report Created Successfully');
            redirect('/reports');
        }
        session_create('warning','Error Saving Data');
        redirect('/reports');
    }

    public function destroy($id)
    {
        $id = $id['id'];
        $deleted = $this->reports->deleteReport($id);
        if(!$deleted){
            session_create('warning','Report Deleted');
            redirect('/reports');
        }
        session_create('success','Report Deleted');    
        redirect('/reports');
    }

}