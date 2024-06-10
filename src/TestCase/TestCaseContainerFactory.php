<?php
declare(strict_types=1);

namespace Zalas\Injector\PHPUnit\TestCase;

use Psr\Container\ContainerInterface;
use Zalas\Injector\Service\ContainerFactory;

final class TestCaseContainerFactory implements ContainerFactory
{
    private ServiceContainerTestCase $testCase;

    public function __construct(ServiceContainerTestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function create(): ContainerInterface
    {
        return $this->testCase->createContainer();
    }
}
