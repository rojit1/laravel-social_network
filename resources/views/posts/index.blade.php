@extends('layouts.app')

@section('content')

    @if(count($posts)>0)
        @foreach($posts as $post)
           <div class="row">
               <div class="col-md-10" style="margin: auto">
               <div class="card" style="border:2px solid lightblue;padding :20px">
                @if($post->user->profile)
                <div class="row">
                 
                  <div class="col-md-3">
                    <img style="border-radius:100%" height="100px" width="100px" src="storage/ProfilePicture/{{$post->user->profile->profile_picture}}">
                  </div>
                  
                  <div class="col-md-9">
                    <a href="/profile/{{$post->user->username}}">{{$post->user->name}}</a>
                  </div>

                </div>
                @endif
                <hr>
                   <div class="row">
                       <div class="col-md-3" style="border-right: 2px solid plum">
                        
                           <a href="storage/images/{{$post->image}}"><img style="width: 100%; border-radius:20px;" src="storage/images/{{$post->image}}" alt="image" class="img-responsivephp"></a>

                       </div>
                      <div class="col-md-7">
                          <h2>{{$post->title}}</h2>
                          <p>{{$post->body}}</p>
                          
                          <small>posted on: {{$post->created_at}} by <a href="/profile/{{$post->user->username}}">{{$post->user->name}}</a></small>
                      </div>
                   </div>
                    
                    <!-- ------------  Likes Section   -->
                   <br>
                   <div class="row">
                    <div class="col-md-3">
                      <div class="btn btn-grp">
                        <button class="btn btn-success"><span class="fa fa-thumbs-up"></span></button>
                        <button class="btn btn-danger"><span class="fa fa-thumbs-down"></span></button>
                        0 likes
                      </div>
                    </div>
                    <!--  Add comment Section -->
                    @if(false)
                        <div class="col-md-7">
                           <form method="POST" action="/addcomment/{{$post->id}}">
                            {{csrf_field()}}
                             <div class="row">
                               <div class="col-md-9">
                               <textarea name="comment" class="form-control" placeholder="write a comment..."></textarea>
                             </div>
                              <div class="col-md-3">
                                <input type="submit" value="Comment" class="form-control">
                              </div>
                             </div>
                           </form>
                         </div>
                         @endif
                     </div>
                    
               </div>

                   <hr>
               </div>
           </div>
        @endforeach

           <div class="row">
             <div class="col-md-1"></div>
             <div class="col-md-11">
               {!! $posts->links() !!}
             </div>
           </div>


    @else
        <p>No posts found</p>
    @endif
@stop
