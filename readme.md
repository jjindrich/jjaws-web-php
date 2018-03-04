# JJ AWS website running PHP

## Deploy to AWS

## Provision AWS services

Provision AWS Elastic Beanstalk in AWS with PHP configuration.
Create new Environment for your application, in my case jjweb.

You will get url like http://jjweb.eu-central-1.elasticbeanstalk.com/

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

### Upload to AWS Beanstalk

Upload jjweb.zip into web application.
