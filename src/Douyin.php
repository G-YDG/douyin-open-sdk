<?php

declare(strict_types=1);

namespace Ydg\DouyinOpenSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property Oauth\Oauth $oauth
 * @property Api\Life\OutsideDistribution\OutsideDistribution $lifeOutsideDistribution
 */
class Douyin extends ServiceContainer
{
    protected $providers = [
        Oauth\ServiceProvider::class,
        Api\Life\OutsideDistribution\ServiceProvider::class,
    ];
}
