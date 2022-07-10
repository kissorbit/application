<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lsr;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class LsrController extends Controller
{
    
    public $Now;
    public $Response;
    public function __construct(){
        parent::__construct();
        $this->Now=date('Y-m-d H:i:s');
        $this->Response=new ResponseController();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('Lsr');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Lsr=Lsr::query();
        
        return Datatables::of($Lsr)->addColumn('Select', function($Lsr) { return '<input class="flat Lsr_record" name="Lsr_record"  type="checkbox" value="'.$Lsr->id.'" />';})
                ->addColumn('actions', function ($Lsr) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Lsredit',$Lsr->id).'" class="edit btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Lsrdelete',$Lsr->id).'" class="delete btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $column;})->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateOrUpdate(Request $request)
    {
        try {
            if($request['id'] !=''):
                $Lsr = Lsr::where('id',$request['id'])->first();    
                $Lsr->compagny_name=strip_tags($request["compagny_name"]);$Lsr->email=strip_tags($request["email"]);$Lsr->phone_co=strip_tags($request["phone_co"]);$Lsr->compagny_address=strip_tags($request["compagny_address"]);$Lsr->country=strip_tags($request["country"]);$Lsr->city=strip_tags($request["city"]);
                $Lsr->save();
                return $this->Response->prepareResult(200,$Lsr,[],'Lsr Saved successfully ','ajax');
            else:
                $Lsr=new Lsr();    
                $Lsr->compagny_name=strip_tags($request["compagny_name"]);$Lsr->email=strip_tags($request["email"]);$Lsr->phone_co=strip_tags($request["phone_co"]);$Lsr->compagny_address=strip_tags($request["compagny_address"]);$Lsr->country=strip_tags($request["country"]);$Lsr->city=strip_tags($request["city"]);
                $Lsr->save();
                return $this->Response->prepareResult(200,$Lsr,[],'Lsr Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Lsr Could not be  Saved');
        }

        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function edit($ID)
    {
        try {
                $data=Lsr::where('id',$ID)->get();
                return $this->Response->prepareResult(200,$data,[],null,'ajax');
            } catch (\Exception $exc) {
                 return $this->Response->prepareResult(400,[],null,'ajax','Could not get This item');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function Delete($ID)
    {
        try {
                Lsr::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Lsr Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Lsr Item Could be not deleted');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ID
     * @return \Illuminate\Http\Response
     */
    public function DeleteMultiple(Request $request)
    {
        try {
                Lsr::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Lsr Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Lsr Item/s Could be not deleted');
    }
    
    /**
     * Upload Attachment Or Image
     */
    protected function Upload(Request $request,$FieldName)
    {
        $path='';
        $Image = $request->file($FieldName);
        if($Image):
            $Extension = $Image->getClientOriginalExtension();
            $path = $Image->getFilename() . '.' . $Extension;
            Storage::disk('files_folder')->put($path, File::get($request->file($FieldName)));
        endif;
        return $path;
    }
}
