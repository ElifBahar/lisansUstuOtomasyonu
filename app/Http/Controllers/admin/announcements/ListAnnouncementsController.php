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

        // Redirect output to a client’s web browser (Xlsx)
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
            return '<a class="btn btn-primary" href="'. route('appeals-list-page', [$data->id]) .'">'.'İlana Git</a>';
        })
            ->addColumn('update', function ($data){
                return '<a class="btn btn-warning" href="'. route('announcements-update-page', [$data->id]) .'">'.'Güncelle</a>';
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
            return '<a class="btn btn-primary" href="'. route('appeals-list-page', [$data->id]) .'">'.'İlana Git</a>';
        })
            ->addColumn('update', function ($data){
                return '<a class="btn btn-warning" href="'. route('announcements-update-page', [$data->id]) .'">'.'Güncelle</a>';
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
            return '<a class="btn btn-primary" href="'. route('appeals-list-page', [$data->id]) .'">'.'İlana Git</a>';
        })
            ->addColumn('update', function ($data){
                return '<a class="btn btn-warning" href="'. route('announcements-update-page', [$data->id]) .'">'.'Güncelle</a>';
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
}
