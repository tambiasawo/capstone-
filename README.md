# capstone-

This is a website I designed from scratch for my final year project in school. I did all the backend programming, while someone else did the front end coding. 

The website is used by a patient to upload his medical information into the database ($pat_db) and also by a doctor in order to see the uploaded patient's medical  information. The site is divided into two different categories for easy manourvering by the user. The flow chart shows a breakdown of the website as used by the user. The Word docx contains images of the forms and databases when I first created them. Now the domain no longer exists.

- Index.html:
This is the homepage of the site. It contains both the sign up and log in forms.
- index.php:
This is the php file working behind the forms in index.html
- db_connect.php:
This file connects both the patient's and doctor's db

Doctor Side
- AllPatients.php
this file enables a doctor to see all his patients at once. It searches the doctors db ($doc_db) for patients attached to his name in his row in the db.
- DateSearch.php
enables a doctor to search for a patient by entering the date the patient last updated his/her medical data. The file searches the doctor's row in the db for that date entry
- findpatient.php
enables a doctor to locate his patient's personal&medical info by searching the doctor's DB ($doc_db) for the name entered. Returns the name if found or 'not found' if not found or 'You cannot view this patient's profile because you are not the assigned health practitioner.' if the name is found but has no relationship with the doctor.
- patientinfo.php
enables the doctor to view his patients medical & personal info.
- personalinfo_doc.php
this file displays a doctor's personal profile upon registration


Patient Side
- addDoctor.php
This file enables a patient to add a doctor to his/her list of doctors. 
- Patient_Homepage.php:
Lets a patient see their welcome page and what they can do as a logged in patient
- personalinfo_pat.php
Lets a patient see their personal profile (username,etc).
- upload_func.php
This function makes it possible for a patient to upload their medical info as an image onto the db. IT is included in the next file.
- upload_medical_info.php:
This file lets a patient upload their medical info as an image together with other personal info onto the db





