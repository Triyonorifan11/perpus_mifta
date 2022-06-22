<?php include_once("navbar.php") ?>
<?php

include('../conn.php');
?>

<?php
// session
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

?>

<!-- tombol login -->
<?php if (isset($_POST["login"])) : ?>

    <?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE nama_petugas = '$username' AND password = '$password'");

    // cek username
    // if (mysqli_num_rows($result) === 1) {
    if ($result->num_rows > 0) {
        while ($anggota = mysqli_fetch_array($result)) {
            $id = $anggota["id_petugas"];
        }
        $_SESSION["username"] = $username;


        header("Location: dashboard.php?admin=$id");
        exit;
    }

    $error = true;
    ?>

<?php endif ?>


<div class="container">
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="col-lg-6 col-sm-12" style="margin-bottom:3rem">
            <div class="card">
                <div class="card-body">
                    <div class="mx-auto d-flex justify-content-center" style="width: 100%;">
                        <i class="bi bi-person-circle fs-1 "></i>
                    </div>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                Username atau Password Salah !
                            </div>
                        </div>
                    <?php endif ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="username">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput2" placeholder="password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>