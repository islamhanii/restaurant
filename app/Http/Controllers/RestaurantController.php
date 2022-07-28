<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chef;
use App\Models\Dish;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $categoryModel;
    private $dishModel;
    private $chefModel;

    public function __construct(Category $category, Dish $dish, Chef $chef) {
        $this->categoryModel = $category;
        $this->dishModel = $dish;
        $this->chefModel = $chef;
    }

    /*******************************************************************************************/

    public function getMenu() {
        $menu = $this->categoryModel->inRandomOrder()->take(4)->get();
        foreach($menu as $category) {
            $category->dishes = $this->dishModel->select('name', 'price', 'description')->where('category_id', '=', $category->id)->inRandomOrder()->take(4)->get();
        }

        return $menu;
    }

    public function getGallery() {
        $dishes = $this->dishModel->with('category')->select('name', 'image', 'category_id')->inRandomOrder()->take(12)->get();
        $categories = [];
        foreach ($dishes as $dish) {
            $name = $dish->category->name;
            if(!in_array($name, $categories))   array_push($categories, $name); 
        }
        $dishes->categories = $categories;
        return $dishes;
    }

    public function getChefs() {
        return $this->chefModel->inRandomOrder()->take(3)->get();
    }

    /****************************************************************************************/

    public function index() {
        $menu = $this->getMenu();
        $gallery = $this->getGallery();
        $chefs = $this->getChefs();
        return view('restaurant.index', compact('menu', 'gallery', 'chefs'));
    }

    /****************************************************************************************/

    public function menu() {
        $menu = $this->getMenu();
        return view('restaurant.menu', compact('menu'));
    }

    /****************************************************************************************/

    public function gallery() {
        $gallery = $this->getGallery();
        return view('restaurant.gallery', compact('gallery'));
    }

    /****************************************************************************************/

    public function chefs() {
        $chefs = $this->getChefs();
        return view('restaurant.chefs', compact('chefs'));
    }

    /****************************************************************************************/

    public function contact() {
        return view('restaurant.contact');
    }
}
