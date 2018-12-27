<?php
require_once('controller/BaseController.php');
require_once('model/user.php');

class UserController extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->folder = 'user';
        $this->user = new User();
    }

    public function get()
    {
        $users = $this->user->all();
        $data = ['users' => $users];
        if (isset($_GET['notice'])){
            $data['notice'] = $_GET['notice'];
        }
        $this->render('user', $data);
    }

    public function add()
    {
        $this->render('add');
    }

    public function save()
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $this->user->create($name, $phone);
    }

    public function edit()
    {
        $id = $_GET['user'];
        $data['user'] = $this->user->find($id);
        $this->render('edit',$data);
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $this->user->edit($id, $name, $phone);
    }

    public function destroy()
    {
        $id = $_GET['user'];
        $this->user->delete($id);
    }
}
?>