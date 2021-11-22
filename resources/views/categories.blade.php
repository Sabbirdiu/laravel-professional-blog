@extends('layouts.frontend.app')
@section('content')
<div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing "> 
          <div class="container">
            <div class="row">
              <!-- post -->
               <!-- post -->
               @foreach($categories as $cat)
               <div class="post col-xl-3">
                <div class="post-thumbnail"><a href="{{route('category.post',$cat->slug)}}"><img  style="height:200px;width: 300px;" src="{{asset('storage/category/'.$cat->image)}}" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{$cat->created_at->diffForHumans()}}</div>
                  </div><a href="{{route('category.post',$cat->slug)}}">
                    <h3 class="h4">{{$cat->name}}</h3></a>
                </div>
              </div>
              @endforeach
          </div>
        </main>
      </div>
</div>
@endsection