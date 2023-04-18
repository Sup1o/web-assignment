CREATE DATABASE IF NOT EXISTS CVManagement;

USE CVManagement;

CREATE TABLE IF NOT EXISTS EMPLOYER (
  id VARCHAR(6) PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phonenumber VARCHAR(20) NOT NULL,
  company_name VARCHAR(50) NOT NULL,
  tax_number VARCHAR(20) NOT NULL,
  location VARCHAR(100) NOT NULL,
  address VARCHAR(100) NOT NULL
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
  FOREIGN KEY (job_id) REFERENCES JOBS(id)
);

CREATE TABLE IF NOT EXISTS EMPLOYEE (
  id VARCHAR(6) PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phonenumber VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS CV (
  id VARCHAR(10),
  employee_id VARCHAR(6),
  position VARCHAR(20) NOT NULL,
  additional_information TEXT,
  PRIMARY KEY (id, employee_id),
  FOREIGN KEY (employee_id) REFERENCES EMPLOYEE(id)
);

CREATE TABLE IF NOT EXISTS CV_DEGREES (
  CV_id VARCHAR(10),
  degree_name VARCHAR(20),
  PRIMARY KEY (CV_id, degree_name),
  FOREIGN KEY (CV_id) REFERENCES CV(id)
); 

CREATE TABLE IF NOT EXISTS CV_CERTIFICATES (
  CV_id VARCHAR(10),
  certificate_name VARCHAR(20),
  PRIMARY KEY (CV_id, certificate_name),
  FOREIGN KEY (CV_id) REFERENCES CV(id)
); 

CREATE TABLE IF NOT EXISTS CV_EXPERIENCE (
  CV_id VARCHAR(10),
  experience_id VARCHAR(10),
  description TEXT,
  PRIMARY KEY (CV_id, experience_id),
  FOREIGN KEY (CV_id) REFERENCES CV(id)
); 

-- INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address)
-- VALUES ('E00001', 'Nguyen Van A', 'Pananasonic@example.com', '$2y$10$7n4fsf.SxafgEgrBssLMEeFf3p0..yRZSomEs9RlSu6itoeJy1o8y', '123-456-7890', 'Pananasonics Corp', '1234567890', 'Ha Noi', '123 Hang Buom St');

-- INSERT INTO EMPLOYEE (id, name, email, password, phonenumber)
-- VALUES ('E00002', 'Tran Van B', 'VanB@example.com', '$2y$10$CDuYez2WcLtC4eyBKbH2NeToslQFGxnwdtzPLAni7983bTSKTuITu', '123-456-7891');

-- Insert data into JOBS table
INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J001', 'E00001', 'Software Developer', 60000.00, 'Develop software applications and programs.');

INSERT INTO JOBS (id, employer_id, name, salary, description)
VALUES ('J002', 'E00001', 'Web Designer', 45000.00, 'Design and create websites for clients.');

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



CREATE USER IF NOT EXISTS 'kiet'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON *.* TO 'kiet'@'localhost' WITH GRANT OPTION;
