<?php

namespace RBVue;

class VueSession {

    public static function init() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

}