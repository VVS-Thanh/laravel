@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center text-danger">THÊM SẢN PHẨM</h1>
        <form method="POST" action="{{ route('insertQuestion') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <input type="hidden" name="questionid" placeholder="ID câu hỏi" value="{{ $question->questionid }}">
            </div>
            <div class="mb-3 mt-3">
                <label for="content" class="form-label">Câu hỏi</label>
                <input type="text" class="form-control" id="content" placeholder="Nhập câu hỏi" name="content">
            </div>
            <div class="mb-3">
                <label for="answera" class="form-label">Đáp án A</label>
                <input type="text" class="form-control" id="answera" placeholder="Nhập đáp án A" name="answera">
            </div>
            <div class="mb-3">
                <label for="answerb" class="form-label">Đáp án B</label>
                <input type="text" class="form-control" id="answerb" placeholder="Nhập đáp án B" name="answerb">
            </div>
            <div class="mb-3">
                <label for="answerc" class="form-label">Đáp án C</label>
                <input type="text" class="form-control" id="answerc" placeholder="Nhập đáp án C" name="answerc">
            </div>
            <div class="mb-3">
                <label for="answerd" class="form-label">Đáp án D</label>
                <input type="text" class="form-control" id="answerd" placeholder="Nhập đáp án D" name="answerd">
            </div>
            <div class="mb-3">
                <label for="correctanswer" class="form-label">Đáp án đúng</label>
                <input type="text" class="form-control" id="correctanswer" placeholder="Nhập đáp án đúng"
                    name="correctanswer">
            </div>
            <div class="mb-3 mt-3">
                <label for="level" class="form-label">Độ khó</label>
                <select class="form-select" name="level" id="level">
                    <option value="Dễ">Dễ</option>
                    <option value="Khá">Khá</option>
                    <option value="Khó">Khó</option>
                </select>
            </div>
            <div>
                <label for="image" class="form-label">Hình cho câu hỏi</label>
                <input type="file" class="form-control" id="fileUpload" name="fileUpload">
            </div>
            <div class="mb-3 mt-3">
                <label for="subjectid" class="form-label">Môn học</label>
                <select class="form-select" name="subjectid" id="subjectid">
                    @foreach ($subject as $sub)
                        <option value="{{ $sub->subjectid }}">{{ $sub->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button style="cursor: pointer;" type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection
