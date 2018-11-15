<?php

namespace Tests\Feature;

use App\Models\EduTopic;
use App\User;
use Tests\TestCase;

/**
 * Helper 函数库
 * Class HelperTest
 * @package Tests\Feature
 */
class HelperTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSaveTest()
    {
        $this->assertTrue(true);
    }

    public function testRandomNumber()
    {
        $this->assertTrue(strlen(random_number(10)) == 10);
    }

    public function testRouteClass()
    {
        $this->get(route('edu.video.show', 1));
        $this->assertSame(route_class(), 'edu-video-show');
    }

    public function testModelInstance()
    {
        $this->get('/?model=EduTopic&id=1');
        return $this->assertSame(EduTopic::find(1)['id'], model_instance()['id']);
    }

    public function testModuleNamespace()
    {
        $this->assertSame('\App\Http\Controllers\Admin', module_namespace('Admin'));
    }

    public function testModuleNameFromUrl()
    {
        $this->get(route('admin.module.index'));
        $this->assertSame('Admin', module_name_from_url());
    }

    public function testAccess()
    {
        $this->actingAs(User::first());
        $this->assertTrue(access('Admin-module'));
    }
}
