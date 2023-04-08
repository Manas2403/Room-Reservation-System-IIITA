<?php
require_once("../model/connect.php");
require_once("../model/query.php");
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
function login($email, $password)
{
    if ($email && $password) {
        $server = "ldap://172.31.1.41";
        $dn = "dc=iiita,dc=ac,dc=in";
        $port = "389";
        error_reporting(0);
        $ds = ldap_connect($server, $port);
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        $a = ldap_search($ds, "dc=iiita,dc=ac,dc=in", "uid=$email");
        $b = ldap_get_entries($ds, $a);
        $dn = $b[0];
        debug_to_console($dn['mailhost']);
        // $flag = (ldap_bind($ds, $dn, $password) ? TRUE : FALSE);
        // debug_to_console($flag);
        ldap_close($ds);
        $uid = $dn['uid'][0];
        $fullname = $dn['gecos'][0];
        $mail = $dn['mail'][0];
        if (!userExists($email)) {
            if ($dn['businesscategory'][1] == 'faculty') {
                $userType = 2;
            } else {
                $userType = 2;
            }
            $res = addUser($uid, $fullname, $mail, $userType);
            $_SESSION['username'] = $uid;
            $_SESSION['userType'] = $userType;
        } else {
            $res = getUser($uid);
            echo "ahha";
            echo $res[0];
            $_SESSION['username'] = $res[0];
            $_SESSION['userType'] = $res[3];
        }

        return true;

    }
    return false;
}
@error_reporting(0);
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if (login($email, $password)) {
    if (isset($_SESSION['username'])) {
        if ($_SESSION['userType'] == 1) {
            header('Location: ../adminhome.php');
        } else if ($_SESSION['userType'] == 2) {
            header('Location: ../facultyhome.php');
        } else if ($_SESSION['userType'] == 3) {
            header('Location: ../facultybookinglog.php');
        }
    }
}
?>