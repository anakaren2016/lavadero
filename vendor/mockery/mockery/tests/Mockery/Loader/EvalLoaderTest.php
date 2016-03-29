<?php

namespace Mockery\Loader;

use Mockery as m;

require_once __DIR__ . '/LoaderTestCase.php';

class EvalLoaderTest extends LoaderTestCase
{
    public function getLoader()
    {
        return new EvalLoader();
    }
}
