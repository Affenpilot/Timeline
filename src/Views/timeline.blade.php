@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="timeline panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('post.create', ['user_id' => $currentUser->id]) }}" method="post">

                        <div class="form-group input-group">
                            <input id="new-post" name="body" type="text" class="form-control" placeholder="What do you have to say?">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div>

                        <input type="hidden" value="{{ get_class($currentUser) }}" name="_class">
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </form>
                </div>
                <div class="list-group">
                    @foreach($currentUser->getTimeLineFromUser($currentUser->id) as $timelineItem)
                        <div class="list-group-item-header">
                            <a href="#"><b>{{ $timelineItem->author->username }}</b></a>
                            <i class="info">@</i><i class="info">{{ $currentUser->username }} - {{ $timelineItem->created_at }}</i>
                        </div>
                        <div class="list-group-item">
                            <p>{{ $timelineItem->body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection