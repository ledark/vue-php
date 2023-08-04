<?php

use PHPUnit\Framework\TestCase;
use RBVue\Remote;

class RemoteTest extends TestCase {

    public function testRemote() {
        $content = Remote::getHtml('');
        $this->assertStringContainsString('Vue-php', $content);
    }

}