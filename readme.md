# JJ AWS website running PHP

This sample demonstrates how to run PHP website using MySql on Amazon WebServices and on Microsoft Azure.

AWS https://aws.amazon.com/console/

Azure https://portal.azure.com

## Deploy localy

### Change connection to MySql database

Change connection settings in code, uncomment AWS/Azure section.

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

## Deploy to AWS

Provision AWS Elastic Beanstalk in AWS with PHP configuration.
Create new Environment for your application, in my case jjweb.

For MySql database provision new AWS Aurora. You will get new connection like
jjaurora-cluster.cluster-cgrmtrhrphvm.eu-central-1.rds.amazonaws.com

You will get url like http://jjweb.eu-central-1.elasticbeanstalk.com/

### Create MySql database in AWS

Connect to database and deploy schema

```bash
mysql -u jj -h jjaurora-cluster.cluster-cgrmtrhrphvm.eu-central-1.rds.amazonaws.com -p
```

Change security group settings to allow connection from internet/website.

### Upload website to AWS Beanstalk

Upload jjweb.zip into web application.

## Deploy to Azure

Provision Azure Web App Service with Linux service plan (for testing plan B1 is fine).

You will get url like https://jjweblinux.azurewebsites.net

For MySql database provision new Azure Database for MySql server. You will get new connection like jjmysql.mysql.database.azure.com

### Create MySql database in Azure

Connect to database and deploy schema

```bash
mysql -u jj@jjmysql -h jjmysql.mysql.database.azure.com -p
```

Allow access to Azure services in Connection security settings to allow connection from website.

### Upload website to Azure App Service

For testing simple way is to open Kudu and Bash and run git clone command

```bash
cd site/wwwroot
git clone https://github.com/jjindrich/jjaws-web-php.git
```