<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Submit_lsr;
use Validator;
use Datatables;
use Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResponseController;

class Submit_lsrController extends Controller
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
        return View('Submit_lsr');
    }
    
    /**
     * 
     * @return type 
     */
    public function All()
    {
        $Submit_lsr=Submit_lsr::query();
        $Submit_lsr=$Submit_lsr->with('select_lsr');
        return Datatables::of($Submit_lsr)->addColumn('Select', function($Submit_lsr) { return '<input class="flat Submit_lsr_record" name="Submit_lsr_record"  type="checkbox" value="'.$Submit_lsr->id.'" />';})
                ->addColumn('actions', function ($Submit_lsr) {
                $column='<a href="javascript:void(0)"  data-url="'.route('Submit_lsredit',$Submit_lsr->id).'" class="edit btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $column.='<a href="javascript:void(0)" data-url="'.route('Submit_lsrdelete',$Submit_lsr->id).'" class="delete btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $column;})->editColumn('goods_bl',function($Submit_lsr){ return "<a  href='files/".$Submit_lsr->goods_bl."' />$Submit_lsr->goods_bl <i style=' margin-left:10px ' class='md-1 fa fa-download'></i> </a>";})->make(true);
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
                $Submit_lsr = Submit_lsr::where('id',$request['id'])->first();    
                $Submit_lsr->select_lsr=$request["select_lsr"];$Submit_lsr->goods_type=strip_tags($request["goods_type"]);$Submit_lsr->estimated_goods_value=strip_tags($request["estimated_goods_value"]);$Submit_lsr->goods_tonnage=strip_tags($request["goods_tonnage"]);$Submit_lsr->goods_origin=strip_tags($request["goods_origin"]);$Submit_lsr->goods_destination=strip_tags($request["goods_destination"]);$Submit_lsr->goods_pickup_location=strip_tags($request["goods_pickup_location"]);$Submit_lsr->goods_delivery_location=strip_tags($request["goods_delivery_location"]);$Submit_lsr->goods_transit=strip_tags($request["goods_transit"]);$AttachmentPath=$this->Upload($request,"goods_bl");$Submit_lsr->goods_bl=$AttachmentPath;$Submit_lsr->goods_loading_date=strip_tags($request["goods_loading_date"]);$Submit_lsr->goods_loading_services=strip_tags($request["goods_loading_services"]);$Submit_lsr->goods_of_loading_services=strip_tags($request["goods_of_loading_services"]);$Submit_lsr->goods_recipient_name=strip_tags($request["goods_recipient_name"]);$Submit_lsr->goods_recipient_number=strip_tags($request["goods_recipient_number"]);$Submit_lsr->goods_lsr_observations=$request["goods_lsr_observations"];
                $Submit_lsr->save();
                return $this->Response->prepareResult(200,$Submit_lsr,[],'Submit_lsr Saved successfully ','ajax');
            else:
                $Submit_lsr=new Submit_lsr();    
                $Submit_lsr->select_lsr=$request["select_lsr"];$Submit_lsr->goods_type=strip_tags($request["goods_type"]);$Submit_lsr->estimated_goods_value=strip_tags($request["estimated_goods_value"]);$Submit_lsr->goods_tonnage=strip_tags($request["goods_tonnage"]);$Submit_lsr->goods_origin=strip_tags($request["goods_origin"]);$Submit_lsr->goods_destination=strip_tags($request["goods_destination"]);$Submit_lsr->goods_pickup_location=strip_tags($request["goods_pickup_location"]);$Submit_lsr->goods_delivery_location=strip_tags($request["goods_delivery_location"]);$Submit_lsr->goods_transit=strip_tags($request["goods_transit"]);$AttachmentPath=$this->Upload($request,"goods_bl");$Submit_lsr->goods_bl=$AttachmentPath;$Submit_lsr->goods_loading_date=strip_tags($request["goods_loading_date"]);$Submit_lsr->goods_loading_services=strip_tags($request["goods_loading_services"]);$Submit_lsr->goods_of_loading_services=strip_tags($request["goods_of_loading_services"]);$Submit_lsr->goods_recipient_name=strip_tags($request["goods_recipient_name"]);$Submit_lsr->goods_recipient_number=strip_tags($request["goods_recipient_number"]);$Submit_lsr->goods_lsr_observations=$request["goods_lsr_observations"];
                $Submit_lsr->save();
                return $this->Response->prepareResult(200,$Submit_lsr,[],'Submit_lsr Created successfully ','ajax');
            endif;
        } catch (Exception $exc) {
                return $this->Response->prepareResult(400,null,[],null,'ajax','Submit_lsr Could not be  Saved');
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
                $data=Submit_lsr::where('id',$ID)->get();
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
                Submit_lsr::where('id',$ID)->delete();
                return  $this->Response->prepareResult(200,[],'Submit_lsr Item deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Submit_lsr Item Could be not deleted');
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
                Submit_lsr::whereIn('id',$request->selected_rows)->delete();
                return  $this->Response->prepareResult(200,[],'Submit_lsr Item/s deleted Successfully','ajax');
            } catch (\Exception $exc) {
        }        return $this->Response->prepareResult(400,[],null,'ajax','Submit_lsr Item/s Could be not deleted');
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
