<?php

class XdgTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return \ShopwareCli\Services\PathProvider\DirectoryGateway\Xdg
     */
    public function getXdg()
    {
        return new \ShopwareCli\Services\PathProvider\DirectoryGateway\Xdg();
    }

    public function testXdgPutCache()
    {
        putenv('XDG_CACHE_HOME=tmp/');
        $this->assertEquals('tmp/', $this->getXdg()->getHomeCacheDir());
    }

    public function testXdgPutData()
    {
        putenv('XDG_DATA_HOME=tmp/');
        $this->assertEquals('tmp/', $this->getXdg()->getHomeDataDir());
    }


    public function testXdgPutConfig()
    {
        putenv('XDG_CONFIG_HOME=tmp/');
        $this->assertEquals('tmp/', $this->getXdg()->getHomeConfigDir());
    }
    
    public function testXdgDataDirsShouldIncludeHomeDataDir()
    {
        putenv('XDG_DATA_HOME=tmp/');

        $this->assertEquals('tmp/', $this->getXdg()->getDataDirs()[0]);
    }


    public function testXdgConfigDirsShouldIncludeHomeConfigDir()
    {
        putenv('XDG_CONFIG_HOME=tmp/');

        $this->assertEquals('tmp/', $this->getXdg()->getConfigDirs()[0]);
    }

}