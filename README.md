# ASM-Web
 JobLister SetUp

# Download & activate XAMPP
Download XAMPP, turn on Apache & MySQL

# Setup PHPMyAdmin

- Access http://localhost/phpmyadmin/ on local browser
- Create new database: 
    + Database name -> joblister
- Prepare tables:
    + Open SQL editor
    + Add below SQL:
////////////////////////////////////////////

    DROP TABLE IF EXISTS categories;
    CREATE TABLE categories (
        id int(11) NOT NULL,
        name varchar(255) NOT NULL
    ) ENGINE=INNODB DEFAULT CHARSET=utf8;

    DROP TABLE IF EXISTS jobs;
    CREATE TABLE jobs (
        id int(11) NOT NULL,
        category_id int(11) NOT NULL,
        company varchar(255) NOT NULL,
        job_title varchar(255) NOT NULL,
        description varchar(255) NOT NULL,
        salary varchar(255) NOT NULL,
        location varchar(255) NOT NULL,
        contact_user varchar(255) NOT NULL,
        contact_email varchar(255) NOT NULL,
        post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=INNODB DEFAULT CHARSET=utf8;


    ALTER TABLE categories
        ADD PRIMARY KEY (id);

    ALTER TABLE jobs
        ADD PRIMARY KEY (id);

    ALTER TABLE categories
        MODIFY id int(11) NOT NULL AUTO_INCREMENT;

    ALTER TABLE jobs
        MODIFY id int(11) NOT NULL AUTO_INCREMENT;"
    
//////////////////////////////////////////////

# Move repo to xampp/htdocs/

# Run localhost/ASM-Web

# Manually add job by 'Create Listing'