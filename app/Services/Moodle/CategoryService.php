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
        ddd($this->params);
        $categories = $this->service->get($this->url, $this->params);
        
        return $categories;
    }
}

