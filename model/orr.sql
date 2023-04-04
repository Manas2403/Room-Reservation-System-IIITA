SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
    AUTOCOMMIT = 0;
START TRANSACTION
    ;
SET
    time_zone = "+00:00";
    --

    -- Database: `orr`
    --

    -- Room location building
CREATE TABLE `location`(
    `id` INT(11) NOT NULL,
    `name` VARCHAR(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into location table
INSERT INTO `location`(`id`, `name`)
VALUES(1, 'CC1'),(2, 'CC2'),(3, 'CC3'),(4, 'Lecture Theatre');
-- Room required for which type of exam
CREATE TABLE `roomtype`(
    `id` INT(11) NOT NULL,
    `typename` VARCHAR(10) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into roomtype table
INSERT INTO `roomtype`(`id`, `typename`)
VALUES(1, 'Theory'),(2, 'Lab'),(3, 'Practical');
-- Room details
CREATE TABLE `classroom`(
    `id` INT(11) NOT NULL,
    `roomname` VARCHAR(10) NOT NULL,
    `typeid` INT(11) NOT NULL,
    `locationid` INT(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into classroom table
INSERT INTO `classroom`(
    `id`,
    `roomname`,
    `typeid`,
    `locationid`
)
VALUES(4, '5106', 1, 3),(5, '5107', 1, 3),(6, '5155', 2, 2),(7, '5007', 2, 2),(8, '5006', 2, 3),(9, '5202', 2, 3);
-- Course details
CREATE TABLE `course`(
    `id` INT(11) NOT NULL,
    `coursename` TEXT NOT NULL,
    `deptid` INT(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into course table
INSERT INTO `course`(`id`, `coursename`, `deptid`)
VALUES(1, 'DAA', 1),(2, 'DBMS', 3),(3, 'FEE', 2),(4, 'Data Structure', 1),(5, 'OS', 2);
-- Department details
CREATE TABLE `department`(
    `id` INT(11) NOT NULL,
    `deptname` VARCHAR(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into department table
INSERT INTO `department`(`id`, `deptname`)
VALUES(1, 'IT'),(2, 'ECE'),(3, 'MBA'),(4, 'PHD');
-- User details
CREATE TABLE `user`(
    `id` INT(11) NOT NULL,
    `username` VARCHAR(20) NOT NULL,
    `fullname` VARCHAR(100) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    `password` TEXT NOT NULL,
    `phone` VARCHAR(30) NOT NULL,
    `status` TINYINT(1) DEFAULT NULL,
    `type` INT(11) NOT NULL DEFAULT '2',
    `createdat` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deptid` INT(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into user table
INSERT INTO `user`(
    `id`,
    `username`,
    `fullname`,
    `email`,
    `password`,
    `phone`,
    `status`,
    `type`,
    `createdat`,
    `deptid`
)
VALUES(
    5,
    '123-45678-1',
    'Soumyadev Maity',
    'soumyadev@iiita.ac.in',
    '202cb962ac59075b964b07152d234b70',
    '8054516259',
    1,
    1,
    '2023-04-03 02:33:35',
    4
),(
    6,
    '16-31237-1',
    'Sourav Das',
    'sourav@iiita.ac.in',
    '202cb962ac59075b964b07152d234b71',
    '8054516258',
    1,
    1,
    '2023-04-03 02:33:35',
    1
),(
    7,
    '16-31238-1',
    'Junaid Alam',
    'junaid@iiita.ac.in',
    '202cb962ac59075b964b07152d234b72',
    '8054516257',
    1,
    2,
    '2023-04-03 02:33:35',
    2
);
-- Booking details
CREATE TABLE `booking`(
    `id` INT(11) NOT NULL,
    `userid` INT(11) NOT NULL,
    `classid` INT(11) NOT NULL,
    `courseid` INT(11) NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `date` DATE NOT NULL,
    `description` TEXT NOT NULL,
    `starttime` VARCHAR(10) NOT NULL,
    `endtime` VARCHAR(10) NOT NULL,
    `cancelledby` VARCHAR(30) DEFAULT NULL,
    `addedby` VARCHAR(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into booking table
INSERT INTO `booking`(
    `id`,
    `userid`,
    `classid`,
    `courseid`,
    `status`,
    `date`,
    `description`,
    `starttime`,
    `endtime`,
    `cancelledby`,
    `addedby`
)
VALUES(
    1,
    5,
    5,
    1,
    0,
    '2023-04-03',
    'Busy',
    '8:00',
    '11:00',
    '123-45678-1',
    '123-45678-1'
),(
    3,
    6,
    6,
    2,
    0,
    '2023-04-03',
    'Sick',
    '12:30',
    '2:00',
    '16-31237-1',
    '16-31237-1'
),(
    4,
    7,
    7,
    3,
    0,
    '2023-04-03',
    'Unavailable',
    '8:00',
    '10:00',
    '16-31237-1',
    '123-45678-1'
),(
    5,
    6,
    8,
    4,
    0,
    '2023-04-03',
    'I have a meeting',
    '10:00',
    '12:00',
    '123-45678-1',
    '123-45678-1'
);
-- primary key for location table
ALTER TABLE
    `location` ADD PRIMARY KEY(`id`);
    -- primary key for booking table
ALTER TABLE
    `booking` ADD PRIMARY KEY(`id`),
    ADD KEY `userid`(`userid`),
    ADD KEY `classid`(`classid`),
    ADD KEY `courseid`(`courseid`);
    -- primary key for classroom table
ALTER TABLE
    `classroom` ADD PRIMARY KEY(`id`),
    ADD KEY `typeid`(`typeid`),
    ADD KEY `locationid`(`locationid`);
    -- primary key for course table
ALTER TABLE
    `course` ADD PRIMARY KEY(`id`),
    ADD KEY `deptid`(`deptid`);
    -- primary key for department table
ALTER TABLE
    `department` ADD PRIMARY KEY(`id`);
    -- primary key for roomtype table
ALTER TABLE
    `roomtype` ADD PRIMARY KEY(`id`);
    -- primary key for user table
ALTER TABLE
    `user` ADD PRIMARY KEY(`id`),
    ADD UNIQUE KEY `username`(`username`),
    ADD KEY `deptid`(`deptid`);
    -- Auto-increment allows a unique number to be generated automatically when a new record is inserted into a table.
    -- auto increment for location table
ALTER TABLE
    `location` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 8;
    -- auto increment for booking table
ALTER TABLE
    `booking` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;
    -- auto increment for classroom table
ALTER TABLE
    `classroom` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 14;
    -- auto increment for course table
ALTER TABLE
    `course` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;
    -- auto increment for department table
ALTER TABLE
    `department` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;
    -- auto increment for roomtype table
ALTER TABLE
    `roomtype` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;
    -- auto increment for user table
ALTER TABLE
    `user` MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 36;
    -- foreign key constraints for booking table
ALTER TABLE
    `booking` ADD CONSTRAINT `FK_Booking_1` FOREIGN KEY(`courseid`) REFERENCES `course`(`id`),
    ADD CONSTRAINT `FK_Booking_2` FOREIGN KEY(`userid`) REFERENCES `user`(`id`),
    ADD CONSTRAINT `FK_Booking_3` FOREIGN KEY(`classid`) REFERENCES `classroom`(`id`);
    -- foreign key constraints for classroom table
ALTER TABLE
    `classroom` ADD CONSTRAINT `FK_Classroom_1` FOREIGN KEY(`typeid`) REFERENCES `roomtype`(`id`),
    ADD CONSTRAINT `FK_Classroom_2` FOREIGN KEY(`locationid`) REFERENCES `location`(`id`);
    -- foreign key constraints for course table
ALTER TABLE
    `course` ADD CONSTRAINT `FK_Course_1` FOREIGN KEY(`deptid`) REFERENCES `department`(`id`);
    -- foreign key constraints for user table
ALTER TABLE
    `user` ADD CONSTRAINT `FK_User_1` FOREIGN KEY(`deptid`) REFERENCES `department`(`id`);
COMMIT
    ;