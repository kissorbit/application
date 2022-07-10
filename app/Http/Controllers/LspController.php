<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lsp;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class LspController extends Controller
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
        return View('Lsp');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Lsp=Lsp::query();
        
        return Datatables::of($Lsp)->addColumn('Select', function($Lsp) { return '<input class="flat Lsp_record" name="Lsp_record"  type="checkbox" value="'.$Lsp->id.'" />';})
                ->addColumn('actions', function ($Lsp) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Lspedit',$Lsp->id).'" class="edit btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Lspdelete',$Lsp->id).'" class="delete btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $column;})->editColumn('lsp_admin_file',function($Lsp){ return "<a  href='files/".$Lsp->lsp_admin_file."' />$Lsp->lsp_admin_file <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->editColumn('lsp_trucks_files',function($Lsp){ return "<a  href='files/".$Lsp->lsp_trucks_files."' />$Lsp->lsp_trucks_files <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->editColumn('lsp_transport_license',function($Lsp){ return "<a  href='files/".$Lsp->lsp_transport_license."' />$Lsp->lsp_transport_license <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->make(true);
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
                $Lsp = Lsp::where('id',$request['id'])->first();    
                $Lsp->compagny_name=strip_tags($request["compagny_name"]);$Lsp->compagny_address=strip_tags($request["compagny_address"]);$Lsp->name=strip_tags($request["name"]);$Lsp->first_name=strip_tags($request["first_name"]);$Lsp->email=strip_tags($request["email"]);$Lsp->phone=strip_tags($request["phone"]);$Lsp->country=strip_tags($request["country"]);$Lsp->city=strip_tags($request["city"]);$AttachmentPath=$this->Upload($request,"lsp_admin_file");$Lsp->lsp_admin_file=$AttachmentPath;$Lsp->lsp_number_of_trucks=strip_tags($request["lsp_number_of_trucks"]);$AttachmentPath=$this->Upload($request,"lsp_trucks_files");$Lsp->lsp_trucks_files=$AttachmentPath;$AttachmentPath=$this->Upload($request,"lsp_transport_license");$Lsp->lsp_transport_license=$AttachmentPath;$Lsp->lsp_transport_countries=strip_tags($request["lsp_transport_countries"]);
                $Lsp->save();
                return $this->Response->prepareResult(200,$Lsp,[],'Lsp Saved successfully ','ajax');
            else:
                $Lsp=new Lsp();    
                $Lsp->compagny_name=strip_tags($request["compagny_name"]);$Lsp->compagny_address=strip_tags($request["compagny_address"]);$Lsp->name=strip_tags($request["name"]);$Lsp->first_name=strip_tags($request["first_name"]);$Lsp->email=strip_tags($request["email"]);$Lsp->phone=strip_tags($request["phone"]);$Lsp->country=strip_tags($request["country"]);$Lsp->city=strip_tags($request["city"]);$AttachmentPath=$this->Upload($request,"lsp_admin_file");$Lsp->lsp_admin_file=$AttachmentPath;$Lsp->lsp_number_of_trucks=strip_tags($request["lsp_number_of_trucks"]);$AttachmentPath=$this->Upload($request,"lsp_trucks_files");$Lsp->lsp_trucks_files=$AttachmentPath;$AttachmentPath=$this->Upload($request,"lsp_transport_license");$Lsp->lsp_transport_license=$AttachmentPath;$Lsp->lsp_transport_countries=strip_tags($request["lsp_transport_countries"]);
                $Lsp->save();
                return $this->Response->prepareResult(200,$Lsp,[],'Lsp Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Lsp Could not be  Saved');
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
                $data=Lsp::where('id',$ID)->get();
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
                Lsp::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Lsp Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Lsp Item Could be not deleted');
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
                Lsp::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Lsp Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Lsp Item/s Could be not deleted');
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
