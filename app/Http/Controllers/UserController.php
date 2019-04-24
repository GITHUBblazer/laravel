<?php

namespace App\Http\Controllers;
 

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Flight;
use App\Lesson;

class UserController extends Controller
{
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     * @author LaravelAcademy.org
     */

    public function test3(){

      



      // $flights =  Lesson::all();
      // $flights =  Lesson::where('title', 1596)
      //          ->get();

      // $flights =  Lesson::first();
      // $flights =  Lesson::find(1);
      // $flights =  Lesson::find([1, 2, 3]);
      // $flights =  Lesson::count();
      // $flights =  Lesson::where('title','>=', 1596)->max('id');


      // dd($flights);


      


      // 验证请求...

        // $flight = new Lesson;

        // $flight->title = '12306';
        

        // $flight->save();

        // dd($flight);

      // $flight = Lesson::find(163);
      // $flight->title = 'Hello world!';
      // $flight->save();


      // $flight =  lesson::find(164);
      // $flight->title = 'New Flight Name';
      // $flight->save();

      //  lesson::where('title', 123456)
      // ->update(['title' => 123]);

      // Lesson::where('title', '10086')
      // ->update(['title' => 10086]);

      // 模型的删除
       // $flight = Lesson::find(146);
       // $flight->delete();

       // 通过主键直接删除
       Lesson::destroy(146);
       // Lesson::destroy([151, 152, 153]);
        // Lesson::destroy(140, 141, 142);

   


      // $deletedRows = Lesson::where('id', '>=',150)->delete();

 

    }
    public function show(Request $request)
    {

    	// 原生 插入语句
        // DB::insert('insert into laravel_lesson (video, title) values (?, ?)', [666, '学习']);

        // 查询构造器写法
        // $users = DB::table('lesson')->orderBy('id', 'desc')->limit(10)->get();

        // $users = DB::table('lesson')->orderBy('id', 'desc')->paginate(5);

        // 模型查询的写法 ，此处用的分页的写法
        $users = Lesson::orderBy('id', 'desc')->paginate(5);

        // 包含软删除模型
        // $users = Lesson::withTrashed()->orderBy('id', 'desc')->paginate(5);

        // 只获取软删除模型
        // $users = Lesson::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
       

        // $users = DB::table('lesson')->orderBy('id', 'desc')->paginate(10);
        // $users = DB::table('lesson')->simplePaginate(15);
        // $users = DB::table('users')->simplePaginate(15);

       
        // 查询语句
         // $users = DB::select('select * from laravel_lesson');
    	 
         $path = $request->path();


    	 $path = $request->all();

         // dump($path);




        $title   = $request->input('title');
        $content = $request->input('content');
        $del_id = $request->input('del_id');



        if ($del_id) {
         
               // 通过主键直接删除
              Lesson::destroy($del_id);

            return redirect('/');
        }

        // dump($title);
        // dump($content);

        if ($title) {
            # code...
            // DB::table('lesson')->insert(
            //     ['title' => $title,'content' => $content]
            // );

          // 增加留言，模型的方式。不必再去记录发布时间
          $flight = new Lesson;

          $flight->title = $title;
          $flight->content = $content;
          

          $flight->save();

            return redirect('/');

             
        }





    	 // $users = DB::select('select * from laravel_lesson');


    	// dump($users);
    	// dump($users['0']['title']);

 

    	return view('index', ['users'=> $users]);
       
       // return "123456789" . $id .$name;


        // return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function list($id){
        return "123456" . $id ;

      
    }

    public function del($id){
        echo "123456" . $id ;
        return redirect('/');
    }

    public function view($id){

         $users = DB::table('lesson')
            ->where('id', $id)
            ->get();



            // dump($users);
          return view('view', ['id'=> $id,'users'=> $users]);
    } 
 


    public function edit($id,Request $request){


       $title   = $request->input('title');
 
        if ($title) {
          // dd($id);

                // 使用模型根据主键更新功能
                $flight =  lesson::find($id);
                $flight->title = $title;
                $flight->save();

                return redirect('/view/'.$id);
 
        }




    	   $users = DB::table('lesson')
            ->where('id', $id)
            ->get();



            // dump($users);
          return view('edit', ['id'=> $id,'users'=> $users]);
    }


    public function v($id){


            $users = DB::table('lesson')
            ->where('id', $id)
            ->get();

            // dump($users);
          return view('v', ['id'=> $id,'users'=> $users]);
    }



   

}