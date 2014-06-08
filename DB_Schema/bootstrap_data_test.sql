INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('1','test_project_1', 'true', 'This is a test Description for Udupa testing', NOW());
INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('2','test_project_2', 'true', 'This is a test Description for Udupa testing', NOW());
INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('3','test_project_3', 'true', 'This is a test Description for Udupa testing', NOW());
INSERT INTO projects (project_id,project_name,is_completed,description, start_date) VALUES ('4','test_project_4', 'true', 'This is a test Description for Udupa testing', NOW());

INSERT INTO permission (project_id, user_id, permission_type) values('1','9590946168',1);
INSERT INTO permission (project_id, user_id, permission_type) values('2','9590946168',1);
INSERT INTO permission (project_id, user_id, permission_type) values('3','9590946168',1);
INSERT INTO permission (project_id, user_id, permission_type) values('4','9590946168',1);
INSERT INTO permission (project_id, user_id, permission_type) values('2','9901199420',1);
INSERT INTO permission (project_id, user_id, permission_type) values('3','9901199420',1);

INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('1','RNA Analysis','progress','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('2','RNA Analysis','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('3','Testing','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('4','Aditya vasectomy','progress','facebook.com');

INSERT INTO users(user_id, user_clientname, user_fullname, user_email, `user_password`, user_status) values ('9590946168','Siva','Aditya Udupa','udupa.pappu@popat.com','somehashvalue','1');
INSERT INTO users(user_id, user_clientname, user_fullname, user_email, `user_password`, user_status) values ('9901199420','Siva','Monish Kaul','kaulmonish@gmail.com','somehashvalue','1');

INSERT INTO clients(name, email, designation, organisation, phone_no, address) values('siva','ksiva@gmail.com','CEO','Dumarun','Challaghatta-Bangalore');

INSERT INTO supports(email, contactNo) values ('support@bionivid.com', '9901199649');
INSERT INTO sales(email, contactNo) values ('sales@bionivid.com', '9901199649');
