<?php
namespace Album\V1\Rpc\Dashboard;

class DashboardControllerFactory
{
    public function __invoke($controllers)
    {
        return new DashboardController($controllers);
    }
}
