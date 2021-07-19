Visit this website to handle valet and other things for php (https://dev.to/ibrarturi/mac-m1-setup-for-local-development-with-laravel-valet-2lmk)


Design a simple 'Blood bank' web application.

Assume you are designing a real-life system, that will be used by real users.

The application should contain 2 types of users: 
Hospitals and Receivers 

Pages to be developed-

1. ‘Registration’ pages - Different registration pages for hospitals & receivers. Capture receiver’s blood
group during registration. 
(done)

2. ‘Login’ pages - Single/different login pages for hospitals & receivers. 
(done)

3. Hospital ‘Add blood info’ page - A hospital, once logged in, should be able to add details of available
blood samples (along with type) to their bank. Access to this page should be restricted only to hospitals.


4. ‘Available blood samples’ page - There should be a page that displays all the available blood samples
along with which hospital has them and a ‘Request Sample’ button. This page should be accessible to
everyone, irrespective of whether the user is logged in or not. Expected functionality on click of the
'Request Sample' button- Only receivers should be able to request for blood samples by clicking the
‘Request Sample’ button. Make sure that only those receivers who are eligible for the blood sample are
allowed to click the button. If the user is not logged in, then he/she should be redirected to the login
page. If a user is logged in as a hospital, then the user should not be allowed to request for a blood
sample.

5. Hospital ‘View requests’ page - Hospitals should be able to see the list of all the receivers who have
requested a particular blood group from its blood bank.

Technologies:
Please write the front-end in HTML/CSS/JS. You may use Bootstrap if you wish.
Please write the backend in either core PHP or PHP Codeigniter framework.
Use MySQL as the database.

Mainly, we want you to concentrate on the following things:
Neat & simple design Good database architecture Good coding practices (write readable, modular code)
How to send:
Please zip the assignment, upload on google drive and share the (publicly accessible) google drive link
only. Please make sure you include the SQL file so that we can replicate your database.


What I have to do:
-validating inputs for sign up of hospital
- connect to the mysql server whenever someone signs up for hospital.
INSERT INTO `Users` (`Name`, `email`, `password`) VALUES ('Rishabh', 'rishabh.sharma@gmail.com', 'abc123abc');