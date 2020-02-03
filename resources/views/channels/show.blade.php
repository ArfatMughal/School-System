@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        {{$channel->name}}
                    </div>
                    <div class="card-body">
                        @if($channel->editable())
                            <form id="update-channel-form" action="{{ route('channels.update', $channel->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @endif
                                <div class="from-group row justify-content-center">
                                    <div class="channel-avatar">
                                        @if($channel->editable())
                                            <div class="channel-avatar-overlay" onclick="document.getElementById('image').click()">
                                            </div>
                                        @endif
                                            <img alt="" src="{{ $channel->image()}}">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <h4 class="text-center mt-2">
                                        {{$channel->name}}
                                    </h4>
                                    <p class="text-center">
                                        {{$channel->description}}
                                    </p>

                                    <div class="text-center">
                                        <button class="btn btn-danger">
                                            Subscribe
                                        </button>
                                    </div>

                                </div>
                                @if($channel->editable())
                                    <input id="image" name="image" style="display: none"
                                           onchange="document.getElementById('update-channel-form').submit()" type="file">
                                    <label for="name" class="form-control-label">
                                        Name
                                    </label>
                                    <input class="form-control" id="name" name="name" type="text" value="{{$channel->name}}">
                                    <div class="form-group">
                                        <label for="description" class="form-control-label">
                                            Description
                                        </label>
                                        <textarea name="description" id="description"  rows="3" class="form-control">{{$channel->description}}
                     </textarea>
                                    </div>
                                    @if($errors->any())
                                        <ul class="list-group mb-5">
                                            @foreach($errors->all() as $error)
                                                <li class="text-danger list-group-item">
                                                    {{$error}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <button class="btn btn-info" type="submit">
                                        Update Channel Info
                                    </button>
                                @endif
                                @if($channel->editable())
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
