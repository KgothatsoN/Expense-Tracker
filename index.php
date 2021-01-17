<?php
require_once("../CRUD/php/component.php");
require_once("../CRUD/php/operation.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracker</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,800;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/b3f24da991.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        
        <main>
            <div class="container text-center">
                <h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-money"></i> Expense Tracker</h1>

                <div class="d-flex justify-content-center">
                    <form action="" method="post" class="w-50">
                        <div class="pt-2">
                            <!-- php input component -->
                            <?php inputElement("<i class='fa fa-id-badge'></i>","ID","item_id","");?>    
                        </div>
                        <div class="pt-2">
                            <?php inputElement("<i class='fa fa-list'></i>","Item Name","item_name","");?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php inputElement("<i class='fa fa-dollar '></i>","Price","price","");?>  
                            </div>
                            <div class="col">
                                <?php inputElement("<i class='fa fa-calendar '></i>","dd-mm-yyyy","date","");?>    
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <?php buttonElement("btn-create", "btn btn-light border", "<i class='fa fa-pencil-square-o'></i>", "create","data-toggle='tooltip' data-placement='bottom' title='Add Item'");?>
                            <?php buttonElement("btn-refresh", "btn btn-light border", "<i class='fa fa-refresh'></i>", "refresh","data-toggle='tooltip' data-placement='bottom' title='Refresh'");?>
                            <?php buttonElement("btn-update", "btn btn-light border", "<i class='fa fa-save'></i>", "update","data-toggle='tooltip' data-placement='bottom' title='Save'");?>
                            <?php buttonElement("btn-delete", "btn btn-danger border", "<i class='fa fa-trash-o'></i>", "read","data-toggle='tooltip' data-placement='bottom' title='Delete Selected'");?>
                        </div>
                    </form>
                </div>

                <div class="d-flex table-data">
                    <table class="table table-striped table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php
                                if(isset($_POST['refresh'])){
                                    $result = getData();

                                    if($result){
                                        while($row = mysqli_fetch_assoc($result)){?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['item_name'];?></td>
                                                <td><?php echo $row['price'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td ><i class="fa fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                                            </tr>    

                                    <?php
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </main>

    </body>
</html>