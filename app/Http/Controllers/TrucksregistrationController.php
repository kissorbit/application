<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Trucksregistration;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class TrucksregistrationController extends Controller
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
        return View('Trucksregistration');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Trucksregistration=Trucksregistration::query();
        $Trucksregistration=$Trucksregistration->with('lsp_name_reference');
        return Datatables::of($Trucksregistration)->addColumn('Select', function($Trucksregistration) { return '<input class="flat Trucksregistration_record" name="Trucksregistration_record"  type="checkbox" value="'.$Trucksregistration->id.'" />';})
                ->addColumn('actions', function ($Trucksregistration) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Trucksregistrationedit',$Trucksregistration->id).'" class="edit btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Trucksregistrationdelete',$Trucksregistration->id).'" class="delete btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $column;})->editColumn('lsp_truck_picture',function($Trucksregistration){ return "<a  href='files/".$Trucksregistration->lsp_truck_picture."' />$Trucksregistration->lsp_truck_picture <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->editColumn('lsp_truck_insurance',function($Trucksregistration){ return "<a  href='files/".$Trucksregistration->lsp_truck_insurance."' />$Trucksregistration->lsp_truck_insurance <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->editColumn('lsp_truck_patent',function($Trucksregistration){ return "<a  href='files/".$Trucksregistration->lsp_truck_patent."' />$Trucksregistration->lsp_truck_patent <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->editColumn('lsp_truck_registration_doc',function($Trucksregistration){ return "<a  href='files/".$Trucksregistration->lsp_truck_registration_doc."' />$Trucksregistration->lsp_truck_registration_doc <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->make(true);
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
                $Trucksregistration = Trucksregistration::where('id',$request['id'])->first();    
                $Trucksregistration->lsp_name_reference=$request["lsp_name_reference"];$Trucksregistration->lsp_trucks_immatriculation=strip_tags($request["lsp_trucks_immatriculation"]);$Trucksregistration->lsp_truck_type=strip_tags($request["lsp_truck_type"]);$AttachmentPath=$this->Upload($request,"lsp_truck_picture");$Trucksregistration->lsp_truck_picture=$AttachmentPath;$AttachmentPath=$this->Upload($request,"lsp_truck_insurance");$Trucksregistration->lsp_truck_insurance=$AttachmentPath;$Trucksregistration->lsp_truck_insurance_strdate=strip_tags($request["lsp_truck_insurance_strdate"]);$Trucksregistration->lsp_truck_insurance_expdate=strip_tags($request["lsp_truck_insurance_expdate"]);$AttachmentPath=$this->Upload($request,"lsp_truck_patent");$Trucksregistration->lsp_truck_patent=$AttachmentPath;$AttachmentPath=$this->Upload($request,"lsp_truck_registration_doc");$Trucksregistration->lsp_truck_registration_doc=$AttachmentPath;$Trucksregistration->lsp_truck_availability=strip_tags($request["lsp_truck_availability"]);
                $Trucksregistration->save();
                return $this->Response->prepareResult(200,$Trucksregistration,[],'Trucksregistration Saved successfully ','ajax');
            else:
                $Trucksregistration=new Trucksregistration();    
                $Trucksregistration->lsp_name_reference=$request["lsp_name_reference"];$Trucksregistration->lsp_trucks_immatriculation=strip_tags($request["lsp_trucks_immatriculation"]);$Trucksregistration->lsp_truck_type=strip_tags($request["lsp_truck_type"]);$AttachmentPath=$this->Upload($request,"lsp_truck_picture");$Trucksregistration->lsp_truck_picture=$AttachmentPath;$AttachmentPath=$this->Upload($request,"lsp_truck_insurance");$Trucksregistration->lsp_truck_insurance=$AttachmentPath;$Trucksregistration->lsp_truck_insurance_strdate=strip_tags($request["lsp_truck_insurance_strdate"]);$Trucksregistration->lsp_truck_insurance_expdate=strip_tags($request["lsp_truck_insurance_expdate"]);$AttachmentPath=$this->Upload($request,"lsp_truck_patent");$Trucksregistration->lsp_truck_patent=$AttachmentPath;$AttachmentPath=$this->Upload($request,"lsp_truck_registration_doc");$Trucksregistration->lsp_truck_registration_doc=$AttachmentPath;$Trucksregistration->lsp_truck_availability=strip_tags($request["lsp_truck_availability"]);
                $Trucksregistration->save();
                return $this->Response->prepareResult(200,$Trucksregistration,[],'Trucksregistration Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Trucksregistration Could not be  Saved');
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
                $data=Trucksregistration::where('id',$ID)->get();
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
                Trucksregistration::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Trucksregistration Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Trucksregistration Item Could be not deleted');
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
                Trucksregistration::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Trucksregistration Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Trucksregistration Item/s Could be not deleted');
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
