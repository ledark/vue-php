<?php

namespace RBVue;

class VueLibrary {

    public static function getScriptUriGlobal():string {
        return 'https://unpkg.com/vue@3/dist/vue.global.js';
    }

    public static function getScriptUriESModule():string {
        return 'https://unpkg.com/vue@3/dist/vue.esm-browser.js';
    }

}