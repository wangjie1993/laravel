@extends('home.layouts.master')
@section('content')
    <div class="container">
        <div class="row edu-topic-show mt-3">
            <div class="col-12 col-xl-9">
                <div class="card card-body p-5">
                    <div class="row">
                        <div class="col text-right">
                            <a href="" class="btn btn-xs">
                                @auth
                                    @if($article->collect->where('user_id',auth()->id())->first())
                                        <a href="{{route('member.collect.make',['type'=>'article','id'=>$article['id']])}}" class="btn btn-sm btn-white">
                                            取消收藏
                                        </a>
                                    @else
                                        <a href="{{route('member.collect.make',['type'=>'article','id'=>$article['id']])}}" class="btn btn-sm btn-white">
                                            收藏
                                        </a>
                                    @endif
                                @else
                                    <a href="{{route('login',['from'=>url()->full()])}}" class="btn btn-sm btn-white">
                                        收藏
                                    </a>
                            @endauth
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="mb-4">
                                {{$article['title']}}
                            </h2>
                            <p class="text-muted mb-1 text-muted small">
                                <a href="" class="text-secondary">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </a><a href="" class="text-secondary">{{$article->user->name}}</a>

                                <i class="fa fa-clock-o ml-2" aria-hidden="true"></i>
                                {{$article->created_at->diffForHumans()}}

                                <a href="" class="text-secondary">
                                    <i class="fa fa-folder-o ml-2" aria-hidden="true"></i>
                                    {{$article->category->title}}
                                </a>

                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="markdown editormd-html" id="content">
                                <textarea name="content" id="" hidden cols="30" rows="10"> {{$article->content}}</textarea>
                            </div>
                        </div>
                    </div>
                    {{--111--}}
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-auto mr--3">

                                <div class="avatar-group d-none d-sm-flex">
                                    @foreach($article->zan as $zan)
                                    <a href="{{route('member.user.show',$zan->user)}}" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Ab Hadley">
                                        <img src="{{$zan->user->icon}}" alt="..." class="avatar-img rounded-circle border border-white">
                                    </a>
                                    @endforeach
                                </div>

                            </div>
                            <div class="col-auto">
                                @auth
                                @if($article->zan->where('user_id',auth()->id())->first())
                                <a href="{{route('home.zan.make',['type'=>'article','id'=>$article['id']])}}" class="btn btn-sm btn-white">
                                    👍 取消
                                </a>
                                @else
                                <a href="{{route('home.zan.make',['type'=>'article','id'=>$article['id']])}}" class="btn btn-sm btn-white">
                                        👍 赞
                                 </a>
                                @endif
                                @else
                                        <a href="{{route('login',['from'=>url()->full()])}}" class="btn btn-sm btn-white">
                                            👍 赞
                                        </a>
                                    @endauth

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
                @include('home.layouts.comment')
            </div>
            <div class="col-12 col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <a href="" class="text-secondary">
                                {{$article->user->name}}
                            </a>
                        </div>
                    </div>
                    <div class="card-block text-center p-5">
                        <div class="avatar avatar-xl">
                            <a href="">
                                <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded-circle">
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a class="btn btn-white btn-block btn-xs" href="{{route('member.attention',$article->user)}}">

                            @if($article->user->fans->contains(auth()->user()))
                                <i class="fa fa-plus" aria-hidden="true"></i> 取消关注
                            @else
                                <i class="fa fa-plus" aria-hidden="true"></i> 关注 TA
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs','MarkdownIt','marked', 'highlight'], function (hdjs,MarkdownIt,marked) {
            //将markdown转为html代码：http://hdjs.hdphp.com/771125
            let md = new MarkdownIt();
            let content = md.render($('textarea[name=content]').val());
            $('#content').html(content);
            //代码高亮
            $(document).ready(function() {
                $('pre code').each(function(i, block) {
                    hljs.highlightBlock(block);
                });
            });
        })
    </script>
@endpush