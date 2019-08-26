CAUTION!
This project contains basic functionality of a website, using HTML5, css,
javascript, mysql and is not suggested for production!!!

Explanation:
Basic login/signup functionality.
After logging in there are 2 different pages, one for a normal user and one for the admin.
Users can write and post comments.Also they can request an update in other comments.
Admins can review changes in comments and approve or remove them. They can also
delete comments and change a regular user to admin.

Initially there aren't admins so the first one should became through phpmyadmin webpage
by changing type 'user' to 'admin'

[here](https://www.youtube.com/watch?v=ik7unS00rq0&feature=youtu.be) is a short video demonstration.

Below are the required steps for it to run in localhost.

1. install the latest lamp stack for ubuntu, wamp for windows
2. Modify files : container/dph.cont.php and months/includes/dbh.inc.php based on your dataset

go to 'your_localhost'/phpmyadmin url and create a database with the name accounts.
create two tables as shown below:

```
CREATE TABLE users (
    user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    user_first varchar(256) not null,
    user_last varchar(256) not null,
    user_email varchar(256) not null,
    user_uid varchar(256) not null,
    user_pwd varchar(256) not null,
    user_type varchar(256) not null
);
```

```
CREATE TABLE comments (
    cid int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(256) not null,
    message varchar(256) not null,
    date varchar(256) not null,
    status boolean,
    m_number int(11) not null
);
```

then go to your localhost to use the website.
