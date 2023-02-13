<?php
ini_set( 'session.cookie_lifetime', 86400 );
ini_set( 'session.gc_maxlifetime', 86400 );
ob_start();
session_start();
if ( !isset( $_SESSION[ 'uid' ] ) && empty( stripos( $_SERVER[ 'REQUEST_URI' ], 'login.php' ) ) ) {
  header( "location:login.php" );
}
?>