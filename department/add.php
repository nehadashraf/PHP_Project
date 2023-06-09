<?php
//connection
include '../app/config.php';
include '../app/functions.php';
//UI
include '../public/nav.php';
include '../public/head.php';
$errors = [];
if (isset($_POST['send'])) {
    $name = filterString($_POST['name']);
    if (empty($name)) {
        $errors[] = "Please Enter Valid Name ";
    }
    if (empty($errors)) {
        $insert = "INSERT INTO `department` values(NULL,'$name',Default)";
        $insertion = mysqli_query($connect, $insert);
        testMessage($insertion, "Insertion");
    }
}
auth(2, 3);
?>

<h1 class="text-center text-info display-1 mt-5 pt-5">Add department Page</h1>
<div class="container col-6">
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $data) : ?>
                    <li><?= $data ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="body">
            <form action="" method="POST" class="m-3">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <button class="btn btn-info m-3" name="send">send</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../public/script.php'
?>