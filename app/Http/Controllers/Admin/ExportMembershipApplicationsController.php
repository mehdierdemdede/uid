<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportMembershipApplicationsController extends Controller
{
    public function __invoke(Request $request): StreamedResponse
    {
        $filename = 'membership-applications-'.now()->format('Ymd-His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        return response()->stream(function (): void {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Ad', 'Soyad', 'E-posta', 'Telefon', 'Sehir', 'Uyelik Tipi', 'Tarih', 'Durum']);

            MembershipApplication::query()->latest()->chunk(200, function ($rows) use ($handle): void {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->first_name,
                        $row->last_name,
                        $row->email,
                        $row->phone,
                        $row->city,
                        $row->membership_type,
                        optional($row->created_at)->toDateTimeString(),
                        $row->status,
                    ]);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }
}
