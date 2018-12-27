<?php
class User
{
    public $id;
    public $name;
    public $phone;

    public function __construct($id = null, $name = null, $phone = null){
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->db = DB::getInstance();
    }

    public function all()
    {
        $users = [];        
        $query = 'Select * from users';
        $rows = $this->db->query($query);
        foreach ($rows->fetch_all(MYSQLI_ASSOC) as $item) {
            $users[] = new User($item['id'], $item['name'], $item['phone']);
        }
        return $users;
    }

    public function find($id)
    {
        $user = null;
        $query = "Select * from users where id = '{$id}'";
        $result = $this->db->query($query);
        $user = $result->fetch_assoc();
        return $user;
    }

    public function create($name, $phone)
    {
        $created_at = date('Y-m-d');
        $query = "Insert into users (name, phone, created_at) values ('{$name}', {$phone}, '{$created_at}')";
        $result = $this->db->query($query);
        if ($result == true){
            header('Location: index.php?controller=page&action=user&notice=success');
        } else {
            header('Location: index.php?controller=page&action=error');
        }
    }

    public function edit($id, $name, $phone)
    {
        $query = "Update users set name = '{$name}', phone = '{$phone}' where id = {$id}";
        $result = $this->db->query($query);
        if ($result == true){
            header('Location: index.php?controller=page&action=user&notice=success');
        } else {
            header('Location: index.php?controller=page&action=error');
        }
    }

    public function delete($id)
    {
        $query = "Delete from users where id = {$id}";
        $result = $this->db->query($query);
        if ($result == true){
            header('Location: index.php?controller=page&action=user&notice=success');
        } else {
            header('Location: index.php?controller=page&action=error');
        }
    }
}
?>