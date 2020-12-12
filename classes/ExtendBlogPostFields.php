<?php namespace NumenCode\BlogMedia\Classes;

use RainLab\Blog\Models\Post;
use NumenCode\Fundamentals\Bootstrap\ConfigOverride;

class ExtendBlogPostFields
{
    public function init()
    {
        ConfigOverride::extendFields(Post::class, function ($config) {
            unset($config['secondaryTabs']['fields']['featured_images']);

            $config['secondaryTabs']['fields'] = array_merge($config['secondaryTabs']['fields'], [
                'picture' => [
                    'label' => 'numencode.fundamentals::lang.field.picture_main',
                    'tab'   => 'numencode.fundamentals::lang.field.media',
                    'type'  => 'mediafinder',
                    'mode'  => 'image',
                    'span'  => 'auto',
                ],
                'gallery' => [
                    'label' => 'numencode.fundamentals::lang.field.picture_gallery',
                    'tab'   => 'numencode.fundamentals::lang.field.media',
                    'type'  => 'repeater',
                    'span'  => 'auto',
                    'form'  => [
                        'fields' => [
                            'title'        => [
                                'label' => 'numencode.fundamentals::lang.field.title',
                                'type'  => 'text',
                                'span'  => 'full',
                            ],
                            'is_published' => [
                                'label'   => 'numencode.fundamentals::lang.field.is_published',
                                'comment' => 'numencode.fundamentals::lang.field.is_published_comment',
                                'type'    => 'switch',
                                'span'    => 'auto',
                                'default' => true,
                            ],
                            'picture'      => [
                                'label' => 'numencode.fundamentals::lang.field.picture',
                                'type'  => 'mediafinder',
                                'mode'  => 'image',
                                'span'  => 'auto',
                            ],
                        ],
                    ],
                ],
                'files'   => [
                    'label' => 'numencode.fundamentals::lang.field.files',
                    'tab'   => 'numencode.fundamentals::lang.field.files',
                    'type'  => 'repeater',
                    'span'  => 'auto',
                    'form'  => [
                        'fields' => [
                            'title'        => [
                                'label' => 'numencode.fundamentals::lang.field.title',
                                'type'  => 'text',
                                'span'  => 'full',
                            ],
                            'is_published' => [
                                'label'   => 'numencode.fundamentals::lang.field.is_published',
                                'comment' => 'numencode.fundamentals::lang.field.is_published_comment',
                                'type'    => 'switch',
                                'span'    => 'auto',
                                'default' => true,
                            ],
                            'file'         => [
                                'label' => 'numencode.fundamentals::lang.field.file',
                                'type'  => 'mediafinder',
                                'mode'  => 'file',
                                'span'  => 'auto',
                            ],
                        ],
                    ],
                ],
            ]);

            $config['secondaryTabs']['fields']['published']['span'] = 'auto';
            $config['secondaryTabs']['fields']['published']['comment'] = 'numencode.fundamentals::lang.field.is_published_comment';
            $config['secondaryTabs']['fields']['user']['span'] = 'auto';
            $config['secondaryTabs']['fields']['published_at']['span'] = 'auto';
            $config['secondaryTabs']['fields']['excerpt']['span'] = 'full';

            $config['secondaryTabs']['fields'] = array_move_element_before($config['secondaryTabs']['fields'], 'user', 'published_at');
            $config['secondaryTabs']['fields'] = array_move_element_before($config['secondaryTabs']['fields'], 'user', 'excerpt');

            return $config;
        });
    }
}
