<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "1";
$dbName = "ODZ";


mysql_connect($hostname,$username,$password) OR DIE("Не могу создать соединение ");

mysql_select_db($dbName) or die(mysql_error());

$sql = "CREATE TABLE IF NOT EXISTS user (
  id int(100) NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  login varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;";

mysql_query($sql);