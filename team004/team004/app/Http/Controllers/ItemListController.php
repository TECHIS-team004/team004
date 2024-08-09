<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemListController extends Controller
{
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    // 商品一覧画面（表示）
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    public function index()
    {
        // 認証チェック
        if (!auth()->check()) {
            return redirect()->route('login');
            }

        $items = Item::paginate(20); // 件数20まで
        return view('item_list', compact('items'));
    }

    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    // 商品一覧画面（検索）
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    public function search(Request $request)
    {
        // 認証チェック
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 検索クエリを取得
        $query = $request->input('query');
        $date = $request->input('date');

        // クエリビルダを使用して条件を追加
        $items = Item::where(function($q) use ($query) {
            $q->where('name', 'LIKE', '%' . $query . '%')
              ->orWhere('id', $query) // IDの完全一致検索
              ->orWhere('type', 'LIKE', '%' . $query . '%')
              ->orWhere('detail', 'LIKE', '%' . $query . '%');
        });

        // 日付で絞り込み
        if ($date) {
            $items = $items->whereDate('created_at', '<=', $date)
                           ->orWhereDate('updated_at', '<=', $date);
        }

        $items = $items->paginate(10);

        return view('item_list', compact('items'));
    }

    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    // 商品登録画面（表示）
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    public function create()
    {
        // 管理者チェック
        if (!auth()->user()->is_admin) {
            return redirect()->route('items.index');
        }

        return view('item_register'); // 商品登録画面へ
    }

    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    // 商品登録画面（登録）
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'detail' => 'required|max:500',
        ]);

        Item::create([
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
            'created_user_id' => Auth::id(),
            'updated_user_id' => Auth::id(),
        ]);
        return redirect('item_list');
    }

    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    // 商品編集画面（表示）
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    public function edit($id)
        {
        // 管理者チェック
        if (!auth()->user()->is_admin) {
            return redirect()->route('items.index');
        }

        $item = Item::find($id);
        return view('item_edit', compact('item')); // 商品編集画面へ
    }

    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    // 商品編集画面（更新）
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'type' => 'required|max:100',
            'detail' => 'required|max:500',
        ]);

        $item = Item::find($id);
        $item->update([
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
            'updated_user_id' => Auth::id(),
        ]);
        return redirect('item_list');
    }

    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    // 商品編集画面（削除）
    // ★★★★★★★★★★★★★★★★★★★★★★★★★★★
    public function delete(Request $request,$id)
    {

        Item::find($id)->delete();

        return redirect('item_list');
    }
}
