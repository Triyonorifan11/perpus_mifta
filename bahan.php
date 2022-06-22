<!-- index.php -->
<div id="konten">
    <form action="" method="POST">
        <fieldset>
            <legend>Form Member</legend>
            <label>username</label>
            <input type="text" name="username" />
            <label>email</label>
            <input type="text" name="email" />
            <label>password</label>
            <input type="password" name="password" />
            <input type="submit" name="submit" value="Submit" />
        </fieldset>
    </form>
</div>

<!-- style.css -->
#konten {
margin: 20px auto;
width: 300px;
font-family: Helvetica;
font-size: 0.8em;
}
#konten form fieldset label, #konten form fieldset input {
width: 100%;
float: left;
margin-top: 5px;
}
#konten form fieldset legend {
padding: 5px;
background-color: #DBEAF9;
font-weight: bold;
}
#konten form fieldset {
background-color: #ECF4FC;
border: 1px solid #DBEAF9;
}
#konten form fieldset input[type=submit] {
width: 30% !important;
margin-top: 20px;
}


<!-- aksi untuk kirim email -->
if(isset($_POST['submit'])) {

define('ROOT', 'http://localhost/septian/tes/untuk_blog/v_email/');
$koneksi=mysql_connect('localhost','root','');
mysql_select_db('untuk_blog',$koneksi);

$kode = md5(uniqid(rand()));
$password = md5($_POST['password']);

$query = mysql_query("INSERT INTO verifikasi_email (id, username, password, email, aktif, kode) VALUES ('', '$_POST[username]', '$password', '$_POST[email]','T', '$kode' )") or die (mysql_error());

$to = $_POST['email'];
$judul = "Aktivasi Akun Anda";
$dari = "From: suckittrees@web.com \n";
$dari .= "Content-type: text/html \r\n";

$pesan = "Klik link berikut untuk mengaktifkan akun: <br />";
$pesan .= "<a href='".ROOT."konfirm.php?email=".$_POST[' email']."&kode=$kode&username=".$_POST['username']."'>".ROOT."konfirm.php?email=".$_POST[' email']."&kode=$kode</a>";

    $kirim = mail($to, $judul, $pesan, $dari);

    if($kirim AND $query)
    {
    echo "<p class="info">Berhasil Dikirim</p>";
    }
    else
    {
    echo "<p class="infoGagal">Gagal Dikirim</p>";
    }

    }

    kode semuanya
    <html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div id="konten">
            <form method="POST" action="">
            <fieldset>
                <legend>Form Member</legend>
                <label>username</label>
                <input type="text" name="username" />
                <label>email</label>
                <input type="text" name="email" />
                <label>password</label>
                <input type="password" name="password" />
                <input type="submit" name="submit" value="Submit" />
            </fieldset>
            </form>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit'])) {
 
        define('ROOT', 'http://localhost/septian/tes/untuk_blog/v_email/');
        $koneksi=mysql_connect('localhost','root','');
        mysql_select_db('untuk_blog',$koneksi);
 
        $kode   = md5(uniqid(rand()));
        $password = md5($_POST['password']);
 
        $query = mysql_query("INSERT INTO verifikasi_email (id, username, password, email, aktif, kode) VALUES ('', '$_POST[username]', '$password', '$_POST[email]','T', '$kode' )") or die (mysql_error());
 
        $to     = $_POST['email'];
        $judul  = "Aktivasi Akun Anda";
        $dari   = "From: suckittrees@web.com \n";
        $dari   .= "Content-type: text/html \r\n";
 
        $pesan  = "Klik link berikut untuk mengaktifkan akun: <br />";
        $pesan  .= "<a href='".ROOT."konfirm.php?email=".$_POST['email']."&kode=$kode&username=".$_POST['username']."'>".ROOT."konfirm.php?email=".$_POST['email']."&kode=$kode</a>";
 
        $kirim  = mail($to, $judul, $pesan, $dari);
 
        if($kirim AND $query)
        {
            echo "<p class="info">Berhasil Dikirim</p>";
        }
        else
        {
            echo "<p class="infoGagal">Gagal Dikirim</p>";
        }
 
    }
?>


<!-- konfirm.php -->
<?php
    $kode = $_GET['kode'];
    $username = $_GET['username'];
 
    $koneksi=mysql_connect('localhost','root','');
    mysql_select_db('untuk_blog',$koneksi);
 
    $query = mysql_query("UPDATE verifikasi_email SET aktif = 'Y' WHERE kode = '".$kode."'") or die (mysql_error());
 
    if($query) {
        echo "Member dengan username <strong>".$username."</strong> telah diaktifkan";
    } else {
        echo "Gagal diaktifkan";
    }
?>



<!-- loading.html -->
