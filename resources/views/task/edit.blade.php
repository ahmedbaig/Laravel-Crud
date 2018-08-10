
@extends('layouts.app')

@section('content')
        <div class="flex-center title m-b-md">
            Update Task
        </div>
        {!! Form::model($task, array('route' => ['task.update', $task->id], 'method'=>'post')) !!}
          {{ method_field('PUT')}}
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="title">Enter Title:</label>
              {{Form::text('title', $task->title, ['class'=>'form-control'])}}
              <!--
              <input type="text" class="form-control" name="title" required> -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="body">Enter task:</label>
                {{Form::textarea('body', $task->body, ['class'=>'form-control'])}}
              <!--
              <textarea type="text" class="form-control" name="body" required></textarea> -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <button type="submit" class="btn btn-success" style="margin-left:38px">Update Task</button>
            </div>
          </div>
      {!!Form::close()!!}
      @if ($errors->has('message'))
          <span class="help-block">
              <strong>{{ $errors->first('message') }}</strong>
          </span>
      @endif
    </div>
</div>
</body>
<footer>
    @include('task.footer.index');
</footer>
@endsection
