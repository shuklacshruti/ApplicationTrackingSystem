CREATE DATABASE RecruitEase;

CREATE TABLE Candidates (
    CandidateID INT PRIMARY KEY , 
    Name VARCHAR(100), 
    Email VARCHAR(100), 
    Phone VARCHAR(20), 
    Resume TEXT, 
    Notes TEXT, 
    Status ENUM('New', 'InReview', 'Interviewed', 'AppliedForJob', 'Rejected', 'Hired', 'OnHold'), 
    TFFC VARCHAR(255)
);

CREATE TABLE Interviews (
    InterviewID INT PRIMARY KEY , 
    CandidateID INT, 
    InterviewDate DATETIME,
    InterviewType ENUM('Phone', 'InPerson', 'Zoom'), 
    Interviewer VARCHAR(100), 
    Notes TEXT, 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE CandidatesAssesments (
    AssessmentID INT PRIMARY KEY , 
    CandidateID INT, 
    AssessmentDate DATE, 
    Score INT, 
    Comments TEXT, 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE Recruiters (
    RecruiterID INT PRIMARY KEY , 
    Name VARCHAR(100), 
    Email VARCHAR(100), 
    Phone VARCHAR(20), 
    Notes TEXT
);


CREATE TABLE JobPostings (
    JobID INT PRIMARY KEY , 
    JobTitle VARCHAR(100), 
    Description TEXT, 
    Requirements TEXT, 
    DatePosted DATE, 
    DueDate DATE,  
    JobStatus ENUM('Open', 'Closed', 'Filled')
);

CREATE TABLE Applications (
    ApplicationID INT PRIMARY KEY , 
    CandidateID INT, 
    RecruiterID INT,
    JobID INT, 
    DateSubmitted DATETIME, 
    ApplicationStatus ENUM('Submitted', 'UnderReview', 'Rejected', 'Hired'), 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID),
    FOREIGN KEY (JobID) REFERENCES JobPostings(JobID),
    FOREIGN KEY (RecruiterID) REFERENCES Recruiters(RecruiterID)
);

CREATE TABLE HiringDecisions (
    DecisionID INT PRIMARY KEY , 
    CandidateID INT, 
    DecisionDate DATETIME, 
    OfferStatus ENUM('Offered', 'Accepted', 'Declined'), 
    SalaryOffered DECIMAL(10, 2), 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE CandidateSkills (
    SkillsID INT PRIMARY KEY , 
    CandidateID INT,
    SkillName VARCHAR(100), 
    ProficiencyLevel ENUM('Beginner', 'Intermediate', 'Advanced'), 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE CandidateEducation (
    EducationID INT PRIMARY KEY , 
    CandidateID INT, 
    Degree VARCHAR(100),
    Major VARCHAR(100), 
    Institution VARCHAR(255), 
    GraduationYear YEAR, 
    GPA DECIMAL(3,2), 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE CandidateExperience ( 
    ExperienceID INT PRIMARY KEY , 
    CandidateID INT, 
    Company VARCHAR(255), 
    Position VARCHAR(100), 
    StartDate DATE, 
    EndDate DATE, 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE ReferenceChecks (
    ReferenceID INT PRIMARY KEY , 
    CandidateID INT, 
    ReferrerName VARCHAR(255),
    ReferrerEmail VARCHAR(100), 
    Feedback TEXT,
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE DocumentStorage (
    DocumentID INT PRIMARY KEY ,
    CandidateID INT, 
    FileName VARCHAR(255),
    FileType ENUM('PDF', 'Word', 'Text'),
    FileContent BLOB, 
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID)
);

CREATE TABLE EventTracking (
    EventID INT PRIMARY KEY,
    EventType VARCHAR(100),
    EventDate DATETIME,
    CandidateID INT,
    JobID INT,
    Description TEXT,
    FOREIGN KEY (CandidateID) REFERENCES Candidates(CandidateID),
    FOREIGN KEY (JobID) REFERENCES JobPostings(JobID),
    FOREIGN KEY (RecruiterID) REFERENCES Recruiters(RecruiterID)
);

CREATE TABLE Users (
    UserID INT PRIMARY KEY ,
    Username VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(255)
);

-- data 
-- Candidates 
INSERT INTO Candidates (Name, Email, Phone, Resume, Notes, Status, TFFC) VALUES
('John Doe', 'johnd@gmail.com', '123-456-7890', 'Lorem ipsum', 'Some notes about John', 'New', 'open to move for work'),
('Alice Johnson', 'alice@gmail.com', '456-789-0123', 'Lorem ipsum', 'Some notes about Alice', 'InReview', ''),
('Bob Brown', 'bob@gmail.com', '789-012-3456', 'Lorem ipsum', 'Some notes about Bob', 'Interviewed', ''),
('Emily Davis', 'emilyDavis@gmail.com', '321-654-9870', 'Lorem ipsum', 'Some notes about Emily', 'AppliedForJob', ''),
('Jane Smith', 'smithjane@gmail.com', '987-654-3210', 'Lorem ipsum', 'Some notes about Jane', 'New', '');

-- Interviews
INSERT INTO Interviews (CandidateID, InterviewDate, InterviewType, Interviewer, Notes) VALUES
(1, '2024-03-01 10:00:00', 'Phone', 'Recruiter 1', 'Notes about the phone interview with John'),
(2, '2024-03-02 14:00:00', 'InPerson', 'Recruiter 2', 'Notes about the in-person interview with Alice'),
(3, '2024-03-03 11:30:00', 'Zoom', 'Recruiter 1', 'Notes about the Zoom interview with Bob'),
(4, '2024-03-04 09:00:00', 'Phone', 'Recruiter 2', 'Notes about the phone interview with Emily'),
(5, '2024-03-05 15:00:00', 'InPerson', 'Recruiter 1', 'Notes about the in-person interview with Jane');

-- CandidatesAssesments
INSERT INTO CandidatesAssesments (CandidateID, AssessmentDate, Score, Comments) VALUES
(1, '2024-03-01', 85, 'Good communication skills'),
(2, '2024-03-02', 90, 'Strong technical knowledge'),
(3, '2024-03-03', 75, 'Needs improvement in teamwork'),
(4, '2024-03-04', 80, 'Analytical skills are impressive'),
(5, '2024-03-05', 95, 'Excellent problem-solving abilities');

-- Recruiters
INSERT INTO Recruiters (Name, Email, Phone, Notes) VALUES
('Recruiter 1', 'recruiter1@example.com', '111-222-3333', 'Notes about Recruiter 1'),
('Recruiter 2', 'recruiter2@example.com', '444-555-6666', 'Notes about Recruiter 2');

-- JobPostings
INSERT INTO JobPostings (JobTitle, Description, Requirements, DatePosted, DueDate, JobStatus) VALUES
('Software Engineer', 'Description of software engineer job', 'Requirements for software engineer job', '2024-02-15', '2024-03-15', 'Open'),
('Data Analyst', 'Description of data analyst job', 'Requirements for data analyst job', '2024-02-20', '2024-03-20', 'Open');

-- Applications
INSERT INTO Applications (CandidateID, RecruiterID, JobID, DateSubmitted, ApplicationStatus) VALUES
(1, 1, 1, '2024-02-25 08:30:00', 'UnderReview'),
(2, 2, 1, '2024-02-26 10:45:00', 'Submitted'),
(3, 1, 2, '2024-02-27 13:15:00', 'UnderReview'),
(4, 2, 2, '2024-02-28 09:30:00', 'Submitted'),
(5, 1, 1, '2024-02-29 14:00:00', 'UnderReview');

-- HiringDecisions
INSERT INTO HiringDecisions (CandidateID, DecisionDate, OfferStatus, SalaryOffered) VALUES
(1, '2024-03-01 10:00:00', 'Offered', 80000),
(2, '2024-03-02 11:30:00', 'Declined', NULL),
(3, '2024-03-03 13:45:00', 'Offered', 75000),
(4, '2024-03-04 15:00:00', 'Offered', 70000),
(5, '2024-03-05 16:30:00', 'Declined', NULL);

-- CandidateSkills
INSERT INTO CandidateSkills (CandidateID, SkillName, ProficiencyLevel) VALUES
(1, 'Java', 'Intermediate'),
(2, 'SQL', 'Advanced'),
(3, 'Python', 'Beginner'),
(4, 'JavaScript', 'Intermediate'),
(5, 'Data Analysis', 'Advanced');

-- CandidateEducation
INSERT INTO CandidateEducation (CandidateID, Degree, Major, Institution, GraduationYear, GPA) VALUES
(1, 'Bachelor of Science', 'Computer Science', 'University A', 2022, 3.5),
(2, 'Master of Business Administration', 'Finance', 'University B', 2020, 3.8),
(3, 'Bachelor of Arts', 'English', 'University C', 2023, 3.2),
(4, 'Bachelor of Science', 'Computer Science', 'University D', 2021, 3.6),
(5, 'Master of Science', 'Data Science', 'University E', 2019, 3.9);

-- CandidateExperience
INSERT INTO CandidateExperience (CandidateID, Company, Position, StartDate, EndDate) VALUES
(1, 'Company A', 'Software Engineer', '2022-01-01', '2024-02-01'),
(2, 'Company B', 'Data Analyst', '2018-03-01', '2021-05-01'),
(3, 'Company C', 'Writer', '2023-06-01', NULL),
(4, 'Company D', 'Web Developer', '2021-07-01', '2023-09-01'),
(5, 'Company E', 'Data Scientist', '2019-08-01', '2022-10-01');

-- ReferenceChecks
INSERT INTO ReferenceChecks (CandidateID, ReferrerName, ReferrerEmail, Feedback) VALUES
(1, 'Reference 1', 'ref1@example.com', 'Positive feedback about John'),
(2, 'Reference 2', 'ref2@example.com', 'Strong recommendation for Alice'),
(3, 'Reference 3', 'ref3@example.com', 'Neutral feedback for Bob'),
(4, 'Reference 4', 'ref4@example.com', 'Highly recommended for Emily'),
(5, 'Reference 5', 'ref5@example.com', 'Good communication skills for Jane');

-- DocumentStorage
INSERT INTO DocumentStorage (CandidateID, FileName, FileType, FileContent) VALUES
(1, 'Resume_John_Doe.pdf', 'PDF', 'BinaryData1'),
(2, 'Resume_Alice_Johnson.pdf', 'PDF', 'BinaryData2'),
(3, 'Resume_Bob_Brown.pdf', 'PDF', 'BinaryData3'),
(4, 'Resume_Emily_Davis.pdf', 'PDF', 'BinaryData4'),
(5, 'Resume_Jane_Smith.pdf', 'PDF', 'BinaryData5');

-- EventTracking
INSERT INTO EventTracking (EventType, EventDate, CandidateID, JobID, Description) VALUES
('ApplicationSubmitted', '2024-02-25 08:30:00', 1, 1, 'John Doe applied for Software Engineer position'),
('ApplicationSubmitted', '2024-02-26 10:45:00', 2, 1, 'Alice Johnson applied for Software Engineer position'),
('ApplicationSubmitted', '2024-02-27 13:15:00', 3, 2, 'Bob Brown applied for Data Analyst position'),
('ApplicationSubmitted', '2024-02-28 09:30:00', 4, 2, 'Emily Davis applied for Data Analyst position'),
('ApplicationSubmitted', '2024-02-29 14:00:00', 5, 1, 'Jane Smith applied for Software Engineer position');

-- Users
INSERT INTO Users (Username, Email, Password) VALUES
('user1', 'user1@example.com', 'password1'),
('user2', 'user2@example.com', 'password2'),
('user3', 'user3@example.com', 'password3');
