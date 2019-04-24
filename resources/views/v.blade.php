<!DOCTYPE html>
<html>
<head>
  <title>Laravel零基础入门</title>
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
  <p>视频教程 {{url()->previous()}}</p> 
</div>
 
<div class="container">


  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('')}}">首页</a></li>
    <li class="breadcrumb-item active" aria-current="page">留言详情</li>
  </ol>
</nav>


  <div class="row">
    <div class="col-sm-8">
       
  <div class="card">
    <div class="card-header">留言列表  </div>
    <div class="card-body"> 

 
 

  
 
 
  @foreach ($users as $user)
      
        id：  {{ $user->id }} 
        标题：{{ $user->title }} 
        内容：{{ $user->content }} 

        

 
    @endforeach
 

</div> 
 

  </div>


  <p>@laravel5.6</p> 

    </div>
    <div class="col-sm-4">

  <div class="card" style="margin-bottom: 30px;">
    <div class="card-header" >发布内容 </div>
    <div class="card-body">

<!-- 中间的表单内容 -->
<form method="post" action="">
  
     {{ csrf_field() }}




     

   <div class="form-group">
    <label for="formGroupExampleInput">标题</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="请输入标题">
  </div>

 

   <div class="form-group">
    <label for="exampleFormControlTextarea1">内容</label>
    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary" onclick="public_message('发布成功')">发布</button>
</form>



     </div> 
     
  </div>
      
  <div class="card">
    <div class="card-header">课程简介</div>
    <div class="card-body">简介 

          </div> 
    <div class="card-footer">底部</div>
  </div>
    </div>

  </div>
</div>
 

 
<div id="public_ajax_message" style="display:none;color:white;line-height:50px;position:absolute;z-index:100;left:50%;top:20%;margin-left:-75px;text-align:center;width:150px;height:50px;background-color:#666;font-size:12px;border-radius:50px;animation:myfirst 2s;">
    成功！
</div>

<style type="text/css">
    @keyframes myfirst
{
0%   {background:red;}
25%  {background:orange;}
50%  {background:blue;
 font-weight: bold;
}
100% {background:green;
 
}
}
</style>

<!--  div层延时消失  -->

<script>
function public_message(message)
{
    var v = document.getElementById('title').value;
    if (v.length == 0)
    {
        // alert('输入为空，或都是空格');
        return '';
    }

    if (message) {
        document.getElementById("public_ajax_message").innerHTML=message;
    }
    document.getElementById('public_ajax_message').style.display="";
    setTimeout("disappeare()",2000);
}
function disappeare(){
    document.getElementById('public_ajax_message').style.display="none";
}

 
</script>
</body>
</html>