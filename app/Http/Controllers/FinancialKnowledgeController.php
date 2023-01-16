<?php

namespace App\Http\Controllers;

use App\Models\KnownProducts;
use App\Models\User;
use App\Repositories\KnownProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialKnowledgeController extends BaseController
{
    private $knownProductsRepository;

    public function __construct(KnownProductsRepository $knownProductsRepository){
        $this->knownProductsRepository = $knownProductsRepository;
    }

    /**
     *@param Request $request
     */
    public function postFinancialKnowledge(Request $request){
        $user = User::find(Auth::user()->id);
        if($request['financial_knowledge'] === true) {
            $user->setFinancialKnowledge(true);
            $user->save();
            return $this->sendResponse($user, 'financial knowledge saved');

        }elseif ($request['financial_knowledge'] === false){
            $user->setFinancialKnowledge(false);
            $user->save();
            return $this->sendResponse($user, 'financial knowledge saved');
        }else{
            return $this->sendError('error');
        }

    }

    /**
     *@param Request $request
     */
    public function postKnownProducts(Request $request){
        $user = User::find(Auth::user()->id);
        $knownProductsIds = [];
        foreach ($request['known_products'] as $product){
            $knownProduct = $this->knownProductsRepository->findByName($product);
            if($knownProduct){
                array_push($knownProductsIds, $knownProduct->id);
            }else{
                return $this->sendError($user, '');
            }
        }
        $user->knownProducts()->attach($knownProductsIds);
        return $this->sendResponse($user, 'Known Products saved');
    }


}
