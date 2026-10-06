<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'serial_number' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email'],
            'symptom' => ['required', 'string', 'min:10'],
            'urgency' => ['required', 'in:low,normal,high'],
        ], [
            'serial_number.required' => 'กรุณากรอกรหัสสินค้า',
            'serial_number.max' => 'รหัสสินค้าต้องไม่เกิน 80 ตัวอักษร',
            'email.required' => 'กรุณากรอกอีเมลผู้ติดต่อ',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'symptom.required' => 'กรุณากรอกอาการชำรุด',
            'symptom.min' => 'กรุณาระบุอาการชำรุดอย่างน้อย 10 ตัวอักษร',
            'urgency.required' => 'กรุณาเลือกระดับความเร่งด่วน',
        ]);

        return back()->with('status', 'รับเรื่องแจ้งเคลมแล้ว');
    }
}
