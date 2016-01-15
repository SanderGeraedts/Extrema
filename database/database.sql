SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE if exists CONTACT;
DROP TABLE if exists INVOICE;
DROP TABLE if exists PROJECT;
DROP TABLE if exists PROJECT_USERS;
DROP TABLE if exists SPRINT;
DROP TABLE if exists TICKET;
DROP TABLE if exists CP_USER;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE PROJECT(
	Id 					INT(4) 			PRIMARY KEY auto_increment,
	Title				VARCHAR(255)	NOT NULL,
	Description 		LONGTEXT 		NULL
);

CREATE TABLE INVOICE(
	Id					INT(4)			PRIMARY KEY auto_increment,
	ProjectId			INT(4)			NOT NULL,
	Title				VARCHAR(255)	NOT NULL,
	Description 		LONGTEXT		NULL,
	Price				DECIMAL(8,2)	NULL,
	DateSent			DATE 			NULL,
	DateDue				DATE 			NULL,
	Paid				TINYINT(1)		NOT NULL,

	CONSTRAINT			FK_ProjectId1	FOREIGN KEY (ProjectId) REFERENCES PROJECT(Id)
);

CREATE TABLE SPRINT(
	Id					INT(4)			PRIMARY KEY auto_increment,
	ProjectId			INT(4)			NOT NULL,
	Title 				VARCHAR(255)	NOT NULL,
	SprintOrder			INT(3)			NULL,
	TimeSpent			DECIMAL(6,2)	NULL,
	TimeAllocated		DECIMAL(6,2)	NULL,
	Description 		LONGTEXT 		NULL,
	
	CONSTRAINT			FK_ProjectId2	FOREIGN KEY (ProjectId) REFERENCES PROJECT(Id)
);

CREATE TABLE CONTACT(
	Id					INT(4)			PRIMARY KEY auto_increment,
	ProjectId			INT(4)			NULL,
	Name 				VARCHAR(255)	NOT NULL,
	Organisation		VARCHAR(255)	NULL,
	Address				VARCHAR(255)	NULL,
	PhoneNumber			VARCHAR(12)		NULL,
	Email				VARCHAR(255)	NULL,
	Zipcode				VARCHAR(10)		NULL,
	City				VARCHAR(255)	NULL,
	Job					VARCHAR(255)	NOT NULL,

	CONSTRAINT 			FK_ProjectId3	FOREIGN KEY (ProjectId) REFERENCES PROJECT(Id)
);

CREATE TABLE TICKET(
	Id 					INT(4)			PRIMARY KEY auto_increment,
	ProjectId 			INT(4)			NOT NULL,
	ContactId			INT(4)			NULL,
	Title				VARCHAR(255)	NOT NULL,
	Link				VARCHAR(255)	NULL,
	Description 		LONGTEXT 		NULL,
	Fixed				TINYINT(1)		NOT NULL,
	DateSubmitted		DATE 			NOT NULL,

	CONSTRAINT 			FK_ProjectId4	FOREIGN KEY (ProjectId) REFERENCES PROJECT(Id),
	CONSTRAINT 			FK_ContactId1	FOREIGN KEY (ContactId) REFERENCES CONTACT(Id)
);

CREATE TABLE CP_USER(
	Id 					INT(4)			PRIMARY KEY auto_increment,
	ContactId 			INT(4)			NOT NULL,
	Username			VARCHAR(255)	NOT NULL,
	Password			VARCHAR(255)	NOT NULL,

	CONSTRAINT 			FK_ContactId2	FOREIGN KEY (ContactId) REFERENCES CONTACT(Id)
);

CREATE TABLE PROJECT_USERS(
	ProjectId 			INT(4) 			NOT NULL,
	UserId 				INT(4)			NOT NULL,

	PRIMARY KEY(ProjectId, UserId),
	CONSTRAINT 			FK_ProjectId5	FOREIGN KEY (ProjectId) REFERENCES PROJECT(Id),
	CONSTRAINT 			FK_UserId1		FOREIGN KEY (UserId) REFERENCES CP_USER(Id)
);

INSERT INTO PROJECT(Title, Description) VALUES ('VVNBest.nl', 'Voor VVNBest de website maken.');
INSERT INTO PROJECT(Title, Description) VALUES ('PC-Amitie.nl', 'Voor PC Amitie de website maken.');
INSERT INTO PROJECT(Title, Description) VALUES ('Codepanda.nl', 'Mijn eigen website eens een keer afmaken.');

