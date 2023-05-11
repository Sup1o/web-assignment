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

-- CREATE TABLE IF NOT EXISTS CV_WORK_HISTORY (
--   id VARCHAR(10) PRIMARY KEY NOT NULL,
--   cv_experience_id VARCHAR(10),
--   task_description TEXT,
--   FOREIGN KEY (cv_experience_id) REFERENCES CV_EXPERIENCE(CV_id)
-- );

-- CREATE TABLE IF NOT EXISTS CV_WORK_HISTORY (
--   id VARCHAR(10) PRIMARY KEY NOT NULL,
--   cv_experience_id VARCHAR(10),
--   task_description TEXT,
--   FOREIGN KEY (cv_experience_id) REFERENCES CV_EXPERIENCE(CV_id)
-- );

CREATE TABLE IF NOT EXISTS CV_REFERENCES (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  cv_id INT,
  name VARCHAR(20),
  relationship VARCHAR(20),
  phone_number VARCHAR(20),
  email VARCHAR(20),
  FOREIGN KEY (cv_id) REFERENCES CV(id) ON DELETE CASCADE
);

INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address)
VALUES ('E00001', 'Nguyen Van A', 'Pananasonic@example.com', '$2y$10$7n4fsf.SxafgEgrBssLMEeFf3p0..yRZSomEs9RlSu6itoeJy1o8y', '123-456-7890', 'Pananasonics Corp', '1234567890', 'Ha Noi', '123 Hang Buom St');

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