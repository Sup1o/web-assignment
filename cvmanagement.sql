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
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  employer_id INT,
  name VARCHAR(50) NOT NULL,
  salary DECIMAL(10, 2) NOT NULL,
  description TEXT NOT NULL,
  FOREIGN KEY (employer_id) REFERENCES EMPLOYER(id)
);

CREATE TABLE IF NOT EXISTS JOB_REQUIRED_SKILLS (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  job_id INT,
  skill_name VARCHAR(20),
  FOREIGN KEY (job_id) REFERENCES JOBS(id)
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
  employee_id INT,
  position VARCHAR(20) NOT NULL,
  additional_information TEXT,
  FOREIGN KEY (employee_id) REFERENCES EMPLOYEE(id)
);

CREATE TABLE IF NOT EXISTS CV_DEGREES (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cv_id INT,
  degree_name VARCHAR(50) NOT NULL,
  school_name VARCHAR(100) NOT NULL,
  date_obtained DATE NOT NULL,
  FOREIGN KEY (cv_id) REFERENCES CV(id)
);

CREATE TABLE IF NOT EXISTS CV_CERTIFICATES (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cv_id INT,
  certificate_name VARCHAR(50) NOT NULL,
  issuing_organization VARCHAR(100) NOT NULL,
  date_obtained DATE NOT NULL,
  expiration_date DATE,
  FOREIGN KEY (cv_id) REFERENCES CV(id)
);

CREATE TABLE IF NOT EXISTS CV_EXPERIENCE (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cv_id INT,
  job_title VARCHAR(50) NOT NULL,
  company_name VARCHAR(50),
  start_date DATE,
  end_date DATE,
  description TEXT,
  FOREIGN KEY (cv_id) REFERENCES CV(id)
);

CREATE TABLE IF NOT EXISTS CV_WORK_HISTORY (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cv_experience_id INT,
  task_description TEXT,
  FOREIGN KEY (cv_experience_id) REFERENCES CV_EXPERIENCE(id)
);

CREATE TABLE IF NOT EXISTS CV_REFERENCE (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  cv_id INT,
  name VARCHAR(50),
  relationship VARCHAR(50),
  phone_number VARCHAR(20),
  email VARCHAR(100),
  FOREIGN KEY (cv_id) REFERENCES CV(id)
);

INSERT INTO EMPLOYEE (id, name, email, password, phonenumber)
VALUES ('E00002', 'Tran Van B', 'VanB@example.com', '$2y$10$CDuYez2WcLtC4eyBKbH2NeToslQFGxnwdtzPLAni7983bTSKTuITu', '123-456-7891');

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



CREATE USER IF NOT EXISTS 'Kiet'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON *.* TO 'Kiet'@'localhost' WITH GRANT OPTION;