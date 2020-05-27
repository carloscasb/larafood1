<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpadeDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    private $repository, $plan;

    public function __construct(DetailPlan $detailplan, Plan $plan )
       {
           $this->repository= $detailplan;
           $this->plan = $plan;
        }

        public function index($urlPlan)
        {
              If(!$plan = $this->plan->where ('url', $urlPlan)->first()) {         //SE NÃo ACHOU (recuperando pela url)
                return redirect()->back();
              }                                                                   //SE ACHOU (recuperando pela url)
                     
              // $details = $plan->details();
              $details = $plan->details()->paginate(); 
              
            return view('admin.pages.plans.details.index', [
                'plan' => $plan,
                'details'=> $details,

                ]);
                
        }
        public function create($urlPlan)
        {
            if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
                return redirect()->back();
            }
    
            return view('admin.pages.plans.details.create', [
                'plan' => $plan,
            ]);
        }
      
        public function store(StoreUpadeDetailPlan $request, $urlPlan)
       // public function store(Request $request, $urlPlan)
        {
            if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
                return redirect()->back();
            }
    
            // $data = $request->all();
            // $data['plan_id'] = $plan->id;
            // $this->repository->create($data);
            $plan->details()->create($request->all());
    
            return redirect()->route('details.plans.index', $plan->url);
        }
     
    
        public function edit($urlPlan, $idDetail)
        {
            $plan = $this->plan->where('url', $urlPlan)->first();
            $detail = $this->repository->find($idDetail);
    
            if (!$plan || !$detail) {
                return redirect()->back();
            }
    
            return view('admin.pages.plans.details.edit', [
                'plan' => $plan,
                'detail' => $detail,
            ]);
        }


        //public function update(Request $request, $urlPlan, $idDetail)
         public function update(StoreUpadeDetailPlan $request, $urlPlan, $idDetail)
        {
            $plan = $this->plan->where('url', $urlPlan)->first();
            $detail = $this->repository->find($idDetail);
    
            if (!$plan || !$detail) {
                return redirect()->back();
            }
    
            $detail->update($request->all());
    
            return redirect()->route('details.plans.index', $plan->url);
        }
     
        public function show($urlPlan, $idDetail)
        {
            $plan = $this->plan->where('url', $urlPlan)->first();
            $detail = $this->repository->find($idDetail);
    
            if (!$plan || !$detail) {
                return redirect()->back();
            }
    
            return view('admin.pages.plans.details.show', [
                'plan' => $plan,
                'detail' => $detail,
            ]);
        }
        
    
        public function destroy($urlPlan, $idDetail)
        {
            $plan = $this->plan->where('url', $urlPlan)->first();
            $detail = $this->repository->find($idDetail);
    
            if (!$plan || !$detail) {
                return redirect()->back();
            }
    
            $detail->delete();
    
            return redirect()
                        ->route('details.plans.index', $plan->url)
                        ->with('message', 'Registro detalado com sucesso');

                        
        }
        
}