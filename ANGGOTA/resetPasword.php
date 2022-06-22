<?php
include_once("navbar.php");
include('../conn.php');

$id = $_GET["user"];

$email = query("SELECT email FROM anggota WHERE id_anggota = $id")[0];

?>

<!-- reset password button -->
<?php if (isset($_POST["reset_password"])) : ?>

    <?php
    $email = $_POST["email"];
    $password = $_POST["password_lama"];

    $result = mysqli_query($conn, "SELECT * FROM anggota WHERE email = '$email' AND password = '$password'");

    if ($result->num_rows  > 0) {
        while ($anggota = mysqli_fetch_array($result)) {
            $name = $anggota["nama_anggota"];
            $_SESSION["nama"] = $name;
            $id = $anggota["id_anggota"];
        }
        $_SESSION["email"] = $email;

        if (resetPasword($id, $_POST) > 0) {
            echo "
            <script>
                alert('Password berhasil diperbarui');
                document.location.href = 'dashboard.php?user=$id';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Ubah Gagal');
                document.location.href = 'dashboard.php?user=$id';
            </script>
            ";
        }
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
                        <h1 class="text-danger">Reset Password</h1>
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
                            <input type="email" value="<?= $email["email"]; ?>" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password_lama" class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" id="password_lama" placeholder="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_baru" class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" id="password_baru" placeholder="password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="reset_password" class="btn btn-primary">Ubah Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php") ?>