<?php

namespace Doctor\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Doctor\Http\Controllers\Controller;
use Doctor\Models\Shopping;
use Doctor\Models\User;

class OrderController extends Controller
{
    private $order; 
    private $doctor; 

    public function __construct(Shopping $order, User $doctor)
    {
        $this->order = $order;
        $this->doctor = $doctor;
    }

    public function index(Request $request)
    {
        $req = [
                'order' => $request->input('order'),
                'doctor' => $request->input('doctor'),
                'status' => $request->input('status')
            ];

        $select = [
                    'shoppings.*',
                    'users.name as user_name', 
                    'plans.name as plan_name',
                ];

        $orders = $this->order->select($select)
                              ->join('users', 'shoppings.id_doctor', '=', 'users.id')
                              ->join('plans', 'shoppings.id_plan', '=', 'plans.id')
                              ->where( function($query) use($req){
                                    if($req['order']):
                                        $query->where('shoppings.id','=',$req['order']);
                                    endif;
                                    if($req['doctor']):
                                        $query->where('users.name','like','%'.$req['doctor'].'%');
                                    endif;
                                    if($req['status']):
                                        $query->where('shoppings.order_status','=',$req['status']);
                                    endif;
                              })->paginate(15);
                              
        $page_title = 'Ordem de Pedidos';
        $guard = 'admin';
    	return view('admin.order.payments.index', compact('orders', 'page_title', 'guard'));
    }
}
