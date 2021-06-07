<?php

namespace App\Http\Controllers;

use App\Models\PermintaanBarang;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;
use Symfony\Component\HttpFoundation\Response;

class PermintanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permintaan = PermintaanBarang::orderBy('date', 'DESC')->get();
        $response = [
            'message' => 'List Data Transaction Sort by Time',
            'data' => $permintaan
        ];
        return response()->json($permintaan, Response::HTTP_OK);
    }

    public function indexs(){
        return view('create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namabarang' => ['required'],
            'jumlah' => ['required', 'numeric'],
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $permintaan = PermintaanBarang::create($request->all());

            $response = [
                'message' => "Data has been created!",
                'data' => $permintaan
            ];

            return redirect('/create')->with('succes','Data has created!');
        } catch (QueryException $e) {
            //throw $th;
            return response()->json([
                'message' => 'failed store data' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permintaan = PermintaanBarang::findorFail($id);
        $response = [
            'message' => "Detail By Id",
            'data' => $permintaan
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $permintaan = PermintaanBarang::findorFail($id);
        $validator = Validator::make($request->all(), [
            'namabarang' => ['required'],
            'jumlah' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $permintaan->update($request->all());

            $response = [
                'message' => "Data has been updated!",
                'data' => $permintaan
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            //throw $th;
            return response()->json([
                'message' => 'failed update data' . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permintaan = PermintaanBarang::findorFail($id);
        try {
            $permintaan->delete();

            $response = [
                'message' => "Data has been deleted!",
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'failed' . $e->errorInfo
            ]);
        }
    }
}
