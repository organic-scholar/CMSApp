<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Table;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\StoreTableRequest;

class TablesController extends Controller
{

    protected $dataType = [
        'text' => 'Text',
        'string' => 'String',
        'integer' => 'Number'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return $tables;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTableRequest $request)
    {
        $table = new Table();
        $table->name = $request->get('name');
        $table->fields = $request->get('fields');
        $table->visible = $request->get('visible');
        $table->save();
        Schema::create($table->name, function($dbTable) use($table)
        {
            foreach ($table->fields as $field) {
                $fieldType =  $field['type'];
                $fieldName = $field['name'];
                $dbTable->$fieldType($fieldName);
            }
        });
        return redirect('/tables');
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
