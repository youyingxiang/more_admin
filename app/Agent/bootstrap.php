<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);
//\Encore\Admin\Show::init(function (\Encore\Admin\Show $show) {
//    $show->panel()->tools(function (\Encore\Admin\Show\Tools $tools) {
//        $tools->disableDelete();
//        $tools->disableEdit();
//    });
//});
//\Encore\Admin\Form::init(function (\Encore\Admin\Form $form) {
//    $form->tools(function (\Encore\Admin\Form\Tools $tools) {
//        $tools->disableDelete();
//        $tools->disableView();
//    });
//    $form->disableViewCheck();
//    $form->disableEditingCheck();
//    $form->disableCreatingCheck();
//});
//\Encore\Admin\Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {
//    $navbar->right(new \Agent\Extensions\Nav\Links());
//});
//app('view')->prependNamespace('admin', resource_path('views/vendor/laravel-admin'));
