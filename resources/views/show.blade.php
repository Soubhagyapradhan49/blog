<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .cmt {
            font-size: 16px;
            font-family: initial;
        }

        .date {
            font-size: 13px;
            margin-right: 5px;
        }

        .tag {
            background-color: #007bff;
            color: #fff;
            padding: 3px 9px;
            margin-right: 7px;
        }










        .button2 {
            background-color: #4CAF50;  
            float:right;
          
        }

    
        
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="/dashboard/posts">&laquo;back</a>
        <div class="col-sm-8 border offset-sm-2 p-4 bg-light shadow-lg p-3 mb-5 bg-white rounded">
            <div class="text-center pt-3 pb-3">

                <h5>{{$post->title}}</h5>
            </div>
            <div class="row">

                <div class="col-6 mb-2">
                    <b>{{$post->user->name}}</b>
                </div>
                <div class="col-6 mb-2">
                    <b>Posted At</b> :{{$post->created_at}}
                </div>
                <div class="col-12 mb-2">

                    <div class="text-center">
                        <img src="{{asset('/images/'.$post->image)}}" class="card-img-top" />
                    </div>

                </div>
                <div class="col-12 mb-2">
                    <div class="bg-light pt-2 pb-2">
                        <b>Description</b> :
                    </div>
                    <div class="">
                        {{$post->body}}
                    </div>

                </div>


                <div class="col-12 mb-2">
                    <div class="bg-light pt-2 pb-2">
                        <b>Comments</b>
                    </div>
                    <div class="border set">
                        @foreach($comments as $comment)
                        <div class="cmt d-flex justify-content-between">
                            <div class="">
                            {{$post->user->name}}: <b class="m-2">{{$comment->message}}</b>
                            </div>
                            <div class="">
                                <span class="date">{{$comment->created_at}} </span>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>

                <div class="col-12 mb-2">
                    <form action="/dashboard/posts/{{$post->id}}/comment" method="POST">

                        @csrf
                        <textarea class="form-control mb-10" name="message" placeholder="push a comment here" required=""></textarea>
                        <div>

                            <input type="hidden" name="id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{$post->user->id}}">
                            <input type="hidden" name="useremail" value="{{$post->user->email}}">
                         
                        </div>
                        <div class="row mt-2">
                        <div class="col-6">
                        <button type="submit" class="btn btn-primary" href="#">Comment</button>
                            </div>
                            <div class="col-6 text-right"> 
                            <a href="/dashboard/stripe-payment">
            <button   type="button" class="btn btn-link " data-toggle="tooltip" data-placement="top" title="donate"> <i class="fa fa-coffee"></i>
            </button>
                 </a>
                            </div>
                        </div>
                       
                    </form>
                     
          
                </div>
            
           
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
</body>

</html>