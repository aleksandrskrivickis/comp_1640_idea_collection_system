# Table of Contents  
- [Specifications document](https://moodlecurrent.gre.ac.uk/pluginfile.php/1462970/mod_resource/content/11/CW_COMP1640_1920.pdf)
- [Google Drive](https://drive.google.com/drive/u/0/folders/1GQoqBhNVXk_yFTkNl_QnNDmkUuhcpDkE)
- [Kanban Board](https://trello.com/b/xC7CBjBU/coursework-board)
- [Data Architecture (ERD)](https://www.lucidchart.com/documents/edit/e21ec631-0069-4916-8132-37b8631b7e27/tuArPCv54ECH)
- [Architecture](#architecture)
- [Meetings](#meetings)

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
