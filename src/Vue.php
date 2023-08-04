<?php

namespace RBVue;

class Vue {

    private VueOptions $options;
    private string $_rendered = '';

    public function __construct(VueOptions $options = null) {
        if(is_null($options)) $options = new VueOptions();
        $this->options = $options;
    }

    public function module(string $path) {
        $this->options->modules[] = $path;
    }

    /**
     * run function to display rendered result
     *
     * @return void
     */
    public function run() {
        echo $this->render();
    }

    /**
     * rend function to render the Vue instance using the options
     *
     * @return string
     */
    public function render():string {
        return $this->_rendered;
    }

}