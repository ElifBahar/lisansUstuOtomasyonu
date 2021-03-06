<?php

namespace App\Http\Controllers\admin\announcements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListAnnouncementsController extends Controller
{
    function ListAnnouncementsController(){
        return view('admin.appeals.list-announcement');
    }

    function exportData(){
        try {
            $announcements = Announcements::all();

        } catch (Exception $e) {
            echo "Error!";
            echo $e->getMessage();
            return view('admin.appeals.list-announcement')->with('Download Excel Error');
        }

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()->setTitle('Announcements List'); // 31 karakterden fazla uzun olursa sorun cikariyor.
        $spreadsheet->getActiveSheet()->getStyle('1:1')->getFont()->setBold(true); // ilk satirin tamamini bold yapar

        $spreadsheet->getActiveSheet()->SetCellValue('A1', 'ID');
        $spreadsheet->getActiveSheet()->SetCellValue('B1', 'ADMIN NAME');
        $spreadsheet->getActiveSheet()->SetCellValue('C1', 'TITLE');
        $spreadsheet->getActiveSheet()->SetCellValue('D1', 'RELEASE DATE');
        $spreadsheet->getActiveSheet()->SetCellValue('E1', 'DUE DATE');
        $spreadsheet->getActiveSheet()->SetCellValue('F1', 'ANNOUNCEMENT TYPE');
        $spreadsheet->getActiveSheet()->SetCellValue('G1', 'ANNOUNCEMENT CONTENT');
        $spreadsheet->getActiveSheet()->SetCellValue('H1', 'ANNOUNCEMENT STATUS');

        $satir = 2;

        foreach ($announcements as $announcement) {

            $spreadsheet->getActiveSheet()->SetCellValue("A$satir", $announcement['id']);
            $spreadsheet->getActiveSheet()->SetCellValue("B$satir", $announcement['name']);
            $spreadsheet->getActiveSheet()->SetCellValue("C$satir", $announcement['title']);
            $spreadsheet->getActiveSheet()->SetCellValue("D$satir", $announcement['release_date']);
            $spreadsheet->getActiveSheet()->SetCellValue("E$satir", $announcement['due_date']);
            $spreadsheet->getActiveSheet()->SetCellValue("F$satir", $announcement['announcement_type']);
            $spreadsheet->getActiveSheet()->SetCellValue("G$satir", $announcement['content']);
            $spreadsheet->getActiveSheet()->SetCellValue("H$satir", $announcement['status']);

            $satir++;
        }

        // Redirect output to a client???s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Announcements List.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;

    }

    function AnnouncementsFetch(){
        $announcements = Announcements::query()->where('is_deleted','=',0)->where('institute', Auth::user()->institute);

        return Datatables::of($announcements)->addColumn('button', function ($data){
            return '<a class="btn btn-primary" href="'. route('appeals-list-page', [$data->id]) .'">'.'??lana Git</a>';
        })
            ->addColumn('update', function ($data){
                return '<a class="btn btn-warning" href="'. route('announcements-update-page', [$data->id]) .'">'.'G??ncelle</a>';
            })
            ->addColumn('delete', function ($data){
                return
                    //'<a class="btn btn-danger" href="'.route('announcements-delete', [$data->id]) .'">'.'Sil </a>';
                    '<button class="btn btn-danger" onClick="deleteAnnouncement('.$data->id.')" href="">'.'Sil</button>';
            })->rawColumns(['button','delete','update'])->make();
    }

    function ListInactiveAnnouncements(){
        $announcements = Announcements::query()->where('is_deleted',0)->where('status', '0')->where('institute', Auth::user()->institute);

        return Datatables::of($announcements)->addColumn('button', function ($data){
            return '<a class="btn btn-primary" href="'. route('appeals-list-page', [$data->id]) .'">'.'??lana Git</a>';
        })
            ->addColumn('update', function ($data){
                return '<a class="btn btn-warning" href="'. route('announcements-update-page', [$data->id]) .'">'.'G??ncelle</a>';
            })
            ->addColumn('delete', function ($data){
                return
                    //'<a class="btn btn-danger" href="'.route('announcements-delete', [$data->id]) .'">'.'Sil </a>';
                    '<button class="btn btn-danger" onClick="deleteAnnouncement('.$data->id.')" href="">'.'Sil</button>';
            })->rawColumns(['button','delete','update'])->make();

    }

