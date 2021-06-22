<?php

namespace App\Http\Controllers;

use App\Models\PermintaanBarang;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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
        return view('show', compact('permintaan'));
    }
    public function apis()
    {
        //
        $permintaan = PermintaanBarang::orderBy('date', 'DESC')->get();
        $response = [
            'message' => 'List Data Transaction Sort by Time',
            'data' => $permintaan
        ];
        return response()->json($response, 201);
    }

    public function indexs()
    {
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

            return redirect('/api/create')->with('success', 'Data has created!');
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

    public function approval(Request $request, $id)
    {
        $approval = PermintaanBarang::findorFail($id);
        $approval->status = "Accept";
        $approval->save();

        $response = [
            'message' => "Permintaan Barang Approved",
            'data' => $approval
        ];

        return response()->json($response, Response::HTTP_CREATED);
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
    public function datalogis()
    {
        $resp = Http::get('http://divoperasioanl.herokuapp.com/api/logistics');
        $datas = $resp->json();
        // dd($datas);
        return view('datalogis', compact('datas'));
    }
    public function datapromosi()
    {
        $client = new Client;
        $response = $client->request('GET', 'https://stormy-tor-00286.herokuapp.com/api/items', [
            'verify' => false,
        ]);
        $resp = json_decode($response->getBody(), true);
        // dd($resp);

        return view('datapromosi')->with('resp', $resp);
    }
    public function listpesanan()
    {
        $client = new Client;
        $response = $client->request('GET', 'https://pesanapi.herokuapp.com/api/listpesan', [
            'verify' => false,
        ]);
        $resp = json_decode($response->getBody(), true);
        // dd($resp);

        return view('listpesanan')->with('resp', $resp);
    }
    public function pesananUi()
    {
        return view('pesananui');
    }
    public function postDataPesanan(Request $request)
    {
        $response = Http::post('https://pesanapi.herokuapp.com/api/listpesan', [
            'nama' => $request->nama,
            'pesanan' => $request->pesanan,
            'jumlah' => $request->jumlah,
            'totalharga' => $request->totalharga,
            'feedback' => $request->feedback,

        ]);

        return redirect()->back();
    }
}
