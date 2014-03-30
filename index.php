<?php

require 'model/db_connect.php';
require 'model/news_repository.php';
require 'model/user_repository.php';

// Start session management with a persistent cookie
$duration = 60 * 60;    // 1 hour in seconds
//$duration = 0;                // per-session cookie
session_set_cookie_params($duration, '/');
session_start();

if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
   // $pwd = $_SESSION['password'];
    $user = User::get_the_user_byName($uname);
    $uid = $user['uid'];
    $_SESSION['is_admin'] = $user['is_admin'];
    //echo  $is_admin;
}  else {
    $_SESSION['username'] = '';
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'news_lists';
}

if (!isset($uname)) {
    $uname = '';
}
if (!isset($pwd)) {
    $pwd = '';
}
if (!isset($city)) {
    $city = '';
}
if (!isset($state)) {
    $state = '';
}
if (!isset($cty)) {
    $cty = '';
}

if ($action == 'news_lists') {
    $news = News::get_news();
    include ('list_news.php');
} else if ($action == 'news_details') {
    $nid = $_GET['nid'];
    $news = News::get_the_news($nid);
    $uid = $news['uid'];
    $result = User::get_the_user($uid);
    include 'news_detail.php';
} else if ($action == 'register') {
    include 'register.php';
} else if ($action == 'sub_reg') {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $cty = $_POST['country'];
    if (empty($uname) || empty($pwd) || empty($city) || empty($state)) {
        echo 'Invalid Input Information!';
        include 'register.php';
    } else {
        $result = User::add_user($uname, $pwd, $city, $state, $cty);
        if ($result) {
            echo 'Successfully!';
            $user = User::get_the_user_by($uname, $pwd);
            $uid = $user['uid'];
            include 'user_mng.php';
        } else {
            echo 'Sorry, try again!';
            include 'register.php';
        }
    }
} else if ($action == 'login') {
    include 'login.php';
} else if ($action == 'login_confirm') {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $result = User::get_the_user_byName($uname);
    if (isset($result)) {
        $_SESSION['username'] = $uname;
        $_SESSION['is_admin'] = $result['is_admin'];
        $uid = $result['uid'];
        $city = $result['city'];
        $state = $result['state'];
        $cty = $result['country'];
        include 'user_mng.php';
    } else {
        include 'login.php';
    }
} else if ($action == 'view_pro') {
    $uid = $_GET['uid'];
    $result = User::get_the_user($uid);
    if (isset($result)) {
        $uname = $result['uname'];
        $pwd = $result['pwd'];
        $city = $result['city'];
        $state = $result['state'];
        $cty = $result['country'];
        include 'user_pro.php';
    } else {
        echo 'User Not Exists.';
    }
} else if ($action == 'edit_pro') {
    $uid = $_GET['uid'];
    $result = User::get_the_user($uid);
    $uname = $result['uname'];
    $pwd = $result['pwd'];
    $city = $result['city'];
    $state = $result['state'];
    $cty = $result['country'];
    include 'edit_pro.php';
} else if ($action == 'udt_pro') {
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $cty = $_POST['cty'];
    $result = User::udt_user($uid, $pwd, $city, $state, $cty);
    if (isset($result)) {
        echo 'Profile Updated.';
        include 'user_mng.php';
    } else {
        echo 'Something Wrong.';
    }
} else if ($action == 'view_rel') {
    $uid = $_GET['uid'];
    $uname = $_GET['uname'];
    $results = News::get_news_by($uid);
    include 'user_releases.php';
} else if ($action == 'del_rel') {
    $nid = $_GET['nid'];
    $uid = $_GET['uid'];
    $uname = $_GET['uname'];
    $result = News::delete_news($nid);
    if ($result) {
        $results = News::get_news_by($uid);
        include 'user_releases.php';
    }
} else if ($action == 'news_form') {
    $choose = 0;
    $uid = $_GET['uid'];
    $uname = $_GET['uname'];
    include 'news_form.php';
} else if ($action == 'add_news') {
    $headline = $_POST['headline'];
    $summary = $_POST['summary'];
    $news_body = $_POST['news_body'];
    $com_name = $_POST['com_name'];
    $com_email = $_POST['com_email'];
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $date = date('Y-m-d H:i:s');
    $result = News::add_news($headline, $summary, $news_body, $com_name, $com_email, $uid, $date);
    if ($result) {
        $results = News::get_news_by($uid);
        include 'user_releases.php';
    }
} else if ($action == 'edit_rel') {
    $choose = 1;
    $nid = $_GET['nid'];
    $news = News::get_the_news($nid);
    $uname = $_GET['uname'];
    $uid = $news['uid'];
    if (!empty($news)) {
        $headline = $news['headline'];
        $summary = $news['summary'];
        $news_body = $news['news_body'];
        $com_name = $news['com_name'];
        $com_email = $news['com_email'];
        include 'news_form.php';
    }
} else if ($action == 'udt_news') {
    $headline = $_POST['headline'];
    $summary = $_POST['summary'];
    $news_body = $_POST['news_body'];
    $com_name = $_POST['com_name'];
    $com_email = $_POST['com_email'];
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $date = date('Y-m-d H:i:s');
    $nid = $_POST['nid'];
    $result = News::udt_news($nid, $headline, $summary, $news_body, $com_name, $com_email, $uid, $date);
    if ($result) {
        $results = News::get_news_by($uid);
        include 'user_releases.php';
    }
} else if ($action == 'search_news') {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $news = News::get_news_ByTypeTitle($type, $title);
    include 'list_news.php';
} else if ($action == 'user_acc') {
    $uid = $_GET['uid'];
    $uname = $_GET['uname'];
    include 'user_mng.php';
} else if ($action == 'admin_users') {
    $results = User::get_users();
    include 'admin.php';
} else if ($action == 'edit_user') {
    $results = User::get_users();
    include 'edit_user.php';
} else if($action == 'del_user'){
    $uuid = $_GET['uuid'];
    $uname = $_GET['uname'];
    $re = News::delete_news_byUid($uuid);
    $res = User::delete_user($uuid);
    $results = User::get_users();
    include 'admin.php';
} else if($action == 'udt_user') {
    $uuid = $_GET['uuid'];
    $user = User::get_the_user($uuid);
    $is_admin = $user['is_admin'];
    if($is_admin) {
        $is_admin = 0;
    } else {
        $is_admin = 1;
    }
    $result = User::udt_user_authority($uuid, $is_admin);
    $results = User::get_users();
    include 'admin.php';
} else if ($action == 'log_out') {
    $_SESSION = array();
    session_destroy();
    header('Location: ./?action=news_lists');
}
?>