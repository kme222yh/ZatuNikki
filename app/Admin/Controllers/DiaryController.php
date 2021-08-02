<?php

namespace App\Admin\Controllers;

use App\Models\Diary;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DiaryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Diary';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Diary());

        $grid->column('id', __('Id'));
        $grid->column('date', __('Date'));
        $grid->column('title', __('Title'));
        $grid->column('contents', __('Contents'));
        $grid->column('published', __('Published'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('user_id', __('User id'));
        $grid->column('last_displayed', __('Last displayed'));

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
        $show = new Show(Diary::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('date', __('Date'));
        $show->field('title', __('Title'));
        $show->field('contents', __('Contents'));
        $show->field('published', __('Published'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('user_id', __('User id'));
        $show->field('last_displayed', __('Last displayed'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Diary());

        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->text('title', __('Title'));
        $form->textarea('contents', __('Contents'));
        $form->switch('published', __('Published'));
        $form->number('user_id', __('User id'));
        $form->datetime('last_displayed', __('Last displayed'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
