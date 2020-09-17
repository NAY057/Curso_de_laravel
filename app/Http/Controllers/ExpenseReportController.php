<?php

namespace App\Http\Controllers;

//aqui se debe poner la ruta de donde esta el modelo
use App\Models\ExpenseReport;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // con los puntos se acceden a carpetas
        // los nombre de las vistas van entre comillas
        return view('expenseReport.index', [
            'expenseReports'=> ExpenseReport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // siempre que se agrege alguna funcionalidad de crud, es nacesario tener los controladores y las vistas para que todo funcione bien.
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        // este seccion se encarga de la validacion de los campos
        $validData = $request->validate([
            // aqui se colocan todas las reglas que se requieran para validar
            // para combinar validaciones se usa '|(altgr + 1)'
            'title'=>'required|min:3'
        ]);
        // se usa la variable $validata antes del save dado que esta ya viene validada y filtrada
        $report = new ExpenseReport();
        $report->title = $validData['title'];
        $report->save();

        // hace un retorno a la vista que se requiera
        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ESTO ES MODEL BIDING
    public function show(ExpenseReport $expenseReport)
    {
        return view('expenseReport.show', [
            // aqui se agregan los parametros que se necesitan
            'report' => $expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', [
            // aqui se agregan los parametros que se necesitan
            'report' => $report
        ]);
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
        $report = ExpenseReport::find($id);
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();

        return redirect('/expense_reports');
    }

    // Se crea un nuevo controlador
    public function confirmDelete($id){
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmDelete', [
            // aqui se agregan los parametros que se necesitan
            'report' => $report
        ]);
    }

    public function confirmSendMail($id){
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmSendMail', [
            // aqui se agregan los parametros que se necesitan
            'report' => $report
        ]);
    }

    public function sendMail($id){
        $report = ExpenseReport::find($id);
        return $report;
    }
}
