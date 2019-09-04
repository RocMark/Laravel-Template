<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    // 重新導向範例
    public function index()
    {
        return view('home');
        return redirect('register')->withErrors(['錯誤訊息'])->withInput();

        // ? 此種寫法待測試
        return redirect()->action('BlogController@index')->with('message', '新增文章成功')->with(
            'class',
            'alert-success'
        );
    }

    // 呼叫 Service & Repo 範例
    public function callRepoAndService(Request $request)
    {
        $data = $request->all();  // 此為一陣列

        // 在 Controller 明確定義要那些欄位傳給 Repo & Service
        $dataA = BlogService::indexBlog([
            'keyword' => $request->keyword,
        ]);

        $dataB = BlogRepository::getBlog($request->id);
    }


    // DB 操作相關
    public function database(Request $request)
    {
        $emailExist = User::Where('email', $request->email)->first();
    }

    // 自行建立 Validator
    protected function validator(array $data)
    {
        $validator =  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        //? todo-ask 帶查詢怎麼取得個欄位的驗證錯誤
        // 回傳 Boolean
        if ($validator->fails()) {
            return redirect('register')->withErrors(['驗證失敗'])->withInput();
        }
    }

    // 寫入資料庫
    protected function postUser($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
    }

    // 寫入 session
    protected function writeSession($data)
    {
        session([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    // 登入範例
    protected function login(Request $request)
    {
        /*
            1. 先取出儲存在資料庫中的密碼
            2. 用戶輸入密碼
            3. 使用 Hash::check('用戶輸入的密碼', 從資料庫取出的密碼)
            4. 回傳 Boolean 值
        */
        $password = $request->password;
        $dbHashed = User::Where('email', $request->email)->value('password');
        $validate = Hash::check($password, $dbHashed);
    }
}
