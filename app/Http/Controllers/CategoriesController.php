<?php

namespace App\Http\Controllers;

use App\Services\Moodle\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriesController extends Controller
{

    protected $categoryService;

    public function __construct() {
        $this->categoryService = app(CategoryService::class);
    }
    //
    function buildTree(array $categories, $parent_id = 0)
    {    
        $tree = [];
        foreach ($categories as $category) {           
            if ($category['parent'] == $parent_id) {          
                $children = $this->buildTree($categories, $category['id']);       
                if ($children) {
                    $category['children'] = $children;              
                }
                $tree[] = $category;
            }
        }
        return $tree;
    }


    public function indextre()
    {
        $function = "core_course_get_categories";

        #$categories = Http::get('https://plataforma-arrow.online/webservice/rest/server.php', [
        $categories = Http::get('http://localhost/moodle/webservice/rest/server.php', [

            'wstoken' => env('APP_KEY_URL'),
            'moodlewsrestformat' => 'json',
            'wsfunction' => $function,

          #  http://localhost/moodle/webservice/rest/server.php?wstoken=66607fe2f5d099c28c9a4e30f718f0cc&moodlewsrestformat=json&wsfunction=core_course_get_courses
        ])->json();

        $tree = $this->buildTree($categories);

        return view('panel.categories.treeView', compact('tree'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request): View
    {
        
        $dataMoodle  = $this->categoryService->getAll();
        $dataMoodle = $dataMoodle["data"];
        
        return view('panel.categories.index',compact( 'dataMoodle'));
           
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id) 
    {
        $category  = $this->categoryService->getbyid($id);
        $category = $category["data"];
        dd($category);
        return view('panel.categories.show',compact( 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateSchoolRequest $request, School $school)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(School $school)
    // {
    //     //
    // }
}