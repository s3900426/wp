-- Run only if the database is already created
-- Database: skillswap
-- Host: localhost
-- For Jacob 5 use export data as described in the "Exporting a table to RMIT SQL Server" document
-- This script creates a users table and modifies the skills table to include a user_id column 
USE skillswap;

-- Step 1: Create the users table
CREATE TABLE IF NOT EXISTS users (
    user_id     INT AUTO_INCREMENT PRIMARY KEY,
    username    VARCHAR(50)   NOT NULL UNIQUE,
    email       VARCHAR(100)  NOT NULL UNIQUE,
    password    CHAR(60)      NOT NULL,        -- hashed passwords
    bio         TEXT,
    joined_at   DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Step 2: Add user_id column to the existing skills table
ALTER TABLE skills ADD COLUMN user_id INT; 

-- Step 3: Add foreign key constraint
ALTER TABLE skills
ADD CONSTRAINT fk_user_id
FOREIGN KEY (user_id) REFERENCES users(user_id)
ON DELETE CASCADE;

INSERT IGNORE INTO users 
(user_id, username, email, password, bio)
VALUES
(1,"Alice","Alice@server.com","$2y$10$FSGaEn2n/LIlQnvhA8oq/eY8MHYu5Jjs1sj2PhMdVA4vYSH2IM3LG","Hey, my name is Alice and I'm so excited to get you learning.I teach mainly musical classes focusing on stringed instruments such as guitar and bass."),
(2,"Bob","Bob@server.com","$2y$10$FSGaEn2n/LIlQnvhA8oq/eY8MHYu5Jjs1sj2PhMdVA4vYSH2IM3LG","My name is Bob and I am a professional trained chef and baker. If you'd like to learn how to be a better cook and chef I have the lessons for you!"),
(3,"Carol","Carol@server.com","$2y$10$FSGaEn2n/LIlQnvhA8oq/eY8MHYu5Jjs1sj2PhMdVA4vYSH2IM3LG","I'm Carol, a retired primary school art teacher of 30 years. I've come here to offer my skills and interact with the community. My lesson will be very hands on so gte ready to learn."),
(4,"Dave","Dave@server.com","$2y$10$FSGaEn2n/LIlQnvhA8oq/eY8MHYu5Jjs1sj2PhMdVA4vYSH2IM3LG","Dave is the name! I like to do Vinyasa! Will you learn Vinyasa with me! Signup to do Vinyasa with me!"),
(5,"Eve","Eve@server.com","$2y$10$FSGaEn2n/LIlQnvhA8oq/eY8MHYu5Jjs1sj2PhMdVA4vYSH2IM3LG","So you want to learn how to program. Well I'm the best you got. We're gonna be learning so SQL and then so PHP. Thats all i know so can't do much else. Just some basic code.");

INSERT IGNORE INTO skills 
(title, description, category, image_path, rate_per_hr, level, user_id)
VALUES
('Beginner Guitar Lessons', 'An introduction to guitar covering, but not limited to; basic music theory, chords, basic finger picking styles, and strumming patterns.', 'Music', 'assets/images/skills/1.png', 30.00, 'Beginner',1),
('Intermediate Fingerstyle', 'Get ready to learn a new style of guitar playing practiced by classical musicians from the old ages.', 'Music', 'assets/images/skills/2.png', 45.00, 'Intermediate',1),
('Artisan Bread Baking', 'Learn to bake like the French in this intensive learner-friendly class on how to make the crispiest and tastiest loaves of bread.', 'Cooking', 'assets/images/skills/3.png', 25.00, 'Beginner',2),
('French Pastry Making', 'From Macarons to Croissants. In this expert class, you will refine your skills on the technically difficult methods used to make fine desserts and pastries.', 'Cooking', 'assets/images/skills/4.png', 50.00, 'Expert',2),
('Watercolour Basics', 'Explore the bright and vibrant world of art through the medium of delicate and calming water-coloured paints. You will learn how to adhere to form, applying the correct amount of pigment and colour theory.', 'Art', 'assets/images/skills/5.png', 20.00, 'Intermediate',3),
('Digital Illustration with Procreate', 'Start learning to use your creative skills digitally by drawing with procreate, a computer program that allows you to draw using a mouse or drawing pad.', 'Art', 'assets/images/skills/6.png', 40.00, 'Intermediate',3),
('Morning Vinyasa Flow', 'Prepare for your day in a calming and relaxing way with this short, intensive Vinyasa Flow class. Stretch away your morning sleepiness.', 'Wellness', 'assets/images/skills/7.png', 35.00, 'Intermediate',4),
('Intro to PHP & MySQL', 'Begin to learn the backbone skills of modern web programming by coding in PHP and storing data using SQL databases.', 'Programming', 'assets/images/skills/8.png', 50.00, 'Expert',5);