@extends('layouts.frontend.app')
@section('content')
<div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img style="height:500px;width: 700px;" src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}" class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category"><a href="#">{{$post->category->name}}</a></div>
                </div>
                <h1>{{$post->title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{asset('storage/user/'.$post->user->image)}}" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{$post->user->name}}</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i> {{$post->created_at->diffForHumans()}}</div>
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
                <div class="post-body">
                {!! $post->body !!}
                </div>
                <div class="post-tags">
                @foreach ($post->tags as $tag)
                    <a href="#" class="tag">{{$tag->name}}</a>
                @endforeach
                </div>
                <div class="post-comments">
                  <header>
                    <h3 class="h6">Post Comments<span class="no-of-comments">(3)</span></h3>
                  </header>
                  @foreach ($post->comments as $comment)
                  <div class="comment">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"><img src="{{asset('storage/user/'.$comment->user->image)}}" alt="{{$comment->user->image}}"  class="img-fluid rounded-circle"></div>
                        <div class="title"><strong>{{$comment->user->name}}</strong><span class="date">{{$comment->created_at->format('D, d M Y H:i')}}</span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p>{{$comment->message}}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="add-comment">
                @guest
                <div class="container">
                    <h4>Please Sign in to post comments - <a href="{{route('login')}}">Sing in</a> or <a href="{{route('register')}}">Register</a></h4>
                </div>
                @else
                  <form  action="{{route('comment.store', $post->id)}}" method="POST" class="commenting-form">
                  @csrf
                    <div class="row">
                      <div class="form-group col-md-12">
                        <textarea name="message" id="message" placeholder="Type your comment" class="form-control"></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary">Submit Comment</button>
                      </div>
                    </div>
                  </form>
                  @endguest
                </div>
              </div>
            </div>
          </div>
        </main>
        @include('layouts.frontend.partials.sidebar')
      </div>
    </div>
@endsection