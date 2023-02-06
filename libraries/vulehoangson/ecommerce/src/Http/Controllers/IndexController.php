<?php
namespace Vulehoangson\Ecommerce\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index(Request $request): View
    {
        return view('ecommerce::index');
    }

    public function getCreateForm(Request $request): View
    {
        return view('ecommerce::create');
    }
}
