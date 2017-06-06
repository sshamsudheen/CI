// Authour: SAMSUDHEEN SALUDHEEN
// Created on FEB-05-2017
// Skype id: shamsudheen.s
// Gmail id: sshamsudheen@gmail.com
// +358-469541925

This application is developed using an open source PHP MVC framework Codeignioter (https://codeigniter.com/) 

Tested this in Windows 10 and as well as Red Hat Enterprise Linux Server release 6.6 (Santiago)

FOR Red Hat Enterprise Linux Server release 6.6 (Santiago), follow the below instruction
=========================================================================================
1) Install apache in the rhel machine (yum install -y httpd)
2) Start the apache service. (service httpd start)
3) Copy the zip file to rhel 6.x machine
4) extract the CI.zip
5) change the permission (cd CI; chmod -R 777 system/)
6) Go to browser and type http://IP-Addr/CI


For WINDOWS, follow the below instruction
=========================================
1) Download and install XAMPP (https://www.apachefriends.org/download.html)
2) under xampp/htdocs/ place the CI.zip file
3) Extract the ZIP file
4) Make sure apache is started
5) go to browser and type http://localhost/CI


To view the contoller code, written for this converstion, go to application/contollers/csv.php
The view the HTML, please go to application/views/csv/csv_index.php


Currently i have converted to 2 options XML/Json., Not concentrated much on validation, however i have made simple validationc check like csv file should be uploaded and any one of the o/p format is choosen

Here is the filters that i have used
======================================
'name'   => FILTER_UNSAFE_RAW,

'stars'    => array('filter'    => FILTER_VALIDATE_INT,
		'options'   => array('min_range' => 1, 'max_range' => 5)
		 ),			

'uri'     => FILTER_VALIDATE_URL