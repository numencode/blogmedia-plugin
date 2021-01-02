<?php namespace NumenCode\BlogMedia;

use System\Classes\PluginBase;
use NumenCode\BlogMedia\Classes\ExtendBlogPostModel;
use NumenCode\BlogMedia\Classes\ExtendBlogPostFields;

class Plugin extends PluginBase
{
    public $require = [
        'RainLab.Blog',
        'NumenCode.Fundamentals',
    ];

    public function boot()
    {
        (new ExtendBlogPostModel())->init();
        (new ExtendBlogPostFields())->init();
    }
}
