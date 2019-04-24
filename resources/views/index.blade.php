<!DOCTYPE html>
<html>
<head>
    <title>Laravel5.6简易留言板</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
    <h1>Laravel5.6 简易留言板</h1>
    {{--<p>每课的源码：<a href="https://gitee.com/rinuo/laravel">https://gitee.com/rinuo/laravel</a>  交流qq群：  389491313  </p> <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=4e84d923f7b17efbf158f1e9d1927a1db20278e4b5a5c926541f28191a905d86"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="Laravel5.6  零基础入门" title="Laravel5.6  零基础入门"></a>--}}
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8" style="padding-bottom:  20px">
       
            <div class="card">
                <div class="card-header">最新留言 <small>共计{{ $users->total() }} 条</small></div>
                <div class="card-body">

                    <table class="table table-striped table-dark">
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> <img src="http://tvax3.sinaimg.cn/crop.35.65.195.195.50/006Cibufly1fglssebfynj307g0923z2.jpg" class="rounded" alt="Cinque Terre">{{ $user->id }}</td>
                                <td   style="word-break:break-all; word-wrap:break-all;" >
                                    <a href="{{url('/view/')}}/{{$user->id}}" > {{ $user->title }}</a>
                                </td>
                                <td style="width: 100px;">
                                    <a class="btn btn-info btn-sm" href="{{url('/edit/')}}/{{$user->id}}" role="button" style="margin-bottom: 10px ">编辑</a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"  onclick="javascript:document.getElementById('del_id').value={{$user->id}} " role="button" >删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- 删除的模态框 -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">信息</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="post" action="">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        确定删除此条帖子？
                                        <input id="del_id" type="hidden" class="form-control" name="del_id"  value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"   onclick="del_message('删除成功')" >确定</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="d-none d-sm-block">
                        {{ $users->links() }}
                    </div>

                    <div class="d-block d-sm-none">

                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">

                                <li class="page-item  {{ $users->previousPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{$users->previousPageUrl()}}" tabindex="-1">上一页</a>
                                </li>
          
                                <li class="page-item active">
                                    <a class="page-link" href="#">{{$users->currentPage()}} <span class="sr-only">(current)</span></a>
                                </li>
           
                                <li class="page-item {{ $users->nextPageUrl() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{$users->nextPageUrl()}}">下一页</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="card" style="margin-bottom: 30px;">
                <div class="card-header" >欢迎发布留言 </div>
                <div class="card-body">
                    <!-- 中间的表单内容 -->
                    <form method="post" action="">
                    {{ csrf_field() }}
<!--    <div class="form-group">
    <label for="formGroupExampleInput">标题</label>
    <input type="text" class="form-control" name="" id="" placeholder="请输入标题">
  </div> -->
                        <div class="form-group">
                            <textarea class="form-control" name="title" id="title" rows="3"  placeholder="输入留言内容"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="public_message('发布成功')">发布</button>
                    </form>
                </div>
            </div>
            {{--<div class="card">--}}
                {{--<div class="card-header">加QQ群</div>--}}
                {{--<div class="card-body"><a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=4e84d923f7b17efbf158f1e9d1927a1db20278e4b5a5c926541f28191a905d86"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="Laravel5.6  零基础入门" title="Laravel5.6  零基础入门"></a>--}}
                {{--</div>--}}
                {{--<div class="card-footer">课程源码下载：<a href="https://gitee.com/rinuo/laravel">https://gitee.com/rinuo/laravel</a></div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
 

<div id="public_ajax_message" style="display:none;color:white;line-height:50px;position:absolute;z-index:100;left:50%;top:20%;margin-left:-75px;text-align:center;width:150px;height:50px;background-color:#666;font-size:12px;border-radius:50px;animation:myfirstd 1s;">
    成功！
</div>

<style type="text/css">
    @keyframes myfirst {
        0%   {background:red;}
        25%  {background:orange;}
        50%  {background:blue;font-weight: bold;}
        100% {background:green;}

    }
</style>

<!--  发布div层延时消失  -->
<script>
    function public_message(message)
    {
        var v = document.getElementById('title').value;
        if (v.length == 0)
        {
        // alert('输入为空，或都是空格');
            return '';
        }

        if (message)
        {
            document.getElementById("public_ajax_message").innerHTML=message;
        }
        document.getElementById('public_ajax_message').style.display="";
        setTimeout("disappeare()",2000);
    }

    function disappeare()
    {
        document.getElementById('public_ajax_message').style.display="none";
    }


    // 删除成功提示
    function del_message(message)
    {
        if (message)
        {
            document.getElementById("public_ajax_message").innerHTML=message;
        }
        document.getElementById('public_ajax_message').style.display="";
        setTimeout("disappeare()",3000);
    }


 
 
</script>


</body>
</html>