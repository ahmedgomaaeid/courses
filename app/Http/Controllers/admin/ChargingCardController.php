<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChargingCard;
use Illuminate\Http\Request;

class ChargingCardController extends Controller
{
    public function index()
    {
        $cards = ChargingCard::all()->sortByDesc('id');
        return view('admin.charging-cards.index', compact('cards'));
    }
    public function create()
    {
        return view('admin.charging-cards.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'card_number' => 'required|unique:charging_cards',
            'points' => 'required',
        ]);
        ChargingCard::create($request->all());
        return redirect()->route('get.admin.charging-card')->with('success', 'تمت الاضافة بنجاح');
    }
    public function edit($id)
    {
        $card = ChargingCard::find($id);
        return view('admin.charging-cards.edit', compact('card'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'points' => 'required',
        ]);
        $card = ChargingCard::find($id);
        $card->update($request->all());
        return redirect()->route('get.admin.charging-card')->with('success', 'تم تعديل البيانات بنجاح');
    }
    public function destroy($id)
    {
        $card = ChargingCard::find($id);
        $card->delete();
        return redirect()->route('get.admin.charging-card')->with('success', 'تم حذف البطاقة بنجاح');
    }
}
