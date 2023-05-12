CREATE DATABASE IF NOT EXISTS CVManagement;

USE CVManagement;

CREATE TABLE IF NOT EXISTS EMPLOYER (
  id VARCHAR(6),
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phonenumber VARCHAR(20) NOT NULL,
  company_name VARCHAR(50) NOT NULL,
  tax_number VARCHAR(20) NOT NULL,
  location VARCHAR(100) NOT NULL,
  address VARCHAR(100) NOT NULL,
  PRIMARY KEY (id, email)
);

CREATE TABLE IF NOT EXISTS JOBS (
  id VARCHAR(10) PRIMARY KEY,
  employer_id VARCHAR(6),
  name VARCHAR(50) NOT NULL,
  salary DECIMAL(10, 2) NOT NULL,
  description TEXT NOT NULL,
  FOREIGN KEY (employer_id) REFERENCES employer(id)
);

CREATE TABLE IF NOT EXISTS JOB_REQUIRED_SKILLS (
  job_id VARCHAR(10),
  skill_name VARCHAR(20),
  PRIMARY KEY (job_id, skill_name),
  FOREIGN KEY (job_id) REFERENCES JOBS(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS EMPLOYEE (
  id VARCHAR(6),
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phonenumber VARCHAR(20) NOT NULL,
  PRIMARY KEY (id, email)
);

CREATE TABLE IF NOT EXISTS CV (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  employee_id VARCHAR(6),
  position VARCHAR(100),
  additional_information TEXT,
  FOREIGN KEY (employee_id) REFERENCES EMPLOYEE(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS CV_SKILLS(
  cv_id INT,
  skills_name VARCHAR(50),
  PRIMARY KEY (cv_id, skills_name),
  FOREIGN KEY (cv_id) REFERENCES CV(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS CV_DEGREES (
  cv_id INT,
  degree_name VARCHAR(50),
  school_name VARCHAR(50),
  date_obtained DATE,
  PRIMARY KEY (cv_id, degree_name),
  FOREIGN KEY (cv_id) REFERENCES CV(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS CV_CERTIFICATES (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cv_id INT,
  certificate_name VARCHAR(50),
  issuing_organization VARCHAR(50),
  date_obtained DATE,
  expiration_date DATE,
  FOREIGN KEY (cv_id) REFERENCES CV(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS CV_EXPERIENCES (
  cv_id INT,
  experience_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  job_title VARCHAR(50),
  company_name VARCHAR(50),
  description VARCHAR(50),
  FOREIGN KEY (cv_id) REFERENCES CV(id) ON DELETE CASCADE
); 

CREATE TABLE IF NOT EXISTS CV_REFERENCES (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  cv_id INT,
  name VARCHAR(20),
  relationship VARCHAR(20),
  phone_number VARCHAR(20),
  email VARCHAR(20),
  FOREIGN KEY (cv_id) REFERENCES CV(id) ON DELETE CASCADE
);
-- employer
INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address)
VALUES ('E00001', 'Nguyen Van A', 'Pananasonic@example.com', '$2y$10$7n4fsf.SxafgEgrBssLMEeFf3p0..yRZSomEs9RlSu6itoeJy1o8y', '123-456-7890', 'Panasonics Corp', '1234567890', 'Ha Noi', '123 Hang Buom St');

INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address)
VALUES ('E00002', 'Tran Thi B', 'Samsung@example.com', '$2y$10$7n4fsf.SxafgEgrBssLMEeFf3p0..yRZSomEs9RlSu6itoeJy1o8y', '098-765-4321', 'Samsung Electronics', '0987654321', 'Da Nang', '456 Le Duan St');

INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address)
VALUES ('E00003', 'Le Van C', 'LG@example.com', '$2y$10$7n4fsf.SxafgEgrBssLMEeFf3p0..yRZSomEs9RlSu6itoeJy1o8y', '111-222-3333', 'LG Electronics', '1112223333', 'Ho Chi Minh City', '789 Nguyen Hue St');

INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address)
VALUES ('E00005', 'Do Van E', 'Microsoft@example.com', '$2y$10$7n4fsf.SxafgEgrBssLMEeFf3p0..yRZSomEs9RlSu6itoeJy1o8y', '777-888-9999', 'Microsoft Corporation', '7778889999', 'Can Tho', '987 Tran Hung Dao St');

INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address)
VALUES ('E00004', 'Pham Thi D', 'Sony@example.com', '$2y$10$7n4fsf.SxafgEgrBssLMEeFf3p0..yRZSomEs9RlSu6itoeJy1o8y', '444-555-6666', 'Sony Corporation', '4445556666', 'Hai Phong', '101 Bach Dang St');
-- employee
INSERT INTO EMPLOYEE (id, name, email, password, phonenumber)
VALUES ('E00006', 'Tran Van B', 'VanB@example.com', '$2y$10$CDuYez2WcLtC4eyBKbH2NeToslQFGxnwdtzPLAni7983bTSKTuITu', '123-456-7891');

INSERT INTO EMPLOYEE (id, name, email, password, phonenumber)
VALUES ('E00007', 'Le Thi C', 'CLe@example.com', '$2y$10$CDuYez2WcLtC4eyBKbH2NeToslQFGxnwdtzPLAni7983bTSKTuITu', '123-456-7892');

INSERT INTO EMPLOYEE (id, name, email, password, phonenumber)
VALUES ('E00008', 'Pham Van D', 'PhamD@example.com', '$2y$10$CDuYez2WcLtC4eyBKbH2NeToslQFGxnwdtzPLAni7983bTSKTuITu', '123-456-7893');

INSERT INTO EMPLOYEE (id, name, email, password, phonenumber)
VALUES ('E00009', 'Nguyen Thi E', 'NguyenE@example.com', '$2y$10$CDuYez2WcLtC4eyBKbH2NeToslQFGxnwdtzPLAni7983bTSKTuITu', '123-456-7894');

INSERT INTO EMPLOYEE (id, name, email, password, phonenumber)
VALUES ('E00010', 'Tran Thi F', 'TranF@example.com', '$2y$10$CDuYez2WcLtC4eyBKbH2NeToslQFGxnwdtzPLAni7983bTSKTuITu', '123-456-7895');

-- Insert data into JOBS table
INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J001', 'E00001', 'Software Developer', 60000.00, 'Develop software applications and programs.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J002', 'E00001', 'Web Designer', 45000.00, 'Design and create websites for clients.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J003', 'E00002', 'Network Administrator', 55000.00, 'Design and maintain computer networks for a medium-sized company.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J004', 'E00002', 'Cybersecurity Analyst', 70000.00, 'Develop and implement strategies to protect the company’s computer systems and networks from cyber attacks.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J005', 'E00003', 'Database Administrator', 65000.00, 'Design and manage the company’s databases to ensure the integrity and security of data.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J006', 'E00003', 'Data Analyst', 55000.00, 'Analyze and interpret complex data sets to provide insights that inform business decisions.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J007', 'E00004', 'Software Engineer', 75000.00, 'Develop high-quality software for a variety of applications and platforms.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J008', 'E00004', 'Artificial Intelligence Engineer', 90000.00, 'Design and develop intelligent systems and algorithms that can learn and make decisions.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J009', 'E00005', 'Web Developer', 50000.00, 'Develop and maintain websites using HTML, CSS, and JavaScript.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J010', 'E00005', 'Mobile App Developer', 65000.00, 'Design and develop mobile applications for iOS and Android platforms.');


-- Insert data into JOB_REQUIRED_SKILLS table
INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J001', 'Java');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J001', 'Python');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J002', 'HTML');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J002', 'CSS');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J002', 'JavaScript');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J003', 'Network Security');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J003', 'Cisco Networking');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J004', 'Network Security');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J004', 'Cyber Threat Intelligence');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J004', 'Penetration Testing');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J005', 'SQL');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J005', 'Database Security');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J006', 'Data Mining');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J006', 'Data Visualization');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J007', 'Java');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J007', 'Object-Oriented Programming');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J008', 'Machine Learning');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J008', 'Neural Networks');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J009', 'HTML');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J009', 'CSS');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J009', 'JavaScript');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J010', 'iOS Development');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J010', 'Android Development');

INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name)
VALUES ('J010', 'Mobile UI Design');


-- cvs
INSERT INTO CV (employee_id, position, additional_information)
VALUES ('E00006', 'Software Engineer', 'Experienced in full-stack web development using React, Node.js, and MySQL.');

INSERT INTO CV_SKILLS (cv_id, skills_name)
VALUES (1, 'React'), (1, 'Node.js'), (1, 'MySQL');

INSERT INTO CV_DEGREES (cv_id, degree_name, school_name, date_obtained)
VALUES (1, 'Bachelor of Science in Computer Science', 'ABC University', '2019-05-15');

INSERT INTO CV_CERTIFICATES (cv_id, certificate_name, issuing_organization, date_obtained, expiration_date)
VALUES (1, 'AWS Certified Solutions Architect - Associate', 'Amazon Web Services', '2021-02-28', '2024-02-28');

INSERT INTO CV_EXPERIENCES (cv_id, job_title, company_name, description)
VALUES (1, 'Software Engineer', 'XYZ Company', 'Developed and maintained a web application using React, Node.js, and MySQL.');

INSERT INTO CV_REFERENCES (cv_id, name, relationship, phone_number, email)
VALUES (1, 'John Doe', 'Former Manager', '555-1234', 'johndoe@email.com');


-- Inserting information into the CV table
INSERT INTO CV (employee_id, position, additional_information) VALUES ('E00006', 'Full-Stack Developer', 'Experienced web developer seeking new opportunities.');

