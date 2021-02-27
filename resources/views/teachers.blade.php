@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            Teacher Top
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 登録フォーム -->
        <form enctype="multipart/form-data" action="{{ url('teachers') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- タイトル -->
            <div class="form-group">
                <div class="col-sm-6">
                名前
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-sm-6">
                e-mail
                    <input type="text" name="email" class="form-control">
                </div>
                <!-- file 追加 -->
                <div class="col-sm-6">
                <div>
                    <label>写真</label>
                </div>
                    <input type="file" name="photo">
                </div>
            </div>

            <!-- 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- 既に登録されてるリスト -->

         <!-- 現在 -->
         @if (count($teachers) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>名前</th>
                        <th>e-mail</th>
                        <th>更新</th>
                        <th>削除</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <!-- タイトル -->
                                <td class="table-text">
                                    <div>{{ $teacher->name }}</div>
                                    <div> <img src="upload/{{$teacher->photo}}" width="100"></div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $teacher->email }}</div>
                                </td>

                                <!-- 更新ボタン -->
                                <td>
                                    <form action="{{ url('teachersedit/'.$teacher->id) }}" method="POST">
                                    {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                        update
                                        </button>
                                    </form>
                                </td>
                                <!-- 削除ボタン -->
                                <td>
                                    <form action="{{ url('teacher/'.$teacher->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger">
                                            del
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
            {{ $teachers->links()}}
            </div>
        </div>

    @endif

@endsection