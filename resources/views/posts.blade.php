@extends('layouts.frontend.app')
@section('content')
<div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->
              
              @forelse($posts as $post)
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="{{route('post', $post->slug)}}"><img style="height:300px;width: 500px;" src="{{asset('storage/post/'.$post->image)}}" alt="{{$post->image}}" class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{$post->created_at->diffForHumans()}}</div>
                    <div class="category"><a href="#">{{$post->category->name}}</a></div>
                  </div><a href="{{route('post', $post->slug)}}">
                    <h3 class="h4">{{$post->title}}</h3></a>
                  <p class="text-muted"> {!! Str::limit($post->body, 400) !!}</p>
                  <footer class="post-footer d-flex align-items-center"><a href="" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{asset('storage/user/'.$post->user->image)}}" alt="Avatar" class="img-fluid"></div>
                      <div class="title"><span>{{$post->user->name}}</span></div></a>
                    <div class="date"><i class="icon-bookmark"></i> 2 </div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div> 
                  </footer>
                </div>
              </div>
             
              @empty
                 <h3>No post availabe</h3>
              @endforelse
            </div>
            <!-- Pagination -->
            <!-- <nav aria-label="Page navigation example justify-content-center ">
            {{ $posts->links()}}
            </nav> -->
            <div class="justify-content-center d-flex mt-5">
                    {{ $posts->links()}}
                </div>
          </div>
        </main>
        <!-- sidebar -->
        @include('layouts.frontend.partials.sidebar')
      </div>
</div>
    
@endsection