-- Inserting information into the CV_SKILLS table
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (2, 'JavaScript');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (2, 'React');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (2, 'Node.js');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (2, 'Express');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (2, 'MongoDB');

-- Inserting information into the CV_DEGREES table
INSERT INTO CV_DEGREES (cv_id, degree_name, school_name, date_obtained) VALUES (2, 'Bachelor of Science in Computer Science', 'University of California, Los Angeles', '2016-05-15');

-- Inserting information into the CV_CERTIFICATES table
INSERT INTO CV_CERTIFICATES (cv_id, certificate_name, issuing_organization, date_obtained, expiration_date) VALUES (2, 'AWS Certified Developer - Associate', 'Amazon Web Services', '2019-09-01', '2022-09-01');

-- Inserting information into the CV_EXPERIENCES table
INSERT INTO CV_EXPERIENCES (cv_id, job_title, company_name, description) VALUES (2, 'Full-Stack Developer', 'XYZ Company', 'Developed and maintained web applications using JavaScript, React, Node.js, and MongoDB.');

-- Inserting information into the CV_REFERENCES table
INSERT INTO CV_REFERENCES (cv_id, name, relationship, phone_number, email) VALUES (2, 'John Doe', 'Former Manager', '555-555-5555', 'johndoe@email.com');

-- CV for E00007
INSERT INTO CV (employee_id, position, additional_information) VALUES ('E00007', 'Software Developer', 'I am a full stack developer with experience in Node.js, React, and MySQL.');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (3, 'Node.js'), (3, 'React'), (3, 'MySQL');
INSERT INTO CV_DEGREES (cv_id, degree_name, school_name, date_obtained) VALUES (3, 'Bachelor of Science in Computer Science', 'University of California, Berkeley', '2022-05-15');
INSERT INTO CV_CERTIFICATES (cv_id, certificate_name, issuing_organization, date_obtained, expiration_date) VALUES (3, 'AWS Certified Solutions Architect - Associate', 'Amazon Web Services', '2021-06-01', '2024-06-01');
INSERT INTO CV_EXPERIENCES (cv_id, job_title, company_name, description) VALUES (3, 'Software Engineer', 'Google', 'Developed and maintained internal tools for the Ads team.');
INSERT INTO CV_REFERENCES (cv_id, name, relationship, phone_number, email) VALUES (3, 'John Smith', 'Former Supervisor', '555-555-1234', 'john.smith@email.com');

