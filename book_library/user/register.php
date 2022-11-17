<?php
include('config.php');

$error = array();
$data  = array();

if (!empty($_POST['dangky'])) {
    $data['user_id']    = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $data['fullname']    = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $data['class']       = isset($_POST['class']) ? $_POST['class'] : '';
    $data['email']       = isset($_POST['email']) ? $_POST['email'] : '';
    $data['phone']       = isset($_POST['phone']) ? $_POST['phone'] : '';
    $data['password']    = isset($_POST['password']) ? $_POST['password'] : '';

    $user_id = '';
    $fullname = '';
    $class = '';
    $email = '';
    $phone = '';
    $password = '';


    if (empty($data['user_id'])) {
        $error['user_id'] = 'Bạn chưa nhập mã sinh viên';
    } else {
        if (!preg_match('/((20)+([0-9]{8})\b)/', $data['user_id'])) {
            $error['user_id'] = 'Mã sinh viên phải bao gồm 10 chữ số';
        } else {
            $user_id = $data['user_id'];
            
            $sql_check = "SELECT*FROM user WHERE user_id = '$user_id'";
            $result = mysqli_query($conn, $sql_check);
            if (mysqli_num_rows($result) > 0) {
                $error['user_id'] = 'Mã sinh viên đã tồn tại';
            }
        }
    }

    if (empty($data['fullname'])) {
        $error['fullname'] = 'Bạn chưa nhập họ và tên';
    } else {
        // a-zA-Z\
        if (!preg_match('/^[\D]{3,40}$/', $data['fullname'])) {
            $error['fullname'] = 'Họ và tên phải là chữ (ít nhất 3 chữ cái)';
        } else $fullname = $data['fullname'];
    }

    if (empty($data['class'])) {
        $error['class'] = 'Bạn chưa nhập tên lớp';
    } else {
        // (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/', $data['class']))
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{2,}$/', $data['class'])) {
            $error['class'] = 'Tên lớp phải có tối thiểu 1 chữ cái và 1 số';
        } else $class = $data['class'];
    }
    if (empty($data['email'])) {
        $error['email'] = 'Bạn chưa nhập email';
    } else {
        if (!preg_match('/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z]+(\\.[A-Za-z0-9]+)$/', $data['email'])) {
            $error['email'] = 'Email: phải bao gồm ký tự @ và sau đó là dấu . ';
        } else $email = $data['email'];
    }
    if (empty($data['phone'])) {
        $error['phone'] = 'Bạn chưa nhập số điện thoại';
    } else {
        if (!preg_match('/((09|03|07|08|05)+([0-9]{8})\b)/', $data['phone'])) {
            $error['phone'] = 'Số điện thoại không hợp lệ. ';
        } else $phone = $data['phone'];
    }
    if (empty($data['password'])) {
        $error['password'] = 'Bạn chưa nhập mật khẩu';
    } else {
        if (!preg_match('/^[A-Za-z\d]{6,}$/', $data['password'])) {
            $error['password'] = 'Mật khẩu tối thiểu 6 ký tự.';
        } else $password = $data['password'];
    }
    if (!$error) {
        $insert_user = "INSERT INTO user(user_id ,fullname,class,phone,email,password) VALUES ('" . $user_id . "','" . $fullname . "','" . $class . "','" . $phone . "','" . $email . "','" . $password . "')";
        if (mysqli_query($conn, $insert_user)) {

            echo '<script>
            alert("Đăng ký thành công");
            window.location = "login.php";
            </script>';
        }
    }
}
?>

<html>

<head>
    <title>Đăng ký | Thư viện HaUI</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <style>
        #submit_button {
            line-height: 55px;
        }

        .error {
            text-align: left;
        }

        main {
            flex: 1 0 auto;
        }

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: #fff;
        }

        .indigo-text {
            color: #10b571 !important;
        }

        .indigo {
            background-color: #17c77e !important;
        }

        .input-field input[type=date]:focus+label,
        .input-field input[type=text]:focus+label,
        .input-field input[type=email]:focus+label,
        .input-field input[type=password]:focus+label {
            color: #17c77e;
        }

        .input-field input[type=date]:focus,
        .input-field input[type=text]:focus,
        .input-field input[type=email]:focus,
        .input-field input[type=password]:focus {
            border-bottom: 2px solid #17c77e;
            box-shadow: none;
        }

        .row input {
            width: 300px;
        }
    </style>
</head>

<body>
    <main>
        <center>
            <div class="section"></div>

            <div class="section">

                <img class="responsive-img" style="width: 250px;" src="images/logo-thuvien_hauii.png" />
            </div>

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form action="" autocomplete="on" class="col s12" method="POST">
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='user_id' id='user_id' value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : ''; ?>" />
                                <div class="error" style="color: red;"><?php echo isset($error['user_id']) ? $error['user_id'] : ''; ?></div>
                                <label for='user_id'>Mã sinh viên</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='fullname' id='fullname' value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''; ?>" />
                                <div class="error" style="color: red;"><?php echo isset($error['fullname']) ? $error['fullname'] : ''; ?></div>
                                <label for='fullname'>Họ và tên</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='class' id='class' value="<?php echo isset($_POST['class']) ? $_POST['class'] : ''; ?>" />
                                <div class="error" style="color: red;"><?php echo isset($error['class']) ? $error['class'] : ''; ?></div>
                                <label for='class'>Lớp</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='phone' id='phone' value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" />
                                <div class="error" style="color: red;"><?php echo isset($error['phone']) ? $error['phone'] : ''; ?></div>
                                <label for='phone'>Số điện thoại</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='email' id='email' value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                                <div class="error" style="color: red;"><?php echo isset($error['email']) ? $error['email'] : ''; ?></div>
                                <label for='email'>Email</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" />
                                <div class="error" style="color: red;"><?php echo isset($error['password']) ? $error['password'] : ''; ?></div>
                                <label for='password'>Mật khẩu</label>
                            </div>
                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <input id="submit_button" type='submit' name='dangky' class='col s12 btn btn-large waves-effect indigo' value="Đăng ký">
                            </div>
                            <label>
                                <a class='pink-text' style="color: #17c77e !important; font-size: 14px;" href='login.php'><b>Đã có tài khoản</b></a>
                            </label>
                        </center>
                    </form>
                </div>
            </div>
        </center>

    </main>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>