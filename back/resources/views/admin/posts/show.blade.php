@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.post.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.id') }}
                        </th>
                        <td>
                            {{ $post->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.title') }}
                        </th>
                        <td>
                            {{ $post->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.body') }}
                        </th>
                        <td>
                            {!! $post->body !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.category') }}
                        </th>
                        <td>
                            @foreach($post->categories as $key => $category)
                                <span class="label label-info">{{ $category->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection