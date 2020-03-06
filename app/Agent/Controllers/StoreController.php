<?php

namespace App\Agent\Controllers;

use App\Models\Store;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StoreController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Store());
        $grid->disableFilter();
        $grid->column('id', __('Id'));
        //  $grid->column('username', __('用户名'));

        $grid->column('name', __('商户名'));
        $grid->column('agent.name', __('归属代理商'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Store::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('username', __('用户名'));
        $show->field('name', __('商户名'));
        //  $show->agent()->name("agent_id",__('归属代理商'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Store());

        $form->text('username', __('用户名'))
            ->creationRules(['required', "unique:store"])
            ->updateRules(['required', "unique:store,username,{{id}}"]);
        $form->text('name', __('商户名'))
            ->rules('required');
        $form->select('agent_id', '代理商')->options(Agent::latest()->pluck("name",'id'));
        $form->password('password', __('密码'))
            ->rules('required|confirmed');
        $form->password('password_confirmation', __('确认密码'))
            ->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });
        $form->ignore(['password_confirmation']);
        $form->display('created_at', __('创建时间'));
        $form->display('updated_at', __('更新时间'));
        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });

        return $form;
    }
}
