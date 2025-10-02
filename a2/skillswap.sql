-- Run only if the database is NOT already created
-- Host: localhost
-- For Jacob 5 use export data as described in the "Exporting a table to RMIT SQL Server" document
-- This script creates users and skills tables

-- Create the SkillSwap database
CREATE DATABASE IF NOT EXISTS skillswap
DEFAULT CHARACTER
SET utf8mb4
DEFAULT
COLLATE utf8mb4_unicode_ci;
USE skillswap;


-- Skills table
CREATE TABLE IF NOT EXISTS skills
(
skill_id     INT AUTO_INCREMENT PRIMARY KEY,
title        VARCHAR(150)  NOT NULL,
description  TEXT          NOT NULL,
category     VARCHAR(50),
image_path   VARCHAR(255),                          
rate_per_hr  DECIMAL(8,2)  NOT NULL,
level        ENUM('Beginner','Intermediate','Expert') NOT NULL DEFAULT 'Intermediate',
created_at   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT IGNORE INTO skills 
(title, description, category, image_path, rate_per_hr, level)
VALUES
('Beginner Guitar Lessons', 'An introduction to guitar covering, but not limited to; basic music theory, chords, basic finger picking styles, and strumming patterns.', 'Music', 'assets/images/skills/1.png', 30.00, 'Beginner'),
('Intermediate Fingerstyle', 'Get ready to learn a new style of guitar playing practiced by classical musicians from the old ages.', 'Music', 'assets/images/skills/2.png', 45.00, 'Intermediate'),
('Artisan Bread Baking', 'Learn to bake like the French in this intensive learner-friendly class on how to make the crispiest and tastiest loaves of bread.', 'Cooking', 'assets/images/skills/3.png', 25.00, 'Beginner'),
('French Pastry Making', 'From Macarons to Croissants. In this expert class, you will refine your skills on the technically difficult methods used to make fine desserts and pastries.', 'Cooking', 'assets/images/skills/4.png', 50.00, 'Expert'),
('Watercolour Basics', 'Explore the bright and vibrant world of art through the medium of delicate and calming water-coloured paints. You will learn how to adhere to form, applying the correct amount of pigment and colour theory.', 'Art', 'assets/images/skills/5.png', 20.00, 'Intermediate'),
('Digital Illustration with Procreate', 'Start learning to use your creative skills digitally by drawing with procreate, a computer program that allows you to draw using a mouse or drawing pad.', 'Art', 'assets/images/skills/6.png', 40.00, 'Intermediate'),
('Morning Vinyasa Flow', 'Prepare for your day in a calming and relaxing way with this short, intensive Vinyasa Flow class. Stretch away your morning sleepiness.', 'Wellness', 'assets/images/skills/7.png', 35.00, 'Intermediate'),
('Intro to PHP & MySQL', 'Begin to learn the backbone skills of modern web programming by coding in PHP and storing data using SQL databases.', 'Programming', 'assets/images/skills/8.png', 50.00, 'Expert');