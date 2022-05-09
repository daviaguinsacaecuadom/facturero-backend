<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\CollectionDataTable;


class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::all();

        return view('billings.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Billing::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $billing = Billing::find($id);
        $users = User::all();
        return view('billings.show', compact('billing', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('xd');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $update = Billing::find($id);
        $update->update($request->all());

        return redirect()->action([BillingController::class, 'index']);


        //return back()->withInput();
        //return view('billings.index', compact('users'));
        //return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Billing::findOrFail($id)->delete();
        $users = User::all();

        return view('billings.index', compact('users'));
    }

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('billings')
                ->join('users', 'billings.user_id', '=', 'users.id')
                ->select('users.name', 'billings.*');
            //$data = Billing::with('user')->get();
            return DataTables::of($data)
                ->filter(function ($query) use ($request) {
                    if ($request->has('isPay') && !empty($request->isPay)) {
                        $query->where('status', $request->isPay);
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {


                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm">Show</a>';

                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    // $btn = '<a class="edit btn btn-success btn-sm">'.$row->status.'</a>';

                    if($row->status == 'Pagado'){
                        $status = '<span class="badge badge-success">'.$row->status.'</span>';
                    }else{
                        $status = '<span class="badge badge-danger">'.$row->status.'</span>';
                    }

                    return $status;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    }
}
