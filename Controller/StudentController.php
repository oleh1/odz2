<?php

namespace Controller;

use Model\studentsDb;


class StudentController extends StudentsDb
{

    public function body()
    {
        $data = [
            'search'=>$this->search(),
            'validation'=>$this->validation(),
            'mark'=>$this->mark,
            'expensive'=>$this->expensive,
            'average'=>$this->average,
            'cheap'=>$this->cheap,
        ];
        return $this->requireToVar('View/body.php', $data);
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
            'users'=>$this->users,
        ];
        return $this->requireToVar('View/admin.php', $data);
    }

    public function user_authorization1()
    {
        return $this->user_authorization2();
    }

    public function user_registration1()
    {
        return $this->user_registration2();
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

    public function delete()
    {
        $this->delete1();
    }

    public function delete_users()
    {
        $this->delete_users1();
    }

    public function xxx()
    {
        return $this->requireToVar('View/xxxxx.php', ['xxxxx'=>$this->xxxx()]);
    }

    public function purchase()
    {
        return $this->purchase1();
    }

    public function clear()
    {
        $this->clear1();
    }

    public function sessionexit()
    {
        return $this->sessionexit1();
    }

    private function requireToVar($file, $data = []){
        ob_start();
        extract($data);
        require($file);
        return ob_get_clean();
    }

}
