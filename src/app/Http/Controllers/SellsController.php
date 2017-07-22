<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Sell;
use App\SellReview;
use App\Http\Requests\SellRequest;

class SellsController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);  
    }*/

    public function changeStatus(Sell $sell, $status)
    {

        if ($status == 'Post') {
            $status = 'P';
        } else if ($status == 'Unpost') {
            $status = 'U';
        } else {
            # force unsafe for security
            $status = 'U';
        }

        $sell->status = $status;
        $sell->save();

        return $sell;
        #return Sell::find($sell->id)->update(request(['status']));
    }

    public function fetchItemByUser()
    {
        return $sells = Sell::where('user_id', Auth::id())
                                ->orderby('created_at', 'desc')
                                ->get();
    }

    public function fetchItemPosted()
    {

        return Sell::with(['user'])
                    ->where('status', 'P')
                    ->orderby('created_at', 'desc') 
                    ->get();
    }

	/*public function index()
	{
        return $sells = Sell::where('user_id', Auth::id())
                            ->orderby('created_at', 'desc')
                            ->get();

		#return view('sells.index', compact('sells'));
	}*/

    /*public function create()
    {
    	return view('sells.create');
    }*/

    public function store(SellRequest $request)
    {

        // return Auth::user();
    	/*#dd(request()->all());
    	 Simple way of saving 
    	$sell = new Sell;

    	$sell->name = request('name');
    	$sell->description = request('description');
    	$sell->unitprice = request('unitprice');
    	$sell->quantity = request('quantity');

    	$sell->save();

    	 Other way 

    	Sell::create([
    		'name' => request('name'),
    		'description' => request('description'),
    		'unitprice' => request('unitprice'),
    		'quantity' => request('quantity')
    	]);

    	 Recommended way 

    	#Sell::create(request(['name', 'description', 'unitprice', 'quantity']));

        Sell::create([
            'name' => request('name'),
            'description' => request('description'),
            'unitprice' => request('unitprice'),
            'quantity' => request('quantity'),
            'user_id' => auth()->id()
        ]);*/

        /*$this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'unitprice' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);*/

        return Sell::create([
            'name' => $request->name,
            'description' => $request->description,
            'unitprice' => $request->unitprice,
            'quantity' => $request->quantity,
            'user_id' => Auth::id()
        ]);


    }

    public function show(Sell $sell)
    {
        return $sell->load([
            'sellReview' => function($builder) {
                return $builder->orderBy('created_at', 'desc');
            },
            'sellReview.user'
        ]);

    }

    public function edit(Sell $sell)
    {   
        $this->authorize('update', $sell);
        
        return $sell;
    }

    public function update(Request $request, Sell $sell) {
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required',
            'unitprice' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        $sell->update([
            'name' => $request->name,
            'description' => $request->description,
            'unitprice' => $request->unitprice,
            'quantity' => $request->quantity,
        ]);

        return $sell;
    }

    /*public function update(Request $request, Sell $sell)
    {
         Validate item from creator permission 
        if ($sell->user_id != auth()->id()) {
            return redirect('sell');
        }

        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required',
            'unitprice' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        
        return redirect('sell');
       
    }*/

    public function photo(Sell $sell)
    {
        #dd($sell);
        return view('sells.photo', compact('sell'));
    }

}
