<?php
    class Job{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        
        // Get all jobs
        public function getAll(){
            $this->db->query("SELECT * FROM job");
            $results = $this->db->resultSet();
            return $results;
        }

        public function getSkills(){
            $this->db->query("SELECT tag FROM skills");
            // Assign Result Set
            $results = $this->db->resultSet();
            return $results;
        }
        public function getBySkill($skill){
            $this->db->query("SELECT jobs.*, skills.tag
                        FROM job 
                        INNER JOIN skills
                        ON job.skills = skills.tag
                        WHERE job.skills = $skill
                        ORDER BY post_date DESC");
            $results = $this->db->resultSet();
    
            return $results;
        }
        public function getJob($id){
            $this->db->query("SELECT * FROM job WHERE id = $id");
            $row = $this->db->single();
            return $row;
        }
        //create Job
        public function handleSkill($skill){
            echo "?";
            $this->db->query("INSERT INTO skills (tag, amount) 
                            VALUES ($skill, 1)
                            ON DUPLICATE KEY UPDATE amount = amount + 1");
            $this->db->execute();
            
            $this->db->query("SELECT * FROM skills WHERE tag = $skill");
            $row = $this->db->single();
            return $row->id;
        }

        public function createJob($data){
            $this->db->query("INSERT INTO job (job_title, location, contact_email, position, company, description, salary, skills, contact_user) 
                            VALUES (:job_title, :location, :contact_email, :position, :company, :description, :salary, :skills, :contact_user)");
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':position', $data['position']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':skills', $data['skills']);
            $this->db->bind(':contact_email', $data['contact_email']);
            $this->db->bind(':contact_user', $data['contact_user']); 
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteJob($id){
            $this->db->query("DELETE FROM job WHERE id = $id");
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function updateJob($id, $data){
            $this->db->query("UPDATE job 
                            SET position = :position,
                                company = :company, 
                                description = :description, 
                                job_title = :job_title,
                                location = :location,
                                contact_email = :contact_email,
                                contact_user = :contact_user,
                                skills = :skills,
                                salary = :salary
                            WHERE id = $id");
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':position', $data['position']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':skills', $data['skills']);
            $this->db->bind(':contact_email', $data['contact_email']);
            $this->db->bind(':contact_user', $data['contact_user']);
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
?>