![Brand Logo](https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/blob/master/public_html/images/logo.jpg)

# Table of Contents  
- [Group](#group)
- [Specifications document](https://moodlecurrent.gre.ac.uk/pluginfile.php/1462970/mod_resource/content/11/CW_COMP1640_1920.pdf)
- [Example Report](https://moodlecurrent.gre.ac.uk/pluginfile.php/1463112/mod_resource/content/1/enterprise%20group%20report%20new%20.pdf)
- [Google Drive](https://drive.google.com/drive/u/0/folders/1GQoqBhNVXk_yFTkNl_QnNDmkUuhcpDkE)
- [Kanban Board](https://trello.com/b/xC7CBjBU/coursework-board)
- [Architecture](#architecture)
- [Meetings](#meetings)

# Group
## Group Name 
      CAD (Control Alt Delete)
      
## Participants 
| Name | Email | Role(s)
| --- | --- | --- |
|     Natalia	Flindall    |	nf7797t@gre.ac.uk |     Information Architecture Lead / Engineer
|     Aleksandrs	Krivickis	|     ak7993g@gre.ac.uk |     Scrum Master / Engineer
|     Jake	Marchant	|     jm1727g@gre.ac.uk |     Product Owner / Engineer / Designer
|     Nisheeka	Nynan |     nn1459j@gre.ac.uk |     Test Lead / Engineer / Front-end
|     Sam	Town	|     st2645h@gre.ac.uk |     Data Architect / Engineer
|     James	Dodd  |	jd9865y@gre.ac.uk |     Data Architect / Engineer
|     Anirudhan	Anbuchezhian      |	aa0854y@gre.ac.uk |     Engineer / Front-end
|     Johan	Rodriguez Garcia	|     jr3007p@gre.ac.uk |     Engineer / Front-end

# Project credentials

## University Account
      st2645h
      Enterprise94

## HTTP
http://enterprisecw.co.uk

## FTP Access
      host: ftp.voltafy.co.uk
      user: ftphost@enterprisecw.co.uk
      password: 64754742
      port: 21
      
# Architecture
## Core components
    * Log-in and navigation
    * View, comment, thumbsup ideas, pagination
    * Idea submission (for academic and support roles)
    * Idea Category Administration (for QA Manager)
    * Notification engine
    * View with list top ideas, Most Viewed Ideas, Latest Ideas and Latest Comments - alternative to Index.php
    * CSV file export, uploaded document export in zip file for QA manager
    * Administrator panel - is needed to maintain any system data, e.g. closure dates for each academic year, staff details.
    * Analytics page (Statistical analysis)
  
## Project Architecture Diagram
https://www.lucidchart.com/invitations/accept/9385d2e1-63b3-4135-a64c-ac0a94b906e0
![Architecture diagram](https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/blob/master/documentation/Architecture.jpeg)

## Data Archirtecture (ERD)
https://www.lucidchart.com/documents/edit/e21ec631-0069-4916-8132-37b8631b7e27/CmEtv3hlvse.
![ERD](https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/blob/master/documentation/Database%20-%20ERD5.jpeg)

## Information Architecture Sketch
https://k23tr4.axshare.com/#id=6kr2iu&p=login_register - Desktop prototype
https://jagx9j.axshare.com/#id=6kr2iu&p=login_register - Mobile prototype
![Information Architecture](https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/blob/master/documentation/information%20architecture.jpg)


# Meetings
## 24/01/2020 2-4 PM
  Initial planning where we have discussed and agreed on:
### 1. Technology stack
    PHP, MySQL, Bootstrap
### 2. Roles within the team:
      * Database Designer - James Dodd, Sam Town
      * Information Architecture Lead - Nathalie Findall
      * Product Owner - Jake Merchant
      * Scrum Master - Aleksandrs Krivickis
      * Programmer - everyone
      * Web Designer - everyone
      * Tester - everyone
### 3. Core Architecture depicted in one of the chapters above
### 4. VCS - GIt
  https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/
### 5. Kanban
  Trello https://trello.com/b/xC7CBjBU/coursework-board
### 6. Communication lines 
  Whatsapp group
  Emails
### 7. Product specification items were collectively voted by MOSCOW principle (see attachments)
### 8. Product specification was split into backlog items with further voting using Scrum Poker technique (see trello board)
### 9. List of uncertainties was created to be further clarified between Prodcut Owner and the customer
      - quality assurance manager - what is their role, what do they do
      - admin features - posts, comments, users - able to add, edit, delete
      - Test plan - we're planning to do TDD so should our test plan discuss TDD and how we plan
      on testing the system
### 10. Next sprint deliverables disucssed and their owners identified
  * Database design
  * System architecture design
  * Website design sketch
  * Implement scrum methods
### 11. Team name
   CTRL ALT DELETE (CAD)
   
### 12. Must have / Can have
![MHCH-P1](https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/blob/master/documentation/WhatsApp%20Image%202020-01-24%20at%203.22.36%20PM.jpeg)
![MHCH-P1](https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/blob/master/documentation/WhatsApp%20Image%202020-01-24%20at%203.22.36%20PM%20(1).jpeg)

## 31/01/2020 2-4 PM
### Attendance 
All attended

### Retrospective
      Database Design - James and Sam
      Website design sketch - Nathalie Findall, Nyneka Ninan
      System Architecture Design - Aleksandrs Krivickis
      Implement Agile Scrum - Aleksandrs Krivickis
      Create Github Repository - Aleksandrs Krivickis
      Create Hosting, SQL, FTP - Jake Merchant
      Logo design - Jake Mercchant
### New members onboarding
      Johan Rodriguez Garcia - back-end developer
      Anirudhan Anbuchezhian - back-end developer

### Work breakdown for next sprint
      
      Start front end design of all views and design sketch for mobile - Nathalie, Nisheeka Nynan
      Establish database connection and create a CRUD class - Sam Town, James Dodd
      Legal, ethical research into database design - Sam Town, James Dodd
      Establish database connection - Jake Merchant
      Log-in and registration page -  Johan Rodriguez Garcia and Nisheeka Nynan
      Test plan for login and registration - Nisheeka Nynan
      Idea submission - Anirudhan Anbuchezhian, Aleksandrs Krivickis
      Burndown chart - Aleksandrs
      Organise Scrum board and charts - Aleksandrs
      Go through example report and create additional cards - Jake
      
### Assumptions 
      - We store customer's email, whilst in real system we have it readily available

### Questions asked from / answered by a customer
      quality assurance manager/quality assurance coordinator - what is their role, what do they do: 
      QAM controls the forums, QAC controls the forums for their specific department, only QAM can set closure dates for forums and only QAM can view reports

      admin features: 
      Admins can basically manage the database through a UI without having access to the actual DB, so they can edit and remove ideas, comments etc. matt also suggested being able to suspend and ban users.

      are the roles unique, so can you be a qam and a qac as well as an admin, or can you only be one:
      You can only be one of those roles.

      what are academic and support roles, and what are the differences (if any):
      What he means by this is that all staff in a university can use this forum, not just lecturers, so you need to consider IT Support, Security etc.

      Test plan: 
      as we're doing TDD, just log evidence of your testing, maybe we can also implement peer review into this too? that could form the definition of done for us.

      is the closure date for a forum always set the same, or can it be set manually:
      He said make a reasonable assumption here, so my suggestion is having the QAM set the closure date for new ideas when they set the forum (which they can extend if needed) and then the QAM does final closure manually.

      is it okay to store emails in registration in order to get the email notifications working:
      Yes, as long as we justify why we have done this in our report.      
      
### Design sketch demonstration to the customer
      We have proposed two design prototypes (By Nisheeka Nynan and Nathalie), Nathalie's design was selected by the team as the most suitable one for demonstration to the custimer. - accepted
      
      
## 07/02/2020 2-3 PM
### Attendance 
      Full attendance, Sam Town - over video conference (ideal scrum)

### Retrospective
#### Tickets not closed:
      Web Designer - Implement Design for Mobile views - Registration and Login - bug with switching from login view to registration view
      Web Designer - Implement Design for Mobile views - Registration and Login - same bug as above
      Scrum Master - Burndown Chart - standalone tools that come with trello fail/refuse to deliver burndown chart for free, looking for a workaround
#### Successfully closed:
      Product Owner - analyse project's example report, create report skeleton
      Web Designer - Implement mobile website design sketch
      Web Designer - Implement website design sketch
      Database Designer - Database CRUD class
      Build database - Sam and James
      Engineer - Log In and Registration
      Web Designer - Log In and Registration - 5
      Tester - Implement Test Plan for login, registration and idea submission
      Database Designer - Legal and Ethical research for Database Design
      Scrum Master - Breakdown work into more detailed stories and prepare for next meeting
      
### Work breakdown for next sprint
      
### Things clarified with the customer 
      Customer wants to see most popular posts with most popular comments on the index.php page 
      
