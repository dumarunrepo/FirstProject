CREATE TABLE projects (
    project_id VARCHAR(50) PRIMARY KEY,
    project_name VARCHAR(50), 
    project_stage VARCHAR(50),
    is_completed BOOLEAN DEFAULT 0,
    owner VARCHAR(50) DEFAULT 'Bionivid',
    description TEXT,
    start_date DATETIME DEFAULT NULL,
    end_date DATETIME DEFAULT NULL
);

INSERT INTO projects (project_id,project_name,project_stage,is_completed,description, start_date) VALUES ('sdhdsk','monish_1', 'Step-1', 'true', 'Description', NOW());
INSERT INTO projects (project_id,project_name,project_stage,is_completed,description, start_date) VALUES ('ffdsdf','monish_2', 'Step-1', 'true', 'Description', NOW());
INSERT INTO projects (project_id,project_name,project_stage,is_completed,description, start_date) VALUES ('dshgkd','monish_3', 'Step-1', 'true', 'Description', NOW());
INSERT INTO projects (project_id,project_name,project_stage,is_completed,description, start_date) VALUES ('dfasds','monish_4', 'Step-1', 'true', 'Description', NOW());

CREATE TABLE permission (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(50),
    user_id VARCHAR(50),
    permission_type int(1) DEFAULT 0,
    UNIQUE KEY (project_id, user_id)
);

insert into permission (project_id, user_id, permission_type) values('sdhdsk','5',1);

CREATE TABLE project_stage (
    project_id VARCHAR(50) PRIMARY KEY,
    project_stage VARCHAR(50),
    project_status VARCHAR(50),
    start_date DATETIME DEFAULT NULL,
    end_date DATETIME DEFAULT NULL,
    report_url TEXT
);


INSERT INTO projects (project_id,name,owner,description,created)
    VALUES ('sdhdsk','monish_1', 'Apple', 'Description', NOW());
INSERT INTO projects (project_id,name,owner,description,created)
    VALUES ('ffdsdf','monish_2','Google', 'Description', NOW());
INSERT INTO projects (project_id,name,owner,description,created)
    VALUES ('dshgkds','monish_3','HTC', 'Description', NOW());
INSERT INTO projects (project_id,name,owner,description,created)
    VALUES ('dfasds','monish_4','Samsung', 'Description', NOW());

CREATE TABLE IF NOT EXISTS `users`
(
`id` NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`user_fullname` varchar(25) NOT NULL DEFAULT 'BIONIVID_USER',
`user_email` varchar(50) NOT NULL 'BIONIVID_USER@bionivid.com',
`user_password` varchar(50) NOT NULL,
`user_status` tinyint(1) NOT NULL DEFAULT '0',
PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;