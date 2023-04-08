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
-- Room details
CREATE TABLE `classroom`(
    `id` INT(11) NOT NULL,
    `roomname` VARCHAR(10) NOT NULL,
    `locationid` INT(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into classroom table
-- Course details
CREATE TABLE `course`(
    `id` INT(11) NOT NULL,
    `coursename` TEXT NOT NULL,
    `deptid` INT(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into course table

-- Department details
CREATE TABLE `department`(
    `id` INT(11) NOT NULL,
    `deptname` VARCHAR(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into department table

-- User details
CREATE TABLE `user`(
    `username` VARCHAR(20) NOT NULL,
    `fullname` VARCHAR(100) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    `type` INT(11) NOT NULL DEFAULT '2',
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into user table

-- Booking details
CREATE TABLE `booking`(
    `id` INT(11) NOT NULL,
    `userid` VARCHAR(20) NOT NULL,
    `classid` INT(11) NOT NULL,
    `courseid` INT(11) NOT NULL,
    `status` TINYINT(1),
    `date` DATE NOT NULL,
    `description` TEXT NOT NULL,
    `starttime` VARCHAR(10) NOT NULL,
    `endtime` VARCHAR(10) NOT NULL,
    `cancelledby` VARCHAR(30) DEFAULT NULL,
    `addedby` VARCHAR(30) NOT NULL,
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- inserting data into booking table

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
    ADD KEY `locationid`(`locationid`);
    -- primary key for course table
ALTER TABLE
    `course` ADD PRIMARY KEY(`id`),
    ADD KEY `deptid`(`deptid`);
    -- primary key for department table
ALTER TABLE
    `department` ADD PRIMARY KEY(`id`);
    -- primary key for roomtype table
    -- primary key for user table
ALTER TABLE
    `user` ADD PRIMARY KEY(`username`);
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
    -- foreign key constraints for booking table
ALTER TABLE
    `booking` ADD CONSTRAINT `FK_Booking_1` FOREIGN KEY(`courseid`) REFERENCES `course`(`id`),
    ADD CONSTRAINT `FK_Booking_2` FOREIGN KEY(`userid`) REFERENCES `user`(`username`),
    ADD CONSTRAINT `FK_Booking_3` FOREIGN KEY(`classid`) REFERENCES `classroom`(`id`);
    -- foreign key constraints for classroom table
ALTER TABLE
    `classroom` 
    ADD CONSTRAINT `FK_Classroom_2` FOREIGN KEY(`locationid`) REFERENCES `location`(`id`);
    -- foreign key constraints for course table
ALTER TABLE
    `course` ADD CONSTRAINT `FK_Course_1` FOREIGN KEY(`deptid`) REFERENCES `department`(`id`);
    -- foreign key constraints for user table
COMMIT
    ;