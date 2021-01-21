<?php
namespace Isaac\App\Models;

use Isaac\Core\Database\DbQuery;

class Reports extends DbQuery{

    public function countReports()
    {
        $this->sql('SELECT COUNT(*) AS reports FROM isaac.reports');
        return $this->single();
    }
    public function getReports()
    {
        $this->sql('SELECT
                      u.firstname,u.lastname,r.id, r.title,r.report_date,r.date_created
                      FROM isaac.users u
                      INNER JOIN isaac.reports r ON r.user_id = u.id
                   ');
        return $this->resultset();
    }
    
    public function createReport($data)
    {
        $this->sql('INSERT INTO isaac.reports (title,content,report_date,user_id,date_created) VALUES (:title,:content,:report_date,:user_id,NOW())');
        $this->bindMultiple($data);
        return $this->execute();
    }

    public function getReportDetails($id)
    {
        //dd($id['id']);
        $this->sql('select * from isaac.reports where id = :id');
        $this->bind(':id',$id);
        return $this->single();
    }

    public function deleteReport($id)
    {
        $this->sql('delete from isaac.reports where id = :id');
        $this->bind(':id',$id);
        return $this->execute();
    }
}