<?php 

use PHPUnit\Framework\TestCase;

class StructureTest extends TestCase {

    private function assertClass(string $name) {
        $nameSpace = "RBVue";
        $className = "{$nameSpace}\\{$name}";
        $this->assertInstanceOf($className, new $className(), "Class {$className} canot be Instanciated");
    }

    public function testIntance() {
        foreach([
            'VueLibrary',
            'Vue',
            'VueOptions',
            'VueSession',
        ] as $className) {
            $this->assertClass($className);
        }
    }

}
