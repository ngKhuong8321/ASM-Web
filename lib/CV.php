<?php
    class CV {
        private $db;
        function __construct()
        {
            $this->db = new Database;
        }
        // get all cv
        public function getAll()
        {
            $this->db->query("SELECT * FROM cv");
            $results = $this->db->resultSet();
            return $results;
        }
        
        // public function getbySkill($skill){
        //     $this->db->query("SELECT * FROM job
        //                     WHERE skills = $skill");
        //     $results = $this->db->resultSet();
        //     return $results;
        // }
        // public function getCV($id){
        //     $this->db->query("SELECT * FROM cv WHERE id = $id");
        //     $results = $this->db->resultSet();
        //     return $results;
        // }
        // public function createCV($data){
        //     $this->db->query("INSERT INTO cv (id, fullname, dob, about, phone_number, email, skills, education, experience) 
        //                     VALUES (:id, :fullname, :dob, :about, :phone_number, :email, :skills, :education, :experience)");
        //     $this->db->bind(':id', $data['id']);
        //     $this->db->bind(':skills', $data['skills']);
        //     $this->db->bind(':education', $data['education']);
        //     $this->db->bind(':experience', $data['experience']);
        //     $this->db->bind(':fullname', $data['fullname']);
        //     $this->db->bind(':dob', $data['dob']);
        //     $this->db->bind(':about', $data['about']);
        //     $this->db->bind(':phone_number', $data['phone_number']);
        //     $this->db->bind(':email', $data['email']);
        //     if ($this->db->execute()){
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
        // public function deleteCV($id){
        //     $this->db->query("DELETE FROM cv WHERE id = $id");
        //     if ($this->db->execute()){
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        // // Application
        // public function apply($job_id, $cv_id){
        //     $stmt = $this->db->query("SELECT status FROM application WHERE job_id = $job_id AND cv_id = $cv_id");
        //     $result = $this->db->execute();
        //     if ($result && $stmt->rowCount() > 0){
        //         return "You have already applied to this position";
        //     }else {
        //         $this->db->query("INSERT INTO application(cv_id, job_id, status)
        //                         VALUES ($cv_id, $job_id, NULL)");
        //         $this->db->execute();
        //     }
        // }
    }
?>