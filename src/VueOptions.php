<?php

namespace RBVue;

class VueOptions {

    public $el = '#app';
    public $data = [];
    public $methods = [];
    public $computed = [];
    public $watch = [];
    public $filters = [];
    public $components = [];
    public $props = [];
    public $template = '';
    public $render = '';
    public $renderError = '';
    public $beforeCreate = '';
    public $created = '';
    public $beforeMount = '';
    public $mounted = '';
    public $beforeUpdate = '';
    public $updated = '';
    public $activated = '';
    public $deactivated = '';
    public $beforeDestroy = '';
    public $destroyed = '';
    public $errorCaptured = '';
    public $serverPrefetch = '';

    private $sessionName = 'vue-session';
    private array $modules = [];

    public function __construct(array $options = []) {
        foreach($options as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __toString() {
        return json_encode($this);
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __call($name, $arguments) {
        $this->$name = $arguments[0];
    }

    public function __invoke($name, $arguments) {
        $this->$name = $arguments[0];
    }

    public function __isset($name) {
        return isset($this->$name);
    }

    public function __unset($name) {
        unset($this->$name);
    }

    public function getArray():array {
        return [
            'el' => $this->el,
            'data' => $this->data,
            'methods' => $this->methods,
            'computed' => $this->computed,
            'watch' => $this->watch,
            'filters' => $this->filters,
            'components' => $this->components,
            'props' => $this->props,
            'template' => $this->template,
            'render' => $this->render,
            'renderError' => $this->renderError,
            'beforeCreate' => $this->beforeCreate,
            'created' => $this->created,
            'beforeMount' => $this->beforeMount,
            'mounted' => $this->mounted,
            'beforeUpdate' => $this->beforeUpdate,
            'updated' => $this->updated,
            'activated' => $this->activated,
            'deactivated' => $this->deactivated,
            'beforeDestroy' => $this->beforeDestroy,
            'destroyed' => $this->destroyed,
            'errorCaptured' => $this->errorCaptured,
            'serverPrefetch' => $this->serverPrefetch,
            'modules' => $this->modules,
        ];
    }

    public function module(string $path) {
        $this->modules[] = $path;
    }

    public function component(string $path) {
        $this->components[] = $path;
    }
}