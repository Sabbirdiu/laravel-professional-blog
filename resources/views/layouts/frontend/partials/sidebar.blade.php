<aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form  action="{{route('search')}}" method="GET">
              <div class="form-group">
                <input name="search" type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
            
            <div class="blog-posts">
            @foreach($latestpost as $latestpost)
          <a href="">
            <div class="item d-flex align-items-center">
              <div class="image">
                <img src="{{asset('storage/post/'.$post->image)}}" alt="..." class="img-fluid" />
              </div>
              <div class="title">
                <strong>{{$latestpost->title}}</strong>
                <div class="d-flex align-items-center">
                 
                  <div class="views">
                    <i class="icon-eye"></i> 5
                  </div> 
                  
                   <div class="comments">
                    <i class="icon-comment"></i>6
                  </div> 
                </div>
              </div>
            </div>
          </a>
           @endforeach
        </div>
      </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>
            @foreach ($categories as $category)
            <div class="item d-flex justify-content-between"><a href="#">{{$category->name}} </a><span>{{$category->posts->count()}}</span></div>
            @endforeach
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">       
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
            @foreach ($tags->unique('name') as $tag)
              <li class="list-inline-item"><a href="#" class="tag">{{$tag->name}}</a></li>
            @endforeach
            </ul>
           </div>
      </aside>