# JJ AWS website running PHP

## Deploy localy

### Prepare package

```powershell
Compress-Archive -Path * -DestinationPath jjweb.zip -Force
```

```bash
zip jjweb.zip *
```

### Run localy on apache2

Prepare your linux with Apache2 and PHP installed.
Copy files to root directory

```bash
sudo cp * /var/www/html/
```

Start browser with http://localhost

### MySql database schema

```sql
CREATE DATABASE jj;
USE jj;

CREATE TABLE jjtable (id INT, name VARCHAR(10));
INSERT INTO jjtable VALUES (1,'ahoj');
```

## Deploy to AWS services

Provision AWS Elastic Beanstalk in AWS with PHP configuration.
Create new Environment for your application, in my case jjweb.

You will get url like http://jjweb.eu-central-1.elasticbeanstalk.com/

### Upload Web App to AWS Beanstalk

Upload jjweb.zip into web application.

## Deploy to Azure

Provision Azure Web App Service with Linux service plan (for testing plan B1 is fine).

You will get url like https://jjweblinux.azurewebsites.net

For MySql database provision new Azure Database for MySql server. You will get new connection like jjmysql.mysql.database.azure.com

### Create MySql database

Connect to database and deploy schema

```bash
mysql -u jj@jjmysql -h jjmysql.mysql.database.azure.com -p
```

### Upload Web App to Azure App Service

For testing simple way is to open Kudu and Bash and run git clone command

```bash
cd site/wwwroot
git clone https://github.com/jjindrich/jjaws-web-php.git
```