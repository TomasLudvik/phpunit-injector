<?php
declare(strict_types=1);

namespace Zalas\Injector\PHPUnit\TestCase;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Zalas\Injector\Factory\DefaultExtractorFactory;
use Zalas\Injector\Service\Injector;

trait ServiceInjectorTrait
{
    #[Before]
    public function injectServices(): void
    {
        if ($this instanceof ServiceContainerTestCase) {
            $injector = new Injector(new TestCaseContainerFactory($this), new DefaultExtractorFactory([TestCase::class, Assert::class]));
            $injector->inject($this);
        } else {
            throw new RuntimeException(sprintf('Test case %s must implement %s to enable service injection.', get_class($this), ServiceContainerTestCase::class));
        }
    }
}
