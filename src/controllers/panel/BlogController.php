<?php namespace Serverfireteam\blog\panel;

use Serverfireteam\Panel\CrudController;
use \Illuminate\Routing\Controllers;

class BlogController extends \Serverfireteam\Panel\CrudController {

    public function all($entity) {

        parent::all($entity);

        $this->filter = \DataFilter::source(new \App\Blog());
        $this->filter->add('id', 'ID', 'text');
        $this->filter->add('title', 'Title', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'ID', true)->style("width:100px");
        $this->grid->add('title', 'title');
        $this->grid->add('socialPoint', 'social Point');
        $this->addStylesToGrid();

        return $this->returnView();
    }

    public function edit($entity) {

        parent::edit($entity);

        $this->edit = \DataEdit::source(new \App\Blog());

        $this->edit->label('Edit Project');
        $this->edit->add('title', 'post title', 'text')->rule('required|min:3');
        $this->edit->add('author', 'author', 'text')->rule('required|min:2');
        $this->edit->add('content', 'content', 'redactor')->rule('required');
        $this->edit->add('image', 'image', 'image')->move('uploads/');
        $this->edit->add('color', 'Color', 'colorpicker');
        $this->edit->add('public', 'public', 'radiogroup')->option(0, 'Draft')->option(1, 'Ready');

        return $this->returnEditView();
    }
}
