<?php

namespace StefanoTreeTest;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\Framework\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    use TestCaseTrait {
        TestCaseTrait::setUp as traitSetUp;
        TestCaseTrait::tearDown as traitTearDown;
    }
    use MockeryPHPUnitIntegration;

    protected function getConnection()
    {
        return $this->createDefaultDBConnection(TestUtil::getPDOConnection());
    }

    protected function setUp()
    {
        TestUtil::createDbScheme();
        $this->traitSetUp();
        parent::setUp();
    }

    protected function tearDown()
    {
        $this->traitTearDown();
        parent::tearDown();
    }
}
