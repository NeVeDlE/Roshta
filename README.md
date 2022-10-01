<h1 style="text-align:center;">Ro ش ta</h1>

## All Healthcare in one place

### this a documentation of Roshta Graduation Project 

## Table of Content:
- [**Introduction**](#introduction)
- [**Project Description**](#description)
- [**main features**](#main-feature)
- [**Analysis**](#analysis)
- [**Technologies**](#process-and-technologies)
- [**Challenges**](#challenges)
- [**Demo**](#Demo)
- [**Run The Project**](#how-to-run-the-project)
## Introduction

Roshta is a graduation project created by computer science students at Minya University in Egypt 

**Mustafa Shaher Abduallah (Back-end developer)**

**Mahmoud Ayman  (Front-end web developer)**

**Yasser Gomma (Android developer)**

the main idea of this project is to link between Patient, Doctor and Pharmacist 

mainly we go throw web but also we have an android application developed by **Yasser Gomma** for patient to make it easy to control his account 

## Description

the main idea of this project is to digitalize all the process of examination and buying medicines and make it all in one place 

## main Feature:

the feature that we care about the most on this project is to make it the process of finding medicines easier

since we in Egypt have a little trouble in finding medicines 

with **Roshta** this will be easy you can search for pharmacy that contain all the medicine you want 

also will be sorted by the closest to you 

## Analysis:

The best thing to make analysis so to detect a certain pattern or ask for questions and analysis their responses.

We are trying to make a replacement for the whole medical process in Egypt so instead of only us guessing what to do and what are the problems we asked people who really live with these things daily like us. The first questions we asked what the problems you suffer from with the doctor’s prescription?

- The answers we got in this question was mostly we can’t really read his handwriting
- Okay so this is a problem people faced but does this really mean something we should try to solve so we asked people 
“did you get any problem because of the doctor’s handwriting?”
The answers we got was 59.4% “Yes”, 23.8% “Maybe” and 16.8% “No”.

## Process and Technologies:

### Technologies:

- **Google Maps API** by adjusting JavaScript code
- •  For Database we are using: **MYSQL**, as it considered the best DB right now and we are going to use API to interact with it.
- **Restful API** for link between website and mobile application database
- For Web Frontend we used a framework called: **React**, it makes the front work easier and faster.
- For Web Backend we used a framework called: **Laravel**, It's the fastest and strongest framework for web right now.
- **Java** for Android Development

### software development Process:

for development process we use **TDD Test-driven development** that relying on software requirements being converted to test cases before the software is fully developed, and tracking all software development by repeatedly testing the software against all test cases. This is as opposed to software being developed first and test cases being created later.

## Challenges:

1. Considering our analysis, we still think we can make more surveys to achieve better results
2. We are going to add a feature called read prescription which translate the paper one to non-paper using normal phone’s camera, this whole process will be used using machine learning which normally it needs huge data set to train the model with so our percentage not going to be 100%.
3. We need huge database for storing medicines and which pharmacy has what and doctor’s locations and this stuff.
4. For the first few years or months the Nearest Pharmacy feature won’t be strong enough as it will only locate pharmacies only who’s working with us so it may result to far pharmacies.
5. For some old mobile phones, the non-paper to paper process may not work perfectly as it has weak camera’s which the whole process depends on.

## our users and Targets:

our main users are one of three: 

### **Doctor:**

First Doctor's account needs to confirmation to sign up as a doctor we need to confirm the id of the Doctor to get him access to features  Doctor can Access the Data of The Patient and see if the patient suffers from any chronic diseases or suffers from an allergy to any type of medication also Doctor can Write a prescription to patient after examining him. 

### **Pharmacist:**

Pharmacist can have access to the prescription of any Patient and after checking its Expiration date he can dispenses medication to the patient.

### **Patient:**

Patient can sign in by more than one account for himself or one of his family and import the basic data like name, age, blood type and if he suffers from any type of allergy. Patient also can search about medicine and find the nearest pharmacy that include all the prescription that Doctor type to him and he can search about any doctor at any field of Medicine.

this product mainly targets the patient most of features are made for patient like search about the medicine by the nearest or search about doctor at any field of Medicine and to save patient medical History and all medical prescription to use when he goes to doctor or at Emergencies such as accidents.

## Demo:

---
# How to run the project:

### Requirements:
1. First download xampp
   - [Download Xampp](https://www.apachefriends.org/download.html)

     get 7.4.28 / PHP 7.4.28 version
2. now the composer
   - [Download Composer](https://getcomposer.org/download/)

     get the latest version

3. now open xamp control panel and start apache and MySQL after that click admin next to mysql to open the dashboard

4. create a new database and name it roshta

5. open a terminal and change directory to the project and run composer install

### Run the project:

1. run composer install

```bash
composer install
```




2. open the .env file in the project and make DB_DATABASE=roshta 
    - after that run this command to generate the key
    note: run the command above in the first time only
        ```bash
        php artisan key:generate
        ```
    - run this command to migrate the database
        ```bash
        php artisan migrate
        ```
    - run this command to start the server
        ```bash
        php artisan serve
        ```

- if it's not ur first time using this project and u want a new database use this one instead of the second command
    ```bash
    php artisan migrate:fresh --seed
    ```
the last one will run the project on the server (http://127.0.0.1:8000/)
