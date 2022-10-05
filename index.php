<?php require_once __DIR__ . '/vendor/autoload.php';
  use queryBuilder\Config\Database;
  use queryBuilder\Config\DotEnv;
  use queryBuilder\Test\Book;
  (new DotEnv(__DIR__ . '/.env'))->load();
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1 class="text-center">WELCOME TO SIMPLE TEST QUERY BUILDER</h1>
            <?php
               $book = new Book();
               $getAll = $book->getAllData();
               $database = new Database();
               dump($database);
            //    dump($getAll);
            ?>
         <div class="container">
            <div class="row">
                
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
                
            </div>
         </div>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
