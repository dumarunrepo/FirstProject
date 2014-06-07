CREATE TABLE projects (
    project_id VARCHAR(50) PRIMARY KEY,
    project_name VARCHAR(50), 
    is_completed BOOLEAN DEFAULT 0,
    client VARCHAR(50) DEFAULT 'Bionivid',
    description TEXT,
    start_date DATETIME DEFAULT NULL,
    end_date DATETIME DEFAULT NULL
);

INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('sdhdsk','monish_1', 'true', 'Description', NOW());
INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('ffdsdf','monish_2', 'true', 'Description', NOW());
INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('dshgkd','monish_3', 'true', 'Description', NOW());
INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('dfasds','monish_4', 'true', 'Description', NOW());

CREATE TABLE IF NOT EXISTS permission (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(50),
    user_id VARCHAR(50),
    permission_type int(1) DEFAULT 0,
    UNIQUE KEY (project_id, user_id)
);

insert into permission (project_id, user_id, permission_type) values('sdhdsk','5',1);

CREATE TABLE IF NOT EXISTS project_stage (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(50),
    project_stage VARCHAR(50),
    project_status VARCHAR(50),
    start_date DATETIME DEFAULT NULL,
    end_date DATETIME DEFAULT NULL,
    report_url TEXT
);

INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('sdhdsk','RNA Analysis','progress','url_1');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('sdhdsk','RNA Analysis','completed','url_2');

CREATE TABLE IF NOT EXISTS `users`
(
user_id int(11) NOT NULL PRIMARY KEY,
user_clientname varchar(25),
user_fullname varchar(25) NOT NULL DEFAULT 'BIONIVID_USER',
user_email varchar(50) NOT NULL DEFAULT 'BIONIVID_USER@bionivid.com',
user_password varchar(50) NOT NULL,
user_status tinyint(1) NOT NULL DEFAULT '0'
);

CREATE TABLE IF NOT EXISTS `feedbacks`
(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
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
insert into supports(email, contactNo) values ('support@bionivid.com', '9901199649');

CREATE TABLE IF NOT EXISTS `sales`
(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email varchar(50) NOT NULL DEFAULT 'sales@bionivid.com',
contactNo varchar(50) NOT NULL
);
insert into sales(email, contactNo) values ('sales@bionivid.com', '9901199649');

