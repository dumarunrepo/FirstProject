CREATE TABLE projects (
    project_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(50), 
    is_completed BOOLEAN DEFAULT 0,
    client VARCHAR(50) NOT NULL,
    description TEXT,
    start_date DATETIME DEFAULT NULL,
    end_date DATETIME DEFAULT NULL,
    UNIQUE KEY (project_name, client)
);

CREATE TABLE IF NOT EXISTS permissions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(50),
    user_id VARCHAR(50),
    permission_type int(1) DEFAULT 0,
    UNIQUE KEY (project_id, user_id)
);

CREATE TABLE IF NOT EXISTS project_stage (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(50),
    project_stage VARCHAR(50),
    project_status VARCHAR(50),
    start_date DATETIME DEFAULT NULL,
    end_date DATETIME DEFAULT NULL,
    report_url TEXT
);

CREATE TABLE IF NOT EXISTS `users`
(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id bigint NOT NULL,
user_clientname varchar(25) NOT NULL,
user_fullname varchar(25) NOT NULL,
user_address varchar(50),
user_designation varchar(50)
);

CREATE TABLE IF NOT EXISTS `clients`
(
name varchar(50) NOT NULL PRIMARY KEY,
email varchar(50) NOT NULL,
designation varchar(50) NOT NULL,
organisation varchar(50) NOT NULL,
phone_no bigint,
address TEXT
);

CREATE TABLE IF NOT EXISTS `feedbacks`
(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id bigint NOT NULL,
user_fullname varchar(25) NOT NULL DEFAULT 'BIONIVID_USER',
user_email varchar(50) NOT NULL DEFAULT 'BIONIVID_USER@bionivid.com',
user_feedback TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `supports`
(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email varchar(50) NOT NULL DEFAULT 'support@bionivid.com',
contactNo varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS `sales`
(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email varchar(50) NOT NULL DEFAULT 'sales@bionivid.com',
contactNo varchar(50) NOT NULL
);

