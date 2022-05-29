<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade;
//use Barryvdh\DomPDF\PDF;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Generar pdf por HTML
        //$pdf = App::make('dompdf.wrapper');
        // $pdf = app('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Styde.net</h1>');
        // return $pdf->download('mi-archivo.pdf');


        //PDF desde una vista blade
        // $data = User::find(1);
        // $pdf = PDF::loadView('pdf.index', compact('data'));
        // return $pdf->download('archivo.pdf');

        $pdf = PDF::loadView('pdf.index');
        $data = ['foo' => 'baz'];



        Mail::send('pdf.index', $data, function ($mail) use ($pdf) {
            $mail->from('davinsaca@yahoo.com', 'John Doe');
            $mail->to('davinsaca@yahoo.com');
            $mail->attachData($pdf->output(), 'test.pdf');
        });

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
