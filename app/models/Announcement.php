<?php

namespace Isaac\App\Models;

use Isaac\Core\Database\DbQuery;

class Announcement extends DbQuery
{
    public function getAnnouncement()
    {
        $this->sql('SELECT
        u.firstname,u.lastname,a.id, a.title,a.content,a.image,a.date_created
        FROM isaac.users u
        INNER JOIN isaac.announcements a ON a.user_id = u.id');
        return $this->resultset();
    }

    public function createAnnouncement($data)
    {
        $this->sql('INSERT INTO announcements (title,content,image,user_id,date_created) VALUES (:title,:content,:image,:user_id,NOW())');
        $this->bindMultiple($data);
        return $this->execute();
    }

    public function getAnnouncementDetails($id)
    {
        $this->sql('SELECT * FROM announcements where id = :id');
        $this->bind(':id',$id);
        return $this->single();
        
    }

    public function checkImage($id)
    {
        $this->sql('SELECT image from isaac.announcements where image IS NOT NULL AND id = :id  ');
        $this->bind(':id',$id);
        return $this->single();
    }

    public function updateAnnouncement($data)
    {
        $this->sql('UPDATE isaac.announcements set title = :title, content = :content,image = :image,user_id = :user_id where id = :id');
        $this->bind(':title',$data['title']);
        $this->bind(':content',$data['content']);
        $this->bind(':image',$data['image']);
        $this->bind(':user_id',$data['user_id']);
        $this->bind(':id',$data['id']);
        return $this->execute();
    }

    public function deleteAnnouncement($id)
    {
        $this->sql('delete from isaac.announcements where id = :id');
        $this->bind(':id',$id);
        return $this->execute();
    }

}
