<?php
include "inc/header.php";
include "func/functions.php";
?>
    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <div class="row">
            <div class="col-md-6 offset-md-3">
            <h1 class="display-4"><i class="fa fa-check" aria-hidden="true"></i> ITEC Todo</h1>
            <p class="lead">Add a todo below:</p>
            <hr class="my-4">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="form-group">
                    <input id="my-input" class="form-control" type="text" name="todo" placeholder="Todo here...">
                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Todo</button>
                </div>
        
            </form>
            </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Todos Here:</h2>
        <div class="row">

        <ul class="list-group w-100">
            <?php foreach($todos as $todo): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center w-100">
                <?php echo $todo['todo'];?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <button type="submit" class="btn btn-danger" name="delete" value="<?php echo $todo['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                </form>
            </li>
            <?php endforeach;?>
        </ul>
            
        </div>
    </div>
<?php
    include "inc/footer.php";
?>