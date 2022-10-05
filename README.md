# đề bài 
```
 Create Query Builder is a simple, methods-chaining dependency-free library to create SQL Queries simple. Supports databases which are supported by PDO
```
# người thực hiện 
**Lò Văn Đồng**
### link github để download code : https://github.com/frosty1222/SimpleQueryBuilder

# tạo tên Database
+ tên database: exampleDB
+ tên bảng sử dụng trong bài: books

# cấu trúc thư mục
![](../simple_query_builder/photo/folder.png)
# kết nối database sử dụng PDO
```php
<?php
namespace queryBuilder\Config;
use PDO;
use Dotenv\Dotenv;
class Database
{
    public $db;
    public $user;
    public $pass;
    public $charset = 'utf8mb4';
    private static $bdd = null;
    public function __construct(){
      $this->db = $_ENV['DBNAME'];
      $this->user = $_ENV['USERNAME'];
      $this->pass = $_ENV['PASSWORD'];
    }
    public function getDB(){
        $dsn = "mysql:dbname=$this->db;charset=$this->charset";
        try {
            self::$bdd = new \PDO($dsn, $this->user, $this->pass);
       } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
       }
       return self::$bdd;
    }
}
```
```
muốn dùng hay muốn đổi tên thì chỉ cần đổi trong file .env '
- trong file gốc tạo ra file .env và cấu trúc như sau 
USERNAME =root// tên username 
PASSWORD = 12345// mật khẩu nếu có 
DBNAME = exampleDB// tên database 
```
# giải thích về các class và interface có trong bài 
```angular2html
    + Core\Model;
    => Class Model Có tác dụng là trả về một array 
    +src\Config\Core
    => class Core này có tác dụng khởi tạo Model và Database khi chúng ta vào web vì nó sẽ
    gọi luôn Model và Database trong hàm khỏi tạo construct
    +src\Config\Database
    => class này có tác dụng kết nối với cơ sở dữ liệu sử dụng PDO
    
    +src\interfaces
    => trong bài này tôi vẫn dùng lại interfaces của dto khi cần thì có thể gọi tới
    +src\Config\Models\BookModel;
    => BookModel là class để dựng hàm get và set cho các fields của bảng dữ liệu
    
    +src\Models\BookModel\BookRepository;
    => class này có tác dụng khỏi tạo BookResourceModel mà Class BookResourceModel lại extends 
    class ReSourceModel và class ReSourceModel lại implements ModelInterface
    -> class BookRepository sẽ gọi đến các methods đc định nghĩa trong ModelInterface
    +src\Models\BookModel\BookResourceModel;
    => class này gọi đến hàm __init đã được khai báo trong resourceModel hàm này có tác dụng nhận table,id,model truyền vào như đối số để khởi tạo model và sử dụng bảng và id của bảng trong request của BookRepository;
    
    +src\SimpleModel;
    => folder này chứa 1 interface và 1 model resource
    +src\SimpleModel\ModelInterface;
    + đây là một resource interface nó sẽ có tác dụng như một pattern cho các class extends 
    nó, trong interface này có 3 dối số truyền vào đó là $table,$id,$model;
    
    +src\SimpleModel\ResourceModel;
    => class này implements ResourceInterface, class này sẽ tạo ra các hàm và reusable methods cho các
    models con của nó sử dụng
    
    +src\Test\Book;
    =>class Book biểu thị cho một table mà mình muốn làm việc với, trong ví dụ này mình đang 
    làm việc với Book Table nên mình đặt tên là Book
    => trong class này mình sẽ gọi tới BookRepository để gọi tới các hàm của nó 
    =>ví dụ trong bài này mình gọi tới hàm getAll(); hàm này có tác dụng lấy hết toàn bộ 
    dữ liệu có trong bảng books 

```
# kết quả 
###  Book
```php
<?php
namespace queryBuilder\Test;
use queryBuilder\SimpleModel\ResourceRepository;
use queryBuilder\Models\BookModel\BookModel;
class Book{
  public $respository; 
  public function __construct(){
    // gọi đến resource repository rồi truyền vào tên bảng và model tương ứng của bảng 
     $this->respository = new ResourceRepository('books',new BookModel());
  }
  public function getAllData(){
      return $this->respository->getAll();
  }
}
// mô tả
=>class Book biểu thị cho một table mà mình muốn làm việc với, trong ví dụ này mình đang 
làm việc với Book Table nên mình đặt tên là Book
=> trong class này mình sẽ gọi tới ResourceRepository để gọi tới các hàm của nó , và thêm vào parameter là bảng mà bạn muốn dùng và khởi tạo mới model cho model của bảng 
=>ví dụ trong bài này mình gọi tới hàm getAll(); hàm này có tác dụng lấy hết toàn bộ 
dữ liệu có trong bảng books 
```
### kết quả của hàm Book
**cách sử dụng**
```php
trong file index.php ta gọi tới class Book và require vendor để sử dụng một số tính năng 
của nó như là hàm dump() và các class đã autoload;
==> kết quả như ảnh bên dưới
```
```php
// nếu muốn tạo một bảng mới thì bạn phải tạo 1 bảng mới trong database rồi tạo model mới cho bảng đó với cấu trúc như sau 
<?php
namespace queryBuilder\Models\BookModel;
use core\Model;
class BookModel extends Model{
    private $id;
    private $name;
    private $description;
    private $author;
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
}
```
![](../simple_query_builder/photo/table.png)
**bên dưới là ảnh của table và cách gọi các hàm get trong BookModel**
```angular2html
    vì các trường dữ liệu đc khai báo là private nên không thể truy cập trực tiếp từ bên ngoài
    nên ta phải lấy chúng thông qua hàm get đã được khai báo trong model
--> nếu ta khai báo là public thì có thể lấy trực tiếp được 
--> trong bài này mình chỉ demo một hàm là hàm getAll();
```
```angular2html
<table class="table table-hover table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n=1;?>
                        <?php foreach($getAll as $key => $val):?>
                        <tr>
                            <td><?= $n++ ?></td>
                            <td><?= $val->getName()?></td>
                            <td><?= $val->getDescription()?></td>
                            <td><?= $val->getAuthor()?></td>
                            <td>
                                
                                <a href="#" class="btn btn-danger">Delete</a>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-success">Show</a>
                               
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
```