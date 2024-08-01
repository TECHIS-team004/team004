<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemListController extends Controller
{
    public function index()
    {
        // 認証チェック
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $items = Item::paginate(20); // 件数20まで
        return view('item_list', compact('items'));
    }

    public function search(Request $request)
    {
        // 認証チェック
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $query = $request->input('query');
        $items = Item::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('item_list', compact('items'));
    }

    public function create()
    {
        // 管理者チェック
        if (!auth()->user()->is_admin) {
            return redirect()->route('items.index');
        }

        return view('items.item_register'); // 商品登録画面へ
    }

    public function edit($id)
    {
        // 管理者チェック
        if (!auth()->user()->is_admin) {
            return redirect()->route('items.index');
        }

        $item = Item::find($id);
        return view('items.item_edit', compact('item')); // 商品編集画面へ
    }
}
