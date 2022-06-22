<?php include_once("navbar.php") ?>
<?php
include('../conn.php');
// session_start();
?>
<!-- tombol login -->
<?php if (isset($_POST["login"])) : ?>

    <?php
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM anggota WHERE email = '$email' AND password = '$password'");
    // $login = query("SELECT * FROM anggota WHERE email = '$email' AND password = '$password'")[0];


    if ($result->num_rows  > 0) {
        // $anggota = mysqli_fetch_assoc($result);
        while ($anggota = mysqli_fetch_array($result)) {
            $name = $anggota["nama_anggota"];
            $_SESSION["nama"] = $name;
            $id = $anggota["id_anggota"];
        }
        $_SESSION["email"] = $email;


        echo "<script>window.location.href='dashboard.php?user=$id'</script>";
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
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email">
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