<?php namespace Serverfireteam\blog\panel;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Serverfireteam\Panel\CrudController;
use \Illuminate\Routing\Controllers;
/**
 * Description of PagePanel
 *
 * @author alireza
 */
class PageController extends CrudController{
    
    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new \Page());
        $this->filter->add('id', 'ID', 'text');
        $this->filter->add('title', 'Title', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();
        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('title','Title');
        $this->addStylesToGrid();          

        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new \Page());

        $this->edit->label('Edit Pages');
        $this->edit->add('title','Title', 'text')->rule('required|min:5');
        $this->edit->add('slug','Page url slug', 'text')->rule('required|min:5');
        $this->edit->add('content','Content', 'redactor');
        $this->edit->add('public','Public','checkbox');
        return $this->returnEditView();
    }
}
