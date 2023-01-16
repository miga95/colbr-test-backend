<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * @param Request $request
     */
    public function index(Request $request){
        $user = Auth::user();
        $knownProducts = [];
        foreach ($user->knownProducts as $product){
            array_push($knownProducts, $product->name);
        }
        $success["name"] = $user->firstname;
        $success["financial_knowledge"] = $user->financial_knowledge;
        $success["known_products"] = $knownProducts;
       // var_dump($user->knownProducts);
        return $this->sendResponse($success, 'ok');
    }
}
