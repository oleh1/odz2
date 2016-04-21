<?php

namespace Model;
use Db\baza;

class StudentsDb
{
    public $userstable = 'odz';
    public $admindb = 'admindb';
    public $admin = 'admin';
    public $user = 'user';
    public $expensive;
    public $average;
    public $cheap;
    public $xxxxx;
    public $adminall;
    public $edit;
    public $purchases;
    public $search;
    public $users;
    public $mark;

    public function __construct()
    {
        $dd = new baza();

        $ex = "SELECT * FROM $this->userstable WHERE price >= 60";
        $this->expensive = mysqli_query($dd->getMysqli(), $ex);

        $av = "SELECT * FROM $this->userstable WHERE price >= 30 AND price <= 60";
        $this->average = mysqli_query($dd->getMysqli(), $av);

        $ch = "SELECT * FROM $this->userstable WHERE price <= 30";
        $this->cheap = mysqli_query($dd->getMysqli(), $ch);

        $ad = "SELECT * FROM $this->userstable";
        $this->adminall = mysqli_query($dd->getMysqli(), $ad);

        $pu = "SELECT * FROM $this->admindb";
        $this->purchases = mysqli_query($dd->getMysqli(), $pu);

        $us = "SELECT * FROM $this->user";
        $this->users = mysqli_query($dd->getMysqli(), $us);

        $ma = "SELECT * FROM $this->userstable";
        $this->mark = mysqli_query($dd->getMysqli(), $ma);

    }

    public function xxxx()
    {
        $dd = new baza();

        $xx = "SELECT * FROM $this->userstable WHERE name1 = '{$_GET['xxx']}'";
        return $this->xxxxx = mysqli_query($dd->getMysqli(), $xx);
    }

    public function edit2()
    {
        $dd = new baza();

        $xx = "SELECT * FROM $this->userstable WHERE name1 = '{$_GET['edit']}'";
        return $this->edit = mysqli_query($dd->getMysqli(), $xx);
    }
    public function edit4()
    {
        $dd = new baza();

        $query_edit = "UPDATE $this->userstable SET mark='{$_POST['mark']}', name1='{$_POST['name1']}', price='{$_POST['price']}', description='{$_POST['description']}', quantity='{$_POST['quantity']}', img='{$_FILES['myfile']['name']}' WHERE name1='{$_GET['name1']}'";
        mysqli_query($dd->getMysqli(), $query_edit);

        $uploaddir = "drawings/";
        $dest = $uploaddir.$_FILES['myfile']['name'];
        move_uploaded_file($_FILES['myfile']['tmp_name'],$dest);
        unlink('drawings/'.$_GET['deleteimg']);

        header("Location: admin");
        die;
    }

    public function purchase1()
    {
        $dd = new baza();

        $price = $_POST['quantity'] * $_GET['price'];

        $mysql_query = "INSERT INTO $this->admindb VALUES(null, '{$_GET['mark']}', '{$_GET['name1']}', '{$price}','{$_GET['description']}','{$_POST['quantity']}','{$_GET['img']}')";
        mysqli_query($dd->getMysqli(), $mysql_query);

        header("Location: body");
        die;
    }

    public function add_admin2()
    {
        $dd = new baza();

        $mysql_query = "INSERT INTO $this->userstable VALUES(null, '{$_POST['mark']}', '{$_POST['name1']}', '{$_POST['price']}','{$_POST['description']}','{$_POST['quantity']}','{$_FILES['myfile']['name']}')";
        mysqli_query($dd->getMysqli(), $mysql_query);

        $uploaddir = "drawings/";
        $dest = $uploaddir.$_FILES['myfile']['name'];
        move_uploaded_file($_FILES['myfile']['tmp_name'],$dest);

        header("Location: admin");
        die;
    }

    public function authorization2()
    {
        $dd = new baza();

        $password = md5($_POST['password']);
        $login = $_POST['login'];


        $query_authorization = "SELECT * FROM $this->admin WHERE login = '{$login}'";
        $query_authorization1 = mysqli_query($dd->getMysqli(), $query_authorization);
        $query_authorization2 = $query_authorization1->fetch_array();
        if($query_authorization2['login'] == "OlegKopica" & $query_authorization2['password'] == $password){
            session_start();
            $_SESSION['admin'] = $login;
            header("Location: admin");
            die;
        }
    }

    public function user_authorization2()
    {
        $dd = new baza();

        $login = $_POST['login'];
        $password = md5($_POST['password']);


        $query_authorization = "SELECT * FROM $this->user WHERE login = '{$login}'";
        $query_authorization1 = mysqli_query($dd->getMysqli(), $query_authorization);
        $query_authorization2 = $query_authorization1->fetch_array();
        if($query_authorization2['login'] == $login & $query_authorization2['password'] == $password){
            setcookie("user","$login",time()+7777);
            header("Location: body?autho=2&name={$query_authorization2['username']}");
            die;
        }else{
            header("Location: body?error=1");
            die;
        }
    }

    public function validation(){
        if($_GET['error'] == 1){ $validation = "Неверный логин или пароль";
        }elseif($_GET['autho'] == 2){ $validation = "{$_GET['name']} Вы вошли в свой акаунт"; }
            return $validation; }

    public function user_registration2()
    {
        $dd = new baza();

        $username = $_POST['username'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password = md5($password);

        $mysql_admin = "INSERT INTO $this->user VALUES(null, '{$username}', '{$login}', '{$password}')";
        mysqli_query($dd->getMysqli(), $mysql_admin);
            header("Location: body");
            die;
    }

    public function clear1()
    {
        $dd = new baza();

        $query_deleteone = "DELETE FROM $this->admindb";
        mysqli_query($dd->getMysqli(), $query_deleteone);
        header("Location: admin");
        die();
    }

    public function search()
    {
        $dd = new baza();

        $se = "SELECT * FROM $this->userstable WHERE mark='{$_POST['search']}'";
        return $this->search = mysqli_query($dd->getMysqli(), $se);
    }

    public function delete1()
    {
        $dd = new baza();

        $query_delete = "DELETE FROM $this->userstable WHERE name1='{$_GET['delete']}'";
        mysqli_query($dd->getMysqli(), $query_delete);
        if($_GET['deleteimg'] == ''){ unlink('drawings/'.$_GET['deleteimg']); }
        header("Location: admin");
        die;
    }

    public function delete_users1()
    {
        $dd = new baza();

        $delete = "DELETE FROM $this->user";
        mysqli_query($dd->getMysqli(), $delete);
        setcookie("user","",time()-7777);
        header("Location: admin");
        die;
    }

    public function sessionexit1()
    {
        unset($_SESSION['admin']);
        header("Location: admin");
        die;
    }
}