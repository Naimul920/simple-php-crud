<?php


namespace App\classes;


class Crud
{
    public $fullName;
    public $email;
    public $mobile;
    public $message;
    public $sql;
    public $link;
    public $queryResult;
    public $data=[];
    public $row;
    public $i;
    public $student_id;
    public $result;

    public function __construct($data=null)
    {
        if ($data)
        {
            $this->fullName=$data['full_name'];
            $this->email=$data['email'];
            $this->mobile=$data['mobile'];
            $this->message=$data['message'];
            if (isset($data['$student_id']))
            {
                $this->student_id=$data['$student_id'];
            }


        }
    }

    public function add()
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        if ($this->link)
        {
            $this->sql="INSERT INTO students (full_name, email, mobile, message) VALUE ('$this->fullName','$this->email','$this->mobile','$this->message')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Student Info save successfull';
            }
            else
            {
                die('Query Problem..'.mysqli_error($this->link));
            }
        }
    }

    public function getAllStudentInfo()
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        $this->sql="SELECT * FROM students";
        if (mysqli_query($this->link, $this->sql))
        {
            $this->queryResult = mysqli_query($this->link, $this->sql);
            $this->i = 0;
            while ($this->row= mysqli_fetch_assoc($this->queryResult))
            {
                $this->data[$this->i]['id']  = $this->row['id'];
                $this->data[$this->i]['full_name']  = $this->row['full_name'];
                $this->data[$this->i]['email']  = $this->row['email'];
                $this->data[$this->i]['mobile']  = $this->row['mobile'];
                $this->data[$this->i]['message']  = $this->row['message'];
                $this->i++;
            }
            return $this->data;
        }
        else
        {
            die('Query Problem..'.mysqli_error($this->link));
        }
    }
    public function getStudentInfoById($id)
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        if ($this->link)
        {
            $this->sql="SELECT * FROM students WHERE id='$id'";
            if ($this->sql)
            {
                $this->queryResult=mysqli_query($this->link, $this->sql);
                return mysqli_fetch_assoc($this->queryResult);
            }
            else {
                die('Query Problem..'.mysqli_error($this->link));
            }
        }



    }
    public function update()
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        $this->sql="UPDATE students SET name='$this->fullName', email='$this->email', mobile='$this->mobile', message='$this->message' WHERE id='$this->student_id'";

        mysqli_query($this->link, $this->sql);

    }
}