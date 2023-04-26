#this is a file in witch i will setup the webserver required to let this program 
work

#updating the os
sudo apt update && sudo apt -y upgrade;

#installing the reuired programs
sudo apt -y install apache2 && sudo apt -y install php;
sudo systemctl enable apache2;
sudo systemctl restart apache2;