    function ListActiveAnnouncements(){
        $announcements = Announcements::query()->where('is_deleted',0)->where('status','1')->where('institute', Auth::user()->institute);

        return Datatables::of($announcements)->addColumn('button', function ($data){
            return '<a class="btn btn-primary" href="'. route('appeals-list-page', [$data->id]) .'">'.'??lana Git</a>';
        })
            ->addColumn('update', function ($data){
                return '<a class="btn btn-warning" href="'. route('announcements-update-page', [$data->id]) .'">'.'G??ncelle</a>';
            })
            ->addColumn('delete', function ($data){
                return
                    //'<a class="btn btn-danger" href="'.route('announcements-delete', [$data->id]) .'">'.'Sil </a>';
                    '<button class="btn btn-danger" onClick="deleteAnnouncement('.$data->id.')" href="">'.'Sil</button>';
            })->rawColumns(['button','delete','update'])->make();

    }

    function CreateAnnouncementShow(){
        return view('admin.announcements.create-announcement');
    }

    function CreatePost(Request $request){


        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'release_date' => 'required|date',
            'due_date' => 'required|date',
            'content' => 'required',
            'type' => 'required'
        ]);

        $announcement_name = Helper::removeTags(\request('name'));
        $announcement_title = Helper::removeTags($request->title);
        $announcement_rDate = Helper::removeTags(\request('release_date'));
        $announcement_dDate = Helper::removeTags(\request('due_date'));
        $announcement_content = Helper::removeTags(\request('content'));
        $announcement_type = Helper::removeTags(\request('type'));

        $errors = "";

        if ($errors == ""){
            Announcements::create([
                'name' => $announcement_name,
                'announcement_type' => $announcement_type,
                'status' => 0,
                'title' => $announcement_title,
                'institute' => Auth::user()->institute,
                'content' => $announcement_content,
                'release_date' => $announcement_rDate,
                'due_date' => $announcement_dDate,
            ]);
            return redirect()->route('announcements');
        }else{
            return view('admin.announcements.create-announcement') -> with('errors', $errors);
        }


    }

    function DeleteAction(){
        $id = Helper::removeTags(\request('id'));

        if (is_numeric($id)) {
            $success = Announcements::where('id', $id)->update([
                'is_deleted' => 1
            ]);
            if($success)
            {
                return response()->json(['success' => 'Successfully deleted']);
            }
            else
            {
                return response()->json(['errors' => 'Operation failed']);
            }
        }else{
            return response()->json(['errors' => 'Operation failed']);
        }

    }

    function UpdateAnnouncementShow($id){

        $announcement = Announcements::find($id);
        return view('admin.announcements.update-announcement',compact('announcement'));
    }

    function UpdatePost(Request $request){
        $errors = "";

        $announcement = Announcements::find($request->announcement_id);

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'status' => 'required',
            'release_date' => 'required|date',
            'due_date' => 'required|date',
            'content' => 'required',
            'type' => 'required'
        ]);

        if($request->due_date < Carbon::today() && $request->status == 1){
            return back()->withErrors(['message1'=>'Biti?? tarihi ge??mi?? zaman se??ildi??inde ilan??n stat??s?? aktif olamaz!']);
        }

        $announcement ->update([
            'announcement_type' => Helper::removeTags($request->type),
            'name' => Helper::removeTags($request->name),
            'status' => Helper::removeTags($request->status),
            'title' => Helper::removeTags($request->title),
            'content' => Helper::removeTags($request->content),
            'release_date' => Helper::removeTags($request->release_date),
            'due_date' => Helper::removeTags($request->due_date),
            'is_deleted' => Helper::removeTags($request->is_deleted)
        ]);

        return redirect()->route('announcements')->withSuccess('1');


    }
}
