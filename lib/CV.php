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
        public function getbySkill($skill){
            $this->db->query("SELECT * FROM job
                            WHERE skills = $skill");
            $results = $this->db->resultSet();
            return $results;
        }
        public function getCV($id){
            $this->db->query("SELECT * FROM cv WHERE id = $id");
            $results = $this->db->resultSet();
            return $results;
        }
        public function createCV($data){
            $this->db->query("INSERT INTO cv (id, skills, education, work experience) VALUES (:id, :skills, :education, :experience)");
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':skills', $data['skills']);
            $this->db->bind(':education', $data['education']);
            $this->db->bind(':experience', $data['experience']);
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function deleteCV($id){
            $this->db->query("DELETE FROM cv WHERE id = $id");
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
?>