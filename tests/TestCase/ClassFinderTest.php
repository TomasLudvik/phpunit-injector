<?php
declare(strict_types=1);

namespace Zalas\PHPUnit\DependencyInjection\Tests\TestCase;

use PHPUnit\Framework\TestCase;
use Zalas\PHPUnit\DependencyInjection\TestCase\ClassFinder;
use Zalas\PHPUnit\DependencyInjection\TestCase\ServiceContainerTestCase;
use Zalas\PHPUnit\DependencyInjection\Tests\TestCase\Fixtures\TestCase1;
use Zalas\PHPUnit\DependencyInjection\Tests\TestCase\Fixtures\TestCase2;

class ClassFinderTest extends TestCase
{
    public function test_it_finds_classes_that_implement_given_interface()
    {
        $classFinder = new ClassFinder(__DIR__ . '/Fixtures');

        $classes = $classFinder->findImplementations(ServiceContainerTestCase::class);

        $this->assertSame([TestCase1::class, TestCase2::class], $classes);
    }
}