INSERT INTO CONTACT(ProjectId, Name, Organisation, Address, PhoneNumber, Email, Zipcode, City, Job) VALUES (1, 'Rick Willemsen', 'VVNBest', NULL, NULL, 'voorzitter@vvnbest.nl', NULL, NULL, 'CEO');
INSERT INTO CONTACT(ProjectId, Name, Organisation, Address, PhoneNumber, Email, Zipcode, City, Job) VALUES (1, 'Anton Kon', 'VVNBest', NULL, NULL, 'penningmeester@vvnbest.nl', NULL, NULL, 'CFO');
INSERT INTO CONTACT(ProjectId, Name, Organisation, Address, PhoneNumber, Email, Zipcode, City, Job) VALUES (1, 'Jan Geraedts', 'VVNBest', NULL, NULL, 'info@vvnbest.nl', NULL, NULL, 'CONTACT');
INSERT INTO CONTACT(ProjectId, Name, Organisation, Address, PhoneNumber, Email, Zipcode, City, Job) VALUES (2, 'Hans Nillissen', 'PC Amitie', NULL, NULL, 'hansnillissen@outlook.com', NULL, NULL, 'CONTACT');
INSERT INTO CONTACT(ProjectId, Name, Organisation, Address, PhoneNumber, Email, Zipcode, City, Job) VALUES (2, 'Hans Nillissen', 'PC Amitie', NULL, NULL, 'hansnillissen@outlook.com', NULL, NULL, 'CFO');
INSERT INTO CONTACT(ProjectId, Name, Organisation, Address, PhoneNumber, Email, Zipcode, City, Job) VALUES (2, 'Sander Geraedts', 'Code Panda', 'Gebr. de Koninglaan 17', '06-23775102', 'hansnillissen@outlook.com', '5684XH', 'Best', 'MASTER');

INSERT INTO CP_USER(ContactId, Username, Password) VALUES (6, 'admin', 'admin');

INSERT INTO PROJECT_USERS(ProjectId, UserId) VALUES (1, 1);
INSERT INTO PROJECT_USERS(ProjectId, UserId) VALUES (2, 1);
INSERT INTO PROJECT_USERS(ProjectId, UserId) VALUES (3, 1);

INSERT INTO INVOICE(ProjectId, Title, Description, Price, DateSent, DateDue, Paid) VALUES (1, 'Hosting Website', 'Hosting Website', 41.32, '2015-01-19', '2015-02-02', 1);
INSERT INTO INVOICE(ProjectId, Title, Description, Price, DateSent, DateDue, Paid) VALUES (1, 'Perch CMS', 'Perch CMS', 82.65, '2015-06-03', '2015-06-17', 1);
INSERT INTO INVOICE(ProjectId, Title, Description, Price, DateSent, DateDue, Paid) VALUES (2, 'Borg Project', 'Borg Project', 60, '2015-08-27', '2015-09-10', 1);
INSERT INTO INVOICE(ProjectId, Title, Description, Price, DateSent, DateDue, Paid) VALUES (2, 'Ontwerpen Website', 'Ontwerpen Website', 120, '2015-12-12', '2016-01-05', 0);
INSERT INTO INVOICE(ProjectId, Title, Description, Price, DateSent, DateDue, Paid) VALUES (1, 'Hosting Website', 'Hosting Website', 41.32, '2016-01-19', '2016-02-02', 1);

INSERT INTO TICKET(ProjectId, ContactId, Title, Link, Description, Fixed, DateSubmitted) VALUES (1, 2, 'JIJ HEBT ALLES VERNEUKT!!', 'www.fuckyou.com', 'Ow nee laat maar ik heb gewoon verkeerd gelezen als een dickhead die ik ben...', 1, CURDATE());
INSERT INTO TICKET(ProjectId, ContactId, Title, Link, Description, Fixed, DateSubmitted) VALUES (1, 2, 'JIJ HEBT ALLES VERNEUKT!!', 'www.fuckyou.com', 'Ow nee laat maar ik heb gewoon verkeerd gelezen als een dickhead die ik ben...', 0, CURDATE());

INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (1, 'Designfase', 0, 40, 40, 'De designfase');
INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (1, 'Ontwerpfase', 0, 25, 40, 'De designfase');
INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (1, 'Implementeerfase', 0, 0, 40, 'De designfase');

INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (2, 'Designfase', 0, 40, 40, 'De designfase');
INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (2, 'Ontwerpfase', 0, 25, 40, 'De designfase');
INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (2, 'Implementeerfase', 0, 0, 40, 'De designfase');

INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (3, 'Designfase', 0, 40, 40, 'De designfase');
INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (3, 'Ontwerpfase', 0, 25, 40, 'De designfase');
INSERT INTO SPRINT(ProjectId, Title, SprintOrder, TimeSpent, TimeAllocated, Description) VALUES (3, 'Implementeerfase', 0, 0, 40, 'De designfase');