<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Word;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

/**
 * Created by PhpStorm.
 * User: Vita Dolce
 * Date: 24/12/2016
 * Time: 4:55 CH
 */
class WordsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filter = $request->filter;
        $categoryId = $request->category_id;
        $user_id = Auth::id();
        $categorySelect = Category::all()->pluck('name', 'id');

        $query = Word::query();

        if ($categoryId) {
            $query->where('words.category_id', $categoryId);
        }
        if ($filter == Config::get("custom.filter.learned")) {
            $query->learned($user_id);
        } elseif ($filter == Config::get("custom.filter.unlearned")) {
            $query->unlearned($user_id);
        }
        $words = $query->get();

        return view('words.index', compact('filter', 'categoryId', 'words', 'categorySelect'));
    }
}
