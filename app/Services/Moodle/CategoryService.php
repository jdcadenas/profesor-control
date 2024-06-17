<?php


namespace App\Services\Moodle;


class CategoryService extends BaseRestService
{

    /**
     * Returns api data -  All courses
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     */
    public function getAll()
    {
        $this->params['wsfunction'] = 'core_course_get_categories';
        $categories = $this->service->get($this->url, $this->params);
        
        return $categories;
    }

    public function getbyid($id)
    {
        $this->params['wsfunction'] = 'core_course_get_categories';
        $this->params['criteria[0][key]'] = 'id';
        $this->params['criteria[0][value]'] = $id;
        
        $categories = $this->service->get($this->url, $this->params);
       
        return $categories;
    }

    public function update($category,$id){
       
        $this->params['wsfunction'] = 'core_course_update_categories';
        $this->params['categories[0][id]'] = $id;
        $this->params['categories[0][name]'] = $category->name;
        $this->params['categories[0][description]'] = $category->description;
        //$this->params['categories[0][parent]'] = $category['parent'];

        $this->service->post($this->url, $this->params);



    }


    public function delete($id){
       
        $this->params['wsfunction'] = 'core_course_delete_categories';
        $this->params['categories[0][id]'] = $id;
        dd($this->params);

        $this->service->post($this->url, $this->params);



    }
}

