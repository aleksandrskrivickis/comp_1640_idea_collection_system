# Table of Contents  
- [Group](#group)
- [Specifications document](https://moodlecurrent.gre.ac.uk/pluginfile.php/1462970/mod_resource/content/11/CW_COMP1640_1920.pdf)
- [Google Drive](https://drive.google.com/drive/u/0/folders/1GQoqBhNVXk_yFTkNl_QnNDmkUuhcpDkE)
- [Kanban Board](https://trello.com/b/xC7CBjBU/coursework-board)
- [Data Architecture (ERD)](https://www.lucidchart.com/documents/edit/e21ec631-0069-4916-8132-37b8631b7e27/tuArPCv54ECH)
- [Architecture](#architecture)
- [Meetings](#meetings)

# Group
## Group Name 
      CAD (Control Alt Delete)

| Command | Description |
| --- | --- |
| git status | List all new or modified files |
| git diff | Show file differences that haven't been staged |

## Participants 
|Natalia	Flindall    |	nf7797t@gre.ac.uk
|Aleksandrs	Krivickis	|     ak7993g@gre.ac.uk
|Jake	Marchant	|     jm1727g@gre.ac.uk
|Nisheeka	Nynan |     nn1459j@gre.ac.uk
|Sam	Town	|     st2645h@gre.ac.uk
|James	Dodd  |	jd9865y@gre.ac.uk
|Anirudhan	Anbuchezhian      |	aa0854y@gre.ac.uk
|Johan	Rodriguez Garcia	|     jr3007p@gre.ac.uk

# Project credentials
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
## Architecture diagram
![Architecture diagram](https://github.com/aleksandrskrivickis/comp_1640_idea_collection_system/blob/master/documentation/Architecture.jpeg)


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
      Database Design Bit - James and Sam
      Website design sketch - Nathalie Findall, Nyneka Ninan
      System Architecture Design - Aleksandrs Krivickis
      Implement Agile Scrum - Aleksandrs Krivickis
      Create Github Repository - Aleksandrs Krivickis
      Create Hosting, SQL, FTP - Jake Merchant
      Logo design - Jake Mercchant
### Mew members onboarding
      Johan Rodriguez Garcia - back-end developer
      Anirudhan Anbuchezhian - back-end developer / 

### Work breakdown for next sprint
      
      Start front end design of all views and design sketch for mobile - Nathalie, Naina
      Establish database connection and create a CRUD class - Sam Town, James Dodd
      Legal, ethical research into database design - Sam Town, James Dodd
      Establish database connection - Jake Merchant
      Log-in and registration page -  Johan Rodriguez Garcia and Nina
      Test plan for login and registration - Nina
      Idea submission - Anirudhan Anbuchezhian, Aleksandrs Krivickis
      Burndown chart - Aleksandrs
      Organise Scrum board and charts - Aleksandrs
      Go through example report and create additional cards - Jake
      
### Assumptions 
      - We store customer's email, whilst in real system we have it readily available

### Questions answered by a customer
      To be filled in by Jake
### Design sketch demonstration to the customer
      We have proposed two design prototypes (By Niana and Nathalie), Nathalie's design was selected by the team as the most suitable one for demonstration to the custimer. - accepted
      
      