-- CV for E00008
INSERT INTO CV (employee_id, position, additional_information) VALUES ('E00008', 'Data Analyst', 'I have experience analyzing large datasets using SQL and Python.');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (4, 'SQL'), (4, 'Python');
INSERT INTO CV_DEGREES (cv_id, degree_name, school_name, date_obtained) VALUES (4, 'Master of Science in Data Science', 'Stanford University', '2021-06-15');
INSERT INTO CV_CERTIFICATES (cv_id, certificate_name, issuing_organization, date_obtained, expiration_date) VALUES (4, 'Certified Analytics Professional', 'Institute for Operations Research and the Management Sciences', '2020-01-01', '2023-01-01');
INSERT INTO CV_EXPERIENCES (cv_id, job_title, company_name, description) VALUES (4, 'Data Analyst Intern', 'Facebook', 'Analyzed user engagement data to identify trends and opportunities for improvement.');
INSERT INTO CV_REFERENCES (cv_id, name, relationship, phone_number, email) VALUES (4, 'Jane Doe', 'Former Supervisor', '555-555-5678', 'jane.doe@email.com');

-- E00009
INSERT INTO CV (employee_id, position, additional_information) VALUES ('E00009', 'Data Scientist', 'I am a data scientist with experience in machine learning and data visualization using Python.');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (5, 'Python'), (5, 'Machine Learning'), (5, 'Data Visualization');
INSERT INTO CV_DEGREES (cv_id, degree_name, school_name, date_obtained) VALUES (5, 'PhD in Statistics', 'University of Chicago', '2022-05-30');
INSERT INTO CV_CERTIFICATES (cv_id, certificate_name, issuing_organization, date_obtained, expiration_date) VALUES (5, 'Microsoft Certified: Azure AI Engineer Associate', 'Microsoft', '2021-08-01', '2024-08-01');
INSERT INTO CV_EXPERIENCES (cv_id, job_title, company_name, description) VALUES (5, 'Data Scientist', 'IBM', 'Developed machine learning models to predict customer churn.');
INSERT INTO CV_REFERENCES (cv_id, name, relationship, phone_number, email) VALUES (5, 'John Smith', 'Former Supervisor', '555-555-1234', 'john.smith@email.com');

INSERT INTO CV (employee_id, position, additional_information) VALUES ('E00010', 'Web Developer', 'I am a web developer with experience in JavaScript, React, and Node.js.');
INSERT INTO CV_SKILLS (cv_id, skills_name) VALUES (6, 'JavaScript'), (6, 'React'), (6, 'Node.js');
INSERT INTO CV_DEGREES (cv_id, degree_name, school_name, date_obtained) VALUES (6, 'Bachelor of Science in Computer Science', 'Massachusetts Institute of Technology', '2021-06-15');
INSERT INTO CV_CERTIFICATES (cv_id, certificate_name, issuing_organization, date_obtained, expiration_date) VALUES (6, 'Oracle Certified Professional, Java SE 11 Developer', 'Oracle', '2020-03-01', '2023-03-01');
INSERT INTO CV_EXPERIENCES (cv_id, job_title, company_name, description) VALUES (6, 'Web Developer', 'Amazon', 'Developed and maintained e-commerce websites.');
INSERT INTO CV_REFERENCES (cv_id, name, relationship, phone_number, email) VALUES (6, 'Jane Doe', 'Former Supervisor', '555-555-5678', 'jane.doe@email.com');


CREATE USER IF NOT EXISTS 'Kiet'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON *.* TO 'Kiet'@'localhost' WITH GRANT OPTION;