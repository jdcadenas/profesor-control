<?php


namespace App\Services\Moodle;


class CourseService extends BaseRestService
{

    /**
     * Returns api data -  All courses
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     */
    public function getAll()
    {
        $this->params['wsfunction'] = 'core_course_get_courses';
        $courses = $this->service->get($this->url, $this->params);
        $courses['data'] = array_map(function ($item) {
            $item['startdate'] = self::toDateTime($item['startdate']);
            $item['enddate'] = self::toDateTime($item['enddate']);
            return $item;
        }, $courses['data']);
        return $courses;
    }

     /**
     * Get all courses by ids
     * @param array $ids
     * @return CourseCollection
     */
    public function getAll(array $ids = [])
    {
        $this->params['wsfunction'] = 'core_course_get_courses';
        $this->params['options[ids][0]'] =  $ids;
        
        return $this->service->get($this->url, $this->params);
    }

        $response = $this->sendRequest('core_course_get_courses', ['options' => ['ids' => $ids]]);

        return $this->getCourseCollection($response);
    }

    /**
     * Get course by field
     * @param $field
     * @param $value
     * @return CourseCollection
     */
    public function getByField($field, $value)
    {
        $arguments = [
            'field' => $field,
            'value' => $value,
        ];

        $response = $this->sendRequest('core_course_get_courses_by_field', $arguments);

        return $this->getCourseCollection($response['courses']);
    }

    /**
     * Create new course
     * @param \F0\LaravelMoodleClient\Entities\Dto\Course[] ...$courses
     * @return CourseCollection
     */
    public function create(CourseDto ...$courses)
    {
        $response = $this->sendRequest(
            'core_course_create_courses',
            [
                'courses' => $this->prepareEntityForSending(...$courses)
            ]
        );

        return $this->getCourseCollection($response);
    }

    /**
     * Delete courses by ids
     * @param array $ids
     * @return mixed
     */
    public function delete(array $ids = [])
    {
        $response = $this->sendRequest('core_course_delete_courses', ['courseids' => $ids]);

        return $response;
    }

    /**
     * Get course collection by course array
     * @param array $courses
     * @return CourseCollection
     */
    protected function getCourseCollection(array $courses)
    {
        $courseItems = [];
        foreach ($courses as $courseItem) {
            $courseItems[] = new CourseItem($courseItem);
        }

        return new CourseCollection(...$courseItems);
    }
}
