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
        debug_to_console($dn);
        $flag = (ldap_bind($ds, $dn, $password) ? TRUE : FALSE);
        ldap_close($ds);
        if ($flag) {
            if (!userExists($email)) {
                // $fullname = $dn[];
            }
            return true;
        } else
            return false;
    }
    return false;
}
@error_reporting(0);
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if (login($email, $password)) {
    echo ("Login Successful");
}
?>