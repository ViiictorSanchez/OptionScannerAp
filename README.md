# OptionScannerAp
OptionScanner-Web
1)Download Xampp, xampp is a MYSQL and Apache server that allows the user to create its own local server to run web development projects, by pressing the start buttons at the APACHE and MYSQL options
2)clone the optionscanner-frontend repo at the HTDOCS xampp folder (Xampp folder located at the local disk (C:))

3)following steps specified for Windows, any doubt please contact Us: add a virtualHost to use the system: 

a)open the xampp folder located at the local disk (C:)

b)open the apache folder

c)open the conf folder

d)open the extra folder

e)open the httpd-vhosts file

f)edit the file by erasing the "##" from this line "##NameVirtualHost *:80"

g)add this line at the end of the file

<VirtualHost *:80> DocumentRoot "C:/xampp/htdocs/optionscanner-frontend" ServerName optionscanner.local the save

h)modify the hosts file from the system by: h.1)copy and paste this to the folder path C:\Windows\System32\drivers\etc and open the hosts file

 h.2)add this line at the end of the file 127.0.0.1   optionscanner.local
 
 h.3)save as ADMIN
4)run the xampp control panel and push the start buttons for Apache and MySql

5)type the following url: http://192.34.58.80/optionscanner/logintradier and access with an available Tradier Brokerage account a)answer the security questions correctly b)if the system has already been recognized follow the next step

6)push the Approve Access button

7)ENJOY!
