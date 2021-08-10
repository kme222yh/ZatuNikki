<?php

namespace App\Admin\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnnoucementController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Announcement';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Announcement());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('contents', __('Contents'));
        // $grid->column('announcement_type_id', __('Announcement type id'));

        $grid->column('type')->display(function(){
            return $this->type->name;
        });

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->model()->orderBy('updated_at', 'desc');

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
        $show = new Show(Announcement::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('title', __('Title'));
        $show->field('contents', __('Contents'));
        $show->field('announcement_type_id', __('Announcement type id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Announcement());

        $form->text('title', __('Title'));
        $form->textarea('contents', __('Contents'));
        // $form->number('announcement_type_id', __('Announcement type id'));

        $annoucement_types_id_options = [];
        $tmp = AnnouncementType::orderBy('id')->get(['id', 'name']);
        if ($tmp->isNotEmpty()) {
            $list = $tmp->all();
            foreach ($list as $v) {
                $annoucement_types_id_options[$v->id] = $v->name;
            }
        }
        $form->select('announcement_type_id', 'announcement_type')->options($annoucement_types_id_options)->rules('required');

        return $form;
    }
}
