<?php 

use
    PHPUnit\Framework\TestCase,
    RBVue\Vue,
    RBVue\VueOptions;

class VueInstanceTest extends TestCase {

    private function assertClass(Vue $meuVueApp) {
        $this->assertTrue($meuVueApp instanceof \RBVue\Vue, "Class Vue cannot be Instanciated");
        $this->assertIsString($meuVueApp->render(), "Method render must return a string");
        $this->assertClassReturn($meuVueApp);
    }

    private function assertClassReturn(Vue $meuVueApp) {
        ob_start();
        $meuVueApp->run();
        $this->assertEquals(ob_get_clean(), $meuVueApp->render(), "Render or Run method must return the same result");
    }

    public function testIntanceWithoutOptions() {
        $meuVueApp = new Vue();
        $this->assertClass($meuVueApp);
    }

    public function testIntanceWithOptions() {
        $options = new VueOptions([
            'version' => ['major' => 3, 'full' => "3.0.0"]
        ]);
        $meuVueApp = new Vue($options);
        $this->assertClass($meuVueApp);
    }

}