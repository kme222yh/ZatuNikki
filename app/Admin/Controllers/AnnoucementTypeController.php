<?php

namespace App\Admin\Controllers;

use App\Models\AnnouncementType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnnoucementTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AnnouncementType';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AnnouncementType());

        $grid->column('id', __('Id'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        $grid->column('name', __('Name'));
        $grid->column('priority', __('Priority'));

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
        $show = new Show(AnnouncementType::findOrFail($id));

        $show->field('id', __('Id'));
        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('priority', __('Priority'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AnnouncementType());

        $form->text('name', __('Name'));
        $form->number('priority', __('Priority'));

        return $form;
    }
}
