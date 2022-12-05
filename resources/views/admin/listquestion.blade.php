@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="car-header">
                        <h2 class="text-center">Danh sách các câu hỏi trắc nghiệm</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('createQuestion') }}" class="btn btn-success btn-sm" title="Add New Question">
                            Add new
                        </a>
                        <br>
                        <br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Câu hỏi</th>
                                    <th>Hình ảnh</th>
                                    <th>Đáp án đúng</th>
                                    <th>Loại</th>
                                    <th>Môn học</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @foreach ($question as $q)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $q->content }}</td>
                                    <td>
                                        <img src="images/{{ $q->image }}" width="100" height="80">
                                    </td>
                                    <td>{{ $q->correctanswer }}</td>
                                    <td>{{ $q->level }}</td>
                                    <td>{{ $q->Subject->name }}</td>
                                    <td>
                                        <a href="{{ route('detailQuestion', ['questionid' => $q->questionid]) }}"
                                            title="View Question"><button class="btn btn-info btn-sm">View</button></a>
                                        <a href="{{ route('editQuestion', ['questionid' => $q->questionid]) }}"
                                            title="Edit Question"><button class="btn btn-primary btn-sm">Edit</button></a>
                                        <a href="" title="Delete Question"><button
                                                class="btn btn-danger btn-sm">Delete</button></a>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{ $question->links() }}
@endsection
