<?php
namespace Xiaoming\JunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
/**
 * 这是单元测试组件的服务提供者
 * 用来加载junit组件的
 *
 * 组件传统方式的引用的话 就是 composer require xxxxxx组件
 * 然后只要网咯ok就可以从GitHub上下载下来
 */
class JunitServiceProvider extends ServiceProvider
{

    public function register()
    {
        // echo '这是junt 服务提供者';
        // 注册组件路由
        $this->registerRoutes();
        // 指定的组件的名称，自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'junit'
        );
    }

    public function boot()
    {
        //
    }
    // 参考别人的写法
    // 对于源码熟悉更好一些
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            // 定义访问路由的域名
            // 'domain' => config('telescope.domain', null),
            // 是定义路由的命名空间
            'namespace' => 'Xiaoming\JunitLaravel\Http\Controllers',
            // 这是前缀
            'prefix' => 'junit',
            // 这是中间件
            'middleware' => 'web',
        ];
    }
}