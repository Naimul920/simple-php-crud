<?php


namespace App\classes;


class Product
{
    private $name;
    private $price;
    private $stock;
    private $description;
    private $imageName;
    private $directory;
    private $imgURL;
    private $file;
    private $link;
    private $sql;
    private $queryResult;
    private $row;
    private $date=[];
    private $i;


    public function __construct($data=null, $file=null)
    {
        if ($data)
        {
            $this->name=$data['name'];
            $this->price=$data['price'];
            $this->stock=$data['stock'];
            $this->description=$data['description'];
        }
        if ($file)
        {
            $this->file=$file;
        }

    }
    protected function getImageURL()
    {
        $this->imageName= $this->file['image']['name'];
        $this->directory= 'assets/images/'.$this->imageName;
        move_uploaded_file($this->file['image']['tmp_name'], $this->directory);
        return $this->directory;
    }
    public function save()
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
       if ($this->link)
       {
        if(empty($this->file['image']['name']))
        {
            $this->imgURL='';
        }
        else
        {
            $this->imgURL=$this->getImageURL();
        }

        $this->sql="INSERT INTO products (name, price, stock, description, image) VALUES ('$this->name', '$this->price', '$this->stock', '$this->description', '$this->imgURL')";
          $this->queryResult= mysqli_query($this->link, $this->sql);

        if ($this->queryResult)
        {
            return 'Product info save successful';
        }
        else
        {
            die('Query Problem'.mysqli_error($this->link));
        }
       }
    }

    public function getAllProductInfo()
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        if ($this->link)
        {
            $this->sql="SELECT * FROM products";
            if ($this->sql)
            {
               $this->queryResult= mysqli_query($this->link, $this->sql);
               $this->i=0;
               while ($this->row=mysqli_fetch_assoc($this->queryResult))
               {
                   $this->date[$this->i]['id']=$this->row['id'];
                   $this->date[$this->i]['name']=$this->row['name'];
                   $this->date[$this->i]['price']=$this->row['price'];
                   $this->date[$this->i]['stock']=$this->row['stock'];
                   $this->date[$this->i]['description']=$this->row['description'];
                   $this->date[$this->i]['image']=$this->row['image'];
                   $this->i++;
               }
               return $this->date;
            }
            else
            {
                die('Query Error'.mysqli_error($this->link));
            }
        }

    }

    public function getProductInfoById($id)
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        if ($this->link)
        {
            $this->sql="SELECT * FROM products WHERE id='$id'";
            if ($this->sql)
            {
                $this->queryResult= mysqli_query($this->link , $this->sql);

                return mysqli_fetch_assoc($this->queryResult);
            }
            else
            {
                die('Query result'.mysqli_error($this->link));
            }
        }
    }
    public function updateProductInfo($productInfo)
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        if ($this->link)
        {
            if (empty($this->file['image']['name']))
            {
                $this->imgURL=$productInfo['image'];
            }
            else
            {
                if (file_exists($productInfo['image']))
                {
                    unlink($productInfo['image']);
                }

                $this->imgURL=$this->getImageURL();

            }
            $this->sql="UPDATE products SET name ='$this->name', price='$this->price', stock='$this->stock', description='$this->description', image='$this->imgURL' WHERE id='$productInfo[id]' ";
            if (mysqli_query($this->link, $this->sql))
            {

                $_SESSION['message']= 'Product Info update successfully done';
            }
            else
            {
                die('Query Problem..'.mysqli_error($this->link));
            }
        }


    }
    public function deleteProductInfo($id)
    {
        $this->link=mysqli_connect('localhost','root','','login_system_with_database');
        $this->row=$this->getProductInfoById($id);

        if (file_exists($this->row['image']))
        {
            unlink($this->row['image']);
        }
        $this->sql="DELETE FROM products WHERE id='$id'";
        if (mysqli_query($this->link,$this->sql))
        {
            $_SESSION['message']='Product info delete successfully done';

        }
        else
        {
            die('Query Error...'.mysqli_error($this->link));
        }
    }
}