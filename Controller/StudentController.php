<?php

namespace Controller;

use Model\studentsDb;


class StudentController extends StudentsDb
{

    public function body()
    {
        return $this->requireToVar('View/body.php', ['search'=>$this->search()]);
    }

    public function add_admin1()
    {
        return $this->add_admin2();
    }
    public function admin()
    {
        $data = [
            'adminall'=>$this->adminall,
            'purchases'=>$this->purchases,
        ];
        return $this->requireToVar('View/admin.php', $data);
    }

    public function authorization1()
    {
        return $this->authorization2();
    }

    public function edit1()
    {
        return $this->requireToVar('View/edit.php', ['edit'=>$this->edit2()]);
    }
    public function edit3()
    {
        return $this->edit4();
    }

    public function xxx()
    {
        return $this->requireToVar('View/xxxxx.php', ['xxxxx'=>$this->xxxx()]);
    }

    public function purchase()
    {
        return $this->purchase1();
    }

    public function expensive()
    {
        return $this->requireToVar('View/expensive.php', ['expensive'=>$this->expensive]);
    }
    public function average()
    {
        return $this->requireToVar('View/average.php', ['average'=>$this->average]);
    }
    public function cheap()
    {
        return $this->requireToVar('View/cheap.php', ['cheap'=>$this->cheap]);
    }

    public function clear()
    {
        $this->clear1();
    }

    public function sessionexit()
    {
        unset($_SESSION['admin']);
        header("Location: admin");
        die;
    }

    private function requireToVar($file, $data = []){
        ob_start();
        extract($data);
        require($file);
        return ob_get_clean();
    }

}
