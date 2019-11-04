SLAMQUIZ
=========

# Download
Open your CMD and copy this line : 
```
git clone https://github.com/hochdyl/slamstarter.git
```

# Install
When downlaod is complete, open your CMD copy this line :
```
cd slamquiz
```
```
composer install
```

If you've done it right, you should get this index page :

![index](https://raw.githubusercontent.com/hochdyl/slamquiz/master/assets/screenshot_home.jpg)

# Load database
There are some default user that you can load into a database. Open your CMD and copy this line :
```
php bin/console doctrine:migrations:migrate
```
```
php bin/console doctrine:fixtures:load
```

# Sign in
Next, you will have to connect with the user account. It is setup by default but you can remove it if wanted.

First, click on "Sign in"

![sign in](https://raw.githubusercontent.com/hochdyl/slamquiz/master/assets/screenshot_home.jpg)

Then type the following id to connect as a user :
* Id : user@gmail.com
* Password : user

![sign in](https://raw.githubusercontent.com/hochdyl/slamquiz/master/assets/screenshot_home.jpg)
