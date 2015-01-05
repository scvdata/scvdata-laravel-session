<?php namespace Scvdata\Session;

use File;

class ScvdataSessionHandler implements \SessionHandlerInterface{

    public function open($savePath, $sessionName) {
        return true;
    }
    public function close() {
        return true;
    }
    public function read($sessionId) {
        session_name('laravel_session');
        if(isset($_COOKIE['laravel_session'])){
            session_id($_COOKIE['laravel_session']);
        }
        session_start();
        return serialize($_SESSION);
    }
    public function write($sessionId, $data) {
        session_name('laravel_session');
        $data = unserialize($data);
        $_SESSION = $data;
        return true;
    }
    public function destroy($sessionId) {
        session_destroy();
        return true;
    }
    public function gc($lifetime) {
        return true;
    }

}