INSERT INTO projects (project_name,is_completed, client, description, start_date) VALUES ('test_project_1', '1', 'siva', 'This is a test Description for Udupa testing', NOW());
INSERT INTO projects (project_name,is_completed, client, description, start_date) VALUES ('test_project_2', '1', 'siva', 'This is a test Description for Udupa testing', NOW());
INSERT INTO projects (project_name,is_completed, client, description, start_date) VALUES ('test_project_3', '1', 'siva', 'This is a test Description for Udupa testing', NOW());
INSERT INTO projects (project_name,is_completed, client, description, start_date) VALUES ('test_project_4', '1', 'siva', 'This is a test Description for Udupa testing', NOW());

INSERT INTO permissions (project_id, user_id, permission_type) values('1','9590946168',1);
INSERT INTO permissions (project_id, user_id, permission_type) values('2','9590946168',1);
INSERT INTO permissions (project_id, user_id, permission_type) values('3','9590946168',1);
INSERT INTO permissions (project_id, user_id, permission_type) values('4','9590946168',1);
INSERT INTO permissions (project_id, user_id, permission_type) values('2','9901199420',1);
INSERT INTO permissions (project_id, user_id, permission_type) values('3','9901199420',1);

INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('1','APPROVAL','progress','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('1','PROCESSING','progress','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('1','RNA SHIPPING','progress','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('1','DNA SHIPPING','progress','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('1','DELIVERY','progress','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('1','SUBTOTAL','progress','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('2','APPROVAL','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('2','PROCESSING','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('2','SHIPPING','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('2','DELIVERY','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('2','SUBTOTAL','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('3','Testing','completed','facebook.com');
INSERT INTO project_stage(project_id,project_stage,project_status,report_url) values ('4','Aditya vasectomy','progress','facebook.com');

INSERT INTO users(user_id, user_clientname, user_fullname, user_address, user_designation) values ('9590946168','Siva','Aditya Udupa','abcd','some_designation');
INSERT INTO users(user_id, user_clientname, user_fullname, user_address, user_designation) values ('9901199420','Siva','Monish Kaul','dcba','some_designation');

INSERT INTO clients(name, email, designation, organisation, phone_no, address) values('siva','ksiva@gmail.com','CEO','Dumarun', '99011990119','Challaghatta-Bangalore');
INSERT INTO clients(name, email, designation, organisation, phone_no, address) values('monish','monish@gmail.com','DEV','Dumarun', '99011990119','Challaghatta-Bangalore');

INSERT INTO supports(email, contactNo) values ('support@bionivid.com', '9901199649');
INSERT INTO sales(email, contactNo) values ('sales@bionivid.com', '9901199649');

INSERT INTO admins values("admin@bionivid.com","admin","Password");
